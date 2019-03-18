
<!-- Portfolio Modals -->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <h2><p align="center"> Yönetici Bilgileri</h2> </p>
                        <hr class="star-primary">
                         <p align="center"><img src="kisisel_c.png" alt="" width=250 height=250/></p>
                        <?php
                        //  include "classes/baglanti.php";

                        echo "<table style='border: solid 1px black;'>";
                        echo "<tr><th><b>Ad</b></th><th>Soyad</th><th>Telefon</th><th>Mail</th><th>Adres</th></tr>";

                        class TableRows extends RecursiveIteratorIterator {
                            function __construct($it) {
                                parent::__construct($it, self::LEAVES_ONLY);
                            }

                            function current() {
                                return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
                            }

                            function beginChildren() {
                                echo "<tr>";
                            }

                            function endChildren() {
                                echo "</tr>" . "\n";
                            }
                        }

                        $servername = 'localhost';
                        $username = 'root';
                        $password = '';
                        $dbname = 'apartman';

                        try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT  ad, soyad, telefon, mail, adres FROM yonetici");
                            $stmt->execute();

                            // set the resulting array to associative
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }
                        }
                        catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        $conn = null;
                        echo "</table>";
                        ?>
                        <br>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button> </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>