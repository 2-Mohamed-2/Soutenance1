@extends('layouts/layoutMaster')

@section('title', 'Carte-Biom.')

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
  <span class="text-muted fw-light">Coms_ML /</span> Carte biometrique
</h4>

<hr class="my-5">

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des citoyens ayant fait demande de la carte biometrique</h5>
  <button data-bs-target="#addImport" data-bs-toggle="modal" class="btn btn-primary col-2 m-2 text-wrap">
    Importer
  </button>
  <div class="card-datatable table-responsive text-nowrap">
    <table class="dt-fixedheader table table-hover">
      <thead>
        <tr>
          <th>NomComplet</th>
          <th>Numero CI</th>
          <th>Adresse</th>
          <th>Genre</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        {{-- @forelse ($incos as $inco) --}}
        <tr>
          {{-- <td> <strong> {{$inco->nomcomplet}} </strong> </td>
          <td> {{$inco->n_ci}} </td>
          <td> {{$inco->adresse}} </td>
          @if ($inco->genre == "H") 
          <td>Homme</td>
          @else
          <td>Femme</td>
          @endif
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#incoRMP{{$inco->id}}"><i class="bx bx-edit-alt me-1"></i> Reinitialiser son mot de passe</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#incoDst{{$inco->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
              </div>
            </div> --}}

            {{-- Vue du modal de reinitialisation du mot de passe --}}
            {{-- @include('_partials/_modals/_CRUD-INCO/modal-updtInco') --}}

            {{-- Vue du modal de suppression --}}
            {{-- @include('_partials/_modals/_CRUD-INCO/modal-deleteInco') --}}

          </td>
        </tr>
        {{-- @empty --}}
        {{-- Le tableau sera vide s'il n'y a pas d'insertion --}}
        {{-- @endforelse --}}


      </tbody>
    </table>
  </div>
</div>

{{-- Vue du modal d'insertion --}}
@include('_partials/_modals/_CRUD-INCO/modal-importCB')


@endsection
