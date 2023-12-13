<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Background with Centered Logo</title>
    <style>
        ul {
            list-style-type: none;
            margin-top: 0;
            padding: 0;
            overflow: hidden;
            position: fixed;
            right: 30px;
            top: 40px;
        }

        li {
            float: right;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            width: 100px;
            padding: 14px 16px;
            text-decoration: none;
            color: #FFF;

            text-align: center;
            font-family: Archivo;
            font-size: 24px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: white;
            color: black;
            border-radius: 50px;
        }

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

        #logo {
            position: relative;
        }

        #logo .background{
            background-color: #1F0D52;
            border-radius: 100% ;
        }
        #logo img {
            height: 500px;
            width: 600px;
            max-width: 100%;
            max-height: 100%;
            
        }

        .button {
            position: absolute;
            right: 50%;
            max-width: 100%;
            max-height: 100%;

        }

        .button button {
            border-radius: 50px;
            background: #FFF;
            box-shadow: 6px 5px 3px 4px #9677FF;
            width: 406px;
            height: 96px;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            color: #1F0D52;
            text-align: center;
            font-family: Chango, sans-serif;
            font-size: 40px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        
    </style>
    <link href="https://fonts.cdnfonts.com/css/chango" rel="stylesheet">
</head>

<body>
    <ul>
        <li><a href="#home">Community</a></li>
        <li><a href="#news">Services</a></li>
        <li><a href="#contact">About</a></li>
        <li style="float:right"><a class="active" href="#about">SignUp</a></li>
    </ul>

    <div id="logo">
        <div class="background">
            <img src="components/pics/uniqquologo.png" alt="Logo"><br>
        </div>
        <!-- Replace 'your-logo-image.png' with the path to your logo image -->
        <div class="button">
            <a href="login.php"><button>Login</button></a>
        </div>

    </div>
</body>

</html>