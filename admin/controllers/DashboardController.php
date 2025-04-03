<?php
class DashboardController
{
    private $dashboardModel;

    public function __construct()
    {

        $this->dashboardModel = new DashboardModel();
    }

    public function showDashboard()
    {
        $totalUsers = $this->dashboardModel->getTotalUsers();
        $totalComments = $this->dashboardModel->getTotalComments();
        $totalProducts = $this->dashboardModel->getTotalProducts();
        $totalCategories = $this->dashboardModel->getTotalCategories();

        include './views/dashBoard.php'; // Tải view cho Dashboard
    }
}
?>