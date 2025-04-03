<?php

class ProductModel
{
    public $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    // Phương thức lấy danh sách sản phẩm
    public function getProducts()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Phương thức lấy sản phẩm theo ID
    public function getProductByID($id)
    {
        try {
            $sql = "SELECT * FROM products WHERE Id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return [];
        }
    }

    // Phương thức lấy danh sách danh mục
    public function getCategories()
    {
        try {
            $sql = "SELECT id, Category_name, Parent_id FROM category";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return [];
        }
    }
    public function getCategoriesForProduct()
    {
        $sql = "SELECT id , Category_name FROM category";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsByCategory($categoryId)
    {
        $sql = "SELECT * FROM products WHERE Id_cat = :categoryId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':categoryId' => $categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertProduct(
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
    ) {
        $sql = "INSERT INTO products (Name_product, Title, Description, Price, Quanlity,parent_cate, Size, Weight, Color, Image, Memory, Os, Cpu_speed, Camera_primary, Camera_secondary, Battery, Warranty, Bluetooth, Promotion_price, Start_promotion, End_promotion, Wlan, Id_cat, Detail, Screen, discount) 
                VALUES (:Name_product, :Title, :Description, :Price, :Quanlity,:parent_cate, :Size, :Weight, :Color, :Image, :Memory, :Os, :Cpu_speed, :Camera_primary, :Camera_secondary, :Battery, :Warranty, :Bluetooth, :Promotion_price, :Start_promotion, :End_promotion, :Wlan, :Id_cat, :Detail, :Screen, :discount)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':Name_product', $Name_product, PDO::PARAM_STR);
        $stmt->bindParam(':Title', $Title, PDO::PARAM_STR);
        $stmt->bindParam(':Description', $Description, PDO::PARAM_STR);
        $stmt->bindParam(':Price', $Price, PDO::PARAM_STR);
        $stmt->bindParam(':Quanlity', $Quanlity, PDO::PARAM_INT);
        $stmt->bindParam(':parent_cate', $parent_cate, PDO::PARAM_INT);
        $stmt->bindParam(':Size', $Size, PDO::PARAM_STR);
        $stmt->bindParam(':Weight', $Weight, PDO::PARAM_STR);
        $stmt->bindParam(':Color', $Color, PDO::PARAM_STR);
        $stmt->bindParam(':Image', $Image, PDO::PARAM_STR);
        $stmt->bindParam(':Memory', $Memory, PDO::PARAM_STR);
        $stmt->bindParam(':Os', $Os, PDO::PARAM_STR);
        $stmt->bindParam(':Cpu_speed', $Cpu_speed, PDO::PARAM_STR);
        $stmt->bindParam(':Camera_primary', $Camera_primary, PDO::PARAM_STR);
        $stmt->bindParam(':Camera_secondary', $Camera_secondary, PDO::PARAM_STR);
        $stmt->bindParam(':Battery', $Battery, PDO::PARAM_STR);
        $stmt->bindParam(':Warranty', $Warranty, PDO::PARAM_STR);
        $stmt->bindParam(':Bluetooth', $Bluetooth, PDO::PARAM_STR);
        $stmt->bindParam(':Promotion_price', $Promotion_price, PDO::PARAM_STR);
        $stmt->bindParam(':Start_promotion', $Start_promotion, PDO::PARAM_STR);
        $stmt->bindParam(':End_promotion', $End_promotion, PDO::PARAM_STR);
        $stmt->bindParam(':Wlan', $Wlan, PDO::PARAM_STR);
        $stmt->bindParam(':Id_cat', $Id_cat, PDO::PARAM_INT);
        $stmt->bindParam(':Detail', $Detail, PDO::PARAM_STR);
        $stmt->bindParam(':Screen', $Screen, PDO::PARAM_STR);
        $stmt->bindParam(':discount', $discount, PDO::PARAM_INT);


        $stmt->execute();
    }

