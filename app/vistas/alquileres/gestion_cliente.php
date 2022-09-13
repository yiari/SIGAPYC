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

                  

                   <div style="text-align: left;">
                        <span id="lblMonto"><strong>MONTO : </strong></span>
                      <br/><br/>
                   </div>

                  

              
                    <h4 class="card-title">Gestion del Cliente</h4><br>
           

                    <form class="form-sample" id="" name="" method="POST" action="" autocomplete="off" >

                                    
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
                    </form>


                <br>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-bene_natural-tab" data-bs-toggle="tab" data-bs-target="#nav-bene_natural" type="button" role="tab" aria-controls="nav-bene_natural" aria-selected="true">Gestion de respuestas</button>
                           <!-- <button class="nav-link" id="nav-pago-abono-tab" data-bs-toggle="tab" data-bs-target="#nav-pago-abono" type="button" role="tab" aria-controls="nav-pago-abono" aria-selected="false">Abono de Pagos</button>-->
                        </div>
                    </nav>          <input type="hidden" id="id_usuario" name="id_usuario" value='1'>
                                    <input type="hidden" id="id_aviso" name="id_aviso" value="0">
                                    <input type="hidden" id="id_inmu" name="id_inmu" value='0'>
                                    <input type="hidden" id="id_unid" name="id_unid" value='0'>
                                    <input type="hidden" id="id_inqu" name="id_inqu" value='0'>

                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-bene_natural" role="tabpanel" aria-labelledby="nav-bene_natural-tab">
                            <div class="col-12 grid-margin">
                                <form class="form-sample" id="registrarespuestas" name="registrarespuestas" method="POST" action="" autocomplete="off" >

                                            
                                             <input type="hidden"  id="hidrespuesta" name="hidrespuesta" value='' >
                                             

                                    <!--bene_natural-->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="input-group">
                                                <span class="input-group-text">Estatus Gestion</span>
                                                    <textarea  id="registrorespuesta" name="registrorespuesta" class="form-control" aria-label="With textarea"></textarea>
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

                       
                        
                        <div class="tab-pane fade" id="nav-pago-abono" role="tabpanel" aria-labelledby="nav-pago-abono-tab">
                            <div class="col-12 grid-margin">
                                <form class="form-sample" id="registrarabono" name="registrarabono" method="POST" action="" autocomplete="off" >
                                    <div class="card">
                                        <div class="card-body">
                                            
                                        
                                                    <input type="hidden" id="hidabono" name="hidabono" value="">
                                                    <input type="hidden" id="id_tranferencia" name="id_tranferencia" value="">
                                                    <input type="hidden" id="id_movil" name="id_movil" value="">
                                                    
                                                    <div class="col text-center">
                                                        <h5 class="card-title">Ingresar un abono</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12  ">
                                                          
                                                            <div class="input-group-prepend">
                                                                <div class="col-sm-12 ">
                                                                    
                                                                    <div class="col-sm-4">
                                                                            
                                                                            <input type="checkbox" id="chktranferencia" name="chktranferencia"  onchange="checkAgregarTranferencia();">
                                                                            <label for="transferencia">Tranferencias</label>
                                                                    </div></br>
                                                                    <div class="col-sm-4">
                                                                        <select class="form-control"  id="cboBancoNP" name="cboBancoNP" disabled></select>
                                                                    </div></br>

                                                                    <div class="col-sm-4">
                                                                        <input for="referencia"  type="text" class="form-control" id="referencia" name="referencia" placeholder="No de referencia:" disabled>
                                                                    </div></br>

                                                                    <div class="col-md-4">
                                                                            <input  for="monto" type="text" class="form-control" id="monto" name="monto" placeholder="Monto:" disabled>
                                                                    </div> </br> 
                                                                </div>

                                                            </div> 


                                                            <div class="input-group-prepend">
                                                                <div class="col-sm-12">
                                                                    
                                                                    <div class="col-sm-4">
                                                                            
                                                                            <input type="checkbox" id="chkpagomovil" name="chkpagomovil"  onchange="checkAgregarPagoMovil();">
                                                                            <label for="pagomovil">Pago Movil</label>
                                                                    </div></br>
                                                                    <div class="col-sm-4">
                                                                        <select class="form-control"  id="cboBancoj" name="cboBancoj" disabled></select>
                                                                    </div></br>

                                                                    <div class="col-sm-4">
                                                                        <input type="text" placeholder="operacion" id="operacion" name="operacion" aria-label="operacion" value='' class="form-control" disabled>
                                                                    </div></br>

                                                                    <div class="col-md-4">
                                                                        <input type="text" placeholder="monto" id="monto_movil" name="monto_movil" aria-label="monto_movil" value='' class="form-control" disabled>
                                                                    </div> </br> 
                                                                </div>

                                                            </div> 

                                                         </div>

                                                    <!--
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
                                                
                                        
                                                </div>-->
                                                <div class="container">
                                                        <div class="col-12 btn btn-align-center">
                                                        
                                                            <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                                                    
                                                        </div>
                                                </div> 
                                            
                                            <form>
                                        </div>
                                    </div>   
                                <form>
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

