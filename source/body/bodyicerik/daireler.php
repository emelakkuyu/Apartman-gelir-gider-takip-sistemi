<?php
$servername = 'localhost';

$username = 'root';
$password = '';


$conn = new PDO("mysql:host=$servername;dbname=apartman", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST["ekle"])){

    if ( isset($_POST['kapi']) && isset($_POST['kat'])
        && isset($_POST['ad']) && isset($_POST['soyad']) && isset($_POST['tel']) && isset($_POST['mail'])) {
        $sql = "INSERT INTO daireler (kapi_no, kat_no, Ad, Soyad, Telefon, Mail) 
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
<?php

include "classes/baglanti.php";



$query="SELECT * FROM daireler";
$stmt = $conn->prepare($query);
$stmt->execute();

//ben baglantı.php yi kullandıgımda hiç çalışmıyor hepsini buraya alalım bir denyelim

?>
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h4><p align="center"> Daireler </h4> </p>
                        <hr class="star-primary">
                        <form method="post" class="form-inline" >

                            <p><b >Kat No:</b><input type="text" name="kat" class="form-control" style="width:200px"; ></p>
                            <p><b>Kapı No:</b><input type="text" name="kapi" class="form-control" style="width:200px"></p>
                            <p><b>Ad:     </b><input type="text" name="ad" class="form-control" style="width:200px"></p>
                            <p><b>Soyad:  </b><input type="text" name="soyad" class="form-control" style="width:200px"></p>
                            <p><b>Telefon:</b><input type="text" name="tel" class="form-control" style="width:200px"></p>
                            <p><b>e-Mail: </b><input type="text" name="mail" class="form-control" style="width:200px"></p>
                            <br>
                            <br>
                            <input type="submit" value="Yeni Kayıt Ekle" name="ekle">
                            <br>

                        </form>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Kapı No</th>
                                <th>Kat No</th>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>Telefon</th>
                                <th>Mail</th>
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <?php
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>

                                <tr>
                                    <td><?php echo $row['kapi_no'] ?></td>
                                    <td><?php echo $row['kat_no'] ?></td>
                                    <td><?php echo $row['Ad'] ?></td>
                                    <td><?php echo $row['Soyad'] ?></td>
                                    <td><?php echo $row['Telefon'] ?></td>
                                    <td><?php echo $row['Mail'] ?></td>
                                    <td>
                                        <form method="post" action="sil.php" >
                                            <input type="hidden" name="id" value="<?php echo $row['kapi_no']?>">
                                            <input type="submit" value="Sil" name="sil" class="btn-success " >

                                        </form>
                                        <form method="post" action="guncelle.php" >
                                            <input type="hidden" name="id" value="<?php echo $row['kapi_no']?>">
                                            <input type="submit" value="Güncelle" name="guncelle" class="btn-success " >
                                        </form>
                                    </td>

                                </tr>

                                <?php
                            }

                            ?>
                        </table>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
