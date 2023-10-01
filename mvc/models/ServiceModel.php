<?php
<<<<<<< HEAD
    class ServiceModel extends DB{
        public function getAllService(){
            $q = "SELECT * FROM service";
            return mysqli_query($this->connection, $q);
        }
        
        public function suadichvu($id, $ten, $soluong, $gia){
            $query = "UPDATE service SET gia = '$gia', soluong = '$soluong', tendichvu = '$ten' WHERE id = '$id'";

            mysqli_query($this->connection, $query);
        }

        public function getService($id){
            $query = "SELECT * FROM service WHERE id = '$id'";

            mysqli_query($this->connection, $query);
        }

        public function addService($ten, $gia, $soluong){
            $query = "INSERT INTO service(id, tendichvu, gia, soluong) VALUES('', '$ten', '$gia', '$soluong')";

            mysqli_query($this->connection, $query);
        }

        public function DeleteService($id){
            $query = "DELETE from service where id = '$id'";

            mysqli_query($this->connection, $query);
        }
=======
class ServiceModel extends DB
{
    public function getAllService()
    {
        $q = "SELECT * FROM service";
        return mysqli_query($this->connection, $q);
>>>>>>> 02b8d5f (push phan dich vu khach hang)
    }

    public function getAService($id)
    {
        $q = "SELECT * FROM service WHERE id = '$id'";
        return mysqli_query($this->connection, $q);
    }

    public function themdichvu($tendichvu, $giadichvu)
    {
        $query = "INSERT INTO service VALUES('', '$tendichvu', '$giadichvu', 1)";

        mysqli_query($this->connection, $query);
    }


    public function xoadichvu($id)
    {
        $query = "DELETE FROM service WHERE id = '$id'";

        mysqli_query($this->connection, $query);
    }


    public function suadichvu($id, $tendichvu, $gia)
    {
        $query = "UPDATE  service SET tendichvu = '$tendichvu', gia='$gia'  WHERE id = '$id'";

        mysqli_query($this->connection, $query);
    }
}
