<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{route('HOME')}}">HOME</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">CHOOSE</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('clints.index')}}">all clints</a></li>
            <li><a class="dropdown-item" href="{{route('clints.create')}}">create clinte</a></li>
            <li><a class="dropdown-item" href="#">product</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


