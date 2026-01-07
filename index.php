<?php
$file = "posts.txt";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    file_put_contents($file, "$title|$content\n", FILE_APPEND);
}

$posts = file_exists($file) ? file($file) : [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Blog</title>
</head>
<body>

<h2>Create Post</h2>
<form method="post">
    <input name="title" placeholder="Title" required><br><br>
    <textarea name="content" placeholder="Content" required></textarea><br><br>
    <button type="submit">Publish</button>
</form>

<h2>Posts</h2>
<?php foreach ($posts as $post):
    list($t, $c) = explode("|", trim($post));
?>
    <h3><?php echo htmlspecialchars($t); ?></h3>
    <p><?php echo htmlspecialchars($c); ?></p>
<?php endforeach; ?>

</body>
</html>
