
<?php 

include("layout/menuNavegacion.php"); 


?>


<div class="container">
    <div class="card-header">

                <div style="text-align: right;">
                        <ol>          
                            <a class="btn btn-outline-secondary atrasURL" href="index.php?url=app/vistas/alquileres/propietarios"  role="button">Atras</a>
                        </ol>
                </div>

            <h4 class="card-title">Propietarios</h4>


                 
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link " id="nav-prop_natural-tab" data-bs-toggle="tab" data-bs-target="#nav-prop_natural" type="button" role="tab" aria-controls="nav-prop_natural" aria-selected="true">Persona Natural</button>
                        <button class="nav-link" id="nav-prop_juridico-tab" data-bs-toggle="tab" data-bs-target="#nav-prop_juridico" type="button" role="tab" aria-controls="nav-prop_juridico" aria-selected="false">Persona Jurídica</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="nav-prop_natural" role="tabpanel" aria-labelledby="nav-prop_natural-tab">
                        <div class="col-12 grid-margin">
                            <!--prop_natural-->
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-sample" id="registrarpropietario" name="registrarpropietario" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                                        
                                       <input type="hidden" id="id_usuario" name="id_usuario" value='1'>
                                        <input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                                        <input type="hidden" id="hidpropietario" name="hidpropietario" value=''>
                                        <input type="hidden" id="hidcuenta_id_nacional" name="hidcuenta_id_nacional" value='0'>
                                        <input type="hidden" id="hidcuenta_id_internacional" name="hidcuenta_id_internacional" value='0'>

                                        <input type="hidden" id="hidcuenta_id_paypal" name="hidcuenta_id_paypal" value='0'>
                                        <input type="hidden" id="hidcuenta_id_zelle" name="hidcuenta_id_zelle" value='0'>
                                        <!--
                                        <input type="hidden" id="registroCodigo" name="registroCodigo" value='0001'>
                                            -->
                                        <!--datos personales-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos del Propietario Natural</h5>
                                                </div>
                                                <div class="col-md-5">
                                                        <label class="col-sm-12 col-form-label">Código Propietario:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="registroCodigo" name="registroCodigo" autofocus readonly="yes" >
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="registroNombre" class="col-sm-12 col-form-label">Nombre:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="registroNombre" name="registroNombre" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label  for="registroApellido"class="col-sm-12 col-form-label">Apellido:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="registroApellido" name="registroApellido" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="row">
                                                            <label for="registroNacionalidad" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                            <div class="col-sm-4">
                                                                <select class="form-select" id="registroNacionalidad" name="registroNacionalidad" >
                                                                    <option selected disabled value=""></option>
                                                                    <option value="1">V</option>
                                                                    <option value="2">E</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <input for="registroCedula" type="text" class="form-control" id="registroCedula" name="registroCedula" maxlength="8" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-sm-12 col-form-label">Representación:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registropre_prop" type="text" class="form-control" id="registropre_prop" name="registropre_prop" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label  for="registroRif" class="col-sm-5 col-form-label">Rif:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="registroRif" name="registroRif" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label  for="registroTeléfono" class="col-sm-8 col-form-label">Teléfono local:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="registroTelefono" name="registroTelefono" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label  for="registroCelular" class="col-sm-9 col-form-label">Celular:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="registroCelular" name="registroCelular" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-sm-3 col-form-label">Correo:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroEmail" type="text" class="form-control" id="registroEmail" name="registroEmail"  maxlength="45">
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
                                                            <input  for="registroDirecionH" type="text" class="form-control" id="registroDirecionH" name="registroDirecionH">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-sm-10 col-form-label">Dirección de oficina:</label>
                                                        <div class="col-sm-12">
                                                            <input  for ="registroDirecionO" type="text" class="form-control" id="registroDirecionO" name="registroDirecionO"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <!--datos bancarios-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos cuentas Nacionales</h5>
                                                </div>
                                                <div class="row">
                                                    
                                                        <div class="col-md-6">
                                                            <label for="cboBancoN" class="col-sm-10 col-form-label">Bancos Nacional:</label></br>
                                                            <div class="col-sm-12">
                                                                <select class="form-control"  id="cboBancoN" name="cboBancoN"></select>
                                                            </div>
                                                       </div>
  
                                                    <div class="col-md-6">
                                                        <label class="col-sm-9 col-form-label">Cuenta:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="num_cuen" name="num_cuen" maxlength="20" value=''><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Pago Movil</span>
                                                            <input type="text" placeholder="cedula" id="ced_pmov" name="ced_pmov" aria-label="Cédula" value='' class="form-control">
                                                            <select class="form-control"  id="cboBancoNP" name="cboBancoNP"></select>
                                                            <input type="text" placeholder="celular" id="cel_pmov" name="cel_pmov" aria-label="Celular" value='' class="form-control">
                                                        </div><br>
                                                    </div>  
                                                </div>

                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos cuentas Internacionales</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="col-sm-10 col-form-label">Banco Extranjero:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="ban_extr" name="ban_extr" >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Agencia:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="age_extr" name="age_extr" >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">DC:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="dc_extr" name="dc_extr" ><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-12 col-form-label">Cuenta:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="cue_extr" name="cue_extr" ><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-12 col-form-label">IBAN:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="iba_extr" name="iba_extr" ><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-12 col-form-label">BIC o SWIFT:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="bic_extr" name="bic_extr" ><br>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                   <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span for="cor_payp" class="input-group-text">Cuenta Paypal:</span>
                                                            <input type="text" class="form-control" placeholder="correo" id="cor_payp" name="cor_payp" >
                                                            <input type="hidden" id="nom_payp" name="nom_payp" value='0'>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Cuenta Zelle</span>
                                                            <input type="text" class="form-control" placeholder="telefono" id="tel_zelle" name="tel_zelle">
                                                            <input type="text" class="form-control" placeholder="correo" id="cor_zelle" name="cor_zelle">
                                                            <input type="text" class="form-control" placeholder="nombre" id="nom_zelle" name="nom_zelle">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div><br>

                                        <!--documentos-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Documentos Consignados</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="ced_docu" class="col-sm-9 col-form-label">Cédula de Identidad</label>
                                                        <div class="col-sm-12">
                                                            <input type="file" class="form-control form-control-sm" id="cedu_docu" name="cedu_docu">
                                                        
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="rif_docu" class="col-sm-9 col-form-label">Rif Personal</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="rif_docu" type="file" name="rif_docu" value="">
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="ref_docu" class="col-sm-12 col-form-label text-center">Referencias Personales</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="refper_docu1" type="file" name="refper_docu1" value="">
                                                                
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="refper_docu2" type="file" name="refper_docu2" value="">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="fam_docu" class="col-sm-12 col-form-label text-center">Referencias Familiares</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="reffam_docu1" type="file" name="reffam_docu1" value="">
                                                                
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="reffam_docu2" type="file" name="reffam_docu2" value="">
                                                                
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


                    <div class="tab-pane fade" id="nav-prop_juridico" role="tabpanel" aria-labelledby="nav-prop_juridico-tab">
                        <div class="col-12 grid-margin">
                            <!--Jurídico-->
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-sample" id="registrarpropietarioj" name="registrarpropietarioj" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                                        
                

                                        <input type="hidden" id="tipo_personaj" name="tipo_personaj" value='2'>
                                        <input type="hidden" id="hiid_propj" name="hiid_propj" value=''>
                                        <input type="hidden" id="hidcuenta_id_nacionalj" name="hidcuenta_id_nacionalj" value='0'>
                                        <input type="hidden" id="hidcuenta_id_internacionalj" name="hidcuenta_id_internacionalj" value='0'>
                                        <input type="hidden" id="hidcuenta_id_paypalj" name="hidcuenta_id_paypalj" value='0'>
                                        <input type="hidden" id="hidcuenta_id_zellej" name="hidcuenta_id_zellej" value='0'>

                                        <!--Datos Personales-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos del Propietario Jurídico</h5>
                                                </div>

                                                <div class="col-md-5">
                                                        <label class="col-sm-12 col-form-label">Código Propietario:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="registroCodigoj" name="registroCodigoj"  readonly="yes" >
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="registroNombrej" class="col-sm-12 col-form-label">Nombre o Razón Social:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="registroNombrej" name="registroNombrej" autofocus >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="registroRifj" class="col-sm-12 col-form-label">Rif Jurídico:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="registroRifj" name="registroRifj">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label for="registroactividad" class="col-sm-12 col-form-label">Actividad Comercial:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="registroactividad" name="registroactividad">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label for="registroDirecionj" class="col-sm-12 col-form-label">Dirección Fiscal:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="registroDirecionj" name="registroDirecionj" ><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="registroCelularj"  class="col-sm-9 col-form-label">Celular:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="registroCelularj" name="registroCelularj">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="col-sm-3 col-form-label">Correo:</label>
                                                        <div class="col-sm-12">
                                                            <input for="registroEmailj" type="text" class="form-control" id="registroEmailj" name="registroEmailj">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <!--Datos Bancarios-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos cuentas Nacionales</h5>
                                                </div>
                                                <div class="row">
                                                    
                                                        <div class="col-md-6">
                                                            <label for="cboBancoj" class="col-sm-10 col-form-label">Bancos Nacional:</label></br>
                                                            <div class="col-sm-12">
                                                                <select class="form-control"  id="cboBancoj" name="cboBancoj"></select>
                                                            </div>
                                                       </div>
  
                                                    <div class="col-md-6">
                                                        <label for="num_cuenj" class="col-sm-9 col-form-label">Cuenta:</label>
                                                        <div class="col-sm-12">
                                                            <input for="num_cuenj" type="text" class="form-control" id="num_cuenj" name="num_cuenj" maxlength="20" ><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Pago Movil</span>
                                                            <input type="text" placeholder="cedula" id="pagomovil_cedulaj" name="pagomovil_cedulaj" aria-label="Cédula" value='' class="form-control">
                                                            <select class="form-control"  id="cboBancop" name="cboBancop"></select>
                                                            <input type="text" placeholder="celular" id="pagomovil_telefonoj" name="pagomovil_telefonoj" aria-label="Celular" value='' class="form-control">
                                                        </div><br>
                                                    </div>  
                                                </div>

                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos cuentas Internacionales</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label for="ban_extrj" class="col-sm-10 col-form-label">Banco Extranjero:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="ban_extrj" name="ban_extrj" >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="age_extrj" class="col-sm-12 col-form-label">Agencia:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="age_extrj" name="age_extrj" >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="dc_extrj" class="col-sm-12 col-form-label">DC:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="dc_extrj" name="dc_extrj" ><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="cue_extrj" class="col-sm-12 col-form-label">Cuenta:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="cue_extrj" name="cue_extrj" ><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="iba_extrj" class="col-sm-12 col-form-label">IBAN:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="iba_extrj" name="iba_extrj" ><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="bic_extrj" class="col-sm-12 col-form-label">BIC o SWIFT:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="bic_extrj" name="bic_extrj" ><br>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Cuenta Paypal:</span>
                                                            <input for="cor_paypj" type="text" class="form-control" placeholder="correo" id="cor_paypj" name="cor_paypj" >
                                                            <input type="hidden" id="nom_paypj" name="nom_paypj" value=''>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Cuenta Zelle</span>
                                                            <input for="tel_zellej" type="text" class="form-control" placeholder="Telefono" id="tel_zellej" name="tel_zellej" >
                                                            <input for="cor_zellej" type="text" class="form-control" placeholder="Correo" id="cor_zellej" name="cor_zellej" >
                                                            <input for="nom_zellej" type="text" class="form-control" placeholder="Nombre" id="nom_zellej" name="nom_zellej" >
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
                                                            <input class="form-control form-control-sm" id="regmen_docu" type="file" name="regmen_docu">
                                                        </div>

                                                    
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="actcons_docu" class="col-sm-9 col-form-label">Acta Constitutiva</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="actcons_docu" type="file" name="actcons_docu">
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="actultasam_docu" class="col-sm-9 col-form-label">Acta de última Asamblea</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="actultasam_docu" type="file" name="actultasam_docu">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="rif_docj" class="col-sm-9 col-form-label">Rif Empresa</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="rif_docu" type="file" name="rif_docu" >
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="refper_docu" class="col-sm-12 col-form-label text-center text-center">Referencias Personales</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="refper_docu3" type="file" name="refper_docu3">
                                                            
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="refper_docu4" type="file" name="refper_docu4">
                                                            
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
                                                                <input class="form-control form-control-sm" id="reffam_docu1" type="file" name="reffam_docu1" value="">
                                                                
                                                                
                                                                    
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
    </div>





<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";


 

?>

<script src="js/comunes/combos.js"></script>
<script src="js/comunes/generadorcodigos.js"></script>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/editar_propietarios.js"></script>


