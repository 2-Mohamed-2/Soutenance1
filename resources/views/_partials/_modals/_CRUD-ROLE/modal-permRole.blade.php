
<!-- Enable OTP Modal -->
<div class="modal fade" id="permissionRoleModal{{$role->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-3">Les permissions du role : {{$role->name}}</h3>
        </div>

        @php
          $role = Spatie\Permission\Models\Role::find($role->id);
          $permission = Spatie\Permission\Models\Permission::get();

            $rolePermissions = Spatie\Permission\Models\Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$role->id)
            ->get();
        @endphp


        <!-- Permission table -->
        <div class="table-responsive">
          <table class="table table-flush-spacing">
            <tbody>

               
                @if(!empty($rolePermissions))
                  
                    @foreach($rolePermissions as $v)
                      <tr>
                        <td class="text-nowrap fw-semibold">
                          {{ $v->name }}
                        </td>
                      </tr>
                    @endforeach 
                  
                @endif

            </tbody>
          </table>
        </div>
        <!-- Permission table -->

      </div>
    </div>
  </div>
</div>
<!--/ Enable OTP Modal -->
