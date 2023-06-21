<!-- End Offcanvas -->
@if($vehi->id)
  <div class="modal fade" id="addVoit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalScrollableTitle">Affectation {{ $vehi->type }} {{ $vehi->modele }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form action="{{route('voit',$vehi->id)}}" method="post">
            @csrf

            <div class="col-12 mb-4">
              <select class="form-control" name="commissariat_id">
                <option value=""> -- Choisissez un Commissariat --</option>
                @foreach($comms as $comm)
                <option value="{{ $comm->id }}">{{ $comm->libelle }}
                </option>
                @endforeach
              </select>
            </div>

            <div class="col-12">
              <label class="form-label" for="modalEnableOTPPhone">Quantite</label>
              <div class="input-group input-group-merge">
                <input required type="text" autocomplete="off" name="quantite" class="form-control phone-mask"
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
@endif



