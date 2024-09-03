<nav class="navbar navbar-expand-lg bg-body-tertiary p-3 shadow-sm">
  <div class="container">
    <a class="navbar-brand text-success fs-2" href="{{ route('home') }}"><span style="font-weight: 900">SB</span> FUND</a>
    <div class="d-flex" style="column-gap: 1em;">
      <!-- <a href="#" class="btn btn-success">Donate now</a> -->
      @if(Auth::check())
        <a href="{{ route('campaign.create') }}" class="btn btn-outline-success">Create a campaign</a>
        <form action="{{ route('auth.logout') }}" method="post">
          @csrf
          <input type="submit" class="btn btn-light" value="Logout">
        </form>
      @else
        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
      @endif
    </div>
  </div>
</nav>