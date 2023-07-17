<!-- Enable OTP Modal -->
<div class="modal fade" id="muniaff{{$muni->id}}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-3">Affectation du munition {{ $muni->type }} {{ $muni->libelle }}</h3>
        </div>

        <form action="{{ route('affectemuni', encrypt($muni->id)) }}" method="POST">
          @csrf

          <div class="col-12 mb-4">
            <select class="form-control" name="commissariat_id">
              <option value=""> -- Choisissez un Commissariat -- </option>
              @foreach($comms as $comm)
              <option value="{{ $comm->id }}">{{ $comm->libelle }}
              </option>
              @endforeach
            </select>
          </div>

          {{-- <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Quantite</label>
            <div class="input-group input-group-merge">
              <input required type="number" autocomplete="off" name="quantite"
                class="form-control phone-mask" placeholder="quantite" />
            </div>
          </div> --}}

          {{-- <div class="col-12">
            <h4></h4>
            <!-- Affectation -->
            <div class="table-responsive">
              <table class="table table-flush-spacing">
                <tbody>
                  <tr>
                    <td class="text-nowrap fw-semibold">Affecter une munition <i class="bx bx-info-circle bx-xs"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Acces total sur la plateforme"></i></td>
                    <td>
                      <div class="form-Multiple check ">
                        <input class="form-check-input" multiple name="" type="checkbox" id="selectAll" />
                        <label class="form-check-label" for="selectAll">
                          Tout selectionné
                        </label>
                      </div>
                    </td>
                  </tr>
                  @forelse ($munition as $munition)
                  <tr>
                    <td class="text-nowrap fw-semibold">
                      {{$munition->type}}</td>
                    <td>
                    <td>
                      <div class="d-inline-flex">
                        <div class="form-check me-3 me-lg-3">
                          <input class="form-check-input selectMultiple" multiple name="munition_id[]"
                            value="{{ $munition->id }}" type="checkbox" />
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
</div>
