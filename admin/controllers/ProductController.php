<?php
require_once './models/ProductModel.php';
require_once '../commons/function.php';

class ProductController
{
    public $productModel;
    private $categoryModel;
    public function __construct()
    {
        $pdo = connectDB();
        $this->productModel = new ProductModel(connectDB()); // Truyền nó vào ProductModel
        $this->categoryModel = new CategoryModel(connectDB());
    }

    function header()
    {
        require '../admin/header.php';
    }

    public function listProducts()
    {
        $categoryId = isset($_GET['categoryId']) ? $_GET['categoryId'] : null;
        $categories = $this->productModel->getCategoriesForProduct();

        if ($categoryId) {
            $products = $this->productModel->getProductsByCategory($categoryId);
        } else {
            $products = $this->productModel->getProducts();
        }

        include './views/products/listProducts.php';
    }

    // public function insertProduct()
    // {
    //     $categories = $this->productModel->getCategories();
    //     $errors = [];
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $dataForm = $_POST;
    //         $Image = "";
    //         $file_img = $_FILES['Image'];
    //         if ($file_img['size'] > 0) {
    //             $Image = "./assets/images/uploads/" . $file_img['name'];
    //             move_uploaded_file($file_img['tmp_name'], $Image);
    //         }
    //         $dataForm['Image'] = $Image;

    //         $this->productModel->insertProduct($dataForm);
    //         echo '<script>alert("Thêm sản phẩm thành công!");</script>';
    //         header('location:?act=listProduct');
    //         die();
    //     }
    //     require './views/products/insertProducts.php';
    // }
    function insertProduct()
    {
        $categories = $this->productModel->getCategories();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];

            if (empty($_POST['Name_product'])) {
                $errors[] = 'Tên sản phẩm là bắt buộc.';
            }
            if (empty($_POST['Price']) || !is_numeric($_POST['Price'])) {
                $errors[] = 'Giá sản phẩm là bắt buộc và phải là số.';
            }
            if (empty($_POST['Promotion_price']) || !is_numeric($_POST['Promotion_price'])) {
                $errors[] = 'Giá khuyến mãi là bắt buộc và phải là số.';
            }
            if (empty($_POST['Id_cat'])) {
                $errors[] = 'Loại sản phẩm là bắt buộc.';
            }

