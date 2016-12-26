@extends ('layouts.template_admin')

@section ('main-content')
    <section class="content-header">
        <h1 class="pull-left">{!! trans('user.history_join_event') !!}</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @if(Session::has('msg'))
            <div class="alert alert-success">
                {{ Session::get('msg') }}
            </div>
        @endif
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-responsive" id="points-table">
                    <thead>
                        <th>{!! trans('label.no') !!}</th>
                        <th width="50%">{!! trans('event.title') !!}</th>
                        <th>{!! trans('event.start_time') !!}</th>
                        <th>{!! trans('event.end_time') !!}</th>
                    </thead>
                    <tbody>
                    @foreach($historyJoins as $historyJoin)
                        <tr>
                            <td width="5%">{!! $sort++ !!}</td>
                            <td width="50%">{!! $historyJoin->event->title !!}</td>
                            <td>{!! $historyJoin->event->start_time !!}</td>
                            <td>{!! $historyJoin->event->end_time !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {!! $historyJoins->render(); !!}
        </div>
    </div>
@endsection
