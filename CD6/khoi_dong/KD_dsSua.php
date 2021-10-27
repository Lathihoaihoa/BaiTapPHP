<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Thong tin hang sua</title>

</head>
<body>
<?php 
	// Ket noi CSDL
	require("connect.php");
	// Chuan bi cau truy van & Thuc thi cau truy van
	$rowPerPage=10; // số bang ghi
	if(!isset($_GET['page'])){
		$_GET['page']=1;
	}
	$offset=($_GET['page']-1)*$rowPerPage;
	$result = mysqli_query($dbc,'SELECT * FROM sua LIMIT '.$offset.','.$rowPerPage);

	// Xu ly du lieu tra ve
	if(mysqli_num_rows($result) == 0)
	{
		echo "Chưa có dữ liệu";
	}
	else
	{	echo "<h1 style='color: blue;' align='center'>THÔNG TIN HÃNG SỮA</h1>
			  <table align='center' width='800' border='1' cellpadding='2' cellspacing='2' 
					style='border-collapse: collapse;'>
			  	<tr style='background-color: #0084ab;' align='center'>
					<td><b>Mã sữa</b></td>
					<td><b>Tên sữa</b></td>
					<td><b>Hãng sữa</b></td>
					<td><b>Loại sữa</b></td>
					<td><b>Trọng lượng</b></td>
					<td><b>Đơn giá</b></td>
			  	</tr>";
		$stt=1;
		while ($row = mysqli_fetch_array($result))
		{
			if($stt%2!=0)
			{	echo "<tr>";
				echo "<td>$row[0]</td>";
				echo "<td>$row[1]</td>";
				echo "<td>$row[2]</td>";
				echo "<td>$row[3]</td>";
				echo "<td>$row[4]</td>";
				echo "<td>$row[5]</td>";
				echo "</tr>";
			}
			else
			{
				echo "<tr style='background-color: #ffb1007a;'>";
				echo "<td>$row[0]</td>";
				echo "<td>$row[1]</td>";
				echo "<td>$row[2]</td>";
				echo "<td>$row[3]</td>";
				echo "<td>$row[4]</td>";
				echo "<td>$row[5]</td>";
				echo "</tr>";
			}
				$stt+=1;
		}
		echo '</table>';
		echo '<center>';
		$re = mysqli_query($dbc, 'select * from sua');
		// tổng số mẫu tin 
		$numRow = mysqli_num_rows($re);
		// tooneg so trang
		$maxPage = floor($numRow/$rowPerPage)+1;
		// echo 'Tổng số trang: '.$maxPage;
		//tạo link tương ứng tới các trang

		//gắn thêm nút Back
		if ($_GET['page'] > 1){
			echo "<a href=". $_SERVER['PHP_SELF']."?page=1> TRANG ĐẦU</a>";
			echo "<a href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">Back</i></a> ";	
		}

		for ($i=1 ; $i<=$maxPage ; $i++)
		{ 	if ($i == $_GET['page'])
			{ echo '<b>'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
			}
			else
			echo "<a href=".$_SERVER['PHP_SELF']. "?page=".$i.">".$i."</a> ";
		}

		//gắn thêm nút Next
		if ($_GET['page'] < $maxPage){
			echo "<a href=". $_SERVER['PHP_SELF']."?page=".($_GET['page']+1).">Next</a>";		
			echo "<a href=". $_SERVER['PHP_SELF']."?page=".$maxPage."> TRANG CUỐI</a>";		
		}
		echo '</center>';
	}
	//Dong ket noi
	mysqli_close($dbc);
?>
</body>
</html>