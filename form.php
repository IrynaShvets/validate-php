<?php
session_start();

if (isset($_SESSION['title'])) {
    $title = $_SESSION['title'];
}
if (isset($_SESSION['annotation'])) {
    $annotation = $_SESSION['annotation'];
}
if (isset($_SESSION['content'])) {
    $content = $_SESSION['content'];
}
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
if (isset($_SESSION['views'])) {
    $views = $_SESSION['views'];
}
if (isset($_SESSION['date'])) {
    $date = $_SESSION['date'];
}
if (isset($_SESSION['is_publish'])) {
    $isPublish = $_SESSION['is_publish'];
}
if (isset($_SESSION['publish_in_index'])) {
    $publishInIndex = $_SESSION['publish_in_index'];
}
if (isset($_SESSION['category'])) {
    $category = $_SESSION['category'];
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $annotation = $_POST['annotation'];
    $content = $_POST['content'];
    $email = $_POST['email'];
    $views = $_POST['views'];
    $date = $_POST['date'];
    $isPublish = $_POST['is_publish'];
    $publishInIndex = $_POST['publish_in_index'];
    $category = $_POST['category'];

    $_SESSION['title'] = $_POST['title'];
    $_SESSION['annotation'] = $_POST['annotation'];
    $_SESSION['content'] = $_POST['content'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['views'] = $_POST['views'];
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['isPublish'] = $_POST['is_publish'];
    $_SESSION['publishInIndex'] = $_POST['publish_in_index'];
    $_SESSION['category'] = $_POST['category'];

    echo $title . '<br>';
    echo $annotation . '<br>';
    echo $content . '<br>';
    echo $email . '<br>';
    echo $views . '<br>';
    echo $date . '<br>';
    echo $isPublish . '<br>';
    echo $publishInIndex . '<br>';
    echo $category . '<br>';

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Test</title>
</head>

<body>

    <ul class="menu">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="form.php">Form</a>
        </li>
    </ul>

</body>

</html>