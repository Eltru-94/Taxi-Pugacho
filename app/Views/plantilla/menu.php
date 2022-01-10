<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">


                <?php $a= session('funcionalidades');?>


                <?php foreach($a as $row){ ?>

                <?php if($row['id_funcionalidad']==1){  ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#uno" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                    <?php echo $row['funcionalidad'] ?>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="uno" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/users">Usuario</a>
                        <a class="nav-link" href="/roles">Roles</a>
                        <a class="nav-link" href="/funcionalidad">Funcionalidad</a>
                        <a class="nav-link" href="/users/block">Usuarios bloqueados</a>
                    </nav>
                </div>
                <?php } ?>

                <?php if($row['id_funcionalidad']==2){  ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dos" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-taxi"></i></div>
                    <?php echo $row['funcionalidad'] ?>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="dos" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/vehiculo">Vehiculo</a>
                        <a class="nav-link" href="/vehiculo/activar">Activar Unidades</a>
                        <a class="nav-link" href="/vehiculo/alleliminar">Unidades Eliminadas</a>
                    </nav>
                </div>
                <?php } ?>

                <?php if($row['id_funcionalidad']==5){  ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tres" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-donate"></i></div>
                    <?php echo $row['funcionalidad'] ?>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="tres" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/frecuencia">Cobro Frecuencia</a>

                    </nav>
                </div>
                <?php } ?>

                <?php if($row['id_funcionalidad']==3){  ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cuatro"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed"></i></div>
                    <?php echo $row['funcionalidad'] ?>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="cuatro" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/carreras">Central</a>
                        <a class="nav-link" href="/carreras/state">Carreras </a>
                    </nav>
                </div>
                <?php } ?>

                <?php if($row['id_funcionalidad']==4){  ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cinco" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <?php echo $row['funcionalidad'] ?>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="cinco" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="/geolocalizacion">Ubicación Vehiculo</a>

                    </nav>
                </div>
                <?php } ?>

                <?php if($row['id_funcionalidad']==6){  ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#seis" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                    <?php echo $row['funcionalidad'] ?>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="seis" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                    </nav>
                </div>
                <?php } ?>

                <?php if($row['id_funcionalidad']==7){  ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#siete" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                    <?php echo $row['funcionalidad'] ?>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="siete" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                    </nav>
                </div>
                <?php } ?>

                <?php if($row['id_funcionalidad']==8){  ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ocho" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                    <?php echo $row['funcionalidad'] ?>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="ocho" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                    </nav>
                </div>
                <?php } ?>


                <?php } ?>


            </div>
        </div>
        <div class="sb-sidenav-footer">
            <?php echo session('nombre'); ?>
        </div>
    </nav>
</div>