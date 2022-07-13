<!-- Modal Pagador-->
<div class="modal fade" id="pagador" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pagadorLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pagadorLabel">Añadir Pagador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!--modal-->
                <div class="container">
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
                                        <form class="form-sample" id="inqu_pagador" name="inqu_pagador" method="POST" action="guarda.php" autocomplete="off">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="col-sm-3 col-form-label">Nombre:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="nom_pgan" name="nom_prop" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-3 col-form-label">Apellido:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ape_pgan" name="ape_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <label for="ced_prop" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-select" id="nac_pgan" name="nac_prop" required>
                                                                <option selected disabled value=""></option>
                                                                <option>V</option>
                                                                <option>E</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="ced_pgan" name="ci_prop" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="col-sm-5 col-form-label">Rif:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="rif_pgan" name="rif_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-8 col-form-label">Teléfono local:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="loc_pgan" name="loc_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-9 col-form-label">Celular:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cel_pgan" name="cel_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-3 col-form-label">Correo:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cor_pgan" name="cor_prop" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="col-sm-10 col-form-label">Estado:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control" id="est_pgan" name="est_prop" required>
                                                            <option value="0"></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-10 col-form-label">Municipio:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control" id="mun_pgan" name="mun_prop" required>
                                                            <option value="0"></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-10 col-form-label">Parroquia:</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control" id="par_pgan" name="par_prop" required>
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="col-sm-10 col-form-label">Dirección de habitación:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="dir_pgan" name="dir_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-10 col-form-label">Dirección de oficina:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ofi_pgan" name="ofi_prop" required><br>
                                                    </div>
                                                </div>
                                            </div><br>

                                            <h5 class="card-title">Documentos Consignados</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ced_docu" class="col-sm-9 col-form-label">Cédula de Identidad</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="ced_dcpn" type="file" name="ced_docn" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Rif Personal</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="rif_dcpn" type="file" name="rif_docn" value="" required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-12 col-form-label">Autorización del Propietario</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="aut_dcpn" type="file" name="rif_docn" value="" required><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="ref_docu" class="col-sm-12 col-form-label">Referencias Personales</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_dcpn1" type="file" name="ref_docn1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_dcpn2" type="file" name="ref_docn2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="fam_docu" class="col-sm-12 col-form-label">Referencias Familiares</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_dcpn1" type="file" name="fam_docn1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_dcpn2" type="file" name="fam_docn2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="fam_docu" class="col-sm-12 col-form-label">Referencias Bancarias</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ban_dcpn1" type="file" name="ban_dcpn1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ban_dcpn2" type="file" name="ban_dcpn2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="fam_docu" class="col-sm-12 col-form-label">Referencias Comerciales</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="com_dcpn1" type="file" name="com_dcpn1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="com_dcpn2" type="file" name="com_dcpn2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="ced_docu" class="col-sm-9 col-form-label">Referencia del Arrendandor Actual</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="arr_dcpn" type="file" name="ced_docn" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Contrato de Arrendamiento</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="are_dcpn" type="file" name="rif_docn" value="" required><br>
                                                    </div>
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
                                                        <input type="text" class="form-control" id="nom_pgaj" name="nom_proj" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">Rif Jurídico:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="rif_pgaj" name="rif_proj" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="col-sm-12 col-form-label">Actividad Comercial:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="act_pgaj" name="act_proj" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="col-sm-12 col-form-label">Dirección Fiscal:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="dir_pgaj" name="dir_proj" autofocus required><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="card-title">Documentos Consignados</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="ced_docu" class="col-sm-9 col-form-label">Registro Mercantil</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="reg_dcpj" type="file" name="ced_docj" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Acta Constitutiva</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="act_dcpj" type="file" name="rif_docj" value="" required><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="ced_docu" class="col-sm-9 col-form-label">Acta de última Asamblea</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="acu_dcpj" type="file" name="ced_docj" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Rif Personal</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="rif_dcpj" type="file" name="rif_docj" value="" required><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="rif_docu" class="col-sm-12 col-form-label">Autorización del Propietario</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="aut_dcpj" type="file" name="aut_docn" value="" required><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="ref_docu" class="col-sm-12 col-form-label">Referencias Personales</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_dcpj1" type="file" name="ref_docj1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_dcpj2" type="file" name="ref_docj2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="fam_docu" class="col-sm-12 col-form-label">Referencias Familiares</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_dcpj1" type="file" id="fam_docj1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_dcpj2" type="file" id="fam_docj2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="fam_docu" class="col-sm-12 col-form-label">Referencias Bancarias</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ban_dcpj1" type="file" name="ban_dcpj1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ban_dcpj2" type="file" name="ban_dcpj2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="fam_docu" class="col-sm-12 col-form-label">Referencias Comerciales</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="com_dcpj1" type="file" name="com_dcpj1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="com_dcpj2" type="file" name="com_dcpj2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="ced_docu" class="col-sm-9 col-form-label">Referencia del Arrendandor Actual</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="arr_dcpj" type="file" name="ced_docn" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="rif_docu" class="col-sm-9 col-form-label">Contrato de Arrendamiento</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="are_dcpj" type="file" name="rif_docn" value="" required><br>
                                                    </div>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">añadir otro</button>
                <button type="button" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>