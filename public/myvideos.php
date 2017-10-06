<?php
include 'header.php';
include 'nav.php';
$result = mysqli_query($mysqli, "SELECT * FROM videogame ORDER BY id DESC");
?>
<hr/>
    <form action="" method="GET" class="text-right col-md-6 pull-right">
        <div>
            <div class="input-group">
                <input type="text" class="form-control" name="searchvideotheque" placeholder="Rechercher dans ma vidéothèque ..."/>
                <span class="input-group-btn">
            <button class="btn btn-info" type="submit">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
            </div>
        </div>
    </form>
<h3>Mes Vidéos</h3>
<hr/>
<div class="col-md-10 col-sm-9">
    <?php

    if (!empty($_GET['searchvideotheque'])) :
        $resultsearch = mysqli_query($mysqli, "select * from videogame where name LIKE '%". $_GET['searchvideotheque'] . "%' LIMIT 0 , 10");

        while($res = mysqli_fetch_array($resultsearch)) : ?>

            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="<?= $res['url_image'] ?>" alt="<?= $res['name'] ?>" class="img-responsive" />
                    <h3><?= $res['name'] ?></h3>
                    <a href="delete.php?id=<?= $res['id'] ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure you want to delete?')">
                        <span class="glyphicon glyphicon-remove thumbnail-igdb-button"></span>
                    </a>
                </div>
            </div>
       <?php endwhile; else:

        while ($req = mysqli_fetch_array($result)) : ?>

            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="<?= $req['url_image'] ?>" alt="<?= $req['name'] ?>">
                    <h3><?= $req['name'] ?></h3>
                    <a href="delete.php?id=<?= $req['id'] ?>" class="btn btn-danger center-block" onClick="return confirm('Are you sure you want to delete?')">
                        <span class="glyphicon glyphicon-erase"></span> Delete
                    </a>
                </div>
            </div>
        <?php endwhile;
    endif;
    ?>
</div>
    <?php include 'footer.php'; ?>
