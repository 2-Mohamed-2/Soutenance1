@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Tenue
</h4>

<hr class="my-5">

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Tenues enregistrés</h5>
  <button class="btn btn-primary col-3 m-2 justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#addTenue" aria-controls="offcanvasEnd">
    Créer un nouveau Tenue.
  </button>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Type</th>
          <th>Modele</th>
          <th>Taille</th>
          <th>Annee</th>
          <th>Statut</th>
          <th>Stock</th>
          <th>Commissariat</th>
          <th>Affecte a</th>
          <th>Action</th>
        </tr>
      </thead>
       <tbody class="table-border-bottom-0">
        @forelse ($tenues as $tenue)
        <tr>
          <td><strong>{{$tenue->type}}</strong></td>
          <td>{{$tenue->modele}}</span></td>
          <td>{{$tenue->taille}}</span></td>
          <td>{{$tenue->annee}}</span></td>
          <td>{{$tenue->statut}}</span></td>
          <td>{{$tenue->stock}}</span></td>
          <td>{{$tenue->commissariat->libelle}}</span></td>
          <td>{{$tenue->user->name}}</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#tenueUpdt{{$tenue->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#tenueDst{{$tenue->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
         @include('_partials/_modals/_CRUD-TENUE/modal-updtTenue')  

            {{-- Vue du modal de suppression --}}
          @include('_partials/_modals/_CRUD-TENUE/modal-deleteTenue') 

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
  @include('_partials/_modals/_CRUD-TENUE/modal-addTenue')


@endsection
