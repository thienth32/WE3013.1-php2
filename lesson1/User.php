<?php
// tạo ra 1 lớp
class CongDan{
    var $ten;
    var $gioiTinh;
    var $tinhTrangHonNhan = false;
    var $ngaySinh;
    var $tenVoChong;

    function ketHon($objDoiTac){
        $this->tinhTrangHonNhan = true;
        $this->tenVoChong = $objDoiTac->ten;

        $objDoiTac->tinhTrangHonNhan = true;
        $objDoiTac->tenVoChong = $this->ten;
    }

    function getGioiTinh(){
        if($this->gioiTinh == 1){
            return "Nam";
        }else if($this->gioiTinh == 2){
            return "Nữ";
        }else{
            return "Khác";
        }
    }
}

// tạo ra object thuộc lớp User
$phat = new CongDan();
$phat->ten = "Nguyễn Quang Phát";
$phat->gioiTinh = 3;
$phat->ngaySinh = "27/07/2000";

$ngoc = new CongDan();
$ngoc->ten = "Bùi Thị Ngọc";
$ngoc->gioiTinh = 2;
$ngoc->ngaySinh = "12/12/2000";

$phat->ketHon($ngoc);
// $ngoc->ketHon($phat->ten);

$arr = [$phat, $ngoc];
// echo "<pre>";
// var_dump($arr);

?>
<table>
    <thead>
        <th>Tên</th>
        <th>Ngày Sinh</th>
        <th>Giới tính</th>
        <th>Tình Trạng Hôn Nhân</th>
        <th>Tên vợ/chồng</th>
    </thead>
    <tbody>
    <?php foreach ($arr as $item): ?>
        <tr>
            <td><?= $item->ten ?></td>
            <td><?= $item->ngaySinh ?></td>
            <td><?= $item->getGioiTinh() ?></td>
            <td><?= $item->tinhTrangHonNhan == true ? "Đã kết hôn" : "Độc thân" ?></td>
            <td><?= $item->tenVoChong ?></td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>