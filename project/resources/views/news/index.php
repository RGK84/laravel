<?php foreach($newsList as $news): ?>
	<div>
		<h2><a href=<?= route('news.show', ['id' => $news['id']]) ?>><?= $news['title'] ?></a></h2>
		<p><a href=<?= route('category.show', ['id' => $news['category_id']]) ?>><?= $news['category'] ?></a></p>
		<p><?= $news['description'] ?></p>
	</div><br>
<?php endforeach; ?>