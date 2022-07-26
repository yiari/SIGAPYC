<?php 

include("layout/menuNavegacion.php"); 

?>


<div class="container">
    <h4 class="card-title">Contrato</h4>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-local-tab" data-bs-toggle="tab" data-bs-target="#nav-local" type="button" role="tab" aria-controls="nav-local" aria-selected="true">LOCAL</button>

        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-local" role="tabpanel" aria-labelledby="nav-local-tab">
            <div class="col-12 grid-margin">
                <!--local-->
                <div class="card">
                    <div class="card-body">
                        <form class="form-sample" id="local" name="local" method="POST"  autocomplete="off" enctype="multipart/form-data">
                            <input type="hidden" name="cod_cont">
                            <!--datos del inmueble-->
                            <div class="card">
                                <div class="card-body">
                                       <div class="col text-center">
                                            <h5 class="card-title">Representante legal de la administradora</h5>
                                        </div>
                                   <div class="row">
                                        <div class="col-md-4">
                                            <label for="cboRepresentante" class="col-sm-10 col-form-label">Codigo:</label></br>
                                            <div class="col-sm-12">
                                                <select class="form-control"  id="cboRepresentante" name="cboRepresentante"></select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="" name="" readonly="yes">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Rif:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="" name="" readonly="yes">
                                                </div>
                                            </div>
                                        </div>
                                     </div>

                                </div>
                            </div>

