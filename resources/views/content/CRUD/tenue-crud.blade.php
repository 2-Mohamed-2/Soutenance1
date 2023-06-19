@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Tenue
</h4>
<?php

use App\Models\Tenue;
  use App\Models\TenueAff;

?>

<hr class="my-5">


<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Tenue</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{ count(Tenue::all()) }}</h3>
              <small class="text-success">(100%)</small>
            </div>
            <small>Total Tenue</small>
          </div>
          <span class="badge bg-label-primary rounded p-2">
            <i class="fa fa-shirt bx-sm"></i>
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
            <span>Tenue Affecter</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{ count(TenueAff::all()) }}</h3>
              <small class="text-success">(+95%)</small>
            </div>
            <small>Total tenue affecter</small>
          </div>
          <span class="badge bg-label-success rounded p-2">
            <i class="fa fa-shirt bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Tenues enregistrés</h5>
   <div class="d-flex justify-content-end mb-2 gap-2">
  <a class="btn btn-outline-secondary" onmouseover="geeks()" onmouseout="out()" href="{{ url('tenueaff') }}"><i class="fa fa-shirt fa-sm"></i></a>
      <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#addTenue" aria-controls="offcanvasEnd">
     Nouvelle Tenue.
   </button>

    {{-- <div class="nav-item search">
    <input type="search" class="form-control col-xs-2" id="search" style="visibility:" name="search" placeholder="Search.." aria-controls="DataTables_Table_0">
    </div> --}}
   </div>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Modele</th>
          <th>Taille</th>
          <th>Quantite</th>
          <th>Lieu Stockage</th>
          <th>Action</th>
        </tr>
      </thead>
       <tbody class="table-border-bottom-0">
        @forelse ($tenues as $tenue)
        <tr>
          <td><strong>{{$tenue->type}}</strong></td>
          <td>{{$tenue->modele}}</span></td>
          <td>{{$tenue->taille}}</span></td>
          <td>{{$tenue->quantite}}</span></td>
          <td>{{$tenue->lieu_stock->entrepot}}</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#tenueUpdt{{$tenue->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#tenueDst{{ $tenue->id }}"><i class="bx bx-trash me-1"></i>Supprimer</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#tenueaff"><i class="fa fa-shirt me-1"></i>AffecterTenue</a>

              </div>
            </div>

              {{-- Vue du modal de suppression --}}
          @include('_partials/_modals/_CRUD-TENUE/modal-deleteTenue')

            {{-- Vue du modal de modification --}}
         @include('_partials/_modals/_CRUD-TENUE/modal-updtTenue')





         </td>
        </tr>
        @empty
        {{-- Le tableau sera vide s'il n'y a pas d'insertion --}}
       @endforelse


      </tbody>
    </table>
    <script type="text/javascript">
        function geeks(){
          $("#myClasse").removeClass("d-none");
        }
        function out(){
          setInterval(() => {
                  $("#myClasse").addClass("d-none");
          }, 4000);

        }
      </script>
      {!! $tenues->withQueryString()->links('pagination::bootstrap-5') !!}
  </div>
</div>

{{-- Vue du modal d'insertion --}}
  @include('_partials/_modals/_CRUD-TENUEAFF/modal-addTenueaff')
  @include('_partials/_modals/_CRUD-TENUE/modal-addTenue')


@endsection
