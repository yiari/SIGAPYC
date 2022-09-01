<?php 

include("layout/menuNavegacion.php"); 

?>

<div class="container">

    <div class="card-header">
            
                    <div style="text-align: right;">
                        <ol>          
                            <a class="btn btn-outline-secondary" href="index.php?url=app/vistas/alquileres/aviso_cobro"  role="button">Atras</a>
                        </ol>
                    </div>


                    <div style="text-align: left;">
                    <span id="lblAvisoCobro"><strong>AVISO DE COBRO : </strong></span>
                    <br/><br/>
                </div>

              
           <h4 class="card-title">Gestion del Cliente</h4><br>
           

            <form class="form-sample" id="" name="" method="POST" action="" autocomplete="off" >

                            <input type="hidden" id="id_usuario" name="id_usuario" value='1'>
                            <input type="hidden" id="hidinquilino" name="hidinquilino" value=''>

                 <!--Datos del propietario-->
                <div class="card" >
                                
                <div class="card-body">
                    <div class="col text-center">
                        <h5 class="card-title">Datos del inquilino</h5>
                    </div>
                </br>
                    
                </br>
                    <div class="row">

                       <div class="col-md-6">
                            <label for="registroCodigo" class="col-sm-12 col-form-label">Codigo:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="registroCodigo" name="registroCodigo" readonly="yes">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for ="registroNombre" class="col-sm-12 col-form-label">Nombre y Apellido:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="registroNombre" name="registroNombre" readonly="yes">
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="registroTelefono" class="col-sm-8 col-form-label">Teléfono local:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="registroTelefono" name="registroTelefono" readonly="yes">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="registroCelular" class="col-sm-9 col-form-label">Celular:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="registroCelular" name="registroCelular" readonly="yes">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="registroEmail" class="col-sm-3 col-form-label">Correo:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="registroEmail" name="registroEmail" readonly="yes">
                            </div>
                        </div>
                    </div>
                </div>
                <form>
                </div><br>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-bene_natural-tab" data-bs-toggle="tab" data-bs-target="#nav-bene_natural" type="button" role="tab" aria-controls="nav-bene_natural" aria-selected="true">Gestion de respuestas</button>
                            <button class="nav-link" id="nav-juridica_bene-tab" data-bs-toggle="tab" data-bs-target="#nav-juridica_bene" type="button" role="tab" aria-controls="nav-juridica_bene" aria-selected="false">Registro de Pagos</button>
                        </div>
                    </nav>
              
                    

                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-bene_natural" role="tabpanel" aria-labelledby="nav-bene_natural-tab">
                            <div class="col-12 grid-margin">
                                <form class="form-sample" id="registrorespuesta" name="registrorespuesta" method="POST" action="" autocomplete="off" >

                                             <input type="hidden" id="id_usuario" name="id_usuario" value='1'>
                                             <input type="hidden"  id="hidrespuesta" name="hidrespuesta" value='' >
                                             <input type="hidden" id="id_aviso" name="id_aviso" value="0">

                                    <!--bene_natural-->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="input-group">
                                                <span class="input-group-text">Estatus Gestion</span>
                                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                            <div class="container">
                                                <div class="col-12 btn btn-align-center">
                                                
                                                    <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                                            
                                                </div>
                                            </div> 

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-juridica_bene" role="tabpanel" aria-labelledby="nav-juridica_bene-tab">
                            <div class="col-12 grid-margin">

                            <div class="card">
                                    <div class="card-body">
                                        <form class="form-sample" id="" name="" method="POST" action="" autocomplete="off" >
                                                <div class="row">

                                                      <div class="col-sm-4">
                                                            <select class="form-select" id="registroNacionalidad" name="registroNacionalidad">
                                                                <option selected disabled value="">seleccione tipo pago</option>
                                                                <option value="1">Abono</option>
                                                                <option value="2">Total</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-sm-4">
                                                            <select class="form-select" id="registroNacionalidad" name="registroNacionalidad">
                                                                <option selected disabled value="">seleccione un metodo de pago</option>
                                                                <option value="1">Transferencia</option>
                                                                <option value="2">Pago movil</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <select class="form-select" id="registroNacionalidad" name="registroNacionalidad">
                                                                <option selected disabled value="">seleccione la moneda</option>
                                                                <option value="1">Divisa</option>
                                                                <option value="2">Bolivares</option>
                                                            </select>
                                                        </div>
                                                </div><br>
                                           

                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos cuentas Nacionales</h5>
                                                </div>
                                                <div class="row">
                                                    
                                                        <div class="col-md-4">
                                                            <div class="col-sm-12">
                                                                <select class="form-control"  id="cboBancoN" name="cboBancoN"></select>
                                                            </div>
                                                       </div>
                                                       <div class="col-sm-4">
                                                            <input for=""  type="text" class="form-control" id="" name="" placeholder="No de referencia:">
                                                        </div>
  
                                                        <div class="col-md-4">
                                                                <input type="text" class="form-control" id="num_cuenj" name="num_cuenj" placeholder="Monto:">
                                                      
                                                        </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Pago Movil</span>
                                                            <select class="form-control"  id="cboBancop" name="cboBancop"></select>
                                                            <input type="text" placeholder="cedula" id="ced_pmovj" name="ced_pmovj" aria-label="Cédula" value='' class="form-control">
                                                            <input type="text" placeholder="celular" id="cel_pmovj" name="cel_pmovj" aria-label="Celular" value='' class="form-control">
                                                            <input type="text" placeholder="Monto" id="cel_pmovj" name="cel_pmovj" aria-label="Celular" value='' class="form-control">
                                                        </div><br>
                                                    </div>  
                                                </div>

                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos cuentas Internacionales</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="ban_extrj" class="col-sm-10 col-form-label">Banco Extranjero:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="ban_extrj" name="ban_extrj" >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="age_extrj" class="col-sm-12 col-form-label">Monto:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="age_extrj" name="age_extrj" >

                                                        </div>
                                                    </div>
       
                                                </div><br>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Cuenta Paypal:</span>
                                                            <input type="text" class="form-control" placeholder="correo" id="cor_paypj" name="cor_paypj" >
                                                             <input type="text" class="form-control" placeholder="monto" id="cor_paypj" name="cor_paypj" >
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Cuenta Zelle</span>
                                                            <input type="text" class="form-control" placeholder="telefono" id="tel_zellej" name="tel_zellej" >
                                                            <input type="text" class="form-control" placeholder="correo" id="cor_zellej" name="cor_zellej" >
                                                            <input type="text" class="form-control" placeholder="nombre" id="nom_zellej" name="nom_zellej" >
                                                            <input type="text" class="form-control" placeholder="monto" id="nom_zellej" name="nom_zellej" >
                                                        </div>
                                                    </div>

                                                </div>
                                            
                                      
                                        </div>
                                        <div class="container">
                                                <div class="col-12 btn btn-align-center">
                                                
                                                    <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                                            
                                                </div>
                                            </div> 
                                        
                                    <form>
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
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/ingresar_gestioncliente.js"></script>

