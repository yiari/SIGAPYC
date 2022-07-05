
<?php 


include("layout/menuNavegacion.php"); 


?>


<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
        <ol>
                <a class="btn btn-outline-primary" href="index.php?url=app/vistas/alquileres/ingresar_contrato" role="button">Nuevo</a>                
                <a class="btn btn-outline-secondary" href="" role="button">Imprimir</a>
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
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>