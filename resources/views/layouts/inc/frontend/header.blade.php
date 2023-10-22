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
                <figure class="logo-box"><a href="index.html"><img src="assets/images/logo.png" alt=""></a>
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
                                <li class="dropdown"><a href="index.html">Pages</a>
                                    <ul>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="service.html">Our Service</a></li>
                                        <li><a href="team.html">Our Team</a></li>
                                        <li><a href="testimonials.html">Testimonials</a></li>
                                        <li><a href="error.html">404</a></li>
                                    </ul>
                                </li>
                                <li class="{{ Request::is('/produk') ? 'current' : '' }}"><a
                                        href="{{ route('products') }}">Produk</a></li>
                                <li class="dropdown"><a href="{{ route('categories') }}">Kategori</a>
                                    <div class="megamenu">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 column">
                                                <livewire:frontend.category-header />
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <ul class="menu-right-content clearfix">
                    <li>
                        <div class="search-btn">
                            <button type="button" class="search-toggler"><i class="flaticon-search"></i></button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="logo-box pull-left">
                    <figure class="logo"><a href="index.html"><img src="assets/images/small-logo.png"
                                alt=""></a></figure>
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
        <div class="nav-logo"><a href="index.html"><img src="assets/images/logo-2.png" alt=""
                    title=""></a></div>
        <div class="menu-outer">
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        </div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>Chicago 12, Melborne City, USA</li>
                <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                <li><a href="mailto:info@example.com">info@example.com</a></li>
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
