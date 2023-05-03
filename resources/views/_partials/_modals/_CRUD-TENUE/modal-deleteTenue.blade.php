<!-- Enable OTP Modal -->
<div class="modal fade" id="tenueDst{{$tenue->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-3">Suppression d'un tenue</h3>
          </div>

          <form id="enableOTPForm" class="row g-3" action="{{route('Tenue.destroy', encrypt($tenue->id))}}" method="POST">
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
          </form>

        </div>
      </div>
    </div>
  </div>
  <!--/ Enable OTP Modal -->

  {{-- <!-- Enable OTP Modal -->
<div class="modal fade" id="test" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-3">Affectation d'une tenue</h3>
        </div>


    </div>
  </div>
</div>
</div> --}}




