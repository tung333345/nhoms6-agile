
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
            <h1>Quản Lý Slide</h1>
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
                <h3 class="card-title">Thêm Slide</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form style="padding: 30px;" action="?act=insertSlide" method="post" enctype="multipart/form-data">
                    <label for="title" class="form-label" >Title:</label>
                    <input type="text" class="form-control" name="title" id="title" required>

                    <label for="description" class="form-label" >Description:</label>
                    <textarea name="description" id="description"   class="form-control"  required></textarea>

                    <label for="role_slide_id" class="form-label">Role:</label>
                    <select name="role_slide_id" id="role_slide_id" required  class="form-control" >
                        <?php foreach ($roles as $role): ?>
                        <option value="<?= $role['role_slide_id'] ?>"><?= htmlspecialchars($role['role_name']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                            <br> <br>
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" name="image" id="image" required>
                    <br><br> 

                    <button style="margin: 30px;" type="submit" class="btn btn-success">Insert Slide</button>
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
