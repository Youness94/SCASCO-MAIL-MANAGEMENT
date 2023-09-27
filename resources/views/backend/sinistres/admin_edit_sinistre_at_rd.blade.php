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
                    <li class="breadcrumb-item"><a href="{{ route('sinistres.at.rd') }}" class="btn btn-inverse-secondary">Les sinistres AT & RD</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.add.sinistre.at.rd') }}" class="btn btn-inverse-secondary">Ajouter sinistre</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Modifier Production</h6>

                        <form method="POST" action="{{ route('admin.update.sinistre.at.rd', ['id' => $sinistre->id]) }}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $sinistre->id }}">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Date de réception:</label>
                                    <input class="form-control mb-4 mb-md-0" name="date_reception" type="date" id="date_reception" value="{{ $sinistre->date_reception }}" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Nom de Police:</label>
                                    <input class="form-control" name="nom_police" type="text" id="nom_police" value="{{ $sinistre->nom_police }}" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Nom Assuré:</label>
                                    <input class="form-control" name="nom_assure" type="text" id="nom_assure" value="{{ $sinistre->nom_assure }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Numero Sinistre:</label>
                                    <input class="form-control" name="num_sinistre" type="text" id="num_sinistre" value="{{ $sinistre->num_sinistre }}" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nom Victime:</label>
                                    <input class="form-control" name="nom_victime" type="text" id="nom_victime" value="{{ $sinistre->nom_victime }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="branche_sinistre_id">Branche</label>
                                    <select class="form-select" name="branche_sinistre_id" id="branche_sinistre_id">
                                        @foreach ($branches_sinistres_at_rd as $branch)
                                        <option value="{{ $branch->id }}" {{ $branch->id == $sinistre->branche_sinistre_id ? 'selected' : '' }}>
                                            {{ $branch->nom }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="compagnie_id">Compagnie</label>
                                    <select class="form-select" id="compagnie_id" name="compagnie_id">
                                        @foreach($compagnies as $company)
                                        <option value="{{ $company->id }}" {{ $company->id == $sinistre->compagnie_id ? 'selected' : '' }}>
                                            {{ $company->nom }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="acte_de_gestion_sinistre_id">Acte de Gestion</label>
                                    <select class="form-select" id="acte_de_gestion_sinistre_id" name="acte_de_gestion_sinistre_id">
                                        @foreach ($acte_de_gestion_sinistres_at_rd as $act_gestion)
                                        <option value="{{ $act_gestion->id }}" {{ $act_gestion->id == $sinistre->acte_de_gestion_sinistre_id ? 'selected' : '' }}>
                                            {{ $act_gestion->nom }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="charge_compte_sinistre_id">Charge de Compte</label>
                                    <select class="form-select" id="charge_compte_sinistre_id" name="charge_compte_sinistre_id">
                                        @foreach ($charge_compte_sinistres_at_rd as $charge_compte)
                                        <option value="{{ $charge_compte->id }}" {{ $charge_compte->id == $sinistre->charge_compte_sinistre_id ? 'selected' : '' }}>
                                            {{ $charge_compte->nom }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Date de remise:</label>
                                    <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" name="date_remise" type="date" id="date_remise" value="{{ $sinistre->date_remise }}" />
                                </div>
                                <div class="col">
                                    <label class="form-label">Date de traitement:</label>
                                    <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" name="date_traitement" type="date" id="date_traitement" value="{{ $sinistre->date_traitement }}" />

                                </div>
                            </div>
                            <div class="card rounded">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Observation</label>
                                        <textarea class="form-control" id="observation" name="observation" rows="5">{{ $sinistre->observation }}</textarea>
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