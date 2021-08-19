<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' Posts';
?>
<ul id="posts">
    <?php /** @var \App\models\PostRecord[] $posts */
    foreach ($posts as $post) { ?>
        <li data-id="<?= $post->id ?>" class="post">
            <div class="edit-hide"><?= $post->content ?></div>
            <form action="/index.php?r=site/postedit" method="post">
                <input class="edit-show"  type="hidden" name="id" value="<?= $post->id ?>">
                <textarea class="edit-show"  name="content"><?= $post->content ?></textarea>
                <br class="edit-show">
                <span style="color: gray"><?= $post->created_at ?></span>
                <br>
                <button class="save edit-show" type="submit">Save</button>
            </form>
            <form class="edit-show" action="/index.php?r=site/postdelete" method="post">
                <input type="hidden" name="id" value="<?= $post->id ?>">
                <button class="delete" type="submit">Delete</button>
            </form>
            <button class="edit-hide edit">Edit</button>
        </li>
    <?php } ?>
</ul>
<hr>
<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script src="/js/autobahn.js"></script>
<script>
    var conn = new ab.Session('ws://localhost:8083',
        function () {
            conn.subscribe('posts', function (topic, data) {
                $('#posts').append(`
                    <li data-id="${data.id}" class="post">
                        <div class="edit-hide">${data.content}</div>
                        <form action="/index.php?r=site/postedit" method="post">
                            <input class="edit-show"  type="hidden" name="id" value="${data.id}">
                            <textarea class="edit-show"  name="content">${data.content}</textarea>
                            <br class="edit-show">
                            <span style="color: gray">${data.created_at}</span>
                            <br>
                            <button class="save edit-show" type="submit">Save</button>
                        </form>
                        <form class="edit-show" action="/index.php?r=site/postdelete" method="post">
                            <input type="hidden" name="id" value="${data.id}">
                            <button class="delete" type="submit">Delete</button>
                        </form>
                        <button class="edit-hide edit">Edit</button>
                    </li>
                `)

            });
        },
        function () {
            console.warn('WebSocket connection closed');
        },
        {'skipSubprotocolCheck': true}
    );

    $('ul').click('.edit',function(e){
        $(e.target).parent().addClass('editing');
    })
</script>
<style>
    li.post:not(.editing) .edit-show {
        display: none;
    }

    li.post.editing .edit-hide {
        display: none;
    }

</style>
