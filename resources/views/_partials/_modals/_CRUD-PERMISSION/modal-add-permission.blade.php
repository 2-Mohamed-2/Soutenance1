<!-- Add Permission Modal -->
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-simple">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3>Ajouter une nouvelle autorisation</h3>
          <p>Autorisations que vous pouvez utiliser et attribuer à vos utilisateurs.</p>
        </div>
        <form id="addPermissionForm" method="POST" action="{{route('permission.store')}}" class="row">
          @csrf
          <div class="col-12 mb-3">
            <label class="form-label" for="modalPermissionName">Permission Name</label>
            <input type="text" id="modalPermissionName" autocomplete="off" name="name" class="form-control" placeholder="Permission Name" autofocus />
          </div>
          <div class="col-12 mb-3">
            <label class="form-label" for="modalPermissionName">Permission Description</label>
            <input type="text" id="modalPermissionName" autocomplete="off" name="desc" class="form-control" placeholder="Permission Description" autofocus />
          </div>
          {{-- <div class="col-12 mb-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="corePermission" />
              <label class="form-check-label" for="corePermission">
                Définir comme autorisation principale
              </label>
            </div>
          </div> --}}
          <div class="col-12 text-center demo-vertical-spacing">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Sauvegarder</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Anuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Add Permission Modal -->
