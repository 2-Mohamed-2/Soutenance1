<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="userInfo{{$user->id}}" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Informations sur : {{ $user->name }}</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      
  
        <div class="mb-3">
          <label class="form-label" for="add-user-fullname">Matricule</label>
          <input type="text" readonly autocomplete="off" value="{{$user->matricule}}" required class="form-control" id="add-user-fullname" placeholder="Matricule" name="matricule"/>
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-fullname">Nom complet</label>
          <input type="text" readonly autocomplete="off" value="{{$user->name}}" required class="form-control" id="add-user-fullname" placeholder="Nom complet" name="name"/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="add-user-fullname">Commissariat</label>
            <input type="text" readonly autocomplete="off" value="{{$user->commissariat->libelle ?? "Pas encore affecté"}}" required class="form-control" id="add-user-fullname" placeholder="Nom complet" name="name"/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="add-user-fullname">Section</label>
            <input type="text" readonly autocomplete="off" value="{{$user->section->libelle ?? "Neutre "}}" required class="form-control" id="add-user-fullname" placeholder="Nom complet" name="name"/>
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-email">Email</label>
          <input type="text" readonly autocomplete="off" value="{{$user->email}}" required id="add-user-email" class="form-control" placeholder="police@police.com"
            aria-label="john.doe@example.com" name="email" />
        </div>
        <div class="mb-3">
          <label class="form-label" readonly for="add-user-contact">Contact</label>
          <input type="tel" readonly id="spacee" value="{{$user->telephone}}" class="form-control" placeholder="00 00 00 00"  autocomplete="off" maxlength="11" name="telephone"/>
        </div>
        <div class="mb-3">
          <label class="form-label" for="country">Genre</label>
          <select name="genre" readonly required class="form-select">
            @if ($user->genre == "H")
            <option selected value="H">Homme</option>
            @elseif ($user->genre == "F")
            <option value="F">Femme</option>
            @endif
          </select>
        </div>
      
    </div>
  </div>
  
  