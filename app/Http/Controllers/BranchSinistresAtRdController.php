<?php

namespace App\Http\Controllers;

use App\Models\BranchSinistresAtRd;
use Illuminate\Http\Request;

class BranchSinistresAtRdController extends Controller
{
    public function AllBranchesSinistresAtRd()
    {
       $branches_sinistres_at_rd = BranchSinistresAtRd::latest()->get();
        return view('backend.branches_sinistres.all_branches_sinistres', compact('branches_sinistres_at_rd'));//
    }

    public function AddBrancheSinistresAtRd()
    {
        $branches_sinistres_at_rd = BranchSinistresAtRd::latest()->get();
        return view('backend.branches_sinistres.add_branche_sinistre', compact('branches_sinistres_at_rd'));
        
    }

    public function StoreBrancheSinistresAtRd(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:100',
            
        // Add more validation rules for other fields
        ]);

        $branches_sinistres_at_rd = new BranchSinistresAtRd($validatedData);
        $branches_sinistres_at_rd->user_id = auth()->user()->id; // Associate the remuneration with the logged-in user
        $branches_sinistres_at_rd->save();

        return redirect('/all/branches_sinistres')->with('success', 'Branche created successfully');
        
        
      
    }

    public function ShowBrancheSinistresAtRd($id)
    {
        $branches_sinistres_at_rd = BranchSinistresAtRd::findOrFail($id);
        return view('backend.branches_sinistres.show_branche_sinistre', compact('branches_sinistres_at_rd'));
    }

    public function EditBrancheSinistresAtRd($id)
    {
        $branches_sinistres_at_rd = BranchSinistresAtRd::findOrFail($id);
        return view('backend.branches_sinistres.edit_branche_sinistre', compact('branches_sinistres_at_rd'));
    }

   
    public function UpdateBrancheSinistresAtRd(Request $request, BranchSinistresAtRd $branches_sinistres_at_rd)
    {
    
        
        $bra_sin = $request->id;
        BranchSinistresAtRd::findOrFail($bra_sin)->update([
            'nom' => $request->nom,
            
            // Add more validation rules for other fields
        ]);
        $branches_sinistres_at_rd->user_id = auth()->user()->id;
        

        return redirect('/all/branches_sinistres')->with('success', 'Branche updated successfully');
    }

    public function DeleteBrancheSinistresAtRd(BranchSinistresAtRd $branches_sinistres_at_rd, $id)
    {
    
        BranchSinistresAtRd::findOrFail($id)->delete();
        return redirect('/all/branches_sinistres')->with('success', 'Branche deleted successfully');
    }
}
