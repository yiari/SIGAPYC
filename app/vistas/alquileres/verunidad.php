<?php 


include("layout/menuNavegacion.php"); 


?>


<div class="container">

    
        
        <h4 class="card-title">BITACORA DE LA UNIDAD </h4>
      
        <div class="card-header">


            <div style="text-align: right;">
               
                         <ol>          
                            <a class="btn btn-outline-secondary " href="index.php?url=app/vistas/alquileres/propietarios"  role="button">Atras</a>
                            <a href="app/reportes/repfichaunidad.php" target="_blank" class="btn btn-outline-secondary codinmu" href="reportes.php" role="button"><i class="fa fa-file-pdf-o" alt=“PDF” ></i> Imprimir</a>
                         </ol>
            </div>
            <div class="tab-content" id="nav-tabContent">

                    <div class="col-12 grid-margin">
                        <!--datos_generales-->
                        <div class="card">
                            <div class="card-body">
                                <form class="form-sample" id="registrarpropietario" name="registrarpropietario" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                                        
                                        <input type="hidden" id="id_usuario" name="id_usuario" value='1'>

                                         <input type="hidden" id="hidinmuebles" name="hidinmuebles" value=''>
                                         
                                        
                                <!--Datos del propietario-->
                                <div class="card" id="Propietario">
                                    <div class="card-body">
                                        <div class="col text-center">
                                            <h5 class="card-title">Datos del Personales</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="col-sm-12 col-form-label">Código:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="registroCodigo" name="registroCodigo" autofocus readonly="yes" value=''>
                                                </div>
                                            </div>
     
                                        </div>
                                       
                                    </div>
                                </div><br>

                                <!--datos bancarios-->
                                
                            </div>
                        </div>
                    
                </div>
                <from>
                    <br>

               
                            <div class="card mb-4">
                                        <div class="card-header">
                                        <i class="fa-solid fa-city"></i>&nbsp;
                                            CONTRATOS
                                        </div>
                                        <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="datosContratoinquilino" class="display compact">
                                                <thead>
                                                    <tr>
                                                        
                                                        
                                                        <th>Contrato</th>
                                                        <th>Inmueble</th>
                                                        <th>Unidad</th>
                                                        <th>Propietario</th>
                                                        <th>Canon</th>
                                                        <th>Desde</th>
                                                        <th>Hasta</th>
                                                      
                                                

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



<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>

<script src="js/comunes/combos.js"></script>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/bitacora_unidad.js"></script>