<?php
require 'functions.php';

$id = $_GET["id"];
$split = explode(",",$id);
$a = $split[0];
$b = $split[1];

if( deleteAudit($a,$b) > 0) {
    echo "
        <script>
            alert('data berhasil didelete');
            document.location.href = 'audittabel.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal didelete');
            document.location.href = 'audittabel.php';
        </script>
    ";
}

?>