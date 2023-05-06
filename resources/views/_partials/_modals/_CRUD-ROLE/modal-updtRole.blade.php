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
            @foreach($permissions as $value)
                <label class="fs-4">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }} __| </label>                    
            @endforeach
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


