<?php
require 'functions.php';

$id = $_GET["idPemesan"];

if( deletePemesan($id) > 0) {
    echo "
        <script>
            alert('data berhasil didelete');
            document.location.href = 'pemesantabel.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal didelete');
            document.location.href = 'pemesantabel.php';
        </script>
    ";
}

?>