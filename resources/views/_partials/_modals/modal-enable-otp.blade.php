<!-- Enable OTP Modal -->
<div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-5">Insertion d'un nouveau commissariat</h3>
        </div>
        <h6>Veuillez renseigner toutes ces informations</h6>

        <form id="enableOTPForm" class="row g-3" action="{{route('Commiss.store')}}" method="POST">
          @csrf
          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Nom</label>
            <div class="input-group input-group-merge">
              <input type="text" name="libelle" class="form-control" placeholder="1er Arrondissement " />
            </div>
          </div>
          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Dimunitif</label>
            <div class="input-group input-group-merge">
              <input type="text" name="sigle" class="form-control" placeholder="1e_Arrd " />
            </div>
          </div>
          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Adresse</label>
            <div class="input-group input-group-merge">
              <input type="text" name="localite" class="form-control" placeholder="Kati " />
            </div>
          </div>
          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Telephone</label>
            <div class="input-group input-group-merge">
              <input type="text" pattern="00223 [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" maxlength="17" name="telephone" class="form-control phone-mask" placeholder="00223 01 02 03 04 " />
            </div>
          </div>

          <div class="col-12">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<!--/ Enable OTP Modal -->
