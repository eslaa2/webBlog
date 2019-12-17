<header class="header">
  <nav class="navbar navbar-expand navbar-light navbar-white">
      <ul class="navbar-nav">
        <li class="nav-item">
        </li>
         
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
         @if(Gate::check('Admin') || Gate::check('Editor'))
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Create Post</a>
        </li>
        @endif 

         @if(Gate::check('Admin'))
         <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">view post</a>
        </li>
        @endif        
</ul>
             <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </nav>
  </header>