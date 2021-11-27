<?php 

require 'functions.php';

if( isset($_POST["submit"])){
    if (createKamar($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'kamartabel.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data berhasil ditambahkan');
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
    <h1>Create data kamar</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="noKamar">noKamar : </label>
                <input type="text" name="noKamar" id="noKamar"required>
            </li>
            <li>
                <label for="jenisKamar">jenisKamar : </label>
                <input type="text" name="jenisKamar" id="jenisKamar"required>
            </li>
            <li>
                <label for="hargaKamar">hargaKamar : </label>
                <input type="text" name="hargaKamar" id="hargaKamar"required>
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