<?php
$fp = fopen(__dir__."/myInfo.txt", "r");

$myPassword = trim(fgets($fp));



// 1. Connect to our DB server
// 2. Select our DB
//
// oh, and check for excpetions (try, catch)

try {
    
    // Create a new instance of a PDO object
    $pdo = new PDO('mysql:host=localhost:3306;dbname=bed_and_breakfast','bedNbreakUser', $myPassword);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
    
} catch (PDOException $ex) {
    
    $error = 'Unable to connect to the database server <br><br>'.$ex->getMessage();
    
    if ($closeSelect) {
        echo "</select>";
        $closeSelect = false;
    }
    
    include 'error.html.php';
    exit();

}

