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
                    <li class="breadcrumb-item"><a href="{{route('all.productions')}}" class="btn btn-inverse-secondary">Toute les Productions</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('add.production')}}" class="btn btn-inverse-secondary">Ajouter Production</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Modifier Production</h6>


                        <form method="POST" action="{{route('update.production',['id' => $production->id])}}" class="forms-sample" enctype="multipart/form-data" >
                            @csrf
                            
                            <!-- , ['id' => $production->id] -->
                            <input type="hidden" name="id"  value="{{$production->id}}">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Date de réception:</label>
                                    <input class="form-control mb-4 mb-md-0" name="date_reception" type="date" id="date_reception" value="{{$production->date_reception}}" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Nom de Police:</label>
                                    <input class="form-control" name="nom_police" type="text" id="nom_police" value="{{$production->nom_police}}" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Nom Assuré:</label>
                                    <input class="form-control" name="nom_assure" type="text" id="nom_assure" value="{{$production->nom_assure}}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="branche_id">Branche</label>
                                    <select class="form-select" name="branche_id" id="branche_id">
                                        @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}" {{ $branch->id == $production->branche_id ? 'selected' : '' }}>
                                            {{ $branch->nom }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="compagnie_id">Compagnie</label>
                                    <select class="form-select" id="compagnie_id" name="compagnie_id">
                                    @foreach($compagnies as $company)
                                    <option value="{{ $company->id }}" {{ $company->id == $production -> compagnie_id ? 'selected' : '' }}>
                                        {{ $company->nom }}
                                    </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                <label class="form-label" for="act_gestion_id">Compagnie</label>
                                    <select class="form-select" id="act_gestion_id" name="act_gestion_id">
                                    @foreach ($act_gestions as $act_gestion)
                                    <option value="{{ $act_gestion->id }}" {{ $act_gestion->id == $production -> act_gestion_id ? 'selected' : '' }}>
                                        {{ $act_gestion->nom }}
                                    </option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                <label class="form-label" for="charge_compte_id">Compagnie</label>
                                    <select class="form-select" id="charge_compte_id" name="charge_compte_id">
                                    @foreach ($charge_comptes as $charge_compte)
                                    <option value="{{ $charge_compte->id }}" {{ $charge_compte->id == $production -> charge_compte_id ? 'selected' : '' }}>
                                        {{ $charge_compte->nom }}
                                    </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Date de remise:</label>
                                    <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" name="date_remise" type="date" id="date_remise" value="{{$production->date_remise}}"/>
                                </div>
                                <div class="col">
                                    <label class="form-label">Date de traitement:</label>
                                    <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" name="date_traitement" type="date" id="date_traitement" value="{{$production->date_traitement}}"/>
                                </div>
                            </div>
                            <div class="card rounded">
                                <div class="card-body">


                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Observation</label>
                                        <textarea class="form-control" id="observation" type="text" name="observation" rows="5" value="{{$production->observation}}">{{$production->observation}}</textarea>
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

        @endsection