@extends('layouts/layoutMaster')

@section('title', 'Section ')

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
  <span class="text-muted fw-light">Coms_ML /</span> Section
</h4>

<hr class="my-5">

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Section enregistrées</h5>
  <button class="btn btn-primary col-3 m-2 justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#addSect" aria-controls="offcanvasEnd">
    Créer une nouvelle Section.
  </button>
  <div class="card-datatable table-responsive text-nowrap">
    <table class="dt-fixedheader table table-hover datatable">
      <thead>
        <tr>
          <th>Commissariat</th>
          <th>Libelle</th>
          <th>Sigle</th>
          <th>Fonction</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($sects as $sect)
        <tr>
          <td><strong>{{$sect->commissariat->sigle }}</strong></td>
          <td><strong>{{$sect->libelle}}</strong></td>
          <td><strong>{{$sect->sigle}}</strong></td>
          <td><strong>{{$sect->fonction}}</strong></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#sectUpdt{{$sect->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#sectDst{{$sect->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
            @include('_partials/_modals/_CRUD-SECT/modal-updtSect')

            {{-- Vue du modal de suppression --}}
           @include('_partials/_modals/_CRUD-SECT/modal-deleteSect')  

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
@include('_partials/_modals/_CRUD-SECT/modal-addSect')


@endsection
