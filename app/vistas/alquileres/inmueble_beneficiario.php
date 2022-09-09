<?php include("layout/menuNavegacion.php"); ?>

<div class="container">
   

        <div style="text-align: right;">
        
        </div>
        
        <!--tabla-->

        <div class="card-header">
                <input type="hidden" id="resuma" value="0">
                
                <div style="text-align: right;">
                    <ol>
                                           
                            <a class="btn btn-outline-secondary codpro" href="index.php?url=app/vistas/alquileres/inmuebles"  role="button">Atras</a>
                    </ol>
                </div>

                <div style="text-align: left;">
                    <span id="lblPropietario"><strong>PROPIETARIO : </strong></span>
                    <br/><br/>
                    <span id="lblInmueble"><strong>INMUEBLE SELECCIONADO : </strong></span>
                    <br/><br/>
                </div>

                <form method="POST" id="registrarbeneficiario">

                    <input type="hidden"  id="id_propietario" name="id_propietario" value="0">
                    <input type="hidden"  id="id_inmueble" name="id_inmueble" value="0">
                    <input type="hidden"  id="id_unidad" name="id_unidad" value="0">
               
        
        <!--tabla-->
                                <div class="card mb-4">
                                    <div class="card-header">
                                    <i class="fa-solid fa-city"></i>&nbsp;
                                        BENEFICIARIOS - INMUEBLES
                                    </div>
                                    <div class="card-body">
                                        <table id="datosBeneficiario" class="tabla_custom">
                                            <thead>
                                                <tr>
                                                    <th style="width: 40%;">Codigo</th>
                                                    <th style="width: 40%;">Nombre</th>
                                                    <th style="width: 15%;">Porcentajes</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>

                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                    </form>
        </div>
   

</div>
<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/inmueble_beneficiario.js"></script>
