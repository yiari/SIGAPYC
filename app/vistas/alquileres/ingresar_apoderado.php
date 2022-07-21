<?php 

include("layout/menuNavegacion.php"); 

?>

<!--  aqui puedo ver normal la pantalla-->
    <div class="container">

        <div class="card-header">
            
                    <div style="text-align: right;">
                        <ol>          
                            <a class="btn btn-outline-secondary" href="index.php?url=app/vistas/alquileres/apoderado"  role="button">Atras</a>
                        </ol>
                    </div>
        

                <h4 class="card-title">Apoderado</h4>

                   
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link" id="nav-apo_natural-tab" data-bs-toggle="tab" data-bs-target="#nav-apo_natural" type="button" role="tab" aria-controls="nav-apo_natural" aria-selected="true">Apoderado</button>
                            
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-bene_natural" role="tabpanel" aria-labelledby="nav-bene_natural-tab">
                            <div class="col-12 grid-margin">

                                <!--apo_natural-->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos Personales</h5>
                                        <form class="form-sample" id="prop_apo_natural" name="prop_apo_natural" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                                          
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
                                                            <input type="text" class="form-control" id="num_cuen" name="num_cuen" value=''><br>
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
                                                            <input type="text" class="form-control" id="" name="" >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Agencia:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="" name="" >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">DC:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="" name="" ><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-12 col-form-label">Cuenta:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="" name="" ><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-12 col-form-label">IBAN:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="" name="" ><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-12 col-form-label">BIC o SWIFT:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="" name="" ><br>
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
                                                     
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 btn btn-align-center">
                                                  
                                                 
                                                       <button class="btn btn-primary" type="submit" onclick="">Guardar</button>
                                         
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
    </div>

    <script src="js/comunes/combos.js"></script>
    <script src="js/alquileres/ingresar_apoderado.js"></script>




