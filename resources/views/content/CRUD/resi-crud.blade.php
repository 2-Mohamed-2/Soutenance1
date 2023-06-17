@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Residence
</h4>

<hr class="my-5">

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Residences enregistrés</h5>
  <button class="btn btn-primary col-sm-3 m-2 justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#addResi" aria-controls="offcanvasEnd">
    Créer une nouvelle Residence.
  </button>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Certifions</th>
          <th>Profession</th>
          <th>Domicile</th>
          <th>Commissariat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($resis as $resi)
        <tr>
          <td><strong>{{$resi->certifions}}</strong></td>
          <td>{{$resi->profession}}</span></td>
          <td>{{$resi->domicile}}</span></td>
          <td>{{$resi->commissariat->libelle}}</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#resiUpdt{{$resi->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#resiDst{{$resi->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>

              <a class="dropdown-item" target="blank" href="{{ route('residencePDF', encrypt($resi->id)) }};" data-bs-toggle="modal" data-bs-target="#{{$resi->id}}"><i class="fa fa-file-pdf me-1"></i>PDF</a>
            </div>

            {{-- Vue du modal de modification --}}
            @include('_partials/_modals/_CRUD-RESI/modal-updtResi')

         {{--    @include('_partials/pdfResi') --}}

            {{-- Vue du modal de suppression --}}
            @include('_partials/_modals/_CRUD-RESI/modal-deleteResi')


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
@include('_partials/_modals/_CRUD-RESI/modal-addResi')


@endsection
