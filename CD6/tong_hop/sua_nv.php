<?php
	include ('include/header.php'); 
	include ("include/connect.php");
	$mess = "";

	$ma_NV = $_REQUEST['ma'];
	$query="select * from nhan_vien where ma_NV = '$ma_NV'";
	$result=mysqli_query($dbc,$query);
	$row=mysqli_fetch_array($result);

	$ma_NV = $row['ma_NV'];
	$ho = $row['ho'];
	$ten = $row['ten'];
	$ngay_sinh = $row['ngay_sinh'];
	$gioi_tinh = $row['gioi_tinh'];
	$dia_chi = $row['dia_chi'];
	$loai_nv = $row['ma_loai_NV'];
	$phong_ban = $row['ma_phong'];
	$anh = $row['anh'];

	if($_SERVER['REQUEST_METHOD']=="POST"){
		$ma_NV =$ma_NV;
		$ho = $_POST['ho'];
		$ten = $_POST['ten'];
		$ngay_sinh = $_POST['ngay_sinh'];
		$gioi_tinh = $_POST['gioi_tinh'];
		$dia_chi = $_POST['dia_chi'];
		$loai_nv = $_POST['loai_nv'];
		$phong_ban = $_POST['phong_ban'];

		if($_FILES['anh']['name']!=""){
			$anh=$_FILES['anh'];
			$ten_anh=$anh['name'];
			$type=$anh['type'];
			$size=$anh['size'];
			$tmp=$anh['tmp_name'];
			if(($type=='image/jpeg' || ($type=='image/bmp') || ($type=='image/gif') && $size<8000))
			{
				move_uploaded_file($tmp,"images/".$ten_anh);
			}
			$query="UPDATE nhan_vien
			SET ho = '$ho', ten= '$ten', ngay_sinh = '$ngay_sinh', gioi_tinh = '$gioi_tinh', dia_chi = '$dia_chi', ma_loai_NV= '$loai_nv', ma_phong = '$phong_ban', anh = '$ten_anh'
			WHERE ma_NV = '$ma_NV'";
		}
		else{	
		$query="UPDATE nhan_vien
		SET ho = '$ho', ten= '$ten', ngay_sinh = '$ngay_sinh', gioi_tinh = '$gioi_tinh', dia_chi = '$dia_chi', ma_loai_NV= '$loai_nv', ma_phong = '$phong_ban'
		WHERE ma_NV = '$ma_NV'";
		}
		$result=mysqli_query($dbc,$query);
		if(mysqli_affected_rows($dbc)==1){
			echo "<p>Cập nhật thành công!</p>";
		}
		else
		{
			echo "<p>Lỗi!!</p>";
		}
	}
?>
<form action="" method="post" enctype="multipart/form-data">

<table align="center">
<thead>
	<td colspan="2">SỬA NHÂN VIÊN</td>
</thead>
<tr>
	<td>Mã nhân viên: </td>
	<td><input type="text" name="ma_NV" size="50" value="<?php echo $ma_NV;?>" disabled/></td>
</tr>
<tr>
	<td>Họ nhân viên: </td>
	<td><input type="text" name="ho" size="50" value="<?php echo $ho;?>" /></td>
</tr>
<tr>
	<td>Tên nhân viên: </td>
	<td><input type="text" name="ten" size="50" value="<?php echo $ten;?>" /></td>
</tr>
<tr>
	<td>Ngày sinh: </td>
	<td><input type="text" name="ngay_sinh" size="50" value="<?php echo $ngay_sinh;?>" /></td>
</tr>
<tr>
	<td>Giới tính: </td>
	<td style="text-align: left;">
		<input type="radio" name="gioi_tinh" value=1 <?php if($gioi_tinh==1) echo 'checked'?>/>Nam
		<input type="radio" name="gioi_tinh" value=0 <?php if($gioi_tinh==0) echo 'checked'?> />Nữ
	</td>
</tr>
<tr>
	<td>Địa chỉ: </td>
	<td><input type="text" name="dia_chi" size="50" value="<?php echo $dia_chi;?>" /></td>
</tr>
<tr>
	<td>Loại nhân viên: </td>
	<td><select name="loai_nv">
			<?php 
				$query="select * from loai_nv";	
				$result=mysqli_query($dbc,$query);
				if(mysqli_num_rows($result)<>0){
					while($row=mysqli_fetch_array($result)){
						$ma_loai_NV = $row['ma_loai_NV'];
						$ten_loai_NV = $row['ten_loai_NV'];
						echo "<option value='$ma_loai_NV' "; 
								if($loai_nv==$ma_loai_NV) echo "selected='selected'";
						echo ">$ten_loai_NV</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
	</td>
</tr>
<tr>
	<td>Phòng ban: </td>
	<td><select name="phong_ban">
			<?php 
				$query="select * from phong_ban";
				$result=mysqli_query($dbc,$query);
				if(mysqli_num_rows($result)<>0){
					while($row=mysqli_fetch_array($result)){
						$ma_phong =$row['ma_phong'];
						$ten_phong =$row['ten_phong'];
						echo "<option value='".$ma_phong."' "; 
							if($phong_ban==$ma_phong) echo "selected='selected'";
						echo ">".$ten_phong."</option>";
					}
				}
				mysqli_free_result($result);
			?>								
		</select>
	</td>
</tr>
<tr>
	<td>Ảnh nhân viên: </td>
	<td style="text-align: left;"><input type="FILE" name ="anh" /></td>
</tr>
<tr>
	<td colspan="2" align="center"><button name ="Sua">SỬA THÔNG TIN</button></td>
</tr>
</table>
</form>
<?php
	mysqli_close($dbc);
?>
