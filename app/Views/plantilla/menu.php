<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">


                <?php $a= session('funcionalidades');?>


                <?php foreach($a as $row){ ?>

                <?php if($row['id_funcionalidad']==1){  ?>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#uno" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                    <?php echo $row['funcionalidad'] ?>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="uno" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/users"><i class="fas fa-user-edit"></i> &nbsp;Usuario</a>
                        <a class="nav-link" href="/roles"><i class="fas fa-box"></i> &nbsp;Roles</a>
                        <a class="nav-link" href="/funcionalidad"><i class="fas fa-file-alt"></i> &nbsp;Funcionalidad</a>
                        <!--<a class="nav-link" href="/users/block"><i class="fas fa-user-lock"></i> &nbsp;Usuarios bloqueados</a>-->
                        <a class="nav-link" href="/users/locked"><i class="fas fa-user-lock"></i> &nbsp;Usuarios bloqueados </a>
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
                        <a class="nav-link" href="/vehiculo"><i class="fas fa-car"></i> &nbsp;Vehiculo</a>
                        <a class="nav-link" href="/vehiculo/alleliminar"><i class="fas fa-trash"></i> &nbsp; Eliminadas</a>
                        <a class="nav-link" href="/vehiculo/activar"><i class="fas fa-check-circle"></i> &nbsp; Activas</a>
                        <a class="nav-link" href="/enableUnit/Report"><i class="fas fa-file-signature"></i> &nbsp;No Reportado</a>


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
                        <a class="nav-link" href="/frecuencia"><i class="fas fa-money-bill-wave"></i> &nbsp;Frecuencia</a>

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
                <div id="cuatro" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/carreras"><i class="fas fa-laptop-house"></i> &nbsp;Central</a>
                        <a class="nav-link" href="/carreras/activadas"><i class="fas fa-car"></i> &nbsp;Carreras en Ejecución </a>
                        <a class="nav-link" href="/carreras/state"><i class="fas fa-file-alt"></i> &nbsp;Carreras Realizadas </a>

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
                    <a class="nav-link" href="/geolocalizacion"><i class="fas fa-map-marked-alt"></i> &nbsp;<i class="fas fa-car"></i> &nbsp;Ubicación</a>

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
                        <a class="nav-link" href="/profile/viewVehicleEnable"><i class="fas fa-taxi"></i>&nbsp;Activas</a>
                        <a class="nav-link" href="/profile/viewVehicleDisable"><i class="fas fa-car"></i> &nbsp;No activas</a>
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
                        <a class="nav-link" href="/reports/users"><i class="fas fa-users"></i> &nbsp;Usuarios</a>
                        <a class="nav-link" href="/reports/frequency"><i class="fas fa-wallet"></i> &nbsp;Frecuencia</a>
                        <a class="nav-link" href="/reports/assistance"><i class="fas fa-car"></i> &nbsp;Asistencia</a>
                        <a class="nav-link" href="/operadores"><i class="fas fa-user"></i> &nbsp;Operadores</a>
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

        </div>
    </nav>
</div>