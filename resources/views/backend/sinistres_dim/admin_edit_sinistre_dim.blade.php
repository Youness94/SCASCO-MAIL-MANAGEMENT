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
                    <li class="breadcrumb-item"><a href="{{ route('sinistres.dim') }}" class="btn btn-inverse-secondary">Toute les Sinistres</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.add.sinistre.dim') }}" class="btn btn-inverse-secondary">Ajouter Sinistres</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Modifier Production</h6>

                        <form method="POST" action="{{ route('admin.update.sinistre.dim', ['id' => $sinistres_dim->id]) }}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $sinistres_dim->id }}">
                            <div class="row mb-3">
										<div class="col-md-6">
											<label class="form-label">Date de réception:</label>
											<input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" name="date_reception" type="date" id="date_reception" value="{{ $sinistres_dim->date_reception }}"/>
										</div>
										<div class="col-md-6">
											<label class="form-label">N° de déclaration:</label>
											<input class="form-control" name="num_declaration" type="text" id="num_declaration" value="{{ $sinistres_dim->num_declaration }}"/>
										</div>
										
									</div>
									<div class="row mb-3">
									<div class="col-md-6">
											<label class="form-label">Nom Assuré:</label>
											<input class="form-control" name="nom_assure" type="text" id="nom_assure" value="{{ $sinistres_dim->nom_assure }}"/>
										</div>
										<div class="col-md-6">
											<label class="form-label">Nom Adhèrent</label>
											<input class="form-control" name="nom_adherent" type="text" id="nom_adherent" value="{{ $sinistres_dim->nom_adherent }}"/>
										</div>
									</div>
                                    
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="branche_dim_id">Branche</label>
                                    <select class="form-select" name="branche_dim_id" id="branche_dim_id">
                                        @foreach ($branches_dim as $branch)
                                        <option value="{{ $branch->id }}" {{ $branch->id == $sinistres_dim->branche_dim_id ? 'selected' : '' }}>
                                            {{ $branch->nom }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="compagnie_id">Compagnie</label>
                                    <select class="form-select" id="compagnie_id" name="compagnie_id">
                                        @foreach($compagnies as $company)
                                        <option value="{{ $company->id }}" {{ $company->id == $sinistres_dim->compagnie_id ? 'selected' : '' }}>
                                            {{ $company->nom }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="acte_gestion_dim_id">Acte de Gestion</label>
                                    <select class="form-select" id="acte_gestion_dim_id" name="acte_gestion_dim_id">
                                        @foreach ($acte_de_gestion_dim as $act_gestion)
                                        <option value="{{ $act_gestion->id }}" {{ $act_gestion->id == $sinistres_dim->acte_gestion_dim_id ? 'selected' : '' }}>
                                            {{ $act_gestion->nom }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="charge_compte_dim_id">Charge de Compte</label>
                                    <select class="form-select" id="charge_compte_dim_id" name="charge_compte_dim_id">
                                        @foreach ($charge_compte_dim as $charge_compte)
                                        <option value="{{ $charge_compte->id }}" {{ $charge_compte->id == $sinistres_dim->charge_compte_dim_id ? 'selected' : '' }}>
                                            {{ $charge_compte->nom }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Date de remise:</label>
                                    <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" name="date_remise" type="date" id="date_remise" value="{{ $sinistres_dim->date_remise }}" />
                                </div>
                                <div class="col">
                                    <label class="form-label">Date de traitement:</label>
                                    <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" name="date_traitement" type="date" id="date_traitement" value="{{ $sinistres_dim->date_traitement }}" />

                                </div>
                            </div>
                            <div class="card rounded">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Observation</label>
                                        <textarea class="form-control" id="observation" name="observation" rows="5" value="{{ $sinistres_dim->observation }}">{{ $sinistres_dim->observation }}</textarea>
                                    </div>
                                </div>
                            </div>
                            </br>
                            <div>
                                <button type="submit" class="btn btn-primary me-2">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection