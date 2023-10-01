<?php
$nhanviens = $data['nhanviens'];

?>

<div class="quanlynhanvien">
    <h4>Thông tin chi tiết các nhân viên</h4>
    <div class="nhanvien">
    <div class="nhanvien_control" style="padding-top: 30px; margin-bottom: 30px;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalthem">
            Thêm nhân viên
        </button>
    </div>

    

    <table style="width: 100%; border: 1px solid #333; padding: 10px; border-radius: 10px; margin-top: 30px;">
        <thead>
            <th style="padding: 10px;">Tên nhân viên</th>
            <th style="padding: 10px;">Số điện thoại</th>
            <th style="padding: 10px;">Địa chỉ</th>
            <th style="padding: 10px;">Ngày Sinh</th>
            <th style="padding: 10px;">Vị trí công việc</th>
            <th style="padding: 10px;">Chức năng</th>
        </thead>
        <tbody>
        <?php
            $i = 0;
            while ($nhanvien = mysqli_fetch_array($nhanviens)) {
                $i++;
            ?>
            <tr>
            <td style="padding: 10px ; padding-left: 10px;"><?php echo $nhanvien['name'] ?></td>
                    <td style="padding: 10px;"><?php echo $nhanvien['sdt'] ?></td>
                    <td style="padding: 10px;"><?php echo $nhanvien['diachi'] ?></td>
                    <td style="padding: 10px ;"><?php echo $nhanvien['ngaysinh'] ?></td>
                    <td style="padding: 10px ;"><?php echo $nhanvien['chucvu'] ?></td>


                <td style="padding: 10px; padding-right: 10px;">
                <a href="./quanlynhanvien/edit/<?php echo $nhanvien['id'] ?>" type="button" class="exampleModalsua btn btn-info" data-bs-toggle="modal">
                            Sửa
                        </a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalxoa">

                            <a data-bs-toggle="modal" data-bs-target="#exampleModalxoa" href="./edit/<?php echo $nhanvien['id'] ?>" style="text-decoration: none;  color: white;">Xóa</a>

                        </button>
                </td>
            </tr>
            <?php
            } ?>
        </tbody>
    </table>


   

    <!-- modal xoa -->
    <div class="modal fade" id="exampleModalxoa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa nhân viên</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn chắc chắn muốn xóa nhân viên này!!!!😊❤😊😊❤
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button name="xoanhanvien" type="submit" class="btn btn-primary">Đúng vậy 👌👌👌</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal them -->
    <form method="POST" class="modal fade" id="exampleModalthem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Nhân Viên</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <label for="">Tên nhân viên</label>
                    <input name="name" style="margin-top: 6px; margin-bottom: 20px;" type="text"  class="form-control" aria-label="" aria-describedby="basic-addon1">

                    <label for="">Số CCCD</label>
                    <input name="cccd" style="margin-top: 6px; margin-bottom: 20px;" type="text"  class="form-control" aria-label="" aria-describedby="basic-addon1">

                    <label for="">Số điện thoại</label>
                    <input name="sdt" style="margin-top: 6px; margin-bottom: 20px;" type="text"  class="form-control" aria-label="" aria-describedby="basic-addon1">

                    <label for="">Ngày sinh</label>
                    <input name="ngaysinh" style="margin-top: 6px; margin-bottom: 20px;" type="date"  class="form-control" aria-label="" aria-describedby="basic-addon1">

                    <label for="">Địa Chỉ</label>
                    <input name="diachi" style="margin-top: 6px; margin-bottom: 20px;" type="text"  class="form-control" aria-label="" aria-describedby="basic-addon1">

                    <label for="">Quốc Tịch</label>
                    <input name="quoctich" style="margin-top: 6px; margin-bottom: 20px;" type="text"  class="form-control" aria-label="" aria-describedby="basic-addon1">

                    

                   
                    <label for="">Vị trí công việc</label>
                    <select name="chucvu" style="margin-top: 6px; margin-bottom: 20px;" class="form-select" aria-label="Default select example">
                        <option selected>Vị trí</option>
                        <option value="Lễ tân">Lễ tân</option>
                        <option value="Quét dọn">Quét dọn</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button name="themnhanvien" type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </div>
    </form>
</div>