@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')

<?php
   use App\Models\Armement;
   use App\Models\Avoir;
?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Armes
</h4>

<hr class="my-5">

<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Arme</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{ count(Armement::all()) }}</h3>
              <small class="text-success">(100%)</small>
            </div>
            <small>Total Arme</small>
          </div>
          <span class="badge bg-label-primary rounded p-2">
            <i class="fa fa-gun bx-sm"></i>
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
            <span>Arme Affecter</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{ count(Avoir::all()) }}</h3>
              <small class="text-success">(+95%)</small>
            </div>
            <small>Total arme affecter</small>
          </div>
          <span class="badge bg-label-success rounded p-2">
            <i class="fa fa-gun bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>





<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Armes enregistrés</h5>

   <div class="d-flex justify-content-end mb-2 p-3 gap-2">
  <a class="btn btn-outline-secondary" onmouseover="geeks()" onmouseout="out()" href="Avoir"><i class="fa fa-gun bx-sm"></i></a>
     <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#addArme" aria-controls="offcanvasEnd">
      <i class="fa fa-plus fa-sm"></i> Nouvelle Arme.
   </button>
  {{--  <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#addVoit" aria-controls="offcanvasEnd">
    Affecter Un Vehicule..
  </button> --}}
   {{-- <button data-bs-target="#addVoit" data-bs-toggle="modal" class="btn btn-primary  text-nowrap add-new-role">
      Affecter Vehicule..
    </button> --}}
    <form action="" class="d-flex mr-3">
      <div class="form-group mb-0 mr-1">
        <input type="text"  name="search" value="{{ $search }}" class="form-control col-xs-2" id="search" style="visibility:"  placeholder="Search..">
      </div>
      <button class="btn bnt-info"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
   </div>
    <span class="alert alert-success d-none " id="myClasse">Liste des Armes Affecter</span>
  <div class="table-responsive text-nowrap">
    <table class="table table-fluid" id="myTable">
      <thead>
        <tr>
          <th>Modele</th>
          {{-- <th>Identifiant</th> --}}
          <th>Numero serie</th>
          <th>Quantite</th>
          <th>Lieu Stockage</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($armes as $arme)
        <tr>
          <td><strong>{{$arme->modele}}</strong></td>
          {{-- <td>{{$vehi->identifiant}}</span></td> --}}
          <td>{{$arme->n_serie}}</span></td>
          <td>{{$arme->quantite}}</span></td>
          {{-- <td>{{$vehi->revision}}</span></td> --}}
          <td>{{$arme->lieu_stock->entrepot}}</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#armeUpdt{{$arme->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#armeDst{{$arme->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
               <button class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addAvoir{{ $arme->id }}"><i class="fa fa-gun me-1"></i>Affecter</button>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
           @include('_partials/_modals/_CRUD-ARME/modal-updtArme')

            {{-- Vue du modal de suppression --}}
           @include('_partials/_modals/_CRUD-ARME/modal-deleteArme')

           @include('_partials/_modals/_CRUD-AVOIR/modal-addAvoir')

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

          $(document).ready(function(){
            $("#myTable").DataTable();
          });

        }
      </script>

      {!! $armes->withQueryString()->links('pagination::bootstrap-5') !!}
  </div>

</div>

{{-- Vue du modal d'insertion --}}
  @include('_partials/_modals/_CRUD-ARME/modal-addArme')



@endsection
