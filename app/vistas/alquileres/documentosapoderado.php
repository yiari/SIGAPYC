<?php include("layout/menuNavegacion.php"); ?>

<div class="container">
    <div class="card-header">

        <div style="text-align: right;">
             <ol>               
                <a class="btn btn-outline-secondary " href="index.php?url=app/vistas/alquileres/propietarios"  role="button">Atras</a>
            </ol>
        </div>


        <div style="text-align: left;">
            <span id="lblPropietario"><strong>APODERADO : </strong></span>
            <br/><br/>
        </div>
        
        <!--tabla-->
        <div class="card mb-4">
            <div class="card-header">
            <i class="fa fa-id-badge"></i>&nbsp;
                DOCUMENTOS CONSIGNADOS
            </div>
            <div class="card-body">
                <table id="DocumentosApoderados">
                    <thead>
                        <tr>

                            
                            <th>Documento</th>
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
<script src="js/alquileres/consultar_documento.js"></script>