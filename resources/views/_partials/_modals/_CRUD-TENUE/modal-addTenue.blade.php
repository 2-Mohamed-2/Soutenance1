<!-- End Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addTenue" aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasEndLabel" class="offcanvas-title">Insertion d'un nouveau Tenue</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form id="enableOTPForm" class="row g-3" action="{{route('Tenue.store')}}" method="POST">
        @csrf
  
       
       
        <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Type</label>
          <div class="input-group input-group-merge">
            <input required autocomplete="off" type="text" name="type" class="form-control" placeholder="Type de Vehicule" />
          </div>
  
        <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Modele</label>
          <div class="input-group input-group-merge">
            <input required type="text" autocomplete="off" maxlength="10" name="modele" class="form-control phone-mask" placeholder="Modele" />
          </div>
        </div>
  
  
      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Taille</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" maxlength="10" name="taille" class="form-control phone-mask" placeholder="Taille" />
        </div>
      </div>
  
      <div class="col-12">

          <label class="form-label" for="modalEnableOTPPhone">Annee</label>
          <div class="input-group input-group-merge">
            <input required type="year" autocomplete="off" maxlength="10" name="annee" class="form-control phone-mask" placeholder="" />
          </div>
        </div>

         <label class="form-label" for="modalEnableOTPPhone">Statut</label>
        <select class="form-control"  name="statut" >
            <option value="Operationel">Operationel</option>
            <option value="En pret">En pret</option>
            <option value="Usage limite"> Usage limite</option>
            <option value="En panne">En panne</option>
            <option value="Autre disponibilite">Autre disponibilite</option>
            <option value="En reparation">En reparation</option>
            <option value="En revision">En revision</option>
            <option value="En reforme">En reforme</option>
            <option value="Vendu">Vendu</option>
            <option value="Detruit">Detruit</option>
            <option value="Vole">Vole</option>
            <option value="Perdu">Perdu</option>
            <option value="Rendu">Rendu</option>
        </select>
      </div>

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Stock</label>
            <div class="input-group input-group-merge">
              <input required type="number" autocomplete="off" maxlength="10" name="stock" class="form-control phone-mask" placeholder="" />
            </div>
          </div>
        
        <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Commissariat</label>
            <div class="input-group input-group-merge">
                <select class="form-control" name="commissariats_id">
                    <option value=""> --  --</option>
                    @foreach($comms as $comm)
                    <option value="{{ $comm->id }}">{{ $comm->libelle }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div>

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">User</label>
            <div class="input-group input-group-merge">
                <select class="form-control" name="users_id">
                    <option value=""> --  --</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div>
      
  
  
        <div class="col-12">
          <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Anuler</button>
        </div>
      </form>
    </div>
  </div>
  