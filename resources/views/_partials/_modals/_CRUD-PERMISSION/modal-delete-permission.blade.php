<!-- Add Permission Modal -->
<div class="modal fade" id="deletePermissionModal{{$permission->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-simple">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3>Notification de suppression</h3>
        </div>
        <form method="POST" action="{{route('permission.destroy', encrypt($permission->id) )}}" class="row">
          @method('delete')
          @csrf
          <div class="col-12 mb-3">
            <div class="text-wrap">
              Etes-vous sûr de vouloir supprimer definitivement l'autorisation : <u>{{$permission->name}}</u> ?
            </div>
          </div>
          <div class="col-12 text-center demo-vertical-spacing">
            <button type="submit" class="btn btn-danger me-sm-3 me-1">Oui</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Non</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Add Permission Modal -->
