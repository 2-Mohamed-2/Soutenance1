@php
 $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Compte - Sécurité')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-account-settings.css')}}" />

<style>

  #message{
    display: none;
    animation: anime 1s ease-out;
  }

  @keyframes anime {
    from{
      transform: translateY(1000px);
    }
  }

  .invalid{
    color: red;
    font-size: 18px;
  }
  .invalid:before
  {
    position: relative;
    left: -7px;
    content: "✗";
  }

  .valid{
    color: green;
    font-size: 18px;
  }
  .valid:before
  {
    position: relative;
    left: -7px;
    content: "✓";
  }

  .ok{
    text-decoration: none;
    color: white;
    font-size: 18px;
  }
  .ok:before
  {
    position: relative;
    left: -7px;
    content: "✓";
  }

</style>

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-security.js')}}"></script>
<script src="{{asset('assets/js/modal-enable-otp.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Compte /</span> Sécurité
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link" href="{{url('/Compte/Paramètre/Gestion')}}"><i class="bx bx-user me-1"></i> Gestion</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-lock-alt me-1"></i> Sécurité</a></li>
    </ul>
    <!-- Change Password -->
    <div class="card mb-4">
      <h5 class="card-header">Changer de mot de passe</h5>
      <div class="card-body">
        <form method="POST" action="{{ route('user-password.update') }}">
          @method('PUT')
          @csrf
          <div class="row">
            <div class="mb-3 col-md-6 form-password-toggle">
              <label class="form-label" for="currentPassword">Mot de passe actuel</label>
              <div class="input-group input-group-merge">
                <input class="form-control" style="letter-spacing: 3px;" required type="password" name="current_password" id="currentPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-md-6 form-password-toggle">
              <label class="form-label" for="newPassword">Nouveau mot de passe</label>
              <div class="input-group input-group-merge">
                <input class="form-control" style="letter-spacing: 3px;" type="password" id="pwd" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password"                 
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <div class="mb-3 col-md-6 form-password-toggle">
              <label class="form-label" for="confirmPassword">Confirmation du nouveau mot de passe</label>
              <div class="input-group input-group-merge">
                <input class="form-control" style="letter-spacing: 3px;" required type="password" name="password_confirmation" id="pwd2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              <p id="pwd2msg" class="fw-semibold mt-2"></p>
            </div>

            <div class="col-12 alert" id="message">
              <div class="col-12 d-flex justify-content-start">
                <div class="form-group has-icon-left">
                  <h4 class="">Le mot de passe doit contenir :</h4>
                  <span class="invalid" id="letter">Une lettre minuscule</span><br>
                  <span class="invalid" id="capital">Une lettre majuscule</span><br>
                  <span class="invalid" id="caract">Un des caractères spéciaux suivants : @, . , -</span><br>
                  <span class="invalid" id="number">Un chiffre</span><br>
                  <span class="invalid" id="lenght">08 caractères minimum</span><br>
                </div>
              </div>
            </div>
            {{-- <div class="col-12 mb-4">
              <p class="fw-semibold mt-2">Attentes du mot de passe:</p>
              <ul class="ps-3 mb-0">
                <li class="mb-1">
                  Un minimum de 8 caractères
                </li>
                <li class="mb-1">La première lettre doit être en majuscule</li>
                <li>Le mot de passe doit contenir des caractères spéciaux ("@", ".", "-")</li>
              </ul>
            </div> --}}
            <div class="col-12 mt-1">
              <button type="submit" id="sauv" class="btn btn-primary me-2">Sauvegarder</button>
              <button type="reset" class="btn btn-label-secondary">Anuler</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!--/ Change Password -->
  </div>
</div>



