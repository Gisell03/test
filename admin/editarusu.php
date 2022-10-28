<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editarusu.css">
    <title>Document</title>
</head>
<style type="text/css">
	.login-form {
		width: 340px;
		top: 180px;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    .col-sm-6 {        
        font-size: 12px;
        font-weight: bold;
    }
</style>
<?php
    $id=$_GET['id'];
    $conexion = mysqli_connect("localhost", "root", "", "usuarios") or
die("Problemas con la conexión");
  $registros =mysqli_query($conexion,"SELECT * FROM `mainlogin` WHERE id=$id"); 
  ?>

<body>
    <?php
    if ($_POST){
    $a=$_GET['id'];
    $conexion = mysqli_connect("localhost", "root", "", "usuarios") or
die("Problemas con la conexión");

    $registros= mysql_query("SELECT * FROM `mainlogin` WHERE `mainlogin`") or
    die("Problemas en el select:" . mysqli_error($conexion)); 
    while ($reg=msqli_fetch_array($registros)) {
        echo "id:" . $reg['id'] . "<br>";
        echo "username:" . $reg['username'] . "<br>";
        echo "email:" . $reg['email'] . "<br>";
        echo "password:" . $reg['password'] . "<br>";
        echo "role:" . $reg['role'] . "<br>";
        echo "<hr>";
    }
    }
    mysqli_close($conexion);
    ?>
    <?php
    if($reg = mysqli_fetch_array($registros)) {?>
  <div class="login-form login">
<form method="post" action="editar.php" class="form-horizontal">
<fieldset>
	<legend class="legend">Actualizar Usuario</legend>
<div class="form-group">
  <div class="col-sm-12 input">
  <input type="hidden" name="id" class="form-control" placeholder="Ingrese email" value="<?php echo $reg['id']; ?>"/>
  <span><i class="fa fa-envelope-o"></i></span>
  </div>
  </div>

  <div class="form-group">
  <label class="col-sm-6 text-left">Nombre de usuario</label>
  <div class="col-sm-12 input">
  <input type="text" name="username" class="form-control" placeholder="Ingrese email" value="<?php echo $reg['username']; ?>"/>
  </div>
  </div>
      
      
  <div class="form-group">
  <label class="col-sm-6 text-left">Email</label>
  <div class="col-sm-12 input">
  <input type="text" name="email" class="form-control" placeholder="Ingrese email" value="<?php echo $reg['email']; ?>"/>
  </div>
  </div>
      
  <div class="form-group">
  <label class="col-sm-6 text-left">Password</label>
  <div class="col-sm-12 input">
  <input type="password" name="password" class="form-control" placeholder="Ingrese passowrd" value="<?php echo $reg['password']; ?>"/>
  </div>
  </div>
      
  <div class="form-group">
      <label class="col-sm-6 text-left">Seleccionar rol</label>
      <div class="col-sm-12 input">
      <select class="form-control" name="role" value="<?php echo $reg['role']; ?>">
          <option value="" selected="selected"> - selecccionar rol - </option>
          <option value="admin">Admin</option>
          <option value="personal">Personal</option>
          <option value="usuarios">Usuarios</option>
      </select>
      </div>
  </div>
  
  <div class="form-group">
<div class="col-sm-12">
<input type="submit" name="" class="btn btn-primary btn-block submit" value="Registro">
<br>
<br>
<a href="index.php" class="btn btn-danger">Cancel</a>
</div>
</div>
    </fieldset>
</form>
</div>  
<?php 
} 
?>
</body>

</html>