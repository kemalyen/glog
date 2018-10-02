@extends('glog::layout.master')
@section('title')
    {{ __('glog::translations.view_log') }}
    @parent
@stop

@section('content')
 
<div class="row">
    <div class="col-md-2">
        {{ $log->level_name }}<br/>
        <strong>{{ isset($translations[$log->channel]) ? $translations[$log->channel] : $log->channel }}</strong>
    </div>
    <div class="col-md-8">
        <pre>@logMessage($log->context)</pre>
    </div>
    <div class="col-md-2 logdate">
        {{ $log->getDateDiff() }} | {{ date('d F Y H:i', strtotime($log->created_at)) }}
    </div>
</div>

 
@endsection

@section('scripts')

@stop
