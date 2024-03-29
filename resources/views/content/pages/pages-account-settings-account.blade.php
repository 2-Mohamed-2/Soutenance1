@extends('layouts/layoutMaster')

@section('title', 'Compte - Gestion')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Compte /</span> Gestion
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Gestion</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('/Compte/Paramètre/Sécurité')}}"><i class="bx bx-lock-alt me-1"></i> Sécurité</a></li>
    </ul>
    <div class="card mb-4">
      <h5 class="card-header">Les details du profil</h5>
      <!-- Account -->
      <div class="card-body">
        <form id="" method="POST" action="{{ route('cpgUpdate', encrypt(Auth::user()->id)) }}" enctype="multipart/form-data">
          @method("PUT")
          @csrf
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          {{-- {{ dd(Auth::user()->profile_photo_path) }} --}}
          <img src="{{ URL::to('public/Profils/'.Auth::user()->profile_photo_path)}}" alt="user-image" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
          <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
              <span class="d-none d-sm-block">Nouvelle photo</span>
              <i class="bx bx-upload d-block d-sm-none"></i>
              <input type="file" id="upload" name="profile_photo_path" class="account-file-input" hidden accept="image/png, image/jpeg" />
            </label>
            <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
              <i class="bx bx-reset d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Restaurer</span>
            </button>

            <p class="text-muted mb-0">Seulement les images sont autorisées</p>
          </div>
        </div>

      </div>
      <hr class="my-0">
      <div class="card-body">

          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="firstName" class="form-label">Nom complet</label>
              <input class="form-control" type="text" required name="name" autocomplete="off" value="{{Auth::user()->name}}" autofocus />
            </div>
            <div class="mb-3 col-md-6">
              <label for="lastName" class="form-label">Adresse</label>
              <input class="form-control" autocomplete="off" type="text" required name="adresse" value="{{Auth::user()->adresse}}" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">E-mail</label>
              <input class="form-control" autocomplete="off" required type="text" id="email" name="email" value="{{Auth::user()->email}}" placeholder="Mohamed@example.com" />
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">Telephone</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">(223)</span>
                <input type="text" inputmode="numeric" id="space" required autocomplete="off" name="telephone" class="form-control" value="{{Auth::user()->telephone}}" />
              </div>
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Sauvegarder</button>
            <button type="reset" class="btn btn-label-secondary">Annuler</button>
          </div>
        </form>

      </div>
      <!-- /Account -->

      {{-- Madou touche pas a ce span hein --}}
      <span id="formAccountDeactivation"></span>

    </div>

  </div>
</div>

<script>
  document.getElementById('space').addEventListener('input', function (e) {
  e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{2})/g, '$1 ').trim();
});
</script>

@endsection
