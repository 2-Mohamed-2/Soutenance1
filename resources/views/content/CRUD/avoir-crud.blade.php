@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Avoir
</h4>

<hr class="my-5">

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Avoirs enregistrés</h5>
  <button class="btn btn-primary col-3 m-2 justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#addAvoir" aria-controls="offcanvasEnd">
    Créer un nouveau Avoir.
  </button>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Affecte a</th>
          <th>Commissariat</th>
          <th>Armement</th>
          <th>Statut</th>
          <th>Date Acquisition</th>
          <th>Action</th>
        </tr>
      </thead>
       <tbody class="table-border-bottom-0">
        @forelse ($avoirs as $avoir)
        <tr>
          <td><strong>{{$avoir->user->name}}</strong></td>
          <td>{{$avoir->commissariat->libelle}}</td>
          <td>{{$avoir->armement->modele}}</td>
          <td>{{$avoir->statut->libelle}}</td>
          <td>{{$avoir->date_acqui}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#avoirUpdt{{$avoir->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#avoirDst{{$avoir->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
         @include('_partials/_modals/_CRUD-AVOIR/modal-updtAvoir')  

            {{-- Vue du modal de suppression --}}
          @include('_partials/_modals/_CRUD-AVOIR/modal-deleteAvoir') 

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
  @include('_partials/_modals/_CRUD-AVOIR/modal-addAvoir')


@endsection
