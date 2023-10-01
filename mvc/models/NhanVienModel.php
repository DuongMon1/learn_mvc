<?php
class NhanVienModel extends DB
{
    public function getAllNhanVien()
    {
        $query = "SELECT * FROM nhanvien";

        return mysqli_query($this->connection, $query);
    }

    public function getANhanVien($name)
    {
        $query = "SELECT * FROM nhanvien WHERE name = '$name'";

        return mysqli_query($this->connection, $query);
    }

    public function getANhanVienForID($ID)
    {
        $query = "SELECT * FROM nhanvien WHERE id = '$ID'";

        return mysqli_query($this->connection, $query);
    }

    public function addNhanVien($name, $cccd, $sdt, $ngaysinh, $diachi, $quoctich, $chucvu)
    {
        $query = "INSERT INTO nhanvien ( name, cccd, sdt, ngaysinh, diachi,quoctich, chucvu )
        VALUES( '$name', '$cccd', '$sdt', '$ngaysinh', '$diachi','$quoctich', '$chucvu')";

        mysqli_query($this->connection, $query);
    }

    public function updateNhanvien($name, $cccd, $sdt, $ngaysinh, $diachi, $quoctich, $chucvu)
    {
        $query = "UPDATE nhanvien
        SET  cccd = '$cccd', sdt = '$sdt', ngaysinh ='$ngaysinh', diachi = '$diachi',quoctich='$quoctich', chucvu = '$chucvu' WHERE name='$name'";

        mysqli_query($this->connection, $query);
    }
    
    public function deleteNhanvien($ID){
        $query = "DELETE from nhanvien WHERE id = '$ID'";

        mysqli_query($this->connection, $query);
    }
}