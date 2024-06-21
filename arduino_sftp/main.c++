#include <SPI.h>
#include <Ethernet.h>

// Configurazione rete
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
IPAddress ip(192, 168, 1, 177);
IPAddress server(82, 223, 8, 163);
EthernetClient client;

// Credenziali FTP
const char* ftpUser = "gsm";
const char* ftpPassword = "gsm2024";
const char* ftpDir = "gsm"; // Percorso relativo dalla root
const char* logFileName = "logfile.log";
const char* fileContent = "ciao";

void setup() {
  Serial.begin(9600);

  // Inizializza Ethernet
  Ethernet.begin(mac, ip);
  delay(1000);
  Serial.println("Ethernet initialized");

  // Connessione al server FTP
  if (client.connect(server, 21)) {
    Serial.println("Connesso al server FTP");

    // Attendi il messaggio di benvenuto
    if (!readResponse(220)) return;

    // Invia il nome utente
    sendCommand("USER " + String(ftpUser));
    if (!readResponse(331)) return;

    // Invia la password
    sendCommand("PASS " + String(ftpPassword));
    if (!readResponse(230)) return;

    // Elenca la directory corrente
    sendCommand("PWD");
    if (!readResponse(257)) return;

    // Cambia directory relativa
    if (changeDirectory(ftpDir)) {
      // Directory cambiata con successo
      Serial.println("Directory cambiata con successo");

      // Imposta modalità passiva
      sendCommand("PASV");
      if (!readResponse(227)) return;

      // Estrai l'indirizzo IP e la porta dalla risposta
      IPAddress pasvIp;
      uint16_t pasvPort;
      if (!extractPasvIpPort(pasvIp, pasvPort)) return;

      // Connessione dati in modalità passiva
      EthernetClient dataClient;
      if (!dataClient.connect(pasvIp, pasvPort)) {
        Serial.println("Errore nella connessione dati");
        return;
      }

      // Invia comando STOR per iniziare il trasferimento del file
      sendCommand("STOR " + String(logFileName));
      if (!readResponse(150)) return;

      // Invia il contenuto del file
      dataClient.print(fileContent);
      dataClient.stop();

      // Attendi la conferma del completamento del trasferimento
      if (!readResponse(226)) return;

      // Chiude la connessione al server FTP
      sendCommand("QUIT");
      if (!readResponse(221)) return;

      Serial.println("File caricato con successo");
    } else {
      Serial.println("Errore nel cambiare directory a " + String(ftpDir));
    }
  } else {
    Serial.println("Errore nella connessione al server FTP");
  }
}

void loop() {
  // Non c'è bisogno di nulla nel loop
}

void sendCommand(String command) {
  client.println(command);
  Serial.println(">> " + command);
}

bool readResponse(int expectedCode) {
  while (!client.available()) {
    delay(1);
  }
  String response = client.readStringUntil('\n');
  Serial.println("<< " + response);
  int code = response.substring(0, 3).toInt();
  return code == expectedCode;
}

bool extractPasvIpPort(IPAddress& pasvIp, uint16_t& pasvPort) {
  String response = client.readStringUntil('\n');
  Serial.println("<< " + response);

  int idx1 = response.indexOf('(');
  int idx2 = response.indexOf(')', idx1 + 1);
  if (idx1 == -1 || idx2 == -1) return false;

  String pasvData = response.substring(idx1 + 1, idx2);
  int parts[6];
  int idx = 0;

  for (int i = 0; i < 6; i++) {
    int foundIdx = pasvData.indexOf(',', idx);
    if (foundIdx == -1 && i < 5) return false;
    parts[i] = pasvData.substring(idx, foundIdx).toInt();
    idx = foundIdx + 1;
  }

  pasvIp = IPAddress(parts[0], parts[1], parts[2], parts[3]);
  pasvPort = parts[4] * 256 + parts[5];
  return true;
}

bool changeDirectory(String dir) {
  sendCommand("CWD " + dir);
  return readResponse(250);
}



// #include <SPI.h>
// #include <Ethernet.h>

// byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED }; // Replace with your MAC address
// IPAddress server(82, 223, 8, 163); // Replace with your FTP server IP address
// EthernetClient client;

// int logNumber = 1;

// void setup() {
//   Ethernet.begin(mac);
//   Serial.begin(9600);
//   delay(1000); // Allow time to initialize Ethernet
// }

// void loop() {
//   // Generate your log file here
//   String logData = generateLogFile();

//   // Create file name with incrementing number
//   String fileName = "/processedLog/log" + String(logNumber++) + ".log";

//   // Send log file via FTP
//   if (client.connect(server, 21)) {
//     client.println("USER gsm");
//     client.println("PASS gsm2024");
//     client.println("PASV");
//     client.println("STOR " + fileName);
//     client.println(logData);
//     client.println(".");  // End of file
//     client.stop();
//     Serial.println("File " + fileName + " sent successfully via FTP");
//   } else {
//     Serial.println("Failed to connect to FTP server");
//   }

//   // Wait for the next minute
//   delay(60000);
// }

// String generateLogFile() {
//   // Generate your log data here (e.g., sensor readings, system status)
//   // Return the log data as a String
//   return "Sample log data";
// }
