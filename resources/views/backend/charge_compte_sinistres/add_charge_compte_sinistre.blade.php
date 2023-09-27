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
                        <li class="breadcrumb-item"><a href="{{route('all.charge.compte.sinistres')}}" class="btn btn-inverse-secondary">Toute les branche sinistres</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Cients Table</li> -->
                  </ol>
            </nav>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Ajouter Charge compte</h6>


                        <form method="POST" action="{{route('store.charge.compte.sinistre')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" autocomplete="off">
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