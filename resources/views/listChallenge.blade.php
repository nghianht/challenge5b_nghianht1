<!DOCTYPE html>
<html lang="en">
<head>
  <title>List exercise</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel='stylesheet' href='styles/mycss.css'>
</head>
<body>

    <div class="page-header">
        <h1>All Challenges</h1>
    </div>

    @if ($role === "teacher")
        <div>
            <a class="btn btn-primary" href="{{ route('addChallenge') }}" role="button">Add challenge</a>
        </div>
    @endif
    
    @foreach($challenges as $challenge)
        <div class="mb-3">
            <h1>{{$challenge->title}}</h1>
            <p>Hint: {{$challenge->description}}</p>
            <p>Deadline: {{$challenge->deadline}} </p>

            @if ($role === "teacher")
                <form method="post" action="{{ route('challenge.remove') }}">
                    @csrf
                    <input type="hidden"  name="id" value="{{$challenge->id}}">
                    <input type="submit" class="btn btn-danger" name="send" value="Delete challenge" class="btn btn-primary">
                </form>
            @else
            <div>
                <a class="btn btn-primary" href="{{ route('submitChallenge', ['id' => $challenge->id]) }}" role="button">Submit</a>
            </div>
            @endif
        </div>
    @endforeach
</body>
</html>
