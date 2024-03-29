@extends('layouts/layoutMaster')

@section('title', 'Vehicule')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
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

   <div class="d-flex justify-content-end mb-2 gap-2">
  <a class="btn btn-outline-secondary" onmouseover="geeks()" onmouseout="out()" href="voitaffecte"><i class="bx bx-car bx-sm"></i></a>
      <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#addVehi" aria-controls="offcanvasEnd">
     Nouveau Vehicule.
   </button>
  {{--  <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#addVoit" aria-controls="offcanvasEnd">
    Affecter Un Vehicule..
  </button> --}}
   {{-- <button data-bs-target="#addVoit" data-bs-toggle="modal" class="btn btn-primary  text-nowrap add-new-role">
      Affecter Vehicule..
    </button> --}}
    {{-- <div class="nav-item search">
    <input type="search" class="form-control col-xs-2" id="search" style="visibility:" name="search" placeholder="Search.." aria-controls="DataTables_Table_0">
    </div> --}}
   </div>
    <span class="alert alert-success d-none " id="myClasse">Liste des Vehicule Affecter</span>
  <div class="card-datatable table-responsive">
    <table class="invoice-list-table table border-top" id="table-data">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Modele</th>
          {{-- <th>Plaque Numero</th> --}}
          <th>Quantite</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($vehicules as $vehi)
        <tr>
          <td><strong>{{$vehi->type}}</strong></td>
          <td>{{$vehi->modele}}</span></td>
          {{-- <td>{{$vehi->plaque}}</span></td> --}}
           <td>{{$vehi->quantite}}</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#vehiUpdt{{$vehi->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#vehiDst{{$vehi->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addVoit{{ $vehi->id }}"><i class="bx bx-car me-1"></i>Affecter</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
            @include('_partials._modals._CRUD-VEHI.modal-updtVehi')
            {{-- Vue du modal de suppression --}}
            @include('_partials._modals._CRUD-VEHI.modal-deleteVehi')

            @include('_partials._modals._CRUD-VOIT.modal-addVoit')
          </td>
        </tr>
        @empty
        {{-- Le tableau sera vide s'il n'y a pas d'insertion --}}
        @endforelse


      </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <scriptvoit src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></scriptvoit>
    <script>
      $(document).ready(function(){
        $('#table-data').dataTable();
      });
    </script>
    {{-- <script type="text/javascript">

        function geeks(){
          $("#myClasse").removeClass("d-none");
        }
        function out(){
          setInterval(() => {
                  $("#myClasse").addClass("d-none");
          }, 4000);

        }

      </script>

      {!! $vehicules->withQueryString()->links('pagination::bootstrap-5') !!} --}}

  </div>

</div>

{{-- Vue du modal d'insertion --}}


@include('_partials/_modals/_CRUD-VEHI/modal-addVehi')
@endsection
