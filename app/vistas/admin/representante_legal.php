<div class="container">
    <h4 class="card-title">Representante Legal de la Administradora</h4>
    
    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-local" role="tabpanel" aria-labelledby="nav-local-tab">
            <div class="col-12 grid-margin">
                <!--local-->
                <div class="card">
                    <div class="card-body">
                        <form class="form-sample" id="registrrepresentante" name="registrrepresentante" method="POST"  autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" id="hidlegal" name="hidlegal" value="0">

                            <!--Datos del Representante legal-->
                            <div class="card" id="Propietario">
                                <div class="card-body">
                                    <div class="col text-center">
                                        <h5 class="card-title">Datos del Representante</h5>
                                    </div>
                                    <div class="row">
                                       
                                        <div class="col-md-3">
                                            <label for="registroNombre" class="col-sm-12 col-form-label">Nombre:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="registroNombre" name="registroNombre" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="registroApellido" class="col-sm-12 col-form-label">Apellido:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="registroApellido" name="registroApellido" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="registroCedula" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="registroCedula" name="registroCedula">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="registroRif" class="col-sm-5 col-form-label">Rif:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="registroRif" name="registroRif">
                                                </div>
                                            </div>  
                                       </div>
                                        
                                    </div>
                                    
                                </div>
                            </div><br>

                           
                            <div class="container">
                                <div class="col-12 btn btn-align-center">
                                    <button class="btn btn-primary" type="submit" >Guardar</button>
                                    <button type="button" class="btn btn-danger cancelar" style="display:none;">Cancelar</button>

                                </div>
                            </div>
                        </form>
                       
                    </div>
                    
                </div>
                <br>
            </div>
        </div>
    </div>

    <hr size="2" width="100%" />


<div class="row">

<div class="card">
  <div class="card-body">

        <div class="table-responsive">
        <table class="table table-striped" id="tblrepresentante">
                <thead>
                        <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Rif</th>
                        <th>Cedula</th>
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




<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>

<script src="js/admin/representante_legal.js"></script>