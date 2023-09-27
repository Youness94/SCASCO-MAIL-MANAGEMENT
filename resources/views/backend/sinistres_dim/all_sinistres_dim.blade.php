@extends('responsable.responsable_dashboard')
@section('responsable')




<div class="page-content">

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('add.sinistre.dim')}}" class="btn btn-inverse-secondary">Ajouetr Sinistre</a></li>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form method="GET" action="/filter/sinistres_dim">

          <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Les Sinistres DIM</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
              <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
              <input class="form-control bg-transparent border-primary" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" type="date" name="date_debut" id="date_debut" />
            </div>
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
              <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
              <input class="form-control bg-transparent border-primary" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" type="date" name="date_fin" id="date_fin" />
              
            </div>
            <button type="submit" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="printer"></i>
              Filtre
            </button>
            <a href="/reset_sinistre_dim" class="btn btn-outline-warning btn-icon-text me-2 mb-2 mb-md-0">
              <!-- <i class="btn-icon-prepend" data-feather="printer"></i> -->
              Réinitialiser
            </a>
            @if(isset($date_debut) && isset($date_fin) && $dataExists)
            <a href="{{ route('export.filtered.sinistres.dim', ['date_debut' => $date_debut, 'date_fin' => $date_fin]) }}" class="btn btn-success btn-icon-text mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="download-cloud"></i>
              Exporter
            </a>
            @endif
          </div>
        </div>
        </form>

          <div class="table-responsive">
            <table id="dataTableExample" class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Date de Réception</th>
                  <th>N° de déclaration</th>
                  <th>Nom Assuré</th>
                  <th>Nom Adhèrent</th>
                  <th>Branche</th>
                  <th>Compagnie</th>
                  <th>Acte de gestion</th>
                  <th>Chargé de compte</th>
                  <th>Date de traitement</th>
                  <th>Date de remise</th>
                  <th>Délai de traitement</th>
                  <th>Observation</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Cree par</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sinistres_dim as $key => $item)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$item->date_reception}}</td>
                  <td>{{$item->num_declaration}}</td>
                  <td>{{$item->nom_assure}}</td>
                  <td>{{$item->nom_adherent}}</td>
                  <td>{{ $item->branches_dim ? $item->branches_dim->nom : 'N/A' }}</td>
                  <td>{{ $item->compagnies ? $item->compagnies->nom : 'N/A' }}</td>
                  <td>{{ $item->acte_de_gestion_dim ? $item->acte_de_gestion_dim->nom : 'N/A' }}</td>
                  <td>{{ $item->charge_compte_dim ? $item->charge_compte_dim->nom : 'N/A' }}</td>
                  <td>{{$item->date_traitement}}</td>
                  <td>{{$item->date_remise}}</td>
                  <td>{{$item->delai_traitement}}</td>
                  <td>{{$item->observation}}</td>
                  <td>
                    <a href="{{route('edit.sinistre.dim', $item->id)}}" class="btn btn-inverse-warning">Edit</a>
                  </td>
                  <td>
                    <a href="{{route('delete.sinistre.dim', $item->id)}}" class="btn btn-inverse-danger">Delete</a>
                  </td>
                  <td>{{$item->user->name}}</td>
                </tr>
                @endforeach

              </tbody>
            </table>
            <!-- <button type="" class="btn btn-success">Filter</button> -->
          </div>
        </div>
      </div>
    </div>
  </div>


  <!--  -->


  @endsection