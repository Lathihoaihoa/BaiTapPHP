<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>xóa phòng-ban</title>
</head>
<body>
	<?php
		include ('include/header.html'); 
		require("include/connect.php");
		$ma_phong= $_REQUEST['ma_phong'];
	//	$query="Select * from thu_cung join loai_thu_cung on thu_cung.ma_loai_tc = loai_thu_cung.ma_loai_tc WHERE ma_tc = '$ma_tc'";
		$query="Select * 
			from phong_ban join nhan_vien on phong_ban.ma_phong = nhan_vien.ma_phong
			where
			ma_phong = '".$ma_phong."'";
		$result=mysqli_query($dbc,$query);		
			if(mysqli_num_rows($result)<>0)
			{	$rows=mysqli_num_rows($result);
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					echo '<table width=70% align="center">
						<tr>
							<td colspan="2" style="text-align: center; color: OrangeRed;"><h3>BẠN ĐÃ XÓA '.$row['ten_phong'].'</h3><td>
						</tr>
						
						<tr>
							<td colspan="2"><a class="btn btn-success" href="phong_ban.php">Quay lại danh sách</a></td>
						</tr>
					</table>';
				}
			}
			if(isset($_REQUEST['ma_phong']) and $_REQUEST['ma_phong']!=""){
				$sql = "DELETE FROM phong_ban WHERE ma_phong='$ma_phong'";
				if (mysqli_query($dbc, $sql)) {
				echo "Xoá thành công!";
				} else {
				echo "Lỗi !";
				}
			}
		mysqli_close($dbc);
	?>

</body>
</html>