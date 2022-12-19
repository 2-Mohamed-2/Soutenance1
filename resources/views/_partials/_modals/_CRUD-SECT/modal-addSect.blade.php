<!-- End Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addSect" aria-labelledby="offcanvasEndLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">Insertion d'une nouvelle section</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
    <form id="enableOTPForm" class="row g-3" action="{{route('Sect.store')}}" method="POST">
      @csrf


      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Commissariat</label>
        <div class="input-group input-group-merge">
         <select  class="form-control" name="commissariat_id">
          <option value="">-- Commissariat --</option>
          @foreach ($coms as $com)
          <option value="{{$com->id}}">{{$com->libelle}}</option>
              
          @endforeach
         </select>
        </div>
      </div>
     
      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">libelle</label>
        <div class="input-group input-group-merge">
          <input required autocomplete="off" type="text" name="libelle" class="form-control" placeholder="Libelle " />
        </div>
    
      </div>
      <div class="col-12">
        <label class="form-label" for="modalEnableOTPPhone">Sigle</label>
        <div class="input-group input-group-merge">
          <input required type="text" autocomplete="off" maxlength="10" name="sigle" class="form-control phone-mask" placeholder="sigle " />
        </div>
      </div><br>
    
    <div class="col-12">
      <label class="form-label" for="modalEnableOTPPhone">Fonction</label>
      <div class="input-group input-group-merge">
        <input required type="text" autocomplete="off" maxlength="10" name="fonction" class="form-control phone-mask" placeholder="Fonction " />
      </div>
    </div>



      <div class="col-12">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Anuler</button>
      </div>
    </form>
  </div>
</div>



























 