{{-- Script pour les critère de validation du mdp --}}
<script>

  var pwd = document.getElementById('pwd');
  var letter = document.getElementById('letter');
  var capital = document.getElementById('capital');
  var number = document.getElementById('number');
  var lenght = document.getElementById('lenght');
  var caract = document.getElementById('caract');
  var msg = document.getElementById('message');

  // Afficher les critères au click sur le input
  pwd.onfocus = function(){
    document.getElementById("message").style.display = "block"
  }

  // faire disparaitre les critères au click sur un autre point
  pwd.onblur = function(){
    document.getElementById("message").style.display = "none"
  }

  // Quand on commence à taper dans le pwd
  pwd.onkeyup = function(){



    // Validation des minuscules
    var minuscule = /[a-z]/g
    if(pwd.value.match(minuscule)){
      letter.classList.remove('invalid');
      letter.classList.add('valid');
    }
    else{
      letter.classList.remove('valid');
      letter.classList.add('invalid');
    }

    // Validation des caracteres speciaux
    var caractere = /[@,.,-]/g
    if(pwd.value.match(caractere)){
      caract.classList.remove('invalid');
      caract.classList.add('valid');
    }
    else{
      caract.classList.remove('valid');
      caract.classList.add('invalid');
    }


    // Validation des majuscules
    var majuscule = /[A-Z]/g
    if(pwd.value.match(majuscule)){
      capital.classList.remove('invalid');
      capital.classList.add('valid');
    }
    else{
      capital.classList.remove('valid');
      capital.classList.add('invalid');
    }


    // Validation des nombre
    var nbre = /[0-9]/g
    if(pwd.value.match(nbre)){
      number.classList.remove('invalid');
      number.classList.add('valid');
    }
    else{
      number.classList.remove('valid');
      number.classList.add('invalid');
    }



    // Validation de la longueur
    if(pwd.value.length >= 8){
      lenght.classList.remove('invalid');
      lenght.classList.add('valid');
    }
    else{
      lenght.classList.remove('valid');
      lenght.classList.add('invalid');
    }


    const button = document.getElementById('sauv');
    const npwd = document.getElementById('pwd2');

    if ((pwd.value.length >= 8) && (pwd.value.match(nbre)) && (pwd.value.match(caractere)) && (pwd.value.match(majuscule)) && (pwd.value.match(minuscule))) {
      button.disabled = false;
      npwd.disabled = false;

      // msg.classList.remove('alert-info');
      // msg.classList.add('alert-success');

      lenght.classList.remove('valid');
      lenght.classList.add('ok');

      caract.classList.remove('valid');
      caract.classList.add('ok');

      number.classList.remove('valid');
      number.classList.add('ok');

      capital.classList.remove('valid');
      capital.classList.add('ok');

      letter.classList.remove('valid');
      letter.classList.add('ok');
    }
    else {
      button.disabled = true;
      npwd.disabled = true;

      // document.getElementById("message").classList.remove('alert-succes');
      // document.getElementById("message").classList.add('alert-danger');

      lenght.classList.remove('ok');
      lenght.classList.add('invalid');

      capital.classList.remove('ok');
      capital.classList.add('invalid');

      caract.classList.remove('ok');
      caract.classList.add('invalid');

      letter.classList.remove('ok');
      letter.classList.add('invalid');

      number.classList.remove('ok');
      number.classList.add('invalid');
    }

  }


</script>
{{-- Fin --}}


{{-- Script pour la vérification des deux mots de passe--}}
<script>

  var pwd2 = document.getElementById("pwd2");
  var pwd2msg = document.getElementById("pwd2msg");

  pwd2.onfocus = function(){
    document.getElementById("pwd2msg").style.display = "block"
  }

  // faire disparaitre les critères au click sur un autre point
  pwd2.onblur = function(){
    document.getElementById("pwd2msg").style.display = "none"
  }

    pwd2.onkeyup = function()
    {
      const button = document.getElementById('sauv');
      var pwd = document.getElementById("pwd");

      if (pwd.value != pwd2.value) {
        // alert("Pas Ok");

        button.disabled = true;
        pwd2msg.classList.add('alert-danger');
        pwd2msg.innerHTML = "Attention, les deux mots de passe sont differents";

      }
      else {
        // alert("Ok");

        button.disabled = false;
        pwd2msg.classList.remove('alert-danger');
        pwd2msg.classList.add('alert-success');
        pwd2msg.innerHTML = "Les deux mots de passe sont identiques";
      }

    }
</script>
{{-- Fin --}}

@endsection
