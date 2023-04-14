<!-- Enable OTP Modal -->
<div class="modal fade" id="armeUpdt{{$arme->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-5">Modification arme</h3>
          </div>
          <h6>Veuillez reverifier ces informations</h6>

          <form id="enableOTPForm" class="row g-3" action="{{route('Arme.update', encrypt($arme->id))}}" method="POST">
            @method('PUT')
            @csrf


        {{-- <div class="col-12">
            <label class="form-label" for="modalEnableOTPPhone">Commissariat</label>
            <div class="input-group input-group-merge">
                <select class="form-control" name="commissariats_id">
                    <option value="{{$arme->commissariat->id}}">{{$arme->commissariat->libelle}}</option>
                    @foreach($comms as $comm)
                    <option value="{{ $comm->id }}">{{ $comm->libelle }}
                    </option>
                    @endforeach
                </select>
            </div>
          </div> --}}

        <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Modele</label>
          <div class="input-group input-group-merge">
            <input required type="text" autocomplete="off" maxlength="10" value="{{$arme->modele}}" name="modele" class="form-control phone-mask" placeholder="Modele" />
          </div>
        </div>


      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">N° Serie</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" maxlength="10" value="{{$arme->n_serie}}" name="n_serie" class="form-control phone-mask" placeholder="Numero de serie" />
        </div>
      </div>

        {{-- <div class="col-12">
          <label class="form-label" for="modalEnableOTPPhone">Revision</label>
          <div class="input-group input-group-merge">
            <input required type="year" autocomplete="off" maxlength="10" value="{{$arme->revision}}" name="revision" class="form-control phone-mask" placeholder="Revision" />
          </div>
        </div> --}}


            <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Lieu Stockage</label>
                <div class="input-group input-group-merge">
                <input required type="year" autocomplete="off" maxlength="10" value="{{$arme->lieu}}" name="lieu" class="form-control phone-mask" placeholder="Lieu" />
                </div>
            </div> <br>


            <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Stock</label>
                <div class="input-group input-group-merge">
                <input required type="number" autocomplete="off" maxlength="10" value="{{$arme->stock}}" name="stock" class="form-control phone-mask" placeholder="Stock" />
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
