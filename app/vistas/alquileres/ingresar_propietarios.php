
<?php 

include("layout/menuNavegacion.php"); 

?>

<div class="container">
    <div class="card-header">

            <h4 class="card-title">Propietarios</h4>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link " id="nav-prop_natural-tab" data-bs-toggle="tab" data-bs-target="#nav-prop_natural" type="button" role="tab" aria-controls="nav-prop_natural" aria-selected="true">Persona Natural</button>
                        <button class="nav-link" id="nav-prop_juridico-tab" data-bs-toggle="tab" data-bs-target="#nav-prop_juridico" type="button" role="tab" aria-controls="nav-prop_juridico" aria-selected="false">Persona Jurídica</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade show" id="nav-prop_natural" role="tabpanel" aria-labelledby="nav-prop_natural-tab">
                        <div class="col-12 grid-margin">
                            <!--prop_natural-->
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-sample" id="prop_natural" name="prop_natural" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                                        <input type="hidden" id="operacion" name="operacion">
                                        <input type="hidden" id="id_prop" name="id_prop" value=''>
                                        <input type="hidden" id="cod_prop" name="cod_prop" value=''>
                                        <!--datos personales-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos del Propietario Natural</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="col-sm-12 col-form-label">Nombre:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="nom_prop" name="nom_prop" value='' autofocus required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-sm-12 col-form-label">Apellido:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="ape_prop" name="ape_prop" value='' required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="row">
                                                            <label for="ced_prop" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                            <div class="col-sm-4">
                                                                <select class="form-select" id="nac_pron" name="nac_prop" required>
                                                                    <option selected disabled value=""></option>
                                                                    <option>V</option>
                                                                    <option>E</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" id="ced_pron" name="ci_prop" value='' required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-sm-12 col-form-label">Representación:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="rep_prop" name="rep_prop" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="col-sm-5 col-form-label">Rif:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="rif_pron" name="rif_prop" value='' required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-8 col-form-label">Teléfono local:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="loc_pron" name="loc_prop" value='' required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-9 col-form-label">Celular:</label>
                                                        <div class="col-sm-12">
                                                            <input type="number" class="form-control" id="cel_pron" name="cel_prop" value='' required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-sm-3 col-form-label">Correo:</label>
                                                        <div class="col-sm-12">
                                                            <input type="email" class="form-control" id="cor_pron" name="cor_prop" value='' required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="col-sm-10 col-form-label">Estado:</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" id="est_prop" name="est_prop" required>
                                                                <option value="0"></option>
                                                            
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-10 col-form-label">Municipio:</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" id="mun_prop" name="mun_prop" required>
                                                            

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-10 col-form-label">Parroquia:</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" id="par_prop" name="par_prop" required>
                                                            


                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="col-sm-10 col-form-label">Dirección de habitación:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="dir_pron" name="dir_prop" value='' required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-sm-10 col-form-label">Dirección de oficina:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="ofi_pron" name="ofi_prop" value=''><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <!--datos bancarios-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos bancarios</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="col-sm-10 col-form-label">Banco Nacional:</label>
                                                            <select class="form-control" id="sel1">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                            </select>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="col-sm-9 col-form-label">Cuenta:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="num_cuen" name="num_cuen" value=''><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-9 col-form-label">Cuenta Paypal:</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cor_payp" name="cor_payp" value=''><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="col-sm-10 col-form-label">Banco Extranjero:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="ban_extr" name="ban_extr" value=''>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Agencia:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="age_extr" name="age_extr" value=''>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">DC:</label>
                                                        <div class="col-sm-12">
                                                            <input type="number" class="form-control" id="dc_extr" name="dc_extr" value=''><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-12 col-form-label">Cuenta:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="cue_extr" name="cue_extr" value=''><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-12 col-form-label">IBAN:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="iba_extr" name="iba_extr" value=''><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-12 col-form-label">BIC o SWIFT:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="bic_extr" name="bic_extr" value=''><br>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Pago Movil</span>
                                                            <input type="number" placeholder="cedula" id="ced_pmov" name="ced_pmov" aria-label="Cédula" value='' class="form-control">
                                                            <input type="text" placeholder="banco" id="ban_pmov" name="ban_pmov" aria-label="Banco" value='' class="form-control">
                                                            <input type="number" placeholder="celular" id="cel_pmov" name="cel_pmov" aria-label="Celular" value='' class="form-control">
                                                        </div><br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Cuenta Zelle</span>
                                                            <input type="text" class="form-control" placeholder="telefono" id="tel_zell" name="tel_zell" value=''>
                                                            <input type="text" class="form-control" placeholder="correo" id="cor_zell" name="cor_zell" value=''>
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
                                                            <input type="file" class="form-control form-control-sm" id="ced_docu" name="ced_docu">
                                                        
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
                                                                <input class="form-control form-control-sm" id="ref_docu1" type="file" name="ref_docu1" value="">
                                                                
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="ref_docu2" type="file" name="ref_docu2" value="">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="fam_docu" class="col-sm-12 col-form-label text-center">Referencias Familiares</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="fam_docu1" type="file" name="fam_docu1" value="">
                                                                
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="fam_docu2" type="file" name="fam_docu2" value="">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>
                                    

                                        <div class="container">
                                            <div class="col-12 btn btn-align-center">
                                            <button id="guardarjm" class="btn btn-primary" type="submit" >Guardar</button>
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
                                    <form class="form-sample" id="prop_juridico" name="prop_juridico" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                                        <input type="hidden" id="operacion" name="operacion">
                                        <input type="hidden" id="id_prop" name="id_prop" value=''>
                                        <input type="hidden" id="cod_prop" name="cod_prop" value=''>

                                        <!--Datos Personales-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos del Propietario Jurídico</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="col-sm-12 col-form-label">Nombre o Razón Social:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="nom_proj" name="nom_proj" autofocus value='' required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-sm-12 col-form-label">Rif Jurídico:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="rif_proj" name="rif_proj" value='' required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="col-sm-12 col-form-label">Actividad Comercial:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="act_proj" name="act_proj" value='' required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label class="col-sm-12 col-form-label">Dirección Fiscal:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="dir_proj" name="dir_proj" autofocus value='' required><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-9 col-form-label">Celular:</label>
                                                        <div class="col-sm-12">
                                                            <input type="number" class="form-control" id="tel_proj" name="tel_proj" value='' required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-sm-3 col-form-label">Correo:</label>
                                                        <div class="col-sm-12">
                                                            <input type="email" class="form-control" id="cor_proj" name="cor_proj" value='' required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <!--Datos Bancarios-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos bancarios</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="col-sm-5 col-form-label">Banco:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="ban_proj" name="ban_proj" value=''>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="col-sm-9 col-form-label">Cuenta:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="cta_proj" name="cta_proj" value='' maxlength="20"><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-9 col-form-label">Cuenta Paypal:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="pay_proj" name="pay_proj" value=''><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="col-sm-10 col-form-label">Banco Extranjero:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="ban_eprj" name="ban_eprj" value=''>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Agencia:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="age_proj" name="age_proj" value=''>
                                                            <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">DC:</label>
                                                        <div class="col-sm-12">
                                                            <input type="number" class="form-control" id="dc_proj" name="dc_proj" value=''><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-12 col-form-label">Cuenta:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="cue_proj" name="cue_proj" value=''><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-12 col-form-label">IBAN:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="iba_proj" name="iba_proj" value=''><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-12 col-form-label">BIC o SWIFT:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="bic_proj" name="bic_proj" value=''><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Pago Movil</span>
                                                            <input type="number" placeholder="cedula" id="ced_pmoj" name="ced_pmoj" aria-label="Cédula" class="form-control" value=''>
                                                            <input type="text" placeholder="banco" id="ban_pmoj" name="ban_pmoj" aria-label="Banco" class="form-control" value=''>
                                                            <input type="number" placeholder="celular" id="cel_pmoj" name="cel_pmoj" aria-label="Celular" class="form-control" value=''>
                                                        </div><br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Cuenta Zelle</span>
                                                            <input type="text" class="form-control" placeholder="telefono" id="zel_pmoj" name="zel_pmoj" value=''>
                                                            <input type="email" class="form-control" placeholder="correo" id="cor_pmoj" name="cor_pmoj" value=''>
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
                                                            <input class="form-control form-control-sm" id="reg_merc" type="file" name="reg_merc" value="">
                                                        </div>

                                                    
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="rif_docu" class="col-sm-9 col-form-label">Acta Constitutiva</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="act_cons" type="file" name="act_cons" value="">
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="act_asam" class="col-sm-9 col-form-label">Acta de última Asamblea</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="act_asam" type="file" name="act_asam" value="">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="rif_docj" class="col-sm-9 col-form-label">Rif Empresa</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="rif_docj" type="file" name="rif_docj" value="">
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="ref_docu" class="col-sm-12 col-form-label text-center text-center">Referencias Personales</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="ref_docj1" type="file" name="ref_docj1" value="">
                                                            
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="ref_docj2" type="file" name="ref_docj2" value="">
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="fam_docu" class="col-sm-12 col-form-label text-center">Referencias Familiares</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="fam_docj1" type="file" name="fam_docj1" value="">
                                                               
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="fam_docj2" type="file" name="fam_docj2" value="">
                                                                
                                                                
                                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <div class="container">
                                            <div class="col-12 btn btn-align-center">
                                            
                                                <button id="guardarjm" class="btn btn-primary" type="submit" >Guardar</button>
                                        
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--modal-->
                <?php //include("template/op_apoderado_n.php"); ?>
                <?php //include("template/op_representante_j.php"); ?>
            </div>
        </div>
    </div>
