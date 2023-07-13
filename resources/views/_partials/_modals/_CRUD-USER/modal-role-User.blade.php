<div class="modal fade" id="userRole{{$user->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modalScrollableTitle">Le role de : {{ $user->name }}</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>       
  
        <div class="modal-body">
            <div class="col-12 row mb-4">
                @php
                    $rols = Illuminate\Support\Facades\DB::table('model_has_roles')->where('model_id', $user->id)->get();
                    
                @endphp

                @forelse ($rols as $rol)

                    @php
                        $rm = Spatie\Permission\Models\Role::find($rol->role_id);

                    @endphp
                    <div class="col-6 mb-2">
                        <input type="text" value="{{ $rm->name }}" readonly class="form-control" tabindex="-1" />
                    </div>
                @empty

                <div class="col-6 mb-2">
                    <span>Pas de role pour le moment.</span>
                </div>

                @endforelse
                
                
            </div> 

             
          <form action="{{route('roles-user')}}" method="post">
            @csrf  
            <input type="hidden" name="model_id" value="{{ $user->id }}">
            <div class="col-12">
              <h4>Modifier son role</h4><br>
              <!-- role table -->
              
              <div class="col-12 row mb-4">
                @foreach($roles as $role)
                <div class="col-6 mb-2">
                    
                    <label class="fs-4">{{ Form::radio('role_id[]', $role->id, false, array('class' => 'name')) }}                    
                        {{ $role->name }}  </label>  

                </div>           
                @endforeach
              </div>
                
                         
              <!-- role table -->
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
  