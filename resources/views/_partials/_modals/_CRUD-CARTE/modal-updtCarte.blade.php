<!-- Enable OTP Modal -->
<div class="modal fade" id="carteUpdt{{$carte->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-5">Modification de la carte</h3>
          </div>
          <h6>Veuillez reverifier ces informations</h6>

          <form id="enableOTPForm" class="row g-3" action="{{route('Carte.update', encrypt($carte->id))}}" method="POST">
            @method('PUT')
            @csrf
    
            <div class="col-12">
                <label class="form-label" for="modalEnableOTPPhone">Numero Delivrance</label>
                <div class="input-group input-group-merge">
                  <input required type="text" autocomplete="off" maxlength="10" name="n_delivrance" class="form-control phone-mask" placeholder="Numero delivrance" value="{{$carte->n_delivrance}}"/>
                </div>
              </div>
      
              <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Lieu Arrd</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="lieu" class="form-control phone-mask" placeholder="Lieu du Arrnd" value="{{$carte->lieu}}"/>
                  </div>
                </div>
                
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Village_de</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="village_de" class="form-control phone-mask" placeholder="village_de" value="{{$carte->village_de}}" />
                  </div>
                </div>
      
                 <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Fraction_de</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="franction_de" class="form-control phone-mask" placeholder="fraction_de" value="{{$carte->franction_de}}" />
                  </div>
                </div>
      
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Nom</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="nom" class="form-control phone-mask" placeholder="nom" value="{{$carte->nom}}"/>
                  </div>
                </div>
      
                
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Prenom</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="prenom" class="form-control phone-mask" placeholder="Prenom" value="{{$carte->prenom}}" />
                  </div>
                </div>
      
                
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Nom du Pere</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="fils_de" class="form-control phone-mask" placeholder="Nom du pere" value="{{$carte->fils_de}}"/>
                  </div>
                </div>
      
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Nom de la mere</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="et_de" class="form-control phone-mask" placeholder="Nom de la mere" value="{{$carte->et_de}}" />
                  </div>
                </div>
                
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Date de Naissance</label>
                  <div class="input-group input-group-merge">
                    <input required type="Date" autocomplete="off" maxlength="10" name="ne_le" class="form-control phone-mask" placeholder="Date de Naissance" value="{{$carte->ne_le}}"/>
                  </div>
                </div>
      
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Lieu de Naissance</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="a" class="form-control phone-mask" placeholder="Lieu de Naissance" value="{{$carte->a}}"/>
                  </div>
                </div>
      
                
              {{--  <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Photo</label>
                  <div class="input-group input-group-merge">
                    <input type="file" autocomplete="off" maxlength="10" name="photo" class="form-control phone-mask" placeholder="Photo" />
                  </div>
                </div>--}}
      
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Profession</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="profession" class="form-control phone-mask" placeholder="Profession" value="{{$carte->profession}}"/>
                  </div>
                </div>
      
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Domicile</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="domicile" class="form-control phone-mask" placeholder="domicile" value="{{$carte->domicile}}"/>
                  </div>
                </div>
        
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Taille</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="taille" class="form-control phone-mask" placeholder="taille" value="{{$carte->taille}}"/>
                  </div>
                </div>
      
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Teint</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="teint" class="form-control phone-mask" placeholder="teint" value="{{$carte->teint}}"/>
                  </div>
                </div>
      
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Cheveux</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="cheveux" class="form-control phone-mask" placeholder="cheveux" value="{{$carte->cheveux}}"/>
                  </div>
                </div>
      
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Signes</label>
                  <div class="input-group input-group-merge">
                    <input required type="text" autocomplete="off" maxlength="10" name="signes" class="form-control phone-mask" placeholder="signes" value="{{$carte->signes}}"/>
                  </div>
                </div>
      
                <div class="col-12">
                  <label class="form-label" for="modalEnableOTPPhone">Carte numero</label>
                  <div class="input-group input-group-merge">
                    <input required type="number" autocomplete="off" maxlength="10" name="carte_n" class="form-control phone-mask" placeholder="carte_n" value="{{$carte->carte_n}}" />
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
