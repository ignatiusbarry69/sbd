<?php
require 'functions.php';

$id = $_GET["noKamar"];

if( deleteKamar($id) > 0) {
    echo "
        <script>
            alert('data berhasil didelete');
            document.location.href = 'kamartabel.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal didelete');
            document.location.href = 'kamartabel.php';
        </script>
    ";
}

?>