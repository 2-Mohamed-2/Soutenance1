@extends('layouts/layoutMaster')

@section('title', 'Session ')

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
  <span class="text-muted fw-light">Coms_ML /</span> Session
</h4>

<!-- Hoverable Table rows -->
<div class="card">
  <h5 class="card-header">Sessions des utilisateurs</h5>
  <hr>
  <div class="card-datatable table-responsive text-wrap">
    <table class="dt-fixedheader table table-hover datatable text-wrap">
      <thead>
        <tr>
          <th>Matricule</th>
          <th>Utilisateur</th>
          <th>Debut</th>
          <th>Fin</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($sessions as $session)
          
          <tr>
            <td>{{ $session->user->matricule }}</td>
            <td>{{ $session->user->name }}</td>
            @php
              $creat1 = \Carbon\Carbon::parse($session->created_at)->format('d - m - Y');
              $creat2 = \Carbon\Carbon::parse($session->created_at)->format('H:i');
              $creat = 'Le '. $creat1 .'  à  '. $creat2;

              $now = \Carbon\Carbon::now();
              $now2 = $session->deconnexion;
              $end1 = \Carbon\Carbon::parse($session->deconnexion)->format('d - m - Y');
              $end2 = \Carbon\Carbon::parse($session->deconnexion)->format('H:i');
              $end = 'Le '. $end1 .'  à  '. $end2;
            @endphp
            <td>{{ $creat }}</td>
            <td>
              @if ($now < $now2)
                Actuellement
              @else
                {{ $end }}
              @endif
              
            </td>
            
          </tr>
          
        @empty
          
        @endforelse
      </tbody>
    </table>
  </div>
</div>


@endsection
