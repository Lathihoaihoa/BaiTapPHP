<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Xóa nhân viên</title>
</head>
<body>
<?php 
    include('include/header.php');
    include("include/connect.php");
    $ma= $_REQUEST['ma'];
    $query="SELECT * FROM nhan_vien JOIN phong_ban JOIN loai_nv ON nhan_vien.ma_phong = phong_ban.ma_phong AND nhan_vien.ma_loai_nv = loai_nv.ma_loai_nv WHERE ma_nv = '$ma'";
    $result=mysqli_query($dbc,$query);      
        if(mysqli_num_rows($result)<>0)
        {   $rows=mysqli_num_rows($result);
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                if ($row['gioi_tinh'] == 1) $row['gioi_tinh'] = "Nam";
                else                $row['gioi_tinh'] = "Nữ";
                echo '<form method="post" enctype="multipart/form-data">
                <h2>BẠN CÓ CHẮC CHẮN MUỐN XÓA</h2></hr>
                       <img style="width:100px;" src="images/'.$row['anh'].'" /><br>
                            <label>Mã NV:'.$row['ma_NV'].'</label><br>
                            <label>Họ tên:'.$row['ho'].' '.$row['ten'].'</label><br>
                            <label>Giới tính: '.$row['gioi_tinh'].'</label><br>
                            <label>Ngày sinh: '.$row['ngay_sinh'].'</label><br>
                            <label>Địa chỉ: '.$row['dia_chi'].'</label><br>
                            <label>Loại: '.$row['ten_loai_NV'].'</label><br>
                            <label>Phòng ban: '.$row['ten_phong'].'</label><br>
                 <center><input type="submit" name="xoa" value="Xóa">
                 <a href="nhan_vien.php">Quay lại</a>
                 </center></form>';
            }
        }
     if(($_SERVER['REQUEST_METHOD'] == 'POST')){
        $sql = "DELETE FROM nhan_vien WHERE ma_nv ='$ma'";
         if (mysqli_query($dbc, $sql)) {
                        echo "<p>Xóa nhân viên thành công</p>";
          } else {
                       echo "<pLỗi</p>";
                    }
          }
    mysqli_close($dbc);

 ?>
</body>
</html>