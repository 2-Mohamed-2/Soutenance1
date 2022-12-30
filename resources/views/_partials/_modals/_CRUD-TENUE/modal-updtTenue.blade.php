<!-- Enable OTP Modal -->
<div class="modal fade" id="tenueUpdt{{$tenue->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-5">Modification tenue</h3>
          </div>
          <h6>Veuillez reverifier ces informations</h6>

          <form id="enableOTPForm" class="row g-3" action="{{route('Tenue.update', encrypt($tenue->id))}}" method="POST">
            @method('PUT')
            @csrf
             
            <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Type</label>
                <div class="input-group input-group-merge">
                  <input required autocomplete="off" type="text" value="{{$tenue->type}}" name="type" class="form-control" placeholder="Type de Vehicule" />
                </div>
        
              <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Modele</label>
                <div class="input-group input-group-merge">
                  <input required type="text" autocomplete="off" maxlength="10" name="modele" value="{{$tenue->modele}}" class="form-control phone-mask" placeholder="Modele" />
                </div>
              </div>
        
        
            <div class="col-12">
              <label class="form-label" for="modalEnableOTPPhone">Taille</label>
              <div class="input-group input-group-merge">
                <input required type="text" autocomplete="off" maxlength="10" name="taille" value="{{$tenue->taille}}" class="form-control phone-mask" placeholder="Taille" />
              </div>
            </div>
        
            <div class="col-12">
              
                <label class="form-label" for="modalEnableOTPPhone">Annee</label>
                <div class="input-group input-group-merge">
                  <input required type="year" autocomplete="off" maxlength="10" name="annee" value="{{$tenue->annee}}" class="form-control phone-mask" placeholder="" />
                </div>
              </div>
      
              <label class="form-label" for="modalEnableOTPPhone">Statut</label>
              <select class="form-control" value="{{$tenue->statut}}"  name="statut" >
                <option value="{{$tenue->statut}}">{{$tenue->statut}}</option>
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
                    <input required type="number" autocomplete="off" maxlength="10" name="stock" value="{{$tenue->stock}}" class="form-control phone-mask" placeholder="" />
                  </div>
                </div>
              
              <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Commissariat</label>
                  <div class="input-group input-group-merge">
                      <select class="form-control" value="{{$tenue->commissariats_id}}" name="commissariats_id">
                          <option value="{{$tenue->commissariats_id}}">-- Choisi Commissariat--</option>
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
                      <select class="form-control" value="{{$tenue->users_id}}" name="users_id">
                          <option value="{{$tenue->users_id}}">-- Choisi Utilisateur --</option>
                          @foreach($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}
                          </option>
                          @endforeach
                      </select>
                  </div>
                </div>
        

            <div class="col-12">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Modifier</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Anuler</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  <!--/ Enable OTP Modal -->
