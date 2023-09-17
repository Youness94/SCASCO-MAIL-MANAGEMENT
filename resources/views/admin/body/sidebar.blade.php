<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
        SCA<span>SCO</span>
        <img src="../../../../public/upload/scasco_logo.png" alt="" >
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
<!--  -->
<div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
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
                  <a href="pages/email/inbox.html" class="nav-link">Ajouter Utilisateur</a>
                </li>
                <li class="nav-item">
                  <a href="pages/email/read.html" class="nav-link">List des Utilisateurs</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#MRD" role="button" aria-expanded="false" aria-controls="emails">
            <i class="icon feather icon-folder"></i>
              <span class="link-title">Compte</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="MRD">
              <ul class="nav sub-menu">
              

                <li class="nav-item">
                  <a href="{{route('all.branches')}}" class="nav-link">Branches</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('all.compagnies')}}" class="nav-link">Compagnies</a>
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


          
          
          <li class="nav-item nav-category">Réglements Et Factures</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Comptes</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                
                <li class="nav-item">
                  <a href="/all/productions" class="nav-link">Productions</a>
                </li>
                <!-- <li class="nav-item">
                  <a href="pages/ui-components/list-group.html" class="nav-link">List group</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/media-object.html" class="nav-link">Media object</a>
                </li> -->
                <!-- <li class="nav-item">
                  <a href="pages/ui-components/modal.html" class="nav-link">Modal</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/navs.html" class="nav-link">Navs</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/navbar.html" class="nav-link">Navbar</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/pagination.html" class="nav-link">Pagination</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/popover.html" class="nav-link">Popovers</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/progress.html" class="nav-link">Progress</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/scrollbar.html" class="nav-link">Scrollbar</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/scrollspy.html" class="nav-link">Scrollspy</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/spinners.html" class="nav-link">Spinners</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/tabs.html" class="nav-link">Tabs</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/tooltips.html" class="nav-link">Tooltips</a>
                </li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Réglements</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="#" class="nav-link">Ajouter Règlements</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Liste des Règlements</a>
                </li>
               
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item nav-category">Fournisseurs Et Clients</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#suppSide" role="button" aria-expanded="false" aria-controls="suppSide">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Fournisseurs</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="suppSide">
              <ul class="nav sub-menu">
               
                <li class="nav-item">
                  <a href="pages/forms/editors.html" class="nav-link">Editors</a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/wizard.html" class="nav-link">Wizard</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link"  data-bs-toggle="collapse" href="#ClientsSide" role="button" aria-expanded="false" aria-controls="ClientsSide">
              <i class="link-icon" data-feather="pie-chart"></i>
              <span class="link-title">Clients</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="ClientsSide">
              <ul class="nav sub-menu">
                
                <li class="nav-item">
                  <a href="pages/charts/flot.html" class="nav-link">Flot</a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/morrisjs.html" class="nav-link">Morris</a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/peity.html" class="nav-link">Peity</a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/sparkline.html" class="nav-link">Sparkline</a>
                </li>
              </ul>
            </div>
          </li> -->
          
    </nav>
    