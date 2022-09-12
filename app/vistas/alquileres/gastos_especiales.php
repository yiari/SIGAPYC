
<?php include("layout/menuNavegacion.php"); ?>




    <div class="container">
            <h4 class="card-title">REGISTRO DE GASTOS ESPECIALES</h4>
     <div class="card-header">
            <div class="row">
         
                <div class="card">
                    
                    <div class="card-body">

                            <div class="col-sm-12">
                                <span id="mensaje">&nbsp;</span>
                            </div>

                                    <input type="hidden" id="id_gesp" name="id_gesp" value='0'>
                                    <input type="hidden" id="id_inmu" name="id_inmu" value='0'>
                                    <input type="hidden" id="id_unid" name="id_unid" value='0'>
                                    <input type="hidden" id="id_usuario" name="id_usuario" value='1'>
                                    


                            <form class="form-sample" id="buscarCodigo" name="buscarCodigo" method="POST" action="" autocomplete="on">
                                    

                                    <div class="card-body"> 
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos del Generales</h5>
                                                </div><br>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="col-sm-12 col-form-label">Buscar Código inmueble :</label>
                                                    </div>
                                                
                                                    <div class="col-md-4">
                                                            <input type="text" class="form-control" id="nom_prop" name="nom_prop">
                                                    </div>
                                                    <br>
                                                    <div class="col-md-2">
                                                            <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                                                    </div>                       
                                                </div>

                                            <br>
                                            
                                                <div class="table-responsive">
                                                    <table class="table table-striped" id="datosAsignarInmueble">
                                                            <thead>
                                                                    <tr>
                                                                        <th>Inmueble</th>
                                                                        <th>Unidad</th>
                                                                        <th>Opcion</th>
                                                                    </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                    </table>
                                                    </div>        
                                     </div><br>
                                            
                            </form> 

                            <form class="form-sample" id="buscargastos" name="buscargastos" method="POST" action="" autocomplete="on">

                                   <input type="hidden" id="id_gesp" name="id_gesp" value='0'>
                                   <input type="hidden" id="id_usuario" name="id_usuario" value='1'>

                                    <div class="row">

                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                         
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
                                            </div>
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
            </div>
            <br>

            <div class="row">

                <div class="card">
                    <div class="card-body">

                            <div class="table-responsive">
                            <table class="table table-striped" id="gastosEspeciales">
                                    <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>Mes_gasto</th>
                                            <th>Inmueble</th>
                                            <th>Unidad</th>
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
