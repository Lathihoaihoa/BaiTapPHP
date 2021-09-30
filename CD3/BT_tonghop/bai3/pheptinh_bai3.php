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
    		if($sothunhat == 0)
    		{
    			echo ' ';
    		}

    	}
	?>

	<form action="bai3_sau.php" name="myform" method="post">
		<table align="center">
		<thead>
			<th colspan="3" align="center"><h1>PHÉP TÍNH TRÊN HAI SỐ</h1></th>
		</thead>

		<tr><td>Chọn phép tính:</td>
			<td><input type="radio" id="cong" name="tinh" value="Cộng" checked="checked">
				<label for="add1">Cộng</label>  
			 <input type="radio" id="tru" name="tinh" value="Trừ"> 
				<label for="sub1">Trừ</label>  
                <input type="radio" id="nhan" name="tinh" value="Nhân"> 
                <label for="mul1">Nhân</label> 
                <input type="radio" id="chia" name="tinh" value="Chia"> 
                <label for="div1">Chia</label>
			</td>


		</tr>

		<tr>
         	<td><br>Số thứ nhất </td>
            <td>
                <input name="sothunhat" type="number" value="<?php echo $sothunhat ?>" />
            </td>
            <br>
                     
		</tr>
        <tr >
            <td>Số thứ hai</td>
            <td>
                <input name="sothunhi" type="number"value="<?php echo $sothunhi ?>" />
            </td>
            <tr>
            	<br>
                <td colspan="3" align="center">
                <button type="submit" >Tính </button> 
            </tr>
        </tr>

	</form>	

</body>
</html>