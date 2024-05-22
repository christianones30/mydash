<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .password-container {
            position: relative;
        }

        .password-container input[type="password"] {
            padding-right: 30px;
        }

        .password-container i {
            position: absolute;
            top: 50%;
            right: 25px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
     <form action="signup-check.php" method="post">
        <h2>SIGN UP</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <label>Name</label>
        <?php if (isset($_GET['name'])) { ?>
            <input type="text" 
                   name="name" 
                   placeholder="Name"
                   value="<?php echo $_GET['name']; ?>"><br>
        <?php }else{ ?>
            <input type="text" 
                   name="name" 
                   placeholder="Name"><br>
        <?php }?>

        <label>Last Name</label>
        <?php if (isset($_GET['lname'])) { ?>
            <input type="text" 
                   name="last_name" 
                   placeholder="Last Name"
                   value="<?php echo $_GET['lname']; ?>"><br>
        <?php }else{ ?>
            <input type="text" 
                   name="lname" 
                   placeholder="Last Name"><br>
        <?php }?>

        <label>Email</label>
        <?php if (isset($_GET['email'])) { ?>
            <input type="text" 
                   name="email" 
                   placeholder="Email"
                   value="<?php echo $_GET['email']; ?>"><br>
        <?php }else{ ?>
            <input type="text" 
                   name="email" 
                   placeholder="Email"><br>
        <?php }?>

        <label>User Name</label>
        <?php if (isset($_GET['uname'])) { ?>
            <input type="text" 
                   name="uname" 
                   placeholder="User Name"
                   value="<?php echo $_GET['uname']; ?>"><br>
        <?php }else{ ?>
            <input type="text" 
                   name="uname" 
                   placeholder="User Name"><br>
        <?php }?>

        <label>Password</label>
        <div class="password-container">
            <input type="password" 
                   id="password" 
                   name="password" 
                   placeholder="Password">
            <i class="far fa-eye" id="togglePassword"></i>
        </div>
        <br>

        <label>Re Password</label>
        <div class="password-container">
            <input type="password" 
                   id="re_password" 
                   name="re_password" 
                   placeholder="Re_Password">
            <i class="far fa-eye" id="toggleRePassword"></i>
        </div>
        <br>

        <button type="submit">Sign Up</button>
        <a href="index.php" class="ca">Already have an account?</a>
     </form>

     <script>
         const togglePassword = document.querySelector('#togglePassword');
         const password = document.querySelector('#password');
         togglePassword.addEventListener('click', function() {
             const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
             password.setAttribute('type', type);
             this.classList.toggle('fa-eye-slash');
         });

         const toggleRePassword = document.querySelector('#toggleRePassword');
         const rePassword = document.querySelector('#re_password');
         toggleRePassword.addEventListener('click', function() {
             const type = rePassword.getAttribute('type') === 'password' ? 'text' : 'password';
             rePassword.setAttribute('type', type);
             this.classList.toggle('fa-eye-slash');
         });
     </script>
</body>
</html>
