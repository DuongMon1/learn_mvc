<?php
$room = $data['room'];
$hoadon = $data['hoaDonModel'];
$services = $data['dataService'];
$sldichvu = 0;
?>

<div class="chitietphong" style="display: flex; margin-top: 50px; ">
    <div class="chitiet_left" style="width: 50%;">
        <h4>Thông tin chi tiết của phòng</h4>
        <form method="post" class="phong_content" style="margin-top: 30px;">
            <?php
            if ($room[2] == "Đang trống") {

            ?>
                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Tên phòng:</span>
                    <p><?php echo "P" . $room[0]; ?></p>
                </div>
                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Loại phòng:</span>
                    <p><?php echo  $room[1]; ?></p>
                </div>
                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Trạng thái hiện tại:</span>
                    <p><?php echo $room[2]; ?></p>
                </div>
                <div class="phong_item" style="display: flex; align-items: stretch; margin-bottom: 30px;">
                    <span style="margin-right: 10px; font-weight: 600;">Tình trạng:</span>
                    <p>Đã dọn dẹp</p>
                </div>
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success">Đặt phòng</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalXoaphong">Xóa phòng</button>
                <a href="../../../../learn_mvc/chitietphong/sua/<?php echo $room[0] ?>" type="submit" name="suaphong" class="btn btn-warning">Sửa phòng</a>
            <?php } else if ($room[2] == "Đã đặt") {
                $datangaydat = $hoadon->getAHoaDon($room[3], $room[0]);
                $ngaydat = mysqli_fetch_row($datangaydat);
            ?>
                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Tên phòng:</span>
                    <p><?php echo "P" . $room[0]; ?></p>
                </div>
                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Loại phòng:</span>
                    <p><?php echo  $room[1]; ?></p>
                </div>
                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Trạng thái hiện tại:</span>
                    <p><?php echo $room[2]; ?></p>
                </div>

                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Ngày đặt:</span>
                    <p><?php echo $ngaydat[4]; ?></p>
                </div>
                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Khách hàng:</span>
                    <p><?php echo $room[3]; ?></p>
                </div>

                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Giá:</span>
                    <p><?php echo $room[4]; ?></p>
                </div>
                <div class="phong_item" style="display: flex; align-items: stretch; margin-bottom: 30px;">
                    <span style="margin-right: 10px; font-weight: 600;">Tình trạng:</span>
                    <p>Đã dọn dẹp</p>
                </div>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalNhanphong">Nhận phòng</button>
                <button type="submit" name="datdichvu" class="btn btn-info">Đặt dịch vụ</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalXoaphong">Xóa phòng</button>
                <a href="../../../../learn_mvc/chitietphong/sua/<?php echo $room[0] ?>" type="submit" name="suaphong" class="btn btn-warning">Sửa phòng</a>
            <?php
            } else {
                $datangaydat = $hoadon->getAHoaDon($room[3], $room[0]);
                $ngaydat = mysqli_fetch_row($datangaydat);
            ?>
                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Tên phòng:</span>
                    <p><?php echo "P" . $room[0]; ?></p>
                </div>
                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Loại phòng:</span>
                    <p><?php echo  $room[1]; ?></p>
                </div>
                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Trạng thái hiện tại:</span>
                    <p><?php echo $room[2]; ?></p>
                </div>

                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Ngày đặt:</span>
                    <p><?php echo $ngaydat[4]; ?></p>
                </div>
                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Ngày nhận:</span>
                    <p><?php echo $ngaydat[5]; ?></p>
                </div>
                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Khách hàng:</span>
                    <p><?php echo $room[3]; ?></p>
                </div>

                <div class="phong_item" style="display: flex; align-items: stretch;">
                    <span style="margin-right: 10px; font-weight: 600;">Giá:</span>
                    <p><?php echo $room[4]; ?></p>
                </div>
                <div class="phong_item" style="display: flex; align-items: stretch; margin-bottom: 30px;">
                    <span style="margin-right: 10px; font-weight: 600;">Tình trạng:</span>
                    <p>Đã dọn dẹp</p>
                </div>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalTraphong">Trả phòng</button>
                <button type="submit" name="datdichvu" class="btn btn-info">Đặt dịch vụ</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalXoaphong">Xóa phòng</button>
                <a href="../../../../learn_mvc/chitietphong/sua/<?php echo $room[0] ?>" class="btn btn-warning" type="submit" name="suaphong">Sửa phòng</a>
            <?php
            }
            ?>
        </form>
    </div>
    <div class="chitiet_right" style="width: 50%;">
        <h4>Thông tin dịch vụ</h4>
        <form action="" method="POST">
            <table style="width: 100%; border: 1px solid #333; padding: 10px; border-radius: 10px; margin-top: 30px;">
                <thead>
                    <th style="padding: 10px;">Tên dịch vụ</th>
                    <th style="padding: 10px;">Số lượng</th>
                    <th style="padding: 10px;">Giá</th>
                    <th style="padding: 10px;">Thành tiền</th>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    while ($service = mysqli_fetch_array($services)) {
                        $i++;
                    ?>
                        <tr>

                            <td style="padding: 10px; padding-left: 10px;"><?php echo $service['tendichvu'] ?></td>
                            <td style="padding: 10px;">
                                <button id="btntru" type=" button" style="font-size: 14px; padding:0px; width: 24px; height: 24px; border-radius: 100px; margin-right: 4px;" class="btn btn-less btn-success">-</button>
                                <input style="width: 40px; border: none;" type="text" name="aa" id="<?php echo "ip" ?>" value="0">
                                <button id="btncong" type="button" style="font-size: 14px; padding:0px; width: 24px; height: 24px; border-radius: 100px; margin-left: 4px;" class="btn btn-plus btn-danger">+</button>
                            </td>
                            <td id="<?php echo "gia"  ?>" style="padding: 10px ; padding-right: 10px;"><?php echo $service['gia'] ?></td>
                            <td class="<?php echo "tt" . $service[0] ?>" style="padding: 10px ; padding-right: 10px;">
                                <input type="number" style="width: 70px; border: none;" name="" value="0" id="<?php echo "ipT" ?>">
                            </td>
                        </tr>


                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>

    </div>

    <script>
        const AllBtnCong = document.querySelectorAll('#btncong')
        const AllBtnTru = document.querySelectorAll('#btntru')
        const tongtien = document.querySelector('.tongtien')
        let tong = 0

        const handleTru = (i) => {
            // const name = "#ip" + (i + 1)
            // const nameIpTien = "#ipT" + (i + 1)
            // const namegia = "#gia" + (i + 1)
            // const ip = document.querySelector(name)
            // const ipT = document.querySelector(nameIpTien)
            // const gia = document.querySelector(namegia)
            let val = ip.value

            if (ip.value <= 0) {
                ip.value = 0
            } else {
                val--
                let g = parseInt(gia.innerHTML) * val
                ip.value = val
                ipT.value = g
                tong = g
            }
        }


        const handleCong = (i, ip, gia, ipT) => {

            let val = ip.value
            val++
            let g = parseInt(gia.innerHTML) * val
            ip.value = val
            ipT.value = g
        }



        AllBtnCong.forEach((btnCong, i) => {
            btnCong.addEventListener('click', () => {
                const ip = btnCong.parentElement.querySelector('input')
                const gia = btnCong.parentElement.parentElement.querySelector('#gia')
                const ipT = btnCong.parentElement.parentElement.querySelector('#ipT')
                handleCong(i, ip, gia, ipT)
            })

        })

        AllBtnTru.forEach((btnTru, i) => {
            btnTru.addEventListener('click', () => {
                const ip = btnTru.parentElement.querySelector('input')
                const gia = btnTru.parentElement.parentElement.querySelector('#gia')
                const ipT = btnTru.parentElement.parentElement.querySelector('#ipT')
                handleTru(i, ip, gia, ipT)

            })
        })
    </script>







    <!-- modal  dat phong -->
    <form method="POST" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Đặt phòng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="">Tên khách hàng</label>
                    <input name="tenkhachhang" style="margin-top: 6px; margin-bottom: 20px;" type="text" class="form-control" aria-label="" aria-describedby="basic-addon1">


                    <label for="">Số CCCD/CMND</label>
                    <input name="cccd" style="margin-top: 6px; margin-bottom: 20px;" type="text" class="form-control" aria-label="" aria-describedby="basic-addon1">


                    <label for="">Số điện thoại</label>
                    <input name="sdt" style="margin-top: 6px; margin-bottom: 20px;" type="text" class="form-control" aria-label="" aria-describedby="basic-addon1">


                    <label for="">Ngày sinh</label>
                    <input name="ngaysinh" style="margin-top: 6px; margin-bottom: 20px;" type="date" class="form-control" aria-label="" aria-describedby="basic-addon1">

                    <label for="">Quốc tịch</label>
                    <select name="quoctich" style="margin-top: 6px; margin-bottom: 20px;" class="form-select" aria-label="Default select example">
                        <option selected>-- QUỐC TỊCH --</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Nhật Bản">Nhật Bản</option>
                        <option value="Hàn Quốc">Hàn Quốc</option>
                    </select>

                    <label for="">Địa chỉ</label>
                    <select name="diachi" style="margin-top: 6px; margin-bottom: 20px;" class="form-select" aria-label="Default select example">
                        <option selected>-- ĐỊA CHỈ --</option>
                        <option value="Hà Nội">Hà Nội</option>
                        <option value="Thanh Hóa">Thanh Hóa</option>
                        <option value="Bắc Ninh">Bắc Ninh</option>
                    </select>

                    <label for="">Giới tính</label>
                    <div style="margin-top: 6px; margin-bottom: 20px;" class="check">
                        <input class="form-check-input" type="radio" name="gioitinh" value="Nam" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Nam
                        </label>

                        <input class="form-check-input" type="radio" name="gioitinh" value="Nữ" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Nữ
                        </label>
                    </div>

                    <label for="">Ngày đặt</label>
                    <input name="ngaydat" style="margin-top: 6px; margin-bottom: 20px;" type="date" class="form-control" aria-label="" aria-describedby="basic-addon1">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button name="datphong" type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal nhan phong -->
    <form method="post" class="modal fade" id="exampleModalNhanphong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nhận phòng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="">Ngày nhận</label>
                    <input name="ngaynhanphong" style="margin-top: 6px; margin-bottom: 20px;" type="date" class="form-control" aria-label="" aria-describedby="basic-addon1">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="btnnhanphong" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal tra phong -->
    <form method="post" class="modal fade" id="exampleModalTraphong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Trả phòng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="">Ngày trả phòng</label>
                    <input name="ngaytraphong" style="margin-top: 6px; margin-bottom: 20px;" type="date" class="form-control" aria-label="" aria-describedby="basic-addon1">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="btntraphong" class="btn btn-primary">Trả</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal xoa phong -->
    <form method="post" class="modal fade" id="exampleModalXoaphong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nhận phòng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn thực sự muốn xóa phòng này 🐱‍👤🐱‍👤🐱‍👤🐱‍👤
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="btnxoaphong" class="btn btn-primary">Xóa</button>
                </div>
            </div>
        </div>
    </form>
</div>