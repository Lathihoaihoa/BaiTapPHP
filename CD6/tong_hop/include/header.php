<?php
session_start();
    if (!isset($_SESSION['username'])) {
       header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;  
		charset="utf-8"/>
	<style type="text/css">
		ul {
		  list-style-type: none;
		  margin: 0;
		  padding: 0;
		  overflow: hidden;
		  background-color: violet;
		  margin-bottom: 30px;
		}
		li {
		  float: left;
		}
		li a, .dropbtn {
		  display: inline-block;
		  color: black;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		}
		li a:hover, .dropdown:hover .dropbtn {
		  background-color: red;
		}
		li.dropdown {
		  display: inline-block;
		}
		.dropdown-content {
		  display: none;
		  position: absolute;
		  background-color: #f9f9f9;
		  min-width: 160px;
		  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		  z-index: 1;
		}
		.dropdown-content a {
		  color: black;
		  padding: 12px 16px;
		  text-decoration: none;
		  display: block;
		  text-align: left;
		}
		.dropdown-content a:hover {background-color: #f1f1f1;}
		.dropdown:hover .dropdown-content {
		  display: block;
		}
	</style>
</head>
<body>
	<div>
		<p>Xin chào  <?php echo $_SESSION['username'];  ?> | <a href="logout.php">Đăng xuất</a></p>
	</div>
	<ul>
		<li><a href="nhan_vien.php">NHÂN VIÊN</a></li>
		<li><a href="phong_ban.php">PHÒNG BAN</a></li>
		<li><a href="loai_nv.php">LOẠI NHÂN VIÊN</a></li>
		<li class="dropdown">
	    <a href="javascript:void(0)" class="dropbtn">TRA CỨU</a>
	    	<div class="dropdown-content">
			    <a href="TC_nhanvien.php">Tra cứu nhân viên</a>
			    <a href="TC_phongban.php">Tra cứu phòng ban</a>
			    <a href="TC_loainhanvien.php">Tra cứu loại nhân viên</a>
	    	</div>
	  	</li>
		<li class="dropdown">
	    <a href="javascript:void(0)" class="dropbtn">THÊM MỚI</a>
	    	<div class="dropdown-content">
			    <a href="TM_nhanvien.php">Thêm mới nhân viên</a>
			    <a href="TM_phongban.php">Thêm mới phòng ban</a>
			    <a href="TM_loainhanvien.php">Thêm mới loại nhân viên</a>
	    	</div>
	  	</li>
	</ul>
</body>
</html>