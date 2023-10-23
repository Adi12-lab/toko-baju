@extends('layouts.app')

@section('styles')
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
@endsection

@section('main')
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
                            <span class="item-price this">{{ rupiah($product->productVariants[0]->selling_price) }}</span>
                            <div class="text">
                                <p>{!! $product->small_description !!}</p>
                            </div>
                            @if (isset($size_available[0]['size']))
                                <div class="size-box">
                                    <h5>Size:</h5>
                                    @foreach ($size_available as $sizeItem)
                                        <div class="custom-control custom-radio" wire:key="{{ str()->random(11) }}">
                                            <input type="radio" name="size" id="{{ "size-{$sizeItem['size']}" }}"
                                                class="custom-control-input size" value="{{ $sizeItem['size'] }}"
                                                {{ $loop->iteration === 1 ? 'checked' : '' }}>
                                            <label class="custom-control-label"
                                                for="{{ "size-{$sizeItem['size']}" }}">{{ $sizeItem['size'] }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($variant_available[0]['name'])
                                    <div class="color-box">
                                        <h5>Color:</h5>
                                        <div class="color-inner">

                                        </div>
                                    </div>
                                @endif
                            @endif
                            <div class="othre-options clearfix">
                                <div class="item-quantity">
                                    <input class="quantity-spinner" type="text" value="1" name="quantity">
                                </div>
                                <div class="btn-box">
                                    <button type="button" id="order-button" class="theme-btn-two">Pesan</button>
                                </div>
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
            @isset($relatedProducts)
            <div class="related-product">
                <div class="sec-title style-two">
                    <h2>Related Products</h2>
                    <p>There are some product that we featured for choose your best</p>
                    <span class="separator" style="background-image: url(assets/images/icons/separator-2.png);"></span>
                </div>
                <div class="row clearfix">
                    @foreach($relatedProducts as $product)
                    <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                        <div class="shop-block-one">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{asset($product->productImages[0]->image)}}" alt="">
                                    <ul class="info-list clearfix">
                                        <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                        <li><a href="{{route('product.view',$product->slug)}}l">Details</a></li>
                                        <li><a href="{{asset($product->productImages[0]->image)}}" class="lightbox-image"
                                                data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                    </ul>
                                </figure>
                                <div class="lower-content">
                                    <a href="{{route('product.view', $product->slug)}}">{{$product->name}}</a>
                                    <span class="price">{{rupiah($product->productVariants[0]->selling_price)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endisset
        </div>
    </section>
    <!-- product-details end -->
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('assets/js/bxslider.js') }}"></script>
    <script>
        $(document).ready(function() {
            const sizes = @json($size_available, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
            const variants = @json($variant_available, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT)

            //seleksi yang pertama terlebih dahulu
            const matchingVariants = variants.filter(item => item.size === sizes[0].size);
            //looping variant berdasarkan size yang pertama
            let variantStack = '';
            matchingVariants.forEach((item, index) => {
                if (index === 0) {
                    variantStack += templateVariant(item.name, item.code, true)
                } else {
                    variantStack += templateVariant(item.name, item.code)
                }
            })
            //cari color-inner dan tambahkan
            $('.color-inner').append(variantStack)


            $('.custom-control-input.size').change(function() {
                $('.color-inner').empty()
                const size = $(this).val()
                const getSize = sizes.find(item => item.size === size)
                const matchingVariants = variants.filter(item => item.size === getSize.size);
                //looping variant berdasarkan size yang pertama
                let variantStack = '';
                matchingVariants.forEach((item, index) => {
                    if (index === 0) {
                        variantStack += templateVariant(item.name, true)
                    } else {
                        variantStack += templateVariant(item.name)
                    }
                })
                $('.color-inner').append(variantStack)

                $('.item-price.this').text(formatRupiah(getSize.selling_price))

            })

            //saat memesan
            $('#order-button').click(function() {
                let link = '{!! env('WA_LINK') !!}';
                //ambil nama size
                const product = '{{ $product->name }}'
                const size = $("input[name='size']:checked").val();
                const variant = $("input[name='variant']").val();
                const quantity = $("input[name='quantity']").val();

                if (size && variant) {
                    link +=
                        `Saya ingin memesan produk ${product} ukuran ${size}, varian ${variant} sebanyak ${quantity}`
                } else if (size) {
                    link += `Saya ingin memesan produk ${product} ukuran ${size}, sebanyak ${quantity}`
                } else {
                    link += `Saya ingin memesan produk ${product} sebanyak ${quantity}`
                }
                link = link.replaceAll(" ", "+")
                console.log(link)
                window.open(link)

            })
        })



        function templateVariant(name, isFirst = false) {
            const string = /*html */ `<div class="color-block ${name}">
                                                <input type="radio" id="variant-${name}"
                                                    name="variant" value="${name}" ${isFirst ? 'checked' : ''}>
                                                <label for="variant-${name}"></label>
                                            </div>`
            return string;
        }

        function formatRupiah(amount) {
            if (amount === null) {
                return null;
            }

            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });

            return formatter.format(amount).replace(",00", "");
        }
    </script>
@endsection
