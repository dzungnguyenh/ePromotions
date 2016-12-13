<table class="table table-responsive" id="user-table">
  <thead>
    <th>{!! trans('user.id_user') !!}</th>
    <th>{!! trans('user.name') !!}</th>
    <th>{!! trans('user.email') !!}</th>
    <th>{!! trans('user.gender') !!}</th>
    <th>{!! trans('user.phone') !!}</th>
    <th>{!! trans('user.address') !!}</th>
    <th>Action</th>
  </thead>
  <tbody>
    @foreach($user as $user)
    <tr>
      <td>{!! $user->id !!}</td>
      <td>{!! $user->name !!}</td>
      <td>{!! $user->email !!}</td>
      <td>{!! $user->gender !!}</td>
      <td>{!! $user->phone !!}</td>
      <td>{!! $user->address !!}</td>
        <td>
                {!! Form::open([ 'route' => ['user.destroy', $user->id], 'method' => 'delete', 'id' => 'form-delete-point']) !!}
                <div class='btn-group'>
                    <a href="" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs btn-delete', 'alt' => trans('message.are_you_sure')]) !!}
                </div>
                {!! Form::close() !!}
            </td>
    </tr>
    @endforeach
  </tbody>
</table>