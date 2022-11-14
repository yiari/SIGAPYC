
<?php 

include("layout/menuNavegacion.php"); 

?>



<div class="container">

        <div class="card-header">

             <div style="text-align: right;">
                        <ol>          
                            <a class="btn btn-outline-secondary codpro atrasURL" href="index.php?url=app/vistas/alquileres/representante"  role="button">Atras</a>
                        </ol>
                </div>

              
                <h4 class="card-title">Datos del Representante Lega</h4>

                <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-repr_natural-tab" data-bs-toggle="tab" data-bs-target="#nav-repr_natural" type="button" role="tab" aria-controls="nav-repr_natural" aria-selected="true">Representante</button>
                           
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-repr_natural" role="tabpanel" aria-labelledby="nav-repr_natural-tab">
                            <div class="col-12 grid-margin">

                                <!--repr_natural-->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Personales</h5>
                                       
                                        <form class="form-sample" id="registrarrepresentante" name="registrarrepresentante" method="POST" action="guarda.php" autocomplete="off" enctype="multipart/form-data">
                                             
                                            <input type="hidden"  id="hidrepresentante" name="hidrepresentante" value='' >
                                             <input type="hidden" id="id_prop" name="id_prop" value=''>
                                             <input type="hidden" id="tipo_persona" name=" tipo_persona" value='2'>
                                            

                                             <div class="col-md-5">
                                                <label  class="col-sm-12 col-form-label">Código representante:</label>
                                                <div class="col-sm-12">
                                                    <input for="registroCodigo" type="text" class="form-control" id="registroCodigo" name="registroCodigo" autofocus readonly="yes" >
                                                </div>
                                            </div>
                                            
                                             <div class="row">
                                                <div class="col-md-4">
                                                    <label  for="registroNombre" class="col-sm-3 col-form-label">Nombre:</label>
                                                    <div class="col-sm-12">
                                                        <input  type="text" class="form-control" id="registroNombre" name="registroNombre">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="registroApellido" class="col-sm-3 col-form-label">Apellido:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroApellido" name="registroApellido" >
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
                                                            <input  for="registroCedula" type="text" class="form-control" id="registroCedula" name="registroCedula" maxlength="8">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="registroRif" class="col-sm-5 col-form-label">Rif:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroRif" name="registroRif" maxlength="14">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="registroTelefono"  class="col-sm-8 col-form-label">Teléfono local:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroTelefono" name="registroTelefono" maxlength="11" >
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
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroEmail" name="registroEmail" maxlength="45">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="" for="cboEstados" class="col-sm-10 col-form-label">Estado:</label></br>
                                                        <div class="col-sm-12">
                                                            <select class="form-control"  id="cboEstados" name="cboEstados"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="cboMunicipios" class="col-sm-10 col-form-label">Municipio:</label></br>
                                                        <div class="col-sm-12">
                                                            <select class="form-control"  id="cboMunicipios" name="cboMunicipios"></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="cboParroquia" class="col-sm-10 col-form-label">Parroquia:</label></br>
                                                        <div class="col-sm-12">
                                                            <select class="form-control"  id="cboParroquia" name="cboParroquia"></select>
                                                        </div>
                                                    </div>
  
                                                </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="registroDirecionH" class="col-sm-10 col-form-label">Dirección de habitación:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroDirecionH" name="registroDirecionH" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="registroDirecionO" class="col-sm-10 col-form-label">Dirección de oficina:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroDirecionO" name="registroDirecionO" ><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title al">Información del Registro</h5>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <label for="cod_regi" class="col-sm-12 col-form-label">Código:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cod_regi" name="cod_regi" maxlength="11" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="not_regi" class="col-sm-12 col-form-label">Nombre del Registro:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="not_regi" name="not_regi" >
                                                    </div>
                                                </div>
                                              
                                                <div class="col-md-2">
                                                    <label for="fec_regi" class="col-sm-12 col-form-label">Fecha:</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control" id="fec_regi" name="fec_regi" maxlength="11"><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="num_regi" class="col-sm-12 col-form-label">Número:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="num_regi" name="num_regi" maxlength="11"><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="tom_regi" class="col-sm-9 col-form-label">Tomo:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="tom_regi" name="tom_regi" ><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="fol_regi" class="col-sm-9 col-form-label">Expediente:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="fol_regi" name="fol_regi" maxlength="11"><br>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            

                                            <h5 class="card-title">Documentos Consignados</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="cedu_docu" class="col-sm-9 col-form-label">Cédula de Identidad</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="cedu_docu" type="file" name="cedu_docu" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Rif Personal</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="rif_docu" type="file" name="rif_docu" ><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="regmen_docu" class="col-sm-12 col-form-label">Registros</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="regmen_docu" type="file" name="regmen_docu" ><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="refper_docu" class="col-sm-12 col-form-label">Referencias Personales</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="refper_docu" type="file" name="refper_docu">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="refper_docu2" type="file" name="refper_docu2"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="reffam_docu" class="col-sm-12 col-form-label">Referencias Familiares</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="reffam_docu" type="file" name="reffam_docu">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="reffam_docu2" type="file" name="reffam_docu2"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 btn btn-align-center">
                                          
                                            <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                                        
                                             </div>
                                        </form>

                                       
                                    </div>
                                </div>
                            </div>
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


<script src="js/comunes/combos.js"></script>
<script src="js/comunes/generadorcodigos.js"></script>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/editar_representante.js"></script>