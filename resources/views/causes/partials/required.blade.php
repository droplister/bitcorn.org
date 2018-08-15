<p>In order to create a cause on Bitcorn.org, it is necessary to have a complete profile. This helps our audience get to know who you are and what you're about.</p>
<a href="{{ route('dashboard.index') }}" class="btn btn-xs btn-primary">
    Edit Profile
</a>
<hr class="my-4" />
<h6>Required Info:</h6>
<ul>
    <li>
        <i class="fa fa-{{ $user->description ? 'check text-success' : 'times text-warning' }}"></i>
        Profile
    </li>
    <li>
        <i class="fa fa-{{ $user->image_url ? 'check text-success' : 'times text-warning' }}"></i>
        Image
    </li>
    <li>
        <i class="fa fa-{{ $user->location ? 'check text-success' : 'times text-warning' }}"></i>
        Location
    </li>
    <li>
        <i class="fa fa-{{ $user->twitter_url || $user->website_url ? 'check text-success' : 'times text-warning' }}"></i>
        Twitter or Website
    </li>
</ul>