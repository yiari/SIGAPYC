
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

           <h4 class="card-title">Inmuebles</h4><br>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-Inmueble-tab" data-bs-toggle="tab" data-bs-target="#nav-Inmueble" type="button" role="tab" aria-controls="nav-edificio" aria-selected="true">Inmueble</button>
                </div>
            </nav>

        <form class="form-sample" id="registroinmueble" name="registroinmueble" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                
                <input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                <input type="hidden" id="id_prop" name="id_prop" value='1'>
                <input type="hidden" id="hidinmueble" name="hidinmueble" value=''>
                

                <input type="hidden" id="registroCodigo" name="registroCodigo" value='IN-'>
        
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
                                                <select class="form-control" id="" name="" style="width:400px" >
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
                                                <label for="ced_prop" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="ci_prop" name="ci_prop" readonly="yes">
                                                </div>
                                        </div>
                                        <div class="col-md-3">
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
                  

                    <!--info_inmueble-->
                    <div class="card">
                        <div class="card-body">
                            <div class="col text-center">
                                <h5 class="card-title">Datos del Inmueble</h5>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="col-sm-12 col-form-label">Código:</label>
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="" name="" autofocus readonly="yes" >
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                
                                <div class="col-md-3">
                                        <label for="cboinmueble" class="col-sm-10 col-form-label">Tipo de inmuebles:</label></br>
                                        <div class="col-sm-12">
                                            <select class="form-control"  id="cboinmueble" name="cboinmueble"></select>
                                        </div>
                                    </div>
                                <div class="col-md-1">
                                    <label  for="registroletra" class="col-sm-12 col-form-label">Letra/N°:</label>
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="registroletra" name="registroletra">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="registrNombre" class="col-sm-12 col-form-label">Nombre del Inmueble:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"  id="registrNombre" name="registrNombre">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <label for="registroUso" class="col-sm-12 col-form-label">Uso del Inmueble:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="registroUso" name="registroUso">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for = "registroAntiguedad" class="col-sm-12 col-form-label">Antigüedad:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="registroAntiguedad" name="registroAntiguedad">
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

                                
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for ="registroDirecionH" class="col-sm-12 col-form-label">Dirección:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="registroDirecionH" name="registroDirecionH">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="pun_inmu" class="col-sm-12 col-form-label">Punto de Referencia:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="pun_inmu" name="pun_inmu" >
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <label for="equ_inmu" class="col-sm-12 col-form-label">Equipado</label>
                                            <div class="col-sm-12">
                                                <select class="form-select" id="equ_inmu" name="equ_inmu" >
                                                    <option selected disabled value=""></option>
                                                    <option  value="1">SI</option>
                                                    <option  value="2">NO</option>
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
                                        <label for="mtr_inmu" class="col-sm-12 col-form-label">Terreno:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Mtrs." id="mtr_inmu" name="mtr_inmu" >
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="mtr_cons" class="col-sm-12 col-form-label">Construido:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Mtrs." id="mtr_cons" name="mtr_cons" >
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="hab_inmu" class="col-sm-12 col-form-label">Habitaciones:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Nro." id="hab_inmu" name="hab_inmu">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ban_inmu" class="col-sm-12 col-form-label">Baños:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Nro." id="ban_inmu" name="ban_inmu" >
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="est_inmu" class="col-sm-12 col-form-label">Pto. Estacionamiento</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Nro." id="est_inmu" name="est_inmu">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ser_inmu" class="col-sm-12 col-form-label">Serv. de Paso:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Mtrs." id="ser_inmu" name="ser_inmu">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="lim_nort" class="col-sm-12 col-form-label">NOR-OESTE:</label>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="lim_nort" name="lim_nort">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label  for="lim_sur" class="col-sm-12 col-form-label">SUR-OESTE:</label>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="lim_sur" name="lim_sur" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="lim_este" class="col-sm-12 col-form-label">ESTE:</label>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="lim_este" name="lim_este" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="lim_oest" class="col-sm-12 col-form-label">OESTE:</label>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="lim_oest" name="lim_oest" >
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
                                    <div class="col-md-2">
                                        <label for="num_regi" class="col-sm-12 col-form-label">Código:</label>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="num_regi" name="num_regi" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <label for="nom_regi" class="col-sm-12 col-form-label">Nombre del Registro:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="nom_regi" name="nom_regi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="fec_regi" class="col-sm-12 col-form-label">Fecha:</label>
                                        <div class="col-sm-12">
                                            <input type="date" id="fec_regi" name="fec_regi"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="tom_regi" class="col-sm-12 col-form-label">Tomo:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="tom_regi" name="tom_regi">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="fol_regi" class="col-sm-12 col-form-label">Folio:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="fol_regi" name="fol_regi">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="asi_regi" class="col-sm-12 col-form-label">Asiento:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="asi_regi" name="asi_regi">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="fic_cata" class="col-sm-12 col-form-label">F. Catastral:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="fic_cata" name="fic_cata">
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
                                <h5 class="card-title">Fotos del inmueble </h5>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Imagen:</label>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-sm" id="img_inmu" type="file" name="img_inmu"><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Imagen:</label>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-sm" id="img_inmu" type="file" name="img_inmu"><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Imagen:</label>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-sm" id="img_inmu" type="file" name="img_inmu"><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                          
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Imagen:</label>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-sm" id="img_inmu" type="file" name="img_inmu"><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Imagen:</label>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-sm" id="img_inmu" type="file" name="img_inmu"><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <label for="ced_prop" class="col-sm-12 col-form-label">Imagen:</label>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-sm" id="img_inmu" type="file" name="img_inmu"><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  </br>   
               
                   
                    <div class="card">
                        <div class="card-body">
                            <div class="col text-center">
                                <h5 class="card-title">Documentos Consignados</h5>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="fica_docu" class="col-sm-9 col-form-label">Ficha Catastral:</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-sm" id="fica_docu" type="file" name="fica_docu" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="propi_docu" class="col-sm-9 col-form-label">Documento de Propiedad:</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-sm" id="propi_docu" type="file" name="propi_docu"><br>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="derfren_docu" class="col-sm-9 col-form-label">Planilla Derecho de Frente:</label>
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-sm" id="derfren_docu" type="file" name="derfren_docu"><br>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label for="serv_docu" class="col-sm-12 col-form-label text-center">Servicios</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-sm" id="serv_docu" type="file" name="serv_docu" >
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-sm" id="serv_docu1" type="file" name="serv_docu1">
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-sm" id="serv_docu2" type="file" name="serv_docu2">
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
                 
                <button type="submit" class="btn btn-primary mb-2">Guardar</button>
              
                </div>
            </div>    
        </form>
    </div>
    
</div>
<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>

<script src="js/comunes/combos.js"></script>
<script src="js/comunes/generadorcodigos.js"></script>
<script src="js/alquileres/ingresar_inmuebles.js"></script>


