<!-- slider modal -->
<div class="modal-onboarding modal fade animate__animated" id="actionscreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content text-center">
        <div class="modal-header border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div id="modalCarouselControls" class="carousel slide pb-2" data-bs-interval="false">
          <div class="carousel-inner">

            {{-- Modal pour la creation de compte --}}
            <div class="carousel-item active">
              <div class="onboarding-content">                
                <div class="text-center mb-1">
                    <h4 class="onboarding-title text-body">Creation de compte</h4>                    
                    <p>Veuillez renseigner les differents champs ci-dessous.</p>
                </div>
                <form id="" class="row g-3" action="{{ route('citcreate') }}" method="POST">
                    @csrf
                    <div class="col-12 col-md-12">
                      <label class="form-label" for="">Nom complet</label>
                      <input type="text" oninput="filtrerCaracteresSpeciaux(event)" minlength="5" autocomplete="off" value="{{ old('name') }}" required id="" name="name" class="form-control" placeholder="Prenom et nom" />
                    </div>
                    
                    <div class="col-12 col-md-6">
                      <label class="form-label" for="">Date de naissance</label>
                      <input type="date" minlength="5" autocomplete="off" value="{{ old('datenaiss') }}" required id="" name="datenaiss" class="form-control" placeholder="" />
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label" for="">Lieu de naissance</label>
                      <input type="text" minlength="3" autocomplete="off" value="{{ old('lieunaiss') }}" required id="" name="lieunaiss" class="form-control" placeholder="Lieu de naissance" />
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label" for="">Prenom du père</label>
                      <input type="text" oninput="filtrerCaracteresSpeciaux(event)" minlength="5" autocomplete="off" value="{{ old('namePere') }}" required id="" name="namePere" class="form-control" placeholder="Prenom du père" />
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label" for="">Nom complet de la mère</label>
                      <input type="text" oninput="filtrerCaracteresSpeciaux(event)" minlength="5" autocomplete="off" value="{{ old('nameMere') }}" required id="" name="nameMere" class="form-control" placeholder="Prenom et nom de la mère" />
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label" for="modalEditUserLastName">Adresse</label>
                      <input type="text" oninput="filtrerCaracteresSpeciaux(event)" autocomplete="off" name="adresse" required value="{{ old('adresse') }}" class="form-control" placeholder="Adresse" />
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="add-user-contact">Contact</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">+223</span>
                            <input type="tel" oninput="filtrerCaracteresSpeciaux(event)" id="space" inputmode="numeric" class="form-control" placeholder="00 00 00 00"  autocomplete="off" value="{{ old('telephone') }}" required maxlength="11" name="telephone"/>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <label label class="form-label" for="">Genre</label>
                        <select name="genre" required class="form-select">
                            <option selected disabled>Le genre</option>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserLastName">Numero CI</label>
                        <input type="text" value="{{ old('n_ci') }}" id="test" minlength="11" maxlength="11" oninput="convertToUppercase()" required autocomplete="off" name="n_ci" class="form-control" placeholder="Numero de la carte d'identite" />
                    </div>
                    <div class="col-12 col-md-6 form-password-toggle">
                      <label class="form-label" for="modalEditUserLastName">Mot de passe</label>
                      <div class="col-12 col-md-6 input-group input-group-merge">
                        <input type="password" required id="login-password" minlength="8" maxlength="12" autocomplete="off" value="{{ old('password') }}" name="password" style="letter-spacing: 5px;" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                      </div>
                    </div>
                    
                    <div class="col-12 col-md-6 form-password-toggle">
                      <label class="form-label" for="modalEditUserLastName">Confirmation</label>
                      <div class="col-12 col-md-6 input-group input-group-merge">
                        <input type="password" id="login-password" minlength="8" maxlength="12" autocomplete="off" value="{{ old('password_confirmation') }}" required name="password_confirmation" style="letter-spacing: 5px;" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                      </div>
                    </div>
                    <br>
                      
                    
                    <div class="col-12 text-center mt-4">
                      <button type="submit" class="btn btn-primary me-sm-3 me-1">Creer mon compte</button>
                      <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Anuler</button>
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
    var input = document.getElementById('test');

    // Définir les attributs de l'élément input
    input.setAttribute('type', 'text');
    input.setAttribute('maxlength', '12');
    input.setAttribute('pattern', '\\d{4}/[A-Z]{3}-\\d\\s[A-Z]');
    input.setAttribute('title', 'Format attendu: 0000/AAA-0 A');
    input.setAttribute('placeholder', '0000/AAA-0 A');

    // Ajouter un événement d'entrée pour formater automatiquement le texte
    input.addEventListener('input', function(event) {
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

