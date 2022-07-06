<?php 


include("layout/menuNavegacion.php"); 


?>


<div class="container">

    
        
        <h4 class="card-title">FICHA DEL PROPIETARIO </h4>
      
        <div class="card-header">
            <div style="text-align: right;">
                <ol>
                    <a class="btn btn-outline-secondary" href="reportes.php" role="button">Imprimir</a>
                </ol>
            </div>
            <div class="tab-content" id="nav-tabContent">

                    <div class="col-12 grid-margin">
                        <!--datos_generales-->
                        <div class="card">
                            <div class="card-body">

                                <!--Datos del propietario-->
                                <div class="card" id="Propietario">
                                    <div class="card-body">
                                        <div class="col text-center">
                                            <h5 class="card-title">Datos del Personales</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-sm-12 col-form-label">Código:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="id_prop" name="id_prop" autofocus readonly="yes" value=''>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-sm-12 col-form-label">Nombre:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="nom_prop" name="nom_prop" readonly="yes" value=''>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-sm-12 col-form-label">Apellido:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="ape_prop" name="ape_prop" readonly="yes" value=''>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <label for="ced_prop" class="col-sm-12 col-form-label">Cédula de Identidad</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="ci_prop" name="ci_prop" readonly="yes" value=''>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-sm-5 col-form-label">Rif:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="rif_prop" name="rif_prop" readonly="yes" value=''>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-sm-8 col-form-label">Teléfono local:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="loc_prop" name="loc_prop" readonly="yes" value=''>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-sm-9 col-form-label">Celular:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="cel_prop" name="cel_prop" readonly="yes" value=''>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-sm-3 col-form-label">Correo:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="cor_prop" name="cor_prop" readonly="yes" value=''>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>

                                <!--datos bancarios-->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col text-center">
                                            <h5 class="card-title">Datos bancarios</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-sm-10 col-form-label">Banco Nacional:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="id_banc" name="id_banc"  readonly="yes" value=''>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="col-sm-9 col-form-label">Cuenta:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="num_cuen" name="num_cuen" readonly="yes" value=''><br>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="col-sm-9 col-form-label">Cuenta Paypal:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="cor_payp" name="cor_payp" readonly="yes" value=''><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="col-sm-10 col-form-label">Banco Extranjero:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="ban_extr" name="ban_extr" readonly="yes" value=''>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="col-sm-12 col-form-label">Agencia:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="age_extr" name="age_extr" readonly="yes" value=''>

                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <label class="col-sm-12 col-form-label">DC:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="dc_extr" name="dc_extr"readonly="yes"  value=''><br>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="col-sm-12 col-form-label">Cuenta:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="cue_extr" name="cue_extr" readonly="yes" value=''><br>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="col-sm-12 col-form-label">IBAN:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="iba_extr" name="iba_extr" readonly="yes" value=''><br>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="col-sm-12 col-form-label">BIC o SWIFT:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="bic_extr" name="bic_extr" readonly="yes" value=''><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-text">Pago Movil</span>
                                                    <input type="text" placeholder="cedula" id="ced_pmov" name="ced_pmov" aria-label="Cédula" readonly="yes" value='' class="form-control">
                                                    <input type="text" placeholder="banco" id="ban_pmov" name="ban_pmov" aria-label="Banco" value='' readonly="yes" class="form-control">
                                                    <input type="text" placeholder="celular" id="cel_pmov" name="cel_pmov" aria-label="Celular" value='' readonly="yes" class="form-control">
                                                </div><br>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-text">Cuenta Zelle</span>
                                                    <input type="text" class="form-control" placeholder="telefono" id="tel_zell" name="tel_zell" readonly="yes" value=''>
                                                    <input type="text" class="form-control" placeholder="correo" id="cor_zell" name="cor_zell" readonly="yes" value=''>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>

                            </div>
                        </div>
                    
                </div>

               
                    <div class="col-12 grid-margin">
                        <!--inmuebles-->
                        <div class="card">
                            <div class="card-body">
                                <!--tabla-->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class='fas fa-house-user'></i>&nbsp;
                                        INMUEBLES
                                    </div>

                                    <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Tipo</th>
                                                <th>Canon</th>
                                                <th>Gastos Fijos</th>
                                                <th>Gastos Especiales</th>
                                                <th>Estatus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td>22-0723-00 DORAL MEXICO</td>
                                                    <td>Apartamento</td>
                                                    <td>$320</td>
                                                    <td>$20</td>
                                                    <td>Posee</td>
                                                    <td>Activo</td>
                                                </tr>
                                                <tr>
                                                    <td>12-0001-00 TORRE CANAIMA</td>
                                                    <td>MEZZANINA NRO.2</td>
                                                    <td>$120</td>
                                                    <td>$30</td>
                                                    <td>No posee</td>
                                                    <td>Finiquitado</td>
                                                </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 grid-margin">
                        <!--inmuebles-->
                        <div class="card">
                            <div class="card-body">
                                <!--tabla-->
                                <div class="card mb-4">
                                    <div class="card-header">
                                         <i class='fas fa-coins'></i>&nbsp;
                                        LIQUIDACIONES
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Referencia</th>
                                                        <th>Fecha de Emisión</th>
                                                        <th>Unidad</th>
                                                        <th>Liquidación</th>
                                                        <th>Estatus</th>
                                                        <th>Comprobante</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td>0098</td>
                                                        <td>14-may-2022</td>
                                                        <td>22-0723-00 DORAL MEXICO</td>
                                                        <td>$320</td>
                                                        <td>Pendiente</td>
                                                        <td></td>
                                                    </tr>
                                                   
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 grid-margin">
                        <!--edo_cuenta-->
                        <div class="card">
                            <div class="card-body">
                                <!--tabla-->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class='fas fa-file-invoice-dollar'></i>&nbsp;
                                        ESTADO DE CUENTA
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Fecha</th>
                                                        <th>Referencia</th>
                                                        <th>Concepto</th>
                                                        <th>Monto</th>
                                                        <th>Saldo</th>
                                                        <th>Comprobante</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>070058</td>
                                                        <td>3-jun-2022</td>
                                                        <td>Emisión de factura por servicios administrativos</td>
                                                        <td>Bs 320</td>
                                                        <td>Bs 20</td>
                                                        <td>factura</td>
                                                    </tr>
 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
    </div>
</div>