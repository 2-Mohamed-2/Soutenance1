<?php

namespace App\Http\Controllers\CRUDS;

use App\Models\Carte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarteController extends Controller
{
    public function CarteView(){
       
       
    }

    public function index(){
        //
        $cartes = Carte::latest()->get();

        return view('content.CRUD.carte-crud', compact('cartes'));
    }


    public function store(Request $request)
    {
        // dd($this->validate);
       
        $this->validate($request,[
            
            'n_delivrance' => 'required|max:255',
            'lieu' => 'required|max:255',
            'village_de' => 'required|max:255',
            'franction_de' => 'required|max:255',
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'fils_de' => 'required|max:255',
            'et_de' =>'required|max:255',
            'ne_le' =>'required|max:255',
            'a' =>'required|max:255',
           /* 'photo' => 'image|mimes:jpg,png,jpeg,png',*/
             'profession' => 'required|max:255',
            'domicile' => 'required|max:255',
            'taille' => 'required|max:255',
            'teint' => 'required|max:255',
            'cheveux' => 'required|max:255',
            'signes' => 'required|max:255',
            'carte_n' => 'required|max:255', 
        ]);
       //  dd($request);
       // $photo = $request->file('photo');
      //  $destination = 'assets/images/';
      //  $profilImage = date('YmdHis').".".$photo->getClientOriginalExtension();
     //   $photo->move($destination, $profilImage);

      //  $request->photo = $profilImage;

        $carte = Carte::create([
            'n_delivrance' => $request->n_delivrance,
            'lieu' => $request->lieu,
            'village_de' => $request->village_de,
           'franction_de' => $request->franction_de,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'fils_de' => $request->fils_de,
            'et_de' => $request->et_de,
             'ne_le' => $request->ne_le,
            'a' => $request->a,
           /*  'photo' => $profilImage,*/
            'profession' => $request->profession,
            'domicile' => $request->domicile,
            'taille' => $request->taille,
            'teint' => $request->teint,
            'cheveux' => $request->cheveux,
            'signes' => $request->signes,
            'carte_n' => $request->carte_n, 
        ]);

        if ($carte) {
            toastr()->success('L\'enregistrement a bien été effectué !', 'Réussite');
            return redirect('/Carte');
        } else {
            toastr()->error('L\'enregistrement n\'a pas bien été effectué !', 'Erreur');
            return redirect('/Carte');
        }

    }

    public function update(Request $request, $id) {

        $id = decrypt($id);
        $validateData = $this->validate($request, [
            'n_delivrance' => 'required|max:255',
            'lieu' => 'required|max:255',
            'village_de' => 'required|max:255',
            'franction_de' => 'required|max:255',
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'fils_de' => 'required|max:255',
            'et_de' =>'required|max:255',
            'ne_le' =>'required|max:255',
            'a' =>'required|max:255',
            /* 'photo' => 'image|mimes:jpg,png,jpeg,png',*/
            'profession' => 'required|max:255',
            'domicile' => 'required|max:255',
            'taille' => 'required|max:255',
            'teint' => 'required|max:255',
            'cheveux' => 'required|max:255',
            'signes' => 'required|max:255',
            'carte_n' => 'required|max:255',
        ]);

        $carte = Carte::whereId($id)->update($validateData);
        if ($carte) {
            toastr()->success('La carte a bien été modifié !', 'Réussite');
            return redirect('/Carte');
        } else {
            toastr()->error('Modification non effectuée !', 'Erreur');
            return redirect('/Carte');
        }
    }

    public function destroy($id){
        $id = decrypt($id);

        $carte = Carte::findOrFail($id);
        $carte->delete();
        toastr()->success('La carte a bien été supprimé !', 'Réussite');
        return redirect('/Carte');

    }

 
}
