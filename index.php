<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<main>
    <?php $posts = getPosts($pdo); ?>
    <?php foreach ($posts as $post) : ?>
        <article>
            <h1><?php echo $post['title']; ?></h1>
            <a href="<?php echo $post['url']; ?>"><?php echo $post['url']; ?></a>
            <p><?php echo $post['description']; ?></p>
            <?php if (authenticated()) : ?>
                <?php if ($post['user_id'] === $_SESSION['loggedIn']['id']) : ?>
                    <form action="editpost.php" method="post">
                        <button class="editPost" name="editPostId" id="editPostId" type="submit" value="<?php echo $post['id']; ?>">Edit post</button>
                    </form>
                <?php endif; ?>
                <?php if ($post['user_id'] === $_SESSION['loggedIn']['id']) : ?>
                    <form action="/app/posts/deletepost.php" method="post">
                        <button class="deletePost" name="delete" id="delete" type="submit" value="<?php echo $post['id']; ?>">Delete</button>
                    </form>
                <?php endif; ?>
                <p>Upvotes:
                </p>

                <?php if (hasUpvoted($pdo, $post['id'], $_SESSION['loggedIn']['id'])) : ?>
                    <form action="/app/upvotes/removevote.php" method="post">
                        <button class="upvote" name="upvote" id="upvote" type="submit" value="<?php echo $post['id']; ?>">remove upvote</button>
                    </form>
                <?php else : ?>
                    <form action="/app/upvotes/upvote.php" method="post">
                        <button class="upvote" name="upvote" id="upvote" type="submit" value="<?php echo $post['id']; ?>">upvote</button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </article>
    <?php endforeach; ?>


</main>









<?php require __DIR__ . '/views/footer.php';
