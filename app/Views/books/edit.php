<!DOCTYPE html>
<html>
<head><title>Edit Book</title></head>
<body>
    <h1>Edit Book</h1>
    <?php if (session()->getFlashdata('errors')): ?>
        <ul style="color: red;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="/books/update/<?= $book['id'] ?>" method="post">
        <?= csrf_field() ?>
        <label>Title: <input type="text" name="title" value="<?= old('title', $book['title']) ?>"></label><br>
        <label>Author: <input type="text" name="author" value="<?= old('author', $book['author']) ?>"></label><br>
        <label>Genre: <input type="text" name="genre" value="<?= old('genre', $book['genre']) ?>"></label><br>
        <label>Publication Year: <input type="text" name="publication_year" value="<?= old('publication_year', $book['publication_year']) ?>"></label><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>