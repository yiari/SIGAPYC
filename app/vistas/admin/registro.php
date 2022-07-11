
<h2 class=" text-center">REGISTRO DE USUARIO</h2><br>

<div class="row">

<div class="card">
  <div class="card-body">

        <div class="col-sm-12">
        <span id="mensaje">&nbsp;</span>
        </div>


        <form class="bg-light" method="post" id="registrarusuario">
                <input type="hidden" id="hidUsuario" name="hidUsuario" value="0">

                <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                                <label for="cboRoles" class="mr-sm-2">Roles:</label></br>
                                <select id="cboRoles" name="cboRoles"></select>
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                                &nbsp;    
                        </div>
                        <div class="col-sm-6">
                                &nbsp;                            
                        </div>
                </div>

                <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                                <label for="registroNombre" class="mr-sm-2">Nombres:</label>
                                <input type="text" class="form-control form-control-user" placeholder="Nombre del usuario" id="registroNombre" name="registroNombre">
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                                <label for="registroApellido" class="mr-sm-2">Apellidos:</label>
                                <input type="text" class="form-control form-control-user" placeholder="Apellidos del usuario" id="registroApellido" name="registroApellido">
                        </div>

                        <div class="col-sm-6">
                                <label for="registroUsuario" class="mr-sm-2">Usuario:</label>
                                <input type="text" class="form-control form-control-user" placeholder="Usuario" id="registroUsuario" name="registroUsuario">

                        </div>
                </div>

                <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="registroEmail" class="mr-sm-2">Correo:</label>
                                <input type="text" class="form-control form-control-user" placeholder="Correo electronico" id="registroEmail" name="registroEmail">
                        </div>

                        <div class="col-sm-6">
                                <label for="registroContrasena" class="mr-sm-2">Contraseña:</label>
                                <input type="password" class="form-control form-control-user" placeholder="Contraseña" id="registroContrasena" name="registroContrasena">

                        </div>
                </div>


                </br>

                <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                <button type="button" class="btn btn-danger mb-2 cancelar" style="display:none;">Cancelar</button>
        </form> 

  </div>
</div>
</div>

<hr size="2" width="100%" />


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

<?php 

include_once "app/vistas/comunes/modalmensajes.php";
include_once "app/vistas/comunes/modaleliminar.php";

?>

<script src="js/admin/registrousuarios.js"></script>
