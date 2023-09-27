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
                        <li class="breadcrumb-item"><a href="{{route('all.compagnies')}}" class="btn btn-inverse-secondary">Toute les Compagnies</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('add.compagnie')}}" class="btn btn-inverse-secondary">Ajouter Compagnie</a></li>
                  </ol>
            </nav>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Modifier Compagnie {{$compagnies -> nom}}</h6>


                        <form method="POST" action="{{route('update.compagnie')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" name="id"  value="{{$compagnies->id}}">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Compagnie</label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" autocomplete="off" value="{{$compagnies->nom}}">
                                @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card rounded">
                                <div class="card-body">


                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="compagnie_desc" type="text" name="compagnie_desc" rows="5" value="{{$compagnies->compagnie_desc}}">{{$compagnies->compagnie_desc}}</textarea>
                                    </div>
                                </div>
                            </div></br>
                            <div>
                                <button type="submit" class="btn btn-primary me-2">Ajouetr</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endsection