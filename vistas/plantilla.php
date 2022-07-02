<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIGAPYC | YURUARY</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>


</head>

<body class="sb-nav-fixed">

        <?php
            include "paginas/top.php";
        ?>

    <!-- menu de navegacion lateral-->
    <div id="layoutSidenav">
        <!-- menu de navegacion lateral-->
        <div id="layoutSidenav_nav">
            <?php
                include "paginas/menulateral.php";
            ?>

        </div>

        
        <div id="layoutSidenav_content">
                <div class="card mb-4">
                    <div class="container-fluid px-4">
            <!-- inicio cuerpo-->
                        <?php

                            #ISSET: isset() determina si una variable esta definidad u no es NULL

                            if(isset($_GET["url"])){

                                if($_GET["url"] == "registro" ||
                                $_GET["url"] == "menuprincipal" ||
                                $_GET["url"] == "propietarios" ||
                                $_GET["url"] == "inquilinos" ||
                                $_GET["url"] == "alquileres" ||
                                $_GET["url"] == "ingresar_propietarios" ){
                                    
                                    include "paginas/".$_GET["url"].".php";

                                }else{

                                    include "paginas/error404.php";
                                }


                            }else{

                            include "paginas/inicio.php";
                            }

                            

                        ?>

            <!-- fin cuerpo-->   
                    </div>
                </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/main.js"></script>
        <script src="js/popup.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>


    
</body>
</html>