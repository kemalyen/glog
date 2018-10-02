@extends('glog::layout.master')
@section('title')
    {{ __('glog::translations.dashboard') }}
    @parent
@stop

@section('content')

    <form class="form-inline" action="" method="get">

        <label for="level" class="m-2">Level:</label>
        <select name="level" id="level" class="form-control m-2">
            <option value=""> - - - -</option>
            @foreach($levels as $l)
                @if($l == $level)
                    <option selected value="{{ $l }}">{{ $l }}</option>
                @else
                    <option value="{{ $l }}">{{ $l }}</option>
                @endif
            @endforeach
        </select>

        <label for="channels" class="m-2">Channels:</label>
        <select name="channel" id="channel" class="form-control m-2">
            <option value=""> - - - -</option>
            @foreach($channels as $m)
                @if($m == $channel)
                    <option selected value="{{ $m }}">{{ isset($translations[$m]) ? $translations[$m] : $m }}</option>
                @else
                    <option value="{{ $m }}">{{ isset($translations[$m]) ? $translations[$m] : $m }}</option>
                @endif
            @endforeach
        </select>

        <label for="datepicker_start" class="m-2">Start Date:</label>
        <input type="text" id="datepicker_start" name="start_date" class="form-control m-2">

        <label for="datepicker_end" class="m-2">End Date:</label>
        <input type="text" id="datepicker_end" name="end_date" class="form-control m-2">

        <button type="submit" class="btn btn-outline-dark m-2">{{ __('glog::translations.filter') }}</button>
    </form>

    <hr/>

    @foreach($logs as $log)
        <div class="row line" data-id="{{ $log->id }}">
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
    @endforeach
 
@endsection

@section('scripts')
    <script>
        $("#datepicker_start").datepicker({format: 'yyyy-mm-dd', value: '{{ $start_date }}' });
        $("#datepicker_end").datepicker({format: 'yyyy-mm-dd', value: '{{ $end_date }}'});
        $('select').select2({
            theme: "bootstrap"
        });

        $('.line').on('click', function () {
            let id = $(this).data('id');
            window.location = '{{ route('glog_index') }}/' + id + '/view';
        })
    </script>
@stop
