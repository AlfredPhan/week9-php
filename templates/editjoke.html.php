<!-- editjoke.html.php -->
<form action="" method="post">
    <input type="hidden" name="jokeid" value="<?= htmlspecialchars($joke['id'], ENT_QUOTES, 'UTF-8'); ?>">
    <label for="joketext">Edit your joke here:</label>
    <textarea name="joketext" rows="3" cols="40" required><?= htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8'); ?></textarea>
    <br>
    <br>
    <label for="authors">Select Author:</label>
    <select id="authors" name="authors" required>
        <?php foreach ($authors as $author): ?>
            <option value="<?= htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8') ?>"
            <?= $author['id'] == $joke['authorid'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8') ?>
        </option>
        <?php endforeach; ?>
    </select>
    <label for="categories">Select Category:</label>
    <select id="categories" name="categories" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?= htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8') ?>"
                <?= $category['id'] == $joke['categoryid'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="submit" name="submit" value="Save">
</form>
