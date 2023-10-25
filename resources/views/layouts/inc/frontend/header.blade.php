<div class="loader-wrap">
    <div class="preloader">
        <div class="preloader-close">Preloader Close</div>
    </div>
    <div class="layer layer-one"><span class="overlay"></span></div>
    <div class="layer layer-two"><span class="overlay"></span></div>
    <div class="layer layer-three"><span class="overlay"></span></div>
</div>


<!-- search-popup -->
<div id="search-popup" class="search-popup">
    <div class="close-search"><i class="flaticon-close"></i></div>
    <div class="popup-inner">
        <div class="overlay-layer"></div>
        <div class="search-form">
            <form method="post" action="index.html">
                <div class="form-group">
                    <fieldset>
                        <input type="search" class="form-control" name="search-input" value=""
                            placeholder="Search Here" required>
                        <input type="submit" value="Search Now!" class="theme-btn style-four">
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- search-popup end -->


<!-- main header -->
<header class="main-header">
    <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box">
                <figure class="logo-box">
                    <a href="{{ route('home') }}" style="color:#222; font-weight: 700; font-size: 1.3rem;">
                        <img src="{{ asset('assets/images/icons/logo.png') }}" width="50" alt="soovstudio">
                        <span>
                            SOOVA STUDIO
                        </span>
                    </a>
                </figure>
                <div class="menu-area">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="{{ Request::is('/') ? 'current' : '' }}"><a
                                        href="{{ route('home') }}">Home</a></li>
                                <li class="{{ Request::is('/produk') ? 'current' : '' }}"><a
                                        href="{{ route('products') }}">Products</a></li>
                                <li class="{{ Request::is('/kategori') ? 'current' : '' }}"><a
                                        href="{{ route('categories') }}">Categories</a>
                                </li>
                                <li class="{{ Request::is('/about') ? 'current' : '' }}"><a
                                        href="{{ route('about') }}">About Us</a>
                                </li>
                                <li class="{{ Request::is('/contact') ? 'current' : '' }}"><a
                                        href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="logo-box pull-left">
                    <figure class="logo">
                        <a href="{{ route('home') }}" style="color:#222; font-weight: 700; font-size: 1.3rem;">
                            <img src="{{ asset('assets/images/icons/logo.png') }}" alt="soovastudio" width="50">
                            <span>
                                SOOVA STUDIO
                            </span>
                        </a>
                    </figure>
                </div>
                <div class="menu-area pull-right">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    <nav class="menu-box">
        <div class="nav-logo">
            <a href="{{route('home')}}" style="color:#fff; font-weight: 700; font-size: 1.2rem;">
                <img src="{{ asset('assets/images/icons/logo.png') }}" width="50" alt="soovastudio" title="soovastudio">
                <span>
                    SOOVA STUDIO
                </span>
            </a>
        </div>
        <div class="menu-outer">
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        </div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>Porong, Sidoarjo, Jawa Timur, Indonesia.</li>
                <li><a href="tel:+8801682648101">089519251250</a></li>
                <li><a href="soovastudio@gmail.com">soovastudio@gmail.com</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->
