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
                        <li class="breadcrumb-item"><a href="{{route('all.users')}}" class="btn btn-inverse-secondary">Les utilisateurs</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Cients Table</li> -->
                  </ol>
            </nav>
      <div class="row">
            <div class="row col-lg-12 grid-margin stretch-card">
                  <div class="card">
                        <div class="card-body">
                              <h4 class="card-title">Ajouter </h4>
                              @if(session('success'))
                              <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                              </div>
                              @endif
                              <form  method="POST" action="{{ route('store.user') }}" enctype="multipart/form-data">
                              @csrf
                                    <div class="row col-lg-12">
                                    <div class="col-lg-6">
                                          <label for="name" class="form-label">Name</label>
                                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                          @error('name')
                                          <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                    </div>
                                    <div class="col-lg-6">
                                          <label for="name" class="form-label">Username</label>
                                          <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                                    </div>
                                    </div>
                                    <div class="row col-lg-12">
                                    <div class="col-lg-6">
                                          <label for="email" class="form-label">Email</label>
                                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                                          @error('email')
                                          <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                    </div>
                                    <div class="col-lg-6">
                                          <label for="password" class="form-label">Password</label>
                                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                          @error('password')
                                          <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                    </div>
                                    </div>
                                    
                                    <div class="row col-lg-12">
                                    <div class="col-lg-6">
                                          <label for="ageSelect" class="form-label">Rôle</label>
                                          <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                                                <option value="" disabled selected>Sélectionnez un rôle</option>
                                                <option value="responsable">Responsable</option>
                                                <option value="admin">Admin</option>
                                          </select>
                                          @error('status')
                                          <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                    </div>
                                    <div class="col-lg-6">
                                          <label for="ageSelect" class="form-label">Statu</label>
                                          <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                                                <option value="" disabled selected>SSélectionnez un statu</option>
                                                <option value="active">Actif</option>
                                                <option value="inactive">Inactif</option>
                                          </select>

                                          @error('status')
                                          <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                    </div>
                                    </div><br>
                                    <button type="submit" class="btn btn-primary">Create User</button>
                                    
                              </form>
                        </div>
                  </div>
            </div>
           
      </div>

    
@endsection