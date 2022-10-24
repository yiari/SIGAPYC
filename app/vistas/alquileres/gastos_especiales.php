
<?php include("layout/menuNavegacion.php"); ?>


    <div class="container">
            <h4 class="card-title">REGISTRO DE GASTOS ESPECIALES</h4>
     <div class="card-header">

                <div style="text-align: right;">
                        <ol>          
                            <a class="btn btn-outline-secondary atrasURL" href="index.php?url=app/vistas/alquileres/aviso_cobro"  role="button">Atras</a>
                        </ol>
                    </div>
         
                <div class="card">
                   
                    <div class="card-body">

                   

                            <div class="col-sm-12">
                                <span id="mensaje">&nbsp;</span>
                            </div>

                            
                            <form class="form-sample" id="buscargastos" name="buscargastos" method="POST" action="" autocomplete="on">

                                    <input type="hidden" id="id_gesp" name="id_gesp" value='0'>
                                    <input type="hidden" id="id_inmu" name="id_inmu" value='0'>
                                    <input type="hidden" id="id_unid" name="id_unid" value='0'>
                                    <input type="hidden" id="id_inqu" name="id_inqu" value='0'>
                                    <input type="hidden" id="tipo_inqui" name="tipo_inqui" value='0'>
                                    <input type="hidden" id="id_usuario" name="id_usuario" value='0'>
                                    <input type="hidden" id="mes" name="mes" value=''>

                                    <div class="row">

                                   <div style="text-align: left;">
                                        <span id="lblAvisoCobro"><strong>AVISO DE COBRO : &nbsp; </strong></span>

                                        </div>

                                        <div style="text-align: left;">
                                                <span id="lblInquilino"><strong>INQULINO : &nbsp; </strong></span>
                                        
                                        </div>
  
                                   </div>

                                   <br>

                                    <div class="row">

                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                   
                                                    <input type="text" class="form-control" placeholder="Concepto del Gasto:" id="registroGasto" name="registroGasto">
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                   
                                                    <input type="text" class="form-control " placeholder="Monto:" id="registroMonto" name="registroMonto">
                                            </div>

                                            
                                     </div>

                                    </br>
                                    <div class="col-12 btn btn-align-center">
                                        <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                                        <button type="button" class="btn btn-danger mb-2 cancelar" style="display:none;">Cancelar</button>
                                    </div>
                            </form> 

                    </div>
                </div>
            
            <br>

            <div class="row">

                <div class="card">
                    <div class="card-body">

                            <div class="table-responsive">
                            <table class="display compact" id="Especiales">
                                    <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>Mes_gasto</th>
                                            <th>Inmueble</th>
                                            <th>Concepto</th>
                                            <th>Monto</th>
                                            <th>fecha</th>
                                            <th>Acciones</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                            </table>
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
<script src="js/alquileres/gastos_especiales.js"></script>
