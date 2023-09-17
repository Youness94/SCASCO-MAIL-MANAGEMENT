@extends('admin.admin_dashboard')
@section('admin')


    

      <div class="page-content">

      <nav class="page-breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('add.production')}}" class="btn btn-inverse-secondary">Ajouetr Production</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Cients Table</li> -->
                  </ol>
            </nav>

<div class="row">
 <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <form method="GET" action="/filter">
                    <div class="row pb-3">
                    <div class="col-md-5 pt-4">
                      <h6 class="card-title">Les Productions</h6>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Start:</label>
                        <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" type="date" name="date_debut"/>
                    </div>
                    <div class="col-md-2">
											<label class="form-label">End:</label>
											<input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" type="date" name="date_fin"/>
										</div>
                    

                    <div class="col-md-1 pt-4">
                      <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                  </div>
          </form>
    <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
    <div class="table-responsive">
                  <table id="dataTableExample" class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Date de Réception</th>
                        <th>Num de police</th>
                        <th>Nom Assuré</th>
                        <th>Branche</th>
                        <th>Compagnie</th>
                        <th>Acte de gestion</th>
                        <th>Chargé de compte</th>
                        <th>Date de traitement</th>
                        <th>Date de remise</th>
                        <th>Délai de traitement</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Cree par</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($productions as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item -> date_reception}}</td>
                        <td>{{$item -> nom_police}}</td>
                        <td>{{$item -> nom_assure}}</td>
                        <td>{{$item -> branches-> nom}}</td>
                        <td>{{$item -> compagnies-> nom}}</td>
                        <td>{{$item -> act_gestions -> nom}}</td>
                        <td>{{$item -> charge_comptes->nom}}</td>
                        <td>{{$item -> date_traitement}}</td>
                        <td>{{$item -> date_remise}}</td>
                        <td>{{$item -> delai_traitement}}</td>
                        
                        <td>
                        <a href="{{route('edit.production',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                        </td>
                        <td>
                        <a href="{{route('delete.production',$item->id)}}"" class="btn btn-inverse-danger">Delete</a>
                        </td>
                        <td>{{$item -> user->name}}</td>
                    </tr>
                    @endforeach 
                     
                    </tbody>
                  </table>
                </div>
  </div>
</div>
</div>
</div>


<!--  -->


@endsection