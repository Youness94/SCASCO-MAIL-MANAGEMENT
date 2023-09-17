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
                        <li class="breadcrumb-item"><a href="{{route('all.act_gestions')}}" class="btn btn-inverse-secondary">Toute les Compagnies</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('add.compagnie')}}" class="btn btn-inverse-secondary">Ajouter Compagnie</a></li>
                  </ol>
            </nav>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Modifier Compagnie {{$act_gestions -> nom}}</h6>


                        <form method="POST" action="{{route('update.act_gestion')}}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" name="id"  value="{{$act_gestions->id}}">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Les Acts de gestion</label>
                                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" autocomplete="off" value="{{$act_gestions->nom}}">
                                @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card rounded">
                                <div class="card-body">


                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control" id="act_gestion_desc" type="text" name="act_gestion_desc" rows="5" value="{{$act_gestions->act_gestion_desc}}">{{$act_gestions->act_gestion_desc}}</textarea>
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