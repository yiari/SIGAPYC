<?php 


include("layout/menuNavegacion.php"); 


?>


<div class="container">

    
        
        <h4 class="card-title">AVISO DE COBRO</h4>
      
        <div class="card-header">
            <div style="text-align: right;">
                <ol>
                    <a class="btn btn-outline-secondary" href="reportes.php" role="button">Imprimir</a>
                </ol>
            </div>

            <div style="text-align: center;">
                <ol>
                    <a class="btn btn-outline-secondary" href="reportes.php" role="button">Todos</a>
                    <a class="btn btn-outline-primary"    href="reportes.php" role="button">Por enviar</a>
                    <a class="btn btn-outline-secondary" href="reportes.php" role="button">Enviados</a>
                    <a class="btn btn-outline-success"   href="reportes.php" role="button">En Proceso</a>
                </ol>
            </div>
            <div class="tab-content" id="nav-tabContent">

                    <div class="col-12 grid-margin">
                        <!--inmuebles-->
                        <div class="card">
                            <div class="card-body">
                                <!--tabla-->
                                <div class="card mb-4">
                                    
                                
                                
                                   <div class="card-header">
                                        <i class='fas fa-house-user'></i>&nbsp;
                                        Información
                                    </div>

                                    <div class="card-body">
                                                <div class="row">

                                                       <div class="col-md-2">
                                                             <label for="registroNacionalidad" class="col-sm-6 col-form-label">Mes:</label>
                                                        </div>
                                                        <div class="col-sm-2">
                                                        
                                                            <select class="form-select" id="registroNacionalidad" name="registroNacionalidad" >
                                                                <option selected disabled value=""></option>
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
                                                            
                                                        <div class="col-md-2">
                                                            <label class="col-sm-12 col-form-label">Buscar Cliente:</label>
                                                        </div>
                                                    
                                                        <div class="col-md-2">
                                                                <input type="text" class="form-control" id="nom_prop" name="nom_prop">
                                                        </div>
                                                        <br>
                                                        <div class="col-md-2">
                                                                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                                                        </div>
                                                            
                                              </div><br>


                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>N° DE CONTROL</th>
                                                <th>FECHA</th>
                                                <th>INMUEBLE</th>
                                                <th>MENSUALIDAD</th>
                                                <th>ESTATUS</th>
                                                <th>REPUESTA</th>
                                                <th>ACCIONES</th>
                                               						
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td>AV-22070423</td>
                                                    <td>01/08/2022</td>
                                                    <td>LO-0002-32A-cc.sambil</td>
                                                    <td>$760,00</td>
                                                    <td>EN PROCESO</td>
                                                    <td>MÉTODO DE PAGO DIVISA, CANCELARÁ EL 08-08-2022</td>


                                                    						
                                                </tr>
                                                <tr>
                                                    <td>12-0001-00 TORRE CANAIMA</td>
                                                    <td>MEZZANINA NRO.2</td>
                                                    <td>$120</td>
                                                    <td>$30</td>
                                                    <td></td>
                                                    <td>Finiquitado</td>
                                                </tr>
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