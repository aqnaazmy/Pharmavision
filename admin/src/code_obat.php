<?php
include('koneksi.php');


//  Create (Tambah Data obat)
if (isset($_POST['obt_btn'])) {
    // echo "Form submit detected";
    $id = $_POST['id'];
    $nama = $_POST['Nama Obat'];

    // Cetak variabel untuk debugging
    echo "Id: $id, Nama Obat: $nama";
    var_dump($id ,$nama); // Tambahkan ini
    

    // Query untuk menambah data ke database
    $query = "INSERT INTO obat (`id`,`nama_obat`) VALUES ('$id','$nama')";
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

// Delete (Hapus Data obat)
if (isset($_POST['dltobt_btn'])) 
    $id = $_POST['dltobt_id'];
    $query = "DELETE FROM obat WHERE id='$id'";
    $koneksi->query($query);
    header('Location: obat.php'); 

?>