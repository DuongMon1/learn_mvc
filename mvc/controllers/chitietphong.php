<?php
class chitietphong extends Controller
{
    public function start($roomID)
    {
        $roomModel = $this->model("RoomModel");
        $customerModel = $this->model("CustomerModel");
        $roomOrdered = $this->model("RoomOrdered");
        $serviceModel = $this->model("ServiceModel");
        $hoaDonModel = $this->model("HoaDonModel");

        ///xu ly dat phong
        if (isset($_POST['datphong'])) {

            // lay du lieu tu form dat phong
            $tenkhachhang = $_POST['tenkhachhang'];
            $cccd = $_POST['cccd'];
            $sdt = $_POST['sdt'];
            $ngaysinh = $_POST['ngaysinh'];
            $quoctich = $_POST['quoctich'];
            $diachi = $_POST['diachi'];
            $gioitinh = $_POST['gioitinh'];
            $ngaydat = $_POST['ngaydat'];
            $loaiphong =  $roomModel->getLoaiPhong($roomID);
            $gia =  $roomModel->getGiaPhong($roomID);


            //kiem tra xem có tồn tại kh
            $checkCustomer = $customerModel->getACustomer($tenkhachhang);
            $dataCheckCustomer = mysqli_num_rows($checkCustomer);

<<<<<<< HEAD
            if ($dataCheckCustomer > 0) {
                $addCustomer = $customerModel->addCustomer($tenkhachhang, $cccd, $sdt, $ngaysinh, $quoctich, $diachi, $gioitinh, $ngaydat, $loaiphong, $gia);
                $roomOrdered->addRoomOrdered($roomID, $ngaydat, '', $loaiphong, $gia, $tenkhachhang, $cccd, $sdt, $ngaysinh, $quoctich, $diachi, $gioitinh);
                $roomModel->updateStatusRoom($roomID, 'Đã đặt', $tenkhachhang);
                $customerModel->addCustomer($tenkhachhang, $cccd, $sdt, $ngaysinh, $quoctich, $diachi, $gioitinh, 1, 'Đã đặt');
                $hoaDonModel->addHoaDon($tenkhachhang, $roomID, $ngaydat, '', '', 0);
=======
            $dataC = mysqli_fetch_row($checkCustomer);

            if ($dataCheckCustomer > 0 && $dataC[9] == "Đã đặt") {
                echo "err";
            } else if ($dataCheckCustomer > 0 && $dataC[9] == "Đã trả") {
                $roomOrdered->addRoomOrdered($roomID, $ngaydat, '', $loaiphong, $gia, $tenkhachhang, $cccd, $sdt, $ngaysinh, $quoctich, $diachi, $gioitinh);
                $roomModel->updateStatusRoom($roomID, 'Đã đặt', $tenkhachhang);
                $customerModel->suatrangdat($tenkhachhang);

                $dataR = $roomOrdered->getSHD($roomID, $tenkhachhang, $ngaydat);
                $shd = mysqli_fetch_row($dataR);

                $hoaDonModel->addHoaDon($tenkhachhang, $roomID, $ngaydat, '', '', 0, $shd[5]);
>>>>>>> 02b8d5f (push phan dich vu khach hang)
            } else {
                $roomOrdered->addRoomOrdered($roomID, $ngaydat, '', $loaiphong, $gia, $tenkhachhang, $cccd, $sdt, $ngaysinh, $quoctich, $diachi, $gioitinh);
                $roomModel->updateStatusRoom($roomID, 'Đã đặt', $tenkhachhang);
                $customerModel->addCustomer($tenkhachhang, $cccd, $sdt, $ngaysinh, $quoctich, $diachi, $gioitinh, 1, 'Đã đặt');

                $dataR = $roomOrdered->getSHD($roomID, $tenkhachhang, $ngaydat);
                $shd = mysqli_fetch_row($dataR);

                $hoaDonModel->addHoaDon($tenkhachhang, $roomID, $ngaydat, '', '', 0, $shd[5]);
            }
        }


        //nhan phong
        if (isset($_POST['btnnhanphong'])) {

            $ngaynhanphong = $_POST['ngaynhanphong'];

            $dataRoom = $roomModel->getARoom($roomID);
            $room = mysqli_fetch_row($dataRoom);


            $hoaDonModel->updateNgayNhan($room[3], $roomID, $ngaynhanphong);
            $roomModel->updateTrangthaiphong($roomID, 'Đã nhận');
        }


        //xoa phong
        if (isset($_POST['btnxoaphong'])) {

            $roomModel->deleteRoom($roomID);

            header("Location: ../../../learn_mvc/quanLyPhong");
        }


        //tra phong
        if (isset($_POST['btntraphong'])) {
            $ngaytraphong = $_POST['ngaytraphong'];

            $dataRoom = $roomModel->getARoom($roomID);
            $room = mysqli_fetch_row($dataRoom);


            $hoaDonModel->updateNgayTra($room[3], $roomID, $ngaytraphong);
            $roomModel->updateTrangthaiphong($roomID, 'Đang trống');
            $roomModel->setPhongtrong($roomID);
            $customerModel->suatrangthaidat($room[3]);
        }


        //datdichvu
        if (isset($_POST['datdichvu'])) {
            if (isset($_POST['aa'])) {

                $n = $_POST['aa'];
                echo $n;
            }
        }


        $dataService = $serviceModel->getAllService();
        $dataRoom =  $roomModel->getARoom($roomID);
        $room = mysqli_fetch_row($dataRoom);

        if (isset($_GET['roomID'])) {
            // var_dump($_GET['roomID']);
        }
        $this->view("defaultLayout", [
            "container" => "chitietphong",
            "room" => $room,
            "dataService" => $dataService,
            "hoaDonModel" => $hoaDonModel
        ]);
    }


    public function sua($id)
    {

        $roomModel = $this->model("RoomModel");
        $hoaDonModel = $this->model("HoaDonModel");
        $dataRoom = $roomModel->getARoom($id);

        if (isset($_POST['btnsuaphong'])) {
            $room = mysqli_fetch_row($dataRoom);

            if ($room[2] == "Đang trống") {
                $tenphong = $_POST['tenphong'];
                $loaiphong = $_POST['loaiphong'];
                $trangthaiphong = $_POST['trangthaiphong'];
                $gia = $_POST['gia'];

                $roomModel->updateARoom($tenphong, $loaiphong, $trangthaiphong, '', $gia);
            } else if ($room[2] == "Đã đặt") {
                $tenphong = $_POST['tenphong'];
                $loaiphong = $_POST['loaiphong'];
                $trangthaiphong = $_POST['trangthaiphong'];
                $ngaydat = $_POST['ngaydat'];
                $khachhang = $_POST['khachhang'];
                $gia = $_POST['gia'];

                $hoaDonModel->updateHoaDon($khachhang, $tenphong, $ngaydat, '');
                $roomModel->updateARoom($tenphong, $loaiphong, 'Đã đặt', $khachhang, $gia);
            } else {
                $tenphong = $_POST['tenphong'];
                $loaiphong = $_POST['loaiphong'];
                $trangthaiphong = $_POST['trangthaiphong'];
                $ngaydat = $_POST['ngaydat'];
                $ngaynhan = $_POST['ngaynhan'];
                $khachhang = $_POST['khachhang'];
                $gia = $_POST['gia'];

                $hoaDonModel->updateHoaDon($khachhang, $tenphong, $ngaydat, $ngaynhan);
                $roomModel->updateARoom($tenphong, $loaiphong, $trangthaiphong, $ngaydat, $ngaynhan, $khachhang, $gia);
            }
        }


        $dataRoom = $roomModel->getARoom($id);



        $this->view("fullLayout", [
            "container" => "suaphong",
            "dataRoom" => $dataRoom,
            "hoaDonModel" => $hoaDonModel
        ]);
    }
}
