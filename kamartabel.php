<?php

require 'functions.php';

$kamar = query("SELECT * FROM kamar");

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
    <title>KAMAR</title>
</head>
<body>

<h1>TABEL KAMAR</h1>

<a href="kamarcreate.php"><button>Tambah data kamar</button></a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0"> 
    <tr>
        <th>No.</th>
        <th>noKamar</th>
        <th>jenisKamar</th>
        <th>hargaKamar</th>
        <th>Action</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach($kamar as $row) : ?>

    <tr>
        <td><?= $i?></td>
        <td><?= $row["noKamar"]; ?></td>
        <td><?= $row["jenisKamar"]; ?></td>
        <td><?= $row["hargaKamar"]; ?></td>
        <td>
            <a href="kamarupdate.php?noKamar=<?= $row["noKamar"]; ?>">update</a> |
            <a href="kamardelete.php?noKamar=<?= $row["noKamar"]; ?>"onclick="return confirm('are you sure?');">delete</a>
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