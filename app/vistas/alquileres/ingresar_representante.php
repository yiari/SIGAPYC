
<?php 

include("layout/menuNavegacion.php"); 

?>



<div class="container">

        <div class="card-header">
            

                <h4 class="card-title">Datos del Representante Lega</h4>

                <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-repr_natural-tab" data-bs-toggle="tab" data-bs-target="#nav-repr_natural" type="button" role="tab" aria-controls="nav-repr_natural" aria-selected="true">Representante</button>
                           
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-repr_natural" role="tabpanel" aria-labelledby="nav-repr_natural-tab">
                            <div class="col-12 grid-margin">

                                <!--repr_natural-->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Personales</h5>
                                        <form class="form-sample" id="prop_repr_natural" name="prop_repr_natural" method="POST" action="guarda.php" autocomplete="off" enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="col-sm-3 col-form-label">Nombre:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="nom_repn" name="nom_repn" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-3 col-form-label">Apellido:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ape_repn" name="ape_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <label for="ced_prop" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                        <div class="col-sm-3">
                                                            <select class="form-select" id="nac_repn" name="nac_prop" required>
                                                                <option selected disabled value=""></option>
                                                                <option>V</option>
                                                                <option>E</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="ced_repn" name="ci_prop" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="col-sm-5 col-form-label">Rif:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="rif_repn" name="rif_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-8 col-form-label">Teléfono local:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="loc_repn" name="loc_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="col-sm-9 col-form-label">Celular:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cel_repn" name="cel_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-3 col-form-label">Correo:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cor_repn" name="cor_prop" required>
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
                                                        <input type="text" class="form-control" id="dir_repn" name="dir_prop" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-10 col-form-label">Dirección de oficina:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ofi_repn" name="ofi_prop" required><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title al">Información del Registro</h5>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <label class="col-sm-12 col-form-label">Código:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="nom_repj" name="nom_proj" autofocus required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">Nombre del Registro:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="rif_repj" name="rif_proj" required>
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
                                                <div class="col-md-2">
                                                    <label class="col-sm-9 col-form-label">Expediente:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="tom_pode" name="tom_pode"  value=''  required><br>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            

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
                                                    <label for="rif_docu" class="col-sm-12 col-form-label">Registros</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-sm" id="rep_dcrn" type="file" name="drl_docn" value="" required><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="ref_docu" class="col-sm-12 col-form-label">Referencias Personales</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_dcrn1" type="file" name="ref_docn1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="ref_dcrn2" type="file" name="ref_docn2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <label for="fam_docu" class="col-sm-12 col-form-label">Referencias Familiares</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_dcrn1" type="file" name="fam_docn1" value="" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input class="form-control form-control-sm" id="fam_dcrn2" type="file" name="fam_docn2" value="" required><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="col-12 btn btn-align-center">
                                            <button type="button" class="btn btn-primary">añadir otro</button>
                                            <button type="button" class="btn btn-primary">Guardar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</div>

<script src="js/comunes/combos.js"></script>
<script src="js/alquileres/ingresar_representante.js"></script>