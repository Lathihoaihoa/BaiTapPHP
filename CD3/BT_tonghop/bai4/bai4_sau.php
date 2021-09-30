<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>bai4</title>
	<style type="text/css">

        body {  
            font-family: consolas;
            background-color: #98f5ff;

        }
    </style>    
</head>
<body>
	<form action="bai4_truoc.php" method="get">
		<h3>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập: </h3>

	</form>

	<?php
		$hoten = $_REQUEST['hoten'];
		$radGT = $_REQUEST['radGT'];
		$diachi = $_REQUEST['diachi'];
		$sdt = $_REQUEST['sdt'];
		$quoctich = $_REQUEST['quoctich'];
		$ghichu = $_REQUEST['ghichu'];

		echo "Họ tên: " .$hoten ."<br>";
		echo "Giới tính: " .$radGT ."<br>";
		echo "Địa chỉ: " .$diachi ."<br>";
		echo "Điên thoại: " .$sdt ."<br>";
		echo "Quốc tịch: " .$quoctich ."<br>";
		echo "Môn học: "; 
		if(isset($_REQUEST['chk1'])) echo $_REQUEST['chk1']. ", ";
		if(isset($_REQUEST['chk2'])) echo $_REQUEST['chk2']. ", ";
		if(isset($_REQUEST['chk3'])) echo $_REQUEST['chk3']. ", ";
		if(isset($_REQUEST['chk4'])) echo $_REQUEST['chk4']. ", ";	
		echo "<br>";
		echo "Ghi chú: " .$ghichu ."<br>";
	?>
	<a href="javascript:window.history.back(-1);">Tro ve trang truoc</a>
</body>
</html>