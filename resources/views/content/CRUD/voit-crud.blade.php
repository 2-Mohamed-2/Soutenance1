@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Vehicule Affecter
</h4>

<hr class="my-5">





<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Vehicules enregistrés</h5>
  {{-- <button class="btn btn-primary col-xl-3 m-2 justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#addVoit" aria-controls="offcanvasEnd">
    Affecter.
  </button> --}}
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Commissariat</th>
          <th>Vehicule</th>
          {{-- <th>Statut</th> --}}
          <th>Date Acquisition</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($voitaffectes as $voitaffecte)
        <tr>
          <td>{{$voitaffecte->commissariat->libelle}}</td>
          <td>{{$voitaffecte->vehicule->modele}}</td>
          {{-- <td>{{$voitaffecte->statut->libelle}}</td> --}}
          <td>{{$voitaffecte->date_acqui}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#voitaffecteUpdt{{$voitaffecte->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#voitaffecteDst{{$voitaffecte->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
           @include('_partials/_modals/_CRUD-VOIT/modal-updtVoit')

            {{-- Vue du modal de suppression --}}
           @include('_partials/_modals/_CRUD-VOIT/modal-deleteVoit')

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
   @include('_partials/_modals/_CRUD-VOIT/modal-addVoit')


@endsection
