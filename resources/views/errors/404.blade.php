@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Introuvable')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}">
@endsection


@section('content')
<!-- Error -->
<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-2 mx-2">Page introuvable :(</h2>
    <p class="mb-4 mx-2">Oops! 😖 La demande est introuvable sur ce serveur.</p>
    <a href="" id="backButton" class="btn btn-primary">Retour à l'accueil</a>
    <div class="mt-3">
      <img src="{{asset('assets/img/illustrations/page-misc-error-'.$configData['style'].'.png')}}" alt="page-misc-error-light" width="500" class="img-fluid" data-app-dark-img="illustrations/page-misc-error-dark.png" data-app-light-img="illustrations/page-misc-error-light.png">
    </div>
  </div>
</div>
<!-- /Error -->
<script>
  // Fonction appelée lorsque le bouton est cliqué
  function goBack() {
    history.back();
  }

  // Attache l'événement de clic au bouton
  var backButton = document.getElementById("backButton");
  backButton.addEventListener("click", goBack);
</script>
@endsection
