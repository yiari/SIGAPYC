<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
    <div class="nav"><br>
            <a class="nav-link" href="principal.php">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-arrow-left"></i></div>
                Administradora Yuruary
            </a><br>
            <!--primero-->

            <a class="nav-link" href="index.php?url=menuprincipal">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-home"></i></div>
                INICIO
                
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsealquileres" aria-expanded="false" aria-controls="collapsealquileres">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                ALQUILERES
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsealquileres" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="inicio.php?url=app/vistas/alquileres/propietarios">Propietario</a>
                    <a class="nav-link" href="inicio.php?url=app/vistas/alquileres/inquilinos">Inquilinos</a>
                    <a class="nav-link" href="index.php?url=app/vistas/alquileres/inmuebles">Inmuebles</a>
                    <a class="nav-link" href="index.php?url=app/vistas/alquileres/contratos">Contratos</a>
                </nav>
            </div>

            <!--segundo-->

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsefinanzas" aria-expanded="false" aria-controls="collapsefinanzas">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-transfer"></i></div>
                FINANZAS
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsefinanzas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="p_natural.php">Caja</a>
                    <a class="nav-link" href="p_juridica.php">otro</a>
                    <a class="nav-link" href="p_juridica.php">otros</a>
                </nav>
            </div>

            <!--tercero-->

            <a class="nav-link collapsed"  href="#" data-bs-toggle="collapse" data-bs-target="#collapsesistema" aria-expanded="false" aria-controls="collapsesistema">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-transfer"></i></div>
                        CONFIGURACIÓN DEL SISTEMA
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsesistema" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="">Crear roles</a>
                    <a class="nav-link" href="inicio.php?url=app/vistas/admin/registro">Crear usuarios</a>
                    <a class="nav-link" href="#">tipo de inmuebles</a>
                    <a class="nav-link" href="#">tipo de Pagos</a>
                </nav>
            </div>

        </div>
        <!--bitacora propietario-->
        <nav>
           <a class="nav-link" href="index.php?url=menuprincipal">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-home"></i></div>
                BITACORA
                
            </a>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link" href="inicio.php?url=app/vistas/alquileres/verpropietarios"><i class='fas fa-chalkboard-teacher'></i>&nbsp;Datos Generales</a>

                <button class="nav-link" id="nav-inmuebles-tab" data-bs-toggle="tab" data-bs-target="#nav-inmuebles" type="button" role="tab" aria-controls="nav-inmuebles" aria-selected="false"><i class='fas fa-house-user'></i>&nbsp;&nbsp;Inmuebles</button>

                <button class="nav-link" id="nav-liquidaciones-tab" data-bs-toggle="tab" data-bs-target="#nav-liquidaciones" type="button" role="tab" aria-controls="nav-liquidaciones" aria-selected="false"><i class='fas fa-coins'></i>&nbsp;&nbsp;Liquidaciones</button>

                <button class="nav-link" id="nav-edo_cuenta-tab" data-bs-toggle="tab" data-bs-target="#nav-edo_cuenta" type="button" role="tab" aria-controls="nav-edo_cuenta" aria-selected="false"><i class='fas fa-file-invoice-dollar'></i>&nbsp;&nbsp;Estado de Cuenta</button>

                <button class="nav-link" id="nav-finiquito-tab" data-bs-toggle="tab" data-bs-target="#nav-finiquito" type="button" role="tab" aria-controls="nav-finiquito" aria-selected="false"><i class='fas fa-share-square'></i>&nbsp;&nbsp;Finiquito</button>
                
            </div>
        </nav>
    </div>
</nav>