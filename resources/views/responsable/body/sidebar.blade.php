<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
      <div class="sidebar-header">
        <a href="{{route('responsable.dashboard')}}"class="sidebar-brand">
        <div class="col-lg-12" >
        <img src="{{ asset('upload/scasco_logo.png') }}" alt="Example Image" width="75%" height="">
       </div>
        </a>
        <div class="sidebar-toggler not-active col-lg-1">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
<!--  -->
<div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Principale</li>
          <li class="nav-item">
          <a href="{{route('responsable.dashboard')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Comptabilité</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="icon feather icon-user-check"></i>
              <span class="link-title">Utilisateurs</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('add.user')}}" class="nav-link">Ajouter Utilisateur</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.users')}}" class="nav-link">List des Utilisateurs</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#MRD" role="button" aria-expanded="false" aria-controls="emails">
            <i class="icon feather icon-folder"></i>
              <span class="link-title">Compagnies</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="MRD">
              <ul class="nav sub-menu">
              
                <li class="nav-item">
                  <a href="{{route('all.compagnies')}}" class="nav-link">Compagnies</a>
                </li>
                
              </ul>
            </div>
          </li>


          
          
          <li class="nav-item nav-category">Les Courriers</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Productions</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                
                <li class="nav-item">
                  <a href="/all/productions" class="nav-link">Productions</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.branches')}}" class="nav-link">Branches</a>
                </li>
                
                <li class="nav-item">
                  <a href="{{route('all.act_gestions')}}" class="nav-link">Les Actes de gestion</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.charge_comptes')}}" class="nav-link">Chargé de compte</a>
                </li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Sinistres AT & RD</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
              <ul class="nav sub-menu">
              <li class="nav-item">
                  <a href="{{route('all.sinistres.at.rd')}}" class="nav-link">Sinistres</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.branches.sinistres')}}" class="nav-link">Les Branches</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.acte.gestion.sinistres')}}" class="nav-link">Acte de gestion</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.charge.compte.sinistres')}}" class="nav-link">Charge de comptes</a>
                </li>
                
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Sinistres DIM</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
              <ul class="nav sub-menu">
              <li class="nav-item">
                  <a href="{{route('all.sinistres.dim')}}" class="nav-link">Sinistres</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.branches.sinistres.dim')}}" class="nav-link">Les Branches</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.acte.gestion.sinistres.dim')}}" class="nav-link">Acte de gestion</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.charge.compte.sinistres.dim')}}" class="nav-link">Charge de comptes</a>
                </li>
                
                
              </ul>
            </div>
          </li>
          
    </nav>
    