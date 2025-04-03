<?php
class SlideModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=duanmau1', 'root', '');
    }

    public function getAllSlides()
    {
        $query = $this->pdo->query("SELECT * FROM slides");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSlideById($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM slides WHERE id = :id");
        $query->execute(['id' => $id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function getAllRoles()
    {
        $query = $this->pdo->query("SELECT role_slide_id, role_name FROM role_slide");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertSlide($title, $image, $role_slide_id, $description)
    {
        $query = $this->pdo->prepare("INSERT INTO slides (title, image,role_slide_id, description) VALUES (:title, :image,:role_slide_id, :description)");
        return $query->execute(['title' => $title, 'image' => $image, 'role_slide_id' => $role_slide_id, 'description' => $description]);
    }

    public function updateSlide($id, $title, $image, $role_slide_id, $description)
    {
        $query = $this->pdo->prepare("UPDATE slides SET title = :title, image = :image,role_slide_id = :role_slide_id, description = :description WHERE id = :id");
        return $query->execute(['id' => $id, 'title' => $title, 'image' => $image, 'role_slide_id' => $role_slide_id, 'description' => $description]);
    }

    public function deleteSlide($id)
    {
        $query = $this->pdo->prepare("DELETE FROM slides WHERE id = :id");
        return $query->execute(['id' => $id]);
    }
}
?>