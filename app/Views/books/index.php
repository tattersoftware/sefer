<?= view("templates/header") ?>

<div class="container">
	<h1 class="display-4">Books</h1>

	<?php if (empty($books)): ?>
	
	<p>You don't have any books! Would you like to <?= anchor('books/new', 'add one now') ?>?</p>
	
	<?php else: ?>

	<div class="card-deck">

		<?php foreach ($books as $book): ?>

		<div class="card book" data-id="<?= $book->id ?>">
			<img src="<?= $book->image_cover ?? base_url('assets/book.png') ?>" class="card-img-top" alt="Book cover">
			<div class="card-body">
				<h5 class="card-title"><?= $book->title ?></h5>
				<p class="card-text"><small class="text-muted"><?= anchor("books/{$book->id}/edit", $book->slug) ?></small></p>
			</div>
		</div>
		
		<?php endforeach; ?>

	<?php endif; ?>
	
</div>

<?= view("templates/footer") ?>
