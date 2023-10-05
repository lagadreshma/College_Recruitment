<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Online Job Portal Website">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP , MySQL">
    <meta name="author" content="Reshma Lagad">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit= no">

    <title> Online Job Portal </title>

    <!-- Matrial Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- CSS  -->
    <style>

        .buttons{
            display: flex;
            margin: 200px 300px;
        }
        .buttons ul {
            display: flex;
        }
        .buttons ul li{
            width: 150px;
            list-style-type: none;
            padding: 20px 30px;
            margin: 50px 10px;
            border: 1px solid black;
        }
        .buttons li a{
            font-size: 20px;
            color: white;
            text-decoration: none;
        }
        #admin{
            background: rgb(241, 84, 37);
        }
        #company{
            background: green;
        }
        #employer{
            background: rgb(0,0,0.3);
        }

    </style>
    

  </head>

  <body>

      <div class="buttons">

         <ul>
            <li id="admin"><a href="admin_login.php">Admin Login</a></li>
            <li id="company"><a href="company_login.php">Company Login</a></li>
            <li id="employer"><a href="employer_login.php">Employee Login</a></li>
         </ul>

      </div>

    
  </body>
</html>