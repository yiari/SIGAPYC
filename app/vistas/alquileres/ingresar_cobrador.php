<?php include("layout/menuNavegacion.php"); ?>
    
    <div class="container">

         <div class="card-header">
                 <div style="text-align: right;">
                        <ol>          
                            <a class="btn btn-outline-secondary" href="index.php?url=app/vistas/alquileres/cobrador"  role="button">Atras</a>
                        </ol>
                    </div>

                     <h4 class="card-title">Cobrador</h4>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-bene_natural-tab" data-bs-toggle="tab" data-bs-target="#nav-bene_natural" type="button" role="tab" aria-controls="nav-bene_natural" aria-selected="true">Cobrador</button>
                            <!--<button class="nav-link" id="nav-juridica_bene-tab" data-bs-toggle="tab" data-bs-target="#nav-juridica_bene" type="button" role="tab" aria-controls="nav-juridica_bene" aria-selected="false">Beneficiario Jurídico</button>-->
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-bene_natural" role="tabpanel" aria-labelledby="nav-bene_natural-tab">
                            <div class="col-12 grid-margin">

                                <!--bene_natural-->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Personales</h5>

                                        <form class="form-sample" id="registrarcobrador" name="registrarcobrador" method="POST" action="guarda.php" autocomplete="off" enctype="multipart/form-data">
                                                
                                                <input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                                                <input type="hidden" id="hidcobrador" name="hidcobrador" value=''>
                                              
                                   

                                                <div class="col-md-5">
                                                        <label for="registroCodigo" class="col-sm-12 col-form-label">Código Cobrador:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="registroCodigo" name="registroCodigo" autofocus readonly="yes" >
                                                        </div>
                                                </div>
                                            
                                             <div class="row">
                                                <div class="col-md-4">
                                                    <label for="registroNombre" class="col-sm-3 col-form-label">Nombre:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroNombre" name="registroNombre" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="registroApellido" class="col-sm-3 col-form-label">Apellido:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroApellido" name="registroApellido">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <label for="registroNacionalidad" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-select" id="registroNacionalidad" name="registroNacionalidad">
                                                                <option selected disabled value=""></option>
                                                                <option value="1">V</option>
                                                                <option value="2">E</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input for="registroCedula"  type="text" class="form-control" id="registroCedula" name="registroCedula" maxlength="11" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="registrorif" class="col-sm-5 col-form-label">Rif:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registrorif" name="registrorif" maxlength="14">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="registroTelefono" class="col-sm-8 col-form-label">Teléfono local:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroTelefono" name="registroTelefono" maxlength="11">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="registroCelular" class="col-sm-9 col-form-label">Celular:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroCelular" name="registroCelular" maxlength="11">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="registroEmail" class="col-sm-3 col-form-label">Correo:</label>
                                                    <div class="input-group ">
                                                        <span class="input-group-text" >@</span>
                                                        <input type="text" class="form-control" id="registroEmail"  name="registroEmail" >
                                                       
                                                </div>


                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="registroDirecionH" class="col-sm-10 col-form-label">Dirección de habitación:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroDirecionH" name="registroDirecionH">
                                                    </div>
                                                </div>
                                               
                                            </div>

    

                                            <div class="container">
                                                    <div class="col-12 btn btn-align-center">

                                                        <button type="submit" class="btn btn-primary">Guardar</button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                     </div>
                  </div>
                <div>
               
            </div>
        </div>


        
<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>

<script src="js/comunes/combos.js"></script>
<script src="js/comunes/generadorcodigos.js"></script>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/ingresar_cobrador.js"></script>
