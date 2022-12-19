@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Grade
</h4>

<hr class="my-5">

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Grades enregistrés</h5>
  <button class="btn btn-primary col-3 m-2 justify-content-end" data-bs-toggle="offcanvas" data-bs-target="#addGrade" aria-controls="offcanvasEnd">
    Créer un nouveau Grade.
  </button>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Libelle</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($grades as $grade)
        <tr>
          <td><strong>{{$grade->libelle}}</strong></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#gradeUpdt{{$grade->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#gradeDst{{$grade->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
            @include('_partials/_modals/_CRUD-GRADE/modal-updtGrade')

            {{-- Vue du modal de suppression --}}
           @include('_partials/_modals/_CRUD-GRADE/modal-deleteGrade')  

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
@include('_partials/_modals/_CRUD-GRADE/modal-addGrade')


@endsection
