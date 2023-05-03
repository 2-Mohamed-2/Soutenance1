<!-- Enable OTP Modal -->
<div class="modal fade" id="avoirUpdt{{$avoir->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-5">Modification affectation</h3>
          </div>
          <h6>Veuillez reverifier ces informations</h6>

          <form id="enableOTPForm" class="row g-3" action="{{route('Avoir.update', encrypt($avoir->id))}}" method="POST">
            @method('PUT')
            @csrf

              <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Commissariat</label>
                  <div class="input-group input-group-merge">
                      <select class="form-control" value="{{$avoir->commissariat_id}}" name="commissariat_id">
                          <option value="">{{$avoir->commissariat->libelle}}</option>
                          @foreach($comms as $comm)
                          <option value="{{ $comm->id }}">{{ $comm->libelle }}
                          </option>
                          @endforeach
                      </select>
                  </div>
                </div>

                {{-- <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">User</label>
                  <div class="input-group input-group-merge">
                      <select class="form-control" value="{{$avoir->user_id}}" name="user_id">
                          <option value="">{{$avoir->user->name}}</option>
                          @foreach($users as $user)
                          <option value="{{ $user->id }}">{{ $user->name }}
                          </option>
                          @endforeach
                      </select>
                  </div>
                </div> --}}

                <div class="col-12">
                    <label class="form-label" for="modalEnableOTPPhone">Armement</label>
                    <div class="input-group input-group-merge">
                        <select class="form-control" value="{{$avoir->armement_id}}" name="armement_id">
                            <option value="">{{$avoir->armement->modele}}</option>
                            @foreach($armements as $armement)
                            <option value="{{ $armement->id }}">{{ $armement->modele }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                  </div>

                  {{-- <div class="col-12">
                    <label class="form-label" for="modalEnableOTPPhone">Satut</label>
                    <div class="input-group input-group-merge">
                        <select class="form-control" value="{{$avoir->statut_id}}" name="statut_id">
                            <option value="">{{$avoir->statut->libelle}}</option>
                            @foreach($statuts as $statut)
                            <option value="{{ $statut->id }}">{{ $statut->libelle }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                  </div> --}}

                  <div class="col-12">
                    <label class="form-label" for="modalEnableOTPPhone">Date acquisition</label>
                    <div class="input-group input-group-merge">
                      <input required autocomplete="off" disabled type="Date" value="{{$avoir->date_acqui}}" name="date_acqui" class="form-control" placeholder="Acquisition " />
                    </div> <br>


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
