@extends('responsable.responsable_dashboard')
@section('responsable')


    

      <div class="page-content">

      <nav class="page-breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('add.charge.compte.sinistre')}}" class="btn btn-inverse-secondary">Ajouetr Charges compte</a></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">Cients Table</li> -->
                  </ol>
            </nav>

<div class="row">
 <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Les Charges compte sinistres</h6>
    <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
    <div class="table-responsive">
                  <table id="dataTableExample" class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Cree par</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($charge_compte_sinistres_at_rd as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item -> nom}}</td>
                        <td>
                        <a href="{{route('edit.charge.compte.sinistre',$item->id)}}" class="btn btn-inverse-warning">Edit</a>
                        </td>
                        <td>
                        <a href="{{route('delete.charge.compte.sinistre',$item->id)}}"" class="btn btn-inverse-danger">Delete</a>
                        </td>
                        <td>{{$item -> user->name}}</td>
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