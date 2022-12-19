<!-- End Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addInco" aria-labelledby="offcanvasEndLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">Insertion d'un nouveau inconnu</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
    <form id="enableOTPForm" class="row g-3" action="{{route('Inco.store')}}" method="POST">
      @csrf
      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">NomComplet</label>
        <div class="input-group input-group-merge">
          <input required autocomplete="off" type="text" name="nomcomplet" class="form-control" placeholder="Nomcomplet " />
        </div>
      </div>
     
      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Adresse</label>
        <div class="input-group input-group-merge">
          <input required autocomplete="off" type="text" name="adresse" class="form-control" placeholder="Localiter " />
        </div>

      </div>
      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Telephone</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" maxlength="10" name="telephone" class="form-control phone-mask" placeholder="Telephone " />
        </div>
      </div><br>

      <div class="col-12" class="input-group input-group-merge">
        <label class="form-label" for="modalEnableOTPPhone">Genre</label>
        <select class="form-control" name="genre"  id="">
          <option value="">-- Genre --</option>
          <option value="Homme">Homme</option>
          <option value="Femme">Femme</option>
         </select>
    </div>


    <div class="col-12">
      <label class="form-label" for="modalEnableOTPPhone">Motif</label>
      <div class="input-group input-group-merge">
        <input required type="text" autocomplete="off" maxlength="10" name="motif" class="form-control phone-mask" placeholder="Telephone " />
      </div>
    </div>


      <div class="col-12">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Anuler</button>
      </div>
    </form>
  </div>
</div>
