<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('/') }}">
              <span data-feather="layout" class="align-text-bottom"></span>
              Article Page
            </a>
          </li>  
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('dashboard') }}">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('article') }}">
              <span data-feather="file" class="align-text-bottom"></span>
              Article
            </a>
          </li>
          <!-- @if (auth()->user()->role == 1)
          @endif   cara supaya tidak menampilakn sesuatu ketia dia rolenya selain 1-->
          <li class="nav-item">
            <a class="nav-link" href="{{ url('categories') }}">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
            Categories
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('tags') }}">
              <span data-feather="navigation" class="align-text-bottom"></span>
            Manage Tags
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('article_tags') }}">
              <span data-feather="trello" class="align-text-bottom"></span>
            Manage Article Tags
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('users') }}">
              <span data-feather="users" class="align-text-bottom"></span>
              User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <span data-feather="bar-chart-2" class="align-text-bottom"></span>
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </nav>