<?php
    //MySQL Database user name.    
    $login = "zarvil_smart_hub";
    //Password for MySQL.
    $dbpass = "Bofik_smart2018";
    //MySQL Database name.
    $dbname = "zarvil_smart_hub"; 
    //Establish a connection
    $db = new PDO("mysql:host=localhost;dbname=$dbname", "$login", "$dbpass");
    //Enable PDO error reporting (to be used ONLY during development)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>