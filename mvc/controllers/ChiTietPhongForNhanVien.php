<?php
class ChiTietPhongForNhanVien extends Controller
{
    public function start($roomID)
    {
        $roomModel = $this->model("RoomModelForNhanVien");
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


            $checkCustomer = $customerModel->getACustomerForCCCD($cccd);
            $dataCheckCustomer = mysqli_num_rows($checkCustomer);

            if ($dataCheckCustomer > 0) {
                $roomOrdered->addRoomOrdered($roomID, $ngaydat, '', $loaiphong, $gia, $tenkhachhang, $cccd, $sdt, $ngaysinh, $quoctich, $diachi, $gioitinh);
                $roomModel->updateStatusRoom($roomID, 'Đã đặt', $tenkhachhang);
                $customerModel->addCustomer($tenkhachhang, $cccd, $sdt, $ngaysinh, $quoctich, $diachi, $gioitinh, 1, 'Đã đặt');
                $hoaDonModel->addHoaDon($tenkhachhang, $roomID, $ngaydat, '', '', 0);
            } else {
                $solandat = $customerModel->getSoLanDatPhong($cccd);
                $i = $solandat + 1;
                $roomOrdered->addRoomOrdered($roomID, $ngaydat, '', $loaiphong, $gia, $tenkhachhang, $cccd, $sdt, $ngaysinh, $quoctich, $diachi, $gioitinh);
                $roomModel->updateStatusRoom($roomID, 'Đã đặt', $tenkhachhang);
                $customerModel->updateOldCustomer($cccd, $i);
                $hoaDonModel->addHoaDon($tenkhachhang, $roomID, $ngaydat, '', '', 0);
            }


        }

        if(isset($_POST['btnnhanphong'])){
            $ngaynhanphong = $_POST['ngaynhanphong'];
            //lay ten kh
            $dataTenKH =  $roomModel->getTenKH($roomID);
            $tenKH = mysqli_fetch_row($dataTenKH);

            //update trang thai room
            $roomModel->updatetrangthaiphong($roomID, 'Đã nhận');
            var_dump($tenKH);
            $hoaDonModel->updateHoaDonNgayNhan($tenKH, $roomID, $ngaynhanphong);
        }

        if(isset($_POST['btntraphong'])){
            $ngaytra = $_POST['ngaytraphong'];
            $dataTenKH = $roomModel->getTenKH($roomID);
            $tenKH = mysqli_fetch_row($dataTenKH);

            $roomModel->updateStatusRoom($roomID, 'Đang trống', 'Đang trống');
            var_dump($tenKH);
            $hoaDonModel->updateHoaDonTraPhong($roomID, $ngaytra);

            $dataRoomAlone = $roomModel->getRoomType("Phòng đơn");
            $dataRoomCouple = $roomModel->getRoomType("Phòng đôi");
            $dataRoomFamily = $roomModel->getRoomType("Phòng gia đình");
    
            $this->view("defaultLayout", [
                "container" => "QuanLyPhongForNhanVien",
                "roomAlone" => $dataRoomAlone,
                "roomCouple" => $dataRoomCouple,
                "roomFamily" => $dataRoomFamily,
                "hoadonModel" => $hoaDonModel
            ]);
        }

        $dataService = $serviceModel->getAllService();
        $dataRoom =  $roomModel->getARoom($roomID);
        $room = mysqli_fetch_row($dataRoom);

        if (isset($_GET['roomID'])) {
            var_dump($_GET['roomID']);
        }
        $this->view("defaultLayout", [
            "container" => "ChiTietPhongForNhanVien",
            "room" => $room,
            "dataService" => $dataService,
            "hoaDonModel" => $hoaDonModel
        ]);
    }


    public function sua($id)
    {

        $roomModel = $this->model("RoomModelForNhanVien");
        $hoaDonModel = $this->model("HoaDonModel");
        $dataRoom = $roomModel->getARoom($id);

        if (isset($_POST['btnsuaphong'])) {
            $room = mysqli_fetch_row($dataRoom);

            if ($room[2] == "Đang trống") {
                $tenphong = $_POST['tenphong'];
                $loaiphong = $_POST['loaiphong'];
                $trangthaiphong = $_POST['trangthaiphong'];
                $gia = $_POST['gia'];

                $roomModel->updateARoom($tenphong,  $loaiphong, $trangthaiphong, '', $gia);
            } else if ($room[2] == "Đã đặt") {
                $tenphong = $_POST['tenphong'];
                $loaiphong = $_POST['loaiphong'];
                $trangthaiphong = $_POST['trangthaiphong'];
                $ngaydat = $_POST['ngaydat'];
                $khachhang = $_POST['khachhang'];
                $gia = $_POST['gia'];

                $hoaDonModel->updateHoaDon($khachhang, $tenphong, $ngaydat, '');
                $roomModel->updateARoom($tenphong, $loaiphong, $trangthaiphong, $khachhang, $gia);
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
            "container" => "SuaPhongForNhanVien",
            "dataRoom" => $dataRoom,
            "hoaDonModel" => $hoaDonModel
        ]);
    }
}