            if (empty($_POST['discount']) || !is_numeric($_POST['discount'])) {
                $errors[] = 'Giảm giá là bắt buộc và phải là số.';
            }

            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo '<p style="color:red;">' . htmlspecialchars($error) . '</p>';
                }
            } else {
                $Name_product = $_POST['Name_product'];
                $Title = $_POST['Title'];
                $Description = $_POST['Description'];
                $Price = $_POST['Price'];
                $Quanlity = $_POST['Quanlity'] ?? null;
                $parent_cate = $_POST['parent_cate'];
                $Size = $_POST['Size'] ?? null;
                $Weight = $_POST['Weight'] ?? null;
                $Color = $_POST['Color'] ?? null;
                $Image = $_FILES['Image']['name'] ?? null;
                $tmp = $_FILES['Image']['tmp_name'] ?? null;
                if ($Image && $tmp) {
                    move_uploaded_file($tmp, './assets/images/uploads/' . $Image);
                }
                $Memory = $_POST['Memory'] ?? null;
                $Os = $_POST['Os'] ?? null;
                $Cpu_speed = $_POST['Cpu_speed'] ?? null;
                $Camera_primary = $_POST['Camera_primary'] ?? null;
                $Camera_secondary = $_POST['Camera_secondary'] ?? null;
                $Battery = $_POST['Battery'] ?? null;
                $Warranty = $_POST['Warranty'] ?? null;
                $Bluetooth = $_POST['Bluetooth'] ?? null;
                $Promotion_price = $_POST['Promotion_price'];
                $Start_promotion = $_POST['Start_promotion'] ?? null;
                $End_promotion = $_POST['End_promotion'] ?? null;
                $Wlan = $_POST['Wlan'] ?? null;
                $Id_cat = $_POST['Id_cat'];
                $Detail = $_POST['Detail'] ?? null;
                $Screen = $_POST['Screen'] ?? null;
                $discount = $_POST['discount'] ?? null;


                $this->productModel->insertProduct(
                    $Name_product,
                    $Title,
                    $Description,
                    $Price,
                    $Quanlity,
                    $parent_cate,
                    $Size,
                    $Weight,
                    $Color,
                    $Image,
                    $Memory,
                    $Os,
                    $Cpu_speed,
                    $Camera_primary,
                    $Camera_secondary,
                    $Battery,
                    $Warranty,
                    $Bluetooth,
                    $Promotion_price,
                    $Start_promotion,
                    $End_promotion,
                    $Wlan,
                    $Id_cat,
                    $Detail,
                    $Screen,
                    $discount
                );

                $_SESSION['success_message'] = "Thêm mới sản phẩm thành công!";
                header('location:?act=listProduct');
                exit();
            }
        } else {
            $categories = $this->categoryModel->getCategories();
            require './views/products/insertProducts.php';
        }
    }



    function updateProduct($id)
    {
        $categories = $this->productModel->getCategories();
        $product = $this->productModel->getProductById($id);
        require_once 'views/products/updateProducts.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_update'])) {
            $Name_product = $_POST['Name_product'];
            $Title = $_POST['Title'];
            $Description = $_POST['Description'];
            $Price = $_POST['Price'];
            $Quanlity = $_POST['Quanlity'];
            $Size = $_POST['Size'];
            $Weight = $_POST['Weight'];
            $Color = $_POST['Color'];
            $Memory = $_POST['Memory'];
            $Os = $_POST['Os'];
            $Cpu_speed = $_POST['Cpu_speed'];
            $Camera_primary = $_POST['Camera_primary'];
            $Camera_secondary = $_POST['Camera_secondary'];
            $Battery = $_POST['Battery'];
            $Warranty = $_POST['Warranty'];
            $Bluetooth = $_POST['Bluetooth'];
            $Promotion_price = $_POST['Promotion_price'];

            $Start_promotion = !empty($_POST['Start_promotion']) ? $_POST['Start_promotion'] : null;
            $End_promotion = !empty($_POST['End_promotion']) ? $_POST['End_promotion'] : null;

            $Wlan = $_POST['Wlan'];
            $Id_cat = $_POST['Id_cat'];
            $Detail = $_POST['Detail'];
            $Screen = $_POST['Screen'];
            $Screen = $_POST['Screen'];
            $discount = $_POST['discount'];
            $Image = $_FILES['Image']['name'];
            $tmp = $_FILES['Image']['tmp_name'];
            move_uploaded_file($tmp, './assets/images/uploads/' . $Image);

            // if (isset($_FILES['Image']) && $_FILES['Image']['error'] == 0) {
            //     $Image = $_FILES['Image']['name'];
            //     $tmp = $_FILES['Image']['tmp_name'];
            //     move_uploaded_file($tmp, './assets/images/uploads/' . $Image);
            // } else {
            //     $Image = $product['Image'];
            // }

            if (
                $this->productModel->updateProduct(
                    $id,
                    $Name_product,
                    $Title,
                    $Description,
                    $Price,
                    $Quanlity,
                    $Size,
                    $Weight,
                    $Color,
                    $Image,
                    $Memory,
                    $Os,
                    $Cpu_speed,
                    $Camera_primary,
                    $Camera_secondary,
                    $Battery,
                    $Warranty,
                    $Bluetooth,
                    $Promotion_price,
                    $Start_promotion,
                    $End_promotion,
                    $Wlan,
                    $Id_cat,
                    $Detail,
                    $Screen,
                    $discount
                )
            ) {
                $_SESSION['success_message'] = "Cập nhật sản phẩm thành công!";
                header("location:?act=listProduct");
                exit();
            } else {
                echo "Lỗi khi cập nhật sản phẩm";
            }
        }
    }


    public function loadViewEditProduct($id)
    {
        $products = $this->productModel->getProductByID($id);
        $categories = $this->productModel->getCategories(); // Lấy danh sách danh mục
        include_once '../admin/views/products/updateProducts.php';

    }



    // function updateProduct($id)
    // {
    //     // require_once "views/UpdateProduct.php";
    //     // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     //     if (isset($_POST['id'])) {

    //     //         $id = $_POST['id'];
    //     //         $productController = new ProductController();
    //     //         $productController->updateProduct($id);
    //     //     } else {
    //     //         echo "ID is required to update the product.";
    //     //     }
    //     // }
    //     // die();
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_update'])) {
    //         // echo "aaaaaaaaa";
    //         // $id = $_POST['id'];
    //         $pro_name = $_POST['pro_name'];
    //         $price = $_POST['price'];
    //         $classify = $_POST['classify'];
    //         $description = $_POST['description'];
    //         $image = $_FILES['image']['name'];
    //         $tmp = $_FILES['image']['tmp_name'];
    //         move_uploaded_file($tmp, '../assets/images/uploads/' . $image);

    //         if ($this->productModel->updateProduct($id, $pro_name, $image, $price, $classify, $description)) {
    //             echo '<script>alert("Cập nhật sản phẩm thành công!");</script>';
    //             header("location:?act=listProduct");
    //             exit();
    //         } else {
    //             echo "Lỗi khi cập nhật sản phẩm";
    //         }

    //     }
    // }

    public function deleteProduct($id)
    {
        if ($this->productModel->deleteProduct($id)) {
            echo '<script>alert("Xóa sản phẩm thành công!");</script>';
        } else {
            echo '<script>alert("Lỗi khi xóa sản phẩm!");</script>';
        }
        header("location:?act=listProduct");
        exit();
    }
}
?>