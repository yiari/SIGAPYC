
<?php 

include("layout/menuNavegacion.php"); 

?>

<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
                    <ol>               
                        <a class="btn btn-outline-secondary" href="index.php?url=app/vistas/alquileres/inquilinos"  role="button">Atras</a>
                    </ol>
                </div>

            <h4 class="card-title">Inquilinos</h4>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-inq_natural-tab" data-bs-toggle="tab" data-bs-target="#nav-inq_natural" type="button" role="tab" aria-controls="nav-inq_natural" aria-selected="true">Persona Natural</button>
                        <button class="nav-link" id="nav-inq_juridico-tab" data-bs-toggle="tab" data-bs-target="#nav-inq_juridico" type="button" role="tab" aria-controls="nav-inq_juridico" aria-selected="false">Persona Jurídica</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-inq_natural" role="tabpanel" aria-labelledby="nav-inq_natural-tab">
                        <div class="col-12 grid-margin">
                            <!--inq_natural-->
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-sample" id="registroinquilino" name="registroinquilino" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                                         
                                        <input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                                        <input type="hidden" id="hidinquilino" name="hidinquilino" value=''>
                                        <!--<input type="hidden" id="registroCodigo" name="registroCodigo" value='0001'>-->

                                        <!--Datos Personales-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos del Inquilino Natural</h5>
                                                </div>

                                                <div class="col-md-5">
                                                        <label class="col-sm-12 col-form-label">Código Propietario:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroCodigo" type="text" class="form-control" id="registroCodigo" name="registroCodigo" autofocus readonly="yes" >
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="col-sm-3 col-form-label">Nombre:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroNombre" type="text" class="form-control" id="registroNombre" name="registroNombre" autofocus >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-3 col-form-label">Apellido:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroApellido" type="text" class="form-control" id="registroApellido" name="registroApellido">
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
                                                                <input for="registroCedula" type="text" class="form-control" id="registroCedula" name="registroCedula" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="col-sm-5 col-form-label">Rif:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroRif" type="text" class="form-control" id="registroRif" name="registroRif">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-8 col-form-label">Teléfono local:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroTeléfono" type="text" class="form-control" id="registroTeléfono" name="registroTeléfono">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-9 col-form-label">Celular:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroCelular" type="text" class="form-control" id="registroCelular" name="registroCelular">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-sm-3 col-form-label">Correo:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroEmail" type="email" class="form-control" id="registroEmail" name="registroEmail">
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
                                                        <label class="col-sm-10 col-form-label">Dirección de habitación:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroDirecionH" type="text" class="form-control" id="registroDirecionH" name="registroDirecionH">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-sm-10 col-form-label">Dirección de oficina:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroDirecionO" type="text" class="form-control" id="registroDirecionO" name="registroDirecionO"><br>
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
                                                        <label for="ced_docu" class="col-sm-9 col-form-label">Cédula de Identidad</label>
                                                        <div class="col-sm-12">
                                                            <input type="file" class="form-control form-control-sm" id="ced_docu" name="ced_docu">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="rif_docu" class="col-sm-9 col-form-label">Rif Personal</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="rif_docu" type="file" name="rif_docu" value=""><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="ref_docu" class="col-sm-12 col-form-label text-center">Referencias Personales</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="ref_docu1" type="file" name="ref_docu1" value="">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="ref_docu2" type="file" name="ref_docu2" value=""><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="reffam_docu" class="col-sm-12 col-form-label text-center">Referencias Familiares</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="reffam_docu" type="file" name="reffam_docu" value="">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="reffam_docu2" type="file" name="reffam_docu2" value=""><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="refban_docu" class="col-sm-12 col-form-label text-center">Referencias Bancarias</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="refban_docu" type="file" name="refban_docu" value="">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="refban_docu2" type="file" name="refban_docu2" value=""><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="refcom_docu" class="col-sm-12 col-form-label text-center">Referencias Comerciales</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="refcom_docu" type="file" name="refcom_docu" value="">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="refcom_docu2" type="file" name="refcom_docu2" value=""><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="refarre_docu" class="col-sm-9 col-form-label text-center">Referencia del Arrendandor actual</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="refarre_docu" type="file" name="refarre_docu" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="conarre_docu" class="col-sm-9 col-form-label text-center">Contrato de Arrendamiento actual</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="conarre_docu" type="file" name="conarre_docu" value=""><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

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

                    <div class="tab-pane fade" id="nav-inq_juridico" role="tabpanel" aria-labelledby="nav-inq_juridico-tab">
                        <div class="col-12 grid-margin">

                            <!--Jurídico-->
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-sample" id="registroinquilinoj" name="registroinquilinoj" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                                        
                                         <input type="hidden" id="tipo_personaj" name="tipo_personaj" value='2'>
                                        <input type="hidden" id="hidinquilinoj" name="hidinquilinoj" value=''>

                                        <!--Informacion Personal-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos del Inquilino Jurídico</h5>
                                                </div>
                                                <div class="col-md-5">
                                                        <label class="col-sm-12 col-form-label">Código Propietario:</label>
                                                        <div class="col-sm-12">
                                                            <input  for="" type="text" class="form-control" id="registroCodigoj" name="registroCodigoj" autofocus readonly="yes" >
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="col-sm-12 col-form-label">Nombre o Razón Social:</label>
                                                        <div class="col-sm-12">
                                                            <input  for="registroNombrej" type="text" class="form-control" id="registroNombrej" name="registroNombrej" autofocus>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-sm-12 col-form-label">Rif Jurídico:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroRifj" type="text" class="form-control" id="registroRifj" name="registroRifj" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="col-sm-12 col-form-label">Actividad Comercial:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroactividad" type="text" class="form-control" id="registroactividad" name="registroactividad">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label  class="col-sm-12 col-form-label">Dirección Fiscal:</label>
                                                        <div class="col-sm-12">
                                                            <input  for="registroDirecionj" type="text" class="form-control" id="registroDirecionj" name="registroDirecionj"><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-sm-9 col-form-label">Celular:</label>
                                                        <div class="col-sm-12">
                                                            <input  for="registroCelularj" type="text" class="form-control" id="registroCelularj" name="registroCelularj">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-3 col-form-label">Correo:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroEmailj" type="email" class="form-control" id="registroEmailj" name="registroEmailj" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <!--info_registro-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Información del Registro</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Código:</label>
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-12">
                                                                <input for="registroPoder" type="text" class="form-control" id="registroPoder" name="registroPoder" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <label for="ced_prop" class="col-sm-12 col-form-label">Nombre del Registro:</label>
                                                            <div class="col-sm-12">
                                                                <input for="nombreRegistro" type="text" class="form-control" id="nombreRegistro" name="nombreRegistro" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="inputfecha" class="col-sm-12 col-form-label">Fecha:</label>
                                                        <div class="col-sm-12">
                                                            <input for="fechaRegistro" type="date" id="fechaRegistro" name="fechaRegistro" class="form-control"d>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Número:</label>
                                                        <div class="col-sm-12">
                                                            <input for="numeroRegistro" type="text" class="form-control" id="numeroRegistro" name="numeroRegistro">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Tomo:</label>
                                                        <div class="col-sm-12">
                                                            <input for="tomoRegistro" type="text" class="form-control" id="tomoRegistro" name="tomoRegistro" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-12 col-form-label">Expediente:</label>
                                                        <div class="col-sm-12">
                                                            <input for="foliRegistro"  type="text" class="form-control" id="foliRegistro" name="foliRegistro" >
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
                                                            <input class="form-control form-control-sm" id="regmen_docu" type="file" name="regmen_docu" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="act_icon" class="col-sm-9 col-form-label">Acta Constitutiva</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="act_icon" type="file" name="act_icon" value=""><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="actcons_docu" class="col-sm-9 col-form-label">Acta de última Asamblea</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="actcons_docu" type="file" name="actcons_docu" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="rif_docu" class="col-sm-9 col-form-label">Rif Empresa</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="rif_docu" type="file" name="rif_docu" value=""><br>
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
                                                                <input class="form-control form-control-sm" id="refper_docu2" type="file" name="refper_docu2" value=""><br>
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
                                                                <input class="form-control form-control-sm" id="reffam_docu2" type="file" id="reffam_docu2" value=""><br>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <label for="refban_docu" class="col-sm-12 col-form-label text-center">Referencias Bancarias</label>
                                                                    <div class="col-sm-6">
                                                                        <input class="form-control form-control-sm" id="refban_docu" type="file" name="refban_docu" value="">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input class="form-control form-control-sm" id="refban_docu2" type="file" name="refban_docu2" value=""><br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <label for="refcom_docu" class="col-sm-12 col-form-label text-center">Referencias Comerciales</label>
                                                                    <div class="col-sm-6">
                                                                        <input class="form-control form-control-sm" id="refcom_docu" type="file" name="refcom_docu" value="">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input class="form-control form-control-sm" id="refcom_docu2" type="file" name="refcom_docu2" value=""><br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="refarre_docu" class="col-sm-9 col-form-label text-center">Referencia del Arrendandor actual</label>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control form-control-sm" id="refarre_docu" type="file" name="refarre_docu" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="conarre_docu" class="col-sm-9 col-form-label text-center">Contrato de Arrendamiento actual</label>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control form-control-sm" id="conarre_docu" type="file" name="conarre_docu" value=""><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

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
        <script src="js/alquileres/ingresar_inquilino_juridico.js"></script>
        <script src="js/alquileres/ingresar_inquilinos.js"></script>