<ul class="d-flex">
    <?php
    if (!$this->session->userdata('UserLoginSession')) { ?>

        <li class="p-3 list-group-item border-bottom border-secondary  m-2">
            <a class="nav-link" href="<?= base_url('login') ?>">
                <h1>Login</h1>
            </a>
        </li>
        <li class="p-3 list-group-item  border-bottom border-secondary  m-2    ">
            <a class="nav-link" href="<?= base_url('register') ?>">
                <h1>Register</h1>
            </a>
        </li>

    <?php } else { ?>
        
        <li class=" p-3 list-group-item border-bottom border-secondary  m-2 " style="float: right;">
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
                <h1>Dashboard</h1>
            </a>
        </li>
        <li class=" p-3 list-group-item border-bottom border-secondary  m-2 " style="float: right;">
            <a class="nav-link" href="<?= base_url('logout') ?>">
                <h1>Çıkış Yap</h1>
            </a>
        </li>


    <?php } ?>





</ul>