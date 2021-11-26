<?php 

require 'functions.php';

if( isset($_POST["submit"])){
    if (createFDA($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'fdatabel.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data berhasil ditambahkan');
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
    <h1>Create data fda</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="idFDA">id : </label>
                <input type="text" name="idFDA" id="idFDA"required>
            </li>
            <li>
                <label for="namaFDA">nama : </label>
                <input type="text" name="namaFDA" id="namaFDA"required>
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