<table class="table table-responsive" id="user-table">
  <thead>
    <th>{!! trans('user.id_user') !!}</th>
    <th>{!! trans('user.name') !!}</th>
    <th>{!! trans('user.email') !!}</th>
    <th>{!! trans('user.phone') !!}</th>
    <th>{!! trans('user.address') !!}</th>
    <th>Action</th>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{!! $user->id !!}</td>
      <td>{!! $user->name !!}</td>
      <td>{!! $user->email !!}</td>
      <td>{!! $user->phone !!}</td>
      <td>{!! $user->address !!}</td>
        <td>
                {!! Form::open([ 'route' => ['users.destroy', $user->id], 'method' => 'delete', 'id' => 'form-delete-user-'.$user->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs btn-delete-user', 'alt' => trans('user.delete_a_user'), 'name' => $user->name, 'id' => $user->id]) !!}
                </div>
                {!! Form::close() !!}
            </td>
    </tr>
    @endforeach
  </tbody>
</table>