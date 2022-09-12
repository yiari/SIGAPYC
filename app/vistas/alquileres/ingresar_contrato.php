<?php 

include("layout/menuNavegacion.php"); 

?>


<div class="container">

    <div class="card-header">
        <h4 class="card-title">Contrato</h4>
                <div style="text-align: right;">
                    <ol>
                            <a class="btn btn-outline-primary" href="index.php?url=app/vistas/alquileres/contratos" role="button">Atras</a>                
                            
                        </ol>
                    </div>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-local" role="tabpanel" aria-labelledby="nav-local-tab">
                <div class="col-12 grid-margin">
                    <!--local-->
                    <div class="card">
                        <div class="card-body">

                                    <input type="hidden" id="id_prop" name="id_prop" value='0'>
                                    <input type="hidden" id="id_inmu" name="id_inmu" value='0'>
                                    <input type="hidden" id="id_unid" name="id_unid" value='0'>
                                    <input type="hidden" id="id_inqu" name="id_inqu" value='0'>
                                    <input type="hidden" id="tipo_inqui" name="tipo_inqui" value='0'>
                                    <input type="hidden" id="tipo_prop" name="tipo_prop" value='0'>


                            <form class="form-sample" id="buscarCodigo" name="buscarCodigo" method="POST" action="" autocomplete="on">

                                <div class="card">

                                    <div class="card-body">

                                    


                                        <div class="col text-center">
                                                <h5 class="card-title">Representante legal de la administradora</h5>
                                            </div><br>
                                    
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
                                            <h5 class="card-title">Datos del Generales</h5>
                                        </div><br>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-sm-12 col-form-label">Buscar Código inmueble o propietario:</label>
                                            </div>
                                        
                                            <div class="col-md-4">
                                                    <input type="text" class="form-control" id="nom_prop" name="nom_prop">
                                            </div>
                                            <br>
                                            <div class="col-md-2">
                                                    <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                                            </div>                       
                                        </div>

                                    
                                    
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="datosAsignarInmueble">
                                                    <thead>
                                                            <tr>
                                                                <th>Propietario</th>
                                                                <th>Tipo</th>
                                                                <th>Inmueble</th>
                                                                <th>Unidad</th>
                                                                <th>Opcion</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                            </table>
                                        </div>
                                    
                                    </div>
                                </div><br>
                                </form>
                                <!--Datos del propietario-->
                            
                                <!--datos del inquilino-->

                                <form class="form-sample" id="buscarCodigoinquilino" name="buscarCodigoinquilino" method="POST" action="" autocomplete="on">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col text-center">
                                            <h5 class="card-title">Datos del Inquilino</h5>
                                        </div><br>

                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">Buscar Código inquilino</label>
                                                </div>
                                            
                                                <div class="col-md-4">
                                                        <input type="text" class="form-control" id="nom_inqu" name="nom_inqu">
                                                </div>
                                                <br>
                                                <div class="col-md-2">
                                                        <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                                                </div>                       
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped" id="datosinquilino">
                                                        <thead>
                                                                <tr>
                                                                    <th>Inquilino</th>
                                                                    <th>tipo</th>
                                                                    <th>Opcion</th>
                                                                
                                                                </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                </table>
                                            </div>                      
                                        </div>
                                    </div>
                                </div><br>
    
                                </form>



                                <!--Datos del Contrato-->

                                <form class="form-sample" id="registrarcontrato" name="registrarcontrato" method="POST" action="" autocomplete="on">

                                    <input type="hidden" id="hidcontrato" name="hidcontrato" value=''>
                                    <input type="hidden" id="id_usuario" name="id_usuario" value='1'>

                                        <input type="hidden" id="repre_administradora" name="repre_administradora" value='1'>
                                    
                                <div class="card" >
                                    <div class="card-body">
                                        <div class="col text-center">
                                            <h5 class="card-title">Información del Contrato</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                    <label class="col-sm-12 col-form-label">Código Contrato:</label>
                                                    <div class="col-sm-12">
                                                        <input for="registroCodigo" type="text" class="form-control" id="registroCodigo" name="registroCodigo" autofocus readonly  >
                                                    </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-2">
                                                <div class="row">
                                                    <label for="registroCanon" class="col-sm-12 col-form-label">CANON:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="registroCanon" name="registroCanon" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-md-2">
                                                <label for="fec_desd" class="col-sm-12 col-form-label">Desde:</label>
                                                <div class="col-sm-12">
                                                    <input type="date" id="fec_desd" name="fec_desd" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="fec_hast" class="col-sm-12 col-form-label">Hasta:</label>
                                                <div class="col-sm-12">
                                                    <input type="date" id="fec_hast" name="fec_hast" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <label for="dur_cont" class="col-sm-12 col-form-label">Duración:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="dur_cont" name="dur_cont" value="" maxlength="11">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <label for="per_pror" class="col-sm-12 col-form-label">Periodo de Prorroga:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="per_pror" name="per_pror" value="" maxlength="11">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <label for="dia_pago" class="col-sm-12 col-form-label">Día de Pago:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="dia_pago" name="dia_pago" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <label for="pas_cont" class="col-sm-12 col-form-label">A partir de:</label>
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control" id="pas_cont" name="pas_cont" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <label for="ced_prop" class="col-sm-12 col-form-label">Peíodo de Inspección:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="ins_cont" name="ins_cont" value="" maxlength="11">
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
                                                        <input type="text" class="form-control" id="adm_inmu" name="adm_inmu" value="" maxlength="11">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row">
                                                    <label for="ced_prop" class="col-sm-12 col-form-label">Gasto de Papelería:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="pap_inmu" name="pap_inmu" value="1$" readonly="yes">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row">
                                                    <label for="ced_prop" class="col-sm-12 col-form-label">IVA:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="iva_inmu" name="iva_inmu" value="16%"  readonly="yes">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row">
                                                    <label for="ced_prop" class="col-sm-12 col-form-label">ISLR:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="imp_inmu" name="imp_inmu" value="3%" readonly="yes">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row">
                                                    <label for="ced_prop" class="col-sm-12 col-form-label">Depósito:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="dep_cont" name="dep_cont" value="" maxlength="11" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row">
                                                    <label for="com_cont" class="col-sm-12 col-form-label">% Comisión:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="com_cont" name="com_cont" value="" maxlength="11">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <label for="ced_prop" class="col-sm-12 col-form-label">Derecho Hab:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="hab_cont" name="hab_cont" value="" maxlength="11">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <label for="for_pag" class="col-sm-12 col-form-label">Forma de Pago:</label>
                                                            <select class="form-select" id="for_pag" name="for_pag" >
                                                                <option selected disabled value="">Seleccione</option>
                                                                <option value="1">Bolivares</option>
                                                                <option value="2">Dolares</option> 
                                                            </select>
                                                </div>
                                            </div>
                                        <!-- <div class="col-md-3">
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
                                            </div>-->
                                        </div>
                                    </div>
                                </div><br>

                                <div class="container">
                                    <div class="col-12 btn btn-align-center">
                                        <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                                        <!--button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#op_contrato">Guardar</button-->
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


<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>

<script src="js/comunes/combos.js"></script>
<script src="js/comunes/generadorcodigos.js"></script>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/ingresar_contrato.js"></script>
