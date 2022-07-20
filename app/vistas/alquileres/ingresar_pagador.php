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
                                            <div class="container">
                                                <div class="col-12 btn btn-align-center">
                                                     <button type="button" class="btn btn-primary">añadir otro</button>
                                                     <button type="submit" class="btn btn-primary">Guardar</button>
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
                                            </div>
                                            
                                            
                                           
                                            
                                            
                                            <div class="container">
                                                <div class="col-12 btn btn-align-center">
                                                     <button type="button" class="btn btn-primary">añadir otro</button>
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
            
        