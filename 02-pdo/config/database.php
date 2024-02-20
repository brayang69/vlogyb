<?php
try {
    $conx = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);

    if ($conx){
        echo "<h4>connection DB Sucess ✔</h4>";
    }



} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//----------------------------------------
//get all records

function getAllpets($conx) {

    try {
        $sql = "SELECT * FROM pets";
        $stm = $conx->prepare($sql);
        $stm->execute();
        return $stm->fetchALL();
    }catch (PDOException $e){
        echo "ERROR: ". $E->getmessage();
    }
}


