<?php /* @var $newsList[] array */?>
/**
 * Created 10.04.2018 23:13 by E. Hilevsky
 */

<?php foreach($newsList as $item): ?>

    <h1><?= $item['title']?></h1>
    <p><?= $item['content']?></p>

    <hr>

<?php endforeach;