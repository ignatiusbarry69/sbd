<?php

require 'functions.php';

$fda = query("SELECT * FROM fda");

?>

<!DOCTYPE html>
<html>
<head>
    <title>FDA</title>
</head>
<body>

<h1>TABEL FDA</h1>

<a href="fdacreate.php">Tambah data fda</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0"> 
    <tr>
        <th>No.</th>
        <th>idFDA</th>
        <th>namaFDA</th>
        <th>Action</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach($fda as $row) : ?>

    <tr>
        <td><?= $i?></td>
        <td><?= $row["idFDA"]; ?></td>
        <td><?= $row["namaFDA"]; ?></td>
        <td>
            <a href="">update</a> |
            <a href="fdadelete.php?id=<?= $row["idFDA"]; ?>">delete</a>
        </td>
    <?php $i ++ ?>    
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>