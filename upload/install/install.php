<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
$passweb = '';
$getDirectory = dirname(__DIR__) . "/";


$host = '';
$user = '';
$password = '';
$database = '';
$prefix = '';
$adminDir = 'admin';
$adminUsername = '';
$adminPassword = '';

// Function to execute SQL file
function getTotalKeys(string $filename)
{
    $outputFile = $filename . '.bin';
    if (!file_exists($outputFile)) {
        throw new Exception("Database file not found.");
    }
    $handle = fopen($outputFile, 'rb');
    if (!$handle) {
        throw new Exception("Unable to open database file.");
    }
    $indexSize = unpack('N', fread($handle, 4))[1];
    unpack('N', fread($handle, 4))[1];
    $Index = fread($handle, $indexSize);
    fclose($handle);
    $indexData = gzuncompress($Index);
    $index = unserialize($indexData);
    return count($index);
}


function readVentoCartDBKey(string $filename, string $key)
{
    $outputFile = $filename . '.bin';
    if (!file_exists($outputFile)) {
        throw new Exception("Database file not found.");
    }
    $handle = fopen($outputFile, 'rb');
    if (!$handle) {
        throw new Exception("Unable to open database.");
    }
    $indexSize = unpack('N', fread($handle, 4))[1];
    $binarySize = unpack('N', fread($handle, 4))[1];

    $indexData = gzuncompress(fread($handle, $indexSize));
    $binaryData = gzuncompress(fread($handle, $binarySize));
    fclose($handle);
    $index = unserialize($indexData);
    if (!isset($index[$key])) {
        throw new Exception("Key not found.");
    }
    $offset = $index[$key]['offset'];
    $length = $index[$key]['length'];
    $data = substr($binaryData, $offset, $length);
    return unserialize($data);
}


function executeSqlFile($dbConnection)
{

    global $password, $database, $user, $host, $prefix, $appConfig, $adminConfig, $getDirectory, $passweb, $adminEmail, $adminUsername, $adminEmail, $weburl, $adminDir;

    $total = getTotalKeys("database");
    $page = isset($_GET['page']) ? $_GET['page'] : 0;
    $perPage = 20;
    $totalPages = ceil($total / $perPage);
    $start = ($page - 1) * $perPage;
    $end = min($start + $perPage, $total);
    mysqli_query($dbConnection, 'SET foreign_key_checks = 0;');

    if ($page <= $totalPages) {
        for ($i = $start; $i < $end; $i++) {
            $query = readVentoCartDBKey('database', (string) $i);
            $add = str_replace('ve_', $prefix . "_", $query);

            $dbConnection->query($add);

        }
    }
    if ($page >= $totalPages) {
        sleep(1);
        // Manually execute additional queries
        $additionalQuery2 = "INSERT INTO `" . $prefix . "_user` (`user_id`, `user_group_id`, `username`, `password`, `firstname`, `lastname`, `email`, `image`, `code`, `ip`, `status`, `date_added`) VALUES
        (1, 1, '" . $adminUsername . "', '" . $passweb . "', 'John', 'Doe', '" . $adminEmail . "', '', '', '127.0.0.1', 1, '2023-12-02 14:48:28')";
        mysqli_query($dbConnection, $additionalQuery2) or die('Error: 2 ' . mysqli_error($dbConnection));
        setupConfigurations($appConfig, $adminConfig, $weburl, $host, $user, $password, $database, $prefix, $getDirectory, $adminDir);
    }
    echo json_encode([
        'status' => 'installing',
        'page' => $page,
        'total' => $totalPages,
    ]);
}
function generateRandomString($length = 10)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

function setupConfigurations($appConfig, $adminConfig, $weburl, $host, $user, $password, $database, $prefix, $getDirectory, $adminDir)
{
    global $password, $database, $user, $host, $prefix, $appConfig, $adminConfig, $getDirectory, $passweb, $adminEmail, $adminUsername, $adminEmail, $weburl, $adminDir;

    //Set up front config
    $mainconfig = file_get_contents($appConfig);
    $weburl = rtrim($weburl, '/') . "/";
    $serverSecret = generateRandomString(100);

    $mainconfig = setConfigValue($mainconfig, 'HTTP_SERVER', $weburl);
    $mainconfig = setConfigValue($mainconfig, 'DB_HOSTNAME', $host);
    $mainconfig = setConfigValue($mainconfig, 'DB_USERNAME', $user);
    $mainconfig = setConfigValue($mainconfig, 'DB_PASSWORD', $password);
    $mainconfig = setConfigValue($mainconfig, 'DB_DATABASE', $database);
    $mainconfig = setConfigValue($mainconfig, 'DB_PREFIX', $prefix . "_");
    $mainconfig = setConfigValue($mainconfig, 'DIR_VENTOCART', $getDirectory);

    $mainconfig = setConfigValue($mainconfig, 'SERVER_SECRET', $serverSecret);
    $mainconfig = file_put_contents($appConfig, $mainconfig);

    //Set up admin config
    $mainconfig = file_get_contents($adminConfig);
    $weburl = rtrim($weburl, "/");
    $weburlad = $weburl . "/" . $adminDir . "/";

    $mainconfig = setConfigValue($mainconfig, 'HTTP_SERVER', $weburlad);
    $mainconfig = setConfigValue($mainconfig, 'DB_HOSTNAME', $host);
    $mainconfig = setConfigValue($mainconfig, 'DB_USERNAME', $user);
    $mainconfig = setConfigValue($mainconfig, 'DB_PASSWORD', $password);
    $mainconfig = setConfigValue($mainconfig, 'DB_DATABASE', $database);
    $mainconfig = setConfigValue($mainconfig, 'DB_PREFIX', $prefix . "_");
    $mainconfig = setConfigValue($mainconfig, 'HTTP_CATALOG', $weburl . "/");
    $mainconfig = setConfigValue($mainconfig, 'DIR_VENTOCART', $getDirectory);
    $mainconfig = setConfigValue($mainconfig, 'DIR_APPLICATION', $adminDir);

    file_put_contents($adminConfig, $mainconfig);
    //rename admin directory
    recursiveRenameDirectory("../admin", "../" . $adminDir);
    sleep(2);
    recursiveDeleteDirectory('../install');
}

