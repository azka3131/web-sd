<?php

require_once __DIR__ . '/../../config/database.php';

class Galeri
{

    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM gallery ORDER BY id DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM gallery WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        // Tambahkan :link_drive
        $query = "INSERT INTO gallery (judul, filename, deskripsi, link_drive) VALUES (:judul, :filename, :deskripsi, :link_drive)";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':judul', $data['judul']);
        $stmt->bindValue(':filename', $data['filename']);
        $stmt->bindValue(':deskripsi', $data['deskripsi']);
        $stmt->bindValue(':link_drive', $data['link_drive']); // Bind data link

        return $stmt->execute();
    }

    public function update($data)
    {
        $query = "UPDATE gallery SET judul = :judul, filename = :filename, deskripsi = :deskripsi, link_drive = :link_drive WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':judul', $data['judul']);
        $stmt->bindValue(':filename', $data['filename']);
        $stmt->bindValue(':deskripsi', $data['deskripsi']);
        $stmt->bindValue(':link_drive', $data['link_drive']);
        $stmt->bindValue(':id', $data['id']);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM gallery WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
