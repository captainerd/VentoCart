<?php

// Install VentoCart by uploading only a signle file to the server
// Then running example.com/install.php to download, extract etc.

$downloadUrl = "https://github.com/captainerd/VentoCart/archive/refs/heads/main.zip";
$zipFile = "file.zip";
$extractPath = "./";
$message = ''; // Variable to store messages for display

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!in_array('ini_set', explode(',', ini_get('disable_functions')))) {
    ini_set('default_socket_timeout', 9000);

}
// Step 1: Download the file if requested
if (isset($_GET['download'])) {

    deleteAllExceptInstaller(__DIR__);
    $options = [
        'http' => [
            'timeout' => 160  // Increase timeout to 60 seconds (default is 60 seconds)
        ]
    ];
    $context = stream_context_create($options);
    // Download file
    $fileContent = file_get_contents($downloadUrl, false, $context);
    if ($fileContent === false) {
        $message = "<div class='alert alert-danger'>Failed to download the file.</div>";
    } else {
        file_put_contents($zipFile, $fileContent);

        // After download, redirect to the page with an extraction flag
        $message = "<p><div class='alert alert-success'>Download successful! Redirecting to extraction...</div></p>";
        $message .= "<script>setTimeout(function(){ window.location.href = '?extract=1'; }, 2000);</script>";
    }
}

// Step 2: Extract the file if requested
if (isset($_GET['extract'])) {
    if (!file_exists($zipFile)) {
        $message = '<div class="alert alert-danger">ZIP file not found.</div>';
    } else {
        $zip = new ZipArchive;
        if ($zip->open($zipFile) === TRUE) {
            $baseFolder = 'VentoCart-main/upload/';
            $extractPath = rtrim($extractPath, '/') . '/'; // Ensure trailing slash
            // Extract only files inside 'VentoCart-main/upload/'
            $extractResult = $zip->extractTo($extractPath);
            // Close the ZIP file
            $zip->close();

            // Display the result message
            if ($extractResult) {
                // Remove the base folder from the extracted files
                foreach (glob($extractPath . $baseFolder . '*') as $file) {
                    $newPath = $extractPath . basename($file);
                    rename($file, $newPath);
                }

                // Clean up: remove the empty base folder
                deleteAllExceptInstaller($extractPath . 'VentoCart-main', false);
                rmdir('VentoCart-main');
                $message = ' <p><div class="alert alert-success">Extraction successful! Redirecting...</div></p>';
                $message .= "<script>setTimeout(function(){ window.location.href = '/index.php'; }, 2000);</script>";
            } else {
                $message = '<div class="alert alert-danger">Extraction failed.</div>';
            }
        } else {
            $message = '<div class="alert alert-danger">Failed to open ZIP file.</div>';
        }
    }
}


// Function to delete all files except installer.php
function deleteAllExceptInstaller($dir, $except = true)
{

    $files = array_diff(scandir($dir), ['.', '..']); // Get all files/folders except . and ..
    foreach ($files as $file) {
        $filePath = $dir . DIRECTORY_SEPARATOR . $file;
        // Skip only the root-level "installer.php"
        if ($except && $file === 'installer.php' && realpath($filePath) === realpath(__DIR__ . '/installer.php')) {
            continue;
        }
        if (is_dir($filePath)) {
            deleteAllExceptInstaller($filePath); // Recursively delete subdirectories
            if (count(scandir($filePath)) === 2) { // If empty, delete it
                rmdir($filePath);
            }
        } else {
            unlink($filePath); // Delete files
        }
    }
}


function checkPermissions($fold)
{
    return is_dir($fold) && is_readable($fold) && is_writable($fold) && @touch($fold . '/testfile') && @unlink($fold . '/testfile');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VentoCart OnFile Install</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center justify-content-center" style="height: 100vh; background-color: #f8f9fa;">
    <div class="container text-center">
        <div class="card shadow-lg p-4">
            <h1 class="mb-3">VentoCart OnFile Install</h1>
            <div class="alert alert-info">This installer will delete all files from the current directory, download the
                latest VentoCart files from the repo, and will run the installer automatically.
            </div>

            <!-- Displaying dynamic message -->
            <?php if ($message): ?>
                <div class="mt-3"><?php echo $message; ?></div>
            <?php endif; ?>

            <?php if (!checkPermissions($extractPath)): ?>
                <!-- Show a disabled red button if permissions are not sufficient -->
                <button class="btn btn-danger btn-lg" disabled>
                    Insufficient Extract Path Permissions to Proceed
                </button>
            <?php else: ?>
                <!-- Show the "Download and Install" button if permissions are good -->
                <a class="btn btn-primary btn-lg" href="?download=1">Download and Install</a>
            <?php endif; ?>
        </div>
    </div>



</body>

</html>