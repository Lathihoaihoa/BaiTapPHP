<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>PHÉP TÍNH TRÊN HAI SỐ</title>

    <style type="text/css">

        body {  
            font-family: consolas;
            background-color: #98f5ff;

        }

        table{

            background: #ffec8b;

            border: 0 solid yellow;

        }

        thead{

            background: #005500;    

        }

        td {

            color: black;

        }

        h1{

            font-family: verdana;

            text-align: center;

            /* text-anchor: middle; */

            color: #ff6a6a;

            font-size: medium;

        }

    </style>
</head>
<body>

	<?php
    	$sothunhat = 0;
    	$sothunhi = 0;
    	$ketqua = 0;

        if(isset($_POST['sothunhat']) && isset($_POST['sothunhi']))
        {
        	$tinh = $_POST['tinh'];
            $sothunhat = $_POST['sothunhat'];
            $sothunhi = $_POST['sothunhi'];

            if($tinh=='Cộng')
            {
                 $ketqua= $sothunhat + $sothunhi;
            }
            else if($tinh=='Trừ')
            {
                $ketqua= $sothunhat - $sothunhi;
            }
            else if($tinh=='Nhân')
            {
                $ketqua= $sothunhat * $sothunhi; 
            }
            else if($tinh =='Chia'){
                $ketqua= $sothunhat / $sothunhi;
            }

        }
	?>

	<form action="pheptinh_bai3.php" name="myform" method="get">
        <table align="center">
		<thead>
            <th colspan="3" align="center"><h1>PHÉP TÍNH TRÊN HAI SỐ</h1></th>
		</thead>
        <tr>
            <td>Phép tính</td>
            <td>
                <?php 
                echo $tinh;
                ?>
            </td>
        </tr>
		<tr>
         	<td>Số 1 </td>
            <td>
                <input name="sothunhat" type="number" value="<?php echo $sothunhat ?>" />
            </td>
                     
		</tr>
        <tr >
            <td>Số 2</td>
            <td>
                <input name="sothunhi" type="number"value="<?php echo $sothunhi ?>" />
            </td>

        </tr>
        <tr >
            <td>Kết quả </td>
            <td>
                <input name="kq" type="number"value="<?php echo $ketqua ?>" />
            </td>
            <tr>
                <td colspan="3" align="center">
                <a href="javascript:window.history.back(-1);">Tro ve trang truoc</a>
            </tr>

	</form>	

</body>
</html>