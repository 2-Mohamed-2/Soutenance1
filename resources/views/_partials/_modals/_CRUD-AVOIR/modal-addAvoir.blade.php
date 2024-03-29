<!-- End Offcanvas -->
<div class="modal fade" id="addAvoir{{ $arme->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalScrollableTitle">Affectation des armes {{ $arme->modele }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          <form action="{{ route('affectearme', encrypt($arme->id)) }}" method="post">
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

           {{-- <div class="col-12 mb-4">
            <select class="form-control" name="armement_id">
              @foreach($armements as $arme)
              <option value="">{{ $arme->modele }}</option>
              <option value="{{ $arme->id }}">{{ $arme->modele }}
              </option>
              @endforeach
            </select>
          </div> --}}

          {{-- <div class="col-12">
            <h4></h4>
            <!-- Affectation -->
            <div class="table-responsive">
              <table class="table table-flush-spacing">
                <tbody>
                  <tr>
                    <td class="text-nowrap fw-semibold">Affecter une Arme <i class="bx bx-info-circle bx-xs"
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
                  @forelse ($armements as $armement)
                  <tr>
                    <td class="text-nowrap fw-semibold">
                      {{$armement->modele}}</td>
                    <td>
                    <td>
                      <div class="d-inline-flex">
                        <div class="form-check me-3 me-lg-3">
                          <input class="form-check-input selectMultiple" multiple name="armement_id[]" value="{{ $armement->id }}" type="checkbox" />
                        </div>
                      </div>
                    </td>
                  </tr>
                  @empty

                  @endforelse

                </tbody>
              </table>
            </div>
            <!-- Affectation -->
          </div> --}}
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
      </div>

      </form>
     </div>
  </div>
</div>


