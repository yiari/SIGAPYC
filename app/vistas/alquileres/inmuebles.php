<?php include("layout/menuNavegacion.php"); ?>

<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
        <ol>
                <a class="btn btn-outline-primary" href="index.php?url=app/vistas/alquileres/ingresar_inmueble" role="button">Nuevo</a>                
               
            </ol>
        </div>
        
        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa-solid fa-city"></i>&nbsp;
                INMUEBLES
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>

                            <th>Id</th>
                            <th>Foto</th>
                            <th>Propietario</th>
                            <th>Inquilino</th>
                            <th>Dirección</th>
                            <th>Letra</th>
                            <th>Tipo</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
 
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                            <th>Id</th>
                            <th>Foto</th>
                            <th>Propietario</th>
                            <th>Inquilino</th>
                            <th>Dirección</th>
                            <th>Letra</th>
                            <th>Tipo</th>
                            <th>Estatus</th>
                            <th>Doc / Editar</th>                        
                        </tr>
                    </tfoot>
                    <tbody>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">
                                             <a href='#' title="Ver" target='_blank'><i class="fa fa-search" ></i></a>&nbsp;
                                            <a href="#" title="Editar"><i class="fa fa-edit" ></i></a>
                                            <a href='#' title="Contrato" target='_blank'><i class="fa fa-file-pen" ></i></a> &nbsp;
                                            <a href='index.php?url=app/vistas/alquileres/beneficiarios' title="Beneficiarios"><i class="fa fa-id-badge"></i></a> &nbsp;
                                            <a href='index.php?url=app/vistas/alquileres/unidades' title="Unidades"><i class="fa fa-sitemap"></i></a> &nbsp;
                                            <a href='#' title="Bitacora"><i class="fa fa-folder-open"></i></a> &nbsp;
    
                                        </div>

                                    </td>

                             
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
