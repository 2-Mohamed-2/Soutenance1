<!-- slider modal -->
<div class="modal-onboarding modal fade animate__animated" id="actionslogin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content text-center">
        <div class="modal-header border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div id="modalCarouselControls" class="carousel slide pb-2" data-bs-interval="false">
          <div class="carousel-inner">
            
            {{-- Modal pour la connexion du citoyen --}}
            <div class="carousel-item active">
              <div class="onboarding-content">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                    <span class="app-brand-logo demo d-block">
                        <img src="{{ asset('Coms_Ml_logo.png') }}" class="mx-auto" width="30%" alt="">
                      </span>
                </div>
                <!-- /Logo -->
                <p class="mb-4">Veuillez remplir ces informations</p>

                <form id="" class="mb-3" method="POST" action="{{ route('vlogin') }}">
                    
                  @csrf

                    <div class="mb-3">
                        <label class="form-label" for="">Numero CI</label>
                        <input type="text" id="test2" minlength="11" maxlength="11" oninput="convertToUppercase2()" required autocomplete="off" autofocus name="n_ci" class="form-control" placeholder="Numero de la carte d'identite" />
                    </div>
                    <div class="mb-3 form-password-toggle">
                      <div class="d-flex justify-content-between">
                          <label class="form-label" for="password">Mot de passe</label>
                      </div>
                      <div class="input-group input-group-merge">
                          <input type="password" id="login-password" minlength="8" maxlength="12" autocomplete="off" required name="password" style="letter-spacing: 5px;" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                          <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                      </div>
                    </div>
                    <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Connexion</button>
                    </div>
                </form>
              </div>
            </div>
            {{-- Fin --}}

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ slider modal -->

<script>

    // Créer un élément input
    var input2 = document.getElementById('test2');

    // Définir les attributs de l'élément input
    input2.setAttribute('type', 'text');
    input2.setAttribute('maxlength', '12');
    input2.setAttribute('pattern', '\\d{4}/[A-Z]{3}-\\d\\s[A-Z]');
    input2.setAttribute('title', 'Format attendu: 0000/AAA-0 A');
    input2.setAttribute('placeholder', '0000/AAA-0 A');

    // Ajouter un événement d'entrée pour formater automatiquement le texte
    input2.addEventListener('input', function(event) {
      var value = event.target.value;
      value = value.replace(/[^A-Z0-9]/g, ""); // Supprimer tous les caractères non numériques
      value = value.slice(0, 9) + value.slice(9).toUpperCase(); // Convertir les caractères de 9 à la fin en majuscules
     
      if (value.length >= 5) {
        value = value.slice(0, 4) + '/' + value.slice(4); // Insérer un '/' après les 4 premiers caractères
      }

      if (value.length >= 9) {
        value = value.slice(0, 8) + '-' + value.slice(8); // Insérer un '-' après les 8 premiers caractères
      }

      if (value.length >= 11) {
        value = value.slice(0, 10) + ' ' + value.slice(10); // Insérer un espace après le 11ème caractère
      }

      event.target.value = value;
    });


    //Pour la suppression des caracteres speciaux
    function filtrerCaracteresSpeciaux(event) {
      var input = event.target;
      var regex = /^[a-zA-Z0-9 ]*$/; // Expression régulière pour autoriser uniquement les lettres et les chiffres      
      if (!regex.test(input.value)) {
        input.value = input.value.replace(/[^a-zA-Z0-9]/g, ''); // Supprimer les caractères spéciaux
      }
    }


    // Pour convertir un input tout en majuscule
    function convertToUppercase() {
      var input = document.getElementById("test");
      input.value = input.value.toUpperCase();
    }
    function convertToUppercase2() {
      var input = document.getElementById("test2");
      input.value = input.value.toUpperCase();
    }


    // Pour ajouter de l'espace entre les chiffres d'un numero de tel
    document.getElementById('space').addEventListener('input', function (e) {
    e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{2})/g, '$1 ').trim();
    });


</script>

