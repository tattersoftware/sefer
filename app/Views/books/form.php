
	<?= form_open(isset($book) ? "books/{$book->id}" : 'books') ?>

		<div class="form-group">
			<?= form_label('Book title', 'title') ?>
			
			<?= form_input('title', set_value('title', $book->title ?? '', false), 'class="form-control" id="title" placeholder="Enter title"') ?>
		</div>
		
		<div class="form-group">
			<?= form_label('ISBN #', 'isbn') ?>
			
			<?= form_input('isbn', set_value('title', $book->isbn ?? '', false), 'class="form-control" id="isbn" placeholder="Enter ISBN"') ?>
		</div>
		
		<div class="form-group">
			<?= form_label('Slug', 'slug') ?>
			
			<?= form_input('slug', set_value('title', $book->slug ?? '', false), 'class="form-control" id="slug" placeholder="Enter slug shorthand"') ?>
		</div>
	
		<?= form_submit('submit', isset($book) ? 'Update' : 'Create', 'class="btn btn-primary"') ?>
	
	<?= form_close() ?>