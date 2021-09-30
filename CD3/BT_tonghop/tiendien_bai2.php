<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>THANH TOÁN TIỀN ĐIỆN</title>

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

    if(isset($_POST['tenchuho']))  

        $tenchuho=trim($_POST['tenchuho']); 

    else $tenchuho="";


    if(isset($_POST['chisocu'])) 

        $chisocu=trim($_POST['chisocu']); 

    else $chisocu=0;


    if(isset($_POST['chisomoi'])) 

        $chisomoi=trim($_POST['chisomoi']); 

    else $chisomoi=0;

 
    define('dongia',20000);

    if(isset($_POST['thanhtoan']))

        if (is_numeric($chisocu) && is_numeric($chisomoi)  
            && $tenchuho!="")  

                $thanhtoan=($chisomoi - $chisocu)* dongia;

            else {
                echo "<font color='red'>Bạn nhập sai, vui lòng nhập lại! </font>"; 
                $thanhtoan="";
                }

    else $thanhtoan=0;

?>


<form align='center' action="tiendien_bai2.php" method="post">
<table>
    <thead>
        <th colspan="2" align="center"><h1><i>THANH TOÁN TIỀN ĐIỆN</i></h1></th>
    </thead>

    <tr><td>Tên chủ hộ:</td>
     <td><input type="text" name="tenchuho" size="30" value="<?php  echo $tenchuho ;?> "/></td>

    </tr>

    <tr><td>Chỉ số cũ:</td>

     <td><input type="text" name="chisocu"size="30" value="<?php  echo $chisocu;?> "/></td>
     <td>(Kw)</td>

    </tr>

    <tr><td>Chỉ số mới:</td>

     <td><input type="text" name="chisomoi" size="30" value="<?php  echo $chisomoi;?> "/></td>
     <td>(Kw)</td>

    </tr>

    <tr><td>Đơn giá:</td>

     <td><input type="text" name="dongia" size="30" value="<?php  echo dongia;?> "/></td>
     <td>(VND)</td>

    </tr>

    <tr><td>Số tiền thanh toán:</td>



     <td><input type="text" name="thanhtoan" size="30" disabled="disabled" value="<?php  echo $thanhtoan;?> "/></td>
     <td>(VND)</td>
    </tr>

    <tr>
     <td colspan="3" align="center"><input type="submit" value="Tính" name="thanhtoan" /></td>

    </tr>

</table>

</form>

</body>

</html>