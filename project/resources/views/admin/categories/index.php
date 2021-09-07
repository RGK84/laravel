<h1>Админка: Список категорий</h1>

<?php foreach($categoryList as $category): ?>
	<div>
		<h2>№ <?= $category['id'];?>: <?= $category['title'] ?></h2>
	</div><br>
<?php endforeach; ?>