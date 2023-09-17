<?php

namespace App\Http\Controllers;

use App\Models\ChargeCompte;
use Illuminate\Http\Request;

class ChargeCompteController extends Controller
{
    public function AllChargeComptes()
    {
       $charge_comptes = ChargeCompte::latest()->get();// Retrieve all remunerations from the database
        return view('backend.charge_comptes.all_charge_comptes', compact('charge_comptes'));//
    }

    public function AddChargeCompte()
    {
        $charge_comptes = ChargeCompte::latest()->get();// Retrieve all remunerations from the database
        return view('backend.charge_comptes.add_charge_compte', compact('charge_comptes'));
        
    }

    public function StoreChargeCompte(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:100',
            'charge_compte_desc' => 'string',
            
        // Add more validation rules for other fields
        ]);

        $charge_compte = new ChargeCompte($validatedData);
        $charge_compte->user_id = auth()->user()->id; // Associate the remuneration with the logged-in user
        $charge_compte->save();

        return redirect('/all/charge_comptes')->with('success', 'Branche created successfully');
        
        
      
    }

    public function ShowChargeCompte($id)
    {
        $charge_comptes = ChargeCompte::findOrFail($id);
        return view('backend.charge_comptes.show_charge_compte', compact('charge_comptes'));
    }

    public function EditChargeCompte($id)
    {
        $charge_comptes = ChargeCompte::findOrFail($id);
        return view('backend.charge_comptes.edit_charge_compte', compact('charge_comptes'));
    }

   
    public function UpdateChargeCompte(Request $request, ChargeCompte $charge_comptes)
    {
    
        
        $cha_cpt = $request->id;
        ChargeCompte::findOrFail($cha_cpt)->update([
            'nom' => $request->nom,
            'charge_compte_desc' => $request->charge_compte_desc,
            
            // Add more validation rules for other fields
        ]);
        $charge_comptes->user_id = auth()->user()->id;
        

        return redirect('/all/charge_comptes')->with('success', 'Branche updated successfully');
    }

    public function DeleteChargeCompte(ChargeCompte $act_gestion, $id)
    {
    
        ChargeCompte::findOrFail($id)->delete();
        return redirect('/all/charge_comptes')->with('success', 'Branche deleted successfully');
    }
}
