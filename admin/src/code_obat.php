<?php
include('koneksi.php');


//  Create (Tambah Data obat)
if (isset($_POST['obt_btn'])) {
    // echo "Form submit detected";
    $id = $_POST['Id_Obat'];
    $nama = $_POST['Nama_Obat'];

    // Cetak variabel untuk debugging
    echo "Id_Obat: $id, Nama_Obat: $nama";
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

// Update (Edit Data Custommer)
if (isset($_POST['update_btn'])) {
    $id = $_POST['edit_Id_Obat'];
    $nama = $_POST['edit_Nama_Obat'];

    // Gunakan prepared statement
    $query = "UPDATE obat SET Id_Obat=?, Nama_Obat=? WHERE id=?";
    
    // Persiapkan statement
    $stmt = $koneksi->prepare($query);

    // Bind parameter
    $stmt->bind_param("ssssi",$id_obat, $Nama_Obat);

    // Eksekusi statement
    if ($stmt->execute()) {
        echo "Data berhasil diupdate";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }

    // Tutup statement
    $stmt->close();

    // Redirect to custommer.php
    header('Location: custommer.php');
}

// Delete (Hapus Data obat)
if (isset($_POST['dltobt_btn'])) 
    $id = $_POST['dltobt_id'];
    $query = "DELETE FROM obat WHERE id='$id'";
    $koneksi->query($query);
    header('Location: obat.php'); 

?>