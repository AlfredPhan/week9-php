<!-- jokes.html.php -->
<p><?=$totalJokes?> jokes have been submitted to the Internet Joke Database.</p>
<?php foreach ($jokes as $joke): ?>
    <blockquote>
        <?= htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8') ?>
        <br>
        <br/> <?=htmlspecialchars($joke['category_name'], ENT_QUOTES,'UTF-8') ?>
        (by <a href="mailto:<?= htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8'); ?>">
        <?= htmlspecialchars($joke['author_name'], ENT_QUOTES, 'UTF-8'); ?></a>)
        
        
    </blockquote>
<?php endforeach; ?>
