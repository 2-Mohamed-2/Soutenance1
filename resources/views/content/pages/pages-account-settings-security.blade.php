@php
 $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Paramètre du compte - Sécurité')

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
  <span class="text-muted fw-light">Paramètre du compte /</span> Sécurité
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-account')}}"><i class="bx bx-user me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-lock-alt me-1"></i> Sécurité</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-billing')}}"><i class="bx bx-detail me-1"></i> Billing & Plans</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-notifications')}}"><i class="bx bx-bell me-1"></i> Notifications</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-connections')}}"><i class="bx bx-link-alt me-1"></i> Connections</a></li>
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
                <input class="form-control" required type="password" name="current_password" id="currentPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-md-6 form-password-toggle">
              <label class="form-label" for="newPassword">Nouveau mot de passe</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="password" id="pwd" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password"                 
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <div class="mb-3 col-md-6 form-password-toggle">
              <label class="form-label" for="confirmPassword">Confirmation du nouveau mot de passe</label>
              <div class="input-group input-group-merge">
                <input class="form-control" required type="password" name="password_confirmation" id="pwd2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
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

    <!-- Two-steps verification -->
    <div class="card mb-4">
      <h5 class="card-header">Two-steps verification</h5>
      <div class="card-body">
        <p class="fw-semibold mb-3">Two factor authentication is not enabled yet.</p>
        <p class="w-75">Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to log in.
          <a href="javascript:void(0);">Learn more.</a>
        </p>
        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#enableOTP">Enable two-factor authentication</button>
      </div>
    </div>
    <!-- Modal -->
     @include('_partials/_modals/modal-enable-otp')
    <!-- /Modal -->

    <!--/ Two-steps verification -->

    <!-- Create an API key -->
    <div class="card mb-4">
      <h5 class="card-header">Create an API key</h5>
      <div class="row">
        <div class="col-md-5 order-md-0 order-1">
          <div class="card-body">
            <form id="formAccountSettingsApiKey" method="POST" onsubmit="return false">
              <div class="row">
                <div class="mb-3 col-12">
                  <label for="apiAccess" class="form-label">Choose the Api key type you want to create</label>
                  <select id="apiAccess" class="select2 form-select">
                    <option value="">Choose Key Type</option>
                    <option value="full">Full Control</option>
                    <option value="modify">Modify</option>
                    <option value="read-execute">Read & Execute</option>
                    <option value="folders">List Folder Contents</option>
                    <option value="read">Read Only</option>
                    <option value="read-write">Read & Write</option>
                  </select>
                </div>
                <div class="mb-3 col-12">
                  <label for="apiKey" class="form-label">Name the API key</label>
                  <input type="text" class="form-control" id="apiKey" name="apiKey" placeholder="Server Key 1" />
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary me-2 d-grid w-100">Create Key</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-7 order-md-1 order-0">
          <div class="text-center mt-4 mx-3 mx-md-0">
            <img src="{{asset('assets/img/illustrations/sitting-girl-with-laptop-'.$configData['style'].'.png')}}" class="img-fluid" alt="Api Key Image" width="350" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png">
          </div>
        </div>
      </div>
    </div>
    <!--/ Create an API key -->

    <!-- API Key List & Access -->
    <div class="card mb-4">
      <h5 class="card-header">API Key List & Access</h5>
      <div class="card-body">
        <p>An API key is a simple encrypted string that identifies an application without any principal. They are useful for accessing public data anonymously, and are used to associate API requests with your project for quota and billing.</p>
        <div class="row">
          <div class="col-md-12">
            <div class="bg-lighter rounded p-3 mb-3 position-relative">
              <div class="dropdown api-key-actions">
                <a class="btn dropdown-toggle text-muted hide-arrow p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="javascript:;" class="dropdown-item"><i class="bx bx-pencil me-2"></i>Edit</a>
                  <a href="javascript:;" class="dropdown-item"><i class="bx bx-trash me-2"></i>Delete</a>
                </div>
              </div>
              <div class="d-flex align-items-center flex-wrap mb-3">
                <h4 class="mb-0 me-3">Server Key 1</h4>
                <span class="badge bg-label-primary">Full Access</span>
              </div>
              <div class="d-flex align-items-center mb-2">
                <span class="fw-semibold me-3">23eaf7f0-f4f7-495e-8b86-fad3261282ac</span>
                <span class="text-muted cursor-pointer"><i class="bx bx-copy"></i></span>
              </div>
              <span>Created on 28 Apr 2021, 18:20 GTM+4:10</span>
            </div>
            <div class="bg-lighter rounded p-3 position-relative mb-3">
              <div class="dropdown api-key-actions">
                <a class="btn dropdown-toggle text-muted hide-arrow p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="javascript:;" class="dropdown-item"><i class="bx bx-pencil me-2"></i>Edit</a>
                  <a href="javascript:;" class="dropdown-item"><i class="bx bx-trash me-2"></i>Delete</a>
                </div>
              </div>
              <div class="d-flex align-items-center flex-wrap mb-3">
                <h4 class="mb-0 me-3">Server Key 2</h4>
                <span class="badge bg-label-primary">Read Only</span>
              </div>
              <div class="d-flex align-items-center mb-2">
                <span class="fw-semibold me-3">bb98e571-a2e2-4de8-90a9-2e231b5e99</span>
                <span class="text-muted cursor-pointer"><i class="bx bx-copy"></i></span>
              </div>
              <span>Created on 12 Feb 2021, 10:30 GTM+2:30</span>
            </div>
            <div class="bg-lighter rounded p-3 position-relative">
              <div class="dropdown api-key-actions">
                <a class="btn dropdown-toggle text-muted hide-arrow p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a href="javascript:;" class="dropdown-item"><i class="bx bx-pencil me-2"></i>Edit</a>
                  <a href="javascript:;" class="dropdown-item"><i class="bx bx-trash me-2"></i>Delete</a>
                </div>
              </div>
              <div class="d-flex align-items-center flex-wrap mb-3">
                <h4 class="mb-0 me-3">Server Key 3</h4>
                <span class="badge bg-label-primary">Full Access</span>
              </div>
              <div class="d-flex align-items-center mb-2">
                <span class="fw-semibold me-3">2e915e59-3105-47f2-8838-6e46bf83b711</span>
                <span class="text-muted cursor-pointer"><i class="bx bx-copy"></i></span>
              </div>
              <span>Created on 28 Dec 2020, 12:21 GTM+4:10</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ API Key List & Access -->

    <!-- Recent Devices -->
    <div class="card mb-4">
      <h5 class="card-header">Recent Devices</h5>
      <div class="table-responsive">
        <table class="table border-top">
          <thead>
            <tr>
              <th class="text-truncate">Browser</th>
              <th class="text-truncate">Device</th>
              <th class="text-truncate">Location</th>
              <th class="text-truncate">Recent Activities</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-truncate"><i class='bx bxl-windows text-info me-3'></i> <span class="fw-semibold">Chrome on Windows</span></td>
              <td class="text-truncate">HP Spectre 360</td>
              <td class="text-truncate">Switzerland</td>
              <td class="text-truncate">10, July 2021 20:07</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='bx bx-mobile-alt text-danger me-3'></i> <span class="fw-semibold">Chrome on iPhone</span></td>
              <td class="text-truncate">iPhone 12x</td>
              <td class="text-truncate">Australia</td>
              <td class="text-truncate">13, July 2021 10:10</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='bx bxl-android text-success me-3'></i> <span class="fw-semibold">Chrome on Android</span></td>
              <td class="text-truncate">Oneplus 9 Pro</td>
              <td class="text-truncate">Dubai</td>
              <td class="text-truncate">14, July 2021 15:15</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='bx bxl-apple me-3'></i> <span class="fw-semibold">Chrome on MacOS</span></td>
              <td class="text-truncate">Apple iMac</td>
              <td class="text-truncate">India</td>
              <td class="text-truncate">16, July 2021 16:17</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='bx bxl-windows text-info me-3'></i> <span class="fw-semibold">Chrome on Windows</span></td>
              <td class="text-truncate">HP Spectre 360</td>
              <td class="text-truncate">Switzerland</td>
              <td class="text-truncate">20, July 2021 21:01</td>
            </tr>
            <tr>
              <td class="text-truncate"><i class='bx bxl-android text-success me-3'></i> <span class="fw-semibold">Chrome on Android</span></td>
              <td class="text-truncate">Oneplus 9 Pro</td>
              <td class="text-truncate">Dubai</td>
              <td class="text-truncate">21, July 2021 12:22</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Recent Devices -->

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
