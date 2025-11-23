

<!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- END LOADER -->

<!-- START HEADER -->
<header class="header_wrap">
    <div class="bottom_header dark_skin main_menu_uppercase border-top">
    	<div class="container">
            <div class="row align-items-center"> 
                <div class="col-lg-12 col-md-8 col-sm-6 col-12">
                	<nav class="navbar navbar-expand-lg">
                    	<button class="navbar-toggler side_navbar_toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSidetoggle" aria-expanded="false"> 
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                        </div> 
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li class="">
                                    <a class="nav-link {{ Route::is('home') ? "active" : "" }}" href="{{ route('home') }}">Home</a> 
                                </li>
                                <li><a class="nav-link nav_item {{ Route::is('contact') ? "active" : "" }}" href="contact.html">Contact Us</a></li> 
                            </ul>
                        </div>
                        <div class="contact_phone contact_support">
                            <span class=" btn btn-fill-out staggered-animation text-uppercase animated slideInLeft text-white">Join as Author</span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER -->