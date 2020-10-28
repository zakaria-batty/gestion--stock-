<?php
include('../../includes/header.php');
include('../../includes/connect.php');

if (isset($_POST['Ajouter'])) :

    $nom = htmlentities($_POST['nom']);
    $prix = htmlentities($_POST['Prix']);
    $ville = htmlentities($_POST['ville']);
    $fournisseur = htmlentities($_POST['fournisseur']);
    $quantite = htmlentities($_POST['quantite']);

    $query = "INSERT INTO `produit` (`id`, `nom_produit`, `prix`, `ville`, `id_fournisseur`, `quantite`) 
              VALUES ('', '$nom', '$prix', '$ville', '$fournisseur', '$quantite');";
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
            <div class="card bg-secondary">
                <div class="card-header text-white">Ajouter un produit</div>
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
                    <form method="post">
                        <div class="form-group">
                            <label for="nom">Nom produit*</label>
                            <input type="text" name="nom" class="form-control" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prix*</label>
                            <input type="text" name="Prix" class="form-control" placeholder="Prix">
                        </div>
                        <div class="form-group">
                            <label for="mat">Nom fournisseure*</label>
                            <select name="fournisseur" class="custom-select">
                                <?php
                                $query = "SELECT * FROM fournisseur ";
                                $run = mysqli_query($connect, $query);
                                while ($call = mysqli_fetch_array($run)) {
                                ?>
                                    <option value="<?= $call['id'] ?>"><?= $call['nom'] ?> & <?= $call['prenom'] ?> </option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="depart">ville*</label>
                            <input type="text" name="ville" class="form-control" placeholder="ville">
                        </div>
                        <div class="form-group">
                            <label for="poste">quantité*</label>
                            <input type="text" name="quantite" class="form-control" placeholder="quantite">
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