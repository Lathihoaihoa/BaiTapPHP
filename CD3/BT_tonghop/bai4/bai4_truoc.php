<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Enter your inormation</title>

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
		if(isset($_POST['hoten']))  

        	$hoten=trim($_POST['hoten']); 

    	else $hoten="";

    	if(isset($_POST['diachi']))  

        	$diachi=trim($_POST['diachi']); 

    	else $diachi="";

    	if(isset($_POST['sdt']))  

        	$sdt=trim($_POST['sdt']); 

    	else $sdt="";

	?>

	<form action="bai4_sau.php" name="myform" method="get">
        <table align="center">
		<thead>
            <th colspan="3" align="center"><h1>Enter your inormation</h1></th>
		</thead>
        
		<tr>
         	<td>Họ tên : </td>
            <td>
                <input name="hoten" type="text" value="<?php echo $hoten ?>" />
            </td>
                     
		</tr>
        <tr >
            <td>Địa chỉ: </td>
            <td>
                <input name="diachi" type="text"value="<?php echo $diachi ?>" />
            </td>

        </tr>

        <tr >
            <td>Số điện thoại: </td>
            <td>
                <input name="sdt" type="text"value="<?php echo $sdt ?>" />
            </td>

        </tr>

        <tr>
        	<td>Giới tính: </td>
        	<td>
        		<input type="radio" name="radGT" value="Nam" <?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nam') echo 'checked="checked"'?> checked/>Nam
				<input type="radio" name="radGT" value="Nu" <?php if(isset($_POST['radGT'])&&$_POST['radGT']=='Nu') echo 'checked="checked"'?>/>Nu
        	</td>
        	
        </tr>

        <tr>
        	<td>Quốc tịch: </td>
        	<td>
        		<select name="quoctich">
				<option value="Việt Nam" <?php if(isset($_POST['quoctich'])&& $_POST['quoctich']=='vietnam') echo 'selected';?>>
					Việt Nam
				</option>
				<option value="Thái Lan" <?php if(isset($_POST['quoctich'])&& $_POST['quoctich']=='thailan') echo 'selected';?>>
					Thái Lan
				</option>
				<option value="Trung Quốc" <?php if(isset($_POST['quoctich'])&& $_POST['quoctich']=='trungquoc') echo 'selected';?>>Trung Quốc
				</option>
				<option value="Mỹ" <?php if(isset($_POST['quoctich'])&& $_POST['quoctich']=='my') echo 'selected';?>>Mỹ
				</option>	

        	</td>
        </tr>

        <tr>
        	<td>Các môn đã học: </td>
        	<td>
        		<input type="checkbox" name="chk1" value="PHP & MySQL" 
				<?php if(isset($_POST['chk1'])&& $_POST['chk1']=='php&sql') echo 'checked'; else echo ""?>/>PHP & MySQL 
				<input type="checkbox" name="chk2" value="C#"
				<?php if(isset($_POST['chk2'])&& $_POST['chk2']=='c#') echo 'checked'; else echo ""?>/>C#

				<input type="checkbox" name="chk3" value="XML"
				<?php if(isset($_POST['chk3'])&& $_POST['chk3']=='xml') echo 'checked'; else echo ""?>/>XML

				<input type="checkbox" name="chk4" value="Python"
				<?php if(isset($_POST['chk4'])&& $_POST['chk4']=='python') echo 'checked'; else echo ""?>/>Python
        	</td>
        </tr>

        <tr>
        	<td>Ghi chú: </td>
        	<td>
        		<textarea name="ghichu" rows="3" cols="40"><?php if(isset($_POST['ghichu'])) echo $_POST['ghichu']; ?></textarea>
	
        	</td>
        </tr>
        <tr >
        	<td>
        		<input type="submit" value="Gửi">
        		<input type="submit" value="Hủy">
        	</td>
        </tr>

	</form>
		
</body>
</html>