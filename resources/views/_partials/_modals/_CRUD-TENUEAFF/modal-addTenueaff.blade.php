

<!-- Enable OTP Modal -->
<div class="modal fade" id="tenueaff{{ $tenue->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-3">Affectation du tenue {{ $tenue->type }} {{ $tenue->modele }}</h3>
        </div>

        <form action="{{ route('affectetenue', encrypt($tenue->id)) }}" method="post">
          @csrf

          <div class="col-12 mb-4">
           <select class="form-control" name="commissariat_id">
                    <option value="" > -- Choisissez un Coms -- </option>
                    @foreach($comms as $comm)
                    <option value="{{ $comm->id }}">{{ $comm->libelle }}
                    </option>
                    @endforeach
           </select>
          </div>

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Quantite</label>
            <div class="input-group input-group-merge">
              <input required type="number" autocomplete="off" name="quantite" class="form-control phone-mask"
                placeholder="Quantite" />
            </div>
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
      </div>

      </form>
    </div>
  </div>
</div>
</div>


