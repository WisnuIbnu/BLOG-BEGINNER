@foreach ($users as $item )
    <!-- Modal -->
<div class="modal fade" id="modalUpdate{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Data User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('users/'.$item->id) }}" method="post">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $item->name) }}">
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('name', $item->email) }}">
            </div>

            <div class="mb-3">
                <label for="password">Password <span class="small">Jika tidak ingin mengubah password harap mengkosongkan isi kolom</span></label>
                <input type="password" name="password" id="password" class="form-control" value="{{ old('name') }}">
            </div>

            @if (auth()->user()->role == 1)
            <div class="mb-3">
                <label for="role">Pilih Role<span class="small"> Kolom Ini Harus Pilih</span></label>
                <select name="role" id="role" class="form-control">
                    <option value="" hidden>Choose Role</option>
                     <option value="1">Admin</option>
                     <option value="2">Penulis</option>
                     <option value="3">Guest</option>
                </select>
            @else
                <label for="role">Pilih Role<span class="small"> Kolom Ini Harus Pilih</span></label>
                <select name="role" id="role" class="form-control">
                    <option value="" hidden>Choose Role</option>
                     <option value="2">Penulis</option>
                </select>
              </div>
            @endif
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach