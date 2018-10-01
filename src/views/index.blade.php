@extends('glog::layout.master')
@section('title')
    {{ __('glog::trans.home') }}
    @parent
@stop

@section('content')

 <form class="form-inline" action="" method="get">

         <label for="level" class="m-2">Level:</label>
         <select name="level" id="level" class="form-control m-2">
         <option value=""> - - - - </option>
             @foreach($levels as $l)
                @if($l == $level)
                <option selected value="{{ $l }}">{{ $l }}</option>
                @else
                <option value="{{ $l }}">{{ $l }}</option>
                @endif
             @endforeach
         </select>
 
         <label for="channels" class="m-2">Channels:</label>
         <select name="channel" id="channel"  class="form-control m-2">
            <option value=""> - - - - </option>
             @foreach($channels as $m)
                @if($m == $channel)
                <option selected value="{{ $m }}">{{ isset($translations[$m]) ? $translations[$m] : $m }}</option>
                @else
                <option value="{{ $m }}">{{ isset($translations[$m]) ? $translations[$m] : $m }}</option>
                @endif
             @endforeach
         </select>
 
         <label for="datepicker_start" class="m-2">Start Date:</label>
         <input type="text" id="datepicker_start" name="start_date" class="form-control m-2" >
 
         <label for="datepicker_end" class="m-2">End Date:</label>
         <input type="text" id="datepicker_end" name="end_date" class="form-control m-2" >
      
   <button type="submit" class="btn btn-search">Search</button>
</form>

<hr/>

@foreach($logs as $log)
    <div class="row">
        <div class="col-md-12">
            <div class="vleft">
                <span class="label label label-{{ $labels[$log->level_name] }}">{{ $log->level_name }}</span></td>
            </div>
            <div class="vright">
                <strong>{{ isset($translations[$log->channel]) ? $translations[$log->channel] : $log->channel }}</strong>
                <pre>@logMessage($log->context)</pre>
                <div class="subtitle">
                    <span class="glyphicon glyphicon-time"></span> {{ $log->getDateDiff() }} |  {{ date('d F Y H:s:i', strtotime($log->created_at)) }}
                </div>
            </div>
        </div>
    </div>
@endforeach

{!! $logs->render() !!}
@endsection

@section('scripts')
    <script>
        $("#datepicker_start" ).datepicker({ format: 'yyyy-dd-mm' });
        $("#datepicker_end" ).datepicker({ format: 'yyyy-dd-mm' });
        $('select').select2({
            theme: "bootstrap"
        });
    </script>
 @stop
