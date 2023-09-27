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

          <form method="GET" action="/filter_productions">

          <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Les Productions</h4>
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
            <a href="/reinitialiser_production" class="btn btn-outline-warning btn-icon-text me-2 mb-2 mb-md-0">
              <!-- <i class="btn-icon-prepend" data-feather="printer"></i> -->
              Réinitialiser
            </a>
            @if(isset($date_debut) && isset($date_fin) && $dataExists)
            <a href="{{ route('admin.export.filtered.productions', ['date_debut' => $date_debut, 'date_fin' => $date_fin]) }}" class="btn btn-success btn-icon-text mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="download-cloud"></i>
              Exporter
            </a>
            @endif
            
          </div>
        </div>
        </form>
          <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
          <div class="table-responsive">
            <table id="dataTableExample" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date de Réception</th>
                  <th>Num de police</th>
                  <th>Nom Assuré</th>
                  <th>Date de traitement</th>
                  <th>Date de remise</th>
                  <th>Délai de traitement</th>
                  <!-- <th>Edit</th> -->
                </tr>
              </thead>
              <tbody>
                @foreach ($productions as $key => $item)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$item -> date_reception}}</td>
                  <td>{{$item -> nom_police}}</td>
                  <td>{{$item -> nom_assure}}</td>
                  <td>{{$item -> date_traitement}}</td>
                  <td>{{$item -> date_remise}}</td>
                  <td>{{$item -> delai_traitement}}</td>
                  <!-- <td>
                    <a href="{{route('edit.production',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                  </td> -->
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