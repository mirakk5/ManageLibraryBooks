<!DOCTYPE html>
<html>
<head><title>Add Book</title></head>
<body>
    <h1>Add Book</h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <ul style="color: red;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="/books/store" method="post">
        <?= csrf_field() ?>
        <label>Title: <input type="text" name="title" value="<?= old('title') ?>"></label><br>
        <label>Author: <input type="text" name="author" value="<?= old('author') ?>"></label><br>
        <label>Genre: <input type="text" name="genre" value="<?= old('genre') ?>"></label><br>
        <label>Publication Year: <input type="text" name="publication_year" value="<?= old('publication_year') ?>"></label><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>