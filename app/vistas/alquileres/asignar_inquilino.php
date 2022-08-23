<?php 

include("layout/menuNavegacion.php"); 

?>

<div class="container">

    <div class="card-header">
            
                    <div style="text-align: right;">
                        <ol>          
                            <a class="btn btn-outline-secondary codpro" href="index.php?url=app/vistas/alquileres/inmuebles"  role="button">Atras</a>
                        </ol>
                    </div>

                <div style="text-align: left;">
                    <span id="lblAviso"><strong>PROPIETARIO : </strong></span>
                    <br/><br/>
                </div>

           <h4 class="card-title">Inquilino</h4><br>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-Inmueble-tab" data-bs-toggle="tab" data-bs-target="#nav-Inmueble" type="button" role="tab" aria-controls="nav-edificio" aria-selected="true">Inmueble</button>
                </div>
            </nav>

            <form class="form-sample" id="buscarPropietario" name="buscarPropietario" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                 <!--Datos del propietario-->
                <div class="card" id="Propietario">
                                
                <div class="card-body">
                    <div class="col text-center">
                        <h5 class="card-title">Datos del inquilino</h5>
                    </div>
                </br>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="col-sm-12 col-form-label">Buscar Código inquilino:</label>
                        </div>
                    
                        <div class="col-md-4">
                                <input type="text" class="form-control" id="nom_prop" name="nom_prop">
                            
                        </div>

                        <div class="col-md-2">
                                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                        </div>
                        
                    </div>
                </br>
                    <div class="row">
                        
                        <div class="col-md-3">
                            <label class="col-sm-12 col-form-label">Nombre:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nom_prop" name="nom_prop" readonly="yes">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm-12 col-form-label">Apellido:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="ape_prop" name="ape_prop" readonly="yes">
                            </div>
                        </div>
                        <div class="col-md-3">
                                <label for="ced_prop" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="ci_prop" name="ci_prop" readonly="yes">
                                </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="col-sm-8 col-form-label">Teléfono local:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="loc_prop" name="loc_prop" readonly="yes">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="col-sm-9 col-form-label">Celular:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="cel_prop" name="cel_prop" readonly="yes">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-sm-3 col-form-label">Correo:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="cor_prop" name="cor_prop" readonly="yes">
                            </div>
                        </div>
                    </div>
                </div>
                </div><br>
                <div class="container">
                    <div class="col-12 btn btn-align-center">
                    
                        <button type="submit" class="btn btn-primary mb-2">Asignar</button>
                
                    </div>
                </div>  
            </form>

               
        
    </div>
    
</div>
<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>

<script src="js/comunes/combos.js"></script>
<script src="js/comunes/generadorcodigos.js"></script>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/ingresar_inmuebles.js"></script>




