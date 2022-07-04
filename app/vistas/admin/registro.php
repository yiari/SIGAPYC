
<h2 class=" text-center">REGISTRO DE USUARIO</h2><br>

<div class="row">

        <div class="col-sm-12">
        <span id="mensaje">&nbsp;</span>
        </div>


        <form class="bg-light" method="post" id="registrarusuario">
                <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                                <label for="registroNombre" class="mr-sm-2">Nombres:</label>
                                <input type="text" class="form-control form-control-user" placeholder="Nombre del usuario" id="registroNombre" name="registroNombre" required=required >
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                                <label for="registroApellido" class="mr-sm-2">Apellidos:</label>
                                <input type="text" class="form-control form-control-user" placeholder="Apellidos del usuario" id="registroApellido" name="registroApellido" required=required >
                        </div>

                        <div class="col-sm-6">
                                <label for="registroUsuario" class="mr-sm-2">Usuario:</label>
                                <input type="text" class="form-control form-control-user" placeholder="Usuario" id="registroUsuario" name="registroUsuario" required=required >

                        </div>
                </div>

                <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="registroEmail" class="mr-sm-2">Correo:</label>
                                <input type="text" class="form-control form-control-user" placeholder="Correo electronico" id="registroEmail" name="registroEmail" required=required >
                        </div>

                        <div class="col-sm-6">
                                <label for="registroContrasena" class="mr-sm-2">Contraseña:</label>
                                <input type="password" class="form-control form-control-user" placeholder="Contraseña" id="registroContrasena" name="registroContrasena" required=required >

                        </div>
                </div>


                </br>

                <button type="submit" class="btn btn-primary mb-2">Enviar</button>
        </form> 
</div>

<hr size="2" width="100%" />


<div class="row">

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
                        <tr>
                                <td>01</td>
                                <td>Nombre Usuario</td>
                                <td>Apellido Usuario</td>
                                <td>Correo Electronico</td>
                                <td>03/07/2022</td>
                                <td>
                                        <div class="btn-group">
                                                <button class="btn btn-warning" ><i class="fas fa-edit" alt=“editar”></i>&nbsp;Editar</button>
                                                <button class="btn btn-danger"><i class="fas fa-trash" alt=“eliminar”></i>&nbsp;Eliminar</button>
                                        </div>
                                </td>
                        
                        </tr>
                        
                
                </tbody>
        </table>
        </div>
</div>

<script src="js/admin/registrousuarios.js"></script>
