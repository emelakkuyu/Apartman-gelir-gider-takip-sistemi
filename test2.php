
<?php

include "classes/baglanti.php";



$query="SELECT * FROM daireler";
$stmt = $conn->prepare($query);
$stmt->execute();

//ben baglantı.php yi kullandıgımda hiç çalışmıyor hepsini buraya alalım bir denyelim

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
      <div class="table-responsive">
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
                        <input type="submit" value="Sil" name="sil" class="btn-success form-control" >
                        </form>
                    </td>

                </tr>

                <?php
            }

            ?>



            </tbody>
        </table>
    </div>
</div>

</body>
</html>

