<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
<center>
    <a href="/">Back</a>
    <h1>Register Form</h1>
    <hr>
    <form method="post" action="/register">
        @csrf
        <label for="username">UserName: </label>
        <input type="text" id="username"  name="username">
        <br>
        <br>
        <label for="email">Email: </label>
        <input type="email" id="email" name="email">
        <br>
        <br>
        <label for="phone">Phone: </label>
        <input type="text" id="phone" name="phone">
        <br>
        <br>
        <label for="password">Password: </label>
        <input type="password" id="password" name="password">
        <br>
        <br>
        <input type="reset" value="Reset">
        <input type="submit" value="Register">
    </form>
</center>
</body>
</html>
