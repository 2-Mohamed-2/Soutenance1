{{-- <!-- End Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addTenueaff" aria-labelledby="offcanvasEndLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">Insertion d'une nouvelle residence</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
    <form action="{{ route('tenueaff.store') }}" method="post" enctype="multipart/form-data">
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

          <div class="col-12">
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
                  @forelse ($tenues as $tenue)
                  <tr>
                    <td class="text-nowrap fw-semibold">
                      {{$tenue->type}}</td>
                    <td>
                    <td>
                      <div class="d-inline-flex">
                        <div class="form-check me-3 me-lg-3">
                          <input class="form-check-input selectMultiple" multiple name="tenue_id[]" value="{{ $tenue->id }}" type="checkbox" />
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
</div> --}}

<!-- Enable OTP Modal -->
<div class="modal fade" id="test" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-3">Suppression d'un tenue</h3>
        </div>

        {{-- <form id="enableOTPForm" class="row g-3" action="{{route('Tenue.destroy', encrypt($tenue->id))}}" method="POST">
          @method('delete')
          @csrf

          <div class="col-12">
            <div class="text-wrap">
              Etes-vous sûr de vouloir supprimer definitivement tenue : {{$tenue->type}} ?
            </div>
          </div>
          <br>

          <div class="col-12 text-end">
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Non</button>
            <button type="submit" class="btn btn-danger me-sm-3 me-1">Oui</button>
          </div>
        </form> --}}

      </div>
    </div>
  </div>
</div>
<!--/ Enable OTP Modal -->




