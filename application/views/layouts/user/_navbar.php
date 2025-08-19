<nav class="navbar sticky-top navbar-expand-lg navbar-dark">
    <div class="container">
        <img src="<?= base_url("assets/apple-touch-icon.png")?>" height="50px"><a class="navbar-brand" href="<?= base_url() ?>">Destiny.Industries</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!--<ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $this->uri->segment(2) == 'men' ? 'active' : '' ?>" href="<?= base_url('shop/men') ?>"><b>Pria</b></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $this->uri->segment(2) == 'women' ? 'active' : '' ?>" href="<?= base_url('shop/women') ?>"><b>Wanita</b></a>
                </li> -->
            </ul>
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <form action="<?= base_url('shop/search') ?>" method="POST" class="form-inline">
                        <div class="input-group input-navbar">
                            <input type="text" name="keyword" class="form-control" size="30" placeholder="Cari Produk">
                            <div class="input-group-append button-navbar">
                                <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if (! $this->session->userdata('is_login')) : ?>
                    <li class="nav-item">
                        <span href="" class="nav-link text-white">
                            <a href="<?= base_url('register') ?>" class="text-white">Register</a> | <a href="<?= base_url('login') ?>" class="text-white">Login</a>
                        </span>
                    </li>
                <?php else : ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b><?= $this->session->userdata('name') ?></b>
                        </a>
                        <div style="background-color: #EDEADE; border-radius: 20px;" class="dropdown-menu" aria-labelledby="dropdown-2">
                            <a href="<?= base_url('/profile') ?>" style="border-radius: 20px;" class="dropdown-item">Profile</a>
                            <a href="<?= base_url("/myorder") ?>" style="border-radius: 20px;" class="dropdown-item">Orders</a>
                            <a href="<?= base_url('/logout') ?>" style="border-radius: 20px;" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                <?php endif ?>
                <li class="nav-item">
                    <a href="<?= base_url('cart') ?>" class="nav-link text-white"><i class="fas fa-shopping-cart"></i> <span>(<?= getCart() ?> Produk)</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>