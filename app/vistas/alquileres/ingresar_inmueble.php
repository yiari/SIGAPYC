
<?php 

include("layout/menuNavegacion.php"); 

?>

<div class="container">
    <h4 class="card-title">Inmuebles</h4><br>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-Inmueble-tab" data-bs-toggle="tab" data-bs-target="#nav-Inmueble" type="button" role="tab" aria-controls="nav-edificio" aria-selected="true">Inmueble</button>
        </div>
    </nav>

    <form class="form-sample" id="info_propinmu" name="info_propinmu" method="POST" action="" autocomplete="off" enctype="multipart/form-data">

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-info_propinmu" role="tabpanel" aria-labelledby="nav-info_propinmu-tab">
                <div class="col-12 grid-margin">
                    <input type="hidden" id="operacion" name="operacion" enctype="multipart/form-data">

                    <!--Datos del propietario-->
                    <div class="card" id="Propietario">

                        
                                
                                <div class="card-body">
                                    <div class="col text-center">
                                        <h5 class="card-title">Datos del Propietario</h5>
                                    </div>
</br>
                                    <div class="row">
                                       <div class="col-md-3">
                                            <label class="col-sm-12 col-form-label">Buscar Código Propietario:</label>
                                            
                                        </div>
                                    
                                        <div class="col-md-3">
                                            <div class="col-sm-12">
                                                <select class="form-control" id="id_prop" name="id_prop" style="width:400px" required autofocus>
                                                    <option selected disabled value=""></option>               
                                                
                                                </select>
                                            </div>
                                        </div>
                                    </div>
