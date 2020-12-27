<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos/bootstrap/css/bootstrap.min.css">
	 <link rel="stylesheet" href="../Estilos/bootstrap/css/login.css">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../Estilos/bootstrap/css/registro.css">
	<script src="../Resources/JS/jquery.css"></script>
	
    <title>Registro</title>
    <?php 
    require_once '../Class/BaseDatos.php';
        if(isset($_POST['submit'])){
            $nombre=$_POST['nombre'];
            $apellidos=$_POST['apellido'];
            $email=$_POST['email'];
            $telefono=$_POST['telefono'];
            $contraseña=$_POST['pass'];
            $pais=$_POST['pais'];
            $provincia=$_POST['provincia'];
            $localidad=$_POST['localidad'];
            $calle=$_POST['calle'];
            $detalle=$_POST['detalle'];
            $cp=$_POST['cp'];
            if(isset($_POST['tipo'])){
                $tipo=$_POST['tipo'];
            }else{
                $tipo='1';
            }
            if(BaseDatos::getInstance()->registroUsuario($nombre,$apellidos,$email,$telefono,$contraseña,$pais,$provincia,$localidad,$calle,$detalle,$cp,$tipo)){
                echo '<div class="alert alert-success" role="alert">Usuario creado correctamente</div>';
                // sleep(3);
                // header('Location: inicio.php');

            }else{
                echo '<div class="alert alert-danger" role="alert">Lo sentimos el usuario no ha sido registrado, Email ya en uso</div>';
            }
        }
    
    
    ?>
</head>
<body>
    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Registro</h4>
              
            </div>
          
            <div class="modal-body">
              
            
                <form id="registerForm" method="POST" action="#">
<!---form--->           <div class="form-group">
<!---input width--->    <div class="col-xs-6">
                        <label for="InputName">Nombre</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre..." required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        <br>
                        <label for="InputName">Apellidos</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="apellido" placeholder="Apellido..." required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
<!--------------------------------------separator---------------------------------------------------------------> <hr>
                </div>
                </div>
                    <div class="form-group">
                    <div class="col-xs-6">

                        <label for="InputName">Email</label>
                        <div class="input-group">
                        <input type="email" class="form-control" name=email placeholder="Email..." required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    
                        <br>
                        <label for="InputPassword">Contraseña</label>
                        <div class="input-group">
                        <input type="password" class="form-control" name="pass" placeholder="Contraseña..." required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        <br>
                        <label>Telefono</label>
                        <div class="input-group">
                        <input type="tel" class="form-control" name="telefono" placeholder="Telefono..." required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    
                    </div>
                    <?php
                        session_start();
                        if(isset($_SESSION['logueado'])){
                            if($_SESSION['logueado']->isAdmin()){
                            echo '<br>
                                    <label>Tipo</label>
                                    <div class="input-group">
                                    <select name="tipo">
                                        <option value="0">admin</option>
                                        <option value="1">usuario</option>
                                    </select>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                
                                </div>';
                            }
                        }
                    ?>
<!----------------------------break-------------------------------------------------------------> 
                     </div>
                 </div>

                        <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputStreetName">Pais</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="pais" placeholder="Pais.." required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
<!----------------------------break-------------------------------------------------------------> 
                    </div>                     
                </div>
             
                        <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputCity">Provincia</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="provincia" placeholder="Provincia" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><br>
                    <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputCity">Localidad</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="localidad" placeholder="Localidad..." required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><br>
                    <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputCity">Calle</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="calle" placeholder="calle" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div><br>
                    <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputCity">Detalle</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="detalle" placeholder="Detalle.." required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
<!----------------------------break-------------------------------------------------------------> 
                    </div>
                    </div>

                        <div class="form-group">
                        <div class="col-xs-12">
                        <label for="InputProvince">Codigo Postal</label>
                        <div class="input-group">
                        <input type="text" class="form-control" name="cp" placeholder="cp" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span> 
                    </div>
<!----------------------------break-------------------------------------------------------------> <br>                     
                   </div>
                </div>

                  <div class="form-group">
                  <div class="input-group-addon">
                  <input type="submit" name="submit" id="submit" value="Registro" class="btn btn-success pull-right">
                  <?php 
                  if(isset($_SESSION['logueado'])){
                    if($_SESSION['logueado']->isAdmin()){
                        echo '<a class="btn btn-info" href="vistaAdministrador.php" role="button">Volver</a>';
                    }else{
                        echo '<a class="btn btn-info" href="inicio.php" role="button">Volver</a>';
                    }
                  }
                  
                  
                  ?>
                  

                  
                  </div>
                </div>
                </form>
              </div><!---modal-body--->
          </div>
       </div>

</body>
</html>