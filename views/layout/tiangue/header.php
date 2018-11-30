
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Tiangue</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="<?php echo $_layoutParams['ruta_css'];?>bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="<?php echo $_layoutParams['ruta_css'];?>slick.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo $_layoutParams['ruta_css'];?>slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="<?php echo $_layoutParams['ruta_css'];?>nouislider.min.css"/>

    <!-- Font Awesome Icon -->


    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="<?php echo $_layoutParams['ruta_css'];?>style.css"/>

    <style>
        #map {
            height: 100%;

        }
    </style>



    <!-- jQuery Plugins -->
    <script src="<?php echo $_layoutParams['ruta_js'];?>jquery.min.js"></script>
    <script src="<?php echo $_layoutParams['ruta_js'];?>bootstrap.min.js"></script>
    <script src="<?php echo $_layoutParams['ruta_js'];?>slick.min.js"></script>
    <script src="<?php echo $_layoutParams['ruta_js'];?>nouislider.min.js"></script>
    <script src="<?php echo $_layoutParams['ruta_js'];?>jquery.zoom.min.js"></script>
    <script src="<?php echo $_layoutParams['ruta_js'];?>main.js"></script>







</head>











<body>
<br>
<!-- HEADER -->
<header>
    <!-- MAIN HEADER -->
    <div id="">
        <!-- container -->
        <div class="container">
            <!-- LOGIN -->




            <div class="container ">
                <form class="form-inline col-lg-offset-3" role="form">
                    <div class="form-group">
                        <label class="text-danger" for="ejemplo_email_2">Usuario</label>
                        <input type="text" class="form-control" id="usuario_login" placeholder="Nombre de Usuario">
                    </div>
                    <div class="form-group">
                        <label class="text-danger" for="ejemplo_password_2">Clave</label>
                        <input type="password" class="form-control" id="pass_login" placeholder="Contraseña">
                    </div>
                    <?php
                   if(!Session::get("autenticado"))
                       echo"  <a type='submit' class='btn' id='btlogin'>Entrar</a>
                            <a href='registro' type='submit' class='btn btn-warning'>Registrarse</a>";
                   else{
                       echo"<a href='".BASE_URL."login/salir' type='submit' class='btn' id='salir'>Salir</a>";
                   }
                    ?>

                </form>
            </div>


            <!-- /LOGIN -->
            <!-- row -->
            <div class="row">

                <!-- LOGO -->
                <div class="col-md-6 col-lg-2 col-xs-6">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="<?php echo $_layoutParams['ruta_img'];?>/h1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->




                <!-- categorias -->
                <div class="col-md-8 col-lg-9 col-xs-6">
                    <div class="header-search">
                        <div class="row">
                            <select class="input-select col-lg-4">
                                <option value="0">Categorias</option>
                                <option value="1">TRUCHA</option>
                                <option value="1">RESTAURANTE</option>
                                <option value="1">TIENDA</option>
                                <option value="1">MISSELANEA</option>
                                <option value="1">SUPERMERCADO</option>
                                <option value="1">LICORERIA</option>
                                <option value="1">ASERRADERO</option>
                                <option value="1">BENEFICIO DE CAFÉ</option>
                                <option value="1">PROCESADORA DE TABACO</option>
                                <option value="1">EMPRESA CONSTRUCTORA</option>
                                <option value="1">FABRICA</option>
                                <option value="1">SERVICIOS BANCARIOS</option>
                                <option value="1">SERVICIOS PROFESIONALES</option>
                                <option value="1">SERVICIOS MEDICOS</option>
                                <option value="1">TALLER</option>
                                <option value="1">SALON DE BELLEZA</option>
                                <option value="1">MOLINOS</option>
                                <option value="1">TOSTADORA DE CAFÉ</option>
                                <option value="1">BAR</option>
                                <option value="1">BAR Y RESTAURANTE</option>
                                <option value="1">PANADERIA</option>
                                <option value="1">LICORERIA</option>
                                <option value="1">PULPERIA</option>
                                <option value="1">FARMACIA</option>
                                <option value="1">TRANSPORTE</option>
                                <option value="1">COMEDOR</option>

                                <option value="1">VULCANIZADORA</option>
                                <option value="1">ENTIDAD FINANCIERA</option>
                                <option value="1">PUBLICIDAD</option>
                                <option value="1">ALQUILER</option>
                                <option value="1">BILLARES</option>
                                <option value="1">VIDEO JUEGOS</option>
                                <option value="1">FRITANGA</option>
                                <option value="1">FOTOCOPIADO</option>
                                <option value="1">IMPORTACIONES Y EXPORTACIONES</option>
                                <option value="1">JUEGOS DE AZAR</option>
                                <option value="1">AUTOLAVADO</option>

                                <option value="1">CLINICA</option>
                                <option value="1">FUNERARIA</option>
                                <option value="1">EMISORA</option>
                                <option value="1">BUFFE JURIDICO</option>
                                <option value="1">SUPERMERCADO</option>
                                <option value="1">CAFETIN</option>
                                <option value="1">DECORACIÓN</option>
                                <option value="1">ACADEMIA</option>
                                <option value="1">ESCUELA</option>
                                <option value="1">SERIGRAFIAS</option>
                                <option value="1">LIBRERIA</option>

                                <option value="1">CIBER</option>
                                <option value="1">BARBERIA</option>
                                <option value="1">TELECOMUNICACIONES</option>
                                <option value="1">CENTRO DE CAPACITACIONES</option>
                                <option value="1">FERRETERIA</option>
                                <option value="1">LITOGRAFIA</option>
                                <option value="1">ZAPATERIA</option>
                                <option value="1">FUNERARIA</option>
                                <option value="1">SERVICIO DE FOTOGRAFIA</option>

                            </select>
                            <input  id="cjclave" class="input col-lg-6" placeholder="Buscar aqui">
                            <button  id="btbuscar" class="search-btn col-lg-3">Buscar</button>

                        </div>
                    </div>
                </div>
                <!-- /categorias -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->

    <div class="container">
        <div class="row">


            <div id="menu" class="navbar-nav col-lg-offset-3">
                <a class="nav-item nav-link" href="<?php echo BASE_URL; ?>">Inicio <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="<?php echo BASE_URL."mapa"; ?>">Mapa</a>
                <a class="nav-item nav-link" href="<?php echo BASE_URL."eventos"; ?>">Eventos</a>
                <a class="nav-item nav-link disabled" href="<?php echo BASE_URL."promociones"; ?>">Promociones</a>
                <?php
                if(Session::get('autenticado'))
                    echo "<a class='nav-item nav-link disabled' href='". BASE_URL."registro/autenticarlo/".Session::get('idP')."' >Perfil</a>";
                ?>
            </div>






        </div>
    </div>


</header>