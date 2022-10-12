
<?php
  if (isset($_POST['login'])) {
   $connection = new mysqli( 'localhost', 'root', '', 'jquery');

    $email =$connection -> real_escape_string ($_POST['emailPHP']);
    $password = md5($connection ->  real_escape_string($_POST['passwordPHP']));

    $data =$connection -> query( query: "SELECT id FROM userr WHERE email='$email' AND pass='$password'");
    if ($data->num_rows > 0) {
      exit('<font color="blue"> Login Success..</font>');
    }else
      exit('<font color="red"> Please Check Your Input!!..</font>');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Login Jquery</title>
 
</head>
<body class="h-14 bg-gradient-to-r from-cyan-500 to-blue-500">
 <div class="bg-white w-full lg:max-w-full md:mx-auto md:mx-0 md:w-3/4 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
          flex items-center justify-center">

          <div class="w-full h-100 bg">

          <h1 class="text-xl font-bold">WELCOME </h1>
        <h1 class="text-xl md:text-2xl font-bold leading-tight mt-9">Login to your account</h1>

        <form class="mt-6" action="" autocomplete="off"  method="post" action="login.php" class="mt-6" action="" autocomplete="off" method="post" >

        <div class="logina8">
        <div>
    <input type="text" id="email" placeholder="email.." class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required><br>
        </div>

    <div>
    <input type="password" id="password" placeholder="password.."><br>
    </div>
    <input type="button" value="Log in" id="login">
  </form>
  <p id="response"></p>
</div>
  


  <script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function (){
      $("#login").on('click', function (){
        var email = $("#email").val();
        var password = $("#password").val();

        if(email == "" || password == "" )
          alert('isi lah woi'); 
          else{
            $.ajax(
             {
               url: 'login.php',
               method: 'POST',
               data: {
                 login: 1,
                 emailPHP: email,
                 passwordPHP: password
               },
               success: function (response){
                $("#response").html(response);
               },
               dataType: 'text'
             }
            );
          }
      });
    });
  </script> 
</body>
</html>