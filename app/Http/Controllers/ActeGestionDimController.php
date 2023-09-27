<?php

namespace App\Http\Controllers;

use App\Models\ActeGestionDim;
use Illuminate\Http\Request;

class ActeGestionDimController extends Controller
{
    public function AllActeDeGestionSinistresDim()
    {
       $acte_gestions_dim = ActeGestionDim::latest()->get();
        return view('backend.acte_gestions_dim.all_acte_de_gestion_sinistres_dim', compact('acte_gestions_dim'));//
    }

    public function AddActeDeGestionSinistreDim()
    {
        $acte_gestions_dim = ActeGestionDim::latest()->get();
        return view('backend.acte_gestions_dim.add_acte_de_gestion_sinistre_dim', compact('acte_gestions_dim'));
        
    }

    public function StoreActeDeGestionSinistreDim(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:100',
            
        // Add more validation rules for other fields
        ]);

        $acte_gestions_dim = new ActeGestionDim($validatedData);
        $acte_gestions_dim->user_id = auth()->user()->id; // Associate the remuneration with the logged-in user
        $acte_gestions_dim->save();

        return redirect('/all/acte-gestion-sinistres-dim')->with('success', 'Acte de gestion Sinistres created successfully');
        
        
      
    }

    public function ShowActeDeGestionSinistreDim($id)
    {
        $acte_gestions_dim = ActeGestionDim::findOrFail($id);
        return view('backend.acte_de_gestion_sinistres.show_acte_de_gestion_sinistre_dim', compact('acte_gestions_dim'));
    }

    public function EditActeDeGestionSinistreDim($id)
    {
        $acte_gestions_dim = ActeGestionDim::findOrFail($id);
        return view('backend.acte_gestions_dim.edit_acte_de_gestion_sinistre_dim', compact('acte_gestions_dim'));
    }

   
    public function UpdateActeDeGestionSinistreDim(Request $request, ActeGestionDim $acte_gestions_dim)
    {
    
        
        $act_sin = $request->id;
        ActeGestionDim::findOrFail($act_sin)->update([
            'nom' => $request->nom,
            
            
            // Add more validation rules for other fields
        ]);
        $acte_gestions_dim->user_id = auth()->user()->id;
        

        return redirect('/all/acte-gestion-sinistres-dim')->with('success', 'Acte de gestion Sinistres updated successfully');
    }

    public function DeleteActeDeGestionSinistreDim(ActeGestionDim $acte_gestions_dim, $id)
    {
    
        ActeGestionDim::findOrFail($id)->delete();
        return redirect('/all/acte-gestion-sinistres-dim')->with('success', 'Acte de gestion Sinistres deleted successfully');
    }
}
