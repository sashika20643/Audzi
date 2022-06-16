<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            height: 100vh;
            background-size: cover;
            display:flex;    
            justify-content: center;
            align-items: center;
            background-image: url({{asset("assets/images/bg001.jpg")}});
           
        }
        .middle{
           display: flex;

           justify-content: center;
           align-items: center;
           flex-direction: column;
           text-align: center;
        } 
        .middle h1{
            color: rgb(11, 57, 97);
            font-size: 68px;
            font-weight: bolder;
        }
        .middle button{
            padding: 10px 20px 10px 20px; 
            font-size: 20px;
            font-weight: 300;
            cursor: pointer;
            border: none;
        }

        

    </style>
</head>
<body>
    
   
    <div class="middle">
        <h1>AudZi</h1>
        <a href="/login"><button>Login</button></a>
    </div>
</body>
</html>