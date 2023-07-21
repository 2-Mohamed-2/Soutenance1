@extends('layouts/layoutMaster')

@section('title', 'Residence')

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
@endsection


@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Coms_ML /</span> Residence
</h4>

<hr class="my-5">

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Liste des Residences enregistrés</h5>

  <div class="card-datatable table-responsive text-nowrap">
    <table class="dt-fixedheader table table-hover">
      <thead>
        <tr>
          <th>Identifiant</th>
          <th>Nom complet</th>
          <th>Prenom du père</th>
          <th>Date de naissance</th>
          <th>Commissariat</th>
          <th>Date</th>
          <th @unlessrole('Membre') colspan="2" @endunlessrole class="text-center">Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($resis as $resi)
          @php
            $new_date_naiss = \Carbon\Carbon::parse($resi->inconnu->date_naiss)->format('d - m - Y');
            $new_date_dmde = \Carbon\Carbon::parse($resi->created_at)->format('d - m - Y');
          @endphp
        <tr>
          <td><strong>{{$resi->inconnu->n_ci}}</strong></td>
          <td><strong>{{$resi->inconnu->nomcomplet}}</strong></td>
          <td>{{$resi->inconnu->nom_pere}}</span></td>
          <td>{{$new_date_naiss}}</span></td>
          <td>{{$resi->commissariat->sigle}}</span></td>
          <td>{{$new_date_dmde}}</span></td>
          <td class="bg-info text-center">
            <a class="text-white" target="blank" href="{{ route('residencePDF', Crypt::encrypt($resi->id)) }}"><i class="fa fa-file-pdf me-1"></i></a>
          </td>
          @unlessrole('Membre')
          <td class="bg-danger text-center">
            <a class="text-white" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#resiDst{{$resi->id}}"><i class="fa fa-trash"></i> </a>
          </td>
          @endunlessrole


            @unlessrole('Membre')
            {{-- Vue du modal de suppression --}}
            @include('_partials/_modals/_CRUD-RESI/modal-deleteResi')
            @endunlessrole

          </td>
        </tr>
        @empty
        {{-- Le tableau sera vide s'il n'y a pas d'insertion --}}
        @endforelse


      </tbody>
    </table>
  </div>
</div>



@endsection
