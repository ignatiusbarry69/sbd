<?php 

require 'functions.php';

$id = $_GET["id"];
$split = explode(",",$id);
$a = $split[0];
$b = $split[1];

$updt = query("SELECT * FROM audit WHERE idBooking = '$a' AND noKamar = '$b'")[0];

if( isset($_POST["submit"])){
    if (updateAudit($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diupdate');
                document.location.href = 'audittabel.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diupdate');
                document.location.href = 'audittabel.php';
            </script>
        ";
    }
}
elseif( isset($_GET["back"])){
    echo "
            <script>
                document.location.href = 'audittabel.php';
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
    <h1>Update data audit</h1>
    <form action="" method="post">
        <input type="hidden" name="targeta" value="<?= $a;?>">
        <input type="hidden" name="targetb" value="<?= $b;?>">
        <ul>
            <li>
                <label for="idBooking">idBooking : </label>
                <?php 
                $data = mysqli_query($conn, "SELECT * FROM pemesanan");
                ?>
                <select name="idBooking"required value="<?= $a; ?>">
                
                <?php
                    $current = $updt["idBooking"];
                    echo"<option value ='$current' >$current</option>";
                    while ($row =  mysqli_fetch_assoc($data))
                    {
                    $audit = $row["idBooking"];
                    echo"<option value ='$audit'>$audit</option>";
                    } 
                ?> 
                </select>
            </li>
            <li>
                <label for="noKamar">noKamar : </label>
                <?php 
                $data = mysqli_query($conn, "SELECT * FROM kamar");
                ?>
                <select name="noKamar"required value="<?= $b; ?>">
                
                <?php
                    $current = $updt["noKamar"];
                    echo"<option value ='$current' >$current</option>";
                    while ($row =  mysqli_fetch_assoc($data))
                    {
                    $pemesan = $row["noKamar"]." - ".$row["jenisKamar"];
                    echo"<option value ='$pemesan'>$pemesan</option>";
                    } 
                ?> 
                </select>
            </li>
            <li>
                <label for="checkIn">checkIn : </label>
                <input type="date" name="checkIn" id="checkIn"required value="<?= $updt["checkIn"]; ?>">
            </li>
            <li>
                <label for="checkOut">checkOut : </label>
                <input type="date" name="checkOut" id="checkOut"required value="<?= $updt["checkOut"]; ?>">
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