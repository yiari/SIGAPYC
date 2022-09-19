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
                       
                    <form class="form-sample" id="registrarecibo" name="registrarecibo" method="POST" action="" autocomplete="off" >

                                    <input type="hidden" id="id_usuario" name="id_usuario" value='1'>
                                    <input type="hidden" id="hidrecibo" name="hidrecibo" value=''>

                                    <input type="hidden" id="id_aviso" name="id_aviso" value="0">
                                    <input type="hidden" id="codigo" name="codigo" value="0">

                                    <input type="hidden" id="id_inmu" name="id_inmu" value='0'>
                                    <input type="hidden" id="inmueble" name="inmueble" value='0'>
                                    
                                    <input type="hidden" id="id_unid" name="id_unid" value='0'>
                                    <input type="hidden" id="unidad" name="unidad" value='0'>

                                    <input type="hidden" id="id_inqu" name="id_inqu" value='0'>
                                    <input type="hidden" id="inquilino" name="inquilino" value='0'>


                                    <input type="hidden" id="cod_recibo" name="cod_recibo" value='0'>
                                    <input type="hidden" id="cod_pedido" name="cod_pedido" value='0'>
                                    <input type="hidden" id="fecha" name="fecha" value='0'>
                                    <input type="hidden" id="monto" name="monto" value='0'>
                                    <input type="hidden" id="tipo_inqu" name="tipo_inqu" value=''>
                            <!--Datos del propietario-->
                                <div class="row">

                                    <div style="text-align: left;">
                                        <span id="lblAvisoCobro"><strong>AVISO DE COBRO : &nbsp; </strong></span>
                                    
                                    </div>

                                

                                    <div style="text-align: left;">
                                            <span id="lblInquilino"><strong>INQULINO : &nbsp; </strong></span>
                                        
                                    </div>


                                    <div style="text-align: left;">
                                            <span id="lblMonto"><strong>MONTO : &nbsp; </strong></span>
                                        
                                    </div>
                                </div>

                  <br>

                    
                    <div class="tab-content" id="nav-tabContent">

                       
                            <div class="col-12 grid-margin">
                                

                                   

                                    <br>
                                
                                    <div class="content">
                                        <div class="card">
                                                <div class="card-body">
                                                   
                                                            <div class="row">
                                                        
                                                                    <div class="col-md-4">
                                                
                                                                            <select class="form-select" id="mes" name="mes" >
                                                                                <option selected disabled value="">seleccion de mes</option>
                                                                                <option value="1">Enero</option>
                                                                                <option value="2">Febrero</option>
                                                                                <option value="3">Marzo</option>
                                                                                <option value="4">Abril</option>
                                                                                <option value="5">Mayo</option>
                                                                                <option value="6">Junio</option>
                                                                                <option value="7">Julio</option>
                                                                                <option value="8">Agosto</option>
                                                                                <option value="9">Septiembre</option>
                                                                                <option value="10">Octubre</option>
                                                                                <option value="11">Noviembre</option>
                                                                                <option value="12">Diciembre</option>
                                                                            </select>
                                                                    </div><br>

                                                                    <div class="input-group-prepend">
                                                                        
                                                                            <div class="col-md-4">
                                                                                    <label for="recibo">Recibo</label>
                                                                                    <input type="text" class="form-control" id="recibo" name="recibo" placeholder=" Monto del recibo:">
                                                                            </div> </br> 
                                                                            <div class="col-md-4 ">
                                                                                <label for="pedido">Pedido</label>
                                                                                <input type="text" class="form-control"  id="pedido" name="pedido"  placeholder=" Monto del Pedido">
                                                                            </div> </br> 
                                                                    
                                                                    </div> 

                                                                <br>
                                                                
                                                            </div>

                                                    
                                                                <div class="container">
                                                                    <div class="col-12 btn btn-align-center">
                                                                    
                                                                        <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                                                                
                                                                    </div>
                                                            </div> 
                                                    
                                                  
                                                
                                            </div> 
                                        </div> 
                                  </div>  
                                <form>
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

