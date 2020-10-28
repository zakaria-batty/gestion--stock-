<?php
include('../../includes/header.php');
include('../../includes/connect.php');


$id = isset($_GET['id']) ? $_GET['id'] : '';

$query = "SELECT * FROM produit WHERE id='$id'";
$run = mysqli_query($connect, $query);
$call = mysqli_fetch_array($run);

if (isset($_POST['modifier'])) :

    $nom = htmlentities($_POST['nom']);
    $prix = htmlentities($_POST['Prix']);
    $ville = htmlentities($_POST['ville']);
    $fournisseur = htmlentities($_POST['fournisseur']);
    $quantite = htmlentities($_POST['quantite']);
    $idform = htmlentities($_POST['id']);

    $query = "UPDATE produit SET  `nom_produit` = '$nom', `prix` = '$prix', `ville` = '$ville', `id_fournisseur` = '$fournisseur', `quantite` = '$quantite' WHERE id = '$idform'";
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
                <div class="card-header text-white">modifier produit</div>
                <div class="card-body bg-light">

                    <a href="../index.php" class="btn btn-sm btn-primary mr-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>

                    <?php
                    if (isset($_GET['message']) && $_GET['message'] == 'modifier') :
                        echo "<div class='alert alert-success'>le produit a été modifié</div>";
                    endif;
                    if (isset($_GET['message']) && $_GET['message'] == 'err') :
                        echo "<div class='alert alert-danger'>Veuillez réessayer</div>";
                    endif;
                    ?>

                    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">

                    <input type="hidden" name="id" value="<?= $call['id'] ?>">

                        <div class="form-group">
                            <label for="nom">Nom*</label>
                            <input type="text" name="nom" class="form-control" placeholder="Nom" value="<?= isset($call['nom_produit']) ? $call['nom_produit'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prix*</label>
                            <input type="text" name="Prix" class="form-control" placeholder="Prix" value="<?= isset($call['prix']) ? $call['prix'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="mat">Nom fournisseure*</label>
                            <select name="fournisseur" class="custom-select">
                                <?php
                                $query = "SELECT * FROM fournisseur ";
                                $run = mysqli_query($connect, $query);
                                while ($data = mysqli_fetch_array($run)) {
                                ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['nom'] ?> <?= $data['prenom'] ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="depart">ville*</label>
                            <input type="text" name="ville" class="form-control" placeholder="ville" value="<?= isset($call['ville']) ? $call['ville'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="poste">quantité*</label>
                            <input type="text" name="quantite" class="form-control" placeholder="quanite" value="<?= isset($call['quantite']) ? $call['quantite'] : ''; ?>">
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