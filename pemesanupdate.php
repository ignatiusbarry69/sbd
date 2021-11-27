<?php 

require 'functions.php';

$id = $_GET["idPemesan"];
// var_dump($id);
$updt = query("SELECT * FROM pemesan WHERE idPemesan = $id")[0];

if( isset($_POST["submit"])){
    if (updatePemesan($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diupdate');
                document.location.href = 'pemesantabel.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diupdate');
                document.location.href = 'pemesantabel.php';
            </script>
        ";
    }
}
elseif( isset($_GET["back"])){
    echo "
            <script>
                document.location.href = 'pemesantabel.php';
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
    <h1>Update data pemesan</h1>
    <form action="" method="post">
        <input type="hidden" name="target" value="<?= $updt["idPemesan"];?>">
        <ul>
            <li>
                <label for="namaPemesan">namaPemesan : </label>
                <input type="text" name="namaPemesan" id="namaPemesan"required value="<?= $updt["namaPemesan"]; ?>">
            </li>
            <li>
                <label for="contactPemesan">contactPemesan : </label>
                <input type="text" name="contactPemesan" id="contactPemesan"required value="<?= $updt["contactPemesan"]; ?>">
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