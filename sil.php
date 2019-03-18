<?php

include "classes/baglanti.php";

if(isset($_POST['sil'])) {
    $id = $_POST['id'];
    echo $id;
    $query = "delete FROM daireler where kapi_no=$id";
    $stmt = $conn->prepare($query);
    try{
        $stmt->execute();
        header("Location:index.php");
    }catch(PDOException $e){

    }

}


?>