<?php
class ClientProductCateController
{
    private $clienProductCatetModel;

    public function __construct()
    {
        $pdo = connectDB();
        $this->clienProductCatetModel = new ClientModelCate($pdo);
    }
    public function productsByCategory($id)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $categoryId = htmlspecialchars($_GET['id']);
            $itemsPerPage = 10;
            $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            $offset = ($currentPage - 1) * $itemsPerPage;

            $productsByCategory = $this->clienProductCatetModel->getProductsByCategoryIdDetail($categoryId, $itemsPerPage, $offset);
            $totalProducts = $this->clienProductCatetModel->getTotalProductsByCategoryId($categoryId);
            $totalPages = ceil($totalProducts / $itemsPerPage);
        }
        include './views/products_byCategory.php';
    }

    public function productsByParentId($id)
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $parentId = htmlspecialchars($_GET['id']);
            $itemsPerPage = 10;
            $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            $offset = ($currentPage - 1) * $itemsPerPage;

            $productsByParent = $this->clienProductCatetModel->getProductsByParentId($parentId, $itemsPerPage, $offset);
            $totalProducts = $this->clienProductCatetModel->getTotalProductsByParentId($parentId);
            $totalPages = ceil($totalProducts / $itemsPerPage);
        }
        include './views/products_byCategory.php';
    }
}
?>