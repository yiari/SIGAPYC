<?php include("layout/menuNavegacion.php"); ?>

<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
        <ol>
                <a class="btn btn-outline-primary codpro" href="index.php?url=app/vistas/alquileres/ingresar_representante" role="button">Nuevo</a>                
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
            <i class="fa-solid fa-city"></i>&nbsp;
                REPRESENTANTE
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datosRepresentante" class="display compact">
                        <thead>
                            <tr>

                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>cedula</th>
                                <th>Telefono</th>
                                <th>correo</th>
                                
                                
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

</div>

<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/cargar_representante.js"></script>