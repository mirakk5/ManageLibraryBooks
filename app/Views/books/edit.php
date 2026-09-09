<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h1 class="form-title">Edit Book</h1>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-error">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="/books/update/<?= $book['id'] ?>" method="post" class="card form-card">
    <?= csrf_field() ?>
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" value="<?= old('title', $book['title']) ?>">
    </div>
    <div class="form-group">
        <label>Author</label>
        <input type="text" name="author" value="<?= old('author', $book['author']) ?>">
    </div>
    <div class="form-group">
        <label>Genre</label>
        <input type="text" name="genre" value="<?= old('genre', $book['genre']) ?>">
    </div>
    <div class="form-group">
        <label>Publication Year</label>
        <input type="text" name="publication_year" value="<?= old('publication_year', $book['publication_year']) ?>">
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/books" class="btn-link">Cancel</a>
    </div>
</form>

<?= $this->endSection() ?>