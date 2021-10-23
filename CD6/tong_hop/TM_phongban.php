<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thêm mới nhân viên</title>
<link rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<?php
	include ('include/header.html'); 
	require("include/connect.php");
?>
<form action="" method="post" enctype="multipart/form-data">

<table align="center">
<thead>
	<td colspan="2">THÊM MỚI PHÒNG BAN</td>
</thead>

<tr>
	<td>Mã phòng: </td>
	<td><input type="text" name="ma_phong" size="50" value="<?php if(isset($_POST['ma_phong'])) echo $_POST['ma_phong'];?>" /></td>
</tr>
<tr>
	<td>Tên phòng: </td>
	<td><input type="text" name="ten_phong" size="50" value="<?php if(isset($_POST['ten_phong'])) echo $_POST['ten_phong'];?>" /></td>
</tr>

<tr>
	<td colspan="2" align="center"><button name ="them">Thêm mới</button></td>
</tr>
</table>
</form>
	<?php 
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$errors=array(); //khởi tạo 1 mảng chứa lỗi
			//kiem tra ma phong
			if(empty($_POST['ma_phong'])){
				$errors[]="Bạn chưa nhập mã phòng";
			}
			else{
				$ma_phong=trim($_POST['ma_phong']);
			}
			//kiểm tra tên phong
			if(empty($_POST['ten_phong'])){
				$errors[]="Bạn chưa nhập tên phòng";
			}
			else{
				$ten_phong=trim($_POST['ten_phong']);
			}
			

			if(empty($errors))//neu khong co loi xay ra
			{ 
				$query="INSERT INTO phong_ban VALUES('$ma_phong','$ten_phong')";
				$result=mysqli_query($dbc,$query);
				if(mysqli_affected_rows($dbc)==1){//neu them thanh cong
					echo "<div align='center'>Thêm mới thành công!</div>";	
					$query="Select * 
				      from phong_ban
				     where
				     ma_phong = '".$ma_phong."'";
					
					$result=mysqli_query($dbc,$query);
					if(mysqli_num_rows($result)==1)
					{	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);

						echo '<td style="text-align: left;">'.
							'<i><b>Mã phòng: </i></b>'.$row['ma_phong'].'<br />'.
							'<i><b>Tên phòng: </i></b>'.$row['ten_phong'].'<br />';
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

