@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Tenue Affecter
</h4>

<hr class="my-5">




<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Tenue enregistrés</h5>
  {{-- <button class="btn btn-primary col-xl-3 m-2 justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#addVoit" aria-controls="offcanvasEnd">
    Affecter.
  </button> --}}
  <span class="alert alert-info d-none " id="myClasse">Retour a la ligne</span>
  <a class="btn btn-primary col-xl-3"  href="{{ route('logistique-tenue-view') }}">Retour</a>
  <div class="table-responsive text-nowrap">
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>Commissariat</th>
          <th>Tenue</th>
          <th>Date Acquisition</th>
          <th>Quantite</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($tenueaffs as $tenueaff)
        <tr>
          <td>{{$tenueaff->commissariat->libelle}}</td>
          <td>{{$tenueaff->tenue->type}} {{$tenueaff->tenue->modele}}</td>
          <td>{{$tenueaff->date_acqui}}</td>
          <td>{{$tenueaff->quantite}}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                 <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#tenueaffUpdt{{$tenueaff->id}}"><i class="bx bx-edit-alt me-1"></i>Modifier</a>
                  <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#tenueaffDst{{$tenueaff->id}}"><i class="bx bx-trash me-1"></i>Supprimer</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
            @include('_partials/_modals/_CRUD-TENUEAFF/modal-updtTenueaff')

            {{-- Vue du modal de suppression --}}
             @include('_partials/_modals/_CRUD-TENUEAFF/modal-deleteTenueaff')

          </td>
        </tr>
        @empty
        {{-- Le tableau sera vide s'il n'y a pas d'insertion --}}
        @endforelse


      </tbody>
    </table>
    {!! $tenueaffs->withQueryString()->links('pagination::bootstrap-5') !!}
  </div>
  <script>
    $(document).ready(function () {
    $('#example').DataTable();
    });
  </script>
</div>

{{-- Vue du modal d'insertion --}}

@endsection
