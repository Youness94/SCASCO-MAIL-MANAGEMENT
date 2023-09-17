<?php

namespace App\Http\Controllers;

use App\Models\Branche;
use Illuminate\Http\Request;

class BrancheController extends Controller
{
    public function AllBranches()
    {
       $branches = Branche::latest()->get();// Retrieve all remunerations from the database
        return view('backend.branches.all_branches', compact('branches'));//
    }

    public function AddBranche()
    {
        $branches = Branche::latest()->get();// Retrieve all remunerations from the database
        return view('backend.branches.add_branche', compact('branches'));
        
    }

    public function StoreBranche(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:100',
            'branche_desc' => 'string',
            
        // Add more validation rules for other fields
        ]);

        $branche = new Branche($validatedData);
        $branche->user_id = auth()->user()->id; // Associate the remuneration with the logged-in user
        $branche->save();

        return redirect('/all/branches')->with('success', 'Branche created successfully');
        
        
      
    }

    public function ShowBranche($id)
    {
        $branches = Branche::findOrFail($id);
        return view('backend.branches.show_branche', compact('branches'));
    }

    public function EditBranche($id)
    {
        $branches = Branche::findOrFail($id);
        return view('backend.branches.edit_branche', compact('branches'));
    }

   
    public function UpdateBranche(Request $request, Branche $branches)
    {
    
        
        $bra = $request->id;
        Branche::findOrFail($bra)->update([
            'nom' => $request->nom,
            'branche_desc' => $request->branche_desc,
            
            // Add more validation rules for other fields
        ]);
        $branches->user_id = auth()->user()->id;
        

        return redirect('/all/branches')->with('success', 'Branche updated successfully');
    }

    public function DeleteBranche(Branche $branche, $id)
    {
    
        Branche::findOrFail($id)->delete();
        return redirect('/all/branches')->with('success', 'Branche deleted successfully');
    }
}
