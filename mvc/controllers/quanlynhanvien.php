<?php
class quanlynhanvien extends Controller
{
    public function start()
    {
        $nhanvienModel = $this->model("NhanVienModel");
        $dataNhanviens = $nhanvienModel->getAllNhanVien();

        if (isset($_POST['themnhanvien'])) {
            $name = $_POST['name'];
            $cccd = $_POST['cccd'];
            $sdt = $_POST['sdt'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $quoctich=$_POST['quoctich'];
            $chucvu = $_POST['chucvu'];
    
            $nhanvienModel->addNhanVien($name, $cccd, $sdt, $ngaysinh, $diachi, $quoctich, $chucvu);
            header('Location: http://localhost/learn_mvc/quanlynhanvien');
        }
        
        $this->view("defaultLayout", [
            "container" => "quanlynhanvien",
            "nhanviens" => $dataNhanviens,

        ]);
    }
    public function edit($ID)
    {
        $nhanvienModel = $this->model("NhanVienModel");


        if (isset($_POST['btnsuanv'])) {
            $tennhanvien = $_POST['tennhanvien'];
            $cccd = $_POST['cccd'];
            $sdt = $_POST['sdt'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $quoctich=$_POST['quoctich'];
            $chucvu = $_POST['chucvu'];

            $nhanvienModel->updateNhanvien($tennhanvien, $cccd, $sdt, $ngaysinh, $diachi, $quoctich,  $chucvu);
            header('Location: http://localhost/learn_mvc/quanlynhanvien');
        }

        $dataNhanvien = $nhanvienModel->getANhanVienForID($ID);

        $this->view("fullLayout", [
            "container" => "suathongtinnhanvien",
            "nhanvien" => $dataNhanvien,

        ]);
    }
   
    
    
}