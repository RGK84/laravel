<h1>Список категорий</h1>

<?php foreach($categoryList as $category): ?>
	<div>
		<h2>№ <?= $category['id'];?>: <a href=<?= route('category.show', ['id' => $category['id']]) ?>><?= $category['title'] ?></a></h2>
	</div><br>
<?php endforeach; ?>