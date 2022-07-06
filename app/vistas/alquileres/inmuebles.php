<?php include("layout/menuNavegacion.php"); ?>

<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
        <ol>
                <a class="btn btn-outline-primary" href="index.php?url=app/vistas/alquileres/ingresar_inmueble" role="button">Nuevo</a>                
                <!--a class="btn btn-outline-secondary" href="reportes.php"  role="button">Imprimir</a-->
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
                            <th><div class="btn-group">

                                <a href='#' ><img src='img/editar.png'  width=25 height=25 placeholder="Editar..."></a> &nbsp;
                                <a href="#" title="Editar"><i class="fas fa-edit"></i></a>
                                <a href='#' target='_blank'><img src='img/ver.png' width=25 height=25  alt='Ver'></a> &nbsp;

                                <a href='#' target='_blank'><img src='img/mandato.png' width=25 height=25  alt='Mandato'></a> &nbsp;
                                <a href='#'><img src='img/bitacora.png' width=25 height=25  alt='Bitacora'> </a> &nbsp;

                                    
                            </div></th>                        
                        </tr>
                    </tfoot>
                    <tbody>

                    <div class="btn-group">

                               
                                <a href="#" title="Editar"><i class="fas fa-edit" width=25 height=25></i></a>&nbsp;
                                <a href='#' title="Ver" target='_blank'><i class="fas fa-search " width=25 height=25></i></a> &nbsp;
                                
                                <a href='#' title="Mandato" target='_blank'><i class="fa-solid fa-file-pen"></i></a> &nbsp;
                                <a href='#' title="Bitacora"><i class="fa-regular fa-folder-open"></i></a> &nbsp;

                                    
                            </div>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
