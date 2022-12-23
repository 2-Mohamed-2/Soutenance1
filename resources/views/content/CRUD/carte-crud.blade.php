@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Carte
</h4>

<hr class="my-5">

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Cartes enregistrés</h5>
  <button class="btn btn-primary col-3 m-2 justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#addCarte" aria-controls="offcanvasEnd">
    Créer une nouvelle Carte.
  </button>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Pofession</th>
          <th>Domicile</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($cartes as $carte)
        <tr>
          <td><strong>{{$carte->nom}}</strong></td>
          <td>{{$carte->prenom}}</td>
          <td>{{$carte->profession}}</td>
          <td>{{$carte->domicile}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#carteUpdt{{$carte->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#carteDst{{$carte->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
            @include('_partials/_modals/_CRUD-CARTE/modal-updtCarte') 

            {{-- Button de fichier pdf pour carte --}}
            <a class="dropdown-item" href="{{ route('cartePDF', $carte->id    ) }};" data-bs-toggle="modal" data-bs-target="#{{$carte->id}}"><i class="fa fa-file-pdf me-1"></i>PDF</a>

            {{-- Vue du modal de suppression --}}
         @include('_partials/_modals/_CRUD-CARTE/modal-deleteCarte') 

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
 @include('_partials/_modals/_CRUD-CARTE/modal-addCarte') 


@endsection
