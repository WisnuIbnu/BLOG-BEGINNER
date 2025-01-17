@extends('back.layout.tamplate')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
@endpush

@section('title','Manage Article Tags - Admin')

@section('content')
  
    <!-- Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Relation Tags</h1>
     
      </div>

      <div class="mt-3">
      <a href="{{ url('article_tags/create') }}"  class="btn btn-primary mb-2" >Created</a>

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

        @if (@session('success'))
            <div class="my-3">
                <div class="alert alert-success">
                    <ul>
                       {{ session('success') }}
                    </ul>
                </div>
            </div>
        @endif

        @if (@session('hapus'))
        <div class="my-3">
            <div class="alert alert-danger">
                <ul>
                   {{ session('hapus') }}
                </ul>
            </div>
        </div>
        @endif

        <table class="table table-striped table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title Article</th>
                    <th>Name Tags</th>
                    <th>Created At</th>
                    <th>Function</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($articles as $item )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->Article->title}}</td>  
                    <td>{{ $item->Tag->name}}</td>  
                    <td>{{ $item->created_at }}</td>   
                    <td>
                        <div class="text-center">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $item->id }}">Edit</button>
                        </div>
                    </td>               
                </tr>                    
                @endforeach
            </tbody>
        </table>
      </div>

      @include('back.article_tags.update-modal')
      @include('back.article_tags.delete-modal')
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