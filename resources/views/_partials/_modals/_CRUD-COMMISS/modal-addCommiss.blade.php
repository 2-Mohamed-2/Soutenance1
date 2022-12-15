<!-- Enable OTP Modal -->
{{-- <div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-5"></h3>
        </div>
        <h6>Veuillez renseigner toutes ces informations</h6>



      </div>
    </div>
  </div>
</div> --}}
<!--/ Enable OTP Modal -->



<!-- End Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addComm" aria-labelledby="offcanvasEndLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">Insertion d'un nouveau commissariat</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
    <form id="enableOTPForm" class="row g-3" action="{{route('Commiss.store')}}" method="POST">
      @csrf
      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Nom</label>
        <div class="input-group input-group-merge">
          <input type="text" required autocomplete="off" name="libelle" class="form-control" placeholder="1er Arrondissement " />
        </div>
      </div>
      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Dimunitif</label>
        <div class="input-group input-group-merge">
          <input type="text" required autocomplete="off" name="sigle" class="form-control" placeholder="1e_Arrd " />
        </div>
      </div>
      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Adresse</label>
        <div class="input-group input-group-merge">
          <input type="text" required autocomplete="off" name="localite" class="form-control" placeholder="Kati " />
        </div>
      </div>
      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Telephone</label>
        <div class="input-group input-group-merge">
          <input type="text" required autocomplete="off" pattern="00223 [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" maxlength="17" name="telephone" class="form-control phone-mask" placeholder="00223 01 02 03 04 " />
        </div>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Anuler</button>
      </div>
    </form>
  </div>
</div>
