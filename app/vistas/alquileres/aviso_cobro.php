<?php 


include("layout/menuNavegacion.php"); 


?>


<div class="container">

    
        
        <h4 class="card-title">AVISO DE COBRO</h4>

        
        
          <div class="card-header">
            <div style="text-align: right;">
                <ol>

                </ol>
            </div>

            <div style="text-align: center;">
                <ol>
                   
                    <button type="button" class="btn btn-outline-secondary" onclick="buscarEstatus(0);">Todos</button>
                    <button type="button" class="btn btn-outline-primary" onclick="buscarEstatus(1);">Enviados</button>
                    <button type="button" class="btn btn-outline-success" onclick="buscarEstatus(2);">Pendiente</button>

                </ol>
            </div>
            <div class="tab-content" id="nav-tabContent">

                    <div class="col-12 grid-margin">
                        <!--inmuebles-->
                        <div class="card">
                            <div class="card-body">
                                <!--tabla-->
                             
                                   
                                        <!--
                                         <div class="card-body">

                                                    <div class="row">
                                                            <div class="col-sm-2">
                                                            
                                                                <select class="form-select" id="registroNacionalidad" name="registroNacionalidad" >
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
                                                                
                                                            

                                                                <div class="col-md-6">
                                                                        <input type="text" class="form-control" id="nom_inqu" name="nom_inqu" placeholder="Buscar Cliente:">
                                                                </div>
                                                                <br>
                                                                <div class="col-md-2">
                                                                        <button type="button" class="btn btn-primary mb-2" onclick="buscarInquilino();">Buscar</button>
                                                                </div>
                                                    </div>
                                         
                                        </div>-->
                                              
                                              <br>
                                        <div class="card-body">

                                            <div class="table-responsive">
                                                <table id="datosAvisoCobro">
                                                <thead>
                                                    <tr>
                                                        <th>codigo</th>
                                                        <th>Fecha</th>
                                                        <th>Inquilino</th>
                                                        <th>Inmueble</th>
                                                        <th>Mensualidad</th>
                                                        <th>Gastos especiales</th>
                                                        <th>Total</th>
                                                        <th>Estatus</th>
                                                        <th>Respuestas</th>
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

            </div>
      
    </div>
</div>


<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/aviso_cobro.js"></script>
