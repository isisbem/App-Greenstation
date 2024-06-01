/*--------------------------------------------------------------------------------------------------*/
/* // più affidabile
  Web client
  ENC28j60
  https://playground.arduino.cc/Code/FTP/
 */

#include <SPI.h>
//#include <Ethernet.h>
#include <UIPEthernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
//IPAddress server(74,125,232,128);  // numeric IP for Google (no DNS)

// Set the static IP address to use if the DHCP fails to assign
IPAddress ip(192, 168, 18, 123);
IPAddress myDns(192, 168, 1, 1);

// Initialize the Ethernet client library
EthernetClient client;
EthernetClient dclient;

//FTP:
IPAddress server( 82, 223, 8, 163 );
//char server[] = "ftp.server.it";  // in caso di site.it
char user[] = "gsm";
char pasw[] = "gsm2024";
char fold[] = "processedLog";
char fname[] = "data.txt";

char outBuf[128];
byte outCount;

void setup() {
  Ethernet.init(10);  // Most Arduino shields
  
  // Open serial communications and wait for port to open:
  Serial.begin(9600);
  while (!Serial) {
    delay(1);
  }  
  
  // start the Ethernet connection:
  Serial.println("Initialize Ethernet");
  if (Ethernet.hardwareStatus() == EthernetNoHardware) {
    Serial.println("Ethernet shield was not found.  Sorry, can't run without hardware. :(");
    while (true) {
      delay(1); // do nothing, no point running without Ethernet hardware
    }
  }
  if (Ethernet.linkStatus() == LinkOFF) {
    Serial.println("Ethernet cable is not connected.");
  }
  Ethernet.begin(mac);
  Serial.print("Assigned IP: ");
  Serial.println(Ethernet.localIP());
}

void loop() {
  while (Serial.available()) {
    doFTP();
    // char ch = Serial.read();
    // if (ch == 'f') doFTP();  
  }
}

