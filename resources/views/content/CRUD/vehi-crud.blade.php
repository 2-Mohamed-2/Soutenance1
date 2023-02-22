@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<?php
  use App\Models\Vehicule;
  use App\Models\VoitAffecte;
?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Vehicule
</h4>

<hr class="my-5">

<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Vehicule</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{ count(Vehicule::all()) }}</h3>
              <small class="text-success">(100%)</small>
            </div>
            <small>Total Vehicule</small>
          </div>
          <span class="badge bg-label-primary rounded p-2">
            <i class="bx bx-car bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Vehicule Affecter</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{ count(VoitAffecte::all()) }}</h3>
              <small class="text-success">(+95%)</small>
            </div>
            <small>Total vehicule affecter</small>
          </div>
          <span class="badge bg-label-success rounded p-2">
            <i class="bx bx-car bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>





<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Vehicules enregistrés</h5>

   <div class="d-flex justify-content-center mx-auto gap-3">
     <button class="btn btn-primary justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#addVehi" aria-controls="offcanvasEnd">
    Créer un nouveau Vehicule.
   </button>
  {{--  <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#addVoit" aria-controls="offcanvasEnd">
    Affecter Un Vehicule..
  </button> --}}
   <button data-bs-target="#addVoit" data-bs-toggle="modal" class="btn btn-primary  text-nowrap add-new-role">
      Affecter Un Vehicule..
    </button>
   </div>
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
        @forelse ($vehicules as $vehi)
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
  @include('_partials/_modals/_CRUD-VOIT/modal-addVoit')


@endsection
