@push('styles')
    <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.bootstrap-touchspin.css') }}" rel="stylesheet">
    @foreach ($variant_available as $variantItem)
        <style>
            .color-box .color-block.{{ $variantItem['name'] }} [type="radio"]:checked+label:before,
            .color-box .color-block.{{ $variantItem['name'] }} [type="radio"]:not(:checked)+label:before {
                background: {{ $variantItem['code'] }};
            }
        </style>
    @endforeach
@endpush

<div>
    {{ Breadcrumbs::render('produkview', $product) }}
    <!-- product-details -->
    <section class="product-details product-details-4">
        <div class="auto-container">
            <div class="product-details-content">
                <div class="row clearfix">
                    <div wire:ignore class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="bxslider">
                            @foreach ($product->productImages as $image)
                                <div class="slider-content">
                                    <div class="product-image">
                                        <figure class="image">
                                            <img src="{{ asset($image->image) }}" alt="">
                                            <a href="{{ $image->image }}" class="lightbox-image"><i
                                                    class="flaticon-search-2"></i></a>
                                        </figure>
                                    </div>
                                    <div class="slider-pager centred">
                                        <ul class="thumb-box">
                                            @foreach ($product->productImages as $image)
                                                <li>
                                                    <a class="{{ $loop->iteration - 1 === 0 ? 'active' : '' }}"
                                                        data-slide-index="{{ $loop->iteration - 1 }}" href="#">
                                                        <figure><img src="{{ asset($image->image) }}" alt="">
                                                        </figure>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <span class="item-price">{{ rupiah($product->productVariants[0]->selling_price) }}</span>
                            <div class="text">
                                <p>{{ $product->small_description }}</p>
                            </div>
                            @if (isset($size_available[0]['size']))
                                <div class="size-box">
                                    <h5>Size:</h5>
                                    @foreach ($size_available as $sizeItem)
                                        <div class="custom-control custom-radio" wire:key="{{ str()->random(11) }}">
                                            <input type="radio" name="customRadio"
                                                id="{{ "size-for-{$sizeItem['size']}" }}"
                                                class="custom-control-input size" value="{{ $sizeItem['size'] }}"
                                                wire:model.live="size_change">
                                            <label class="custom-control-label"
                                                for="{{ "size-for-{$sizeItem['size']}" }}">{{ $sizeItem['size'] }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="color-box">
                                    <h5>Color:</h5>
                                    <div class="color-inner">
                                        @foreach ($variant_available as $variantItem)
                                            <div class="color-block {{ $variantItem['name'] }}">
                                                <input type="radio" id="{{ $variantItem['name'] }}"
                                                    name="radio-group" value="{{ $variantItem['code'] }}"
                                                    wire:model="variant_change">
                                                <label for="{{ $variantItem['name'] }}"></label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="othre-options clearfix">
                                <div class="item-quantity">
                                    <input class="quantity-spinner" type="text" value="1" name="quantity">
                                </div>
                                <div class="btn-box">
                                    <a href="{{ $size_change }}" class="theme-btn-two"
                                        wire:click.prevent="order">Pesan</a>
                                </div>
                                <ul class="info clearfix">
                                    <li><a href="product-details.html"><i class="flaticon-heart"></i></a></li>
                                    <li><a href="product-details.html"><i class="flaticon-search"></i></a></li>
                                </ul>
                            </div>
                            <ul class="share-option clearfix">
                                <li>
                                    <h5>Follow Us:</h5>
                                </li>
                                <li><a href="shop-details.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="shop-details.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="shop-details.html"><i class="fab fa-vimeo-v"></i></a></li>
                                <li><a href="shop-details.html"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-discription">
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1">Description</li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="text">
                                {!! $product->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="related-product">
                <div class="sec-title style-two">
                    <h2>Related Products</h2>
                    <p>There are some product that we featured for choose your best</p>
                    <span class="separator" style="background-image: url(assets/images/icons/separator-2.png);"></span>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                        <div class="shop-block-one">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="assets/images/resource/shop/shop-1.jpg" alt="">
                                    <ul class="info-list clearfix">
                                        <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                        <li><a href="product-details.html">Add to cart</a></li>
                                        <li><a href="assets/images/resource/shop/shop-1.jpg" class="lightbox-image"
                                                data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                    </ul>
                                </figure>
                                <div class="lower-content">
                                    <a href="product-details.html">Cold Crewneck Sweater</a>
                                    <span class="price">$70.30</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-details end -->
</div>
@push('scripts')
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('assets/js/bxslider.js') }}"></script>
    {{-- <script>
        document.addEventListener('livewire:init', () => {
            
            $('.custom-control-input.size').change(function() {
                const size = $(this).val()
                Livewire.dispatch('sizeChanging', {
                    size: size
                })
                // console.log(size)
            })
        })
    </script> --}}
@endpush
