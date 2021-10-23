<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Tra cứu loại nhân viên</title>
<link rel="stylesheet" href="include/style.css" type="text/css" media="screen" />
</head>
<body>
<?php include ('include/header.html'); ?>
<form action="" method="get">
	<table bgcolor="#eeeeee" align="center" width="70%" border="1" 
		   cellpadding="5" cellspacing="5" style="border-collapse: collapse;">
	<tr>
		<td align="center"><font color="blue"><h3>TÌM KIẾM THÔNG TIN LOẠI NHÂN VIÊN</h3></font></td>
	</tr>
	<tr>
		<td align="center">Tên loại nhân viên: <input type="text" name="loai" size="30" 
					value="<?php if(isset($_GET['loai'])) echo $_GET['loai'];?>">
				<input type="submit" name="tim" value="Tìm kiếm"></td>
	</tr>
	</table>
</form>
<?php 
	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		if(empty($_GET['loai'])) echo "<p align='center'>Vui lòng nhập tên loại nhân viên cần tìm</p>";
		else
		{
			$loai=$_GET['loai'];	
			require("include/connect.php");
			
			$query="Select * from loai_nv
			      WHERE ma_loai_NV like '%$loai%' or ten_loai_NV like '%$loai%'";
			$result=mysqli_query($dbc,$query);		
			if(mysqli_num_rows($result)<>0)
			{	$rows=mysqli_num_rows($result);
				echo "<div align='center'><b>Có $rows loại nhân viên được tìm thấy.</b></div>";
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					echo '<table align="center">
						<tr>
						<td width="500" align="center">
							<i><b>Mã loại nhân viên: </i></b>'.$row['ma_loai_NV'].'<br />
							<i><b>Tên loại nhân viên: </i></b>'.$row['ten_loai_NV'].'
						</td>
						</tr>
					</table>';
				}
			}
			else echo "<div align='center><b>Không tìm thấy loại nhân viên này.</b></div>";
		}
	}

?>
</body>
</html>
