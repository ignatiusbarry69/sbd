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


?>