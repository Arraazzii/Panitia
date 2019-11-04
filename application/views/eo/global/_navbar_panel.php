    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand mr-sm-5" href="<?= site_url('event_organizer/dashboard') ?>"><b>Panitia.id</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('event_organizer/dashboard') ?>"><i class="mdi mdi-home"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('event_organizer/events') ?>"><i class="mdi mdi-calendar"></i> My Events</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('event_organizer/pembayaran') ?>"><i class="mdi mdi-cart-outline"></i> Pembayaran</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('event_organizer/invoice') ?>"><i class="mdi mdi-cart-outline"></i> Invoice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('event_organizer/list_event_pendaftaran') ?>"><i class="mdi mdi-book"></i> Pendaftaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('event_organizer/list_event_pembayaran') ?>"><i class="mdi mdi-cash"></i> Pembayaran</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu border-0 shadow animate slideIn" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?= site_url('event_organizer/dashboard') ?>">Dashboard</a>
                            <a class="dropdown-item" href="<?= site_url('event_organizer/profile') ?>">Profile</a>
                            <a class="dropdown-item" onclick="return confirm('Are You sure you want to logout?');" href="<?= site_url('logout_eo') ?>">Log Out</a>
                        </div>
                        </li>   
                    </ul>
            </form>
            </div>
        </div>
      </nav>