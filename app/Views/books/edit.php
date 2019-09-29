<?= view("templates/header") ?>

<div class="container">
	<h1 class="display-4">Edit Book</h1>

	<div class="row">
		<div class="col">
			<?= view('books/form', ['book' => $book]) ?>
		</div>
		<div class="col-md"></div>
		<div class="col-xl"></div>
	</div>

</div>

<?= view("templates/footer") ?>
