<?php 

require 'functions.php';

$id = $_GET["noKamar"];
// var_dump($id);
$updt = query("SELECT * FROM kamar WHERE noKamar = $id")[0];

if( isset($_POST["submit"])){
    if (updateKamar($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diupdate');
                document.location.href = 'kamartabel.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diupdate');
                document.location.href = 'kamartabel.php';
            </script>
        ";
    }
}
elseif( isset($_GET["back"])){
    echo "
            <script>
                document.location.href = 'kamartabel.php';
            </script>
        ";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
</head>
<body>
    <h1>Update data kamar</h1>
    <form action="" method="post">
        <input type="hidden" name="target" value="<?= $updt["noKamar"];?>">
        <ul>
            <li>
                <label for="noKamar">noKamar : </label>
                <input type="text" name="noKamar" id="noKamar"required value="<?= $updt["noKamar"]; ?>">
            </li>
            <li>
                <label for="jenisKamar">jenisKamar : </label>
                <input type="text" name="jenisKamar" id="jenisKamar"required value="<?= $updt["jenisKamar"]; ?>">
            </li>
            <li>
                <label for="hargaKamar">hargaKamar : </label>
                <input type="text" name="hargaKamar" id="hargaKamar"required value="<?= $updt["hargaKamar"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit"onclick="return confirm('are you sure?');">Update</button>
            </li>
        </ul>
    </form>

    <form action="" method="get">
        <button type = "back" name="back">Back</button>
    </form>
       
</body>
</html>