<!DOCTYPE html>
<html>
<head><title>List of Books</title></head>
<body>
    <h1>List of Books</h1>
    <?php if (session()->getFlashdata('message')): ?>
        <p style="color: green;"><?= esc(session()->getFlashdata('message')) ?></p>
    <?php endif; ?>

    <a href="/books/create">Add Book</a>
    <table border="1" cellpadding="8">
        <tr>
            <th>Title</th><th>Author</th><th>Genre</th><th>Year</th><th>Actions</th>
        </tr>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?= esc($book['title']) ?></td>
            <td><?= esc($book['author']) ?></td>
            <td><?= esc($book['genre']) ?></td>
            <td><?= esc($book['publication_year']) ?></td>
            <td>
                <a href="/books/edit/<?= $book['id'] ?>">Edit</a>
                <form action="/books/delete/<?= $book['id'] ?>" method="post" style="display:inline"
                      onsubmit="return confirm('Are you sure you want to delete this book?');">
                    <?= csrf_field() ?>
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>