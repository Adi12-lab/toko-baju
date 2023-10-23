 @extends('layouts.app')

 @section('styles')
     <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
     <link href="{{ asset('assets/css/jquery-ui.css') }}" rel="stylesheet">
 @endsection


 @section('main')
     {{ Breadcrumbs::render('produk') }}
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
                             <select class="wide">
                                 <option data-display="Popularity">Lowest Price</option>
                                 <option value="1">Highest Price</option>
                                 <option value="2">Ascending</option>
                                 <option value="4">Descending</option>
                             </select>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="our-shop">
                 <div class="row clearfix">
                     @foreach ($products as $product)
                         <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                             <div class="shop-block-one">
                                 <div class="inner-box">
                                     <figure class="image-box">
                                         <img src="{{ asset($product->productImages[0]->image) }}"
                                             alt="{{ $product->name }}">
                                         @if ($product->isNew === 1)
                                             <span class="category green-bg">New</span>
                                         @endif
                                         <ul class="info-list clearfix">
                                             <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                             <li><a href="{{ route('product.view', $product->slug) }}">Detail Produk</a>
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
     <script></script>
 @endsection
