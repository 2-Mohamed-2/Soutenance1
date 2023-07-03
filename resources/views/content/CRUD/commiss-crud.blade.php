@extends('layouts/layoutMaster')

@section('title', 'Tables - Basic Tables')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<!-- Row Group CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css')}}">
<!-- Form Validation -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons/datatables-buttons.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jszip/jszip.js')}}"></script>
<script src="{{asset('assets/vendor/libs/pdfmake/pdfmake.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons/buttons.html5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons/buttons.print.js')}}"></script>
<!-- Flat Picker -->
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<!-- Row Group JS -->
<script src="{{asset('assets/vendor/libs/datatables-rowgroup/datatables.rowgroup.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js')}}"></script>
<!-- Form Validation -->
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/test.js')}}"></script>
@endsection


@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Commissariat
</h4>

<hr class="my-5">

<div class="card">
  <div class="card-datatable table-responsive">
    <table class="datatables-basic table border-top">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th>id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Date</th>
          <th>Salary</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>na Na</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>Ousmane</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>Ousnau</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>na</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>Ouma</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>na</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>na</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>na</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>na</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>na</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>na</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>na</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>na</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>na</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        
        <tr>
          <td></td>
          <td></td>
          <td>id</td>
          <td>na</td>
          <td>em</td>
          <td>sa</td>
          <td>sal</td>
          <td>sal</td>
          <td>sal</td>
        </tr>
        

      </tbody>
    </table>
  </div>
</div>


{{-- Vue du modal d'insertion --}}
@include('_partials/_modals/_CRUD-COMMISS/modal-addCommiss')


@endsection
