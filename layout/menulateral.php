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
    </div>
</nav>