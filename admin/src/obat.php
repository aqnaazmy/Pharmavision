<head>
  <title>Pharmavision</title>
  <link rel="icon" type="image/x-icon" href="/pharmavision/admin/img/logo4.png">
</head>

<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('koneksi.php');

$query = "SELECT * FROM obat";
$result = $koneksi->query($query);
?>


<div class="modal fade" id="adddataobat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add potion Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- code.php / code_obat.php -->
      <form action="code_obat.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> id Obat </label>
                <input type="number" name="Id_Obat" class="form-control" placeholder="Masukan Id">
            </div>
            <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" name="Nama_Obat" class="form-control" placeholder="Masukan Nama">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="tambah_obat" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Potion 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddataobat">
              Add Potion Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Id Obat </th>
            <th> Nama Obat </th>
            <th> EDIT </th> 
            <th> DELETE </th>
          </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nama_obat']; ?></td>
                    <td>
                      <!-- code.php / code_obat.php -->
                      <form action="code_obat.php" method="post">
                          <input type="hidden" name="edit_id" value="">
                          <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                      </form>
                    </td>
                    <td>
                    <!-- code.php / code_obat.php -->                      
                    <form action="code_obat.php" method="post">
                        <input type="hidden" name="delete_id" value="<?= $row['id']; ?>">
                        <button type="submit" name="delete_obat" class="btn btn-danger"> DELETE</button>
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