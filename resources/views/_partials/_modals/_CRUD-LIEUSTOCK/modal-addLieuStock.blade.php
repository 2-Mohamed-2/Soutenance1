<!-- End Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addlieustock" aria-labelledby="offcanvasEndLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">Insertion Lieu</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
    <form id="enableOTPForm" class="row g-3" action="{{route('lieustock.store')}}" method="POST">
      @csrf

      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Nom Entrepot</label>
        <div class="input-group input-group-merge">
          <input required autocomplete="off" type="text" name="entrepot" class="form-control" placeholder="Entrepot " />
        </div>

      </div>
      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Ville</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" maxlength="45" name="ville" class="form-control phone-mask"
            placeholder="Ville " />
        </div>
      </div><br>

      <div class="col-12">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas"
          aria-label="Close">Anuler</button>
      </div>
    </form>
  </div>
</div>
