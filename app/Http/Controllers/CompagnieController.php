<?php

namespace App\Http\Controllers;

use App\Models\Compagnie;
use Illuminate\Http\Request;

class CompagnieController extends Controller
{
    public function AllCompagnies()
    {
       $compagnies = Compagnie::latest()->get();// Retrieve all remunerations from the database
        return view('backend.compagnies.all_compagnies', compact('compagnies'));//
    }

    public function AddCompagnie()
    {
        $compagnies = Compagnie::latest()->get();// Retrieve all remunerations from the database
        return view('backend.compagnies.add_compagnie', compact('compagnies'));
        
    }

    public function StoreCompagnie(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:100',
            'compagnie_desc' => 'string',
            
        // Add more validation rules for other fields
        ]);

        $compagnie = new Compagnie($validatedData);
        $compagnie->user_id = auth()->user()->id; // Associate the remuneration with the logged-in user
        $compagnie->save();

        return redirect('/all/compagnies')->with('success', 'Compagnie created successfully');
        
        
      
    }

    public function ShowCompagnie($id)
    {
        $compagnies = Compagnie::findOrFail($id);
        return view('backend.compagnies.show_compagnie', compact('compagnies'));
    }

    public function EditCompagnie($id)
    {
        $compagnies = Compagnie::findOrFail($id);
        return view('backend.compagnies.edit_compagnie', compact('compagnies'));
    }

   
    public function UpdateCompagnie(Request $request, Compagnie $compagnies)
    {
        
        $comp = $request->id;
        Compagnie::findOrFail($comp)->update([
            'nom' => $request->nom,
            'compagnie_desc' => $request->compagnie_desc,
            // Add more validation rules for other fields
        ]);
        $compagnies->user_id = auth()->user()->id;
        

        return redirect('/all/compagnies')->with('success', 'Compagnie updated successfully');
    }

    public function DeleteCompagnie(Compagnie $compagnie, $id)
    {
    
        Compagnie::findOrFail($id)->delete();
        return redirect('/all/compagnies')->with('success', 'Compagnie deleted successfully');
    }
}