</br>

                            <div class="card">
                                <div class="card-body"> 
                                    <div class="col text-center">
                                        <h5 class="card-title">Datos del Inmueble</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="col-sm-12 col-form-label">Código:</label>
                                          
                                            <div class="col-sm-12">
                                                <select class="form-control" id="cod_inmu" name="cod_inmu"  required autofocus>
                                        
                                                    <option selected disabled value=""></option>               
                                                </select>

                                            </div>
                                            
                                        </div>
                                       
                                        <div class="col-md-2">
                                            <label class="col-sm-12 col-form-label">Tipo:</label>
                                            <div class="col-sm-12">
                                               <input type="text" class="form-control" id="tip_inmu" name="tip_inmu" readonly="yes">
                                              
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <label class="col-sm-12 col-form-label">Letra/N°:</label>
                                            <div class="col-sm-12">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="let_inmu" name="let_inmu" readonly="yes">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Actividad / Uso del Inmueble:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="act_inmu" name="act_inmu" readonly="yes">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="col-sm-12 col-form-label">Antigüedad:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="ant_inmu" name="ant_inmu" readonly="yes">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="inputfecha" class="col-sm-12 col-form-label">Terreno:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" placeholder="Mtrs." id="mtr_inmu" name="mtr_inmu" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="inputfecha" class="col-sm-12 col-form-label">Construido:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" placeholder="Mtrs." id="mtr_cons" name="mtr_cons" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="col-sm-12 col-form-label">Ubicación:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="dir_inmu" name="dir_inmu" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-sm-12 col-form-label">NORTE:</label>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="lim_nort" name="lim_nort" readonly="yes">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-sm-12 col-form-label">SUR:</label>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="lim_sur" name="lim_sur" readonly="yes">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-sm-12 col-form-label">ESTE:</label>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="lim_este" name="lim_este" readonly="yes">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-sm-12 col-form-label">OESTE:</label>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="lim_oest" name="lim_oest" readonly="yes">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="col text-center">
                                        <h5 class="card-title">Registro</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <label class="col-sm-12 col-form-label">Número:</label>
                                            <div class="col-sm-12">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="num_regi" name="num_regi" readonly="yes">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Nombre del Registro:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="nom_regi" name="nom_regi" readonly="yes">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="inputfecha" class="col-sm-12 col-form-label">Fecha:</label>
                                            <div class="col-sm-12">
                                                <input type="date" id="fec_regi" name="fec_regi" class="form-control" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <label class="col-sm-12 col-form-label">Tomo:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="tom_regi" name="tom_regi" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <label class="col-sm-12 col-form-label">Folio:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="fol_regi" name="fol_regi" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <label class="col-sm-12 col-form-label">Asiento:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="asi_regi" name="asi_regi" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="col-sm-12 col-form-label">F. Catastral:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="fic_cata" name="fic_cata" readonly="yes">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            
                            <!--Datos del propietario-->
                            <div class="card" id="Propietario">
                                <div class="card-body">
                                    <div class="col text-center">
                                        <h5 class="card-title">Datos del Propietario</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="col-sm-12 col-form-label">Código:</label>
                                        
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="nom_prop" name="nom_prop" readonly="yes">
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <label class="col-sm-12 col-form-label">Nombre:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="nom_prop" name="nom_prop" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="col-sm-12 col-form-label">Apellido:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="ape_prop" name="ape_prop" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="ci_prop" name="ci_prop" readonly="yes">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label class="col-sm-5 col-form-label">Rif:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="rif_prop" name="rif_prop" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-sm-8 col-form-label">Teléfono local:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="loc_prop" name="loc_prop" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-sm-9 col-form-label">Celular:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="cel_prop" name="cel_prop" readonly="yes">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="col-sm-3 col-form-label">Correo:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="cor_prop" name="cor_prop" readonly="yes">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <!--datos del inquilino-->
                            <div class="card">
                                <div class="card-body">
                                    <div class="col text-center">
                                        <h5 class="card-title">Datos del Inquilino</h5>
                                    </div>
                                    <div class="row">
                                        

                                        <div class="col-md-4">
                                            <label for="cboinquilino" class="col-sm-10 col-form-label">Codigo:</label></br>
                                            <div class="col-sm-12">
                                                <select class="form-control"  id="cboinquilino" name="cboinquilino"></select>
                                            </div>
                                        </div>
                                           
                                        <div class="col-md-8">
                                            <label class="col-sm-12 col-form-label">Nombre o Razón social:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="nom_inqu" name="nom_inqu" readonly="yes">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="inputfecha" class="col-sm-12 col-form-label">Rif/Cedula :</label>
                                            <div class="col-sm-12">
                                                <input type="text" id="ci_inqu" name="ci_inqu" class="form-control" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="col-sm-12 col-form-label">Teléfono:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="tel_inqu" name="tel_inqu" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-sm-12 col-form-label">Correo:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="cor_inqu" name="cor_inqu" readonly="yes">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div><br>




                            <!--Datos del Contrato-->
                            <div class="card" >
                                <div class="card-body">
                                    <div class="col text-center">
                                        <h5 class="card-title">Información del Contrato</h5>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-2">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">CANON:</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="can_cont" name="can_cont" value="">
                                                </div>
                                            </div>
                                        </div>
                                       <div class="col-md-2">
                                            <label for="inputfecha" class="col-sm-12 col-form-label">Desde:</label>
                                            <div class="col-sm-12">
                                                <input type="date" id="fec_desd" name="fec_desd" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="inputfecha" class="col-sm-12 col-form-label">Hasta:</label>
                                            <div class="col-sm-12">
                                                <input type="date" id="fec_hast" name="fec_hast" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Duración:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="dur_cont" name="dur_cont" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Periodo de Prorroga:</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="per_pror" name="per_pror" value="">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Día de Pago:</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="dia_pago" name="dia_pago" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">A partir de:</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" id="pas_cont" name="pas_cont" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Peíodo de Inspección:</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="ins_cont" name="ins_cont" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Fecha del Contrato:</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" id="fec_cont" name="fec_cont" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <!--Datos financieros-->
                            <div class="card">
                                <div class="card-body">
                                    <div class="col text-center">
                                        <h5 class="card-title">Datos Financieros / Gastos Fijos</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Gasto Administrativo:</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="adm_inmu" name="adm_inmu" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Gasto de Papelería:</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="pap_inmu" name="pap_inmu" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">IVA:</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="iva_inmu" name="iva_inmu" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">ISLR:</label>
                                                <div class="col-sm-12">
                                                    <input type="number" class="form-control" id="imp_inmu" name="imp_inmu" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Depósito:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="dep_cont" name="dep_cont" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">% Comisión:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="com_cont" name="com_cont" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Derecho Hab:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="hab_cont" name="hab_cont" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Forma de Pago:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="for_cont" name="for_cont" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">N° Retención:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="ret_cont" name="ret_cont" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">% retención:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="por_rete" name="por_rete" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <div class="container">
                                <div class="col-12 btn btn-align-center">
                                    <button id="guradarc" class="btn btn-primary" type="submit" >Guardar</button>

                                    <!--button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#op_contrato">Guardar</button-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--modal-->
    
</div>

 <script src="js/comunes/combos.js"></script>
 <script src="js/alquileres/ingresar_contrato.js"></script>
