<?php include("layout/menuNavegacion.php"); ?>

<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
        <ol>
                <a class="btn btn-outline-primary" href="index.php?url=app/vistas/alquileres/ingresar_unidad_inmueble" role="button">Nuevo</a>                
                <a class="btn btn-outline-secondary" href="index.php?url=app/vistas/alquileres/inmuebles"  role="button">Atras</a>
            </ol>
        </div>
        
        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa-solid fa-city"></i>&nbsp;
                UNIDADES DEL INMUEBLE
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            
                            <th>Fotos</th>
                            <th>Unidad</th>
                            <th>Inmueble</th>
                            <th>Inquilino</th>
                            <th>Estatus</th>
                            <th>Tipo</th>
                            <th>Doc / Editar</th>
                     
 
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

<script src="js/alquileres/cargar_unidades.js"></script>
