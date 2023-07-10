@extends('layouts/layoutMaster')

@section('title', 'Commissariat')

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
  <span class="text-muted fw-light">Tables /</span> Commissariat
</h4>

<hr class="my-5">

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des commissariats enregistrés</h5>
  <button class="btn btn-primary col-3 m-2 justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#addComm" aria-controls="offcanvasEnd">
    Créer un nouveau comm.
  </button>
  <div class="card-datatable table-responsive text-nowrap">
    <table class="dt-fixedheader table table-hover">
      <thead>
        <tr>
          <th>Sigle</th>
          <th>Libelle</th>
          <th>Adresse</th>
          <th>Contact</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($coms as $com)
        <tr>
          <td><strong>{{$com->sigle}}</strong></td>
          <td><strong>{{$com->libelle}}</strong></td>
          <td>{{$com->localite}}</span></td>
          <td>{{$com->telephone}}</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#commissUpdt{{$com->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#commissDst{{$com->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
            @include('_partials/_modals/_CRUD-COMMISS/modal-updtCommiss')

            {{-- Vue du modal de suppression --}}
            @include('_partials/_modals/_CRUD-COMMISS/modal-deleteCommiss')

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
@include('_partials/_modals/_CRUD-COMMISS/modal-addCommiss')


@endsection
