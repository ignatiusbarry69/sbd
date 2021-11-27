<?php

require 'functions.php';

$pemesan = query("SELECT * FROM pemesan");

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
    <title>PEMESAN</title>
</head>
<body>

<h1>TABEL PEMESAN</h1>

<a href="pemesancreate.php"><button>Tambah data pemesan</button></a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0"> 
    <tr>
        <th>No.</th>
        <th>idPemesan</th>
        <th>namaPemesan</th>
        <th>contactPemesan</th>
        <th>Action</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach($pemesan as $row) : ?>

    <tr>
        <td><?= $i?></td>
        <td><?= $row["idPemesan"]; ?></td>
        <td><?= $row["namaPemesan"]; ?></td>
        <td><?= $row["contactPemesan"]; ?></td>
        <td>
            <a href="pemesanupdate.php?idPemesan=<?= $row["idPemesan"]; ?>">update</a> |
            <a href="pemesandelete.php?idPemesan=<?= $row["idPemesan"]; ?>"onclick="return confirm('are you sure?');">delete</a>
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