@extends('back.layout.tamplate')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endpush

@section('title','Create Article Admin')

@section('content')
  
    <!-- Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create</h1>
     
      </div>

      <div class="mt-3">
        <a href="{{ url('article') }}"  class="btn btn-primary mb-2" >Back</a>

        <div class="my-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

       <form action="{{ url('article') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="" hidden>Choose</option>
                            @foreach ($categories as $item )
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="full-text">Deskripsi</label>
                <textarea name="full_text" id="full-text" cols="30" rows="5" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="image">Gambar (Max 2MB)</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            @if (auth()->user()->role == 1)
            <div class="mb-3">
                <label for="user_id">Pilih Nama Anda</label>
                <select name="user_id" id="user_id" class="form-control">
                       <option value="" hidden>Choose</option>
                            @foreach ($user as $item )
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            @else
            <div class="mb-3">
                <label for="user_id">Pilih Nama Anda</label>
                <select name="user_id" id="user_id" class="form-control">
                       <option value="" hidden>Choose</option>
                            <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                </select>
            </div>
            @endif

            <div class="row">
                @if (auth()->user()->role == 1)
                <div class="col-6">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" hidden>Choose</option>
                            <option value="0">Private</option>
                            <option value="1">Publish</option>
                        </select>
                    </div>
                </div>
                @else
                <div class="col-6">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" hidden>Choose</option>
                            <option value="0">Private</option>
                        </select>
                    </div>
                </div>
                @endif


                <div class="col-6">
                    <div class="mb-3">
                        <label for="publish_date">Tanggal Publikasi</label>
                        <input type="date" name="publish_date" id="publish_date" class="form-control">
                    </div>
                </div>
            </div>

            <div class="float-end">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
       </form>

      </div>
    </main>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#dataTable');
    </script>
@endpush