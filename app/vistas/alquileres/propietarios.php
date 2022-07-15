
<?php 

require_once "app/controladores/alquileres/ctrpropietarios.php";
include("layout/menuNavegacion.php"); 


?>

<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
        <ol>
                <a class="btn btn-outline-primary" href="index.php?url=app/vistas/alquileres/ingresar_propietarios" role="button">Nuevo</a>                
                <!--a class="btn btn-outline-secondary" href="reportes.php" role="button">Imprimir</a-->
            </ol>
        </div>


        
        
        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa-solid fa-building-user"></i>&nbsp;
                PROPIETARIOS
            </div>

            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th width="10%">Código</th>
                            <th width="10%">Nombre</th>
                            <th width="10%">Documento Id</th>
                            <th width="10%">local </th>
                            <th width="10%">celular </th>
                            <th width="10%">Correo</th>
                             <th width="10%">Doc / Editar</th>
                       </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th width="10%">Código</th>
                            <th width="10%">Nombre</th>
                            <th width="10%">Id</th>
                            <th width="10%">local </th>
                            <th width="10%">celular </th>
                            <th width="10%">Correo</th>
                             <th width="10%">Doc / Editar</th>
                       </tr>
                    </tfoot>
                    <tbody>

                            <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td>
                                        <div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">

                                        
                                        <a href="#" title="Editar"><i class="fas fa-edit"></i></a> &nbsp;
                                        <a href='#' title="Ver" target='_blank'><i class="fas fa-search"></i></a> &nbsp;
                                        <a href='#' title="Mandato" target='_blank'><i class="fa-solid fa-file-pen"></i></a> &nbsp;
                                        <a href='#' title="Bitacora"><i class="fa-regular fa-folder-open"  ></i></a> &nbsp;
                                        <!--aquie de a ver una condicion si es proietario natural es apoderado si es juridoco es un representante-->
                                         <a href='index.php?url=app/vistas/alquileres/apoderado' title="Apoderado"><i class="fa-regular fa-id-badge"></i></a> &nbsp;
                                         <a href='index.php?url=app/vistas/alquileres/representante' title="Representante"><i class="fa-regular fa-id-badge"></i></a> &nbsp;
                                         <a href='index.php?url=app/vistas/alquileres/inmuebles' title="Inmueble"><i class="fa-solid fa-city"></i></a> &nbsp;  
                                        </div>

                                    </td>
                                    
                                </tr>

                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </br>
</div>
</br>