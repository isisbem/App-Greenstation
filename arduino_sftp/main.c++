/*
  Arduino Misuratore di potenzza e corrente elettrica con 
  * SCT-013-030
*/

#include "EmonLib.h" //Per il corretto funzionamento istallare la libreria EmonLib
#include <Wire.h>    // Libreria wire già presente in Arduino ide

// oggetto libreria Emon
EnergyMonitor emon1;
// Inserire la tensione della vostra rete elettrica
int rede = 230.0; // Italia 230V in alcuni paesi 110V  (voltage)
// Pin del sensore SCT su A1
int pin_sct = 1; // or A1

void setup()
{
  Serial.begin(9600);         // Apro la comunicazione seriale
  emon1.current(pin_sct, 29); // Pin, calibrazione - Corrente Const= Ratio/Res. Burder. 1800/62 = 29.
}

void loop()
{
  // Calcolo della corrente
  double Irms = emon1.calcIrms(1480);
  if (Irms)
  {
    // Mostra il valore della Corrente
    Serial.print("Corrente :  ");
    Serial.print(Irms); // Irms
    // Calcola e mostra i valori della Potenza
    Serial.print(" Potenza :  ");
    Serial.println(Irms * rede); // Scrivo sul monitor seriale Corrente*Tensione=Potenza
  }
  else
  {
    Serial.println("Nessun valore");
  }
  Serial.print("- - - - -");
  delay(1000);
}

/* FTP CODE */

/*
  Web client

  This sketch connects to a website (http://www.google.com)
  using an Arduino Wiznet Ethernet shield.

  Circuit:
  * Ethernet shield attached to pins 10, 11, 12, 13

  created 18 Dec 2009
  by David A. Mellis
  modified 9 Apr 2012
  by Tom Igoe, based on work by Adrian McEwen
*/

#include <SPI.h>
#include <Ethernet.h>
#include <SD.h>

File myFile;

// Enter a MAC address for your controller below.
// Newer Ethernet shields have a MAC address printed on a sticker on the shield
byte mac[] = {0x90, 0xA2, 0xDA, 0x0E, 0x07, 0xB8};
// if you don't want to use DNS (and reduce your sketch size)
// use the numeric IP instead of the name for the server:
// IPAddress server(74,125,232,128);  // numeric IP for Google (no DNS)
char server[] = "127.0.0.1"; // name address for Google (using DNS)

// Set the static IP address to use if the DHCP fails to assign
IPAddress ip(169, 254, 144, 105);

// Initialize the Ethernet client library
// with the IP address and port of the server
// that you want to connect to (port 80 is default for HTTP):
EthernetClient client;

void setup()
{
  // Open serial communications and wait for port to open:
  Serial.begin(9600);
  while (!Serial)
  {
    ; // wait for serial port to connect. Needed for Leonardo only
  }

  // start the Ethernet connection:
  if (Ethernet.begin(mac) == 0)
  {
    Serial.println("Failed to configure Ethernet using DHCP");
    // no point in carrying on, so do nothing forevermore:
    // try to congifure using IP address instead of DHCP:
    Ethernet.begin(mac, ip);
  }
  // give the Ethernet shield a second to initialize:
  delay(1000);
  Serial.println("connecting...");

  // if you get a connection, report back via serial:
  if (client.connect(server, 80))
  {
    Serial.println("connected");
    // Make a HTTP request:
    client.println("GET /upload.txt HTTP/1.1");
    client.println("Host: 127.0.0.1");
    client.println("Connection: close");
    client.println();
  }
  else
  {
    // kf you didn't get a connection to the server:
    Serial.println("connection failed");
  }
}

void loop()
{
  // if there are incoming bytes available
  // from the server, read them and print them:
  if (client.available())
  {
    while (client.available())
    {
      char c = client.read();
      myFile = SD.open("test.txt", FILE_WRITE);
      if (myFile)
      {
        Serial.print("Writing to test.txt...");
        myFile.println(c);
        Serial.print(c);
      }
      myFile.close();
    }
  }
  // if the server's disconnected, stop the client:
  if (!client.connected())
  {
    Serial.println();
    Serial.println("disconnecting.");
    client.stop();
    // do nothing forevermore:
    while (true)
      ;
  }
}