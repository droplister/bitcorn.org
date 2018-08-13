<div class="list-group">
    <a href="{{ route('dashboard.index') }}" class="list-group-item list-group-item-action{{ $active === 'dashboard' ? ' active' : '' }}">
      Dashboard
    </a>
    <a href="{{ route('users.causes.index', ['user' => $user->id]) }}" class="list-group-item list-group-item-action{{ $active === 'causes' ? ' active' : '' }}">
      My Causes
    </a>
    <a href="{{ route('events.create') }}" class="list-group-item list-group-item-action{{ $active === 'events' ? ' active' : '' }}">
      New Event
    </a>
    <a href="{{ route('logout') }}" class="list-group-item list-group-item-action"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out"></i>
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>