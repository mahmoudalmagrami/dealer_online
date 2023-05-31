<!DOCTYPE html>
<html lang="ltr">
<head>
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            margin: 0 auto;
            padding: 20px;
            max-width: 500px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

        input[type=email], input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 3px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type=submit]:hover {
            background-color: #3e8e41;
        }

        .text-danger {
            color: #dc3545 !important;
        }
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
    </style>

</head>
<body>
<div class="container">
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <h1>Forgot Password</h1>
    <form method="POST" action="/api/update-email-password">
        <?php echo csrf_field(); ?>
        <input type="hidden" id="base64String" name="base64String" value=<?php echo e($base64String); ?>>
        <input type="password" id="password" name="password" placeholder="Enter your new password" required>
        <?php if($errors->has('password')): ?>
            <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
        <?php endif; ?>
        <input type="password" id="password_confirmation" name="password_confirmation"
               placeholder="Confirm your new password" required>
        <?php if($errors->has('password_confirmation')): ?>
            <span class="text-danger"><?php echo e($errors->first('password_confirmation')); ?></span>
        <?php endif; ?>
        <input type="submit" value="Reset Password">
    </form>
</div>

<script>
    const password = document.getElementById("password"),
        confirm_password = document.getElementById("password_confirmation");

    function validatePassword() {
        if (password.value !== confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>
<?php /**PATH D:\laravelProjects\yma-api\resources\views/forgot_password.blade.php ENDPATH**/ ?>