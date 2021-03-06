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
        <h1>Submit challenge</h1>
    </div>

    <div class="container mt-5">

        <form action="" method="post" action="{{ route('challenge.store') }}">

            <!-- CROSS Site Request Forgery Protection -->
            @csrf

            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" id="name" value="{{$challenge->title}}" disabled>
            </div>

            <div class="form-group">
                <label>Hint</label>
                <textarea class="form-control" name="description" id="message" rows="4" value="{{$challenge->description}}" disabled></textarea>
            </div>
            <div class="form-group">
                <label>Deadline</label>
                <input type="text" id="deadline" name="deadline" required="" value="{{$challenge->deadline}}" disabled>
            </div>

            <div class="form-group">
                <label>Answer</label>
                <input type="text" class="form-control" name="answer" id="name">
            </div>

            <input type="submit" name="send" value="Submit" class="btn btn-primary btn-block">
        </form>
    </div>
</body>
</html>
