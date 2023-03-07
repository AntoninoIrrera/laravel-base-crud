<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form Email</title>
</head>
<body>
    <h1>Mail in arrivo dalla tua applicazione Library</h1>
    <h2>La mail dove rispondere è: {{$lead->email}} </h2>
    <h3>La mail della persona che ti ha contattato è: {{$lead->name}} </h3>
    <p>Il messaggio è:</p>
    <p>
        {{$lead->message}}
    </p>
</body>
</html>