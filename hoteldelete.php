<?php
require 'functions.php';

$id = $_GET["alamatHotel"];

if( deleteHotel($id) > 0) {
    echo "
        <script>
            alert('data berhasil didelete');
            document.location.href = 'hoteltabel.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal didelete');
            document.location.href = 'hoteltabel.php';
        </script>
    ";
}

?>