<?php
require 'functions.php';

$id = $_GET["idFDA"];

if( deleteFDA($id) > 0) {
    echo "
        <script>
            alert('data berhasil didelete');
            document.location.href = 'fdatabel.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal didelete');
            document.location.href = 'fdatabel.php';
        </script>
    ";
}

?>