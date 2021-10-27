<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Nhân viên</title>
</head>
<body>
	<?php 
		// Ket noi CSDL
		require("include/connect.php");
		require('include/header.php');
		$rowPerPage=6;
		if(!isset($_GET['page'])){
	        $_GET['page']=1;
	    }
	    $offset=($_GET['page']-1)*$rowPerPage;
		// Chuan bi cau truy van & Thuc thi cau truy van
		$strSQL = 'SELECT * FROM nhan_vien LIMIT '.$offset.','.$rowPerPage;
		$result = mysqli_query($dbc,$strSQL);
		// Xu ly du lieu tra ve
		if(mysqli_num_rows($result) == 0)
		{
			echo "Chưa có dữ liệu";
		}
		else
		{	echo "<h1 style='color: blue;' align='center'>NHÂN VIÊN</h1>
				  <table align='center' width='100%' border='1' cellpadding='2' cellspacing='2' 
						style='border-collapse: collapse;'>
				  	<tr style='background-color: #0084ab;' align='center'>
						<td><b>Mã nhân viên</b></td>
						<td><b>Họ tên nhân viên</b></td>
						<td><b>Ngày sinh</b></td>
						<td><b>Giới tính</b></td>
						<td><b>Địa chỉ</b></td>
						<td><b>Loại nhân viên</b></td>
						<td><b>Phòng ban</b></td>
						<td><b></b></td>
				  	</tr>";
			$stt=1;
			while ($row = mysqli_fetch_array($result))
			{
				if ($row[4] == 1)	$row[4] = "Nam";
					else 				$row[4] = "Nữ";

				if($stt%2!=0)
				{	echo "<tr>";
					echo "<td>$row[0]</td>";
					echo "<td>$row[1] $row[2]</td>";
					echo "<td>$row[3]</td>";
					echo "<td>$row[4]</td>";
					echo "<td>$row[5]</td>";
					echo "<td>$row[7]</td>";
					echo "<td>$row[8]</td>";
					echo "<td><a href='xoa_nv.php?ma=$row[0]'>Xóa</a> | <a href='sua_nv.php?ma=$row[0]'>Sửa</a></td>";
					echo "</tr>";
				}
				else
				{
					echo "<tr style='background-color: #ffb1007a;'>";
					echo "<td>$row[0]</td>";
					echo "<td>$row[1] $row[2]</td>";
					echo "<td>$row[3]</td>";
					echo "<td>$row[4]</td>";
					echo "<td>$row[5]</td>";
					echo "<td>$row[7]</td>";
					echo "<td>$row[8]</td>";
					echo "<td><a href='xoa_nv.php?ma=$row[0]'>Xóa</a> | <a href='sua_nv.php?ma=$row[0]'>Sửa</a></td>";
					echo "</tr>";
				}
					$stt+=1;
			}
			echo '</table>';
			$re = mysqli_query($dbc, 'select * from nhan_vien');
		        // tổng số mẫu tin 
		        $numRow = mysqli_num_rows($re);
		        // tooneg so trang
		        $maxPage = floor($numRow/$rowPerPage)+1;
		        echo '<center>';
		        for ($i=1 ; $i<=$maxPage ; $i++)
		        {   if ($i == $_GET['page'])
		            {
		                echo '<a class="btn btn-sm page-number disabled bg-primary"><b style="color:black">'.$i.'</b></a> ';
		            }
		            else
		            echo "<a class='btn btn-sm btn-light' href=".$_SERVER['PHP_SELF']. "?page=".$i.">".$i."</a> ";
		        }
		    echo'</table>'; 
		}
		//Dong ket noi
		mysqli_close($dbc);
	?>

</body>
</html>
