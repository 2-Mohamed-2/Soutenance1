<!-- End Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="dmdeAffect" aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasEndLabel" class="offcanvas-title">Demande d'affectation</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form id="enableOTPForm" class="row g-3" action="{{ route('user_affect') }}" method="POST">
        @csrf
        
        <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Commissariat</label>
            <div class="input-group input-group-merge">
                <select required class="form-control" name="commissariat_id">
                    <option selected disabled>Selectionner le commissariat de destination</option>
                    @foreach($comms as $comm)
                    <option value="{{ $comm->id }}">{{ $comm->libelle }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div>
  
        <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Motif</label> <br>
          <textarea name="motif" required class="form-control col-12" rows="5" style="resize:none; padding:10px;"></textarea>
        </div>
   
  
        <div class="col-12">
          <button type="submit" class="btn btn-primary me-sm-3 me-1">Envoyer</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Anuler</button>
        </div>
      </form>
    </div>
  </div>
  