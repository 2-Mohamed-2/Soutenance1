@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')

<?php
   use App\Models\LieuStock;
?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Lieu Stockage
</h4>

<hr class="my-5">

<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Lieu de Stockage</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{ count(LieuStock::all()) }}</h3>
              <small class="text-success">(100%)</small>
            </div>
            <small>Total LieuStockage</small>
          </div>
          <span class="badge bg-label-primary rounded p-2">
            <i class="fa fa-warehouse bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="col-sm-6 col-xl-3">
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
  </div> --}}





  <!-- Hoverable Table rows -->
  <div class="card">
    <h5 class="card-header">Liste des Lieux enregistrés</h5>

    <div class="d-flex justify-content-end mb-2 p-3 gap-2">
      {{-- <a class="btn btn-outline-secondary" onmouseover="geeks()" onmouseout="out()" href=""><i
          class="fa fa-gun bx-sm"></i></a> --}}
      <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#addlieustock" aria-controls="offcanvasEnd">
        <i class="fa fa-plus fa-sm"></i> Nouvel lieu.
      </button>
      <form action="" class="d-flex mr-3">
        <div class="form-group mb-0 mr-1">
          <input type="text" name="search"  class="form-control col-xs-2" id="search"
            style="visibility:" placeholder="Search..">
        </div>
        <button class="btn bnt-info"><i class="fa fa-search" aria-hidden="true"></i></button>
      </form>
    </div>
    <span class="alert alert-success d-none " id="myClasse">Liste des Lieux de Stockage</span>
    <div class="table-responsive text-nowrap">
      <table class="datatables-basic table border-top">
        <thead>
          <tr>
            <th>Entrepot</th>
            <th>Ville</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @forelse ($lieustock as $lieustock)
          <tr>
            <td><strong>{{$lieustock->entrepot}}</strong></td>
            <td>{{$lieustock->ville}}</span></td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                    class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                    data-bs-target="#lieustockUpdt{{$lieustock->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                  <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                    data-bs-target="#lieustockDst{{$lieustock->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
                </div>
              </div>

              {{-- Vue du modal de modification --}}
               @include('_partials/_modals/_CRUD-LIEUSTOCK/modal-updtLieuStock')

              {{-- Vue du modal de suppression --}}
               @include('_partials/_modals/_CRUD-LIEUSTOCK/modal-deleteLieuStock')

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

      {{-- {!! $armes->withQueryString()->links('pagination::bootstrap-5') !!} --}}
    </div>

  </div>

  {{-- Vue du modal d'insertion --}}
  @include('_partials/_modals/_CRUD-LIEUSTOCK/modal-addLieuStock')


  @endsection
