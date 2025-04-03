
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
                <h3 class="card-title">Sửa Slide</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="?act=updateSlide" method="post" enctype="multipart/form-data" ?>
                <div class="card-body">
                  <div class="form-group">
                  <label for="Category_name">Category Name:</label>
                    <input type="hidden" name="id" value="<?= $slide['id'] ?>" placeholder="Nhập Tên Danh Mục">
                  </div>
                  <br>
                  <div class="form-group">
                  <label for="title">Title:</label>
                  <input type="text" name="title" id="title" value="<?= htmlspecialchars($slide['title']) ?>" required>
                  <br>
                  <label for="description">Description:</label>
                    <textarea name="description" id="description"
                        required><?= htmlspecialchars($slide['description']) ?></textarea>
                        <br>

                    <label for="role_slide_id">Role:</label>
                    <select name="role_slide_id" id="role_slide_id" required>
                        <?php foreach ($roles as $role): ?>
                            <br>
                        <option value="<?= $role['role_slide_id'] ?>"
                            <?= $role['role_slide_id'] == $slide['role_slide_id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($role['role_name']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <br>

                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image">
                    <input type="hidden" name="existing_image" value="<?= htmlspecialchars($slide['image']) ?>">
                            
                    <button type="submit">Update Slide</button>
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
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
