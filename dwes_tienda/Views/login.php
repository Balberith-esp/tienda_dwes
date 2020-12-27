<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/bootstrap/css/bootstrap.min.css">
	 <link rel="stylesheet" href="../Estilos/bootstrap/css/login.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script> 

	
    <title>Login</title>

    <?php 
    /*Comprobar si el usuario esta logeado*/
    /*Comprobar el submit y realizar la funcion*/
        require_once '../Class/BaseDatos.php';
        session_start();
        

        if (isset($_POST['iniciarSesion'])) {
            $usu=$_POST['nombreUsuario'];
            $cont=$_POST['contaseñaUsuario'];  

            $busqueda=BaseDatos::getInstance()->usuarioCorrectoPDO($usu,$cont);
            $usuario=BaseDatos::getInstance()->datosUsuario($usu);
            
            
            if ($busqueda) {
              $_SESSION['logueado'] = $usuario;
            //   var_dump($usuario);
            //   exit;
               if ($_SESSION['logueado']->isAdmin()) {
                  header("Location: vistaAdministrador.php");
               }else{
                  header("Location: inicio.php");
               }
              
            }
            else{
              echo "<script>bootbox.alert({centerVertical:true, message:'Usuario o contrraseña incorrectos'});</script>";
            }

        }
    
    
    ?>
</head>
<body>
<div class="sidenav">
         <div class="login-main-text">
            <img src='../Resources/img/logo.png' alt='logo' style='width:250px;height:250px;'>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="post">
                  <div class="form-group">
                     <label>Email</label>
                     <input type="text" class="form-control" placeholder="Nombre de usuario" id="nombreUsuario" name="nombreUsuario">
                  </div>
                  <div class="form-group">
                     <label>Contraseña</label>
                     <input type="password" class="form-control" placeholder="Contraseña" id="contaseñaUsuario" name="contaseñaUsuario">
                  </div>
                  <button type="submit" class="btn btn-black" name="iniciarSesion">Iniciar Sesión</button>
                  <a href="registro.php" class="btn btn-secondary" role="button">Registrarse</a>
               </form>
            </div>
         </div>
      </div>
</body>
</html>