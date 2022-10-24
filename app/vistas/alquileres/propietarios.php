
<?php 


include("layout/menuNavegacion.php"); 


?>

<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
        <ol>
                <a class="btn btn-outline-primary" href="index.php?url=app/vistas/alquileres/ingresar_propietarios" role="button">Nuevo</a>                
                <!--a class="btn btn-outline-secondary" href="reportes.php" role="button">Imprimir</a-->
            </ol>
        </div>


        
        
        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa fa-users"></i>&nbsp;
                PROPIETARIOS
            </div>

            <div class="card-body">
                <table id="datosPropietarios" class="display compact">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Cedula o rif</th>
                            <th>Telefonos</th>
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
    </br>
</div>
</br>


<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";


?>

<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/cargar_propietario.js"></script>