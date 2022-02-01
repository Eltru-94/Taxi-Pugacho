<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    
    <a class="navbar-brand" href="/administrador"> <img class="rounded-circle" src="<?=base_url()."/image/".session('foto')?>" width="30"
            height="30"  class="d-inline-block align-top" alt="">&nbsp&nbsp<?php echo session('rol'); ?></a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
            class="fas fa-bars"></i></button>

    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><?php echo session('nombre'); ?></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?=site_url('profile/editUser') ?>"><i class="fas fa-user-edit"></i>&nbsp;Editar</a>
                <a class="dropdown-item" href="<?=site_url('auth/logout') ?>"><i class="fas fa-sign-in-alt"></i>&nbsp;Logout</a>
            </div>
        </li>
    </ul>
</nav>