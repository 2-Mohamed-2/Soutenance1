@extends('layouts/layoutMaster')

@section('title', 'Membres')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/spinkit/spinkit.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<!-- Fixed columns -->
<script src="{{asset('assets/vendor/libs/datatables-fixedcolumns/datatables.fixedcolumns.js')}}"></script>
<!-- Fixed header -->
<script src="{{asset('assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/tables-datatables-extensions.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Coms_Ml /</span> Membres
</h4>

<hr class="my-5">

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Efectif total</h5>
  <div class="p-2">
    <button class="btn btn-primary col-3 justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" aria-controls="offcanvasEnd">
      Créer un nouveau membre    
    </button>
  </div>
  
  
  <div class="card-datatable table-responsive text-nowrap">
    <table class="dt-fixedheader table border-top">
      <thead>
        <tr>
          <th></th>
          <th>Matricule</th>
          <th>Nom</th>
          <th>Telephone</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($users as $user)
        <tr>
          <td></td>
          <td><strong>{{$user->matricule}}</strong></td>
          <td><strong>{{$user->name}}</strong></td>
          <td><strong>{{$user->telephone}}</strong></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#userRole{{$user->id}}"><i class="bx bx-edit-alt me-1"></i> Roles</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#userUpdt{{$user->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#userDst{{$user->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
            @include('_partials._modals._CRUD-USER.modal-role-User')

            {{-- Vue du modal de modification --}}
            @include('_partials._modals._CRUD-USER.modal-updt-User')

            {{-- Vue du modal de suppression --}}
            @include('_partials._modals._CRUD-USER.mofal-delete-User')


          </td>
        </tr>
        @empty
        {{-- Le tableau sera vide s'il n'y a pas d'insertion --}}
        @endforelse


      </tbody>
    </table>
  </div>
</div>

{{-- Vue du modal d'insertion --}}
@include('_partials._modals._CRUD-USER.modal-add-User')


@endsection
