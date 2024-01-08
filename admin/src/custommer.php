<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
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
                <label> Nama </label>
                <input type="text" name="Nama" class="form-control" placeholder="Masukan Nama">
            </div>
            <div class="form-group">
                <label> Alamat</label>
                <input type="text" name="text" class="form-control" placeholder="Masukan Alamat">
            </div>
            <div class="form-group">
                <label> No handphone</label>
                <input type="text" name="text" class="form-control" placeholder="Masukan No handphone">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select class="form-control input" name="gender" required>
                    <option value="laki-laki">Laki - Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Custommer 
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
            <th> ID </th>
            <th> Nama </th>
            <th> Alamat </th>
            <th> No handphone</th>
            <th> Gender</th>
            <th> EDIT </th>
            <th> DELETE </th>
          </tr>
        </thead>
        <tbody>
     
          <tr>
            <td> 1 </td>
            <td> custommer 1</td>
            <td> jl.hehe no 23 tegal</td>
            <td> 081800544669</td>
            <td> laki-laki </td>            
            <td>
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
        
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