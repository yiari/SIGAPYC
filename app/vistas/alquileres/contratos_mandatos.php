
<?php 


include("layout/menuNavegacion.php"); 


?>


<div class="container">

<div style="text-align: right;">
            <ol>           
                <a class="btn btn-outline-secondary codinmu" href="index.php?url=app/vistas/alquileres/inmuebles"  role="button">Atras</a>
            </ol>
</div>


    <div class="card-header">
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
                            <th>Propietario</th>
                            <th>Inquilino</th>
                            <th>Canon</th>
                            <th>Desde</th>
                            <th>Hasta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
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
                                            <a href='' title="Ver" target='_blank'><i class="fa fa-search"></i></a> &nbsp;
                                          
                                        </div>

                                    </td>
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>




<div class="container">
    <div class="card-header">

        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa-solid fa-city"></i>&nbsp;
                MANDATOS
            </div>
            <div class="card-body">
                <table id="datosMandatos">
                    <thead>
                        <tr>
                            <th>codigos</th>
                            <th>Inmueble</th>
                            <th>Unidad</th>
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


<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/cargar_contratos_mandatos.js"></script>




