<?php

require 'functions.php';

$hotel = query("SELECT * FROM hotel");

if( isset($_GET["back"])){
    echo "
            <script>
                document.location.href = 'index.php';
            </script>
        ";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOTEL</title>
</head>
<body>

<h1>TABEL HOTEL</h1>

<a href="hotelcreate.php"><button>Tambah data hotel</button></a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0"> 
    <tr>
        <th>No.</th>
        <th>alamatHotel</th>
        <th>namaHotel</th>
        <th>Action</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach($hotel as $row) : ?>

    <tr>
        <td><?= $i?></td>
        <td><?= $row["alamatHotel"]; ?></td>
        <td><?= $row["namaHotel"]; ?></td>
        <td>
            <a href="hotelupdate.php?alamatHotel=<?= $row["alamatHotel"]; ?>">update</a> |
            <a href="hoteldelete.php?alamatHotel=<?= $row["alamatHotel"]; ?>"onclick="return confirm('are you sure?');">delete</a>
        </td>
    <?php $i ++ ?>    
    </tr>
    <?php endforeach; ?>
</table>
<br>
    <form action="" method="get">
            <button type = "back" name="back">Back</button>
        </form>
</body>
</html>