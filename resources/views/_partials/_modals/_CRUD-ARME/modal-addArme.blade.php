<!-- End Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addArme" aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasEndLabel" class="offcanvas-title">Insertion d'une nouvelle Arme</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form id="enableOTPForm" class="row g-3" action="{{route('Arme.store')}}" method="POST">
        @csrf


        <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Modele</label>
          <div class="input-group input-group-merge">
            <input required type="text" autocomplete="off" minlength="4"  name="modele" class="form-control phone-mask" placeholder="Modele" />
          </div>
        </div>


      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">N° Serie</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" minlength="4"  name="n_serie" class="form-control phone-mask" placeholder="Numero de serie" />
        </div>
      </div>

      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Quantite</label>
        <div class="input-group input-group-merge">
          <input required type="number" autocomplete="off" maxlength="10" name="stock" class="form-control phone-mask" placeholder="Stock" />
        </div>
      </div>


      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Lieu Stockage</label>
        <div class="input-group input-group-merge">
          <select class="form-control" name="lieu_stock_id">
            <option value=""> -- Choisissez un lieu de stockage --</option>
            @foreach($lieustock as $lieustock)
            <option value="{{ $lieustock->id }}">{{ $lieustock->entrepot }}
            </option>
            @endforeach
          </select>
        </div>
      </div><br>

        <div class="col-12">
          <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Anuler</button>
        </div>
      </form>
    </div>
  </div>
