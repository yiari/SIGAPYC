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
                    <a class="nav-link" href="inicio.php?url=inquilinos">Inquilinos</a>
                    <a class="nav-link" href="inmuebles.php">Inmuebles</a>
                    <a class="nav-link" href="documentos.php">Contratos</a>
                </nav>
            </div>

            <!--segundo-->

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsefinanzas" aria-expanded="false" aria-controls="collapsefinanzas">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-transfer"></i></div>
                FACTURACIÓN
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
                        CONFIGURACIÓN 
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


            <!--bitacora propietario-->

           <a class="nav-link" href="index.php?url=menuprincipal">
                <div class="sb-nav-link-icon"><i class="fa-regular fa-folder-open"></i></div>
                BITACORA
            </a>

            <a class="nav-link" href="inicio.php?url=app/vistas/alquileres/verpropietarios">
                <div class="sb-nav-link-icon"><i class='fas fa-chalkboard-teacher'></i></div>
                DATOS PERSONALES
            </a>

            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class='fas fa-coins'></i></div>
                LIQUIDACION
            </a>

            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class='fas fa-file-invoice-dollar'></i></div>
                ESTADO DE CUENTA
            </a>

            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class='fas fa-share-square'></i></div>
                FINIQUITO
            </a>

           
        </div>
        
    </div>
</nav>