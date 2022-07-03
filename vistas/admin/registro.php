
<h2 class=" text-center">REGISTRO DE USUARIO</h2><br>

<div class="d-flex">

        <form class="p-5 bg-light" method="post" id="registrarusuario">
            <div class="form-group">
                <label for="nombre" class="mr-sm-2">Nombres:</label>
                <div class="input-group">
                    
                        <input type="text" class="form-control" placeholder="Nombre del usuario" id="nombre" name="registroNombre">
                </div>
            </div>
            <div class="form-group">
                <label for="nombre" class="mr-sm-2">Apellidos:</label>
                <div class="input-group">
                        
                        <input type="text" class="form-control" placeholder="Apellidos del usuario" id="apellido" name="registroApellido">
                </div>
            </div>
            <div class="form-group">
                <label for="nombre" class="mr-sm-2">Usuario:</label>
                <div class="input-group">
                    
                        <input type="text" class="form-control" placeholder="Usuario" id="apellido" name="registroUsuario">
                </div>
            </div>
            <div class="form-group">
            <label for="email" class="mr-sm-2">Correo :</label>
                <div class="input-group">
                        
                        <input type="email" class="form-control" placeholder="Correo electronico" id="email" name="registroEmail">
                </div>
            </div>

            <div class="form-group">
                <label for="pwd" class="mr-sm-2">Contraseña:</label>

                <div class="input-group">
                        
                        <input type="password" class="form-control" placeholder="Contraseña" id="pwd" name="registroContraseña">
                </div>
                
            </div>
        </br>

                <button type="submit" class="btn btn-primary mb-2">Enviar</button>

                <div id="error" style="font-size:14px;color:#000;font-weight:normal;letter-spacing: 1px">
                        &nbsp;
                </div>
        </form> 

<div class="d-flex p-5 ">
AQUI VA UNA TABLA

</div>

<script src="../js/admin/registrousuarios.js"></script>
