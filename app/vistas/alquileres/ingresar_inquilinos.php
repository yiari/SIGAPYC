
<?php 

include("layout/menuNavegacion.php"); 

?>

<div class="container">
    <div class="card-header">

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
                                    <form class="form-sample" id="inq_natural" name="inq_natural" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                                        <input type="hidden" id="operacion" name="operacion">

                                        <!--Datos Personales-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos del Inquilino Natural</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="col-sm-3 col-form-label">Nombre:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="nom_inqn" name="nom_inqu" autofocus required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-3 col-form-label">Apellido:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="ape_inqn" name="ape_inqu" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <label for="ced_inqu" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                            <div class="col-sm-3">
                                                                <select class="form-select" id="nac_inqn" name="nac_inqu" required>
                                                                    <option selected disabled value=""></option>
                                                                    <option>V</option>
                                                                    <option>E</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="number" class="form-control" id="ced_inqn" name="ci_inqu" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="col-sm-5 col-form-label">Rif:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="rif_inqn" name="rif_inqu" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-8 col-form-label">Teléfono local:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="loc_inqn" name="loc_inqu">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-9 col-form-label">Celular:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="cel_inqn" name="cel_inqu">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-sm-3 col-form-label">Correo:</label>
                                                        <div class="col-sm-12">
                                                            <input type="email" class="form-control" id="cor_inqn" name="cor_inqu" required>
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
                                                            <input type="text" class="form-control" id="dir_inqn" name="dir_inqu" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-sm-10 col-form-label">Dirección de oficina:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="ofi_inqn" name="ofi_inqu"><br>
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
                                                            <label for="fam_docu" class="col-sm-12 col-form-label text-center">Referencias Familiares</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="fam_docu1" type="file" name="fam_docu1" value="">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="fam_docu2" type="file" name="fam_docu2" value=""><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="fam_docu" class="col-sm-12 col-form-label text-center">Referencias Bancarias</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="ban_dcin1" type="file" name="ban_dcin1" value="">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="ban_dcin2" type="file" name="ban_dcin2" value=""><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="fam_docu" class="col-sm-12 col-form-label text-center">Referencias Comerciales</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="com_dcin1" type="file" name="com_dcin1" value="">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="com_dcin2" type="file" name="com_dcin2" value=""><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="ced_docu" class="col-sm-9 col-form-label text-center">Referencia del Arrendandor actual</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="arr_dcin" type="file" name="arr_dcin" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="rif_docu" class="col-sm-9 col-form-label text-center">Contrato de Arrendamiento actual</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="con_arr" type="file" name="con_arr" value=""><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <div class="container">
                                            <div class="col-12 btn btn-align-center">
                                                <!--button id="guardan" class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#op_inquilino_n" >Guardar</button-->               
                                                <button id="guardan" class="btn btn-primary" type="submit"  >Guardar</button>
                                            </div>  <!--onclick="incluir()"-->
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
                                    <form class="form-sample" id="inq_juridico" name="inq_juridico" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                                        <input type="hidden" id="operacion" name="operacion">

                                        <!--Informacion Personal-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos del Inquilino Jurídico</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="col-sm-12 col-form-label">Nombre o Razón Social:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="nom_inqj" name="nom_inqj" autofocus required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-sm-12 col-form-label">Rif Jurídico:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="rif_inqj" name="rif_inqj" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="col-sm-12 col-form-label">Actividad Comercial:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="act_inqj" name="act_inqj" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label class="col-sm-12 col-form-label">Dirección Fiscal:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="dir_inqj" name="dir_inqj" autofocus required><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-sm-9 col-form-label">Celular:</label>
                                                        <div class="col-sm-12">
                                                            <input type="number" class="form-control" id="tel_inqj" name="tel_inqj" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-3 col-form-label">Correo:</label>
                                                        <div class="col-sm-12">
                                                            <input type="email" class="form-control" id="cor_inqj" name="cor_inqj" required>
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
                                                                <input type="text" class="form-control" id="cod_ireg" name="cod_ireg" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <label for="ced_prop" class="col-sm-12 col-form-label">Nombre del Registro:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="nom_ireg" name="nom_ireg" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="inputfecha" class="col-sm-12 col-form-label">Fecha:</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" id="fec_ireg" name="fec_ireg" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Número:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="num_ireg" name="num_ireg" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Tomo:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="tom_ireg" name="tom_ireg" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-12 col-form-label">Expediente:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="exp_ireg" name="exp_ireg" required>
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
                                                        <label for="reg_imer" class="col-sm-9 col-form-label">Registro Mercantil</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="reg_imer" type="file" name="reg_imer" value="">
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
                                                        <label for="act_iasa" class="col-sm-9 col-form-label">Acta de última Asamblea</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="act_iasa" type="file" name="act_iasa" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="rif_idoj" class="col-sm-9 col-form-label">Rif Empresa</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control form-control-sm" id="rif_idoj" type="file" name="rif_idoj" value=""><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="ref_docu" class="col-sm-12 col-form-label text-center">Referencias Personales</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="ref_iper1" type="file" name="ref_iper1" value="">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="ref_iper2" type="file" name="ref_iper2" value=""><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <label for="fam_docu" class="col-sm-12 col-form-label text-center">Referencias Familiares</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="fam_iref1" type="file" id="fam_iref1" value="">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input class="form-control form-control-sm" id="fam_iref2" type="file" id="fam_iref2" value=""><br>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <label for="fam_docu" class="col-sm-12 col-form-label text-center">Referencias Bancarias</label>
                                                                    <div class="col-sm-6">
                                                                        <input class="form-control form-control-sm" id="ban_dcij1" type="file" name="ban_dcij1" value="">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input class="form-control form-control-sm" id="ban_dcij2" type="file" name="ban_dcij2" value=""><br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <label for="fam_docu" class="col-sm-12 col-form-label text-center">Referencias Comerciales</label>
                                                                    <div class="col-sm-6">
                                                                        <input class="form-control form-control-sm" id="com_dcij1" type="file" name="com_dcij1" value="">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input class="form-control form-control-sm" id="com_dcij2" type="file" name="com_dcij2" value=""><br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="ced_docu" class="col-sm-9 col-form-label text-center">Referencia del Arrendandor actual</label>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control form-control-sm" id="arr_dcij" type="file" name="arr_dcij" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="rif_docu" class="col-sm-9 col-form-label text-center">Contrato de Arrendamiento actual</label>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control form-control-sm" id="are_dcij" type="file" name="are_dcij" value=""><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <div class="container">
                                            <div class="col-12 btn btn-align-center">
                                                <!--button id="guardarj" class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#op_inquilino_n" >Guardar</button-->
                                                <button id="guardarj" class="btn btn-primary" type="submit"  >Guardar</button>
                                            </div><!--onclick="incluirj()"-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/comunes/combos.js"></script>
        <script src="js/alquileres/ingresar_inquilinos.js"></script>