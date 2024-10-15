<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"  >
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    
    <H1>Hello User</H1>
    <a href="{{route('user-comment',$user->id)}}" class="btn btn-primary">Give Feedback</a>
</body>
</html>