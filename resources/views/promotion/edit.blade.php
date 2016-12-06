<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Promotion Page</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>Edit promotion</h1>
            </div>
            @foreach ($data as $value)
            <form action="{{ route('edit') }}" method="post">
                 {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $value->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="5" id="description"  name="description" >{{ $value->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="percent">Percent</label><span>( % )</span>
                    <input type="number" class="form-control" id="percent" name="percent" value="{{ $value->percent }}">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $value->quantity }}">
                </div>
                <div class="form-group">
                    <label for="start_date">Start date</label>
                    <input type="datetime-local" class="form-control" id="start-date" name="start-date" value="{{ gmdate('Y-m-d\TH:i',strtotime($value->date_start)) }}">
                </div>
                <div class="form-group">
                    <label for="end_date">End date</label>
                    <input type="datetime-local" class="form-control" id="end-date" name="end-date" value="{{ gmdate('Y-m-d\TH:i',strtotime($value->date_end)) }}">
                </div>
                 <input type="hidden" class="form-control" name="updated-at" value="{{ gmdate('Y-m-d\TH:i',time()) }}">
                 <input type="hidden" class="form-control" name="promotion-id" value="{{ $value->id }}">
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            @endforeach
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
