<head>
  <title>Pharmavision</title>
  <link rel="icon" type="image/x-icon" href="/Pharmavision/img/logo4.png">
</head>

<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);


include('includes/header.php'); 
include('includes/navbar.php'); 
include('koneksi.php');

$query = "SELECT * FROM custommer";
$result = $koneksi->query($query);

// if ($testResult) {
//     echo "Koneksi dan query berhasil!";
// } else {
//     echo "Gagal menjalankan query: " . $koneksi->error;
// }
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Custommer Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> id </label>
                <input type="number" name="id_custommer" class="form-control" placeholder="Masukan id">
            </div>
            <div class="form-group">
                <label> Nama </label>
                <input type="text" name="Nama" class="form-control" placeholder="Masukan Nama">
            </div>
            <div class="form-group">
                <label> Alamat</label>
                <input type="text" name="Alamat" class="form-control" placeholder="Masukan Alamat">
            </div>
            <div class="form-group">
                <label> No handphone</label>
                <input type="text" name="No_Handphone" class="form-control" placeholder="Masukan No handphone">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select class="form-control input" name="Gender" required>
                    <option value="laki-laki">Laki - Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="tambah_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Customer 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                Add customer data
            </button>
        </h6>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Handphone</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td><?= $row['no_handphone']; ?></td>
                            <td><?= $row['gender']; ?></td>
                            <td>
                                <form action="code.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?= $row['id']; ?>">
                                    <button type="submit" name="update_btn" class="btn btn-success">EDIT</button>
                                </form>
                                <form action="code.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?= $row['id']; ?>">
                                    <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>