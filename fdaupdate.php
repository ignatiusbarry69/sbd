<?php 

require 'functions.php';

$id = $_GET["idFDA"];
// var_dump($id);
$updt = query("SELECT * FROM fda WHERE idFDA = '" . mysqli_escape_string($conn,$id) . "'")[0];

if( isset($_POST["submit"])){
    if (updateFDA($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diupdate');
                document.location.href = 'fdatabel.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diupdate');
                document.location.href = 'fdatabel.php';
            </script>
        ";
    }
}
elseif( isset($_GET["back"])){
    echo "
            <script>
                document.location.href = 'fdatabel.php';
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
    <h1>Update data fda</h1>
    <form action="" method="post">
        <input type="hidden" name="target" value="<?= $updt["idFDA"];?>">
        <ul>
            <li>
                <label for="idFDA">idFDA : </label>
                <input type="text" name="idFDA" id="idFDA"required value="<?= $updt["idFDA"]; ?>">
            </li>
            <li>
                <label for="namaFDA">namaFDA : </label>
                <input type="text" name="namaFDA" id="namaFDA"required value="<?= $updt["namaFDA"]; ?>">
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