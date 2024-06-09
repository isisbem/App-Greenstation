#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED }; // Replace with your MAC address
IPAddress server(82, 223, 8, 163); // Replace with your FTP server IP address
EthernetClient client;

int logNumber = 1;

void setup() {
  Ethernet.begin(mac);
  Serial.begin(9600);
  delay(1000); // Allow time to initialize Ethernet
}

void loop() {
  // Generate your log file here
  String logData = generateLogFile();

  // Create file name with incrementing number
  String fileName = "/processedLog/log" + String(logNumber++) + ".log";

  // Send log file via FTP
  if (client.connect(server, 21)) {
    client.println("USER gsm");
    client.println("PASS gsm2024");
    client.println("PASV");
    client.println("STOR " + fileName);
    client.println(logData);
    client.println(".");  // End of file
    client.stop();
    Serial.println("File " + fileName + " sent successfully via FTP");
  } else {
    Serial.println("Failed to connect to FTP server");
  }

  // Wait for the next minute
  delay(60000);
}

String generateLogFile() {
  // Generate your log data here (e.g., sensor readings, system status)
  // Return the log data as a String
  return "Sample log data";
}
