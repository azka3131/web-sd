<?php

require_once __DIR__ . '/../../config/database.php';

class Fasilitas
{

    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM fasilitas ORDER BY id DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $query = "INSERT INTO fasilitas (nama, deskripsi, gambar) VALUES (:nama, :deskripsi, :gambar)";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':nama', $data['nama']);
        $stmt->bindValue(':deskripsi', $data['deskripsi']);
        $stmt->bindValue(':gambar', $data['gambar']);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM fasilitas WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM fasilitas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Simpan perubahan
    public function update($data)
    {
        $query = "UPDATE fasilitas SET nama = :nama, deskripsi = :deskripsi, gambar = :gambar WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(':nama', $data['nama']);
        $stmt->bindValue(':deskripsi', $data['deskripsi']);
        $stmt->bindValue(':gambar', $data['gambar']);
        $stmt->bindValue(':id', $data['id']);

        return $stmt->execute();
    }
}
