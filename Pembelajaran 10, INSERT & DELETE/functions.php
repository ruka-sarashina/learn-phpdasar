<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    // ambil data dari tiap elemen dalam form
    // htmlspeciallchars berguna untuk chars yng di input 
    // harus sesuai dengan data yang di butuhkan
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query insert data
    $query = "INSERT INTO mahasiswa
        VALUES ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return (mysqli_affected_rows($conn));
}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}






?>