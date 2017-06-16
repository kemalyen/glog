<nav class="navbar navbar-findcond navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('glog_index') }}">Glog GUI</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ (Request::is('*users*') ? 'active' : '') }}"><a href="{{ route('glog_index') }}">Web
                        Logs</a></li>
                <li class="{{ (Request::is('*users*') ? 'active' : '') }}"><a href="{{ route('glog_clear_logs') }}">Clear</a>
                </li>
            </ul>

        </div>
    </div>
</nav>