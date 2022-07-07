<?php 
include'change_password_process.php' 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"  >

</head>
<body>
<div class="container p-3 border border-5 rounded-3" style="width:40%">
        <h1 class="display-6 text-center p-2 bg-light"> Change Password </h1>
        <form action="" method="post">
            <div class="row mb-3 justify-content-md-center">
                <label for="inputEmail" class="col-4 col-form-label">Email</label>
                <div class="col-lg-auto">
                    <input type="email" name="email" id="inputEmail" class="form-control" required placeholder="Example@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="example@ex.com">
                </div>
                <div class="row mb-3 justify-content-md-center">
                    <label for="inputPassword" class="col-4 col-form-label">New Password</label>
                    <div class="col-lg-auto">
                        <input type="password" name="new_password" id="inputPassword" class="form-control" required  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters">
                    </div>
                    <div class="row mb-3 justify-content-md-center">
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary" name="change">Change</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>