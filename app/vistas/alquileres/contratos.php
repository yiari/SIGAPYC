
<?php 


include("layout/menuNavegacion.php"); 


?>


<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
        <ol>
                <a class="btn btn-outline-primary" href="index.php?url=app/vistas/alquileres/ingresar_contrato" role="button">Nuevo</a>                
                
            </ol>
        </div>
        
        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa-solid fa-city"></i>&nbsp;
                CONTRATOS
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Dirección</th>
                            <th>Inquilino</th>
                            <th>Propietario</th>
                            <th>Canon</th>
                            <th>Desde</th>
                            <th>Hasta</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Dirección</th>
                            <th>Inquilino</th>
                            <th>Propietario</th>
                            <th>Canon</th>
                            <th>Desde</th>
                            <th>Hasta</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  
                                    <td>
                                        <div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">

                                            <a href="#" title="Editar"><i class="fa fa-edit" ></i></a>&nbsp;
                                            <a href='#' title="Ver" target='_blank'><i class="fa fa-search"></i></a> &nbsp;
                                          
                                        </div>

                                    </td>
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>




