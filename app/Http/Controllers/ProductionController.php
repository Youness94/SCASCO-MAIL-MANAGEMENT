<?php

namespace App\Http\Controllers;

use App\Models\ActGestion;
use App\Models\Branche;
use App\Models\ChargeCompte;
use App\Models\Compagnie;
use App\Models\Production;
use Illuminate\Http\Request;

use Carbon\Carbon;

class ProductionController extends Controller
{

    public function AllProductions()

    {

        // $branches = Branche::all();
        // $compagnies = Compagnie::all();
        // $act_gestions = ActGestion::all();
        // $charge_comptes = ChargeCompte::all();

        $productions = Production::with('branches', 'compagnies', 'act_gestions', 'charge_comptes')->get();
        return view('backend.productions.all_productions', compact('productions'));
    }

    public function FilterProduction(Request $request)

    {
        $date_debut = $request->date_debut;
        $date_fin = $request->date_fin;

        // Start with a query builder
        $query = Production::query();

        // Check if date_debut is not empty
        if (!empty($date_debut)) {
            $query->whereDate('created_at', '>=', $date_debut);
        }

        // Check if date_fin is not empty
        if (!empty($date_fin)) {
            $query->whereDate('created_at', '<=', $date_fin);
        }

        // Fetch the filtered productions
        $productions = $query->get();


        return view('backend.productions.all_productions', compact('productions'));
    }


    public function AddProduction()
    {
        // Retrieve lists of related models for dropdowns
        $branches = Branche::all();
        $compagnies = Compagnie::all();
        $act_gestions = ActGestion::all();
        $charge_comptes = ChargeCompte::all();
        $productions = Production::latest()->get();

        return view('backend.productions.add_production', compact('branches', 'compagnies', 'act_gestions', 'charge_comptes'));
    }

    public function ShowProduction($id)
    {
        // Find the production record by ID along with its related data
        $production = Production::with(['branches', 'compagnies', 'act_gestions', 'act_gestions'])
            ->findOrFail($id);

        // Return the production details view with the related data
        return view('backend.productions.show_production', compact('production'));
    }


    public function StoreProduction(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'branche_id' => 'required|exists:branches,id',
            'compagnie_id' => 'required|exists:compagnies,id',
            'act_gestion_id' => 'required|exists:act_gestions,id',
            'charge_compte_id' => 'required|exists:charge_comptes,id',
            'nom_assure' => 'required|string',
            'nom_police' => 'required|string',
            'date_reception' => 'required|date',
            'date_remise' => 'required|date',
            'date_traitement' => 'required|date',
            'observation' => 'nullable|string',
        ]);

        // Calculate the delai_traitement while excluding weekends
        $delaiTraitement = $this->calculateDelaiTraitement(
            $validatedData['date_remise'],
            $validatedData['date_traitement']
        );


        $production = new Production($validatedData);

        $production->branche_id = $validatedData['branche_id'];
        $production->compagnie_id = $validatedData['compagnie_id'];
        $production->act_gestion_id = $validatedData['act_gestion_id'];
        $production->charge_compte_id = $validatedData['charge_compte_id'];


        // Create a new Production instance
        $production = new Production([
            'branche_id' => $request->branche_id,
            'compagnie_id' => $request->compagnie_id,
            'act_gestion_id' => $request->act_gestion_id,
            'charge_compte_id' => $request->charge_compte_id,
            'nom_assure' => $request->nom_assure,
            'nom_police' => $request->nom_police,
            'date_reception' => $request->date_reception,
            'date_remise' => $request->date_remise,
            'date_traitement' => $request->date_traitement,
            'observation' => $request->observation,
            'delai_traitement' => $delaiTraitement,
        ]);

        $production->user_id = auth()->user()->id;

        // Save the Production record
        $production->save();

        // Redirect to the index page or another appropriate page
        return redirect('/all/productions')->with('success', 'Production record created successfully');
    }


    private function calculateDelaiTraitement($dateRemise, $dateTraitement)
    {
        $start = Carbon::parse($dateRemise);
        $end = Carbon::parse($dateTraitement);

        // Calculate the total days excluding weekends
        $totalDays = $start->diffInDaysFiltered(function (Carbon $date) {
            return !$date->isWeekend(); // Exclude weekends
        }, $end);

        return $totalDays;
    }


    public function EditProduction($id)
    {
        // Find the production record by ID along with its related data
        $production = Production::with(['branches', 'compagnies', 'act_gestions', 'charge_comptes'])->findOrFail($id);;

        // Retrieve lists of related models for dropdowns
        $branches = Branche::all();
        $compagnies = Compagnie::all();
        $act_gestions = ActGestion::all();
        $charge_comptes = ChargeCompte::all();

        // Return the edit production view with the related data

        return view('backend.productions.edit_production', compact('production', 'branches', 'compagnies', 'act_gestions', 'charge_comptes'));
    }

    
    public function UpdateProduction(Request $request,Production $productions, $id)
{
    // Find the production record by ID
    $production = Production::findOrFail($id);

    $validatedData = $request->validate([
        'branche_id' => 'required|exists:branches,id',
        'compagnie_id' => 'required|exists:compagnies,id',
        'act_gestion_id' => 'required|exists:act_gestions,id',
        'charge_compte_id' => 'required|exists:charge_comptes,id',
        'nom_assure' => 'required|string',
        'nom_police' => 'required|string',
        'date_reception' => 'required|date',
        'date_remise' => 'required|date',
        'date_traitement' => 'required|date',
        'observation' => 'nullable|string',
    ]);


    // Calculate the delai_traitement while excluding weekends
    $delaiTraitement = $this->calculateDelaiTraitement(
        $validatedData['date_remise'],
        $validatedData['date_traitement']
    );

    // Update the production record 
    $production->update([
        'branche_id' => $validatedData['branche_id'],
        'compagnie_id' => $validatedData['compagnie_id'],
        'act_gestion_id' => $validatedData['act_gestion_id'],
        'charge_compte_id' => $validatedData['charge_compte_id'],
        'nom_assure' => $validatedData['nom_assure'],
        'nom_police' => $validatedData['nom_police'],
        'date_reception' => $validatedData['date_reception'],
        'date_remise' => $validatedData['date_remise'],
        'date_traitement' => $validatedData['date_traitement'],
        'observation' => $validatedData['observation'],
        'delai_traitement' => $delaiTraitement, // Update delai_traitement
    ]);

    $production->user_id = auth()->user()->id;
    return redirect('/all/productions')->with('success', 'Production updated successfully');
}

    public function DeleteProduction(Production $production, $id)
    {

        Production::findOrFail($id)->delete();
        return redirect('/all/productions')->with('success', 'Production deleted successfully');
    }
}