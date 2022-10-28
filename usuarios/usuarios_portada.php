<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Multiusuarios PHP MySQL: Niveles de Usuarios</title>
		
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../js/jquery-1.12.4-jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="../css/usuarios_portada.css">
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 20px auto;
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
</style>
<?php

require_once "conexion.php";
   
  if($_POST){ 
    $accion=$_POST['accion'];
    $id=$_POST['id'];

    switch ($accion){
      case "borrar":
        $registros = mysqli_query($conexion, "delete from mainlogin where id=$id");
        break;
        default;
        echo "no existe";
    }
}
  $registros = mysqli_query($conexion, "SELECT * FROM mainlogin") 
    or die("Problemas en el select" . mysqli_error($conexion));
    ?>
</head>
	<body>
<?php include("vistausu.php");?>
	
	<div class="wrapper">
	
	<div class="containerusu">
			
		<div class="col-lg-12">
		 <br>
         <br>
         <br>
			<center>
				<h1>Pagina usuario</h1>
				
				<h3>
				<?php
				
				session_start();

				if(!isset($_SESSION['usuarios_login']))	
				{
					header("location: ../index.php");
				}

				if(isset($_SESSION['admin_login']))	
				{
					header("location: ../admin/admin_portada.php");
				}

				if(isset($_SESSION['personal_login']))	
				{
					header("location: ../personal/personal_portada.php");
				}

				if(isset($_SESSION['user_login']))
				{
				?>
					Bienvenidos,
				<?php
						echo $_SESSION['usuarios_login'];
				}
				?>
				</h3>
			</center>
            <hr>
		</div>
		
	</div>
    <br>
    <br>
    <br>
	<script>
	$(document).ready( function () {
    $('#table_id').DataTable();
} );</script>
	</div>
	<table id="table_id" class="display">
    <thead>
        <tr>
            <th>id</th>
            <th>username</th>
			<th>email</th>
			<th>password</th>
			<th>roles</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
        while($reg = mysqli_fetch_array($registros)) {?>    
    <td><?php echo $reg['id']; ?></td>    
    <td><?php echo $reg['username']; ?></td>
    <td><?php echo $reg['email']; ?></td>
    <td><?php echo $reg['password']; ?></td>
	<td><?php echo $reg['role']; ?></td>
    <tr></tr>
		<?php } ?>
    </tbody>
</table>							
	</body>
</html>
