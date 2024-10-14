<?php 
include('header.php');
include('bdd.php');
$bdd = connexion();

//Si l'URL ne contient pas d'id, on redirige vers la page d'accueil
if (empty($_GET['id'])) {
    header('Location: index.php');
}

$requête = $bdd->prepare('SELECT * FROM oeuvres WHERE id = ?');
$requête->execute([$_GET['id']]);
$oeuvre = $requête->fetch();

?> 
    <article id="detail-oeuvre">
        <div id="img-oeuvre">
            <img src="<?= $oeuvre['image']; ?>" alt="<?= $oeuvre['titre']; ?>">
        </div>
        <div id="contenu-oeuvre">
            <h1><?= $oeuvre['titre']; ?></h1>
            <p class="description"><?= $oeuvre['artiste']; ?></p>
            <p class="description-complete">
                <?= $oeuvre['description']; ?>
            </p>
        </div>
    </article>
</main>
<?php include('footer.php'); ?>