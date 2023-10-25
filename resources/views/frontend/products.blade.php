 @extends('layouts.app')

 @section('styles')
     <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
     <link href="{{ asset('assets/css/jquery-ui.css') }}" rel="stylesheet">
 @endsection


 @section('main')
     {{ Breadcrumbs::render('product') }}
     <!-- shop-page-section -->
     <section class="shop-page-section shop-page-1">
         <div class="auto-container">
             <div class="item-shorting clearfix">
                 <div class="left-column pull-left clearfix">
                     <div class="text">
                         <p>Showing {{ $startIndex }}–{{ $endIndex }} of {{ $products->total() }} results</p>
                     </div>
                 </div>
                 <div class="right-column pull-right clearfix">
                     <div class="short-box clearfix">
                         <p>Short by</p>
                         <div class="select-box">
                             <select class="wide" id="sort-by">
                                 <option data-display="Lowest Price" value="asc:price">Lowest Price</option>
                                 <option data-display="Highest Price" value="desc:price">Highest Price</option>
                                 <option data-display="Ascending" value="asc:name">Ascending</option>
                                 <option data-display="Descending" value="desc:name">Descending</option>
                             </select>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="our-shop">
                 <div class="row clearfix shop-row">
                     @foreach ($products as $product)
                         <div class="col-lg-3 col-md-6 col-sm-12 shop-block"
                             data-price="{{ $product->productVariants[0]->selling_price }}">
                             <div class="shop-block-one">
                                 <div class="inner-box">
                                     <figure class="image-box">
                                         <img src="{{ asset($product->productImages[0]->image) }}"
                                             alt="{{ $product->name }}">
                                         @if ($product->isNew === 1)
                                             <span class="category green-bg">New</span>
                                         @elseif($product->isPopular === 1)
                                             <span class="category red-bg">Hot</span>
                                         @endif
                                         <ul class="info-list clearfix">
                                             <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                             <li><a href="{{ route('product.view', $product->slug) }}">Details</a>
                                             </li>
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
             {{ $products->links() }}

         </div>
     </section>
     <!-- shop-page-section end -->
 @endsection

 @section('scripts')
     <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
     <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
     <script src="{{ asset('assets/js/isotope.js') }}"></script>
     <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
     <script>
         $(document).ready(function() {
             const $shop = $('.shop-row')
             $shop.imagesLoaded(function() {
                 $shop.isotope({
                     itemsSelector: '.shop-block',
                     layoutMode: 'fitRows',
                     masonry: {
                         columnWidth: '.masonry-item.small-column'
                     },
                     animationOptions: {
                         duration: 500,
                         easing: 'linear'
                     },
                     getSortData: {
                         name: '.lower-content a',
                         price: '[data-price] parseInt'
                     }
                 });
             })
             $('#sort-by').change(function() {
                 let sortValue = $(this).val();
                 console.log(sortValue)
                 let sortParams = sortValue.split(':');
                 let sortDirection = sortParams[0] === 'asc' ? true : false;
                 $shop.isotope({
                     sortBy: sortParams[1],
                     sortAscending: sortDirection
                 });

             })
         })
     </script>
 @endsection
