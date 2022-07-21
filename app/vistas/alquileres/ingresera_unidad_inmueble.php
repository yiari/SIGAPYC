<?php 

include("layout/menuNavegacion.php"); 

?>
    <div class="container">

        <div class="card-header">
                <div style="text-align: right;">
                    <ol>               
                        <a class="btn btn-outline-secondary" href="index.php?url=app/vistas/alquileres/inmuebles"  role="button">Atras</a>
                    </ol>
                </div>

                <h4 class="card-title">Unidades</h4> 
            
                 <form class="form-sample" id="ingresar_unidad" name="ingresar_unidad" method="POST" action="guarda.php" autocomplete="off" enctype="multipart/form-data">

                    <!--info_inmueble-->
                    <div class="card">
                        <div class="card-body">
                            <div class="col text-center">
                                <h5 class="card-title">Datos del Inmueble</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="col-sm-12 col-form-label">Código:</label>
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="cod_ainm" name="cod_ainm" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-sm-12 col-form-label">Tipo:</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" id="tip_ainm" name="tip_ainm">
                                            <option selected disabled value=""></option>
                                            <option>Anexo</option>
                                            <option>Apartamento</option>
                                            <option>Local</option>
                                            <option>Oficina</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="col-sm-12 col-form-label">Letra/N°:</label>
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="let_ainm" name="let_ainm" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Nombre del Inmueble:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nom_ainm" name="nom_ainm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Uso del Inmueble:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="act_ainm" name="act_ainm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-sm-12 col-form-label">Antigüedad:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="ant_ainm" name="ant_ainm">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-sm-10 col-form-label">Estado:</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="est_ainm" name="nom_ainm">
                                            <option value="0"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-sm-10 col-form-label">Municipio:</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="mun_ainm" name="mun_ainm">
                                            <option value="0"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-sm-10 col-form-label">Parroquia:</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" id="par_ainm" name="par_ainm">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Imagen:</label>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-sm" id="img_ainm" type="file" id="img_ainm" value=""><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="col-sm-12 col-form-label">Dirección:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="dir_ainm" name="dir_ainm">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label class="col-sm-12 col-form-label">Punto de Referencia:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="ref_ainm" name="pun_ainm">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="row">
                                        <label for="ced_ainm" class="col-sm-12 col-form-label">Equipado</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" id="equ_ainm" name="equ_ainm" required>
                                                <option selected disabled value=""></option>
                                                <option>SI</option>
                                                <option>NO</option>
                                            </select>
                                        </div>
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
                                            <input type="text" class="form-control" id="cod_ainm" name="cod_ainm" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Nombre del Registro:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="act_ainm" name="act_ainm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputfecha" class="col-sm-12 col-form-label">Fecha:</label>
                                    <div class="col-sm-12">
                                        <input type="date" id="fec_ainm" name="fec_ainm" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="col-sm-12 col-form-label">Tomo:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="tom_ainm" name="tom_ainm">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="col-sm-12 col-form-label">Folio:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="fol_ainm" name="fol_ainm">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="col-sm-12 col-form-label">Asiento:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="asi_ainm" name="asi_ainm">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-sm-12 col-form-label">F. Catastral:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="asi_ainm" name="asi_ainm">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="rif_docu" class="col-sm-9 col-form-label">documento</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-sm" id="doc_ainm" type="file" name="doc_ainm" value="" required><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <!--Datos financieros-->
                    <div class="card">
                        <div class="card-body">
                            <div class="col text-center">
                                <h5 class="card-title">Datos Financieros</h5>
                            </div>
                            <div class="col">
                                <h5 class="card-title">Gastos Fijos</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Gasto de Administración:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="adm_ainm" name="adm_ainm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Gasto de Papelería:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pap_ainm" name="pap_ainm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">IVA:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="iva_ainm" name="iva_ainm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">ISRL:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="isr_ainm" name="isr_ainm">
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-3">
                                    <h5 class="card-title">Gastos Especiales</h5>
                                </div>
                            </div>
                            <div class="row">
                                <!--<div class="col-1 btn btn">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#op_gastos_especiales2">+</button>
                                </div>-->
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Servicio:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="ser_ainm" name="ser_ainm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Monto:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="mon_ainm" name="mon_ainm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="ced_prop" class="col-sm-12 col-form-label">Datos Bancarios:</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Datos</span>
                                        <input type="text" placeholder="banco" id="ban_ainm" name="ban_ainm" aria-label="Banco" class="form-control">
                                        <input type="text" placeholder="cuenta" id="cue_ainm" name="cue_ainm" aria-label="N° de Cuenta" class="form-control">
                                        <input type="text" placeholder="doc. ID" id="doc_ainm" name="doc_ainm" aria-label="Doc. Identidad" class="form-control">
                                    </div><br>
                                </div>
                                <div class="col-md-2">
                                    <label for="rif_docu" class="col-sm-9 col-form-label">Autorización:</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-sm" id="aut_ainm" type="file" name="aut_ainm" value=""><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <!--Distribución del Inmueble-->
                    <div class="card">
                        <div class="card-body">
                            <div class="col text-center">
                                <h5 class="card-title">Distribución del Inmueble</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="inputfecha" class="col-sm-12 col-form-label">Terreno:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Mtrs." id="mtr_ainm" name="mtr_ainm" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputfecha" class="col-sm-12 col-form-label">Construido:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Mtrs." id="cons_ainm" name="cons_ainm" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputfecha" class="col-sm-12 col-form-label">Habitaciones:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Nro." id="hab_ainm" name="hab_ainm" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputfecha" class="col-sm-12 col-form-label">Baños:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Nro." id="ban_ainm" name="ban_ainm" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputfecha" class="col-sm-12 col-form-label">Pto. Estacionamiento</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Nro." id="est_ainm" name="est_ainm">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputfecha" class="col-sm-12 col-form-label">Serv. de Paso:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Mtrs." id="ser_ainm" name="ser_ainm">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-sm-12 col-form-label">NOR-OESTE:</label>
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="let_ainm" name="let_ainm" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-sm-12 col-form-label">SUR-OESTE:</label>
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="let_ainm" name="let_ainm" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-sm-12 col-form-label">ESTE:</label>
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="let_ainm" name="let_ainm" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="col-sm-12 col-form-label">OESTE:</label>
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="let_ainm" name="let_ainm" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <!--Documentos del Inmueble-->
                    <div class="card">
                        <div class="card-body">
                            <div class="col text-center">
                                <h5 class="card-title">Documentos Consignados</h5>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="ced_docu" class="col-sm-9 col-form-label">Ficha Catastral:</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-sm" id="fic_ainm" type="file" name="fic_ainm" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="rif_docu" class="col-sm-9 col-form-label">Documento de Propiedad:</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-sm" id="pro_ainm" type="file" name="pro_ainm" value="" required><br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="rif_docu" class="col-sm-9 col-form-label">Planilla Derecho de Frente:</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-sm" id="fre_ainm" type="file" name="fre_ainm" value=""><br>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label for="ref_docu" class="col-sm-12 col-form-label text-center">Servicios</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-sm" id="ser_ainm1" type="file" name="ser_ainm1" value="" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-sm" id="ser_ainm2" type="file" name="ser_ainm2" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-sm" id="ser_ainm3" type="file" name="ser_ainm3" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="modal-footer">
                        <div class="col-12 btn btn-align-center">
                            <button class="btn btn-primary" data-bs-target="#op_inmueble" data-bs-toggle="modal">Guardar</button>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>    




                    