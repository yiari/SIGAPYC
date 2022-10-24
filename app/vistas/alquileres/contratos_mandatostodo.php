
<?php 


include("layout/menuNavegacion.php"); 


?>


<div class="container">

<div style="text-align: right;">
            <ol>           
                <a class="btn btn-outline-secondary codinmu" href="index.php?url=app/vistas/alquileres/inmueblestodo"  role="button">Atras</a>
            </ol>
</div>


    <div class="card-header">
        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa-solid fa-city"></i>&nbsp;
                CONTRATOS
            </div>
            <div class="card-body">
                <table id="datosContratos">
                    <thead>
                        <tr>
                            <th>codigo</th>
                            <th>Propietario</th>
                            <th>inmueble</th>
                            <th>unidad</th>
                            <th>Inquilino</th>
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




<div class="container">
    <div class="card-header">

        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa-solid fa-city"></i>&nbsp;
                MANDATOS
            </div>
            <div class="card-body">
                <table id="datosMandatos" class="display compact">
                    <thead>
                        <tr>
                            <th>codigos</th>
                            <th>Inmueble</th>
                            <th>Unidad</th>
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
<script src="js/alquileres/cargar_contratos_mandatos.js"></script>




