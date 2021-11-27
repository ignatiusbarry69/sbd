<?php 

require 'functions.php';

$id = $_GET["alamatHotel"];
// var_dump($id);
$updt = query("SELECT * FROM hotel WHERE alamatHotel = '" . mysqli_escape_string($conn,$id) . "'")[0];

if( isset($_POST["submit"])){
    if (updateHotel($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diupdate');
                document.location.href = 'hoteltabel.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diupdate');
                document.location.href = 'hoteltabel.php';
            </script>
        ";
    }
}
elseif( isset($_GET["back"])){
    echo "
            <script>
                document.location.href = 'hoteltabel.php';
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
    <h1>Update data hotel</h1>
    <form action="" method="post">
        <input type="hidden" name="target" value="<?= $updt["alamatHotel"];?>">
        <ul>
            <li>
                <label for="alamatHotel">alamatHotel : </label>
                <input type="text" name="alamatHotel" id="alamatHotel"required value="<?= $updt["alamatHotel"]; ?>">
            </li>
            <li>
                <label for="namaHotel">namaHotel : </label>
                <input type="text" name="namaHotel" id="namaHotel"required value="<?= $updt["namaHotel"]; ?>">
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