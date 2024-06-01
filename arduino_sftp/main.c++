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
#include <Ethernet.h>
#include <SPI.h>
#include <TimeLib.h> // Da aggiungere
#include <ArduinoFtpClient.h>  // Da aggiungere

// Configurazione Ethernet
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
IPAddress server(82, 223, 8, 163); // IP server PHP

EthernetClient ethClient;
FtpClient ftpClient(ethClient);  // Oggetto ethClient per l'FTP

void setup() {
  Ethernet.begin(mac);
  Serial.begin(9600);
  delay(1000);

  Serial.println("connecting...");
  Serial.print("my IP: ");
  Serial.println(Ethernet.localIP());

  // Ora iniziale (questo dovrebbe essere sincronizzato con un server NTP o RTC nel progetto reale)
  setTime(1622534400); // Esempio di timestamp Unix

  // Connettiti al server FTP
  if (ftpClient.begin("82.223.8.163", 22, "gsm", "gsm2024")) {
    Serial.println("FTP connection established");

    // Invia i dati del log al file sul server FTP
    if (ftpClient.openFile("/var/www/html/gsm/receiveData.php", FTPClient::WRITE)) {
      Serial.println("File opened successfully");
      // Dati del log
      String logData = "Your log data here"; // sostituisci con i tuoi dati di log
      ftpClient.println(logData); // Invia i dati al file PHP
      ftpClient.closeFile(); // Chiudi il file dopo aver inviato i dati
    } else {
      Serial.println("Failed to open file");
    }
    ftpClient.end();
  } else {
    Serial.println("FTP connection failed");
  }
}

void loop() {
  delay(1000); // Timeout
}
/*--------------------------------------------------------------------------------------------------*/