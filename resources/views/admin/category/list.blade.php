<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>{!! trans('category.NAME')!!}</th>
      <th>{!! trans('category.ACTION') !!}</th>
    </tr>
  </thead>
  <tbody class="table-content">

    @if (!empty($list))
      @foreach ($list as $index => $category)
      <tr class="table-tr">
          <td class="table-td">
              <a href="{!! route('category.show', [$category->id]) !!}">{!! str_limit(strip_tags($category->name), 50) !!}</a>
          </td>
          <td class="table-td">
            {!! Form::open([ 'route' => ['category.destroy', $category->id], 'method' => 'delete', 'id' => 'form-delete-point']) !!}
            <div class='btn-group'>
                <a href="{!! route('category.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs btn-delete', 'alt' => trans('message.are_you_sure')]) !!}
            </div>
            {!! Form::close() !!}
          </td>
      </tr>
      @endforeach
    @endif

  </tbody>
</table>
