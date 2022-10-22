<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIGAPYC | YURUARY</title>
    
    <!--
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
-->

    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    


    <link href="css/styles.css" rel="stylesheet" />
    <link href="assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <!--
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
-->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


</head>

<body class="sb-nav-fixed">

        <?php
            include "layout/top.php";
        ?>

    <!-- menu de navegacion lateral-->
    <div id="layoutSidenav">
        <!-- menu de navegacion lateral-->
        <div id="layoutSidenav_nav">
            <?php
                include "layout/menulateral.php";
            ?>

        </div>

        
        <div id="layoutSidenav_content">
                <div class="card" style="margin-left:0.8rem;">
                    <div class="container-fluid px-4">
            <!-- inicio cuerpo-->
                        <?php
                            #ISSET: isset() determina si una variable esta definidad u no es NULL

                            if(isset($_GET["url"])){

                                
                                if($_GET["url"] != ""){
                                    
                                 $pos = strpos($_GET["url"],"?");
                                
                                 if($pos > 0){
                                    include $_GET["url"];
                                 } else {
                                    
                                    include $_GET["url"].".php";

                                 }

 
                                } else {
                                    include "errores/error404.php";
                                }
                                

                            }else{

                            //include "paginas/inicio.php";
                            
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

        <!--
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
                    -->
        
        <!--
                    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                    -->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    
</body>
</html>