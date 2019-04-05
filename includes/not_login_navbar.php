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
                        <a href="./index.php"><img src="img/uem_logo3.png" class="img-fluid flex-center"></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!--Social-->
                <li>
                    <ul class="social">
                        <li> <a href="https://www.facebook.com/shattakpage/" class="icons-sm fb-ic"> <i class="fa fa-facebook"> </i> </a> </li>
                        <li><a href="https://www.instagram.com/weirdani/" class="icons-sm pin-ic"><i class="fa fa-instagram left"> </i></a></li>
                        <li><a href="https://www.linkedin.com/in/anirbandey303/" class="icons-sm gplus-ic"><i class="fa fa-linkedin left"> </i></a></li>
                        <li><a href="https://twitter.com/_anirbandey_" class="icons-sm tw-ic"><i class="fa fa-twitter left"> </i></a></li>
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
                    <div id="data" style="background: #4A639B; display:inline-block; word-wrap: break-word;"></div>
                </li>
                <!--/.Search Form-->
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i> Departments<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <?php include'departments.php' ?>
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i> Donate<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a class="waves-effect" href=https://securegw.paytm.in/link/53823/LL_30327 rel="im-checkout" data-behaviour="remote" data-style="light" data-text="Checkout With Paytm" style="width: 320px;height: 52px;border-radius: 2px;border: solid 1px #00b9f5;background: #ffffff;display: block;font-family: 'Open Sans';font-size: 16px;font-weight: 600;text-align: left;color: #00b9f5;padding: 13px 0;"> <div style="width: 130px;margin: 0 auto;">Pay with<img style="height: 26px;margin-left: 5px;position: relative;top: -2px;" src="https://static1.paytm.in/1.4/plogo/paytmLogo.png"></div></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eye"></i> About<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a href="./contact-us.php" class="waves-effect">Join Shattak</a>
                                    </li>
                                    <li><a href="./about-us.php" class="waves-effect">Know More</a>
                                    </li>
                                    <li><a href="./privacy-policy.php" class="waves-effect">Privacy Policy</a>
                                    </li>
                                    <li><a href="./terms-of-service.php" class="waves-effect">Terms and Conditions</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-envelope-o"></i> More<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a href="./contact-us.php" class="waves-effect">Give feedback</a>
                                    </li>
                                    <li><a href="./contact-us.php" class="waves-effect">Send a Message</a>
                                    </li>
                                    <li><a href="./forms.php" class="waves-effect">Placement Group Form</a>
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
                    <a href="./login.php" class="nav-link"><i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">LogIn</span></a>
                </li>
                <li class="nav-item">
                    <a href="./index.php" class="nav-link"><i class="fa fa-home fa-lg"></i> <span class="clearfix d-none d-sm-inline-block">Home</span></a>
                </li>
                <li class="nav-item">
                    <a href="./contact-us.php" class="nav-link"><i class="fa fa-comments-o"></i> <span class="clearfix d-none d-sm-inline-block">Support</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Departments
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php?dept=FIRST-YEAR">First Year</a>
                        <a class="dropdown-item" href="index.php?dept=CSE">Computer Science</a>
                        <a class="dropdown-item" href="index.php?dept=ECE">Electronics & Communication</a>
                        <a class="dropdown-item" href="index.php?dept=EE">Electrical</a>
                        <a class="dropdown-item" href="index.php?dept=EEE">Electrical & Electronics</a>
                        <a class="dropdown-item" href="index.php?dept=ME">Mechanical</a>
                        <a class="dropdown-item" href="index.php?dept=CE">Civil</a>
                        <a class="dropdown-item" href="index.php?dept=BTE">Bio-Technology</a>
                                    

                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.Navbar -->
        <!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=11619977; 
var sc_invisible=1; 
var sc_security="2b559962"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
</script>
<script type="text/javascript"
src="https://www.statcounter.com/counter/counter.js"
async></script>
<noscript><div class="statcounter"><a title="Web Analytics
Made Easy - StatCounter" href="http://statcounter.com/"
target="_blank"><img class="statcounter"
src="//c.statcounter.com/11619977/0/2b559962/1/" alt="Web
Analytics Made Easy - StatCounter"></a></div>
</noscript>
<!-- End of StatCounter Code for Default Guide -->
    </header>
    <!--/.Double navigation-->