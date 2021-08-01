<?php
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $cleardb_url["host"];
$username = $cleardb_url["user"];
$password = $cleardb_url["pass"];
$db = substr($cleardb_url["path"],1);

$options=[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,

];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password, $options);
  
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>