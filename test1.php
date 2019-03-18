<?php
include "classes/baglanti.php";//Buraya bağlantıyı eklersen,diğer tüm kısımlarda kullanabilirsin.

if(isset($_POST["ekle"])){

//kapi_no yok ki
    if ( isset($_POST['kapi']) && isset($_POST['kat'])
        && isset($_POST['ad']) && isset($_POST['soyad']) && isset($_POST['tel']) && isset($_POST['mail'])) {
        $sql = "INSERT INTO daireler (kapi_no, kat_no, Ad, Soyad, Telefon, Mail) 
                                        VALUES (:kapi, :kat, :ad, :soyad, :tel, :mail)";
        echo("<pre>\n".$sql."\n</pre>\n");
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':kapi' => $_POST['kapi'],
            ':kat' => $_POST['kat'],
            ':ad' => $_POST['ad'],
            ':soyad' => $_POST['soyad'],
            ':tel' => $_POST['tel'],
            ':mail' => $_POST['mail']));
    }

}
?>

<html>
<body>
<form method="post" action="" >
    <p><b >Kat No: </b><input type="text" name="kat" size="10"></p></p>
    <p><b>Kapı No:</b><input type="text" name="kapi" size="10"></p>
    <p><b>Ad:     </b><input type="text" name="ad" size="10"></p>
    <p><b>Soyad:  </b><input type="text" name="soyad" size="10"></p>
    <p><b>Telefon:</b><input type="text" name="tel" size="10"></p>
    <p><b>e-Mail: </b><input type="text" name="mail" size="10"></p>
    <br>
    <br>

    <input type="submit" value="Ekle" name="ekle">
</form>
</body>
</html>

