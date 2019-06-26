<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <!-- <img class="navbar-brand-full" src="<?=base_url();?>assets/img/kjsce-logo-2.png" width="120" height="45" alt="CoreUI Logo"> -->
        <p class="h5">KJSCE Feedback</p>
    </a>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
            <i class="fa fa-bell" aria-hidden="true"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </li>

        <!-- Right Top Nav Bar -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <img class="img-avatar" data-toggle="tooltip" data-placement="bottom"
                    title="<?php echo $_SESSION['fname'] . " - " . $_SESSION['user_type']; ?>"
                    src="<?=base_url();?>assets/img/avatars/6.jpg" alt="admin@bootstrapmaster.com">
            </a>

            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <!-- <img class="img-avatar" src="<?=base_url();?>assets/img/avatars/6.jpg" alt="admin@bootstrapmaster.com"> -->
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="Ctrl_feedback/logout">
                    <i class="fa fa-lock"></i> Logout</a>
            </div>
        </li>
    </ul>

</header>