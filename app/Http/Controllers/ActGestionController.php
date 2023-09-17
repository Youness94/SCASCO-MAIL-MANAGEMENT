<?php

namespace App\Http\Controllers;

use App\Models\ActGestion;
use Illuminate\Http\Request;

class ActGestionController extends Controller
{
    public function AllActGestions()
    {
       $act_gestions = ActGestion::latest()->get();// Retrieve all remunerations from the database
        return view('backend.act_gestions.all_act_gestions', compact('act_gestions'));//
    }

    public function AddActGestion()
    {
        $act_gestions = ActGestion::latest()->get();// Retrieve all remunerations from the database
        return view('backend.act_gestions.add_act_gestion', compact('act_gestions'));
        
    }

    public function StoreActGestion(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:100',
            'act_gestion_desc' => 'string',
            
        // Add more validation rules for other fields
        ]);

        $act_gestion = new ActGestion($validatedData);
        $act_gestion->user_id = auth()->user()->id; // Associate the remuneration with the logged-in user
        $act_gestion->save();

        return redirect('/all/act_gestions')->with('success', 'Branche created successfully');
        
        
      
    }

    public function ShowActGestion($id)
    {
        $act_gestions = ActGestion::findOrFail($id);
        return view('backend.branches.show_act_gestion', compact('act_gestions'));
    }

    public function EditActGestion($id)
    {
        $act_gestions = ActGestion::findOrFail($id);
        return view('backend.act_gestions.edit_act_gestion', compact('act_gestions'));
    }

   
    public function UpdateActGestion(Request $request, ActGestion $act_gestions)
    {
    
        
        $act_gest = $request->id;
        ActGestion::findOrFail($act_gest)->update([
            'nom' => $request->nom,
            'act_gestion_desc' => $request->act_gestion_desc,
            
            // Add more validation rules for other fields
        ]);
        $act_gestions->user_id = auth()->user()->id;
        

        return redirect('/all/act_gestions')->with('success', 'Branche updated successfully');
    }

    public function DeleteActGestion(ActGestion $act_gestion, $id)
    {
    
        ActGestion::findOrFail($id)->delete();
        return redirect('/all/act_gestions')->with('success', 'Branche deleted successfully');
    }
}
