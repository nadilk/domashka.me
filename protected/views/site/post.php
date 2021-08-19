<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name.' Post';
?>
<ul>
    <?php /** @var \App\models\PostRecord[] $posts */
    foreach ($posts as $post) {?>
    <li>
        <div><?=$post->content?></div>
        <span style="color: gray"><?= $post->created_at?></span>
    </li>
    <?php } ?>
</ul>
<hr>
<form action="/index.php?r=site/postsubmit" method="post">
    <textarea name="content"></textarea>
    <br>
    <button type="submit">Submit</button>
</form>
