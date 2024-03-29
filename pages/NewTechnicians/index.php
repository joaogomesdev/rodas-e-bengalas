<?php
require_once(dirname(__FILE__, 3) . "/src/user/User.php");
require_once(dirname(__FILE__, 3) . "/src/database/connection.php");

session_start();
$error = "";

$user = User::get_by_id($_SESSION['id']);

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $fName = $_POST['first-name'];
  $lName = $_POST['last-name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $url = $_POST['url'];

  User::create($email, $password, 2, $fName, $lName,  $url);

  header("location: ../ManageTechnicians");
 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="../../assets/images/favicon.png">
  <script src="https://cdn.tailwindcss.com"></script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="./index.js"></script>


  <title>Admin | Dashboard</title>
  
</head>
<body>


<div class="header-container fixed w-full z-10 top-0">
    <header class="header">
      <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
      <a href="../ManageTechnicians" class="bg-gray-400 hover:bg-gray-500 py-3    px-3 rounded inline-flex items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#FFF">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                  </a>
          <div class="flex justify-start lg:w-0 lg:flex-1">
            <a href="#">
              <span class="sr-only">Rodas e Bengalas</span>
              <img class="h-20" src="../../assets/images/icon.png" alt="">
            </a>
          </div>
        
          <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
            <a href="../Profile" class="">

                        <div class="flex-shrink-0 h-10 w-10">
                          <img class="h-10 w-10 rounded-full" src="<?= $user->get_photo();?>" alt="">
                        </div>

            </a>

            <a href="../../src/session/logout.php" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-10 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-red-400 hover:bg-red-500">
              Sair
            </a>
          </div>
          </div>
        </header>
</div>

<div class="content">
  
  
    <form action="" class="create-orphanage-form" method="post">
          <fieldset>
            <legend>Registar novo técnico</legend>
            <div class="input-block">
              <label for="first-name">Primeiro nome</label>
                <input 
                  required
                  id="first-name" 
                  name="first-name"
                />
            </div>

            <div class="input-block">
              <label for="last-name">Ultimo nome</label>
                <input 
                  required
                  id="last-name" 
                  name="last-name"
                  autocomplete="off"
                />
            </div>

            <div class="input-block">
              <label for="email">E-Mail</label>
              <input 
                  type="email"
                  required
                  id="email" 
                  name="email"
                  autocomplete="off"
                />
            </div>

            <div class="input-block">
              <label for="password">Password</label>
                <input 
                  type="password"
                  required
                  id="password" 
                  name="password"
                  autocomplete="off"
                />
            </div>

            <div class="input-block">
              <label for="url">URL da foto</label>
                <input 
                  required
                  id="url" 
                  name="url"
                  autocomplete="off"
                />
            </div>

           
          </fieldset>

        
          <button class="confirm-button" type="submit">
            Confirmar
          </button>
        </form>
    
</div>




</body>
</html>