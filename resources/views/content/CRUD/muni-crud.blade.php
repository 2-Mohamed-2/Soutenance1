@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Munition
</h4>

<hr class="my-5">

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Munitions enregistrés</h5>
  <button class="btn btn-primary col-3 m-2 justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#addMuni" aria-controls="offcanvasEnd">
    Ajouter une nouvelle Munition.
  </button>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Type</th>
          <th>Libelle</th>
          <th>Stock</th>
          <th>Commissariat</th>
          <th>Action</th>
        </tr>
      </thead>
       <tbody class="table-border-bottom-0">
        @forelse ($munis as $muni)
        <tr>
          <td><strong>{{$muni->type}}</strong></td>
          <td>{{$muni->libelle}}</span></td>
          <td>{{$muni->stock}}</span></td>
          <td>{{$muni->commissariat->libelle}}</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#muniUpdt{{$muni->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#muniDst{{$muni->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
         @include('_partials/_modals/_CRUD-MUNI/modal-updtMuni')  

            {{-- Vue du modal de suppression --}}
          @include('_partials/_modals/_CRUD-MUNI/modal-deleteMuni') 

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
  @include('_partials/_modals/_CRUD-MUNI/modal-addMuni')


@endsection
