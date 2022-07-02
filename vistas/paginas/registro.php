
<h2 class=" text-center">REGISTRO DE USUARIO</h2><br>

<div class="d-flex">

        <form class="p-5 bg-light" method="post">
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

                <?php

                

                /* =================================================================
                        Forma que se instancia la clase de un metodo  estatico
                    ==================================================================== */ 

                    $registro = ControladorFormulario::ctrregistros();
                        
                        If( $registro == "ok"){

                            echo '<script>
                                        if (window.history.replaceState){

                                            window.history.replaceState(null,null,window.location.herf),
                                        }


                                    </script>';

                            echo '<div class="alert alert-success">El usuario fue regitrado con exito </div>';
                        }

                 ?>    
        </form> 

<div class="d-flex p-5 ">

<?php

$usuario = ControladorFormulario::ctrselccionarRegistros();
//echo '<pre>' ; print_r($usuario); echo '</pre>';

?>



<table class="table table-striped">
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

    <?php foreach ($usuario as $key => $value): ?>


    <tr>
            <td><?php echo ($key+1);?></td>
            <td><?php echo $value["nombre"];   ?></td>
            <td><?php echo $value["apellido"]; ?></td>
            <td><?php echo $value["email"]; ?></td>
            <td><?php echo $value["fecha_creacion"]; ?></td>
            <td>
                <div class="btn-group">

                    <button class="btn btn-warning" ><i class="fas fa-edit" alt=“editar”></i>Editar</button>
                    <button class="btn btn-danger">Eliminar</button>

                    
                </div>

            </td>
            
        </tr>


    <?php endforeach ?>
        
      
    </tbody>
</table>

</div>

</div>

