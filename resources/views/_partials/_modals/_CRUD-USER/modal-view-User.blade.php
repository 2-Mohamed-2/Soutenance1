<!-- Offcanvas to add new user -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="userInfo{{$user->id}}" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Informations sur : {{ $user->name }}</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      
  
        <div class="mb-3">
          <label class="form-label" for="add-user-fullname">Matricule</label>
          <input type="text" readonly autocomplete="off" value="{{$user->matricule}}" class="form-control"/>
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-fullname">Nom complet</label>
          <input type="text" readonly autocomplete="off" value="{{$user->name}}" class="form-control"/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="add-user-fullname">Grade</label>
            <input type="text" readonly autocomplete="off" value="{{$user->grade->libelle ?? "Pas encore affecté"}}" class="form-control"/>
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-fullname">Commissariat</label>
          <input type="text" readonly autocomplete="off" value="{{$user->commissariat->libelle ?? "Pas encore affecté"}}" class="form-control"/>
      </div>
        <div class="mb-3">
            <label class="form-label" for="add-user-fullname">Section</label>
            <input type="text" readonly autocomplete="off" value="{{$user->section->libelle ?? "Neutre "}}" class="form-control"/>
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-email">Email</label>
          <input type="text" readonly autocomplete="off" value="{{$user->email}}" class="form-control"/>
        </div>
        <div class="mb-3">
          <label class="form-label" readonly for="add-user-contact">Contact</label>
          <input type="tel" readonly value="{{$user->telephone}}" class="form-control" />
        </div>
        <div class="mb-3">
          <label class="form-label" readonly for="add-user-contact">Genre</label>
          @if ($user->genre == "H")
          <input type="text" readonly value="Homme" class="form-control" />
          @elseif ($user->genre == "F")
          <input type="text" readonly value="Femme" class="form-control" />
          @endif
        </div> 
    </div>
  </div>
  
  