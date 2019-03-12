</head>

<body class="fixed-sn indigo-skin">
    
    <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed">
            <ul class="custom-scrollbar">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light">
                        <a href="#"><img src="img/uem_logo3.png" class="img-fluid flex-center"></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!--Social-->
                <li>
                    <ul class="social">
                        <li><a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
                        <li><a href="#" class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
                        <li><a href="#" class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
                        <li><a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
                    </ul>
                </li>
                <!--/Social-->
                <!--Search Form-->
                <li>
                    <form class="search-form" role="search" action="./index" method="POST">
                        <div class="form-group md-form mt-0 pt-1 waves-light">
                            <input type="text" name="search" class="form-control" placeholder="Search..." required onkeyup="searchq();" autocomplete="off">
                        </div>
                    </form>
                    <div id="data" style="background: #4A639B;"></div>
                </li>
                <!--/.Search Form-->
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i> Upload<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="waves-effect">Documents</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Register Subject</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Register Admin</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i> E-Mail<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="waves-effect">Subscribers</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Administrators</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Users</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eye"></i> User Lists<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="waves-effect">Total Users</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Subscribers</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Administrators</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-envelope-o"></i> Other Features<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="waves-effect">View all Notes</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Push Notifications</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Push New Mesage</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Remove User</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Remove Administrator</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Check Emails</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">View Stats</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Deep Login</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p><a href="./index"><b>Shattak's Quordenet</b></a></p>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                    <a href="./profile.php" class="nav-link"><i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Account</span></a>
                </li>
                <li class="nav-item">
                    <a href="./index.php" class="nav-link"><i class="fa fa-home fa-lg"></i> <span class="clearfix d-none d-sm-inline-block">Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fa fa-comments-o"></i> <span class="clearfix d-none d-sm-inline-block">Upload</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Others
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Computer Science</a>
                        <a class="dropdown-item" href="#">Electrical</a>
                        <a class="dropdown-item" href="#">Mechanical</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->