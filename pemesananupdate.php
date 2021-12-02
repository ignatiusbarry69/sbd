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
                <?php 
                $data = mysqli_query($conn, "SELECT * FROM pemesan");
                ?>
                <select name="idPemesan"required>
                
                <?php
                    $current = $updt["idPemesan"];
                    echo"<option value ='$current' >$current</option>";
                    while ($row =  mysqli_fetch_assoc($data))
                    {
                    $pemesan = $row["idPemesan"]." - ".$row["namaPemesan"];
                    echo"<option value ='$pemesan'>$pemesan</option>";
                    } 
                ?> 
                </select>
            </li>
            <li>
                <label for="idFDA">idFDA : </label>
                <?php 
                $data = mysqli_query($conn, "SELECT * FROM fda");
                ?>
                <select name="idFDA"required>
                
                <?php
                    $current = $updt["idFDA"];
                    echo"<option value ='$current' >$current</option>";
                    while ($row =  mysqli_fetch_assoc($data))
                    {
                    $fda = $row["idFDA"]." - ".$row["namaFDA"];
                    echo"<option value ='$fda'>$fda</option>";
                    } 
                ?> 
                </select>
            </li>
            <li>
                <label for="alamatHotel">alamatHotel : </label>
                <?php 
                $data = mysqli_query($conn, "SELECT * FROM hotel");
                ?>
                <select name="alamatHotel"required>
                
                <?php
                    $current = $updt["alamatHotel"];
                    echo"<option value ='$current' >$current</option>";
                    while ($row =  mysqli_fetch_assoc($data))
                    {
                    $hotel = $row["alamatHotel"];
                    echo"<option value ='$hotel'>$hotel</option>";
                    } 
                ?> 
                </select>
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