<?php 

include("layout/menuNavegacion.php"); 


?>


<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
        <ol>
                <a class="btn btn-outline-primary" href="index.php?url=app/vistas/alquileres/ingresar_inquilinos" role="button">Nuevo</a>                
               
            </ol>
        </div>

        
        
        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa-solid fa-people-roof"></i>&nbsp;
                INQUILINOS
            </div>
            <div class="card-body">
                <table id="datosinquilinos">
                    <thead>
                        <tr>
                           <th> Codigo</th>
                            <th>Nombre</th>
                            <th>Doc ID</th>
                            <th>Telefono </th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                    
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>


<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>

<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/cargar_inquilinos.js"></script>


