
<?php 


include("layout/menuNavegacion.php"); 


?>


<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
        <ol>
                <a class="btn btn-outline-primary" href="index.php?url=app/vistas/alquileres/ingresar_contrato" role="button">Nuevo</a>                
                
            </ol>
        </div>
        
        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa-solid fa-city"></i>&nbsp;
                CONTRATOS
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table id="datosContrato" class="display compact"
>
                    <thead>
                        <tr>
                            
                            
                            <th>Codigo</th>
                            <th>Propietario</th>
                            <th>Inquilino</th>
                            <th>Inmueble</th>
                            <th>Canon</th>
                            <th>Desde</th>
                            <th>Hasta</th>
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
<script src="js/alquileres/cargar_contrato.js"></script>





