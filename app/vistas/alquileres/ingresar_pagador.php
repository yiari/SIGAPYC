<?php 

include("layout/menuNavegacion.php"); 

?>
    <div class="container">

        <div class="card-header">
                <div style="text-align: right;">
                    <ol>               
                        <a class="btn btn-outline-secondary" href="index.php?url=app/vistas/alquileres/pagador"  role="button">Atras</a>
                    </ol>
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
                                             <input type="hidden" id="id_inqu" name="id_inqu" value='1'>
                                             <input type="hidden" id="tipo_persona" name=" tipo_persona" value='1'>

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
                                                            <input for="registroCedula" type="text" class="form-control" id="registroCedula" name="registroCedula" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="registroRif" class="col-sm-5 col-form-label">Rif:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroRif" name="registroRif">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="registroTelefono" class="col-sm-8 col-form-label">Teléfono local:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroTelefono" name="registroTelefono">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="registroCelular" class="col-sm-9 col-form-label">Celular:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroCelular" name="registroCelular">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="registroEmail" class="col-sm-3 col-form-label">Correo:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroEmail" name="registroEmail" >
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
                                                    <label for="ced_docu" class="col-sm-9 col-form-label">Cédula de Identidad</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="ced_dcpn" type="file" name="ced_docn">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Rif Personal</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="rif_dcpn" type="file" name="rif_docn"><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-12 col-form-label">Autorización del Propietario</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="aut_dcpn" type="file" name="rif_docn"><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="ref_docu" class="col-sm-12 col-form-label">Referencias Personales</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_dcpn1" type="file" name="ref_docn1">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_dcpn2" type="file" name="ref_docn2"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="fam_docu" class="col-sm-12 col-form-label">Referencias Familiares</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_dcpn1" type="file" name="fam_docn1">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_dcpn2" type="file" name="fam_docn2"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="fam_docu" class="col-sm-12 col-form-label">Referencias Bancarias</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ban_dcpn1" type="file" name="ban_dcpn1">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ban_dcpn2" type="file" name="ban_dcpn2"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="fam_docu" class="col-sm-12 col-form-label">Referencias Comerciales</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="com_dcpn1" type="file" name="com_dcpn1">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="com_dcpn2" type="file" name="com_dcpn2"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="ced_docu" class="col-sm-9 col-form-label">Referencia del Arrendandor Actual</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="arr_dcpn" type="file" name="ced_docn">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Contrato de Arrendamiento</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="are_dcpn" type="file" name="rif_docn"><br>
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
                                        <form class="form-sample" id="pag_juridico" name="pag_juridico" method="POST" action="guarda.php" autocomplete="off" enctype="multipart/form-data">

                                            
                                        <div class="row">
                                                        <div class="col-md-4">
                                                            <label class="col-sm-12 col-form-label">Nombre o Razón Social:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="nom_pagj" name="nom_pagj" autofocus  value='' >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="col-sm-12 col-form-label">Rif Jurídico:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="rif_pagj" name="rif_pagj"  value='' >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label class="col-sm-12 col-form-label">Actividad Comercial:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="act_pagj" name="act_pagj"  value='' >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <label class="col-sm-12 col-form-label">Dirección Fiscal:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="dir_pagj" name="dir_pagj"  value='' ><br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="col-sm-9 col-form-label">Celular:</label>
                                                            <div class="col-sm-12">
                                                                <input type="number" class="form-control" id="tel_pagj" name="tel_pagj"  value='' >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="col-sm-3 col-form-label">Correo:</label>
                                                            <div class="col-sm-12">
                                                                <input type="email" class="form-control" id="cor_pagj" name="cor_pagj"  value='' >
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
                                                            <label class="col-sm-12 col-form-label">Código:</label>
                                                            <div class="col-sm-12">
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control" id="cod_regi" name="cod_regi"  value='' >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <label for="ced_prop" class="col-sm-12 col-form-label">Nombre del Registro:</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control" id="nom_regi" name="nom_regi"  value='' >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="inputfecha" class="col-sm-12 col-form-label">Fecha:</label>
                                                            <div class="col-sm-12">
                                                                <input type="date" id="fec_regi" name="fec_regi" class="form-control"  value='' >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class="col-sm-12 col-form-label">Número:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="num_regi" name="num_regi"  value='' >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label class="col-sm-12 col-form-label">Tomo:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="tom_regi" name="tom_regi"  value='' >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="col-sm-12 col-form-label">Expediente:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="fol_regi" name="fol_regi"  value='' >
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
                                                            <label for="ced_docu" class="col-sm-9 col-form-label">Registro Mercantil</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control form-control-sm" id="reg_pagj" type="file" name="reg_pagj" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="rif_docu" class="col-sm-9 col-form-label">Acta Constitutiva</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control form-control-sm" id="act_conj" type="file" name="act_conj" value=""><br>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="ced_docu" class="col-sm-9 col-form-label">Acta de última Asamblea</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control form-control-sm" id="acu_pagj" type="file" name="acu_pagj" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="rif_docu" class="col-sm-9 col-form-label">Rif Personal</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control form-control-sm" id="rif_pagj" type="file" name="rif_pagj" value=""><br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="rif_docu" class="col-sm-12 col-form-label">Autorización del Propietario</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control form-control-sm" id="aut_pagj" type="file" name="aut_pagj" value=""><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <label for="ref_docu" class="col-sm-12 col-form-label text-center">Referencias Personales</label>
                                                                <div class="col-sm-6">
                                                                    <input class="form-control form-control-sm" id="ref_pagj1" type="file" name="ref_pagj1" value="">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input class="form-control form-control-sm" id="ref_pagj2" type="file" name="ref_pagj2" value=""><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <label for="fam_docu" class="col-sm-12 col-form-label text-center">Referencias Familiares</label>
                                                                <div class="col-sm-6">
                                                                    <input class="form-control form-control-sm" id="fam_pagj1" type="file" id="fam_pagj1" value="">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input class="form-control form-control-sm" id="fam_pagj2" type="file" id="fam_pagj2" value=""><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <label for="fam_docu" class="col-sm-12 col-form-label text-center">Referencias Bancarias</label>
                                                                <div class="col-sm-6">
                                                                    <input class="form-control form-control-sm" id="ban_dcpj1" type="file" name="ban_pagj1" value="">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input class="form-control form-control-sm" id="ban_pagj2" type="file" name="ban_pagj2" value=""><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <label for="fam_docu" class="col-sm-12 col-form-label text-center">Referencias Comerciales</label>
                                                                <div class="col-sm-6">
                                                                    <input class="form-control form-control-sm" id="com_dcpj1" type="file" name="com_dcpj1" value="">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input class="form-control form-control-sm" id="com_pagj2" type="file" name="com_pagj2" value=""><br>
                                                                </div>
                                                            </div>
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

            </div>

            <?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>

<script src="js/comunes/combos.js"></script>
<script src="js/comunes/generadorcodigos.js"></script>
<script src="js/alquileres/ingresar_pagador.js"></script>
            
        