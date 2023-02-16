@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Vehicule
</h4>

<hr class="my-5">



<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Vehicules enregistrés</h5>
  <button class="btn btn-primary col-xl-3 m-2 justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#addVehi" aria-controls="offcanvasEnd">
    Créer un nouveau Vehicule.
  </button>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Type</th>
          <th>Identifiant</th>
          <th>Modele</th>
          <th>Plaque Numero</th>
          <th>Revision</th>
          <th>Commissariat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($vehis as $vehi)
        <tr>
          <td><strong>{{$vehi->type}}</strong></td>
          <td>{{$vehi->identifiant}}</span></td>
          <td>{{$vehi->modele}}</span></td>
          <td>{{$vehi->plaque}}</span></td>
          <td>{{$vehi->revision}}</span></td>
          <td>{{$vehi->commissariat->libelle}}</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#vehiUpdt{{$vehi->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#vehiDst{{$vehi->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
           @include('_partials/_modals/_CRUD-VEHI/modal-updtVehi')

            {{-- Vue du modal de suppression --}}
          @include('_partials/_modals/_CRUD-VEHI/modal-deleteVehi')

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
  @include('_partials/_modals/_CRUD-VEHI/modal-addVehi')


@endsection
