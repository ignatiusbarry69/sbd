<?php 

require 'functions.php';

$conn = mysqli_connect("localhost","root","","iRooms");

if( isset($_POST["submit"])){
    if (createAudit($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'auditcreate.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan');
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
if( isset($_POST["done"])){
    if (createAudit($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'audittabel.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'audittabel.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
</head>
<body>
    <h1>Create data audit</h1>

    <form action="" method="post">
        <ul>
            <li>
                
                <?php 
                $data = mysqli_query($conn, "SELECT * FROM pemesanan");
                ?>
                
                
                <?php
                    // echo"<option value ='' >--------------</option>";
                    while ($row =  mysqli_fetch_assoc($data))
                    {
                    $audit = $row["idBooking"];
                    // echo"<option value ='$audit'>$audit</option>";
                    }    
                ?>
                <label for="idBooking">idBooking :<?=$audit;?> </label> 

            </li>
            <li>
                <label for="noKamar">noKamar : </label>
                <?php 
                $data = mysqli_query($conn, "SELECT * FROM kamar");
                ?>
                <select name="noKamar">
                
                <?php
                    echo"<option value ='' >--------------</option>";
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
                <input type="date" name="checkIn" id="checkIn"required>
            </li>
            <li>
                <label for="checkOut">checkOut : </label>
                <input type="date" name="checkOut" id="checkOut"required>
            </li>
            <li>
                <button type="submit" name="submit">Create</button> |
                <button type="done" name="done">Done</button>
            </li>
        </ul>
        <input type="hidden" name="idBooking" value="<?= $audit;?>">
    </form>

    <form action="" method="get">
        <button type = "back" name="back">Back</button>
    </form>
       
</body>
</html>