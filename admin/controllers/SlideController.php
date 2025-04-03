<?php
class SlideController
{
    private $slideModel;

    public function __construct()
    {
        $this->slideModel = new SlideModel();
    }

    public function listSlides()
    {
        $slides = $this->slideModel->getAllSlides();
        include './views/slide/list.php';
    }

    public function showInsertForm()
    {
        $roles = $this->slideModel->getAllRoles();
        include './views/slide/insert.php';
    }

    public function insertSlide()
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $role_slide_id = $_POST['role_slide_id'];

        $image = $_FILES['image']['name'];
        $target_dir = "./assets/images/uploads/";
        $target_file = $target_dir . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $this->slideModel->insertSlide($title, $image, $role_slide_id, $description);
            $_SESSION['success_message'] = "Thêm mới slide thành công!";
            header('Location: ?act=listSlides');
        } else {
            echo "uploads không thành công";
        }
    }
    public function showEditForm($id)
    {
        $slide = $this->slideModel->getSlideById($id);
        $roles = $this->slideModel->getAllRoles();
        include './views/slide/edit.php';
    }

    public function updateSlide()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $role_slide_id = $_POST['role_slide_id'];

        $image = $_FILES['image']['name'] ? $_FILES['image']['name'] : $_POST['existing_image'];
        $target_dir = "./assets/images/uploads/";
        $target_file = $target_dir . basename($image);

        if ($_FILES['image']['name']) {
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        }

        $this->slideModel->updateSlide($id, $title, $image, $role_slide_id, $description);
        $_SESSION['success_message'] = "Cập nhật slide thành công!";
        header('Location: ?act=listSlides');
    }




    // public function updateSlide()
    // {
    //     $id = $_POST['id'];
    //     $title = $_POST['title'];
    //     $description = $_POST['description'];
    //     $image = $_FILES['image']['name'] ? $this->uploadImage($_FILES['image']) : $_POST['existing_image'];
    //     $this->model->updateSlide($id, $title, $image, $description);
    //     header('Location: ?act=listSlides');
    // }

    public function deleteSlide($id)
    {
        $this->slideModel->deleteSlide($id);
        header('Location: ?act=listSlides');
    }

    private function uploadImage($file)
    {
        $target_dir = "./assets/images/uploads//";
        $target_file = $target_dir . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $target_file);
        return $target_file;
    }
}
?>