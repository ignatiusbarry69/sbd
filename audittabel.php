<?php

require 'functions.php';

$audit = query("SELECT * FROM audit");

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
    <title>AUDIT</title>
</head>
<body>

<h1>TABEL AUDIT</h1>

<a href="auditcreate.php"><button>Tambah data audit</button></a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0"> 
    <tr>
        <th>No.</th>
        <th>idBooking</th>
        <th>noKamar</th>
        <th>checkIn</th>
        <th>checkOut</th>
        <th>Action</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach($audit as $row) : ?>

    <tr>
        <td><?= $i?></td>
        <td><?= $row["idBooking"]; ?></td>
        <td><?= $row["noKamar"]; ?></td>
        <td><?= $row["checkIn"]; ?></td>
        <td><?= $row["checkOut"]; ?></td>
        <td>
            <a href="auditupdate.php?id=<?= $row["idBooking"];?>,<?=$row["noKamar"];?>">update</a> |
            <a href="auditdelete.php?id=<?= $row["idBooking"]; ?>,<?=$row["noKamar"];?>"onclick="return confirm('are you sure?');">delete</a>
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