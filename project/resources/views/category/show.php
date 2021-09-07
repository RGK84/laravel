<h2>Категория № <?= $id ?></h2>

<?php foreach($newsList as $news): ?>
    <?php if($news['category_id'] == $id): ?>
        <div>
            <h2><a href=<?= route('news.show', ['id' => $news['id']]) ?>><?= $news['title'] ?></a> </h2>
            <p><?= $news['category'] ?></p>
            <p><?= $news['description'] ?></p>
        </div><br>
    <?php endif; ?>
<?php endforeach; ?>