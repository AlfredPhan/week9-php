<form action="../admin/addjoke.php" method="post">
    <label for="joketext">Type your joke here:</label>
    <textarea id="joketext" name="joketext" rows="3" cols="40" required></textarea>

    <select name="authors" required >
        <option value="">Select an author</option>
        <?php foreach ($authors as $author):?>
            <option value="<?=htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8');?>">
                <?=htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8');?>
            </option>
            <?php endforeach; ?>
    </select>

    <select name="categories" required>
        <option value="">Select a category</option>
        <?php foreach ($catagories as $category):?>
            <option value="<?=htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8');?>">
                <?=htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8');?>
            </option>
            <?php endforeach; ?>
    </select>

    <input type="submit" value="Add" required>
</form>
