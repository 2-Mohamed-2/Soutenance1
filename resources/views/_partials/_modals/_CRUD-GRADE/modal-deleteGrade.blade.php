<!-- Enable OTP Modal -->
<div class="modal fade" id="gradeDst{{$grade->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-3">Suppression de Grade</h3>
          </div>

          <form id="enableOTPForm" class="row g-3" action="{{route('Grade.destroy', encrypt($grade->id))}}" method="POST">
            @method('delete')
            @csrf

            <div class="col-12">
              <div class="text-wrap">
                Etes-vous sûr de vouloir supprimer definitivement grade : {{$grade->libelle}} ?
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