</br>
                                    <div class="row">
                                        
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
                                        <div class="col-md-3">
                                            <div class="row">
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                <div class="col-sm-3">
                                                    <select class="form-select" id="nac_prop" name="nac_prop" readonly="yes">
                                                        <option selected disabled value=""></option>
                                                        <option>V</option>
                                                        <option>E</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="ci_prop" name="ci_prop" readonly="yes">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="col-sm-5 col-form-label">Rif:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="rif_prop" name="rif_prop" readonly="yes">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="col-sm-8 col-form-label">Teléfono local:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="loc_prop" name="loc_prop" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="col-sm-9 col-form-label">Celular:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="cel_prop" name="cel_prop" readonly="yes">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-sm-3 col-form-label">Correo:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="cor_prop" name="cor_prop" readonly="yes">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                    <!--info_propietario-->
                    <div class="card">
                        <div class="card-body">
                            

                            <div class="card-header">

                                <div style="text-align: right;">
                                <ol>
                                        <a class="btn btn-outline-primary" href="index.php?url=app/vistas/alquileres/ingresar_beneficiarios" role="button">Nuevo</a>                
                                        <!--a class="btn btn-outline-secondary" href="reportes.php"  role="button">Imprimir</a-->
                                    </ol>
                                </div>
        
        <!--tabla-->
                                <div class="card mb-4">
                                    <div class="card-header">
                                    <i class="fa-solid fa-city"></i>&nbsp;
                                        BENEFICIARIOS
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>

                                                    <th>Codigo:</th>
                                                    <th>Doc. Identidad:</th>
                                                    <th>Nombre o Razón social:</th>
                                                    <th>Celular</th>
                                                   
                                                    <th>correo</th>
                                                    <th>% Part</th>
                                                    <th>Doc / Editar</th>
                                            
                        
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>

                                                    <th>Id</th>
                                                    <th>Doc. Identidad:</th>
                                                    <th>Nombre o Razón social:</th>
                                                    <th>Celular:</th>
                                                    <th>correo:</th>
                                                    <th >% Part</th>
                                                    <th>Doc / Editar</th>                        
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td> 

                                                                <div class="col-sm-4">
                                                                    <input type="number" class="form-control" id="por_ipro" name="por_ipro" value=0 required>
                                                                </div>
                                                           
                                                            </td>
                                                            <td>
                                                                <div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">

                                                                    <a href="#" title="Editar"><i class="fas fa-edit" ></i></a>&nbsp;

                                                                </div>

                                                            </td>

                                                    
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div></br>

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
                                            <input type="text" class="form-control" id="cod_inmu" name="cod_inmu" value='' required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-sm-12 col-form-label">Tipo:</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" id="tip_inmu" name="tip_inmu">
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
                                            <input type="text" class="form-control" id="let_inmu" name="let_inmu" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Nombre del Inmueble:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" value='' id="nom_inmu" name="nom_inmu">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Uso del Inmueble:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="act_inmu" name="act_inmu">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-sm-12 col-form-label">Antigüedad:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" value='' id="ant_inmu" name="ant_inmu">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            
                                    <div class="col-md-3">
                                        <label for="cboEstados" class="col-sm-10 col-form-label">Estado:</label></br>
                                        <div class="col-sm-12">
                                            <select class="form-control"  id="cboEstados" name="cboEstados"></select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cboMunicipios" class="col-sm-10 col-form-label">Municipio:</label></br>
                                        <div class="col-sm-12">
                                            <select class="form-control"  id="cboMunicipios" name="cboMunicipios"></select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cboParroquia" class="col-sm-10 col-form-label">Parroquia:</label></br>
                                        <div class="col-sm-12">
                                            <select class="form-control"  id="cboParroquia" name="cboParroquia"></select>
                                        </div>
                                    </div>

                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Imagen:</label>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-sm" id="img_inmu" type="file" name="img_inmu"><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="col-sm-12 col-form-label">Dirección:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="dir_inmu" name="dir_inmu" value=''>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="col-sm-12 col-form-label">Punto de Referencia:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="ref_inmu" name="ref_inmu" value=''>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <label for="equ_inmu" class="col-sm-12 col-form-label">Equipado</label>
                                            <div class="col-sm-12">
                                                <select class="form-select" id="equ_inmu" name="equ_inmu" required>
                                                    <option selected disabled value=""></option>
                                                    <option>SI</option>
                                                    <option>NO</option>
                                                </select>
                                            </div>
                                        </div>
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
                                            <input type="text" class="form-control" placeholder="Mtrs." id="mtr_inmu" name="mtr_inmu" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputfecha" class="col-sm-12 col-form-label">Construido:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Mtrs." id="cons_inmu" name="cons_inmu" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputfecha" class="col-sm-12 col-form-label">Habitaciones:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Nro." id="hab_inmu" name="hab_inmu" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputfecha" class="col-sm-12 col-form-label">Baños:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Nro." id="ban_inmu" name="ban_inmu" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputfecha" class="col-sm-12 col-form-label">Pto. Estacionamiento</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Nro." id="est_inmu" name="est_inmu">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputfecha" class="col-sm-12 col-form-label">Serv. de Paso:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Mtrs." id="ser_inmu" name="ser_inmu">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="col-sm-12 col-form-label">NOR-OESTE:</label>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="let_inmu" name="let_inmu" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-sm-12 col-form-label">SUR-OESTE:</label>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="let_inmu" name="let_inmu" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-sm-12 col-form-label">ESTE:</label>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="let_inmu" name="let_inmu" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-sm-12 col-form-label">OESTE:</label>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="let_inmu" name="let_inmu" required>
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
                                                <input type="text" class="form-control" id="id_prod" name="id_prod" value='' required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <label for="ced_prop" class="col-sm-12 col-form-label">Nombre del Registro:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="act_inmu" name="act_inmu" value=''>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputfecha" class="col-sm-12 col-form-label">Fecha:</label>
                                        <div class="col-sm-12">
                                            <input type="date" id="fec_inmu" name="fec_inmu" value='' class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <label class="col-sm-12 col-form-label">Tomo:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="tom_inmu" name="tom_inmu" value=''>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <label class="col-sm-12 col-form-label">Folio:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="fol_inmu" name="fol_inmu">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <label class="col-sm-12 col-form-label">Asiento:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="asi_inmu" name="asi_inmu">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-sm-12 col-form-label">F. Catastral:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="asi_inmu" name="asi_inmu">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="rif_docu" class="col-sm-9 col-form-label">documento</label>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-sm" id="doc_inmu" type="file" name="doc_inmu" value="" required><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></br>

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
                                                <input type="number" class="form-control" id="adm_inmu" name="adm_inmu">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <label for="ced_prop" class="col-sm-12 col-form-label">Gasto de Papelería:</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="pap_inmu" name="pap_inmu">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></br>
                 
                          
               
                   
                    <div class="card">
                        <div class="card-body">
                            <div class="col text-center">
                                <h5 class="card-title">Documentos Consignados</h5>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="ced_docu" class="col-sm-9 col-form-label">Ficha Catastral:</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-sm" id="fic_inmu" type="file" name="fic_inmu" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="rif_docu" class="col-sm-9 col-form-label">Documento de Propiedad:</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-sm" id="pro_inmu" type="file" name="pro_inmu" value="" required><br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="rif_docu" class="col-sm-9 col-form-label">Planilla Derecho de Frente:</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-sm" id="fre_inmu" type="file" name="fre_inmu" value=""><br>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label for="ref_docu" class="col-sm-12 col-form-label text-center">Servicios</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-sm" id="ser_inmu1" type="file" name="ser_inmu1" value="" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-sm" id="ser_inmu2" type="file" name="ser_inmu2" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-sm" id="ser_inmu3" type="file" name="ser_inmu3" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                </div>
            </div>
            <div class="container">
                <div class="col-12 btn btn-align-center">
                 
                       <button id="guardarim" class="btn btn-primary" type="submit" >Guardar</button>
              
                </div>
            </div>    
        </form>
    <div class="container">
        <!--div class="col-12 btn btn-align-center">
            <a class="btn btn-primary" href="ingresar_inquilinos.php" role="button">Añadir Inquilino</a>           
            <a class="btn btn-primary" href="repmandato.php?id_prop=<?php /*echo $id_prop*/ ?> "  target='_blank'role="button">Imprimir Mandato</a> 
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#varias_unidades">Añadir Unidades</button>

        </div-->
    </div>

    
</div>

<script src="js/comunes/combos.js"></script>