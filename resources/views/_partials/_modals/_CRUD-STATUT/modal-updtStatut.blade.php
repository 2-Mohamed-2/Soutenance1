<!-- Enable OTP Modal -->
<div class="modal fade" id="statutUpdt{{$statut->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-5">Modification statut</h3>
          </div>
          <h6>Veuillez reverifier ces informations</h6>

          <form id="enableOTPForm" class="row g-3" action="{{route('Statut.update', encrypt($statut->id))}}" method="POST">
            @method('PUT')
            @csrf
             
            <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Libelle</label>
                <div class="input-group input-group-merge">
                  <input required autocomplete="off" type="text" value="{{$statut->libelle}}" name="libelle" class="form-control" placeholder="Libelle" />
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
