<?php
require 'functions.php';

$id = $_GET["idBooking"];

if( deletePemesanan($id) > 0) {
    echo "
        <script>
            alert('data berhasil didelete');
            document.location.href = 'pemesanantabel.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal didelete');
            document.location.href = 'pemesanantabel.php';
        </script>
    ";
}

?>