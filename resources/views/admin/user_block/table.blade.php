<table class="table table-responsive" id="user-table">
  <thead>
    <th>{!! trans('user.id_user') !!}</th>
    <th>{!! trans('user.name') !!}</th>
    <th>{!! trans('user.email') !!}</th>
    <th>{!! trans('user.phone') !!}</th>
    <th>{!! trans('user.address') !!}</th>
    <th>{!! trans('label.unlock') !!}</th>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr id = "user-block-{{$user->id}}">
      <td>{!! $user->id !!}</td>
      <td>{!! $user->name !!}</td>
      <td>{!! $user->email !!}</td>
      <td>{!! $user->phone !!}</td>
      <td>{!! str_limit($user->address, 20) !!}</td>
      <td>
          <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
          <span class='btn btn-warning btn-xs unlock-user' title="{{ trans('user.unlock_user')}}" value="{{ $user->id }}"><i class="fa fa-unlock"></i></span>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>