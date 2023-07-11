<!-- End Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addGrade" aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasEndLabel" class="offcanvas-title">Insertion d'un nouveau garde</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form id="enableOTPForm" class="row g-3" action="{{route('grd.store')}}" method="POST">
        @csrf

  
        <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Libelle</label>
          <div class="input-group input-group-merge">
            <input required type="text" autocomplete="off" maxlength="10" name="libelle" class="form-control phone-mask" placeholder="Libelle" />
          </div>
        </div>
  
  
  
        <div class="col-12">
          <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Anuler</button>
        </div>
      </form>
    </div>
  </div>
  