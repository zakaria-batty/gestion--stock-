<?php
include('../includes/header.php');
include('../includes/connect.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card mx-auto my-4 bg-secondary text-white">
                <div class="card-header">
                    <div class="table-responsive">
                        <table class="table">

                            <thead>
                                <tr style="text-align: center;">
                                    <?php
                                    $query = "SELECT * FROM produit";
                                    $runquery = mysqli_query($connect, $query);
                                    while ($data = mysqli_fetch_array($runquery)) {
                                    ?>
                                        <th scope="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $data['nom_produit'] ?></h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">prix: <?= $data['prix'] ?>$</h6>
                                                    <h5 class="card-title">Quantité: <?= $data['quantite'] ?></h5>
                                                </div>
                                            </div>
                                        </th>
                                    <?php } ?>

                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>

                <div class="card-body">
                    <!-- -------------------------------------nav-bar------------------------------------ -->
                    <div>
                        <a href="?edithome=true" class=" btn btn-sm btn-light mr-2 mb-2">
                            <i class="fas fa-home"></i>
                        </a>
                        <a href="produit/ajouter.php" class=" btn btn-sm btn-light mr-2 mb-2">
                            <i class="fas fa-plus"> ajouter produit</i>
                        </a>
                        <a href="?editproduit=true" class=" btn btn-sm btn-light mr-2 mb-2">
                            <i class="fas fa-home"> Tout les produits</i>
                        </a>
                    </div>
                    <!-- ------------------------------------------------------------------------- -->
                    <?php if (isset($_GET['editproduit'])) : ?>
                        <!-- -------------------------------------produit------------------------------------ -->
                        <div class="card-footer">
                            <h5 class="card-title">Tout les produits</h5>
                        </div>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nom produit</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Nom fournisseur</th>
                                    <th scope="col">Ville</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Ajouter</th>
                                    <th scope="col">supprimer</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php
                                $query = "SELECT produit.id, produit.nom_produit, produit.prix, produit.ville, produit.quantite, fournisseur.nom FROM produit LEFT JOIN fournisseur ON produit.id_fournisseur = fournisseur.id";
                                $run = mysqli_query($connect, $query);
                                while ($call = mysqli_fetch_array($run)) {
                                ?>
                                    <tr>
                                        <td><?= $call['nom_produit'] ?></td>
                                        <td><?= $call['prix'] ?></td>
                                        <td><?= $call['nom'] ?></td>
                                        <td><?= $call['ville'] ?></td>
                                        <td><?= $call['quantite'] ?></td>
                                        <td>
                                            <a href="produit/modifier.php?id=<?= $call['id'] ?>" class="btn bnt-sm btn-primary mr-1"><i class="fa fa-plus"></i></a>
                                        </td>
                                        <td class="d-flex flex-row">
                                            <form method="post" action="produit/supprimer.php">
                                                <input type="hidden" name="supprimer" value="<?= $call['id'] ?>">
                                                <button class="btn bnt-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    <?php else : ?>
                        <!-- -------------------------------------clients------------------------------------ -->
                        <div class="card-footer">
                            <h5 class="card-title">les clients</h5>
                            <a href="client/ajouter.php" class=" btn btn-sm btn-light mr-2 mb-2">
                                <i class="fas fa-plus"> ajouter client</i>
                            </a>
                        </div>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">téléphone</th>
                                    <th scope="col">Ville</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php
                                $query = "SELECT * FROM client ";
                                $run = mysqli_query($connect, $query);
                                while ($call = mysqli_fetch_array($run)) {
                                ?>
                                    <tr>
                                        <td><?= $call['nom'] ?></td>
                                        <td><?= $call['prenom'] ?></td>
                                        <td><?= $call['telephone'] ?></td>
                                        <td><?= $call['ville'] ?></td>
                                        <td><?= $call['email'] ?></td>
                                        <td class="d-flex flex-row">
                                            <a href="client/modifier.php?id=<?= $call['id'] ?>" class="btn bnt-sm btn-warning mr-1"><i class="fa fa-edit"></i></a>
                                            <form method="post" class="mr-1" action="client/supprimer.php">
                                                <input type="hidden" name="supprimer" value="<?= $call['id'] ?>">
                                                <button class="btn bnt-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- ----------------------------fournisseur----------------------------------------- -->
                        <div class="card-footer">
                            <h5 class="card-title">les fournisseurs</h5>
                            <a href="fournisseur/ajouter.php" class=" btn btn-sm btn-light mr-2 mb-2">
                                <i class="fas fa-plus"> ajouter fournisseur</i>
                            </a>
                        </div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">téléphone</th>
                                    <th scope="col">Ville</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php
                                $query = "SELECT * FROM fournisseur ";
                                $run = mysqli_query($connect, $query);
                                while ($call = mysqli_fetch_array($run)) {
                                ?>
                                    <tr>
                                        <td><?= $call['nom'] ?></td>
                                        <td><?= $call['prenom'] ?></td>
                                        <td><?= $call['telephone'] ?></td>
                                        <td><?= $call['ville'] ?></td>
                                        <td><?= $call['email'] ?></td>
                                        <td class="d-flex flex-row">
                                            <a href="fournisseur/modifier.php?id=<?= $call['id'] ?>" class="btn bnt-sm btn-warning mr-1"><i class="fa fa-edit"></i></a>
                                            <form method="post" class="mr-1" action="fournisseur/supprimer.php">
                                                <input type="hidden" name="supprimer" value="<?= $call['id'] ?>">
                                                <button class="btn bnt-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('../includes/footer.php'); ?>