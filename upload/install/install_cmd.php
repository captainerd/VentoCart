<?php

$getDirectory = dirname(__DIR__) . "/";

$appConfig = $getDirectory."/config.php";
$adminConfig = $getDirectory."/admin/config.php";

if (!file_exists($adminConfig)) {
    die("\nError: Admin config not found\n\n");
}
if (!file_exists($appConfig)) {
    die("\nError: Config not found\n\n");
   
}

// Get database details from the user
$host = readline("Enter the database server host: ");
$user = readline("Enter the database username: ");
$password = readline("Enter the database password: ");
$database = readline("Enter the database name: ");
$prefix = readline("Enter the database prefix: ");
 

// Function to execute SQL file
function executeSqlFile($dbConnection, $sqlFile)
{
    global $prefix, $appConfig, $adminConfig, $database, $password, $user, $host, $getDirectory;
    $sql = file($sqlFile);
    $query = '';

    $passweb = '';

    $username = readline("Desired admin username: ");
$webpass = readline("Desired admin password: ");
$webpass2 = readline("Type again the desired password: ");
$email = readline("Type your e-mail: ");
$domain = readline("Enter the website URL including http(s):");

if ($webpass !== $webpass2) {
    echo "Wrong password";
    return;
} else {
    $passweb  = password_hash(html_entity_decode($webpass, ENT_QUOTES, 'UTF-8'), PASSWORD_DEFAULT);
}


   
    foreach ($sql as $line)	{
	
        $startWith = substr(trim($line), 0 ,2);
        $endWith = substr(trim($line), -1 ,1);
        
        if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
            continue;
        }
            
        $query = $query . $line;
        if ($endWith == ';') {
            mysqli_query($dbConnection,str_replace('ve_',$prefix."_",$query)) or die('Error');
            $query= '';		
        }
    }
// Manually execute additional queries
$additionalQuery1 = "TRUNCATE TABLE `". $prefix . "_user`";
$additionalQuery2 = "INSERT INTO `" . $prefix . "_user` (`user_id`, `user_group_id`, `username`, `password`, `firstname`, `lastname`, `email`, `image`, `code`, `ip`, `status`, `date_added`) VALUES
(1, 1, '". $username . "', '" .$passweb . "', 'John', 'Doe', '". $email. "', '', '', '127.0.0.1', 1, '2023-12-02 14:48:28')";
mysqli_query($dbConnection, $additionalQuery1) or die('Error: ' . mysqli_error($dbConnection));
mysqli_query($dbConnection, $additionalQuery2) or die('Error: ' . mysqli_error($dbConnection));

$mainconfig = file_get_contents($appConfig);
$domain = rtrim($domain, '/') . "/";
//preg_replace("/define\('DB_HOSTNAME',\s*'[^']*'\);/sm", "define('DB_HOSTNAME', 'cddsdfdsfs');",$mainconfig);
$mainconfig = setConfigValue($mainconfig, 'HTTP_SERVER', $domain);
$mainconfig = setConfigValue($mainconfig, 'DB_HOSTNAME', $host);
$mainconfig = setConfigValue($mainconfig, 'DB_USERNAME', $user);
$mainconfig = setConfigValue($mainconfig, 'DB_PASSWORD', $password);
$mainconfig = setConfigValue($mainconfig, 'DB_DATABASE', $database);
$mainconfig = setConfigValue($mainconfig, 'DB_PREFIX', $prefix."_");
$mainconfig = setConfigValue($mainconfig, 'HTTP_CATALOG', $domain);
$mainconfig = setConfigValue($mainconfig, 'DIR_OPENCART', $getDirectory);
$mainconfig = file_put_contents($appConfig,$mainconfig);

$mainconfig = file_get_contents($adminConfig);
$domainad = rtrim($domain, "/");
$domainad = $domain . "/admin/";
 

$mainconfig = setConfigValue($mainconfig, 'HTTP_SERVER', $domainad);
$mainconfig = setConfigValue($mainconfig, 'DB_HOSTNAME', $host);
$mainconfig = setConfigValue($mainconfig, 'DB_USERNAME', $user);
$mainconfig = setConfigValue($mainconfig, 'DB_PASSWORD', $password);
$mainconfig = setConfigValue($mainconfig, 'DB_DATABASE', $database);
$mainconfig = setConfigValue($mainconfig, 'DB_PREFIX', $prefix."_");
$mainconfig = setConfigValue($mainconfig, 'HTTP_CATALOG', $domain);
$mainconfig = setConfigValue($mainconfig, 'DIR_OPENCART', $getDirectory);
 
file_put_contents($adminConfig,$mainconfig);

}

// Connect to the database
 
$dbConnection  =new mysqli($host, $user, $password, $database);


if (!$dbConnection) {
    die("Connection failed: " . mysqli_connect_error());
}

 
 
// Get all table names in the database
$result = $dbConnection->query("SHOW TABLES");
$tables = [];

while ($row = $result->fetch_row()) {
    $tables[] = $row[0];
}

// Drop each table
foreach ($tables as $table) {
    $dbConnection->query("DROP TABLE IF EXISTS $table");
}

 

// Install the database.sql file
executeSqlFile($dbConnection, 'ventocart.sql');

// Close the database connection
mysqli_close($dbConnection);

echo "VentoCart installed successfully.\n";

function setConfigValue($config, $setting, $newvalue) {
   return preg_replace("/define\('" . $setting . "',\s*'[^']*'\);/s", "define('" . $setting . "', '{$newvalue}');", $config);
}
?>