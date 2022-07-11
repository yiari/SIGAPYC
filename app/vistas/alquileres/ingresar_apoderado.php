<?php 

include("layout/menuNavegacion.php"); 

?>



<!-- Modal apoderado-->
<div class="modal fade" id="apo_natural" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="apo_naturalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="apo_naturalLabel">Añadir Apoderado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!--modal-->
                <div class="container">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link" id="nav-apo_natural-tab" data-bs-toggle="tab" data-bs-target="#nav-apo_natural" type="button" role="tab" aria-controls="nav-apo_natural" aria-selected="true">Apoderado Natural</button>
                            
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade" id="nav-apo_natural" role="tabpanel" aria-labelledby="nav-apo_natural-tab">
                            <div class="col-12 grid-margin">

                                <!--apo_natural-->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Personales</h5>
                                        <form class="form-sample" id="prop_apo_natural" name="prop_apo_natural" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                                            <input type="hidden"  id="operacion" name="operacion" >
                                            <input type="hidden"  id="id_apod" name="id_apod" value='' >

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="col-sm-3 col-form-label">Nombre:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="nom_apod" name="nom_apod"  value='' autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-3 col-form-label">Apellido:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ape_apod" name="ape_apod"  value='' required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <label for="ced_apod" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-select" id="nac_apod" name="nac_apod" required>
                                                                <option selected disabled value=""></option>
                                                                <option>V</option>
                                                                <option>E</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="ced_apod" name="ced_apod"  value='' required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="col-sm-5 col-form-label">Rif:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="rif_apod" name="rif_apod"  value=''  required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-8 col-form-label">Teléfono local:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="loc_apod" name="loc_apod"  value='' required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-9 col-form-label">Celular:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cel_apod" name="cel_apod"  value='' required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-3 col-form-label">Correo:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cor_apod" name="cor_apod" value=''  required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="col-sm-10 col-form-label">Estado:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control" id="est_apod" name="est_apod" required>
                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-10 col-form-label">Municipio:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control" id="mun_apod" name="mun_apod" required>
                                                                      
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-10 col-form-label">Parroquia:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control" id="par_apod" name="par_apod" required>
                                                      
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="col-sm-10 col-form-label">Dirección de habitación:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="dir_apod" name="dir_apod" value=''   required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-10 col-form-label">Dirección de oficina:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ofi_apod" name="ofi_apod" value=''   required><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="card-title">Datos bancarios</h5>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="col-sm-10 col-form-label">Banco Nacional:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ban_apod" name="ban_apod"  value=''  required>
                                                        <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="col-sm-9 col-form-label">Cuenta:</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="cue_apod" name="cue_apod"  value=''  required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-9 col-form-label">Cuenta Paypal:</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="pay_apod" name="pay_apod" value=''   required><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="col-sm-10 col-form-label">Banco Extranjero:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ban_eapo" name="ban_eapo" value=''   required>
                                                        <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="col-sm-12 col-form-label">Agencia:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="age_apod" name="age_apod"  value=''  required>
                                                        <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="col-sm-12 col-form-label">DC:</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="dc_apod" name="dc_apod" value=''   required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-12 col-form-label">Cuenta:</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="cue_eapo" name="cue_eapo"  value=''  required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-12 col-form-label">IBAN:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="iba_apod" name="iba_apod"  value=''  required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-12 col-form-label">BIC o SWIFT:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="bic_apod" name="bic_apod"  value='<?php echo $bic_apod?>'  required><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Pago Movil</span>
                                                        <input type="number" placeholder="cedula" id="ced_pmoa" name="ced_pmoa"  value='' aria-label="Cédula" class="form-control">
                                                        <input type="text" placeholder="banco" id="ban_pmoa" name="ban_pmoa"  value='' aria-label="Banco" class="form-control">
                                                        <input type="text" placeholder="celular" id="cel_pmoa" name="cel_pmoa"  value=''  aria-label="Celular" class="form-control">
                                                    </div><br>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Cuenta Zelle</span>
                                                        <input type="number" class="form-control" placeholder="telefono" id="tel_zela" name="tel_zela"  value=''  required>
                                                        <input type="text" class="form-control" placeholder="correo" id="cor_zela" name="cor_zela"  value=''  required>
                                                    </div>
                                                </div>
                                            </div><br>

                                            <h5 class="card-title">Datos del Poder</h5>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">Notaria o Registro:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="not_pode" name="not_pode"  value=''  required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-12 col-form-label">Fecha:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="fec_pode" name="fec_pode"  value=''  required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-12 col-form-label">Número:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="num_pode" name="num_pode"  value=''  required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-9 col-form-label">Tomo:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="tom_pode" name="tom_pode"  value=''  required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="col-sm-9 col-form-label">Folio o asiento real:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="fol_pode" name="fol_pode"  value=''  required><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="card-title">Documentos Consignados</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ced_docu" class="col-sm-9 col-form-label">Cédula de Identidad</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="ced_doca" type="file" name="ced_doca" value="" required>
                                                                                             

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Rif Personal</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="rif_doca" type="file" name="rif_doca" value="" required>
                                                                                             

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Poder Notariado</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="pod_doca" type="file" name="pod_doca" value="" required>
                                                                                          
                                   

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="ref_docu" class="col-sm-12 col-form-label">Referencias Personales</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_doca1" type="file" name="ref_doca1" value="" required>
                                                                                                 

                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_doca2" type="file" name="ref_doca2" value="" required>
                                                                                                 

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="fam_docu" class="col-sm-12 col-form-label">Referencias Familiares</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_doca1" type="file" name="fam_doca1" value="" required>
                                                                                                 
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_doca2" type="file" name="fam_doca2" value="" required>                                     
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                     <div class="col-12 btn btn-align-center">
                                      
                                      </div>                                     

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>





