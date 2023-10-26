<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="deleteModalLabel">Attenzione</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        Sei sicuro di voler eliminare questo ristorante?<span id="modal-item-title"></span>
        </div>
        @if(count($restaurants) > 0)
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-square btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <form class="d-inline-block" action="{{route('admin.restaurant.destroy', $restaurant->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-square btn-danger">
              Delete
            </button>
          </form>
        </div>
        @endif
      </div>
    </div>
  </div>