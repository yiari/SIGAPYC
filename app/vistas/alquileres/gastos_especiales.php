
<?php include("layout/menuNavegacion.php"); ?>

<div class="container">
        <h2 class=" text-center">REGISTRO DE GASTOS ESPECILAES</h2><br>

    <div class="row">

        <div class="card">
            <div class="card-body">

                    <div class="col-sm-12">
                    <span id="mensaje">&nbsp;</span>
                    </div>


                    <form class="bg-light" method="post" id="registrarusuario">
                            <input type="hidden" id="hidUsuario" name="hidUsuario" value="0">

                            <div class="form-group row">
                                    <div class="col-sm-4 mb-4 mb-sm-0">
                                            <label for="cboRoles" class="mr-sm-2">INMUEBLE:</label></br>
                                            <select id="cboRoles" name="cboRoles"></select>
                                    </div>
                                  
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="registroGasto" class="mr-sm-2">Concepto:</label>
                                            <input type="text" class="form-control form-control-user" placeholder="concepto" id="registroGasto" name="registroGasto">
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="registroMonto" class="mr-sm-2">Monto:</label>
                                            <input type="text" class="form-control form-control-user" placeholder="monto" id="registroMonto" name="registroMonto">
                                    </div>

                                    
                            </div>

                            


                            </br>

                            <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                            <button type="button" class="btn btn-danger mb-2 cancelar" style="display:none;">Cancelar</button>
                    </form> 

            </div>
        </div>
    </div>




            <div class="card-body">
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                                <div class="table-responsive">
                                <table class="table table-striped" id="tblUsuarios">
                                        <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Email</th>
                                                <th>Fecha</th>
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
<script src="js/alquileres/gastos_especiles.js"></script>
