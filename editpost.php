<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (!authenticated()) {
    Header('Location:/index.php');
} ?>

<main>
    <h1>Edit Post</h1>
    <form action="app/posts/editpost.php" method="post">
        <div class="editPostForm">
            <label for="editTitle">Edit title</label>
            <input type="text" name="editTitle" id="editTitle">

            <label for="editUrl">Edit URL</label>
            <input type="url" name="editUrl" id="editUrl">

            <label for="editDescription">Edit description</label>
            <input type="text" name="editDescription" id="editDescription">
            <button type="submit">Edit post</button>
        </div>

    </form>
</main>


<?php require __DIR__ . '/views/footer.php';
