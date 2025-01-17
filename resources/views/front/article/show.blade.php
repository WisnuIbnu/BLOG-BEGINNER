    
@extends('front.layout.tamplate')

@section('content')
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <div class="card mb-4 shadow-sm">
                        <a href="{{ url('p/'.$article->slug) }}">
                            <img class="card-img-top"  src="{{ asset('storage/back/'.$article->image ) }}"  alt="gambar">
                        </a>
                        <div class="card-body">
                            <div class="small text-muted">{{ $article->created_at->format('d-m-Y') }}</div>
                            <div class="large">{{ $article->Category->name }}</div>
                            <h2 class="card-title">{{ $article->title }}</h2>   
                            <p class="card-text">{{ $article->full_text }}</p>
                        </div>
                    </div>                   
                </div>
                {{-- Side Widget Start --}}
                @include('front.layout.side-widgets')
                {{-- Side Widgets End --}}

                <div class="float-end mb-3">
                    <a href="{{ url('/') }}"  class="btn btn-secondary ">Back</a>
                </div>
            </div>
        </div>
@endsection
       