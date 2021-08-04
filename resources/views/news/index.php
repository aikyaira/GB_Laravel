<h1>List news</h1>
<br>
<?php foreach ($news as $n) : ?>
    <article>
        <img src="https://picsum.photos/300/180?random=<?= $n['id'] ?>" alt="<?= $n['title'] ?>">
        <a href="<?= route('news.show', ['id'=>$n['id']]) ?>">
            <h3><?= $n['title'] ?></h3>
        </a>
        <p><?= $n['description'] ?></p>
    </article>

    <hr />
<?php endforeach; ?>