<?php

require 'functions.php';

$pemesanan = query("SELECT * FROM pemesanan");

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
    <title>PEMESANAN</title>
</head>
<body>

<h1>TABEL PEMESANAN</h1>

<a href="pemesanancreate.php"><button>Tambah data pemesanan</button></a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0"> 
    
    <tr>
        <th>No.</th>
        <th>idBooking</th>
        <th>idPemesan</th>
        <th>idFDA</th>
        <th>alamatHotel</th>
        <th>Action</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach($pemesanan as $row) : ?>
        
    <tr>
        <td><?= $i?></td>
        <td><?= $row["idBooking"]; ?></td>
        <td><?= $row["idPemesan"]; ?></td>
        <td><?= $row["idFDA"]; ?></td>
        <td><?= $row["alamatHotel"]; ?></td>
        <td>
            <a href="pemesananupdate.php?idBooking=<?= $row["idBooking"]; ?>">update</a> |
            <a href="pemesanandelete.php?idBooking=<?= $row["idBooking"]; ?>"onclick="return confirm('are you sure?');">delete</a> |
            <a href="pemesanan1cetak.php?idBooking=<?= $row["idBooking"]; ?>">cetak</a>
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