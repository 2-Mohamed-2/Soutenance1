@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Armements
</h4>

<hr class="my-5">

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des armes enregistrés</h5>
  <button class="btn btn-primary col-3 m-2 justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#addArme" aria-controls="offcanvasEnd">
    Créer une nouvelle Armements.
  </button>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Modele</th>
          <th>N° Serie</th>
          <th>Revision</th>
         <!-- <th>Affecte a</th> -->
          <th>Lieu Stockage</th>
          <th>Stock</th> 
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
       @forelse ($armes as $arme)
        <tr>
          <td>{{$arme->modele}}</span></td>
          <td>{{$arme->n_serie}}</span></td>
          <td>{{$arme->revision}}</span></td> 
          <td>{{$arme->lieu}}</span></td>
          <td>{{$arme->stock}}</span></td> 
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#armeUpdt{{$arme->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#armeDst{{$arme->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
            </div>

            {{-- Vue du modal de modification --}}
           @include('_partials/_modals/_CRUD-ARME/modal-updtArme') 

            {{-- Vue du modal de suppression --}}
           @include('_partials/_modals/_CRUD-ARME/modal-deleteArme')

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
 @include('_partials/_modals/_CRUD-ARME/modal-addArme') 


@endsection
