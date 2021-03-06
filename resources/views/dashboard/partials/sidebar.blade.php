<div class="list-group">
    <a href="{{ route('dashboard.index') }}" class="list-group-item list-group-item-action{{ $active === 'dashboard' ? ' active' : '' }}">
      Dashboard
    </a>
    @if(Auth::user()->isAdmin() || Auth::user()->isBoard())
    <a href="{{ route('queue.index') }}" class="list-group-item list-group-item-action{{ $active === 'queue' ? ' active' : '' }}">
      Card Queue
    </a>
    @endif
    <a href="{{ route('users.causes.index', ['user' => Auth::user()->id]) }}" class="list-group-item list-group-item-action{{ $active === 'causes' ? ' active' : '' }}">
      My Causes
    </a>
    <a href="{{ route('causes.create') }}" class="list-group-item list-group-item-action{{ $active === 'cause' ? ' active' : '' }}">
      New Cause
    </a>
    @if(Auth::user()->isAdmin() || Auth::user()->isBoard())
    <a href="{{ route('events.create') }}" class="list-group-item list-group-item-action{{ $active === 'events' ? ' active' : '' }}">
      New Event
    </a>
    @endif
    @if(Auth::user()->isAdmin())
    <a href="{{ route('elections.create') }}" class="list-group-item list-group-item-action{{ $active === 'elections' ? ' active' : '' }}">
      New Election
    </a>
    @endif
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