<?php
include('../../includes/header.php');
include('../../includes/connect.php');

if (isset($_POST['Ajouter'])) :

    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $telephone = htmlentities($_POST['telephone']);
    $ville = htmlentities($_POST['ville']);
    $email = htmlentities($_POST['email']);

    $query = "INSERT INTO `fournisseur` (`id`, `nom`, `prenom`, `telephone`, `ville`, `email`)
             VALUES ('', '$nom', '$prenom', '$telephone', '$ville', '$email');";
    $run = mysqli_query($connect, $query);
    if ($run) {
        header('location:ajouter.php?message=ajouter');
    } else {
        header('location:ajouter.php?message=err');
    }
endif;

?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card bg-secondary ">
                <div class="card-header text-white">Ajouter un fournisseur</div>
                <div class="card-body bg-light">
                    <a href="../index.php" class="btn btn-sm btn-primary mr-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <?php
                    if (isset($_GET['message']) && $_GET['message'] == 'ajouter') :
                        echo "<div class='alert alert-success'>le demande ajouter a été avec succès</div>";
                    endif;
                    if (isset($_GET['msg']) && $_GET['msg'] == 'err') :
                        echo "<div class='alert alert-danger'>Veuillez réessayer</div>";
                    endif;
                    ?>
                    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group">
                            <label for="nom">Nom*</label>
                            <input type="text" name="nom" class="form-control" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom*</label>
                            <input type="text" name="prenom" class="form-control" placeholder="Prénom">
                        </div>
                        <div class="form-group">
                            <label for="mat">téléphone*</label>
                            <input type="text" name="telephone" class="form-control" placeholder="0766554433">
                        </div>
                        <div class="form-group">
                            <label for="depart">Ville*</label>
                            <input type="text" name="ville" class="form-control" placeholder="Ville">
                        </div>
                        <div class="form-group">
                            <label for="poste">Email*</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="Ajouter">Ajouter</button>
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