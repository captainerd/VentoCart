<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
$passweb  = '';
$getDirectory = dirname(__DIR__) . "/";
 

$host = '';
$user = '';
$password = '';
$database = '';
$prefix = '';

$adminUsername = '';
$adminPassword = '';

// Function to execute SQL file
 
function executeSqlFile($dbConnection, $sqlFile)
{
    global  $password, $database, $user, $host, $prefix, $appConfig, $adminConfig, $getDirectory, $passweb, $adminEmail,  $adminUsername, $adminEmail,  $weburl;
    $sql = file($sqlFile);
    $query = '';

    foreach ($sql as $line)	{
	
        $startWith = substr(trim($line), 0 ,2);
        $endWith = substr(trim($line), -1 ,1);
        
        if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
            continue;
        }
            
        $query = $query . $line;
        if ($endWith == ';') {
            $result = mysqli_query($dbConnection,str_replace('ve_',$prefix."_",$query));
            if (!$result) {
               
                die('Error  : ' . mysqli_error($dbConnection));
            }
            $query= '';		
        }
    }
// Manually execute additional queries
$additionalQuery1 = "TRUNCATE TABLE `". $prefix . "_user`";
$additionalQuery2 = "INSERT INTO `" . $prefix . "_user` (`user_id`, `user_group_id`, `username`, `password`, `firstname`, `lastname`, `email`, `image`, `code`, `ip`, `status`, `date_added`) VALUES
(1, 1, '". $adminUsername . "', '" .$passweb . "', 'John', 'Doe', '". $adminEmail. "', '', '', '127.0.0.1', 1, '2023-12-02 14:48:28')";
mysqli_query($dbConnection, $additionalQuery1) or die('Error: 1 ' . mysqli_error($dbConnection));
mysqli_query($dbConnection, $additionalQuery2) or die('Error: 2 ' . mysqli_error($dbConnection));


//Set up front config
$mainconfig = file_get_contents($appConfig);
$weburl = rtrim($weburl, '/') . "/";

$mainconfig = setConfigValue($mainconfig, 'HTTP_SERVER', $weburl);
$mainconfig = setConfigValue($mainconfig, 'DB_HOSTNAME', $host);
$mainconfig = setConfigValue($mainconfig, 'DB_USERNAME', $user);
$mainconfig = setConfigValue($mainconfig, 'DB_PASSWORD', $password);
$mainconfig = setConfigValue($mainconfig, 'DB_DATABASE', $database);
$mainconfig = setConfigValue($mainconfig, 'DB_PREFIX', $prefix."_");
$mainconfig = setConfigValue($mainconfig, 'DIR_OPENCART', $getDirectory);
$mainconfig = file_put_contents($appConfig,$mainconfig);

//Set up admin config
$mainconfig = file_get_contents($adminConfig);
$weburl = rtrim($weburl, "/");
$weburlad = $weburl . "/admin/";
 
$mainconfig = setConfigValue($mainconfig, 'HTTP_SERVER', $weburlad);
$mainconfig = setConfigValue($mainconfig, 'DB_HOSTNAME', $host);
$mainconfig = setConfigValue($mainconfig, 'DB_USERNAME', $user);
$mainconfig = setConfigValue($mainconfig, 'DB_PASSWORD', $password);
$mainconfig = setConfigValue($mainconfig, 'DB_DATABASE', $database);
$mainconfig = setConfigValue($mainconfig, 'DB_PREFIX', $prefix."_");
$mainconfig = setConfigValue($mainconfig, 'HTTP_CATALOG', $weburl . "/");
$mainconfig = setConfigValue($mainconfig, 'DIR_OPENCART', $getDirectory);
 
file_put_contents($adminConfig,$mainconfig);
 
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
    $adminUsername = $_POST['adminUsername'];
    $adminPassword = $_POST['adminPassword'];
    $adminPasswordconfirm = $_POST['adminPasswordconfirm'];

    
    if ($adminPassword != $adminPasswordconfirm) {
        echo json_encode(["status" => "Failed", "message" => "Wrong Admin password confirmation"]);
        exit();
    } else {
        $passweb  = password_hash(html_entity_decode($adminPassword, ENT_QUOTES, 'UTF-8'), PASSWORD_DEFAULT);
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
    $dbConnection = new mysqli($host, $user, $password, $database);

    if (!$dbConnection) {
        // Send JSON response
        echo json_encode(["status" => "Failed", "message" => "Connection failed: " . mysqli_connect_error()]);
        exit();
    }

    // Get all table names in the database
    $result = $dbConnection->query("SHOW TABLES");
    $tables = [];

    while ($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }

    // Drop each table
    foreach ($tables as $table) {
        if (strpos($table, $prefix . "_") === 0) {
            $dbConnection->query("DROP TABLE IF EXISTS $table");
        }
    }

    if (!is_writable($getDirectory)) {
        echo json_encode(["status" => "Failed", "message" => "Error: Write permissions are required."]);


        exit();
    }  

    // Install the database.sql file
    executeSqlFile($dbConnection, 'ventocart.sql');

    // Close the database connection
    mysqli_close($dbConnection);

    echo json_encode(["status" => "Finished", "message" => "VentoCart installed successfully."]);
}


function setConfigValue($config, $setting, $newvalue) {
    return preg_replace("/define\('" . $setting . "',\s*'[^']*'\);/s", "define('" . $setting . "', '{$newvalue}');", $config);
 }

?>
