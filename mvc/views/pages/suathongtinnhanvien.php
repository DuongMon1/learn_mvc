<?php
$nhanvien = $data['nhanvien'];
$dataN  = mysqli_fetch_row($nhanvien);
?>

<form style="background-image: linear-gradient(to right, #C8E4B2, white);" method="post" class="modals" id="exampleModalsua" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="padding: 100px 400px;">
        <div class="modal-content" style="padding: 20px; background-color: white; border-radius: 10px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" style="margin-bottom: 20px; text-align: center; font-size: 40px;" id="exampleModalLabel">Sửa thông tin khách hàng</h1>
            </div>
            <div class="modal-body">

                <label for="">Tên nhân viên</label>
                <input name="tennhanvien" style="margin-top: 6px; margin-bottom: 20px;" value="<?php echo $dataN[1] ?>" type="text" class="form-control" aria-label="" aria-describedby="basic-addon1">

                <label for="">Số CCCD</label>
                <input name="cccd" style="margin-top: 6px; margin-bottom: 20px;" value="<?php echo $dataN[2] ?>" type="text" class="form-control" aria-label="" aria-describedby="basic-addon1">

                <label for="">Số điện thoại</label>
                <input name="sdt" style="margin-top: 6px; margin-bottom: 20px;" value="<?php echo $dataN[3] ?>" type="text" class="form-control" aria-label="" aria-describedby="basic-addon1">

                <label for="">Ngày sinh</label>
                <input name="ngaysinh" style="margin-top: 6px; margin-bottom: 20px;" value="<?php echo $dataN[4] ?>" type="date" class="form-control" aria-label="" aria-describedby="basic-addon1">

                <label for="">Địa Chỉ</label>
                <input name="diachi" style="margin-top: 6px; margin-bottom: 20px;" value="<?php echo $dataN[5] ?>" type="text" class="form-control" aria-label="" aria-describedby="basic-addon1">
               
                <label for="">Quốc Tịch</label>
                <input name="quoctich" style="margin-top: 6px; margin-bottom: 20px;" value="<?php echo $dataN[6] ?>" type="text" class="form-control" aria-label="" aria-describedby="basic-addon1">

                <label for="">Chức vụ</label>
                <select name="chucvu" style="margin-top: 6px; margin-bottom: 20px;" value="<?php echo $dataN[7] ?>" class="form-select" aria-label="Default select example">
                    <option selected>Chức vụ</option>
                    <option value="Lễ tân">Lễ tân</option>
                    <option value="Phục vụ">Phục vụ</option>
                    <option value="Sếp">Sếp</option>
                </select>
                

            </div>
            <div class="modal-footer">
                <a href="http://localhost/learn_mvc/quanlynhanvien" type="submit" class="btn btn-secondary" style="margin-right: 20px;">Đóng</a>
                <button type="submit" name="btnsuanv" class="btn btn-primary">Lưu✔✔</button>
            </div>
        </div>
    </div>
</form>