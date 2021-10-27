<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thêm mới nhân viên</title>
<link rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<?php
	include ('include/header.php'); 
	require("include/connect.php");
?>
<form action="" method="post" enctype="multipart/form-data">

<table align="center">
<thead>
	<td colspan="2">THÊM MỚI LOẠI NHÂN VIÊN</td>
</thead>

<tr>
	<td>Mã loại nhân viên: </td>
	<td><input type="text" name="ma_loai_NV" size="50" value="<?php if(isset($_POST['ma_loai_NV'])) echo $_POST['ma_loai_NV'];?>" /></td>
</tr>
<tr>
	<td>Tên loại nhân viên: </td>
	<td><input type="text" name="ten_loai_NV" size="50" value="<?php if(isset($_POST['ten_loai_NV'])) echo $_POST['ten_loai_NV'];?>" /></td>
</tr>

<tr>
	<td colspan="2" align="center"><button name ="them">Thêm mới</button></td>
</tr>
</table>
</form>
	<?php 
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$errors=array(); //khởi tạo 1 mảng chứa lỗi
			//kiem tra ma loại nhan vien
			if(empty($_POST['ma_loai_NV'])){
				$errors[]="Bạn chưa nhập mã loại nhân viên";
			}
			else{
				$ma_loai_NV=trim($_POST['ma_loai_NV']);
			}
			//kiểm tra tên loại nhân viên
			if(empty($_POST['ten_loai_NV'])){
				$errors[]="Bạn chưa nhập tên loại nhân viên";
			}
			else{
				$ten_loai_NV=trim($_POST['ten_loai_NV']);
			}
			

			if(empty($errors))//neu khong co loi xay ra
			{ 
				$query="INSERT INTO loai_nv VALUES('$ma_loai_NV','$ten_loai_NV')";
				$result=mysqli_query($dbc,$query);
				if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
					echo "<div align='center'>Thêm mới thành công!</div>";	
					$query="Select * 
				      from loai_nv
				     where
				     ma_loai_NV = '".$ma_loai_NV."'";
					
					$result=mysqli_query($dbc,$query);
					if(mysqli_num_rows($result)==1)
					{	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);

						echo '<td style="text-align: left;">'.
							'<i><b>Mã loại nhân viên: </i></b>'.$row['ma_loai_NV'].'<br />'.
							'<i><b>Tên loại nhân viên: </i></b>'.$row['ten_loai_NV'].'<br />';
						echo '</td>';

					}
				}
				else //neu khong them duoc
				{
					echo "<p>Có lỗi, không thể thêm được</p>";
					echo "<p>".mysqli_error($dbc)."<br/><br />Query: ".$query."</p>";	
				}
			}
			else
			{//neu co loi
				echo "<h2>Lấy</h2><p>Có lỗi xảy ra:<br/>";
				foreach($errors as $msg)
				{
					echo "- $msg<br/><\n>";
				}
				echo "</p><p>Hãy thử lại.</p>";
			}
		}
		mysqli_close($dbc);

	?>
</body>
</html>

