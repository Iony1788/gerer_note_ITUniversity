 <!-- partial:../../partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas fixed-top mt-5"  id="sidebar">
    <ul class="nav">
      <li class="nav-item">
      </li>    
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Admin</span>
          <i class="menu-arrow"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('saisiNote') }}">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Saisi note</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('listeEtudiant') }}">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Liste etudiants</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('importConfig') }}">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Import configuration</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('importNote') }}">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Import note</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('resetBase') }}">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Reinitialisation</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('listeadmis') }}">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Liste etudiant admis</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{ route('listeSemestreEtudiant') }}">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Liste semestre</span>
        </a>
      </li>
    </ul>
  </nav>
  <!-- partial -->