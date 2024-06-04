
/*
  Web client
  ENC28j60
  https://playground.arduino.cc/Code/FTP/
 */

#include <SPI.h>
#include <Ethernet.h>
// #include <UIPEthernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
//IPAddress server(74,125,232,128);  // numeric IP for Google (no DNS)

// Set the static IP address to use if the DHCP fails to assign
IPAddress ip(192, 168, 18, 123);
IPAddress myDns(192, 168, 1, 1);

// Initialize the Ethernet client library
EthernetClient client;
EthernetClient dclient;

//FTP:
IPAddress server( 82, 223, 8, 163 );  // Indirizzo IP del server SFTP
char user[] = "gsm";  // Nome utente per l'autenticazione
char pasw[] = "gsm2024";  // Password per l'autenticazione
char fold[] = "/var/www/html/gsm/processedLog";  // Percorso dei file sul server
char fname[] = "dati.log";

char outBuf[128];
byte outCount;

void setup() {
  Ethernet.init(10);  // Most Arduino shields
  // Open serial communications and wait for port to open:
  Serial.begin(9600);
  delay(1000);
  Serial.print("\n\n");
  
  // start the Ethernet connection:
  Serial.println("Initialize Ethernet");
  Ethernet.begin(mac);
  Serial.print("Assigned IP: ");
  Serial.println(Ethernet.localIP());  
}

void loop() {
  /*while (Serial.available()) {
    char ch = Serial.read();
    if (ch == 'f') doFTP();  
  }*/
  while(client.connect(server,21)) {
    doFTP();
  } 
  if(!client.connect(server,21)) {
    Serial.println("Server not avaible on this port: 21");
  } 
  if(client.connect(server,22)) {
    Serial.println("Server avaible on port 22");
  }
  else {
    Serial.println("No servers avaible");
  }
}

byte doFTP() {
  if (client.connect(server,22)) {  // ftp:21 sftp:22
    Serial.println(F("connected"));
  } else {
    Serial.println(F("connection failed"));
    return 0;
  }

  if(!eRcv()) return 0;

  client.print(F("USER "));
  client.println(user);

  if(!eRcv()) return 0;

  client.print(F("PASS "));
  client.println(pasw);

  if(!eRcv()) return 0;

  client.println(F("SYST"));

  if(!eRcv()) return 0;

  client.println(F("Type I"));

  if(!eRcv()) return 0;

  client.println(F("PASV"));

  if(!eRcv()) return 0;

  char *tStr = strtok(outBuf,"(,");
  int array_pasv[6];
  for ( int i = 0; i < 6; i++) {
    tStr = strtok(NULL,"(,");
    array_pasv[i] = atoi(tStr);
    if(tStr == NULL)
    {
      Serial.println(F("Bad PASV Answer"));    
    }
  }

  client.println(F("PWD"));
  if(!eRcv()) return 0;

  client.print(F("CWD "));
  client.println(fold);
  if(!eRcv()) return 0;


  unsigned int hiPort,loPort;

  hiPort = array_pasv[4] << 8;
  loPort = array_pasv[5] & 255;

  Serial.print(F("Data port: "));
  hiPort = hiPort | loPort;
  Serial.println(hiPort);

  if (dclient.connect(server,hiPort)) {
    Serial.println(F("Data connected"));
  } else {
    Serial.println(F("Data connection failed"));
    client.stop();
    return 0;
  }

  client.print(F("STOR "));
  client.println(fname);

  if(!eRcv()) {
    dclient.stop();
    return 0;
  }

  Serial.println(F("Writing"));
  char dati[10];
  sprintf(dati, "A0: %d\n", analogRead(A0));

  byte clientBuf[64];
  int clientCount = 0;

  dclient.write(dati,sizeof(dati));
 
  dclient.stop();
  Serial.println(F("Data disconnected"));

  if(!eRcv()) return 0;

  client.println(F("QUIT"));

  if(!eRcv()) return 0;

  client.stop();
  Serial.println(F("Command disconnected"));

  return 1;
}

byte eRcv() {
  byte respCode;
  byte b;

  while(!client.available()) delay(1);
  respCode = client.peek();
  outCount = 0;
  while(client.available()) {  
    b = client.read();    
    Serial.write(b); 
    if(outCount < 127) {
      outBuf[outCount] = b;
      outCount++;      
      outBuf[outCount] = 0;
    }
  }

  if(respCode >= '4') {
    ftperror();
    return 0;  
  }

  return 1;
}

void ftperror() {
  byte b = 0;
  client.println(F("QUIT"));
  while(!client.available()) delay(1);
  while(client.available()) {  
    b = client.read();    
    Serial.write(b);
  }

  client.stop();
  Serial.println(F("disconnected"));  
}





/*
 * Misuratore di potenza e corrente elettrica con SCT-013-030 e invio dati su server Apache
*/
#include <Ethernet.h>
#include <SPI.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };  // default
//byte ip[] = { 10, 0, 0, 177 };
byte server[] = { 82, 223, 8, 163 }; // sftp server

EthernetClient client;

void setup()
{
  Ethernet.begin(mac);
  Serial.begin(9600);

  delay(1000);
  Serial.println("connecting...");
  Serial.println("my IP: ", Ethernet.gatewayIP());

  if (client.connect(server, 80)) {
    Serial.println("connected");
    client.println("GET /search?q=arduino HTTP/1.0");
    client.println();
  } else {
    Serial.println("connection failed");
  }
}

void loop()
{
  if (client.available()) {
    char c = client.read();
    Serial.print(c);
  }

  if (!client.connected()) {
    Serial.println();
    Serial.println("...disconnecting...");
    client.stop();
    for(;;)
      ;
  }
}
/*--------------------------------------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------------------------*/
//12/04/2024 ***modificato (tolto LCD liquid crystal, perché non è presente.***
//Arduino Misuratore di potenzza e corrente elettrica con SCT-013-030

#include "EmonLib.h"  //Per il corretto funzionamento istallare la libreria EmonLib
#include <Wire.h>     // Libreria wire già presente in Arduino ide

// oggetto libreria Emon
EnergyMonitor emon1;
//Inserire la tensione della vostra rete elettrica
int rede = 230.0; // Italia 230V in alcuni paesi 110V  (voltage)
//Pin del sensore SCT su A1
int pin_sct = A0;  // or A0
 
void setup() 
{
  Serial.begin(9600); //Apro la comunicazione seriale
  emon1.current(pin_sct, 29); //Pin, calibrazione - Corrente Const= Ratio/Res. Burder. 1800/62 = 29. 
} 
  
void loop() 
{ 
  //Calcolo della corrente  
  double Irms = emon1.calcIrms(1480);
  if(Irms) {
    //Mostra il valore della Corrente
    Serial.print("Corrente :  ");
    Serial.print(Irms); // Irms
    //Calcola e mostra i valori della Potenza
    Serial.print("   Potenza :  ");
    Serial.println(Irms*rede);   //Scrivo sul monitor seriale Corrente*Tensione=Potenza
  } else {
    Serial.println("Nessun valore");
  }

  // connessione ftp

  delay(1000);
}
/*--------------------------------------------------------------------------------------------------*/