
<!-- header -->
<?php include './views/layout/header.php'; ?>
 <!-- header -->
  <!-- <nav>
    <?php include './views/layout/navbar.php';  ?>
  </nav> -->

  

  <!-- Main Sidebar Container -->
  <?php include './views/layout/sidebar.php';  ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản Lý Admin</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form style="padding: 30px;" action="?act=editUserAdmin&id=<?= $userAdmin['User_admin_id'] ?>" method="post" ?>
              Username: <input type="text" name="Username_admin"
                        value="<?= htmlspecialchars($userAdmin['Username_admin']) ?>" placeholder="Nhập Username">
                        <br> <br>
              Password: <input type="password" name="Password_id" placeholder="Nhập Password">
              <br> <br>

                    <input style="margin-left: 105px;"  type="submit" value="Update Admin" name="btn_update">
              </form>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <?php include './views/layout/footer.php'; ?>
 

</body>
</html>
