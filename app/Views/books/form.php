
	<?= form_open(isset($book) ? "books/{$book->id}" : 'books', ['onsubmit'=>'return submitValidateCallback(this);']) ?>

		<div class="form-group">
			<label for="title">Book title</label>
			<input name="title" type="text" value="<?= set_value('title', $book->title ?? '') ?>" class="form-control" id="title" placeholder="Enter title" />
		</div>
		
		<div class="form-group">
			<label for="isbn">ISBN #</label>
			<input name="isbn" type="text" value="<?= set_value('isbn', $book->isbn ?? '') ?>" class="form-control" id="isbn" placeholder="Enter ISBN" />			
		</div>
		
		<div class="form-group">
			<label for="slug">Slug</label>
			<input name="slug" type="text" value="<?= set_value('slug', $book->slug ?? '') ?>" class="form-control" id="slug" placeholder="Enter slug shorthand" />			
		</div>
	
		<button class="btn btn-primary" type="submit"><?= isset($book) ? 'Update' : 'Create' ?></button>
	
	<?= form_close() ?>
