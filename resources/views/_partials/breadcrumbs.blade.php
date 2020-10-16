@if (count($breadcrumbs))

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">

                @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && $loop->last)
            <h1> {{ $breadcrumb->title }}</h1>
                @endif

                {{-- @dump($breadcrumbs) --}}
                @endforeach

                @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                <a style="color: white" href="{{ $breadcrumb->url }}">
                    {{ $breadcrumb->title }}
                    </a><i style="color: white" class="fas fa-arrow-right"></i>
                @else
                <a href="" style="color: white" class="active">{{ $breadcrumb->title }}</a>
                @endif

                @endforeach

            </div>
        </div>
    </div>
</section>

@endif
