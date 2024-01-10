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

// Read (Tampilkan Data Custommer)
// (Data pelanggan akan ditampilkan di your_customer_page.php)

// Update (Edit Data Custommer)
if (isset($_POST['update_btn'])) {
    $id = $_POST['edit_id'];
    $nama = $_POST['edit_nama'];
    $alamat = $_POST['edit_alamat'];
    $noHandphone = $_POST['edit_no_handphone'];
    $gender = $_POST['edit_gender'];

    // Gunakan prepared statement
    $query = "UPDATE custommer SET nama=?, alamat=?, no_handphone=?, gender=? WHERE id=?";
    
    // Persiapkan statement
    $stmt = $koneksi->prepare($query);

    // Bind parameter
    $stmt->bind_param("ssssi", $nama, $alamat, $noHandphone, $gender, $id);

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


// Delete (Hapus Data Custommer)
if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM custommer WHERE id='$id'";
    $koneksi->query($query);
    header('Location: custommer.php'); // Ganti dengan halaman yang sesuai
}



// Create (Tambah Data obat)
if (isset($_POST['tambah_obat'])) {
    // echo "Form submit detected";
    $id_obat = $_POST['Id_Obat'];
    $nama = $_POST['Nama_Obat'];

    // Cetak variabel untuk debugging
    echo "Id_Obat: $id_obat, Nama_Obat: $nama";
    var_dump($id_obat ,$nama); // Tambahkan ini
    

    // Query untuk menambah data ke database
    $query = "INSERT INTO obat ('id', `nama_obat`) VALUES ('$id_obat','$nama')";
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
if (isset($_POST['delete_obat'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM obat WHERE id='$id'";
    $koneksi->query($query);
    header('Location: obat.php'); // Ganti dengan halaman yang sesuai
}



?>
