<?php 

include("layout/menuNavegacion.php"); 


?>


<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
        <ol>
                <a class="btn btn-outline-primary" href="index.php?url=app/vistas/alquileres/ingresar_inquilinos" role="button">Nuevo</a>                
                <a class="btn btn-outline-secondary" href="" role="button">Imprimir</a>
            </ol>
        </div>

        
        
        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa-solid fa-people-roof"></i>&nbsp;
                INQUILINOS
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                           <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Doc ID</th>
                            <th>Telefono </th>
                            <th>Correo</th>
                             <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Doc ID</th>
                            <th>Telefono </th>
                            <th>Correo</th>
                              <th>Acciones</th>
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

                                            <a href="#" title="Editar"><i class="fas fa-edit" ></i></a>&nbsp;
                                            <a href='#' title="Ver" target='_blank'><i class="fas fa-search" ></i></a> &nbsp;
                                            <a href='#' title="Contrato" target='_blank'><i class="fa-solid fa-file-pen" ></i></a> &nbsp;
                                            <a href='#' title="Bitacora"><i class="fa-regular fa-folder-open"></i></a> &nbsp;
    
                                        </div>

                                    </td>

                    
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
