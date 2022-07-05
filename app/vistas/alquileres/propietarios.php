
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


        
        <?php


            $usuario = new ctrpropietarios();
            $usuario -> seleccionarlistaPropietarios();

        ?>
        
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

                    


                            <?php foreach ($usuario as $key => $value): ?>


                            <tr>
                                    <td><?php echo (trim($value['cod_prop']));?></td>
                                    <td><?php echo $value["nom_prop"]; ?><?php echo $value["ape_prop"]; ?></td>
                                    <td><?php echo $value["ci_prop"];?></td>
                                    <td><?php echo $value["loc_prop"];?></td>
                                    <td><?php echo $value["cel_prop"];?></td>
                                    <td><?php echo $value["cor_prop"];?></td>
                                    
                                    <td>
                                        <div class="btn-group">

                                        <a href='#' ><img src='img/editar.png'  width=25 height=25 placeholder="Editar..."></a> &nbsp;
                                        <a href='#' target='_blank'><img src='img/ver.png' width=25 height=25  alt='Ver'></a> &nbsp;

                                        <a href='#' target='_blank'><img src='img/mandato.png' width=25 height=25  alt='Mandato'></a> &nbsp;
                                        <a href='#'><img src='img/bitacora.png' width=25 height=25  alt='Bitacora'> </a> &nbsp;

                                            
                                        </div>

                                    </td>
                                    
                                </tr>


                            <?php endforeach ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </br>
</div>
</br>