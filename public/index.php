<?php
include 'header.php';
include 'nav.php';
// include '../connect_bdd.php';	
?>
<div class="col-md-10 col-sm-9">

 <?php

 if (!empty($_POST)) {

     $name = $_POST['name'];
     $id_igdb = $_POST['id_igdb'];
     $url_site = $_POST['url_website'];
     $url_image = $_POST['url_photo'];

     $requestBddAdd = "INSERT INTO videogame (name, id_igdb, url_site, url_image) 
                       VALUES ('$name', '$id_igdb', '$url_site', '$url_image')";

     $result = mysqli_query($mysqli, $requestBddAdd);
 }




 if (!empty($_GET)) : ?>

        <?php
        $svideogame = new GuzzleHttp\Client();
        $rvideogame = $svideogame->request('GET', 'https://api-2445582011268.apicast.io/games/',
            [
                'headers' => ['user-key' => '81b4ac488c4a8a253f37ab6553ea617b'],
                'query' => ['search' => $_GET['search'],
                    'fields' => 'name,cover.cloudinary_id,url',
                ]
            ]
        );

        $arrayreply = json_decode($rvideogame->getBody()->getContents());
//    echo $request->getBody();
        ?>

        <div class="row">
            <hr/>
            <h3>Résultat recherche vidéo</h3>
            <hr/>
            <?php

            foreach ($arrayreply as $value) : ?>

                <div class="col-md-3">
                    <div class="thumbnail">
                        <?php if (!empty($value->cover->cloudinary_id)) : ?>
                            <img class="img-responsive" src="https://images.igdb.com/igdb/image/upload/t_cover_big/<?= $value->cover->cloudinary_id ?>.jpg" alt="<?= $value->name ?>" />
                            <input class="hidden" name="url_photo" id="url_photo" value="https://images.igdb.com/igdb/image/upload/t_cover_big/<?= $value->cover->cloudinary_id ?>.jpg"/>
                        <?php else : ?>
                            <img class="img-responsive" src="http://via.placeholder.com/90x90" alt="Placeholder" />
                            <input class="hidden" name="url_photo" id="url_photo" value="http://via.placeholder.com/90x90 ?>.jpg"/>

                        <?php endif; ?>
                        <div class="caption">
                            <h4 class="ellipsis"><?= $value->name ?></h4>
                            <form action="" class="thumbnail-igdb-button text-right" method="POST">
                                <?php if (!empty($value->cover->cloudinary_id)) : ?>
                                    <input class="hidden" name="url_photo" id="url_photo" value="https://images.igdb.com/igdb/image/upload/t_cover_big/<?= $value->cover->cloudinary_id ?>.jpg"/>
                                <?php else : ?>
                                    <input class="hidden" name="url_photo" id="url_photo" value="http://via.placeholder.com/90x90 ?>.jpg"/>
                                <?php endif; ?>
                            <input class="hidden" name="url_website" id="url_website" value="<?= $value->url ?>"/>
                            <input class="hidden" name="id_igdb" id="id_igdb" value="<?= $value->id ?>"/>
                            <input class="hidden" name="name" id="name" value="<?= $value->name ?>"/>
                                <button class="btn btn-success btn-xs" role="button"><span class="glyphicon glyphicon-plus"></span> Ajouter à ma bibliothèque</button>
                            </form>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>
 </div>

<?php include 'footer.php'; ?>
