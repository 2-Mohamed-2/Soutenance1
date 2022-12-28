
<!-- Enable OTP Modal -->
<div class="modal fade" id="permissionRoleModal{{$role->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-3">Suppression d'une section</h3>
        </div>

        @php
          $role = Spatie\Permission\Models\Role::find($role->id);
          $permission = Spatie\Permission\Models\Permission::get();
          $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        @endphp




        <!-- Permission table -->
        <div class="table-responsive">
          <table class="table table-flush-spacing">
            <tbody>

              @forelse ($rolePermissions as $rolePermission)
                @php
                  $permission = Spatie\Permission\Models\Permission::find($rolePermission);
                @endphp

                <tr>
                  <td class="text-nowrap fw-semibold">
                    {{$permission->desc}}</td>
                  <td>
                  <td>
                  </td>
                </tr>

              @empty
              Pas de permission affectée à ce role pour le moment
              @endforelse

            </tbody>
          </table>
        </div>
        <!-- Permission table -->

      </div>
    </div>
  </div>
</div>
<!--/ Enable OTP Modal -->