    // public function insertProduct($dataForm)
    // {
    //     $sql = "INSERT INTO products (Name_product, Title, Description, Price, Quanlity,parent_cate, Size, Weight, Color, Image, Memory, Os, Cpu_speed, Camera_primary, Camera_secondary, Battery, Warranty, Bluetooth, Promotion_price, Start_promotion, End_promotion, Wlan, Id_cat, Detail, Screen, discount) 
    //             VALUES (:Name_product, :Title, :Description, :Price, :Quanlity,:parent_cate, :Size, :Weight, :Color, :Image, :Memory, :Os, :Cpu_speed, :Camera_primary, :Camera_secondary, :Battery, :Warranty, :Bluetooth, :Promotion_price, :Start_promotion, :End_promotion, :Wlan, :Id_cat, :Detail, :Screen, :discount)";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute($dataForm);
    // }
    // public function insertProduct($dataForm)
    // {
    //     // Kiểm tra số lượng tham số trong câu lệnh SQL
    //     $sql = "INSERT INTO products (Name_product, Title, Description, Price, Quanlity, parent_cate, Size, Weight, Color, Image, Memory, Os, Cpu_speed, Camera_primary, Camera_secondary, Battery, Warranty, Bluetooth, Promotion_price, Start_promotion, End_promotion, Wlan, Id_cat, Detail, Screen, discount) 
    //             VALUES (:Name_product, :Title, :Description, :Price, :Quanlity, :parent_cate, :Size, :Weight, :Color, :Image, :Memory, :Os, :Cpu_speed, :Camera_primary, :Camera_secondary, :Battery, :Warranty, :Bluetooth, :Promotion_price, :Start_promotion, :End_promotion, :Wlan, :Id_cat, :Detail, :Screen, :discount)";

    //     $stmt = $this->pdo->prepare($sql);

    //     // Thực hiện câu lệnh với mảng dữ liệu
    //     $stmt->execute($dataForm); // Đảm bảo $dataForm có đủ các khóa tương ứng
    // }
    public function updateProduct(
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
    ) {
        $sql = "UPDATE products SET 
            Name_product = :Name_product, 
            Title = :Title, 
            Description = :Description, 
            Price = :Price, 
            Quanlity = :Quanlity, 
            Size = :Size, 
            Weight = :Weight, 
            Color = :Color, 
            Image = :Image, 
            Memory = :Memory, 
            Os = :Os, 
            Cpu_speed = :Cpu_speed, 
            Camera_primary = :Camera_primary, 
            Camera_secondary = :Camera_secondary, 
            Battery = :Battery, 
            Warranty = :Warranty, 
            Bluetooth = :Bluetooth, 
            Promotion_price = :Promotion_price, 
            Start_promotion = :Start_promotion, 
            End_promotion = :End_promotion, 
            Wlan = :Wlan, 
            Id_cat = :Id_cat, 
            Detail = :Detail, 
            Screen = :Screen,
            discount = :discount
            WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':Name_product', $Name_product);
        $stmt->bindParam(':Title', $Title);
        $stmt->bindParam(':Description', $Description);
        $stmt->bindParam(':Price', $Price);
        $stmt->bindParam(':Quanlity', $Quanlity);
        $stmt->bindParam(':Size', $Size);
        $stmt->bindParam(':Weight', $Weight);
        $stmt->bindParam(':Color', $Color);
        $stmt->bindParam(':Image', $Image);
        $stmt->bindParam(':Memory', $Memory);
        $stmt->bindParam(':Os', $Os);
        $stmt->bindParam(':Cpu_speed', $Cpu_speed);
        $stmt->bindParam(':Camera_primary', $Camera_primary);
        $stmt->bindParam(':Camera_secondary', $Camera_secondary);
        $stmt->bindParam(':Battery', $Battery);
        $stmt->bindParam(':Warranty', $Warranty);
        $stmt->bindParam(':Bluetooth', $Bluetooth);
        $stmt->bindParam(':Promotion_price', $Promotion_price);
        $stmt->bindParam(':Start_promotion', $Start_promotion);
        $stmt->bindParam(':End_promotion', $End_promotion);
        $stmt->bindParam(':Wlan', $Wlan);
        $stmt->bindParam(':Id_cat', $Id_cat);
        $stmt->bindParam(':Detail', $Detail);
        $stmt->bindParam(':Screen', $Screen);
        $stmt->bindParam(':discount', $discount);

        return $stmt->execute();

    }
    // Phương thức xóa sản phẩm
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>