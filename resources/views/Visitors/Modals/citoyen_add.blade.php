<!-- Edit User Modal -->
@endsection
<div class="modal fade" id="addCitoyen" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3>Creation de compte</h3>
            <p>Veuillez renseigner les differents champs ci-dessous.</p>
          </div>
          <form id="editUserForm" class="row g-3" action="{{ route('citcreate') }}">
            @csrf
            <div class="col-12 col-md-12">
              <label class="form-label" for="">Nom complet</label>
              <input type="text" oninput="filtrerCaracteresSpeciaux(event)" minlength="5" autocomplete="off" required id="" name="name" class="form-control" placeholder="Prenom et nom" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserLastName">Adresse</label>
              <input type="text" oninput="filtrerCaracteresSpeciaux(event)" autocomplete="off" name="adresse" class="form-control" placeholder="Bamako" />
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" for="add-user-contact">Contact</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text">+223</span>
                    <input type="tel" oninput="filtrerCaracteresSpeciaux(event)" id="space" inputmode="numeric" class="form-control" placeholder="00 00 00 00"  autocomplete="off" maxlength="11" name="telephone"/>
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
                <input type="text" id="test" minlength="11" maxlength="11" oninput="convertToUppercase()" autocomplete="off" name="n_ci" class="form-control" placeholder="Numero de la carte d'identite" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserLastName">Mot de passe</label>
              <div class="col-12 col-md-6 input-group input-group-merge">
                <input type="password" id="login-password" minlength="8" maxlength="8" autocomplete="off"   name="password" style="letter-spacing: 5px;" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalEditUserLastName">Confirmation</label>
              <input type="password" id="login-password" minlength="8" maxlength="8" autocomplete="off" name="password_confirmation" style="letter-spacing: 5px;" class="form-control" placeholder="Password" />
            </div>
              
            
            <div class="col-12 text-center mt-4">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Creer mon compte</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Anuler</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

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


    // Pour ajouter de l'espace entre les chiffres d'un numero de tel
    document.getElementById('space').addEventListener('input', function (e) {
    e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{2})/g, '$1 ').trim();
    });


  </script>
  <!--/ Edit User Modal -->
  