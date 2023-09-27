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
                        <li class="breadcrumb-item"><a href="{{route('all.branches.sinistres')}}" class="btn btn-inverse-secondary">Toute les Branches</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('add.branche.sinistre')}}" class="btn btn-inverse-secondary">Ajouter Branche</a></li>
                  </ol>
            </nav>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Modifier Branche sinistres </h6>


                        <form method="POST" action="{{route('update.branche.sinistre')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id"  value="{{$branches_sinistres_at_rd->id}}">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Barnche</label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" autocomplete="off" value="{{$branches_sinistres_at_rd->nom}}">
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