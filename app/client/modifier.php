<?php
include('../../includes/header.php');
include('../../includes/connect.php');




$id = isset($_GET['id']) ? $_GET['id'] : '';


$query = "SELECT * FROM client WHERE id='$id'";
$run = mysqli_query($connect, $query);
$call = mysqli_fetch_array($run);


if (isset($_POST['modifier'])) :

    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $telephone = htmlentities($_POST['telephone']);
    $ville = htmlentities($_POST['ville']);
    $email = htmlentities($_POST['email']);
    $idform = htmlentities($_POST['id']);

    $query = "UPDATE client SET  `nom`= '$nom', `prenom` = '$prenom', `telephone` = '$telephone', `ville` = '$ville', `email`= '$email' WHERE id= '$idform'";
    $run = mysqli_query($connect, $query);
    if ($run) {
        header('location:modifier.php?message=modifier');
    } else {
        header('location:modifier.php?message=err');
    }
endif;

?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card bg-secondary ">
                <div class="card-header text-white">modifier client</div>
                <div class="card-body bg-light">
                    <a href="../index.php" class="btn btn-sm btn-primary mr-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <?php
                    if (isset($_GET['message']) && $_GET['message'] == 'modifier') :
                        echo "<div class='alert alert-success'>le client a été modifié</div>";
                    endif;
                    if (isset($_GET['message']) && $_GET['message'] == 'err') :
                        echo "<div class='alert alert-danger'>Veuillez réessayer</div>";
                    endif;
                    ?>
                    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">

                        <input type="hidden" name="id" value="<?= $call['id'] ?>">
                        <div class="form-group">
                            <label for="nom">Nom*</label>
                            <input type="text" name="nom" class="form-control" value="<?= isset($call['nom']) ? $call['nom'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom*</label>
                            <input type="text" name="prenom" class="form-control" value="<?= isset($call['prenom']) ? $call['prenom'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="mat">téléphone*</label>
                            <input type="text" name="telephone" class="form-control" value="<?= isset($call['telephone']) ? $call['telephone'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="depart">Ville*</label>
                            <input type="text" name="ville" class="form-control" value="<?= isset($call['ville']) ? $call['ville'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="poste">Email*</label>
                            <input type="text" name="email" class="form-control" value="<?= isset($call['email']) ? $call['email'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="modifier">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../../includes/footer.php');
?>