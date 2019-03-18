
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <?php
        $servername = 'localhost';

        $username = 'root';
        $password = '';


        $conn = new PDO("mysql:host=$servername;dbname=apartman", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_GET['guncelle'])) {
            $id = $_GET["id"];
            $sorgu = $db->prepare("SELECT *FROM daireler WHERE kapi_no=:id");
            $sorgu->execute(array(":id" => $id));
            $row = $sorgu->fetch(PDO::FETCH_ASSOC);

        }
        ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h4><p align="center"> Daireler </h4> </p>
                        <hr class="star-primary">
                        <form method="post" class="form-inline" >

                            <label> Kat No: </label>
                                <input type="text" name="kapi" class="form-control" value="<?php echo $row["kapi_no"]; ?>" />
                            <label> Kat No: </label>
                                <input type="text" name="kat" class="form-control" value="<?php echo $row["kat_no"]; ?>"/>
                            <label> Kat No: </label>
                                <input type="text" name="ad" class="form-control" value="<?php echo $row["Ad"]; ?>"/>
                            <label> Kat No: </label>
                                <input type="text" name="soyad" class="form-control" value="<?php echo $row["Soyad"]; ?>"/>
                            <label> Kat No: </label>
                                <input type="text" name="tel" class="form-control" value="<?php echo $row["Telefon"]; ?>"/>
                            <label> Kat No: </label>
                                <input type="text" name="mail" class="form-control" value="<?php echo $row["Mail"]; ?>"/>
                            <br>
                            <br>
                            <input type="submit" value="Yeni Kayıt Ekle" name="ekle">
                            <br>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
