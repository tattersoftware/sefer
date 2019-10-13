<?= $this->extend('layouts/public') ?>
<?= $this->section('main') ?>

<div class="container">
	<button type="button" class="btn btn-primary float-right" onclick="return desktopModal('books/new');"><i class="fas fa-plus-circle"></i> New book</button>
	<h1 class="display-4">Books</h1>

	<?php if (empty($books)): ?>
	
	<p>You don't have any books! Would you like to <a href="<?= site_url('books/new') ?>" onclick="return desktopModal('books/new');">add one now</a>?</p>
	
	<?php else: ?>

	<div class="card-deck">

		<?php foreach ($books as $book): ?>

		<div class="card book mb-3" data-id="<?= $book->id ?>" style="min-width: 12rem; max-width: 12rem;">
			<img src="<?= $book->image_cover ?? base_url('assets/book.png') ?>" class="card-img-top" alt="Book cover">
			<div class="card-body">
				<h5 class="card-title"><?= $book->title ?></h5>
				<p class="card-text"><small class="text-muted"><?= anchor("books/edit/{$book->id}", $book->slug) ?></small></p>
			</div>
			<div class="card-footer">
				<a class="card-link btn btn-primary" href="<?= site_url("books/show/{$book->id}") ?>" onclick="return desktopModal('books/show/<?= $book->id ?>');">Open</a>
				<a class="card-link btn btn-link" href="<?= site_url("books/edit/{$book->id}") ?>" onclick="return desktopModal('books/edit/<?= $book->id ?>');">Edit</a>
			</div>
		</div>
	
		<?php endforeach; ?>

	<?php endif; ?>
	
</div>

<?= $this->endSection() ?>
