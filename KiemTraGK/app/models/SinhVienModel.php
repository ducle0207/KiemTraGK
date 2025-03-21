<?php
include_once '../config/database.php'; // Bao gồm tệp kết nối
class SinhVienModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllSinhVien() {
        $sql = "SELECT * FROM SinhVien";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSinhVienById($maSV) {
        $sql = "SELECT * FROM SinhVien WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':maSV', $maSV);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function createSinhVien($data) {
        $sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES (:maSV, :hoTen, :gioiTinh, :ngaySinh, :hinh, :maNganh)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function updateSinhVien($data) {
        $sql = "UPDATE SinhVien SET HoTen = :hoTen, GioiTinh = :gioiTinh, NgaySinh = :ngaySinh, Hinh = :hinh WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function deleteSinhVien($maSV) {
        $sql = "DELETE FROM SinhVien WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':maSV', $maSV);
        $stmt->execute();
    }
    public function getAllNganhHoc() {
        $sql = "SELECT * FROM nganhhoc";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>