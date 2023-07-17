@extends('layouts/layoutMaster')

@section('title', 'Activite ')

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
  <span class="text-muted fw-light">Coms_ML /</span> Activité
</h4>

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Activités des utilisateurs</h5>
  <hr>
  <div class="card-datatable table-responsive text-nowrap">
    <table class="dt-fixedheader table table-hover datatable">
      <thead>
        <tr>
          <th>Matricule</th>
          <th>Utilisateur</th>
          <th>Action</th>
          <th>Fonction</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($activities as $activity)
          <tr>
            <td>{{ $activity->user->matricule }}</td>
            <td>{{ $activity->user->name }}</td>
            <td class="text-wrap">{{ $activity->activity }}</td>
            <td class="text-wrap">{{ $activity->module }}</td>
            @php
              $creat1 = \Carbon\Carbon::parse($activity->created_at)->format('d - m - Y');
              $creat2 = \Carbon\Carbon::parse($activity->created_at)->format('H:i');
              $creat = 'Le '. $creat1 .'  à  '. $creat2;
            @endphp
            <td>{{ $creat }}</td>
          </tr>
        @empty
          
        @endforelse
        
      </tbody>
    </table>    
  </div>
  {{-- <div class="p-2 col-12 d-flex justify-content-end">
    <div>
      <small class="mb-5">Les 1000 dernièrres activités des utilisateurs.</small>
      <br>
      {{ $activities->links() }}
    </div>    
  </div> --}}
</div>

@endsection
