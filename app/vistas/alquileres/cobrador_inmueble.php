<?php 

include("layout/menuNavegacion.php"); 

?>

<div class="container">
    <div class="card-header">
                    <div style="text-align: right;">
                       
                    </div>


                    <div style="text-align: left;">
                        <span id="lblcobrador"><strong>COBRADOR : </strong></span>
                         <br/><br/>
                    </div>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-inq_natural" role="tabpanel" aria-labelledby="nav-inq_natural-tab">
                        <div class="col-12 grid-margin">
                            <!--inq_natural-->

                        <h4 class="card-title">Inmuebles Asignados al Cobrador</h4>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="InmuebleCobrador">
                                                <thead>
                                                        <tr>
                                                        <th>Cobrador</th>
                                                        <th>Inmueble</th>
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
                
                </div>
            </div>
        </div>
<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/asignar_inmueble.js"></script>