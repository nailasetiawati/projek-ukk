<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <a class="navbar-brand" href="#">Toko Nail's</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ Request::is('home*') ? 'active' : ''  }}">
          <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{ Request::is('kategori*') ? 'active' : ''  }}">
          <a class="nav-link" href="/kategori">Kategori</a>
        </li>
        <li class="nav-item {{ Request::is('item*') ? 'active' : ''  }}">
          <a class="nav-link" href="/item">Barang</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Hai, {{ auth()->user()->name }}
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/logout">Logout</a>
        </div>
      </li>
    </ul>
    </div>
  </nav>
  