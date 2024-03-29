@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
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
 <span class="alert alert-info d-none  " id="myClasse">Retour a la ligne</span>
  <a class="btn btn-primary col-xl-3 m-2" onmouseover="geeks()" onmouseout="out()" href="{{ route('logistique-vehi-view') }}">Retour</a>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover" id="data-table">
      <thead>
        <tr>
          <th>Commissariat</th>
          <th>Vehicule</th>
          <th>Date Acquisition</th>
          <th>Quantite</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($voitaffectes as $voitaffecte)
        <tr>
          <td>{{$voitaffecte->commissariat->libelle}}</td>
          <td>{{$voitaffecte->vehicule->type}}</td>
          <td>{{$voitaffecte->date_acqui}}</td>
          <td>{{$voitaffecte->quantite}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              {{-- <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#voitaffecteUpdt{{$voitaffecte->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#voitaffecteDst{{ $voitaffecte->id }}"><i class="bx bx-trash-alt me-1"></i>Supprimer</a>
              </div> --}}
            </div>


            {{-- Vue du modal de suppression --}}
           @include('_partials/_modals/_CRUD-VOIT/modal-deleteVoit')

            {{-- Vue du modal de modification --}}
           @include('_partials/_modals/_CRUD-VOIT/modal-updtVoit')
          </td>
        </tr>
        @empty
        {{-- Le tableau sera vide s'il n'y a pas d'insertion --}}
        @endforelse


      </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function(){
                $('#data-table').dataTable();
              });
    </script>
    {{-- {!! $voitaffectes->withQueryString()->links('pagination::bootstrap-5') !!} --}}
  </div>
</div>

{{-- Vue du modal d'insertion --}}
   {{-- @include('_partials/_modals/_CRUD-VOIT/modal-addVoit') --}}


@endsection
