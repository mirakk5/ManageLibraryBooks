<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h1>List of Books</h1>
    <a href="/books/create" class="btn btn-primary">+ Add Book</a>
</div>

<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success"><?= esc(session()->getFlashdata('message')) ?></div>
<?php endif; ?>

<?php if (empty($books)): ?>
    <div class="card empty-state">No books yet. Add your first one to get started.</div>
<?php else: ?>
<table>
    <thead>
        <tr><th>Title</th><th>Author</th><th>Genre</th><th>Year</th><th>Actions</th></tr>
    </thead>
    <tbody>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?= esc($book['title']) ?></td>
            <td><?= esc($book['author']) ?></td>
            <td><?= esc($book['genre']) ?></td>
            <td><?= esc($book['publication_year']) ?></td>
            <td>
                <div class="actions">
                    <a href="/books/edit/<?= $book['id'] ?>" class="btn btn-outline btn-sm">Edit</a>
                    <form action="/books/delete/<?= $book['id'] ?>" method="post" class="inline"
                          onsubmit="return confirm('Are you sure you want to delete this book?');">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger-outline btn-sm">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>

<?= $this->endSection() ?>