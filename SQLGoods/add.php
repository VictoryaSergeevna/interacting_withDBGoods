<?php
include_once('functions.php');
$link=connect_sql();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Site1</title>	
<link  href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form action="add.php" method="POST">
 <h1>Добавление</h1> 
  <div class="form-group">
    <label>Введите имя:</label>
    <input type="text" class="form-control"   name="name" required>    
  </div>
  <div class="form-group">
    <label>Введите количество:</label>
    <input type="text" class="form-control"   name="amount" required>    
  </div>
  <div class="form-group">
    <label>Введите цену:</label>
    <input type="text" class="form-control"   name="price" required>    
  </div>
  <div class="form-group">
  <input type="submit" name="add" value="Добавить" class="btn btn-primary"> 
</div>
  <a href="index.php">Назад</a> 
</form>
</body>
</html>
<?php
if(isset($_POST['add']))
{
    /*$host="localhost";
	$user="root";
	$password="";
	if(!($link=mysqli_connect($host,$user,$password))){
		echo"<h2><font color=red font face='arial' size='20pt'>SQL Error!</font></h2>";
	}
  mysqli_select_db($link,'goods');  */
  $name=$_POST['name'];
  $amount=$_POST['amount'];
  $price =$_POST['price'];
  $query ="INSERT INTO GOOD VALUES(NULL,'$name','$amount','$price')";
  $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo '<script>window.location.href="index.php";</script>';
    }
  }
  ?> 

<style type="text/css">
	input{
		padding-left: 10px; 
	}
	h1{
	text-align: center;
    }
    body{
    display: flex; 
    margin: 30px;
}
    form{
    width:450px;
    height: 450px;
    margin:auto;
    }
</style>