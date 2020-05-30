<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Site1</title>  
<link  href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
 include_once('functions.php');
 $link = connect_sql();

   $id = $_SERVER['argv'][0];
  if(!isset($_POST['edit']))
  {
    $query='SELECT * FROM GOOD WHERE Id ='.$id;
     $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
   if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result); 
        $name = $row[1];
        $amount = $row[2];
        $price = $row[3];   

echo  '<h1>Редактирование</h1> 
  <form action="edit.php?'.$id.'" method="POST">
 <input type="hidden" name="id" value="'.$id.'"/>
  <div class="form-group">
    <label>Введите имя:</label>
    <input type="text" class="form-control"   name="name" value="'.$name.'">    
  </div>
  <div class="form-group">
    <label>Введите количество:</label>
    <input type="text" class="form-control"   name="amount" value="'.$amount.'">    
  </div>
  <div class="form-group">
    <label>Введите цену:</label>
    <input type="text" class="form-control"   name="price" value="'.$price.'">    
  </div>
  <div class="form-group">
  <input type="submit" name="edit" value="Сохранить" class="btn btn-primary"> 
</div>  
</form>';
  }
}

else
{ 
  $name=$_POST['name'];
  $amount=$_POST['amount'];
  $price =$_POST['price'];
  $query ='UPDATE GOOD SET Name="'.$name.'", amount="'.$amount.'", price="'.$price.'" WHERE id='.$id;
     
  $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    
     if($result)
    {
    echo '<script>window.location.href="index.php";</script>';
    }
   
  }   
?> 
</body>
</html>

<style type="text/css">
	input{
		padding-left: 10px; 
	}
	h1{
	text-align: center;
    }
    body{     
    margin: 30px;
}
    form{
    width:450px;
    height: 450px;
    margin:auto;
    }
</style>