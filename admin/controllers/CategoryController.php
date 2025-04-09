<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class CategoryController
{
    private $categoryModel;
    private $parentCategoryModel;
    private $errorMessage;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel(connectDB());
        $this->parentCategoryModel = new CategoryModel(connectDB());
        $this->errorMessage = "";
    }

    public function displayCategories()
    {
        $categories = $this->categoryModel->getCategories();
        require_once './views/category/listCategories.php';
    }

    public function addCategory()
    {
        $parentCategories = $this->categoryModel->getParentCategories();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $category_name = $_POST['Category_name'];
            $parent_id = $_POST['Parent_id'];

            if (empty($category_name)) {
                $this->errorMessage = "Tên danh mục là bắt buộc.";
            } else {
                try {
                    $this->categoryModel->insertCategory($category_name, $parent_id);
                    $_SESSION['success_message'] = "Thêm danh mục thành công!";
                    header("Location: index.php?act=listCategories");
                    exit();
                } catch (Exception $e) {
                    $this->errorMessage = "Lỗi: " . $e->getMessage();
                }
            }
        }
        require_once './views/category/addCategory.php';
    }

    public function formEditCategory()
    {
    }
    public function formEditParentCategory()
    {

    }
    public function editCategory()
    {
        $id = $_GET['id'];
        $category = $this->categoryModel->getCategoryByID($id);
        $parentCategories = $this->categoryModel->getParentCategories();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $category_name = $_POST['Category_name'];
            $parent_id = $_POST['Parent_id'];

            if (empty($category_name)) {
                $this->errorMessage = "Tên danh mục là bắt buộc.";
            } else {
                try {
                    $this->categoryModel->editCategory($id, $category_name, $parent_id);
                    $_SESSION['success_message'] = "Sửa danh mục thành công!";
                    header("Location: index.php?act=listCategories");
                } catch (Exception $e) {
                    $this->errorMessage = "Lỗi: " . $e->getMessage();
                }
            }
        }

        require_once './views/category/editCategory.php';
    }

    public function deleteCategory($id)
    {
        $this->categoryModel->deleteCategory($id);
        header("Location: index.php?act=listCategories");
    }

    public function displayParentCategories()
    {
        $parentCategories = $this->parentCategoryModel->getParentCategories();
        require_once './views/parentCategory/listParentCategories.php';
    }

    public function addParentCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ParentCategory_name = $_POST['ParentCategory_name'];

            if (empty($ParentCategory_name)) {
                $this->errorMessage = "Tên danh mục cha là bắt buộc.";
            } else {
                try {
                    $this->parentCategoryModel->insertParentCategory($ParentCategory_name);
                    $_SESSION['success_message'] = "Thêm danh mục cha thành công!";
                    header("Location: index.php?act=listParentCategories");
                } catch (Exception $e) {
                    $this->errorMessage = "Lỗi: " . $e->getMessage();
                }
            }
        }
        require_once './views/parentCategory/addParentCategory.php';
    }

    public function editParentCategory($id)
    {
        $parentCategory = $this->parentCategoryModel->getParentCategoryByID($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ParentCategory_name = $_POST['ParentCategory_name'];
            $Parent_id = $_POST['Parent_id'];

            if (empty($ParentCategory_name)) {
                $this->errorMessage = "Tên danh mục cha là bắt buộc.";
            } elseif ($Parent_id == '0') {
                $this->errorMessage = "Bạn phải chọn danh mục cha.";
            } else {
                try {
                    $this->parentCategoryModel->editParentCategory($id, $ParentCategory_name);
                    $_SESSION['success_message'] = "Sửa danh mục cha thành công!";
                    header("Location: index.php?act=listParentCategories");
                } catch (Exception $e) {
                    $this->errorMessage = "Lỗi: " . $e->getMessage();
                }
            }
        }
        require_once './views/parentCategory/editParentCategory.php';
    }
    public function deleteParentCategory($id)
    {
        $this->parentCategoryModel->deleteParentCategory($id);
        header("Location: index.php?act=listParentCategories");
    }
}
?>