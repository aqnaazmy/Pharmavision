<?php
include('koneksi.php');


//  Create (Tambah Data transaksi)
if (isset($_POST['transaksi_btn'])) {
    $tanggal = $_POST['Tanggal'];
    $nama = $_POST['Nama'];


    // Cetak variabel untuk debugging
    echo "Tanggal: $tanggal, Nama: $nama";
    var_dump($tanggal, $nama); // Tambahkan ini
    

    // Query untuk menambah data ke database
    $query = "INSERT INTO `transaksi`(`tanggal`, `nama_pembeli`) VALUES ('$tanggal','$nama')";
    echo $query; // Tambahkan ini

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
        var_dump($koneksi->error); // Tambahkan ini
    }
    header('Location: transaksi.php'); // Ganti dengan halaman yang sesuai
}

// Delete (Hapus Data obat)
if (isset($_POST['dlt_transaksi'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM transaksi WHERE id='$id'";
    $koneksi->query($query);
    header('Location: transaksi.php'); 
}
?>