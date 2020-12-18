<!DOCTYPE html>
<html>
<head>
    <title>Administrador</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import de jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Imports de boostrap e iconos-->
    <link rel="stylesheet" href="../Estilos/bootstrap/css/bootstrap.min.css">
	  <link rel="stylesheet" href="../Estilos/bootstrap/css/inicio.css">
    <script defer src="../Estilos/icons/js/all.js"></script>

	  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Toastr -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>

    
    <link rel="stylesheet" type="text/css" href="../Resources/JS/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="../Resources/JS/jtable/themes/lightcolor/red/jtable.css">

    <script src="../Resources/JS/jquery-3.2.1.min.js"></script>
    <script src="../Resources/JS/jquery-ui/jquery-ui.js"></script>
    <script src="../Resources/JS/jtable/jquery.jtable.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" 
          aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="inicio.php"><img src='../Resources/img/logo.png' alt='logo' style='width:50px;height:50px;'></a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="inicio.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <!-- <li class="nav-item active">
          <a class="nav-link" href="nuevoDisco.php">Añadir articulo</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#"> AdministracionUsuarios</a>
        </li> -->
        <li class="nav-item active">
        <a class="nav-link" href="perfil.php">Perfil</a>
        </li>
        <?php 
        require_once '../Class/BaseDatos.php';
            session_start();
           
            if (isset($_SESSION['logueado'])) {
               
              //A la hora de comprobar el tipo no coge nada si es admin
                if ($_SESSION['logueado']->isAdmin()) {
                  echo "<li class='nav-item active'>
                      <a class='nav-link' href='nuevoDisco.php'>Añadir articulo</a>
                    </li>";

                  echo "<li class='nav-item active'>
                      <a class='nav-link' href='administrador.php'>Administracion</a>
                    </li>";
                }else{
                    header("Location: inicio.php");
                }

            }
?>
      </ul>

          <a class="nav-link active" href="login.php"><i class="fas fa-sign-out-alt"></i></a>
          <a class="nav-link active" href="carrito.php"><i class="fas fa-shopping-cart fa-lg" ></i></a>
    
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
  </nav>
       <div id="discos" style="width: 90%; margin:5%"></div>
        <div id="usuarios" style="width: 90%; margin:5%"></div>


</body>
</html>


        <script type="text/javascript">
        $(document).ready(function(){
            $('#discos').jtable({
                title : "Discos",
                paging: true, //paginacion de la tabla es verdadera
                pageSize : 5, //nos muestra el numero de registros
                sorting : true, //ordenamiento de registros
                defaultSorting: 'titulo asc', //manera de ordenamiento
                actions:{
                    listAction : '../Resources/PHP/accionesDiscos.php?action=list',
                    updateAction : '../Resources/PHP/accionesDiscos.php?action=update',
                    deleteAction : '../Resources/PHP/accionesDiscos.php?action=delete'
                },
                fields:{
                    id:{
                        key:true,
                        create:false,
                        edit:false,
                        list:false
                    },
                    titulo:{
                        title:'Titulo del Disco',
                        width:'10%',
                        edit:false
                    },
                    autor:{
                        title:'Autor',
                        width:'10%',
                        edit:false
                    },
                    genero:{
                        title:'Genero',
                        width:'10%',
                        edit:false
                    },
                    precio:{
                        title:'Precio',
                        width:'10%',
                        type:"float",
                        edit:true
                    },
                    caratula:{
                        title:'Caratula',
                        width:'10%',
                        edit:true
                    }
                }
            });

            $('#discos').jtable('load');
        });
    </script>



<script type="text/javascript">
        $(document).ready(function(){
            $('#usuarios').jtable({
                title : "Usuarios",
                paging: true, //paginacion de la tabla es verdadera
                pageSize : 5, //nos muestra el numero de registros
                sorting : true, //ordenamiento de registros
                defaultSorting: 'id asc', //manera de ordenamiento
                actions:{
                    listAction : '../Resources/PHP/accionesUsuarios.php?action=list',
                    updateAction : '../Resources/PHP/accionesUsuarios.php?action=update',
                    deleteAction : '../Resources/PHP/accionesUsuarios.php?action=delete'
                },
                fields:{
                    id:{
                        key:true,
                        create:false,
                        edit:false,
                        list:false
                    },
                    nombre:{
                        title:'Nombre del Usuario',
                        width:'15%',
                        edit:false
                    },
                    apellido:{
                        title:'Apellido del Usuario',
                        width:'15%',
                        edit:false
                    },
                    email:{
                        title:'Email',
                        width:'15%',
                        edit:true
                    },
                    telefono:{
                        title:'Telefono',
                        width:'15%',
                        edit:true
                    },
                    pass:{
                        title:'Contraseña',
                        width:'15%',
                        edit:true
                    },
                    pais:{
                        title:'Pais',
                        width:'15%'
                    },
                    provincia:{
                        title:'Provincia',
                        width:'15%'
                    },
                    localidad:{
                        title:'Localidad',
                        width:'15%'
                    },
                    calle:{
                        title:'Calle',
                        width:'15%'
                    },
                    detalle:{
                        title:'Detalle',
                        width:'15%'
                    },
                    cp:{
                        title:'Cp',
                        width:'15%'
                    },
                    tipo:{
                        title:'Tipo',
                        width:'15%'
                    }
                }
            });

            $('#usuarios').jtable('load');
        });
    </script>
