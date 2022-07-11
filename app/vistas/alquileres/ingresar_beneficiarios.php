<?php include("layout/menuNavegacion.php"); ?>
    
    <div class="container">

         <div class="card-header">
            

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
                                        <form class="form-sample" id="prop_bene_natural" name="prop_bene_natural" method="POST" action="guarda.php" autocomplete="off" enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="col-sm-3 col-form-label">Nombre:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="nom_benn" name="nom_prop" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-3 col-form-label">Apellido:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ape_benn" name="ape_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <label for="ced_prop" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-select" id="nac_benn" name="nac_prop" required>
                                                                <option selected disabled value=""></option>
                                                                <option>V</option>
                                                                <option>E</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="ced_benn" name="ci_prop" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="col-sm-5 col-form-label">Rif:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="rif_benn" name="rif_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-8 col-form-label">Teléfono local:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="loc_benn" name="loc_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-9 col-form-label">Celular:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cel_benn" name="cel_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-3 col-form-label">Correo:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cor_benn" name="cor_prop" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="col-sm-10 col-form-label">Estado:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control" id="est_benn" name="est_prop" required>
                                                            <option value="0"></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-10 col-form-label">Municipio:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control" id="mun_benn" name="mun_prop" required>
                                                            <option value="0"></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-10 col-form-label">Parroquia:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control" id="par_benn" name="par_prop" required>
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="col-sm-10 col-form-label">Dirección de habitación:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="dir_benn" name="dir_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-10 col-form-label">Dirección de oficina:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ofi_benn" name="ofi_prop" required><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="card-title">Datos bancarios</h5>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="col-sm-10 col-form-label">Banco Nacional:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ban_benn" name="id_banc" required>
                                                        <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="col-sm-9 col-form-label">Cuenta:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cue_benn" name="num_cuen" required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-9 col-form-label">Cuenta Paypal:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="pay_benn" name="cor_payp" required><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="col-sm-10 col-form-label">Banco Extranjero:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="bae_bebn" name="ban_extr" required>
                                                        <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="col-sm-12 col-form-label">Agencia:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="age_bebn" name="age_extr" required>
                                                        <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="col-sm-12 col-form-label">DC:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="dc_bebn" name="dc_extr" required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-12 col-form-label">Cuenta:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cue_bebn" name="cue_extr" required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-12 col-form-label">IBAN:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="iba_bebn" name="iba_extr" required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-12 col-form-label">BIC o SWIFT:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="bic_bebn" name="bic_extr" required><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Pago Movil</span>
                                                        <input type="text" placeholder="cedula" id="ced_pben" name="ced_pmov" aria-label="Cédula" class="form-control">
                                                        <input type="text" placeholder="banco" id="ban_pben" name="ban_pmov" aria-label="Banco" class="form-control">
                                                        <input type="text" placeholder="celular" id="cel_pben" name="cel_pmov" aria-label="Celular" class="form-control">
                                                    </div><br>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Cuenta Zelle</span>
                                                        <input type="text" class="form-control" placeholder="telefono" id="zel_pben" name="tel_zell" required>
                                                        <input type="text" class="form-control" placeholder="correo" id="cor_pben" name="cor_zell" required>
                                                    </div>
                                                </div>
                                            </div><br>

                                            <h5 class="card-title">Documentos Consignados</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ced_docu" class="col-sm-9 col-form-label">Cédula de Identidad</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="ced_dcbn" type="file" name="ced_docn" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Rif Personal</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="rif_dcbn" type="file" name="rif_docn" value="" required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-12 col-form-label">Autorización del Propietario</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="aut_dabn" type="file" name="rif_docn" value="" required><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="ref_docu" class="col-sm-12 col-form-label">Referencias Personales</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_dcbn1" type="file" name="ref_docn1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_dcbn2" type="file" name="ref_docn2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="fam_docu" class="col-sm-12 col-form-label">Referencias Familiares</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_dcbn1" type="file" name="fam_docn1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_dcbn2" type="file" name="fam_docn2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container">
                                                    <div class="col-12 btn btn-align-center">
                                                
                                                        <button type="button" class="btn btn-primary">Añadir otro</button>
                                                        <button type="button" class="btn btn-primary">Guardar</button>
                                                        <a class="btn btn-primary" href="index.php?url=app/vistas/alquileres/ingresar_inmueble" role="button">Volver</a> 
                                                
                                            
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
                                        <form class="form-sample" id="apo_juridico" name="apo_juridico" method="POST" action="guarda.php" autocomplete="off" enctype="multipart/form-data" enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="col-sm-12 col-form-label">Nombre o Razón Social:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="nom_benj" name="nom_proj" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">Rif Jurídico:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="rif_benj" name="rif_proj" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="col-sm-12 col-form-label">Actividad Comercial:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="act_benj" name="act_proj" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="col-sm-12 col-form-label">Dirección Fiscal:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="dir_benj" name="dir_proj" autofocus required><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="card-title">Datos bancarios</h5>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="col-sm-5 col-form-label">Banco:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ban_benj" name="id_banc" required>
                                                        <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="col-sm-9 col-form-label">Cuenta:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cta_benj" name="num_cuen" required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-9 col-form-label">Cuenta Paypal:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="pay_benj" name="cor_payp" required><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="col-sm-10 col-form-label">Banco Extranjero:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="bae_bebj" name="ban_extr" required>
                                                        <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="col-sm-12 col-form-label">Agencia:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="age_bebj" name="age_extr" required>
                                                        <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="col-sm-12 col-form-label">DC:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="dc_bebj" name="dc_extr" required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-12 col-form-label">Cuenta:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cue_bebj" name="cue_extr" required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-12 col-form-label">IBAN:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="iba_bebj" name="iba_extr" required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-12 col-form-label">BIC o SWIFT:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="bic_bebj" name="bic_extr" required><br>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Pago Movil</span>
                                                        <input type="text" placeholder="cedula" id="ced_pbej" name="ced_pmov" aria-label="Cédula" class="form-control">
                                                        <input type="text" placeholder="banco" id="ban_pbej" name="ban_pmov" aria-label="Banco" class="form-control">
                                                        <input type="text" placeholder="celular" id="cel_pbej" name="cel_pmov" aria-label="Celular" class="form-control">
                                                    </div><br>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Cuenta Zelle</span>
                                                        <input type="text" class="form-control" placeholder="telefono" id="zel_pbej" name="zel_pmoj" required>
                                                        <input type="text" class="form-control" placeholder="correo" id="cor_pbej" name="cor_pmoj" required>
                                                    </div>
                                                </div>
                                            </div><br>

                                            <h5 class="card-title">Documentos Consignados</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="ced_docu" class="col-sm-9 col-form-label">Registro Mercantil</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="ced_dcbj" type="file" name="ced_docj" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Acta Constitutiva</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="rif_dcbj" type="file" name="rif_docj" value="" required><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ced_docu" class="col-sm-9 col-form-label">Acta de última Asamblea</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="ced_dcbj" type="file" name="ced_docj" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Rif Personal</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="rif_dcbj" type="file" name="rif_docj" value="" required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-12 col-form-label">Autorización del Propietario</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="aut_dabj" type="file" name="aut_docn" value="" required><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="ref_docu" class="col-sm-12 col-form-label">Referencias Personales</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_dcbj1" type="file" name="ref_docj1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_dcbj2" type="file" name="ref_docj2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="fam_docu" class="col-sm-12 col-form-label">Referencias Familiares</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_dcbj1" type="file" id="fam_docj1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_dcbj2" type="file" id="fam_docj2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                   

                                            <div class="container">
                                                    <div class="col-12 btn btn-align-center">
                                                
                                                        <button type="button" class="btn btn-primary">añadir otro</button>
                                                        <button type="button" class="btn btn-primary">Guardar</button>
                                                        <a class="btn btn-primary" href="index.php?url=app/vistas/alquileres/ingresar_inmueble" role="button">Volver</a> 
                                                
                                            
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