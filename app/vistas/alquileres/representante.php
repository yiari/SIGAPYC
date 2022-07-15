<?php include("layout/menuNavegacion.php"); ?>

<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
        <ol>
                <a class="btn btn-outline-primary" href="index.php?url=app/vistas/alquileres/ingresar_representante" role="button">Nuevo</a>                
                <!--a class="btn btn-outline-secondary" href="reportes.php"  role="button">Imprimir</a-->
            </ol>
        </div>
        
        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa-solid fa-city"></i>&nbsp;
                REPRESENTANTE
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>

                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Propietario</th>
                            <th>Telefono</th>
                            <th>correo</th>
                            <th>Doc / Editar</th>
                     
 
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Propietario</th>
                            <th>Telefono</th>
                            <th>correo</th>
                            <th>Doc / Editar</th>                        
                        </tr>
                    </tfoot>
                    <tbody>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  
                                    <td>
                                        <div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">

                                            <a href="#" title="Editar"><i class="fas fa-edit" ></i></a>&nbsp;
                                            <a href='#' title="Ver" target='_blank'><i class="fas fa-search"></i></a> &nbsp;
                                         
    
                                        </div>

                                    </td>

                             
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>