<header>
    <nav class="navbar navbar-expand-md bg-gradient-primary navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('glog_index') }}">{{ config('glog.appname') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item{{ (Request::is('*users*') ? 'active' : '') }}"><a class="nav-link"
                                                                                          href="{{ route('glog_index') }}">Events</a>
                    </li>
                    <li class="nav-item {{ (Request::is('*users*') ? 'active' : '') }}"><a class="nav-link"
                                                                                           href="{{ route('glog_clear_logs') }}">Purge</a>
                    </li>
                    @if(Route::has('logout'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
