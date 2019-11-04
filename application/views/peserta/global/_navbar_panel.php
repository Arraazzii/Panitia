    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand mr-sm-5" href="<?= site_url('peserta/dashboard') ?>"><b>Panitia.id</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('peserta/event_now') ?>"><i class="mdi mdi-calendar"></i> Events Now <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('peserta/upcoming') ?>"><i class="mdi mdi-calendar-clock"></i> Upcoming Events</a>
                </li>
                <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-map-marker-radius"></i> Lokasi
                    </a>
                    <div class="dropdown-menu dropdown-menu-large border-0 shadow p-3 animate slideIn" aria-labelledby="navbarDropdown">
            
                        
                        <div class="container">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <h1 style="color: #00b894;"><i class="mdi mdi-map-marker-radius"></i></h1>
                                <h3>LOKASI</h3>
                            </div>
                            <!-- /.col-md-4  -->
                            <div class="col-md-8">
                                <form action="">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Pilih Lokasi</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>Pilih Lokasi</option>
                                                <option>Jakarta</option>
                                                <option>Bandung</option>
                                                <option>Bekasi</option>
                                                <option>Tangerang</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                        <!--  /.container  -->
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('peserta/myevent') ?>"><i class="mdi mdi-book"></i> My Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('peserta/pembayaran') ?>"><i class="mdi mdi-cash"></i> Pembayaran</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu border-0 shadow animate slideIn" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= site_url('peserta/dashboard') ?>">Dashboard</a>
                        <a class="dropdown-item" href="<?= site_url('peserta/profile') ?>">Profile</a>
                        <a class="dropdown-item" onclick="return confirm('Are You sure you want to logout?');" href="<?= site_url('logout_peserta') ?>">Log Out</a>
                    </div>
                    </li>   
                </ul>
            </div>
        </div>
      </nav>