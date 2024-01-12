<?php
include('koneksi.php');


// Create (Tambah Data Custommer)
if (isset($_POST['tambah_btn'])) {
    // echo "Form submit detected";
    $nama = $_POST['Nama'];
    $alamat = $_POST['Alamat'];
    $noHandphone = $_POST['No_Handphone'];
    $gender = $_POST['Gender'];

    // Cetak variabel untuk debugging
    echo "Nama: $nama, Alamat: $alamat, No Handphone: $noHandphone, Gender: $gender";
    var_dump($nama, $alamat, $noHandphone, $gender); // Tambahkan ini
    

    // Query untuk menambah data ke database
    $query = "INSERT INTO custommer (`nama`, `alamat`, `no_handphone`, `gender`) VALUES ('$nama', '$alamat', '$noHandphone', '$gender')";
    echo $query; // Tambahkan ini

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
        var_dump($koneksi->error); // Tambahkan ini
    }
    header('Location: custommer.php'); // Ganti dengan halaman yang sesuai
}

// Delete (Hapus Data Custommer)
if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM custommer WHERE id='$id'";
    $koneksi->query($query);
    header('Location: custommer.php'); // Ganti dengan halaman yang sesuai
}

?>
