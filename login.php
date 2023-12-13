<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            background: url("components/pics/background1.png") center/cover no-repeat;
            /* Replace 'your-background-image.jpg' with the path to your background image */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form {
            display: flex;
            width: 620px;
            height: 838px;
            max-width: 100%;
            max-height: 100%;
            background: rgba(255, 255, 255, 0.60);
            border-radius: 50px;
            justify-content: center;
            position: relative;
            margin: 40px;
        }

        .form img {
            max-width: 100%;
            max-height: 100%;
            width: 272px;
            height: 236px;
            background-color: #1F0D52;
            border-radius: 60%;
            transform: translateY(-20%);
        }

        .form input {
            display: grid;
            margin: 40px;

        }

        .form button {
            max-width: 100%;
            max-height: 100%;
            position: absolute;
            margin-top: 20px;
            right: 25%;
            width: 317px;
            height: 64px;
            border-radius: 50px;
            box-shadow: 5px 10px #9677FF;
            color: #1F0D52;

            text-align: center;
            font-family: Chango;
            font-size: 36px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
        p{
            margin-left: 34%;
        }

        .form input {
            max-width: 100%;
            max-height: 100%;
            margin-top: 50px;
            border-radius: 25px;
            background: #FFF;
            width: 528px;
            height: 80px;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            color: #000;

            text-align: left;
            font-family: Archivo;
            font-size: 20px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/chango" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>
    <title>Document</title>
</head>

<body>
    <div class="form">
        <form action="authentication.php" method="post">
            <center><img src="components/pics/uniqquologo.png" alt=""></center>
            <input placeholder="Email" name="email" type="text">
            <input placeholder="Password" name="pass" type="text">
            <button type="submit">Login</button>
            <p>You don't have an account?<a href="signup.php">Signup</a></p>
        </form>
        
    </div>

</body>

</html>