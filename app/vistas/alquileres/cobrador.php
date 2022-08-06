<?php include("layout/menuNavegacion.php"); ?>

<div class="container">
   

        <div style="text-align: right;">
        
        </div>
        
        <!--tabla-->

        <div class="card-header">

                <div style="text-align: right;">
                    <ol>
                            <a class="btn btn-outline-primary " href="index.php?url=app/vistas/alquileres/ingresar_cobrador" role="button">Nuevo</a>                
                          
                    </ol>
                </div>

               
        
        <!--tabla-->
                                <div class="card mb-4">
                                    <div class="card-header">
                                    <i class="fa-solid fa-city"></i>&nbsp;
                                        COBRADOR
                                    </div>
                                    <div class="card-body">

                                        <table id="datosCobrador">
                                            <thead>
                                                <tr>
                                                    
                                                    
                                                    <th>Codigo:</th>
                                                    <th>Nombre</th>
                                                    <th>Cedula o rif</th>
                                                    <th>telefono</th>
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
<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/cargar_cobrador.js"></script>
