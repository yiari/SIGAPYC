<?php include("layout/menuNavegacion.php"); ?>
    
    <div class="container">

         <div class="card-header">
                 <div style="text-align: right;">
                        <ol>          
                            <a class="btn btn-outline-secondary" href="index.php?url=app/vistas/alquileres/inmuebles"  role="button">Atras</a>
                        </ol>
                    </div>
            

            <h4 class="card-title">Beneficiarios</h4>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-bene_natural-tab" data-bs-toggle="tab" data-bs-target="#nav-bene_natural" type="button" role="tab" aria-controls="nav-bene_natural" aria-selected="true">Beneficiario Natural</button>
                            <button class="nav-link" id="nav-juridica_bene-tab" data-bs-toggle="tab" data-bs-target="#nav-juridica_bene" type="button" role="tab" aria-controls="nav-juridica_bene" aria-selected="false">Beneficiario Jurídico</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-bene_natural" role="tabpanel" aria-labelledby="nav-bene_natural-tab">
                            <div class="col-12 grid-margin">

                                <!--bene_natural-->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Personales</h5>

                                        <form class="form-sample" id="registrarbeneficiario" name="registrarbeneficiario" method="POST" action="guarda.php" autocomplete="off" enctype="multipart/form-data">
                                                
                                                <input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                                                <input type="hidden" id="hidbeneficiario" name="hidbeneficiario" value=''>
                                                <input type="hidden" id="id_prop" name="id_prop" value='1'>
                                                <input type="hidden" id="hidcuenta_id_nacional" name="hidcuenta_id_nacional" value='0'>
                                                <input type="hidden" id="hidcuenta_id_internacional" name="hidcuenta_id_internacional" value='0'>
                                                <input type="hidden" id="hidcuenta_id_paypal" name=" hidcuenta_id_paypal" value='0'>
                                               

                                               

                                                <input type="hidden" id="nom_payp" name="nom_payp" value='0'>
                                                    


                                                <div class="col-md-5">
                                                        <label class="col-sm-12 col-form-label">Código Beneficiario:</label>
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
                                                            <input for="registroCedula"  type="text" class="form-control" id="registroCedula" name="registroCedula" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="registrorif" class="col-sm-5 col-form-label">Rif:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registrorif" name="registrorif" >
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
                                                        <input type="text" class="form-control" id="registroEmail" name="registroEmail">
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
                                                        <input type="text" class="form-control" id="registroDirecionH" name="registroDirecionH">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="registroDirecionO" class="col-sm-10 col-form-label">Dirección de oficina:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroDirecionO" name="registroDirecionO"><br>
                                                    </div>
                                                </div>
                                            </div>

                                          
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
                                                        <label for="num_cuen"  class="col-sm-9 col-form-label">Cuenta:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="num_cuen" name="num_cuen"><br>
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
                                                    <h5 class="card-title">Datos cuentas Intarnacionales</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label for="ban_extr" class="col-sm-10 col-form-label">Banco Extranjero:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="ban_extr" name="ban_extr" >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="age_extr" class="col-sm-12 col-form-label">Agencia:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="age_extr" name="age_extr" >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="dc_extr" class="col-sm-12 col-form-label">DC:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="dc_extr" name="dc_extr" ><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="cue_extr" class="col-sm-12 col-form-label">Cuenta:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="cue_extr" name="cue_extr" ><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="iba_extr" class="col-sm-12 col-form-label">IBAN:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="iba_extr" name="iba_extr" ><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="bic_extr" class="col-sm-12 col-form-label">BIC o SWIFT:</label>
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
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Cuenta Zelle</span>
                                                            <input type="text" class="form-control" placeholder="telefono" id="" name="" >
                                                            <input type="text" class="form-control" placeholder="correo" id="" name="" >
                                                        </div>
                                                    </div>

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
                                                        <input class="form-control form-control-sm" id="rif_docu" type="file" name="rif_docu" ><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="autopro_docu" class="col-sm-12 col-form-label">Autorización del Propietario</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="autopro_docu" type="file" name="autopro_docu" ><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="refper_docu" class="col-sm-12 col-form-label">Referencias Personales</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="refper_docu" type="file" name="refper_docu" >
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
                                                            <input class="form-control form-control-sm" id="reffam_docu" type="file" name="reffam_docu" >
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="reffam_docu2" type="file" name="reffam_docu2"><br>
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

                        <div class="tab-pane fade" id="nav-juridica_bene" role="tabpanel" aria-labelledby="nav-juridica_bene-tab">
                            <div class="col-12 grid-margin">

                                <!--Jurídico-->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Jurídicos</h5>
                                        <form class="form-sample" id="registrarbeneficiarioj" name="registrarbeneficiarioj" method="POST" action="guarda.php" autocomplete="off" enctype="multipart/form-data" enctype="multipart/form-data">
 
                                                <input type="hidden" id="tipo_persona" name="tipo_persona" value='2'>
                                                <input type="hidden" id="hidbeneficiarioj" name="hidbeneficiarioj" value=''>
                                                <input type="hidden" id="id_prop" name="id_prop" value='1'>
                                                <input type="hidden" id="hidcuenta_id_nacional" name="hidcuenta_id_nacional" value='0'>
                                                <input type="hidden" id="hidcuenta_id_internacional" name="hidcuenta_id_internacional" value='0'>
                                                

                                            <div class="col-md-5">
                                                <label class="col-sm-12 col-form-label">Código Beneficiario:</label>
                                                <div class="col-sm-12">
                                                    <input for="registroCodigo" type="text" class="form-control" id="registroCodigo" name="registroCodigo" autofocus readonly="yes" >
                                                </div>
                                           </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="registroNombre"  class="col-sm-12 col-form-label">Nombre o Razón Social:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroNombre" name="registroNombre" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="registrorif" class="col-sm-12 col-form-label">Rif Jurídico:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registrorif" name="registrorif" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="registroActividad" class="col-sm-12 col-form-label">Actividad Comercial:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroActividad" name="registroActividad" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="registroDirecionH" class="col-sm-12 col-form-label">Dirección Fiscal:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroDirecionH" name="registroDirecionH"><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="card-title">Datos bancarios</h5>
                                            <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos cuentas Nacionales</h5>
                                                </div>
                                                <div class="row">
                                                    
                                                        <div class="col-md-6">
                                                            <label for="cboBancoPJ" class="col-sm-10 col-form-label">Bancos Nacional:</label></br>
                                                            <div class="col-sm-12">
                                                                <select class="form-control"  id="cboBancoPJ" name="cboBancoPJ"></select>
                                                            </div>
                                                       </div>
  
                                                    <div class="col-md-6">
                                                        <label for="num_cuenJ" class="col-sm-9 col-form-label">Cuenta:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="num_cuenJ" name="num_cuenJ" value=''><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Pago Movil</span>
                                                            <input type="text" placeholder="cedula" id="ced_pmovJ" name="ced_pmovJ" aria-label="Cédula" value='' class="form-control">
                                                            <select class="form-control"  id="cboBancop" name="cboBancop"></select>
                                                            <input type="text" placeholder="celular" id="cel_pmovJ" name="cel_pmovJ" aria-label="Celular" value='' class="form-control">
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
                                                            <input type="text" class="form-control" placeholder="correo" id="" name="" >
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Cuenta Zelle</span>
                                                            <input type="text" class="form-control" placeholder="telefono" id="" name="" >
                                                            <input type="text" class="form-control" placeholder="correo" id="" name="" >
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div><br>

                                            <h5 class="card-title">Documentos Consignados</h5>
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
                                                        <input class="form-control form-control-sm" id="actcons_docu" type="file" name="actcons_docu" ><br>
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
                                                        <input class="form-control form-control-sm" id="rif_docu" type="file" name="rif_docu" ><br>
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
                                                            <input class="form-control form-control-sm" id="reffam_docu" type="file" id="reffam_docu">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_dcbj2" type="file" id="fam_docj2"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                    <div class="col-12 btn btn-align-center">

                                                        <button type="button" class="btn btn-primary">Guardar</button>

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
<script src="js/alquileres/ingresar_beneficiarios.js"></script>
<script src="js/alquileres/ingresar_beneficiario_juridico.js"></script>