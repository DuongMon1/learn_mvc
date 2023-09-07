<?php
class RoomModel extends DB
{
    public function getAllRoom()
    {
        $query = "SELECT * FROM rooms";

        return mysqli_query($this->connection, $query);
    }

    public function getARoom($roomID)
    {
        $query = "SELECT * FROM rooms WHERE roomID = '$roomID'";

        return mysqli_query($this->connection, $query);
    }

    public function getARoomForName($name)
    {
        $query = "SELECT * FROM rooms WHERE name = '$name'";

        return mysqli_query($this->connection, $query);
    }

    public function getRoomType($loaiphong)
    {
        $query = "SELECT * FROM rooms WHERE loaiphong = '$loaiphong'";

        return mysqli_query($this->connection, $query);
    }

    public function addRoom($roomID, $loaiPhong, $trangthaiPhong, $name, $gia)
    {
        $query = "INSERT INTO rooms(roomID, loaiphong, trangthaiphong, name, gia) VALUES($roomID, '$loaiPhong', '$trangthaiPhong', '$name', $gia)";
        mysqli_query($this->connection, $query);
    }

    public function updateARoom($roomID, $loaiPhong, $trangthaiPhong, $name, $gia)
    {
        $query  = "UPDATE rooms SET loaiphong = '$loaiPhong', trangthaiphong = '$trangthaiPhong', name = '$name', gia = '$gia' WHERE roomID = '$roomID'";

        mysqli_query($this->connection, $query);
    }

    public function updateStatusRoom($roomID, $trangthaiPhong, $name)
    {
        $query  = "UPDATE rooms SET  trangthaiphong = '$trangthaiPhong',  name = '$name' WHERE roomID = '$roomID'";

        mysqli_query($this->connection, $query);
    }

    public function deleteRoom($roomID)
    {
        $query = "DELETE FROM roooms WHERE roomID = '$roomID'";
        mysqli_query($this->connection, $query);
    }

    public function getLoaiPhong($roomID)
    {
        $query = "SELECT loaiphong FROM rooms WHERE roomID = '$roomID'";
        $data = mysqli_query($this->connection, $query);
        $loaiphong = mysqli_fetch_row($data);
        return $loaiphong[0];
    }

    public function getGiaPhong($roomID)
    {
        $query = "SELECT gia FROM rooms WHERE roomID = '$roomID'";
        $data = mysqli_query($this->connection, $query);
        $gia = mysqli_fetch_row($data);
        return $gia[0];
    }
}
