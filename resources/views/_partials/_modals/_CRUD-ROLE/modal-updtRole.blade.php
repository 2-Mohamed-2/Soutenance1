<div class="modal fade" id="updtRoleModal{{$role->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalScrollableTitle">Modification d'un role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{route('role.update', encrypt($role->id))}}" method="POST">
          @method('PUT')
          @csrf

          <div class="col-12 mb-4">
            <label class="form-label" for="modalRoleName">Role Name</label>
            <input type="text" id="name" name="RoleName" class="form-control"
                    placeholder="Enter a role name" value="{{$role->name}}" autocomplete="off" tabindex="-1" />
          </div>

          <div class="col-12">
            <h4>Role Permissions</h4>
            <!-- Permission table -->
            <div class="table-responsive">
              <table class="table table-flush-spacing">
                <tbody>
                  <tr>
                    <td class="text-nowrap fw-semibold">Reservé à l'administrateur <i class="bx bx-info-circle bx-xs"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Acces total sur la plateforme"></i></td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" name="" type="checkbox" id="selectAll" />
                        <label class="form-check-label" for="selectAll">
                          Tout selectionné
                        </label>
                      </div>
                    </td>
                  </tr>
                  @forelse ($permissions as $permission)
                  <tr>
                    <td class="text-nowrap fw-semibold">
                      {{$permission->desc}}</td>
                    <td>
                    <td>
                      <div class="d-inline-flex">
                        <div class="form-check me-3 me-lg-3">
                          <input class="form-check-input selectOne" name="permission[]" value="{{$permission->id}}" type="checkbox" />
                        </div>
                      </div>
                    </td>
                  </tr>
                  @empty
                  Pas de permission enregistrée pour le moment, <a href="{{route('app-access-permission')}}">ici</a>
                  @endforelse

                </tbody>
              </table>
            </div>
            <!-- Permission table -->
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
      </div>

      </form>

    </div>
  </div>
</div>