// Check if it's an AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax'])) {


    // Get data from AJAX POST request
    $host = $_POST['host'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $database = $_POST['database'];
    $prefix = $_POST['prefix'];
    $weburl = $_POST['weburl'];
    $adminDir = $_POST['adminDir'];
    $adminUsername = $_POST['adminUsername'];
    $adminPassword = $_POST['adminPassword'];
    $adminPasswordconfirm = $_POST['adminPasswordconfirm'];


    if ($adminPassword != $adminPasswordconfirm) {
        echo json_encode(["status" => "Failed", "message" => "Wrong Admin password confirmation"]);
        exit();
    } else {
        $passweb = password_hash(html_entity_decode($adminPassword, ENT_QUOTES, 'UTF-8'), PASSWORD_DEFAULT);
    }
    $adminEmail = $_POST['adminEmail'];



    // Validate that config files exist

    $appConfig = $getDirectory . "/config.php";
    $adminConfig = $getDirectory . "/admin/config.php";

    if (!file_exists($adminConfig)) {
        // Send JSON response
        echo json_encode(["status" => "Failed", "message" => "Admin config not found"]);
        exit();
    }

    if (!file_exists($appConfig)) {
        // Send JSON response
        echo json_encode(["status" => "Failed", "message" => "Config not found"]);
        exit();
    }

    // Connect to the database
    try {
        $dbConnection = new mysqli($host, $user, $password, $database);

        if ($dbConnection->connect_error) {
            throw new Exception("Connection failed: " . $dbConnection->connect_error);
        }

    } catch (mysqli_sql_exception $e) {
        // Send JSON response for database connection error
        echo json_encode(["status" => "Failed", "message" => $e->getMessage()]);
        exit();
    } catch (Exception $e) {
        // Send JSON response for other exceptions
        echo json_encode(["status" => "Failed", "message" => $e->getMessage()]);
        exit();
    }

    // Get all table names in the database
    if (isset($_GET['page']) && $_GET['page'] == 1) {
        $result = $dbConnection->query("SHOW TABLES");
        $tables = [];

        while ($row = $result->fetch_row()) {
            $tables[] = $row[0];
        }

        // Drop each table
        foreach ($tables as $table) {
            if (strpos($table, $prefix . "_") === 0) {
                $dbConnection->query('SET FOREIGN_KEY_CHECKS=0');
                $dbConnection->query("DROP TABLE IF EXISTS $table");
            }
        }
    }

    if (!is_writable($getDirectory)) {
        echo json_encode(["status" => "Failed", "message" => "Error: Write permissions are required."]);


        exit();
    }

    // Install the database.sql file
    executeSqlFile($dbConnection);

}


function setConfigValue($config, $setting, $newvalue)
{
    if ($setting == 'DIR_APPLICATION')
        return str_replace('admin', $newvalue, $config);
    return preg_replace("/define\('" . $setting . "',\s*'[^']*'\);/s", "define('" . $setting . "', '{$newvalue}');", $config);
}



function recursiveRenameDirectory($oldPath, $newPath)
{
    // Open the old directory
    if (!is_dir($oldPath)) {
        return false; // Directory doesn't exist
    }

    $dirHandle = opendir($oldPath);

    // Create the new directory
    if (!mkdir($newPath) && !is_dir($newPath)) {
        return false; // Failed to create the new directory
    }

    // Loop through the old directory
    while (($file = readdir($dirHandle)) !== false) {
        if ($file != "." && $file != "..") {
            $oldFilePath = $oldPath . '/' . $file;
            $newFilePath = $newPath . '/' . $file;

            // Check if it's a directory
            if (is_dir($oldFilePath)) {
                // Recursive call for subdirectories
                if (!recursiveRenameDirectory($oldFilePath, $newFilePath)) {
                    closedir($dirHandle);
                    return false;
                }
            } else {
                // Rename files
                if (!rename($oldFilePath, $newFilePath)) {
                    closedir($dirHandle);
                    return false;
                }
            }
        }
    }

    // Close the directory handle
    closedir($dirHandle);

    // Remove the old directory
    if (!rmdir($oldPath)) {
        return false; // Failed to remove the old directory
    }

    return true;
}

function recursiveDeleteDirectory($path)
{
    if (!is_dir($path)) {
        return false; // Not a directory
    }

    $dirHandle = opendir($path);

    // Loop through the directory
    while (($file = readdir($dirHandle)) !== false) {
        if ($file != "." && $file != "..") {
            $filePath = $path . '/' . $file;

            // Check if it's a directory
            if (is_dir($filePath)) {
                // Recursive call for subdirectories
                if (!recursiveDeleteDirectory($filePath)) {
                    closedir($dirHandle);
                    return false;
                }
            } else {
                // Delete files
                if (!unlink($filePath)) {
                    closedir($dirHandle);
                    return false;
                }
            }
        }
    }

    // Close the directory handle
    closedir($dirHandle);

    // Remove the directory itself
    if (!rmdir($path)) {
        return false; // Failed to remove the directory
    }

    return true;
}




?>