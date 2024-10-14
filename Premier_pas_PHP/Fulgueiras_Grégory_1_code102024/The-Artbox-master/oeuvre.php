<?php include('header.php');
$id = $_GET['id'];
$o = null;

include ('oeuvres.php');
foreach ($oeuvres as $oeuvre) {
    if ($oeuvre['id'] == $id) {
        $o = $oeuvre;
    }
}
?> 
    <article id="detail-oeuvre">
        <div id="img-oeuvre">
            <img src="<?= $o['image']; ?>" alt="<?= $o['titre']; ?>">
        </div>
        <div id="contenu-oeuvre">
            <h1><?= $o['titre']; ?></h1>
            <p class="description"><?= $o['artiste']; ?></p>
            <p class="description-complete">
                <?= $o['description']; ?>
            </p>
        </div>
    </article>
</main>
<?php include('footer.php'); ?>