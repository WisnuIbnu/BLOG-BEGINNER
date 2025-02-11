<!-- Modal -->
<div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('users') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="role">Pilih Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="" hidden>Choose Role</option>
                     <option value="1">Admin</option>
                     <option value="2">Penulis</option>
                     <option value="3">Guest</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Tambah</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>