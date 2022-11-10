<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SChuelerausweis</title>
    <link rel="stylesheet" href="vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Loggen Sie sich ein</h2>
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5">

            <div class="text-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" id="username" aria-describedby="emailHelp"
                placeholder="Benutzername" name="username">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" placeholder="Passwort" name="password">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-color px-5 mb-5 w-100 login">Einloggen</button></div>
          </form>
        </div>

      </div>
    </div>
  </div>
</body>
<script src="plugin/js/jquery.min.js"></script>
<script src="vendors/js/sweetalert.min.js"></script>
<script src="js/script.js"></script>
</html>