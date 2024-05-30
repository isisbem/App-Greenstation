<?php
include 'database.php';

$logData = []; // Initialize an empty array for log data
if ($sftp->login('gsm', 'gsm2024')) {
    $remoteDir = '/var/www/html/gsm/processedLog/';
    $files = $sftp->nlist($remoteDir);

    if ($files === false) {
        echo "Failed to list files in the remote directory.\n";
        echo "Error: " . $sftp->getLastSFTPError() . "\n";
    } else {
        $files = array_filter($files, function ($file) {
            return !preg_match('/\.\.$/', $file);
        });

        rsort($files);

        if (empty($files)) {
            echo "No files found in the remote directory.\n";
        } else {
            $mostRecentFile = $files[0];
            $fileContent = $sftp->get($remoteDir . $mostRecentFile);

            if ($fileContent === false) {
                echo "Failed to retrieve content of the most recent file.\n";
                echo "Error: " . $sftp->getLastSFTPError() . "\n";
            } else {
                // Process file content to extract log data
                // Assuming the file contains log data in a certain format
                // For example, each line represents a log entry
                $lines = explode("\n", $fileContent);
                foreach ($lines as $line) {
                    // Process each line to extract status
                    // For example, assuming each line contains 0 or 1 representing status
                    $status = intval($line); // Convert string to integer
                    $logData[] = $status;
                }
            }
        }
    }
} else {
    echo "Failed to connect to the SFTP server.\n";
}
?>
