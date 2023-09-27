<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
  <div class="sidebar-header">
    <a href="{{route('admin.dashboard')}}" class="sidebar-brand">
      <div class="col-lg-12" >
        <img src="{{ asset('upload/scasco_logo.png') }}" alt="Example Image" width="75%" height="">
      </div>
    </a>
    <div class="sidebar-toggler not-active col-lg-1" >
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
        <a href="{{route('admin.dashboard')}}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
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
              <a href="{{route('productions')}}" class="nav-link">Productions</a>
            </li>
            <li class="nav-item">
              <a href="{{route('ajouter.production')}}" class="nav-link">Ajouter Production</a>
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
              <a href="{{route('sinistres.at.rd')}}" class="nav-link">Sinistres AT & RD</a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.add.sinistre.at.rd')}}" class="nav-link">Ajouter Sinistre AT & RD</a>
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
              <a href="{{route('sinistres.dim')}}" class="nav-link">Sinistres DIM</a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.add.sinistre.dim')}}" class="nav-link">Ajouter Sinistre DIM</a>
            </li>


          </ul>
        </div>
      </li>
</nav>