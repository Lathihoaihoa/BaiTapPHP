<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>bai1</title>
    <style type="text/css">
         body {  
            background-color: #00FFFF;
        }
        table{
            background: #ffd94d;

            border: 0 solid yellow;
        }
        thead{
            background: #fff14d;    
        }
        td {
            color: blue;
        }
        h3{
            font-family: verdana;
            text-align: center;
            /* text-anchor: middle; */
            color: #ff8100;
            font-size: medium;
        }
    </style>
</head>
<body>
	<?php

		if(isset($_POST['n'])) 

    		$n=trim($_POST['n']); 

		else $n=0;
		
		    // so nguyen n < 2 khong phai la so nguyen to
	   /* if ($n < 2) {
	        return false;
	    }
	    // check so nguyen to khi n >= 2
	    $squareRoot = sqrt($n);
	    for ($i = 2; $i <= $squareRoot; $i++) {
	        if ($n % $i == 0) {
	            return false;
	        }
	    }
	    return true;

	    echo "Số được tạo là: $number <br>";
		echo ("Các số nguyên tố nhỏ hơn $number là: <br>");
		for ($i = 0; $i < $number; $i++) {
		    if (n($i)) {
		        echo ($i . " ");
		    }
		}
		$length = strlen($number);*/

		if(isset($_POST['tinh']))
		{
			if (is_numeric($n) < 2){
	        	echo "nhập sai";
	        }  
	        $number = sqrt($n);
	        for ($i=2; $i <= $number ; $i++) { 
	        	if($n % $i == 0){
	        		echo "nhập sai";
	        	}
	        }

		}

		else $n=0;
	?>

	<form align='center' action="" method="post">

	<table>

	    <thead>

	        <th colspan="2" align="center"><h3>NHẬP SỐ TỰ NHIÊN TỪ 10 - 1000</h3></th>

	    </thead>

	    <tr><td>Nhập số :</td>

	     <td><input type="text" name="n" value="<?php  echo $n;?> "/></td>

	    </tr>


	    <tr><td>Kết quả:</td>

	     <td><input type="text" name="number" disabled="disabled" value="<?php  echo $number;?> "/></td>

	    </tr>
	    <tr>

	     <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
	    </tr>



	</table>



</form>
</body>
</html>