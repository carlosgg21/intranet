<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">
    <div class="container">
        
        <a class="navbar-brand text-primary font-weight-bold text-uppercase" href="{{ url('/') }}">
            intranet
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Apps <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('view-any', App\Models\Charge::class)
                            <a class="dropdown-item" href="{{ route('charges.index') }}">Charges</a>
                            @endcan
                            @can('view-any', App\Models\Company::class)
                            <a class="dropdown-item" href="{{ route('companies.index') }}">Companies</a>
                            @endcan
                            @can('view-any', App\Models\WorkGroup::class)
                            <a class="dropdown-item" href="{{ route('work-groups.index') }}">Work Groups</a>
                            @endcan
                            @can('view-any', App\Models\Settings::class)
                            <a class="dropdown-item" href="{{ route('all-settings.index') }}">Settings</a>
                            @endcan
                            @can('view-any', App\Models\Area::class)
                            <a class="dropdown-item" href="{{ route('areas.index') }}">Areas</a>
                            @endcan
                            @can('view-any', App\Models\Process::class)
                            <a class="dropdown-item" href="{{ route('processes.index') }}">Processes</a>
                            @endcan
                            @can('view-any', App\Models\ProcessFileStatus::class)
                            <a class="dropdown-item" href="{{ route('process-file-statuses.index') }}">Process File Statuses</a>
                            @endcan
                            @can('view-any', App\Models\ProcessType::class)
                            <a class="dropdown-item" href="{{ route('process-types.index') }}">Process Types</a>
                            @endcan
                            @can('view-any', App\Models\Employee::class)
                            <a class="dropdown-item" href="{{ route('employees.index') }}">Employees</a>
                            @endcan
                            @can('view-any', App\Models\Event::class)
                            <a class="dropdown-item" href="{{ route('events.index') }}">Events</a>
                            @endcan
                            @can('view-any', App\Models\AdType::class)
                            <a class="dropdown-item" href="{{ route('ad-types.index') }}">Ad Types</a>
                            @endcan
                            @can('view-any', App\Models\Announcement::class)
                            <a class="dropdown-item" href="{{ route('announcements.index') }}">Announcements</a>
                            @endcan
                            @can('view-any', App\Models\AppSection::class)
                            <a class="dropdown-item" href="{{ route('app-sections.index') }}">App Sections</a>
                            @endcan
                            @can('view-any', App\Models\Article::class)
                            <a class="dropdown-item" href="{{ route('articles.index') }}">Articles</a>
                            @endcan
                            @can('view-any', App\Models\OtherApp::class)
                            <a class="dropdown-item" href="{{ route('other-apps.index') }}">Other Apps</a>
                            @endcan
                            @can('view-any', App\Models\PhraseCategory::class)
                            <a class="dropdown-item" href="{{ route('phrase-categories.index') }}">Phrase Categories</a>
                            @endcan
                            @can('view-any', App\Models\Phrase::class)
                            <a class="dropdown-item" href="{{ route('phrases.index') }}">Phrases</a>
                            @endcan
                            @can('view-any', App\Models\User::class)
                            <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
                            @endcan
                            @can('view-any', App\Models\Address::class)
                            <a class="dropdown-item" href="{{ route('addresses.index') }}">Addresses</a>
                            @endcan
                            @can('view-any', App\Models\Currency::class)
                            <a class="dropdown-item" href="{{ route('currencies.index') }}">Currencies</a>
                            @endcan
                        </div>

                    </li>
                    @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                        Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Access Management <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('view-any', Spatie\Permission\Models\Role::class)
                            <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
                            @endcan
                    
                            @can('view-any', Spatie\Permission\Models\Permission::class)
                            <a class="dropdown-item" href="{{ route('permissions.index') }}">Permissions</a>
                            @endcan
                        </div>
                    </li>
                    @endif
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>