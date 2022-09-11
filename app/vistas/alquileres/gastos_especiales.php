
<?php include("layout/menuNavegacion.php"); ?>

<div class="container">
        <h2 class=" text-center">REGISTRO DE GASTOS ESPECILAES</h2><br>

    <div class="row">

        <div class="card">
            <div class="card-body">

                    <div class="col-sm-12">
                        <span id="mensaje">&nbsp;</span>
                    </div>


                    <form class="form-sample" id="buscarCodigo" name="buscarCodigo" method="POST" action="" autocomplete="on">
                            
                          <input type="hidden" id="hidUsuario" name="hidUsuario" value="0">


                            <div class="card-body"> 
                                        <div class="col text-center">
                                            <h5 class="card-title">Datos del Generales</h5>
                                        </div><br>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-sm-12 col-form-label">Buscar Código inmueble o propietario:</label>
                                            </div>
                                        
                                            <div class="col-md-4">
                                                    <input type="text" class="form-control" id="nom_prop" name="nom_prop">
                                            </div>
                                            <br>
                                            <div class="col-md-2">
                                                    <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                                            </div>                       
                                        </div>

                                    
                                    
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="datosAsignarInmueble">
                                                    <thead>
                                                            <tr>
                                                                <th>Propietario</th>
                                                                <th>Tipo</th>
                                                                <th>Inmueble</th>
                                                                <th>Unidad</th>
                                                                <th>Opcion</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                            </table>
                                        </div><br>
                                    
                          

                            <div class="row">
                                    
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="registroGasto" class="mr-sm-2">Concepto:</label>
                                            <input type="text" class="form-control form-control-user" placeholder="concepto" id="registroGasto" name="registroGasto">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="registroMonto" class="mr-sm-2">Monto:</label>
                                            <input type="text" class="form-control form-control-user" placeholder="monto" id="registroMonto" name="registroMonto">
                                    </div>

                                    
                            </div>
                       </div>
                            


                            </br>
                            <div class="col-12 btn btn-align-center">
                                <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                                <button type="button" class="btn btn-danger mb-2 cancelar" style="display:none;">Cancelar</button>
                            </div>
                    </form> 

            </div>
        </div>
    </div>




            <div class="card-body">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                                <div class="table-responsive">
                                <table class="table table-striped" id="tblUsuarios">
                                        <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Email</th>
                                                <th>Fecha</th>
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


<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>

<script src="js/comunes/combos.js"></script>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/gastos_especiles.js"></script>
