<?php 

include("layout/menuNavegacion.php"); 

?>

<div class="container">
    <div class="card-header">

            <h4 class="card-title">Asignación de Inquilinos</h4>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-inq_natural-tab" data-bs-toggle="tab" data-bs-target="#nav-inq_natural" type="button" role="tab" aria-controls="nav-inq_natural" aria-selected="true">Inquilino</button>
                        
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-inq_natural" role="tabpanel" aria-labelledby="nav-inq_natural-tab">
                        <div class="col-12 grid-margin">
                            <!--inq_natural-->
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-sample" id="inq_natural" name="inq_natural" method="POST" action="" autocomplete="off" enctype="multipart/form-data">

                                        <!--Datos Personales-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos del Inquilino</h5>
                                                </div>
                                                </br>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                            <label class="col-sm-12 col-form-label">Buscar Código Inquilino:</label>
                                                            
                                                        </div>
                                                    
                                                        <div class="col-md-3">
                                                            <div class="col-sm-12">
                                                                <select class="form-control" id="id_prop" name="id_prop" style="width:400px" required autofocus>
                                                                    <option selected disabled value=""></option>               
                                                                
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="row">

                                                    
                                                    <div class="col-md-4">
                                                        <label class="col-sm-3 col-form-label">Nombre:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="nom_inqn" name="nom_inqu" readonly="yes">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-3 col-form-label">Apellido:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="ape_inqn" name="ape_inqu" readonly="yes">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <label for="ced_inqu" class="col-sm-12 col-form-label">Cédula de Identidad:</label>
                                                           
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="ced_inqn" name="ci_inqu" readonly="yes">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="col-sm-5 col-form-label">Rif:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="rif_inqn" name="rif_inqu" readonly="yes">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-8 col-form-label">Teléfono local:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="loc_inqn" name="loc_inqu" readonly="yes">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-9 col-form-label">Celular:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="cel_inqn" name="cel_inqu" readonly="yes">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-sm-3 col-form-label">Correo:</label>
                                                        <div class="col-sm-12">
                                                            <input type="email" class="form-control" id="cor_inqn" name="cor_inqu" readonly="yes">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="col-sm-10 col-form-label">Dirección de habitación:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="dir_inqn" name="dir_inqu" readonly="yes">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-sm-10 col-form-label">Dirección de oficina:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="ofi_inqn" name="ofi_inqu" readonly="yes">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>
                                            <!--info_registro-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Información del Registro</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Código:</label>
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="cod_ireg" name="cod_ireg" readonly="yes">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <label for="ced_prop" class="col-sm-12 col-form-label">Nombre del Registro:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="nom_ireg" name="nom_ireg" readonly="yes">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="inputfecha" class="col-sm-12 col-form-label">Fecha:</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" id="fec_ireg" name="fec_ireg" class="form-control" readonly="yes">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Número:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="num_ireg" name="num_ireg" readonly="yes">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Tomo:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="tom_ireg" name="tom_ireg" readonly="yes">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-12 col-form-label">Expediente:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="exp_ireg" name="exp_ireg" readonly="yes">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <div class="container">
                                            <div class="col-12 btn btn-align-center">
                                                <!--button id="guardan" class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#op_inquilino_n" >Guardar</button-->               
                                                <button id="guardan" class="btn btn-primary" type="submit"  >Guardar</button>
                                                <a class="btn btn-primary" href="index.php?url=app/vistas/alquileres/ingresar_inmueble" role="button">Volver</a> 
                                            </div>  <!--onclick="incluir()"-->
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-inq_juridico" role="tabpanel" aria-labelledby="nav-inq_juridico-tab">
                        <div class="col-12 grid-margin">

                            <!--Jurídico-->
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-sample" id="inq_juridico" name="inq_juridico" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                                        <input type="hidden" id="operacion" name="operacion">

                                        <!--Informacion Personal-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Datos del Inquilino Jurídico</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="col-sm-12 col-form-label">Nombre o Razón Social:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="nom_inqj" name="nom_inqj" autofocus required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-sm-12 col-form-label">Rif Jurídico:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="rif_inqj" name="rif_inqj" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="col-sm-12 col-form-label">Actividad Comercial:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="act_inqj" name="act_inqj" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label class="col-sm-12 col-form-label">Dirección Fiscal:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="dir_inqj" name="dir_inqj" autofocus required><br>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="col-sm-9 col-form-label">Celular:</label>
                                                        <div class="col-sm-12">
                                                            <input type="number" class="form-control" id="tel_inqj" name="tel_inqj" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-sm-3 col-form-label">Correo:</label>
                                                        <div class="col-sm-12">
                                                            <input type="email" class="form-control" id="cor_inqj" name="cor_inqj" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <!--info_registro-->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col text-center">
                                                    <h5 class="card-title">Información del Registro</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Código:</label>
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="cod_ireg" name="cod_ireg" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <label for="ced_prop" class="col-sm-12 col-form-label">Nombre del Registro:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" id="nom_ireg" name="nom_ireg" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="inputfecha" class="col-sm-12 col-form-label">Fecha:</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" id="fec_ireg" name="fec_ireg" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Número:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="num_ireg" name="num_ireg" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="col-sm-12 col-form-label">Tomo:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="tom_ireg" name="tom_ireg" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-sm-12 col-form-label">Expediente:</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="exp_ireg" name="exp_ireg" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <div class="container">
                                            <div class="col-12 btn btn-align-center">
                                                <!--button id="guardarj" class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#op_inquilino_n" >Guardar</button-->
                                                <button id="guardarj" class="btn btn-primary" type="submit"  >Guardar</button>
                                            </div><!--onclick="incluirj()"-->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>