byte doFTP() {
  if (client.connect(server,22)) {
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
    if(tStr == NULL) {
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

  // connessione al server
  if (dclient.connect(server,hiPort)) {
    Serial.println(F("Data connected"));
  } else {
    Serial.println(F("Data connection failed"));
    client.stop();
    return 0;
  }

  client.print(F("STOR "));  // comando per memorizzare il file spedito
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
/*--------------------------------------------------------------------------------------------------*/




/*--------------------------------------------------------------------------------------------------*/
/*
  Web client
  ENC28j60
  https://playground.arduino.cc/Code/FTP/
 */

#include <SPI.h>
#include <UIPEthernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };

IPAddress server( 82, 223, 8, 163 );  // Indirizzo IP del server SFTP
char user[] = "gsm";  // Nome utente per l'autenticazione
char pasw[] = "gsm2024";  // Password per l'autenticazione
char fold[] = "/var/www/html/gsm/processedLog";  // Percorso dei file sul server

char outBuf[128];
byte outCount;

void setup() {
  Ethernet.init(10);  // Inizializza l'interfaccia Ethernet
  
  // Inizializza la comunicazione seriale
  Serial.begin(9600);
  while (!Serial) {
    delay(1);
  }  

  // Connessione all'Ethernet
  Serial.println("Initialize Ethernet");
  if (Ethernet.hardwareStatus() == EthernetNoHardware) {
    Serial.println("Ethernet shield was not found.  Sorry, can't run without hardware. :(");
    while (true) {
      delay(1); // Non fare nulla se manca l'hardware Ethernet
    }
  }
  if (Ethernet.linkStatus() == LinkOFF) {
    Serial.println("Ethernet cable is not connected.");
  }
  Ethernet.begin(mac);
  Serial.print("Assigned IP: ");
  Serial.println(Ethernet.localIP());
}

void loop() {
  while (Serial.available()) {
    doSFTP();
  }
}

byte doSFTP() {
  // Connessione al server SFTP sulla porta 22
  if (client.connect(server, 22)) {
    Serial.println(F("connected"));
  } else {
    Serial.println(F("connection failed"));
    return 0;
  }

  // Ricezione del banner di benvenuto dal server SFTP
  if (!eRcv()) return 0;

  // Invio del nome utente
  client.print(F("USER "));
  client.println(user);
  if (!eRcv()) return 0;

  // Invio della password
  client.print(F("PASS "));
  client.println(pasw);
  if (!eRcv()) return 0;

  // Impostazione del tipo di trasferimento
  client.println(F("TYPE I"));
  if (!eRcv()) return 0;

  // Generazione del nome del file basato sulla data e sull'ora correnti
  char fname[50];
  generateFileName(fname);
  client.print(F("STOR "));
  client.println(fname);
  if (!eRcv()) return 0;

  // Scrittura dei dati sul file di log
  Serial.println(F("Writing"));
  char dati[20]; // Dimensione dei dati da inviare
  // Modifica i dati da inviare in base alle letture del sensore
  sprintf(dati, "Sensor data: %d\n", analogRead(A0)); // Esempio: legge un valore dal pin A0
  client.println(dati);
  // Fine lettura dati

  // Chiude la connessione dati e stampa su seriale
  client.stop();
  Serial.println(F("Data disconnected"));

  // Chiude la connessione FTP e stampa su seriale
  client.println(F("QUIT"));
  if (!eRcv()) return 0;
  client.stop();
  Serial.println(F("Command disconnected"));

  return 1;
}

byte eRcv() {
  byte respCode;
  byte b;

  while (!client.available()) delay(1);
  respCode = client.peek();
  outCount = 0;
  while (client.available()) {  
    b = client.read();    
    Serial.write(b); 
    if (outCount < 127) {
      outBuf[outCount] = b;
      outCount++;      
      outBuf[outCount] = 0;
    }
  }

  if (respCode >= '4') {
    ftperror();
    return 0;  
  }

  return 1;
}

void ftperror() {
  byte b = 0;
  client.println(F("QUIT"));
  while (!client.available()) delay(1);
  while (client.available()) {  
    b = client.read();    
    Serial.write(b);
  }

  client.stop();
  Serial.println(F("disconnected"));  
}

void generateFileName(char* fname) {
  // Ottiene la data e l'ora correnti
  String dateTime = getDateTime();
  // Costruisce il nome del file usando la data e l'ora correnti
  sprintf(fname, "%s/%s.log", fold, dateTime.c_str());
}

String getDateTime() {
  // Ottiene la data e l'ora correnti
  String dateTime;
  dateTime += year();
  dateTime += '-';
  if (month() < 10) dateTime += '0';
  dateTime += month();
  dateTime += '-';
  if (day() < 10) dateTime += '0';
  dateTime += day();
  dateTime += '-';
  if (hour() < 10) dateTime += '0';
  dateTime += hour();
  dateTime += '-';
  if (minute() < 10) dateTime += '0';
  dateTime += minute();
  dateTime += '-';
  if (second() < 10) dateTime += '0';
  dateTime += second();
  return dateTime;
}
/*--------------------------------------------------------------------------------------------------*/




/*--------------------------------------------------------------------------------------------------*/
#include <SPI.h>
#include <Ethernet.h>
#include <TimeLib.h> // Aggiungi la libreria TimeLib.h

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };

IPAddress server(82, 223, 8, 163); // Indirizzo IP del server
char user[] = "gsm";
char pasw[] = "gsm2024";
char fold[] = "/var/www/html/gsm/processedLog";
char fname[20]; // Dichiarazione della variabile per il nome del file

EthernetClient client;

void setup() {
  Serial.begin(9600);
  Ethernet.begin(mac);
  delay(1000); // attendi che la connessione sia stabilita
}

void loop() {
  // Dati da inviare al server PHP
  String timestamp = getTimestamp(); // Ottieni il timestamp corrente
  String logData = "Log data from Arduino";

  if (client.connect(server, 80)) {
    Serial.println("Connected to server");
    client.print("POST /receive_data.php HTTP/1.1\r\n");
    client.print("Host: 82.223.8.163\r\n"); // Indirizzo IP del server
    client.print("Content-Type: application/x-www-form-urlencoded\r\n");
    client.print("Content-Length: ");
    client.print(logData.length() + timestamp.length() + 23); // Lunghezza totale dei dati
    client.print("\r\n\r\n");

    // Invio dei dati POST
    client.print("timestamp=");
    client.print(timestamp);
    client.print("&data=");
    client.print(logData);

    delay(500); // Attendi il completamento della trasmissione
    client.stop();
    Serial.println("Data sent to server");
  } else {
    Serial.println("Unable to connect to server");
  }

  delay(5000); // Attendere 5 secondi prima di inviare nuovamente i dati
}

String getTimestamp() {
  // Ottieni l'istante corrente
  time_t now = now();

  // Formatta il timestamp come stringa
  String timestamp = "";
  timestamp += year(now);
  timestamp += "-";
  if (month(now) < 10) timestamp += "0";
  timestamp += month(now);
  timestamp += "-";
  if (day(now) < 10) timestamp += "0";
  timestamp += day(now);
  timestamp += "-";
  if (hour(now) < 10) timestamp += "0";
  timestamp += hour(now);
  timestamp += ":";
  if (minute(now) < 10) timestamp += "0";
  timestamp += minute(now);
  timestamp += ":";
  if (second(now) < 10) timestamp += "0";
  timestamp += second(now);

  // Restituisci il timestamp
  return timestamp;
}
/*--------------------------------------------------------------------------------------------------*/



/*--------------------------------------------------------------------------------------------------*/
/*
 * Misuratore di potenza e corrente elettrica con SCT-013-030 e invio dati su server Apache
*/
// #include <Ethernet.h>
// #include <SPI.h>

// byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };  // default
// //byte ip[] = { 10, 0, 0, 177 };
// byte server[] = { 82, 223, 8, 163 }; // sftp server

// EthernetClient client;

// void setup()
// {
//   Ethernet.begin(mac);
//   Serial.begin(9600);

//   delay(1000);
//   Serial.println("connecting...");
//   Serial.println("my IP: ", Ethernet.gatewayIP());

//   if (client.connect(server, 80)) {
//     Serial.println("connected");
//     client.println("GET /search?q=arduino HTTP/1.0");
//     client.println();
//   } else {
//     Serial.println("connection failed");
//   }
// }

// void loop()
// {
//   if (client.available()) {
//     char c = client.read();
//     Serial.print(c);
//   }

//   if (!client.connected()) {
//     Serial.println();
//     Serial.println("...disconnecting...");
//     client.stop();
//     for(;;)
//       ;
//   }
// }
/*--------------------------------------------------------------------------------------------------*/




/*--------------------------------------------------------------------------------------------------*/
// #include <Ethernet.h>
// #include <SPI.h>
// #include <TimeLib.h>

// // Configurazione Ethernet
// byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
// IPAddress server(82, 223, 8, 163); // IP del server PHP

// EthernetClient client;

// void setup() {
//   Ethernet.begin(mac);
//   Serial.begin(9600);
//   delay(1000);

//   Serial.println("connecting...");
//   Serial.print("my IP: ");
//   Serial.println(Ethernet.localIP());

//   // Imposta l'ora iniziale (questo dovrebbe essere sincronizzato con un server NTP o RTC nel progetto reale)
//   setTime(1622534400); // Esempio di timestamp Unix
// }

// void loop() {
//   if (client.connect(server, 80)) {
//     Serial.println("connected");

//     // Ottieni il timestamp corrente
//     char timestamp[20];
//     sprintf(timestamp, "%04d-%02d-%02d-%02d:%02d:%02d", year(), month(), day(), hour(), minute(), second());

//     // Dati da inviare
//     String logData = "Your log data here"; // dati sensore (log, 0/1)
//     String url = "/var/www/html/gsm/receiveData.php"; // percorso file php per l'upload a processedLog

//     // Dati con timestamp
//     String postData = "timestamp=" + String(timestamp) + "&data=" + logData;

//     // Invio della richiesta HTTP POST
//     client.println("POST " + url + " HTTP/1.1");
//     client.println("Host: 82.223.8.163");
//     client.println("Content-Type: application/x-www-form-urlencoded");
//     client.print("Content-Length: ");
//     client.println(postData.length());
//     client.println();
//     client.println(postData);

//     // Attendere la risposta del server
//     while (client.connected()) {
//       if (client.available()) {
//         char c = client.read();
//         Serial.print(c);
//       }
//     }
//     client.stop();
//     Serial.println();
//     Serial.println("...disconnected...");
//   } else {
//     Serial.println("connection failed");
//   }
//   delay(1000); // 1 min
// }
/*--------------------------------------------------------------------------------------------------*/



/*--------------------------------------------------------------------------------------------------*/
// #include <Ethernet.h>
// #include <SPI.h>
// #include <TimeLib.h> // Da aggiungere
// #include <ArduinoFtpClient.h>  // Da aggiungere

// // Configurazione Ethernet
// byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
// IPAddress server(82, 223, 8, 163); // IP server PHP

// EthernetClient ethClient;
// FtpClient ftpClient(ethClient);  // Oggetto ethClient per l'FTP

// void setup() {
//   Ethernet.begin(mac);
//   Serial.begin(9600);
//   delay(1000);

//   Serial.println("connecting...");
//   Serial.print("my IP: ");
//   Serial.println(Ethernet.localIP());

//   // Ora iniziale (questo dovrebbe essere sincronizzato con un server NTP o RTC nel progetto reale)
//   setTime(1622534400); // Esempio di timestamp Unix

//   // Connettiti al server FTP
//   if (ftpClient.begin("82.223.8.163", 22, "gsm", "gsm2024")) {
//     Serial.println("FTP connection established");

//     // Invia i dati del log al file sul server FTP
//     if (ftpClient.openFile("/var/www/html/gsm/receiveData.php", FTPClient::WRITE)) {
//       Serial.println("File opened successfully");
//       // Dati del log
//       String logData = "Your log data here"; // sostituisci con i tuoi dati di log
//       ftpClient.println(logData); // Invia i dati al file PHP
//       ftpClient.closeFile(); // Chiudi il file dopo aver inviato i dati
//     } else {
//       Serial.println("Failed to open file");
//     }
//     ftpClient.end();
//   } else {
//     Serial.println("FTP connection failed");
//   }
// }

// void loop() {
//   delay(1000); // Timeout
// }
/*--------------------------------------------------------------------------------------------------*/
