@extends('layouts.app')
@section('main')
    {{ Breadcrumbs::render('kategori') }}
    <!-- topcategory-section -->
    <section class="topcategory-section centred">
        <div class="auto-container">
            <div class="row clearfix">
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-md-6 col-sm-12 category-block">
                        <div class="category-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <figure class="image-box"><img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                            </figure>
                            <h5><a href="index.html">{{ $category->name }}</a></h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- topcategory-section end -->
@endsection
