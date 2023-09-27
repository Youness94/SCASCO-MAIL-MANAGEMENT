<?php

namespace App\Http\Controllers;

use App\Models\ChargeCompteSinistres;
use Illuminate\Http\Request;

class ChargeCompteSinistresController extends Controller
{
    public function AllChargeCompteSinistres()
    {
       $charge_compte_sinistres_at_rd = ChargeCompteSinistres::latest()->get();
        return view('backend.charge_compte_sinistres.all_charge_compte_sinistres', compact('charge_compte_sinistres_at_rd'));//
    }

    public function AddChargeCompteSinistre()
    {
        $charge_compte_sinistres_at_rd = ChargeCompteSinistres::latest()->get();
        return view('backend.charge_compte_sinistres.add_charge_compte_sinistre', compact('charge_compte_sinistres_at_rd'));
        
    }

    public function StoreChargeCompteSinistre(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:100',
            
        // Add more validation rules for other fields
        ]);

        $charge_compte_sinistres_at_rd = new ChargeCompteSinistres($validatedData);
        $charge_compte_sinistres_at_rd->user_id = auth()->user()->id; // Associate the remuneration with the logged-in user
        $charge_compte_sinistres_at_rd->save();

        return redirect('/all/charge_compte_sinistres')->with('success', 'Branche created successfully');
        
        
      
    }

    public function ShowChargeCompteSinistre($id)
    {
        $charge_compte_sinistres_at_rd = ChargeCompteSinistres::findOrFail($id);
        return view('backend.charge_compte_sinistres.show_charge_compte_sinistre', compact('charge_compte_sinistres_at_rd'));
    }

    public function EditChargeCompteSinistre($id)
    {
        $charge_compte_sinistres_at_rd = ChargeCompteSinistres::findOrFail($id);
        return view('backend.charge_compte_sinistres.edit_charge_compte_sinistre', compact('charge_compte_sinistres_at_rd'));
    }

   
    public function UpdateChargeCompteSinistre(Request $request, ChargeCompteSinistres $charge_compte_sinistres_at_rd)
    {
    
        
        $bra_sin = $request->id;
        ChargeCompteSinistres::findOrFail($bra_sin)->update([
            'nom' => $request->nom,
            
            // Add more validation rules for other fields
        ]);
        $charge_compte_sinistres_at_rd->user_id = auth()->user()->id;
        

        return redirect('/all/charge_compte_sinistres')->with('success', 'Branche updated successfully');
    }

    public function DeleteChargeCompteSinistre(ChargeCompteSinistres $charge_compte_sinistres_at_rd, $id)
    {
    
        ChargeCompteSinistres::findOrFail($id)->delete();
        return redirect('/all/charge_compte_sinistres')->with('success', 'Charge Compte deleted successfully');
    }
}
