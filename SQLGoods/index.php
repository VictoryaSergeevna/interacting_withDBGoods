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
<form action="index.php" method="POST">	
	<h1>Список товаров  из DB</h1>
	<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Имя</th>
      <th scope="col">Количество</th>
      <th scope="col">Цена</th>
      <th scope="col">Редактирование/Удаление</th>
    </tr>    
  </thead>
  <tbody>
 <?php
  $q = mysqli_query ($link,"SELECT * FROM GOOD");
for ($c=0; $c<mysqli_num_rows($q); $c++)
{
echo "<tr>";
$f = mysqli_fetch_array($q);
echo "<td scope='row'>$f[Id]</td><td>$f[Name]</td><td>$f[Amount]</td><td>$f[Price]</td>";
echo "<td><input type='checkbox' name='cb".$f[0]."'></td>";
echo "</tr>";
}
 ?>    
  </tbody>
</table>
<div>
<input type="submit" name="del_good" value="Удалить"class="btn btn-primary">
<input type="submit" name="edit_good" value="Редактировать" class="btn btn-primary">
<input type="submit" name="add_good" value="Добавить" class="btn btn-primary">
</div>
</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
if(isset($_POST['del_good']))
{
	foreach ($_POST as $key => $value) {
		if(substr($key, 0,2)=='cb')
		{
			$id=substr($key,2);
			/*$del='DELETE FROM GOOD WHERE Id='.$id;
            $result=mysqli_query ($link,$del)or die("Ошибка " . mysqli_error($link));*/
		}
	}
	/*echo '<script>window.location=document.URL;</script>';*/
	 echo '<script>window.location="delete.php?'.$id.'";</script>';
}

if(isset($_POST['edit_good']))
{
	foreach ($_POST as $key => $value) {
		if(substr($key, 0,2)=='cb')
		{
			$id=substr($key,2);
		   
        }
       }	
         
        echo '<script>window.location="edit.php?'.$id.'";</script>';
	
}
if(isset($_POST['add_good']))
{
	
	echo '<script>window.location.href="add.php";</script>';
}

?>
<style type="text/css">
body{
	margin:20px;
}


tr{
	text-align: center;
	font-size: 20px;
	font-family: sans-serif;
}

th {
	text-align: center;
	color:#ffe;
	background: #000080;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 20px;
  }
td:first-child{
	font-weight: bold;

}

</style>
