<?php

$conn = mysqli_connect("localhost","root","","iRooms");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function createFDA($data){
    global $conn;
    $id_FDA = htmlspecialchars($data["idFDA"]);
    $namaFDA = htmlspecialchars($data["namaFDA"]);

    $query = "INSERT INTO fda VALUES
                ('$id_FDA','$namaFDA')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function deleteFDA($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM fda WHERE idFDA = '".$id."' ");
    return mysqli_affected_rows($conn);
}


function updateFDA($data) {
    global $conn;
    $idFDA = htmlspecialchars($data["idFDA"]);
    $namaFDA = htmlspecialchars($data["namaFDA"]);
    $target = $data["target"];

    $query = "UPDATE fda SET
                idFDA = '$idFDA',
                namaFDA = '$namaFDA'
                WHERE idFDA = '$target'
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function createKamar($data){
    global $conn;
    $noKamar = htmlspecialchars($data["noKamar"]);
    $jenisKamar = htmlspecialchars($data["jenisKamar"]);
    $hargaKamar = htmlspecialchars($data["hargaKamar"]);

    $query = "INSERT INTO kamar VALUES
                ('$noKamar','$jenisKamar','$hargaKamar')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function deleteKamar($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM kamar WHERE noKamar = '".$id."' ");
    return mysqli_affected_rows($conn);
}


function updateKamar($data) {
    global $conn;
    $noKamar = htmlspecialchars($data["noKamar"]);
    $jenisKamar = htmlspecialchars($data["jenisKamar"]);
    $hargaKamar = htmlspecialchars($data["hargaKamar"]);
    $target = $data["target"];

    $query = "UPDATE kamar SET
                noKamar = '$noKamar',
                jenisKamar = '$jenisKamar',
                hargaKamar = '$hargaKamar'
                WHERE noKamar = '$target'
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function createPemesan($data){
    global $conn;
    $namaPemesan = htmlspecialchars($data["namaPemesan"]);
    $contactPemesan = htmlspecialchars($data["contactPemesan"]);

    $query = "INSERT INTO pemesan VALUES
                ('','$namaPemesan','$contactPemesan')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function deletePemesan($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pemesan WHERE idPemesan = '".$id."' ");
    return mysqli_affected_rows($conn);
}


function updatePemesan($data) {
    global $conn;
    $namaPemesan = htmlspecialchars($data["namaPemesan"]);
    $contactPemesan = htmlspecialchars($data["contactPemesan"]);
    $target = $data["target"];

    $query = "UPDATE pemesan SET
                namaPemesan = '$namaPemesan',
                contactPemesan = '$contactPemesan'
                WHERE idPemesan = '$target'
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function createHotel($data){
    global $conn;
    $alamatHotel = htmlspecialchars($data["alamatHotel"]);
    $namaHotel = htmlspecialchars($data["namaHotel"]);

    $query = "INSERT INTO hotel VALUES
                ('$alamatHotel','$namaHotel')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function deleteHotel($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM hotel WHERE alamatHotel = '".$id."' ");
    return mysqli_affected_rows($conn);
}


function updateHotel($data) {
    global $conn;
    $alamatHotel = htmlspecialchars($data["alamatHotel"]);
    $namaHotel = htmlspecialchars($data["namaHotel"]);
    $target = $data["target"];

    $query = "UPDATE hotel SET
                alamatHotel = '$alamatHotel',
                namaHotel = '$namaHotel'
                WHERE alamatHotel = '$target'
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
?>