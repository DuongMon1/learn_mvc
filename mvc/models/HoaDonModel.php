<?php
class HoaDonModel extends DB
{
    public function getAHoaDon($name, $roomID)
    {
        $query = "SELECT * FROM hoadon WHERE name = '$name' AND roomID = '$roomID'";

        return mysqli_query($this->connection, $query);
    }



    public function addHoaDon($name, $roomID, $ngaydat, $ngaynhan, $ngaytra, $tongchiphi)
    {
        $query = "INSERT INTO  hoadon VALUES('', '$name', '$roomID', '$ngaydat', '$ngaynhan', '$ngaytra', '$tongchiphi')";

        mysqli_query($this->connection, $query);
    }



    public function updateHoaDon($name, $roomID, $ngaydat, $ngaynhan)
    {
        $query = "UPDATE hoadon SET ngaydat = '$ngaydat', ngaynhan = '$ngaynhan' WHERE name = '$name' AND roomID = '$roomID' ";

        mysqli_query($this->connection, $query);
    }

    public function updateHoaDonNgayNhan($name, $roomID, $ngaynhan){
        $query = "UPDATE hoadon SET ngaynhan = '$ngaynhan' WHERE name = '$name' AND roomID = '$roomID' ";

        mysqli_query($this->connection, $query);
    }

    public function updateHoaDonTraPhong($roomID, $ngaytra){
        $query = "UPDATE hoadon SET ngaytra = '$ngaytra' WHERE roomID = '$roomID' ";

        mysqli_query($this->connection, $query);
    }
}
