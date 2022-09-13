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

                    <h4 class="card-title">Generar Recibos / Pedidos</h4><br>
                        <form class="form-sample" id="" name="" method="POST" action="" autocomplete="off" >

                                    
                            <input type="hidden" id="hidinquilino" name="hidinquilino" value=''>

                            <!--Datos del propietario-->
                                <div class="row">

                                    <div class="col-md-1">
                                        <label for="registroCodigo" class="col-sm-12 col-form-label"><strong>INQULINO</strong></label>
                                        
                                    </div>

                                    <div class="col-md-3">
                                        
                                            <input type="text" class="form-control" id="registroCodigo" name="registroCodigo" readonly="yes">
                                    
                                    </div>

                                </div>

                    </form>
                    <br>

                    <div style="text-align: left;">
                        <span id="lblAvisoCobro"><strong>AVISO DE COBRO : </strong></span>
                      
                   </div>

                   <div style="text-align: left;">
                        <span id="lblMonto"><strong>MONTO : </strong></span>
                      
                   </div>

                    


                <br>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          
                           <button class="nav-link active" id="nav-pago-abono-tab" data-bs-toggle="tab" data-bs-target="#nav-pago-abono" type="button" role="tab" aria-controls="nav-pago-abono" aria-selected="true">Recibos / Pedidos</button>
                        </div>
                    </nav>          

                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-pago-abono" role="tabpanel" aria-labelledby="nav-pago-abono-tab">
                            <div class="col-12 grid-margin">
                                <form class="form-sample" id="registrarabono" name="registrarabono" method="POST" action="" autocomplete="off" >
                                    <div class="card">
                                        <div class="card-body">
                                            
                                                    <input type="hidden" id="hidabono" name="hidabono" value="">
                                                    <input type="hidden" id="id_tranferencia" name="id_tranferencia" value="">
                                                    <input type="hidden" id="id_movil" name="id_movil" value="">


                                                    <input type="hidden" id="id_usuario" name="id_usuario" value='1'>
                                                    <input type="hidden" id="id_aviso" name="id_aviso" value="0">
                                                    <input type="hidden" id="id_inmu" name="id_inmu" value='0'>
                                                    <input type="hidden" id="id_unid" name="id_unid" value='0'>
                                                    <input type="hidden" id="id_inqu" name="id_inqu" value='0'>
                                                    
                              
                                                    <div class="row">
                                                  
                                                          
                                                            <div class="input-group-prepend">
                                                                
                                                                    <div class="col-md-4">
                                                                            <label for="transferencia">Recibo</label>
                                                                            <input  for="monto" type="text" class="form-control" id="monto" name="monto" placeholder="Monto:" >
                                                                    </div> </br> 
                                                                    <div class="col-md-4 ">
                                                                        <label for="transferencia">Pedido</label>
                                                                        <input type="text" placeholder="monto" id="monto_movil" name="monto_movil" aria-label="monto_movil" value='' class="form-control" >
                                                                    </div> </br> 
                                                               

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

