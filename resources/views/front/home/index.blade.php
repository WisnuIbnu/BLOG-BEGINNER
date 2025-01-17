    
@extends('front.layout.tamplate')

@section('content')
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4 shadow">
                        <a href="{{ url('p/'.$latest->slug) }}">
                            <img class="card-img-top"  src="{{ asset('storage/back/'.$latest->image ) }}"  alt="gambar">
                        </a>
                        <div class="card-body">
                            <div class="small text-muted">{{ $latest->created_at->format('d-m-Y') }}</div>
                            <div class="large">{{ $latest->Category->name }}</div>
                            <h2 class="card-title">{{ $latest->title }}</h2>
                            <p class="card-text">{{ Str::limit(strip_tags($latest->full_text), 160, '...') }}</p>
                            <a class="btn btn-primary" href="{{ url('p/'.$latest->slug) }}">Read more →</a>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        @foreach ($article as $item )
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4 shadow">
                                <a href="{{ url('p/'.$item->slug) }}">
                                    <img class="card-img-top foto-artikel"  src="{{ asset('storage/back/'.$item->image ) }}"  alt="gambar">
                                </a>
                                <div class="card-body card-height">
                                    <div class="small text-muted">
                                        {{ $item->created_at->format('d-m-Y') }}
                                        <a href="{{ url('p/'.$item->slug) }}">{{ $item->Category->name }}</a>
                                    </div>
                                    <h2 class="card-title">{{ $item->title }}</h2>
                                    <p class="card-text">{{ Str::limit(strip_tags($item->full_text), 160, '...') }}</p>
                                    <a class="btn btn-primary" href="{{ url('p/'.$item->slug) }}">Read more →</a>
                                </div>
                            </div>
                        </div>     
                        @endforeach
                       
                    </div>

                    <div class=" pagination justify-content-center my-4">
                        {{ $article->links() }}
                    </div>

                </div>
                {{-- Side Widget Start --}}
                @include('front.layout.side-widgets')
                {{-- Side Widgets End --}}
            </div>
        </div>
@endsection
       