@php
  $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Roles')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons/datatables-buttons.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js')}}"></script>


<script src="{{asset('assets/js/checkbox.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#selectAll').click(function() {
      $(".selectOne").prop('checked', $ (this).prop('checked'));
    });
  });
</script>

@endsection

@section('page-script')
<script src="{{asset('assets/js/app-access-roles.js')}}"></script>
<script src="{{asset('assets/js/modal-add-role.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-2">Liste des roles</h4>

<p>Un role donne accès à des menus et des fonctionnailités prédefinis afin que, selon le role 
   attribué, un administrateur puisse avoir accès à ce dont l'utilisateur a besoin.</p>
<!-- Role cards -->
<div class="row g-4">
  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card h-100">
      <div class="row h-100">
        <div class="col-sm-5">
          <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
            <img src="{{asset('assets/img/illustrations/sitting-girl-with-laptop-'.$configData['style'].'.png')}}" class="img-fluid" alt="Image" width="120" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png">
          </div>
        </div>
        <div class="col-sm-7">
          <div class="card-body text-sm-end text-center ps-sm-0">
            <button data-bs-target="#addRoleModal" data-bs-toggle="modal" class="btn btn-primary mb-3 text-nowrap add-new-role">
              Nouveau role
            </button>
            <p class="mb-0">Ajoutez un nouveau role au besoin</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  @forelse ($roles as $role)
  
  @php
    // Pour compter tous les utilisateurs qui ont le meme role name 
    $roleName = $role->name;
    $total = App\Models\User::whereHas('roles', function ($query) use ($roleName) {
                            $query->where('name', $roleName);
                            })->count();
  @endphp

  <div class="col-xl-4 col-lg-6 col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between mb-2">
          <h6 class="fw-normal">Total users : {{ $total }}</h6>
        </div>
        <div class="d-flex justify-content-between align-items-end">
          <div class="role-heading">
            <h4 class="mb-1">{{$role->name}}</h4>
            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#updtRoleModal{{$role->id}}" class="role-edit-modal"><small>Modifier </small></a>  |||
            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteRoleModal{{$role->id}}" class="role-edit-modal"><small>Supprimer</small></a>  |||
            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#permissionRoleModal{{$role->id}}" class="role-edit-modal"><small>Permissions</small></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Updt Role Modal -->
  @include('_partials._modals._CRUD-ROLE.modal-updtRole')
  <!-- / Updt Role Modal -->

  <!-- Delete Role Modal -->
  @include('_partials._modals._CRUD-ROLE.modal-deleteRole')
  <!-- / Delete Role Modal -->

  <!-- Permission role Role Modal -->
  @include('_partials._modals._CRUD-ROLE.modal-permRole')
  <!-- / Permission role Role Modal -->

  @empty

  @endforelse

  <hr>
  <hr>

  <div class="col-12">
    <h4 class="fw-bold py-3 mb-2">Liste des utilisateurs avec leurs roles</h4>
    <!-- Role Table -->
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-users table border-top">
          <thead>
            <tr>
              <th>Matricule</th>
              <th>User</th>
              <th>Role</th>
              <th>Voir_User</th>
              <th>Remove_role</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $user)
              <tr>
                <td>{{ $user->matricule }}</td> 
                <td>{{ $user->name }}</td> 
                @php
                  $rols = Illuminate\Support\Facades\DB::table('model_has_roles')->where('model_id', $user->id)->get();
                @endphp
                <td>
                  @forelse ($rols as $rol)
                    @php
                      $rm = Spatie\Permission\Models\Role::find($rol->role_id);
                    @endphp 

                    {{ $rm->name }} ||                  
                  @empty
                  Pas de role !
                  @endforelse
                </td>
                <td> 
                  <a href="{{ route('user-view') }}">
                    <i class="bx bx-show-alt me-1"></i> 
                  </a>
                </td>                
                <td> 
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteRoleUser{{$user->id}}">
                    <i class="bx bx-trash me-1"></i> 
                  </a>
                </td>
                
              </tr> 
              <!-- Remove Role to user Modal -->
                @include('_partials._modals._CRUD-ROLE.modal-rmv-roleto-user')
              <!-- / Remove Role to user Modal -->
            @empty
              
            @endforelse
            
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Role Table -->
  </div>
</div>
<!--/ Role cards -->

<!-- Add Role Modal -->
@include('_partials._modals._CRUD-ROLE.modal-addRole')
<!-- / Add Role Modal -->

@endsection
