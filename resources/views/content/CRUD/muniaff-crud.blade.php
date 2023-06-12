@extends('layouts/layoutMaster')

@section('title', 'Munition Affecter')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Munition Affecter
</h4>

<hr class="my-5">




<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Munitions enregistrés</h5>
  {{-- <button class="btn btn-primary col-xl-3 m-2 justify-content-end" data-bs-toggle="offcanvas"
    data-bs-target="#addVoit" aria-controls="offcanvasEnd">
    Affecter.
  </button> --}}
  <span class="alert alert-info d-none " id="myClasse">Retour a la ligne</span>
  <a class="btn btn-primary col-xl-3" href="{{ route('logistique-muni-view') }}">Retour</a>
  <div class="table-responsive text-nowrap">
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>Commissariat</th>
          <th>Munition</th>
          <th>Date Acquisition</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($muniaff as $muniaff)
        <tr>
          <td>{{$muniaff->commissariat->libelle}}</td>
          <td>{{$muniaff->munition->type}}</td>
          {{-- <td>{{$voitaffecte->statut->libelle}}</td> --}}
          <td>{{$muniaff->date_acqui}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                  class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                  data-bs-target="#muniaffUpdt{{$muniaff->id}}"><i class="bx bx-edit-alt me-1"></i>Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                  data-bs-target="#muniaffDst{{$muniaff->id}}"><i class="bx bx-trash me-1"></i>Supprimer</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
            @include('_partials/_modals/_CRUD-MUNIAFF/modal-updtMuniaff')

            {{-- Vue du modal de suppression --}}
            @include('_partials/_modals/_CRUD-MUNIAFF/modal-deleteMuniaff')

          </td>
        </tr>
        @empty
        {{-- Le tableau sera vide s'il n'y a pas d'insertion --}}
        @endforelse


      </tbody>
    </table>
    {{-- {!! $muniaff->withQueryString()->links('pagination::bootstrap-5') !!} --}}
  </div>
  <script>
    $(document).ready(function () {
    $('#example').DataTable();
    });
  </script>
</div>

{{-- Vue du modal d'insertion --}}
{{-- @include('_partials/_modals/_CRUD-TENUEAFF/modal-addTenueaff') --}}

@endsection
