
<?php include("layout/menuNavegacion.php"); ?>




    <div class="container">
            <h4 class="card-title">GASTOS ESPECIALES</h4>
     <div class="card-header">
            

            <div class="row">

                <div class="card">
                    <div class="card-body">

                            <div class="table-responsive">
                            <table class="display compact" id="gastosEspeciales">
                                    <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>Mes_gasto</th>
                                            <th>Inmueble</th>
                                            <th>Concepto</th>
                                            <th>Monto</th>
                                            <th>fecha</th>
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
                   
                
    </div>
</div>

<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>

<script src="js/comunes/combos.js"></script>
<script src="js/comunes/funciones.js"></script>
<script src="js/alquileres/todos_gastos_especiales.js"></script>
