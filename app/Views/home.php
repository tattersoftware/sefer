<?= $this->extend('templates/public') ?>
<?= $this->section('main') ?>

<div class="container">
	<h1 class="display-4" onclick="desktopModal('books/new', {id:'bookForm'});">Welcome</h1>
</div>

<?= $this->endSection() ?>
