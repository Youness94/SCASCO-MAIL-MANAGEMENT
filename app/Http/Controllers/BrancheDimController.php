<?php

namespace App\Http\Controllers;

use App\Models\BrancheDim;
use Illuminate\Http\Request;

class BrancheDimController extends Controller
{
    public function AllBranchesSinistresDim()
    {
       $branches_dim = BrancheDim::latest()->get();
        return view('backend.branches_dim.all_branches_sinistres_dim', compact('branches_dim'));//
    }

    public function AddBranchesSinistresDim()
    {
        $branches_dim = BrancheDim::latest()->get();
        return view('backend.branches_dim.add_branche_sinistre_dim', compact('branches_dim'));
        
    }

    public function StoreBranchesSinistresDim(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:100',
            
        // Add more validation rules for other fields
        ]);

        $branches_dim = new BrancheDim($validatedData);
        $branches_dim->user_id = auth()->user()->id; // Associate the remuneration with the logged-in user
        $branches_dim->save();

        return redirect('/all/branches-sinistre-dim')->with('success', 'Branche Dim created successfully');
        
        
      
    }

    public function ShowBranchesSinistresDim($id)
    {
        $branches_dim = BrancheDim::findOrFail($id);
        return view('backend.branches_dim.show_branche_sinistre_dim', compact('branches_dim'));
    }

    public function EditBranchesSinistresDim($id)
    {
        $branches_dim = BrancheDim::findOrFail($id);
        return view('backend.branches_dim.edit_branche_sinistre_dim', compact('branches_dim'));
    }

   
    public function UpdateBranchesSinistresDim(Request $request, BrancheDim $branches_dim)
    {
    
        
        $bra_dim = $request->id;
        BrancheDim::findOrFail($bra_dim)->update([
            'nom' => $request->nom,
            
            // Add more validation rules for other fields
        ]);
        $branches_dim->user_id = auth()->user()->id;
        

        return redirect('/all/branches-sinistre-dim')->with('success', 'Branche updated successfully');
    }

    public function DeleteBranchesSinistresDim(BrancheDim $branches_dim, $id)
    {
        BrancheDim::findOrFail($id)->delete();
        return redirect('/all/branche.sinistre.dim')->with('success', 'Branche deleted successfully');
    }
}
