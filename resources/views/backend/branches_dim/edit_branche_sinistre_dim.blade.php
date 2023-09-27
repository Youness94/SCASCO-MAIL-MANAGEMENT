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
                    <li class="breadcrumb-item"><a href="{{route('all.branches.sinistres.dim')}}" class="btn btn-inverse-secondary">Toute les Branches</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('add.branche.sinistre.dim')}}" class="btn btn-inverse-secondary">Ajouter Branche</a></li>
                </ol>
            </nav>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Modifier Branche</h6>


                        <form method="POST" action="{{route('update.branche.sinistre.dim')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$branches_dim->id}}">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Barnche</label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" autocomplete="off" value="{{$branches_dim->nom}}">
                                @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <div>
                                    <h4 class="mb-3 mb-md-0"></h4>
                                </div>
                                <div class="d-flex align-items-center flex-wrap text-nowrap">
                                    
                                    <button type="submit" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                                        <!-- <i class="btn-icon-prepend" data-feather="printer"></i> -->
                                        Modifier
                                    </button>
                                    <button href="{{route('all.branches.sinistres.dim')}}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                                        <!-- <i class="btn-icon-prepend" data-feather="download-cloud"></i> -->
                                        Annuler
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endsection