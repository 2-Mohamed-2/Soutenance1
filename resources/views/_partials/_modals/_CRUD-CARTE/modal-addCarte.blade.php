<!-- End Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addCarte" aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasEndLabel" class="offcanvas-title">Insertion d'une nouvelle carte</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form id="enableOTPForm" class="row g-3" action="{{route('Carte.store')}}" method="POST">
        @csrf

  
        <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Numero Delivrance</label>
          <div class="input-group input-group-merge">
            <input required type="text" autocomplete="off" maxlength="10" name="n_delivrance" class="form-control phone-mask" placeholder="Numero delivrance" />
          </div>
        </div>

        <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Lieu Arrd</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="lieu" class="form-control phone-mask" placeholder="Lieu du Arrnd" />
            </div>
          </div>
          
          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Village_de</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="village_de" class="form-control phone-mask" placeholder="village_de" />
            </div>
          </div>

           <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Franction_de</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="franction_de" class="form-control phone-mask" placeholder="franction_de" />
            </div>
          </div>

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Nom</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="nom" class="form-control phone-mask" placeholder="nom" />
            </div>
          </div>

          
          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Prenom</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="prenom" class="form-control phone-mask" placeholder="Prenom" />
            </div>
          </div>

          
          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Nom du Pere</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="fils_de" class="form-control phone-mask" placeholder="Nom du pere" />
            </div>
          </div>

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Nom de la mere</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="et_de" class="form-control phone-mask" placeholder="Nom de la mere" />
            </div>
          </div>
          
          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Date de Naissance</label>
            <div class="input-group input-group-merge">
              <input required type="Date" autocomplete="off" maxlength="10" name="ne_le" class="form-control phone-mask" placeholder="Date de Naissance" />
            </div>
          </div>

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Lieu de Naissance</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="a" class="form-control phone-mask" placeholder="Lieu de Naissance" />
            </div>
          </div>

          
        {{--  <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Photo</label>
            <div class="input-group input-group-merge">
              <input type="file" autocomplete="off" maxlength="10" name="photo" class="form-control phone-mask" placeholder="Photo" />
            </div>
          </div>--}}

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Profession</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="profession" class="form-control phone-mask" placeholder="Profession" />
            </div>
          </div>

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Domicile</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="domicile" class="form-control phone-mask" placeholder="domicile" />
            </div>
          </div>
  
          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Taille</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="taille" class="form-control phone-mask" placeholder="taille" />
            </div>
          </div>

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Teint</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="teint" class="form-control phone-mask" placeholder="teint" />
            </div>
          </div>

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Cheveux</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="cheveux" class="form-control phone-mask" placeholder="cheveux" />
            </div>
          </div>

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Signes</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="10" name="signes" class="form-control phone-mask" placeholder="signes" />
            </div>
          </div>

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Carte numero</label>
            <div class="input-group input-group-merge">
              <input required type="number" autocomplete="off" maxlength="10" name="carte_n" class="form-control phone-mask" placeholder="carte_n" />
            </div>
          </div> 
  
  
  
        <div class="col-12">
          <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Anuler</button>
        </div>
      </form>
    </div>
  </div>