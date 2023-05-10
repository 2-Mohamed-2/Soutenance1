<!-- Enable OTP Modal -->
<div class="modal fade" id="lieustockUpdt{{$lieustock->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-5">Modification Lieu</h3>
        </div>
        <h6>Veuillez reverifier ces informations</h6>

        <form id="enableOTPForm" class="row g-3" action="{{route('lieustock.update', encrypt($lieustock->id))}}" method="POST">
          @method('PUT')
          @csrf
          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Nom Entrepot</label>
            <div class="input-group input-group-merge">
              <input required autocomplete="off" type="text" value="{{ $lieustock->entrepot }}" name="entrepot" class="form-control" placeholder="Entrepot " />
            </div>

          </div>
          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Ville</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" maxlength="45" value="{{ $lieustock->ville }}" name="ville" class="form-control phone-mask"
                placeholder="Ville " />
            </div>
          </div><br>

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
