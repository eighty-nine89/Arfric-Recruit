<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/general.css">
    <title>Central monitor</title>
    <style>
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #btn{
            padding-left: 0;
            padding-right: 0;
            margin-top: 5rem;
            margin-left: -15rem;
            position: absolute;
            justify-content: center;
            width: 8rem;
            background-color:  #6B43FF;
            color: white;
            padding: 10px 20px;
            border: none;
            font-size: 18px lighter;
            border-radius: 10px;
            -webkit-border-radius:10px;
            -moz-border-radius:10px;
            -ms-border-radius: 10px;
            -o-border-radius: 10px;
            box-shadow: 7px 18px 12px rgba(0, 0,0,0.1);
            cursor: pointer;
        }

        #btn:hover {
        background-color:  #6B43FF;  
        box-shadow: 10px 12px 15px rgba(0, 0,0,0.5);
        }
    </style>
</head>
<body>
<div class="welcome-text">
    <h3>Hello there, welcome to Central Monitor!</h3>
    </div><br><br><br>
    <div class="logout">
    <button type="submit" id="btn" onclick="document.location='#'">Log out</button>
    </div></body>
</html>