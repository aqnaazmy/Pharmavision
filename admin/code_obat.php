<?php
include('koneksi.php');


//  Create (Tambah Data obat)
if (isset($_POST['obt_btn'])) {
    // echo "Form submit detected";
    // $id = $_POST['Id_Obat'];
    $nama = $_POST['Nama_Obat'];

    // Cetak variabel untuk debugging
    echo "Nama_Obat: $nama";
    var_dump($nama); // Tambahkan ini
    

    // Query untuk menambah data ke database
    $query = "INSERT INTO obat (`nama_obat`) VALUES ('$nama')";
    echo $query; // Tambahkan ini

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
        var_dump($koneksi->error); // Tambahkan ini
    }
    header('Location: obat.php'); // Ganti dengan halaman yang sesuai
}

// Update (Edit Data Custommer)
if (isset($_POST['update_btn'])) {
    $id = $_POST['id_obat'];
    $nama = $_POST['edit_obat'];

    $query = "UPDATE `obat` SET `Nama_Obat`='$nama' WHERE `id`='$id'";
    echo "ID: $id, Nama_Obat: $nama";

    if ($koneksi->query($query) === TRUE) {
        echo "Data berhasil diupdate";
    } else {
        echo "Error updating record: " . $koneksi->error;
        var_dump($koneksi->error);
    }

    header('Location: obat.php'); // Ganti dengan halaman yang sesuai
}

// Delete (Hapus Data obat)
if (isset($_POST['dltobt_btn'])) {
    $id = $_POST['dltobt_id'];
    $query = "DELETE FROM obat WHERE id='$id'";
    $koneksi->query($query);
    header('Location: obat.php'); 

}

?>