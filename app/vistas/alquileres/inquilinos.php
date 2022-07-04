<?php include("menuNavegacion.php"); ?>


<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
        <ol>
                <a class="btn btn-outline-primary" href="ingresar_inquilinos.php" role="button">Nuevo</a>                
                <a class="btn btn-outline-secondary" href="" role="button">Imprimir</a>
            </ol>
        </div>

        <?php

            $usuario = ControladorFormulario::ctrselccionarlistaInquilinos();
            //echo '<pre>' ; print_r($usuario); echo '</pre>';

        ?>
        
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

                    <?php foreach ($usuario as $key => $value): ?>


                        <tr>
                        <td>
                                <?php echo (trim($value['cod_inqu']));?></td>
                                <td><?php echo $value["nom_inqu"];?><?php echo $value["ape_inqu"]; ?></td>
                                <td><?php echo $value["ci_inqu"];?></td>
                                <td><?php echo $value["loc_inqu"];?> / <?php echo $value["cel_inqu"];?></td>
                                <td><?php echo $value["cor_inqu"];?></td>
                                
                                <td>
                                    <div class="btn-group">

                                    <a href='#' ><img src='img/editar.png'  width=25 height=25 ></a> &nbsp;
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

</div>
