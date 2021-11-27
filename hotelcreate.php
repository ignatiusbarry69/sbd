<?php 

require 'functions.php';

if( isset($_POST["submit"])){
    if (createHotel($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'hoteltabel.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data berhasil ditambahkan');
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
    <h1>Create data hotel</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="alamatHotel">alamatHotel : </label>
                <input type="text" name="alamatHotel" id="alamatHotel"required>
            </li>
            <li>
                <label for="namaHotel">namaHotel : </label>
                <input type="text" name="namaHotel" id="namaHotel"required>
            </li>
            <li>
                <button type="submit" name="submit">Create</button>
            </li>
        </ul>
    </form>

    <form action="" method="get">
        <button type = "back" name="back">Back</button>
    </form>
       
</body>
</html>