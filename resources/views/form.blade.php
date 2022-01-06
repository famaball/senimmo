<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>




<form action="/logged_in" method="post">
    @csrf
<input type="email" name="email" placeholder="">
<input type="password" name="password" placeholder="">
<button type="submit">valider</button>


</form>
</body>
</html>
