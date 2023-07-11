@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Accès Interdit ! ')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}">
@endsection


@section('content')
<!-- Not Authorized -->
<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-2 mx-2">Vous n'êtes pas authorisé !</h2>
    <p class="mb-4 mx-2">Vous n'avez pas les permissions necéssaires pour effectuer cette action.<br> Veuillez contacter la hiérarchie.</p>
    <a href="{{ URL::previous()}}" class="btn btn-primary">Retour</a>
    <div class="mt-5">
      <img src="{{asset('assets/img/illustrations/girl-with-laptop-'.$configData['style'].'.png')}}" alt="page-misc-not-authorized-light" width="450" class="img-fluid" data-app-dark-img="illustrations/girl-with-laptop-dark.png" data-app-light-img="illustrations/girl-with-laptop-light.png">
    </div>
  </div>
</div>
<!-- /Not Authorized -->
@endsection
