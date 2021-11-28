<?php 

require 'functions.php';

$id = $_GET["idBooking"];
// var_dump($id);
$updt = query("SELECT * FROM pemesanan WHERE idBooking = '" . mysqli_escape_string($conn,$id) . "'")[0];

if( isset($_POST["submit"])){
    if (updatePemesanan($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diupdate');
                document.location.href = 'pemesanantabel.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diupdate');
                document.location.href = 'pemesanantabel.php';
            </script>
        ";
    }
}
elseif( isset($_GET["back"])){
    echo "
            <script>
                document.location.href = 'pemesanantabel.php';
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
    <h1>Update data pemesanan</h1>
    <form action="" method="post">
        <input type="hidden" name="target" value="<?= $updt["idBooking"];?>">
        <ul>
            <li>
                <label for="idBooking">idBooking : </label>
                <input type="text" name="idBooking" id="idBooking"required value="<?= $updt["idBooking"]; ?>">
            </li>
            <li>
                <label for="idPemesan">idPemesan : </label>
                <input type="text" name="idPemesan" id="idPemesan"required value="<?= $updt["idPemesan"]; ?>">
            </li>
            <li>
                <label for="idFDA">idFDA : </label>
                <input type="text" name="idFDA" id="idFDA"required value="<?= $updt["idFDA"]; ?>">
            </li>
            <li>
                <label for="alamatHotel">alamatHotel : </label>
                <input type="text" name="alamatHotel" id="alamatHotel"required value="<?= $updt["alamatHotel"]; ?>">
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