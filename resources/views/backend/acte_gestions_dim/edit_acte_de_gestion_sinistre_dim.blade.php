@extends('responsable.responsable_dashboard')
@section('responsable')
<div class="page-content">
    <div class="row profile-body">
        <!-- ... other content ... -->
        <!-- left wrapper start -->

        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
        <nav class="page-breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('all.acte.gestion.sinistres.dim')}}" class="btn btn-inverse-secondary">Toute les Actes de gestion</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('add.acte.gestion.sinistre.dim')}}" class="btn btn-inverse-secondary">Ajouter Acte de gestion</a></li>
                  </ol>
            </nav>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Modifier Acte de gestion</h6>


                        <form method="POST" action="{{route('update.acte.gestion.sinistre.dim')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id"  value="{{$acte_gestions_dim->id}}">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Acte de gestion</label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" autocomplete="off" value="{{$acte_gestions_dim->nom}}">
                                @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
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

        @endsection