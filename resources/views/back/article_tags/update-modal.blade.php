
    <!-- Modal -->
@if (!empty($item))
<div class="modal fade" id="modalUpdate{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Relation Article Tag</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('article_tags/'.$item->id) }}" method="post">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="article_id">Article Title</label>
                <select name="article_id" id="article_id" class="form-control">
                    <option value="" hidden>Choose</option>
                    @foreach ($RelationArticle as $item )
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tag_id">Tags Article</label>
                    <select name="tag_id" id="tag_id" class="form-control">
                        <option value="" hidden>Choose</option>
                            @foreach ($Relationtag as $item )
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@else

@endif