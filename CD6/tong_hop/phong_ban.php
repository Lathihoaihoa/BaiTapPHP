<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Phòng ban</title>
	<link rel="stylesheet" href="include/style.css" type="text/css" media="screen" />
</head>
<body>
<?php 
	include ('include/header.php');
	// Ket noi CSDL
	require("include/connect.php");
	// Chuan bi cau truy van & Thuc thi cau truy van
	$strSQL = "SELECT * FROM phong_ban";
	$result = mysqli_query($dbc,$strSQL);
	// Xu ly du lieu tra ve
	if(mysqli_num_rows($result) == 0)
	{
		echo "Chưa có dữ liệu";
	}
	else
	{	echo "<h1 style='color: blue;' align='center'>PHÒNG BAN</h1>
		<table align='center' width='800' border='1' cellpadding='2' cellspacing='2' 
				style='border-collapse: collapse;'>
		  	<tr style='background-color: #0084ab;' align='center'>
				<td><b>Mã phòng ban</b></td>
				<td><b>Tên phòng ban</b></td>
		  	</tr>";
		$stt=1;
		while ($row = mysqli_fetch_array($result))
		{
			if($stt%2!=0){
				echo "<tr>";
				echo "<td>$row[0]</td>";
				echo "<td>$row[1]</td>";
				echo "</tr>";
			}
			else{
				echo "<tr style='background-color: #ffb1007a;'>";
				echo "<td>$row[0]</td>";
				echo "<td>$row[1]</td>";
				echo "</tr>";
			}
			$stt+=1;
		}
		echo '</table>';
	}
	//Dong ket noi
	mysqli_close($dbc);

?>
</body>
</html>
