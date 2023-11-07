<?php
try{
    $connexion = new PDO(
        'mysql:host=localhost;dbname=suivie-academique;charset=utf8','root',''
    );
}catch(Exception $e){
   echo $e->getMessage();
}

