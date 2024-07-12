<!-- jokes.html.php -->
 <p><?=$totalJokes?> jokes have been submitted to the Internet Joke Database.</p>
<?php foreach ($jokes as $joke): ?>
    <blockquote>
        <?= htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8') ?>
        <br>
        <br/> <?=htmlspecialchars($joke['category_name'], ENT_QUOTES,'UTF-8') ?>
        (by <a href="mailto:<?= htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8'); ?>">
        <?= htmlspecialchars($joke['author_name'], ENT_QUOTES, 'UTF-8'); ?></a>)
        
        <a href="editjoke.php?id=<?= htmlspecialchars($joke['id'], ENT_QUOTES, 'UTF-8') ?>">Edit</a>
        <?php if (!empty($joke['image'])): ?>
            <img style="float: inline-end;" src="uploads/<?= htmlspecialchars($joke['image'], ENT_QUOTES, 'UTF-8') ?>" alt="Joke Image" width="150">
        <?php endif; ?>
        <form action="../admin/deletejoke.php" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($joke['id'], ENT_QUOTES, 'UTF-8') ?>">
            <input type="submit" value="Delete">
        </form>
    </blockquote>
<?php endforeach; ?>
