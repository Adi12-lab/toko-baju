
<!-- page-title -->
@unless ($breadcrumbs->isEmpty())
    <section class="page-title centred">
        <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{ $breadcrumbs->last()->title }}</h1>
                <ul class="bread-crumb clearfix">
                    @foreach ($breadcrumbs as $breadcrumb)
                        @if ($breadcrumb->url && !$loop->last)
                            <li><i class="flaticon-home-1"></i><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                            </li>
                        @else
                            <li>{{ $breadcrumb->title }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endunless
<!-- page-title end -->
