<!-- End Offcanvas -->
<div class="modal fade" id="addVoit{{ $vehi->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalScrollableTitle">Affectation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          <form action="{{route('voitaffecte.store')}}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="col-12 mb-4">
           <select class="form-control" name="commissariat_id">
                    <option value=""> --  --</option>
                    @foreach($comms as $comm)
                    <option value="{{ $comm->id }}">{{ $comm->libelle }}
                    </option>
                    @endforeach
           </select>
          </div>

          <div class="col-12 mb-4">
            <select class="form-control" name="vehicule_id">
              <option value=""> -- --</option>
              @foreach($vehicules as $vehicule)
              <option value="{{ $vehicule->id }}">{{ $vehicule->type }}
              </option>
              @endforeach
            </select>
          </div>

          <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Quantite</label>
            <div class="input-group input-group-merge">
              <input required type="text" autocomplete="off" name="quantite" class="form-control phone-mask" placeholder="Quantite" />
            </div>
          </div>

          {{-- <div class="col-12">
            <h4></h4>
            <!-- Permission table -->
            <div class="table-responsive">
              <table class="table table-flush-spacing">
                <tbody>
                  <tr>
                    <td class="text-nowrap fw-semibold">Affecter Vehicule <i class="bx bx-info-circle bx-xs"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Acces total sur la plateforme"></i></td>
                    <td>
                      <div class="form-Multiple check ">
                        <input class="form-check-input" name="" type="checkbox" id="selectAll" />
                        <label class="form-check-label" for="selectAll">
                          Tout selectionné
                        </label>
                      </div>
                    </td>
                  </tr>
                  @forelse ($vehicules as $vehi)
                  <tr>
                    <td class="text-nowrap fw-semibold">
                      {{$vehi->modele}}</td>
                    <td>
                    <td>
                      <div class="d-inline-flex">
                        <div class="form-check me-3 me-lg-3">
                          <input class="form-check-input selectMultiple" multiple name="vehicule_id[]" value="{{$vehi->id}}" type="checkbox" />
                        </div>
                      </div>
                    </td>
                  </tr>
                  @empty
                   {{-- Pas de permission enregistrée pour le moment, <a href="{{route('app-access-permission')}}">ici</a> --}}
                  {{-- @endforelse --}}

                {{-- </tbody>
              </table>
            </div> --}}
            <!-- Permission table -->
          {{-- </div> --}}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
      </div>

      </form>
     </div>
  </div>
</div>


