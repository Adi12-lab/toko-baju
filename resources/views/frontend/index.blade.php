  @extends('layouts.app')
  @section('main')
      <!-- banner-section -->
      <!-- banner-section -->
      <section class="banner-style-two custom">
          <div class="auto-container">
              <div class="content-box position-relative"
                  style="
              background-image: url(assets/images/banner/banner.jpg);
              height: 490px;
              filter: brightness(80%);
            ">
                  <h1 class="position-absolute wow fadeInUp animated animated" data-wow-delay="00ms"
                      data-wow-duration="1500ms">
                      Sincerity. Sustainable. Inspiring.
                  </h1>
              </div>
          </div>
      </section>
      <!-- banner-section end -->

      <!--introduction -->

      <section class="pb-4 introduction">
          <div class="auto-container">
              <div class="row align-items-center">
                  <div class="col-md-5">
                      <p class="w-100">
                          Art, beauty, and sustainability can come together in the world
                          of fashion. SOOVASTUDIO is committed to creating high-quality
                          clothing without neglecting the impact it brings. Embark on a
                          more sustainable fashion journey with SOOVASTUDIO, as we
                          collectively think about our shared future.
                      </p>
                      <a href="{{ route('products') }}" class="mt-4 theme-btn-three wow fadeInUp animated animated"
                          data-wow-delay="400ms" data-wow-duration="1500ms">Shop Now<i class="flaticon-right-1"></i></a>
                  </div>
                  <div class="col-md-7 mt-3 mt-md-0">
                      <div class="row justify-content-around">
                          <div class="col-4">
                              <img src="assets/images/resource/arumala3.jpg" alt="" />
                          </div>
                          <div class="col-4">
                              <img src="assets/images/resource/arumala1.jpg" alt="" />
                          </div>
                          <div class="col-4">
                              <img src="assets/images/resource/arumala2.jpg" alt="" />
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>


      <!-- topcategory-section -->
      <section class="topcategory-section centred">
          <div class="auto-container">
              <div class="sec-title">
                  <h2>Top Category</h2>
                  <p>Follow the most popular trends and get exclusive items from castro shop</p>
                  <span class="separator" style="background-image: url(assets/images/icons/separator-1.png);"></span>
              </div>
              <div class="row clearfix">
                  @foreach ($categories as $category)
                      <div class="col-lg-3 col-md-6 col-sm-12 category-block">
                          <div class="category-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                              data-wow-duration="1500ms">
                              <figure class="image-box"><img src="{{ asset($category->image) }}" alt="">
                              </figure>
                              <h5><a href="index.html">{{ $category->name }}</a></h5>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
      </section>
      <!-- topcategory-section end -->


      <!-- shop-section -->
      <section class="shop-section">
          <div class="auto-container">
              <div class="sec-title">
                  <h2>Our Top Collection</h2>
                  <p>There are some product that we featured for choose your best</p>
                  <span class="separator" style="background-image: url(assets/images/icons/separator-1.png);"></span>
              </div>
              <div class="sortable-masonry">
                  <div class="filters">
                      <ul class="filter-tabs filter-btns centred clearfix">
                          <li class="active filter" data-role="button" data-filter=".new_arraivals">New Arraivals</li>
                          <li class="filter" data-role="button" data-filter=".popular">Populer</li>
                      </ul>
                  </div>
                  <div class="items-container row clearfix">
                      @foreach ($newProducts as $product)
                          <div class="col-lg-3 col-md-6 col-sm-12 shop-block masonry-item small-column new_arraivals">
                              <div class="shop-block-one">
                                  <div class="inner-box">
                                      <figure class="image-box">

                                          <img src="{{ asset($product->productImages[0]->image) }}"
                                              alt="{{ $product->name }}">
                                          <span class="category green-bg">New</span>
                                          <ul class="info-list clearfix">
                                              <li><a href="#"><i class="flaticon-heart"></i></a></li>
                                              <li><a href="{{ route('product.view', $product->slug) }}">Details</a></li>
                                              <li><a href="{{ asset($product->productImages[0]->image) }}"
                                                      class="lightbox-image" data-fancybox="gallery"><i
                                                          class="flaticon-search"></i></a></li>
                                          </ul>
                                      </figure>
                                      <div class="lower-content">
                                          <a href="{{ route('product.view', $product->slug) }}">{{ $product->name }}</a>
                                          <span
                                              class="price">{{ rupiah($product->productVariants[0]->selling_price) }}</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                      @foreach ($popularProducts as $product)
                          <div class="col-lg-3 col-md-6 col-sm-12 shop-block masonry-item small-column popular">
                              <div class="shop-block-one">
                                  <div class="inner-box">
                                      <figure class="image-box">
                                          <img src="{{ asset($product->productImages[0]->image) }}"
                                              alt="{{ $product->name }}">
                                          <ul class="info-list clearfix">
                                              <li><a href="#"><i class="flaticon-heart"></i></a></li>
                                              <li><a href="{{ route('product.view', $product->slug) }}">Details</a></li>
                                              <li><a href="{{ asset($product->productImages[0]->image) }}"
                                                      class="lightbox-image" data-fancybox="gallery"><i
                                                          class="flaticon-search"></i></a></li>
                                          </ul>
                                      </figure>
                                      <div class="lower-content">
                                          <a href="{{ route('product.view', $product->slug) }}">{{ $product->name }}</a>
                                          <span
                                              class="price">{{ rupiah($product->productVariants[0]->selling_price) }}</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  </div>
              </div>
              <div class="more-btn centred"><a href="{{ route('products') }}" class="theme-btn-one">View All Products<i
                          class="flaticon-right-1"></i></a></div>
          </div>
      </section>
      <!-- shop-section end -->


      <!-- cta-section -->
      <section class="cta-section">
          <div class="image-layer" style="background-image: url(assets/images/background/clothes.jpg);"></div>
          <div class="auto-container">
              <div class="cta-inner centred">
                  <div class="pattern-layer">
                      <div class="pattern-1" style="background-image: url(assets/images/shape/shape-2.png);"></div>
                      <div class="pattern-2" style="background-image: url(assets/images/shape/shape-3.png);"></div>
                  </div>
                  <h2>End of Season Clearance Sale upto 50%</h2>
                  <a href="{{route('products')}}" class="theme-btn-one">Shop Now<i class="flaticon-right-1"></i></a>
              </div>
          </div>
      </section>
      <!-- cta-section end -->


      <!-- service-section -->
      <section class="service-section">
          <div class="auto-container">
              <div class="inner-container">
                  <div class="row clearfix">
                      <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                          <div class="service-block-one">
                              <div class="inner-box">
                                  <div class="icon-box"><i class="flaticon-truck"></i></div>
                                  <h3><a href="index.html">Free Shipping</a></h3>
                                  <p>Free shipping on oder over $100</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                          <div class="service-block-one">
                              <div class="inner-box">
                                  <div class="icon-box"><i class="flaticon-credit-card"></i></div>
                                  <h3><a href="index.html">Secure Payment</a></h3>
                                  <p>We ensure secure payment with PEV</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                          <div class="service-block-one">
                              <div class="inner-box">
                                  <div class="icon-box"><i class="flaticon-24-7"></i></div>
                                  <h3><a href="index.html">Support 24/7</a></h3>
                                  <p>Contact us 24 hours a day, 7 days a week</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                          <div class="service-block-one">
                              <div class="inner-box">
                                  <div class="icon-box"><i class="flaticon-undo"></i></div>
                                  <h3><a href="index.html">30 Days Return</a></h3>
                                  <p>Simply return it within 30 days for an exchange.</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- service-section end -->
  @endsection

  @section('scripts')
      <script src="{{ asset('assets/js/isotope.js') }}"></script>
  @endsection
