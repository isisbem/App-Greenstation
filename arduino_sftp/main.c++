// nome pensilina: SOLAR MPPT 250/100
// marca pensilina: VICTRON ENERGY

// sftp collegamento dalla pensilina al server
// libreria usata: SimpleFTPServer (https://www.arduino.cc/reference/en/libraries/simpleftpserver/)

/*
 * Upload firmware or filesystem (LittleFS) with FtpServer (esp8266 with SD)
 * when uploaded start automatic Update and reboot
 *
 * AUTHOR:  Renzo Mischianti
 *
 * https://mischianti.org/
*/

#include <ESP8266WiFi.h>
#include <SD.h>
#include <LittleFS.h>

#include <SimpleFTPServer.h>

const char *ssid = "<YOUR-SSID>";
const char *password = "<YOUR-PASSWD>";

FtpServer ftpSrv; // set #define FTP_DEBUG in ESP8266FtpServer.h to see ftp verbose on serial

bool isFirmwareUploaded = false;
bool isFilesystemUploaded = false;

void progressCallBack(size_t currSize, size_t totalSize)
{
  Serial.printf("CALLBACK:  Update process at %d of %d bytes...\n", currSize, totalSize);
}

#define FIRMWARE_VERSION 0.2
String FILESYSTEM_VERSION = "0.0";

void _callback(FtpOperation ftpOperation, unsigned int freeSpace, unsigned int totalSpace)
{
  switch (ftpOperation)
  {
  case FTP_CONNECT:
    Serial.println(F("FTP: Connected!"));
    break;
  case FTP_DISCONNECT:
    Serial.println(F("FTP: Disconnected!"));
    break;
  case FTP_FREE_SPACE_CHANGE:
    if (isFirmwareUploaded)
    {
      Serial.println(F("The uploaded firmware now stored in FS!"));
      Serial.print(F("\nSearch for firmware in FS.."));
      String name = "firmware.bin";
      File firmware = SD.open(name, FTP_FILE_READ);
      if (firmware)
      {
        Serial.println(F("found!"));
        Serial.println(F("Try to update!"));

        Update.onProgress(progressCallBack);

        Update.begin(firmware.size(), U_FLASH);
        Update.writeStream(firmware);
        if (Update.end())
        {
          Serial.println(F("Update finished!"));
        }
        else
        {
          Serial.println(F("Update error!"));
          Serial.println(Update.getError());
        }

        firmware.close();

        String renamed = name;
        renamed.replace(".bin", ".bak");
        if (SD.rename(name, renamed.c_str()))
        {
          Serial.println(F("Firmware rename succesfully!"));
        }
        else
        {
          Serial.println(F("Firmware rename error!"));
        }
        delay(2000);

        ESP.reset();
      }
      else
      {
        Serial.println(F("not found!"));
      }
      // isFirmwareUploaded = false; // not need by reset
    }
    if (isFilesystemUploaded)
    {
      Serial.println(F("The uploaded Filesystem now stored in FS!"));
      Serial.print(F("\nSearch for Filesystem in FS.."));
      String name = "filesystem.bin";
      File filesystem = SD.open(name, FTP_FILE_READ);
      if (filesystem)
      {
        Serial.println(F("found!"));
        Serial.println(F("Try to update!"));

        Update.onProgress(progressCallBack);

        Update.begin(filesystem.size(), U_FS);
        Update.writeStream(filesystem);
        if (Update.end())
        {
          Serial.println(F("Update finished!"));
        }
        else
        {
          Serial.println(F("Update error!"));
          Serial.println(Update.getError());
        }

        filesystem.close();

        String renamed = name;
        renamed.replace(".bin", ".bak");
        if (SD.rename(name, renamed.c_str()))
        {
          Serial.println(F("Filesystem rename succesfully!"));
        }
        else
        {
          Serial.println(F("Filesystem rename error!"));
        }
        delay(2000);

        ESP.reset();
      }
      else
      {
        Serial.println(F("not found!"));
      }
      // isFilesystemUploaded = false; // not need by reset
    }
    Serial.printf("FTP: Free space change, free %u of %u!\n", freeSpace, totalSpace);
    break;
  default:
    break;
  }
};
void _transferCallback(FtpTransferOperation ftpOperation, const char *name, unsigned int transferredSize)
{
  switch (ftpOperation)
  {
  case FTP_UPLOAD_START:
    Serial.println(F("FTP: Upload start!"));
    break;
  case FTP_UPLOAD:
    Serial.printf("FTP: Upload of file %s byte %u\n", name, transferredSize);
    break;
  case FTP_TRANSFER_STOP:
    Serial.println(F("FTP: Finish transfer!"));
    break;
  case FTP_TRANSFER_ERROR:
    Serial.println(F("FTP: Transfer error!"));
    break;
  default:
    break;
  }

  /* FTP_UPLOAD_START = 0,
   * FTP_UPLOAD = 1,
   *
   * FTP_DOWNLOAD_START = 2,
   * FTP_DOWNLOAD = 3,
   *
   * FTP_TRANSFER_STOP = 4,
   * FTP_DOWNLOAD_STOP = 4,
   * FTP_UPLOAD_STOP = 4,
   *
   * FTP_TRANSFER_ERROR = 5,
   * FTP_DOWNLOAD_ERROR = 5,
   * FTP_UPLOAD_ERROR = 5
   */

  if (ftpOperation == FTP_UPLOAD_STOP && String(name).indexOf("firmware.bin") >= 0)
  {
    isFirmwareUploaded = true;
  }
  if (ftpOperation == FTP_UPLOAD_STOP && String(name).indexOf("filesystem.bin") >= 0)
  {
    isFilesystemUploaded = true;
  }
};

void setup(void)
{
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  Serial.println("");

  // Wait for connection
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

  ftpSrv.setCallback(_callback);
  ftpSrv.setTransferCallback(_transferCallback);

  Serial.print(F("Inizializing FS..."));
  if (LittleFS.begin())
  {
    Serial.println(F("done."));
  }
  else
  {
    Serial.println(F("fail."));
  }

  Serial.print(F("FileSystem version "));
  File versionFile = LittleFS.open(F("/version.txt"), "r");
  if (versionFile)
  {
    FILESYSTEM_VERSION = versionFile.readString();
    versionFile.close();
  }
  Serial.println(FILESYSTEM_VERSION);

  /////FTP Setup, ensure SD is started before ftp;  /////////
  if (SD.begin(SS))
  {
    Serial.println("SD opened!");
    Serial.print(F("\nCurrent firmware version: "));
    Serial.println(FIRMWARE_VERSION);

    ftpSrv.begin("esp8266", "esp8266"); // username, password for ftp.   (default 21, 50009 for PASV)
  }
}
void loop(void)
{
  ftpSrv.handleFTP(); // make sure in loop you call handleFTP()!!
  // server.handleClient();   //example if running a webserver you still need to call .handleClient();
}