<table class="table table-responsive" id="user-table">
  <thead>
    <th>{!! trans('user.id_user') !!}</th>
    <th>{!! trans('user.name') !!}</th>
    <th>{!! trans('user.email') !!}</th>
    <th>{!! trans('user.gender') !!}</th>
    <th>{!! trans('user.phone') !!}</th>
    <th>{!! trans('user.address') !!}</th>
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
    </tr>
    @endforeach
  </tbody>
</table>