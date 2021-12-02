<?php 

require 'functions.php';

if( isset($_POST["submit"])){
    if (createPemesan($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'pemesantabel.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan');
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
    <h1>Create data pemesan</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="namaPemesan">namaPemesan : </label>
                <input type="text" name="namaPemesan" id="namaPemesan"required>
            </li>
            <li>
                <label for="contactPemesan">contactPemesan : </label>
                <input type="text" name="contactPemesan" id="contactPemesan"required>
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