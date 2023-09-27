@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Bienvenue sur le Tableau de bord</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
      <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
        <!-- <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
        <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input> -->
      </div>
      <!-- <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
        <i class="btn-icon-prepend" data-feather="printer"></i>
        Print
      </button>
      <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
        <i class="btn-icon-prepend" data-feather="download-cloud"></i>
        Download Report
      </button> -->
    </div>
  </div>



  <div class="row">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow-1">
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Productions</h6>
                <div class="dropdown mb-2">
                  <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item d-flex align-items-center" href="{{route('productions')}}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">{{$totalProduction}}</h3>
                  <div class="d-flex align-items-baseline">
                    <p class="text-success">
                      <!-- <span>+3.3%</span> -->
                      <!-- <i data-feather="arrow-up" class="icon-sm mb-1"></i> -->
                    </p>
                  </div>
                </div>
                <div class="col-6 col-md-12 col-xl-7">
                  <div id="" class="mt-md-3 mt-xl-0"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Sinistres AT & RD</h6>
                <div class="dropdown mb-2">
                  <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <a class="dropdown-item d-flex align-items-center" href="{{route('sinistres.at.rd')}}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">{{$totalSinistreAt_Rd}}</h3>
                  <div class="d-flex align-items-baseline">
                    <p class="text-danger">
                      <!-- <span>-2.8%</span> -->
                      <!-- <i data-feather="arrow-down" class="icon-sm mb-1"></i> -->
                    </p>
                  </div>
                </div>
                <div class="col-6 col-md-12 col-xl-7">
                  <div id="" class="mt-md-3 mt-xl-0"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Sinistres DIM</h6>
                <div class="dropdown mb-2">
                  <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    <a class="dropdown-item d-flex align-items-center" href="{{route('sinistres.dim')}}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">{{$totalSinistreDim}}</h3>
                  <div class="d-flex align-items-baseline">
                    <p class="text-success">
                      <!-- <span>+2.8%</span> -->
                      <!-- <i data-feather="arrow-up" class="icon-sm mb-1"></i> -->
                    </p>
                  </div>
                </div>
                <div class="col-6 col-md-12 col-xl-7">
                  <div id="" class="mt-md-3 mt-xl-0"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
              <h4 class="mb-3 mb-md-0">Productions</h4>
            </div>
            <div class="d-flex flex-row">
            <a href="{{route('productions')}}" class="p-2">
              Tout les productions
            </a>
          </div>
          </div>
          <div class="table-responsive">
            <table id="" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date de Réception</th>
                  <th>Num de police</th>
                  <th>Nom Assuré</th>
                  <th>Date de traitement</th>
                  <th>Date de remise</th>
                  <th>Délai de traitement</th>
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
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
              <h4 class="mb-3 mb-md-0">Sinistre AT & RD</h4>
            </div>
            <div class="d-flex flex-row">
            <a href="{{route('sinistres.at.rd')}}" class="p-2">
              Tout les sinistre AT & RD
            </a>
          </div>
          </div>
          <div class="table-responsive">
            <table id="" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date de Réception</th>
                  <th>Nom de police</th>
                  <th>Nom Assuré</th>
                  <th>Numero Sinistre</th>
                  <th>Nom Victime</th>
                  <th>Date de traitement</th>
                  <th>Date de remise</th>
                  <th>Délai de traitement</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sinistres as $key => $item)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$item->date_reception}}</td>
                  <td>{{$item->nom_police}}</td>
                  <td>{{$item->nom_assure}}</td>
                  <td>{{$item->num_sinistre}}</td>
                  <td>{{$item->nom_victime}}</td>
                  <td>{{$item->date_traitement}}</td>
                  <td>{{$item->date_remise}}</td>
                  <td>{{$item->delai_traitement}}</td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
              <h4 class="mb-3 mb-md-0">Sinistre DIM</h4>
            </div>
            <div class="d-flex flex-row">
            <a href="{{route('sinistres.dim')}}" class="p-2">
              Tout les sinistre DIM
            </a>
          </div>
          </div>
          <div class="table-responsive">
            <table id="" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date de Réception</th>
                  <th>N° de déclaration</th>
                  <th>Nom Assuré</th>
                  <th>Nom Adhèrent</th>
                  <th>Date de traitement</th>
                  <th>Date de remise</th>
                  <th>Délai de traitement</th>
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
                  <td>{{$item->date_traitement}}</td>
                  <td>{{$item->date_remise}}</td>
                  <td>{{$item->delai_traitement}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <h6 class="card-title mb-0">Monthly sales</h6>
              <div class="dropdown mb-2">
                <a type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <p class="text-muted">Sales are activities related to selling or the number of goods or services sold in a given time period.</p>
            <div id="monthlySalesChart">
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Cloud storage</h6>
              <div class="dropdown mb-2">
                <a type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div id="storageChart"></div>
            <div class="row mb-3">
              <div class="col-6 d-flex justify-content-end">
                <div>
                  <label class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total storage <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
                  <h5 class="fw-bolder mb-0 text-end">8TB</h5>
                </div>
              </div>
              <div class="col-6">
                <div>
                  <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span class="p-1 me-1 rounded-circle bg-primary"></span> Used storage</label>
                  <h5 class="fw-bolder mb-0">~5TB</h5>
                </div>
              </div>
            </div>
            <div class="d-grid">
              <button class="btn btn-primary">Upgrade storage</button>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- row -->

  

    @endsection