<?php
$servername = 'localhost';

$username = 'root';
$password = '';


$conn = new PDO("mysql:host=$servername;dbname=apartman", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST["ekle"])){

    if ( isset($_POST['kapi']) && isset($_POST['gelir_id'])
        && isset($_POST['aciklama']) && isset($_POST['tarih']) && isset($_POST['tutar'])) {
        $sql = 'INSERT INTO gelir
        SET gelir_id = :gelir_id, aciklama=:aciklama, tarih=:tarih, tutar=:tutar,
            kapi_no = (SELECT kapi_no FROM daireler WHERE kapi_no = :kapi_no)';
        $sql = "INSERT INTO gelir (kapi_no, kat_no, Ad, Soyad, Telefon, Mail) 
                                        VALUES (:kapi, :kat, :ad, :soyad, :tel, :mail)";
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
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2><p align="center">Gelir</h2> </p>
                        <hr class="star-primary">
                        <label >Kapi No :</label>
                        <input type="text" name="kapi" class="form-control" style="width: 200px">
                        <label >Tutar :</label>
                        <input type="text" name="kapi" class="form-control" style="width:200px">
                        <label >Tarih :</label><br>
                        <input type="date" name="date" class="form-control" size="15" value="2012-05-05" style="width:200px"><br>

                        <label >Açıklama :</label>
                        <textarea class="form-control" rows="2" id="comment" style=width:200px></textarea>
                        <input type="submit" value="Ekle" name="ekle">
                        <br>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>