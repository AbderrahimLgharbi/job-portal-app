<div class="col-lg-3 col-md-4 col-sm-12">
    <div class="box-nav-tabs nav-tavs-profile mb-5">
    <ul class="nav" role="tablist">
        <li><a class="btn btn-border mb-20 active" href="candidate-profile-dashboard.html">Dashboard</a></li>
        <li><a class="btn btn-border mb-20" href="{{ route('company.profile') }}">My Profile</a></li>
        <li><a class="btn btn-border mb-20" href="candidate-profile-jobs.html">My Jobs</a></li>
        <li><a class="btn btn-border mb-20" href="candidate-profile-save-jobs.html">Saved Jobs</a></li>

        
        
        <form method="POST" action="{{route('logout') }}">
            @csrf
            
            {{-- <x-dropdown-link :href="auth()->guard('admin')->check() ? route('admin.logout'):route('logout') "
                onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link> --}}
            <li><a class="btn btn-border mb-20" onclick="event.preventDefault();
                this.closest('form').submit();" href="{{ route('logout') }}">Logout</a></li>
        </form>


    </ul>
    </div>
</div>