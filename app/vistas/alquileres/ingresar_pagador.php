<?php 

include("layout/menuNavegacion.php"); 

?>
    <div class="container">

        <div class="card-header">
                <div style="text-align: right;">
                    <ol>               
                        <a class="btn btn-outline-secondary codinq atrasURL" href="index.php?url=app/vistas/alquileres/pagador"  role="button">Atras</a>
                    </ol>
                </div>

                <div style="text-align: left;">
                    <span id="lblinquilino"><strong>INQUILINO : </strong></span>
                         <br/><br/>
                </div>

            <h4 class="card-title">Pagador</h4>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-pagador-tab" data-bs-toggle="tab" data-bs-target="#nav-pagador" type="button" role="tab" aria-controls="nav-pagador" aria-selected="true">Pagador Natural</button>
                            <button class="nav-link" id="nav-juridica_paga-tab" data-bs-toggle="tab" data-bs-target="#nav-juridica_paga" type="button" role="tab" aria-controls="nav-juridica_paga" aria-selected="false">Pagador Jurídico</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-pagador" role="tabpanel" aria-labelledby="nav-pagador-tab">
                            <div class="col-12 grid-margin">

                                <!--natural-->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Personales</h5>
                                        <form class="form-sample" id="registrarpagador" name="registrarpagador" method="POST" action="guarda.php" autocomplete="off">
                                             
                                             <input type="hidden"  id="hidpagador" name="hidpagador" value='' >
                                             <input type="hidden" id="id_inqu" name="id_inqu" value=''>
                                             <input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                                             <input type="hidden" id="tipo_inquilino" name="tipo_inquilino" value='0'>

                                             <div class="col-md-5">
                                                <label  class="col-sm-12 col-form-label">Código pagador:</label>
                                                <div class="col-sm-12">
                                                    <input for="registroCodigo" type="text" class="form-control" id="registroCodigo" name="registroCodigo" autofocus readonly="yes" >
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
                                                        <input type="text" class="form-control" id="registroApellido" name="registroApellido" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <label for="registroNacionalidad" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-select" id="registroNacionalidad" name="registroNacionalidad" >
                                                                   <option selected disabled value=""></option>
                                                                    <option value="1">V</option>
                                                                    <option value="2">E</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input for="registroCedula" type="text" class="form-control" id="registroCedula" name="registroCedula" maxlength="8" >
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
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroEmail" name="registroEmail"  maxlength="45">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="cboEstados" class="col-sm-10 col-form-label">Estado:</label></br>
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
                                                        <input type="text" class="form-control" id="registroDirecionO" name="registroDirecionO"><br>
                                                    </div>
                                                </div>
                                            </div><br>

                                            <h5 class="card-title">Documentos Consignados</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="cedu_docu" class="col-sm-9 col-form-label">Cédula de Identidad</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="cedu_docu" type="file" name="cedu_docu">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Rif Personal</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="rif_docu" type="file" name="rif_docu"><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="autopro_docu" class="col-sm-12 col-form-label">Autorización del Propietario</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="autopro_docu" type="file" name="autopro_docu"><br>
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
                                                            <input or="refper_docu2" class="form-control form-control-sm" id="refper_docu2" type="file" name="refper_docu2"><br>
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
                                                            <input for="reffam_docu2" class="form-control form-control-sm" id="reffam_docu2" type="file" name="reffam_docu2"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="refban_docu" class="col-sm-12 col-form-label">Referencias Bancarias</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="refban_docu" type="file" name="refban_docu">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input for="refban_docu2" class="form-control form-control-sm" id="refban_docu2" type="file" name="refban_docu2"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="refcom_docu" class="col-sm-12 col-form-label">Referencias Comerciales</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="refcom_docu" type="file" name="refcom_docu">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input for="refcom_docu2" class="form-control form-control-sm" id="refcom_docu2" type="file" name="refcom_docu2"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="refarre_docu" class="col-sm-9 col-form-label">Referencia del Arrendandor Actual</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="refarre_docu" type="file" name="refarre_docu">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="conarre_docu" class="col-sm-9 col-form-label">Contrato de Arrendamiento</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="conarre_docu" type="file" name="conarre_docu"><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="col-12 btn btn-align-center"> 
                                                  <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-juridica_paga" role="tabpanel" aria-labelledby="nav-juridica_paga-tab">
                            <div class="col-12 grid-margin">

                                <!--Jurídico-->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Jurídicos</h5>
                                        <form class="form-sample" id="registropagadorj" name="registropagadorj" method="POST" action="guarda.php" autocomplete="off" enctype="multipart/form-data">
                                              
                                            <input type="hidden"  id="hidpagadorj" name="hidpagadorj" value='' >
                                             <input type="hidden" id="id_inquj" name="id_inquj" value=''>
                                             <input type="hidden" id="tipo_personaj" name=" tipo_personaj" value='2'>
                                             <input type="hidden" id="tipo_inquilinoj" name="tipo_inquilinoj" value='0'>

                                             <div class="col-md-5">
                                                <label  class="col-sm-12 col-form-label">Código pagador:</label>
                                                <div class="col-sm-12">
                                                    <input for="registroCodigoj" type="text" class="form-control" id="registroCodigoj" name="registroCodigoj" autofocus readonly="yes" >
                                                </div>
                                            </div>
                                            
                                               <div class="row">
                                                        <div class="col-md-4">
                                                            <label  for="registroNombrej" class="col-sm-12 col-form-label">Nombre o Razón Social:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="registroNombrej" name="registroNombrej" autofocus >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="registroRifj" class="col-sm-12 col-form-label">Rif Jurídico:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="registroRifj" name="registroRifj" maxlength="14">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="registroactividad"  class="col-sm-12 col-form-label">Actividad Comercial:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="registroactividad" name="registroactividad">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <label for="registroDirecionj" class="col-sm-12 col-form-label">Dirección Fiscal:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="registroDirecionj" name="registroDirecionj"><br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="registroCelularj" class="col-sm-9 col-form-label">Celular:</label>
                                                            <div class="col-sm-12">
                                                                <input type="number" class="form-control" id="registroCelularj" name="registroCelularj" maxlength="11">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label  for="registroEmailj" class="col-sm-3 col-form-label">Correo:</label>
                                                            <div class="col-sm-12">
                                                                <input type="email" class="form-control" id="registroEmailj" name="registroEmailj" >
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!--info_registro-->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="col text-center">
                                                        <h5 class="card-title">Información del Registro</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <label  for="registroPoder" class="col-sm-12 col-form-label">Código:</label>
                                                            <div class="col-sm-12">
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control" id="registroPoder" name="registroPoder" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <label for="nombreRegistro" class="col-sm-12 col-form-label">Nombre del Registro:</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control" id="nombreRegistro" name="nombreRegistro">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="fechaRegistro" class="col-sm-12 col-form-label">Fecha:</label>
                                                            <div class="col-sm-12">
                                                                <input type="date" id="fechaRegistro" name="fechaRegistro" class="form-control" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label for="numeroRegistro" class="col-sm-12 col-form-label">Número:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="numeroRegistro" name="numeroRegistro" maxlength="11">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label for="tomoRegistro" class="col-sm-12 col-form-label">Tomo:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="tomoRegistro" name="tomoRegistro" maxlength="11">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="foliRegistro" class="col-sm-12 col-form-label">Expediente:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="foliRegistro" name="foliRegistro" maxlength="11">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                            
                                            <!--Documentos-->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="col text-center">
                                                        <h5 class="card-title">Documentos Consignados</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="regmen_docu" class="col-sm-9 col-form-label">Registro Mercantil</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control form-control-sm" id="regmen_docu" type="file" name="regmen_docu" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="actcons_docu" class="col-sm-9 col-form-label">Acta Constitutiva</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control form-control-sm" id="actcons_docu" type="file" name="actcons_docu"><br>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="actultasam_docu" class="col-sm-9 col-form-label">Acta de última Asamblea</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control form-control-sm" id="actultasam_docu" type="file" name="actultasam_docu">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="rif_docu" class="col-sm-9 col-form-label">Rif Personal</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control form-control-sm" id="rif_docu" type="file" name="rif_docu"><br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="autopro_docu" class="col-sm-12 col-form-label">Autorización del Propietario</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control form-control-sm" id="autopro_docu" type="file" name="autopro_docu"><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <label for="refper_docu" class="col-sm-12 col-form-label text-center">Referencias Personales</label>
                                                                <div class="col-sm-6">
                                                                    <input class="form-control form-control-sm" id="refper_docu" type="file" name="refper_docu" value="">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input for="refper_docu2" class="form-control form-control-sm" id="refper_docu2" type="file" name="refper_docu2" value=""><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <label for="reffam_docu" class="col-sm-12 col-form-label text-center">Referencias Familiares</label>
                                                                <div class="col-sm-6">
                                                                    <input class="form-control form-control-sm" id="reffam_docu" type="file" id="reffam_docu" value="">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input for="reffam_docu2" class="form-control form-control-sm" id="reffam_docu2" type="file" id="reffam_docu2" value=""><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <label for="refban_docu" class="col-sm-12 col-form-label text-center">Referencias Bancarias</label>
                                                                <div class="col-sm-6">
                                                                    <input class="form-control form-control-sm" id="refban_docu" type="file" name="refban_docu">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input for="refban_docu2" class="form-control form-control-sm" id="refban_docu2" type="file" name="refban_docu2" value=""><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <label for="refcom_docu" class="col-sm-12 col-form-label text-center">Referencias Comerciales</label>
                                                                <div class="col-sm-6">
                                                                    <input class="form-control form-control-sm" id="refcom_docu" type="file" name="refcom_docu">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input for="refcom_docu2" class="form-control form-control-sm" id="refcom_docu2" type="file" name="refcom_docu2" value=""><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
   
                                            <div class="container">
                                                <div class="col-12 btn btn-align-center">
                                                     
                                                    <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
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
<script src="js/alquileres/ingresar_pagador.js"></script>
<script src="js/alquileres/ingresar_pagador_juridico.js"></script>
            
        