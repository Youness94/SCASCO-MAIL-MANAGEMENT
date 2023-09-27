@extends('responsable.responsable_dashboard')
@section('responsable')


    

      <div class="page-content">

      <nav class="page-breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('add.user')}}" class="btn btn-inverse-secondary">Ajouetr utilisateur</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Cients Table</li> -->
                  </ol>
            </nav>

<div class="row">
 <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Les utilisateurs</h6>
    <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
    <div class="table-responsive">
                  <table id="dataTableExample" class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Statu</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item -> name}}</td>
                        <td>{{$item -> email}}</td>
                        <td class="{{ $item->role === 'admin' ? 'text-info' : 'text-warning' }}">
                          {{$item -> role}}
                        </td>
                        <td class="{{ $item->status === 'active' ? 'text-success' : 'text-danger' }}">
                          {{$item -> status}}
                        </td>
                        <td>
                        <a href="{{route('edit.user',$item->id)}}" class="btn btn-inverse-warning">Modifier</a>
                        </td>
                        <td>
                        <a href="{{route('delete.user',$item->id)}}"" class="btn btn-inverse-danger">Supprimer</a>
                        </td>
                    </tr>
                    @endforeach 
                     
                    </tbody>
                  </table>
                </div>
  </div>
</div>
</div>
</div>


<!--  -->


@endsection