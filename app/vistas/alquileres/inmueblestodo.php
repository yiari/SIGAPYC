<?php include("layout/menuNavegacion.php"); ?>

<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
            <ol>
                <a class="btn btn-outline-secondary" href="index.php?url=app/vistas/alquileres/propietarios"  role="button">Atras</a>                
               
            </ol>
        </div>
        <div style="text-align: left;">
            <span id="lblPropietario"><strong>PROPIETARIO : </strong></span>
            <br/><br/>
        </div>
        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa fa-building-o"></i>&nbsp;
                INMUEBLES
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table id="datosInmueblesTodo" class="display compact">
                        <thead>
                            <tr>

                                <th style='text-align:center'>Foto</th>    
                                <th style='text-align:center'>Inmueble</th>
                                <th style='text-align:center'>Unidad</th>
                                <th style='text-align:center'>Propietario</th>
                                <th style='text-align:center'>Tipo</th>
                                <th style='text-align:center'>Estatus</th>
                                <th style='text-align:center'>Canon</th>
                                <th style='text-align:center'>Acciones</th>
    
                            </tr>
                        </thead>
                        
                        <tbody>
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/cargar_inmuebles.js"></script>

