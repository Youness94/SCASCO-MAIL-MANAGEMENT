@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
      
    <div class="row profile-body">
        <!-- ... other content ... -->
        <!-- left wrapper start -->

        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
        <nav class="page-breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('sinistres.dim')}}" class="btn btn-inverse-secondary">Toute les sinistres</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Cients Table</li> -->
                  </ol>
            </nav>
            <div class="row">
					<div class="col-md-12 grid-margin">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Ajouter sinistre</h6>
								<!-- <p class="text-muted mb-3">Read the <a href="https://github.com/RobinHerbots/Inputmask" target="_blank"> Official Inputmask Documentation </a>for a full list of instructions and other options.</p> -->
								<form method="POST" action="{{route('admin.store.sinistre.dim')}}" class="forms-sample" enctype="multipart/form-data">
                               				 @csrf
									<div class="row mb-3">
										<div class="col-md-6">
											<label class="form-label">Date de réception:</label>
											<input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" name="date_reception" type="date" id="date_reception"/>
										</div>
										<div class="col-md-6">
											<label class="form-label">N° de déclaration:</label>
											<input class="form-control" name="num_declaration" type="text" id="num_declaration"/>
										</div>
										
									</div>
									<div class="row mb-3">
									<div class="col-md-6">
											<label class="form-label">Nom Assuré:</label>
											<input class="form-control" name="nom_assure" type="text" id="nom_assure"/>
										</div>
										<div class="col-md-6">
											<label class="form-label">Nom Adhèrent</label>
											<input class="form-control" name="nom_adherent" type="text" id="nom_adherent"/>
										</div>
									</div>
									
									<div class="row mb-3">
									<div class="col-md-6">
									<label class="form-label">Branche</label>
									<select class="form-select" name="branche_dim_id" id="branche_dim_id">
										@foreach ($branches_dim as $branch)
										<option value="{{ $branch->id }}">{{ $branch->nom }}</option>
										@endforeach
									</select>
									</div>
									<div class="col-md-6">
									<label class="form-label">Companie</label>
									<select class="form-select" name="compagnie_id" id="compagnie_id">
										@foreach ($compagnies as $company)
											<option value="{{ $company->id }}">{{ $company->nom }}</option>
										@endforeach
									</select>
									</div>
									</div>
									<div class="row mb-3">
									<div class="col-md-6">
									<label class="form-label">Acte de gestion</label>
									<select class="form-select" name="acte_gestion_dim_id" id="acte_gestion_dim_id">
										@foreach ($acte_de_gestion_dim as $act_gestion)
										<option value="{{ $act_gestion->id }}">{{ $act_gestion->nom }}</option>
										@endforeach
									</select>
									</div>
									<div class="col-md-6">
									<label class="form-label">Chargé de Copmte</label>
									<select class="form-select" name="charge_compte_dim_id" id="charge_compte_dim_id">
										@foreach ($charge_compte_sdim as $charge_compte)
											<option value="{{ $charge_compte->id }}">{{ $charge_compte->nom }}</option>
										@endforeach
									</select>
									</div>
									</div>
									<div class="row mb-3">
                                    				<div class="col">
											<label class="form-label">Date de remise:</label>
											<input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" name="date_remise" type="date" id="date_remise"/>
										</div>
										<div class="col">
											<label class="form-label">Date de traitement:</label>
											<input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" name="date_traitement" type="date" id="date_traitement"/>
										</div>
									</div>
									<div class="card rounded">
										<div class="card-body">


											<div class="mb-3">
											<label for="exampleFormControlTextarea1" class="form-label">Observation</label>
											<textarea class="form-control" id="observation" type="text" name="observation" rows="5"></textarea>
											</div>
										</div>
									</div>
									</br>
									<div>
										<button type="submit" class="btn btn-primary me-2">Ajouetr</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
                </div>
            </div>
        </div>

        @endsection