@extends('layouts/layoutMaster')

@section('title', 'Membres')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/spinkit/spinkit.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<!-- Fixed columns -->
<script src="{{asset('assets/vendor/libs/datatables-fixedcolumns/datatables.fixedcolumns.js')}}"></script>
<!-- Fixed header -->
<script src="{{asset('assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/tables-datatables-extensions.js')}}"></script>

<script>
  // Sélectionner l'élément bouton et le champ de saisie
  const bouton = document.getElementById('bouton');
  const champ = document.getElementById('champ');
  const champ1 = document.getElementById('champ1');
  const champ2 = document.getElementById('champ2');
  const champ3 = document.getElementById('champ3');

  // Ajouter un écouteur d'événement sur le bouton pour afficher le champ de saisie
  bouton.addEventListener('click', function() {
    champ.style.display = 'block';
  });

  // Ajouter un écouteur d'événement sur le document pour masquer le champ de saisie lorsque l'utilisateur clique ailleurs
  document.addEventListener('click', function(event) {
    const elementClique = event.target;

    // Vérifier si l'élément cliqué est différent du bouton et du champ de saisie
    if (elementClique !== bouton && elementClique !== champ && elementClique !== champ1 && elementClique !== champ2 && elementClique !== champ3) {
      champ.style.display = 'none';
    }
  });  
</script> 

<script>
  document.getElementById('space').addEventListener('input', function (e) {
  e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{2})/g, '$1 ').trim();
});
</script>

@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Coms_Ml /</span> Membres
</h4>

<hr class="my-5">

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Efectif total</h5>
  <div class="p-2 col-12 d-flex justify-content-between">
    {{-- <div class="col-lg-6">

    </div>
    <div class="col-lg-6">

    </div> --}}
    <div>
      <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" aria-controls="offcanvasEnd">
        Créer un nouveau membre    
      </button>
    </div>
    
    {{-- Vue du modal d'insertion --}}
    @include('_partials._modals._CRUD-USER.modal-add-User')
    
    <div>
      <button class="btn btn-info" id="bouton">
        Affectation    
      </button> 
    </div>
    
  </div>

  {{-- <form method="POST" id="test" action="{{ route('aff-mbr') }}">
  @method('PUT')
  @csrf --}}

  <div class="p-2 d-flex justify-content-end" >
    <div class="mb-3" id="champ" style="display: none;">
      <label class="form-label fs-6" for="country">Selectionner le commissariat de destination</label>
      <select id="champ1" name="commissariat_id" required class="form-select">
        <option selected disabled>Commissariat cible</option>
        @forelse ($comms as $comm)
            <option id="champ2" value="{{ $comm->id }}">{{ $comm->sigle }} de {{ $comm->localite }}</option>                
        @empty
            
        @endforelse
      </select>
      <br>
      <div class="d-flex justify-content-center">
        <button class="btn btn-secondary" type="submit" form="test" id="champ3">
          Effectuer    
        </button> 
      </div>
    </div>
    
  </div>
  
  
  <div class="card-datatable table-responsive text-nowrap">
    <table class="dt-fixedheader table border-top">
      <thead>
        <tr>
          <th></th>
          <th class="fs-6">Matricule</th>
          <th class="fs-6">Nom</th>
          <th class="fs-6">Telephone</th>
          <th class="fs-6">Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($users as $user)
        <tr>
          <td class="text-center col-1">
            <input type="checkbox" class="dt-checkboxes form-check-input" name="options[{{ $user->id }}][]" value="{{ $user->id }}">
          </td>
          <td><strong>{{$user->matricule}}</strong></td>
          <td><strong>{{$user->name}}</strong></td>
          <td><strong>{{$user->telephone}}</strong></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#userRole{{$user->id}}"><i class="bx bx-edit-alt me-1"></i> Roles</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#userUpdt{{$user->id}}"><i class="bx bx-edit-alt me-1"></i> Modifier</a>
                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#userDst{{$user->id}}"><i class="bx bx-trash me-1"></i> Supprimer</a>
              </div>
            </div>

            {{-- Vue du modal de modification --}}
            @include('_partials._modals._CRUD-USER.modal-role-User')

            {{-- Vue du modal de modification --}}
            @include('_partials._modals._CRUD-USER.modal-updt-User')

            {{-- Vue du modal de suppression --}}
            @include('_partials._modals._CRUD-USER.mofal-delete-User')


          </td>
        </tr>

        {{-- </form> --}}

        @empty
        {{-- Le tableau sera vide s'il n'y a pas d'insertion --}}
        @endforelse


      </tbody>
    </table>
  </div>
</div>


@endsection
