

<?php include("layout/menuNavegacion.php"); ?>


<div class="container">
   
       <div class="card-header">
            <i class="fa fa-users"></i>&nbsp;
              TASA DE CAMBIO DEL BCV

        <div class="tab-pane fade show active" id="nav-local" role="tabpanel" aria-labelledby="nav-local-tab">
            <div class="col-6 grid-margin">
                <!--local-->
                <div class="card">
                    <div class="card-body">
                        <form class="form-sample" id="tasacambio" name="tasacambio" method="POST"  autocomplete="off" enctype="multipart/form-data">
                        
                        <input type="hidden" id="hidcambio" name="hidcambio" value="">
                        <input type="hidden" id="id_usuario" name="id_usuario" value="1">
                        <input type="hidden" id="id_historial" name="id_historial" value="">

                            <!--Datos del Representante legal-->
                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="row">
                                       
                                        <div class="col-md-4">
                                            <label for="registroMonto" class="col-sm-12 col-form-label">Promedio Bs / $:</label>
                                            
                                        </div>

                                        <div class="col-md-5">
                                            
                                            <input type="text" class="form-control" id="registroMonto" name="registroMonto" >
                                        </div>
       
                                    </div>

                                   
                                    
                                </div>
                            </div><br>

                           
                            <div class="container">
                                <div class="col-12 btn btn-align-center">
                                    <button class="btn btn-primary" type="submit" >Guardar</button>

                                </div>
                            </div>
                        </form>
                       
                    </div>
                    
                </div>
                <br>
            </div>
        </div>
    </div>
  </div>





<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>

<script src="js/alquileres/tasa_cambio.js"></script>