<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"  >

 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="container p-3 border border-5 rounded-3" style="width:35%">
        <h1 class="display-6 text-center p-2 bg-light"> Password Reset </h1>
        <form action="forgot_password_process.php" method ="post">
            <div class="row mb-3 justify-content-md-center">
                <div class="col-auto">
                    <input type="email" name="email" class="form-control" placeholder="Email address" >
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary" name="reset">Reset</button>
                </div>
            </div>
        </form> 
        

    </div>
</body>
</html>