<?php
include("includes/header.php");
include("includes/connect.php");

if (isset($_POST['login'])) :

  $email = htmlentities($_POST['email']);
  $password = htmlentities($_POST['password']);

  $query = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
  $run = mysqli_query($connect, $query);

  $result = mysqli_fetch_array($run);
  if ($result) {
    $_SESSION['username'] = $result['nom'];
    header("location:app/index.php");
  } else {
    header("location:index.php?message=err");
  }
endif;

?>
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card mt-4">

        <?php
        if (isset($_GET['message']) && $_GET['message'] == 'err') :
          echo "<div class='alert alert-danger'>mauvais nom d'utilisateur ou mot de passe</div>";
        endif;
        ?>

        <form method="post" action="" class="formule p-4">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="example@gmail.com">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="************">
          </div>
          <button type="submit" name="login" class="btn btn-primary" style="width: 13rem;">login</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include("includes/footer.php");
?>