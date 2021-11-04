<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                    Administraivo
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="admin" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/users">Usuario</a>
                        <a class="nav-link" href="/rol">Roles</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Funcionalidad</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taxi" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                    Taxis
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="taxi" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Registro</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Extras</a>

                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <?=$persona[0]['correo'] ?>
        </div>
    </nav>
</div>