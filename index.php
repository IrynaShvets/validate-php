<!-- Провалідувати форму
Обов'язкові вимоги:
поле заголовок не повинно бути порожнім, не менше трьох символів, не більше ніж 255 символів.
поле анотація не повинна перевищувати 500 символів.
поле контенту не повинно перевищувати 30 000 символів.
поле emai має бути валідним email. не повинно бути порожнім.
кількість переглядів має бути числом, не повинно бути негативним і в межах розміру UNSIGNED INT.
дата публікації не повинна бути раніше поточної дати, це повинна бути валідна дата.
поле публікувати на головній має бути обов'язковим та містити значення 'yes' або 'no'
поле категрія має бути числом і бути одним із значень [1, 2, 3]
так само за бажанням можна додати свої перевірки.
виводити помилки під невалідним полем -->

<?php

$titleErr = $annotationErr = $contentErr = $emailErr = $viewsErr = $dateErr = $publishInIndexErr = $categoryErr = "";
$title = $annotation = $content = $email = $views = $date = $publishInIndex = $category = "";

if (isset($_POST['submit'])) {

    if (empty($_POST['title'])) {
        $titleErr = "Поле заголовок не повинно бути порожнім";
    } else {
        $title = $_POST["title"];
        if (strlen($annotation) < 3) {
            $titleErr = "Поле заголовок повинно мати не менше трьох символів";
        }
        if (strlen($annotation) > 255) {
            $titleErr = "Поле заголовок повинно мати не більше ніж 255 символів";
        }
    }

    if (isset($_POST["annotation"])) {
        $annotation = $_POST["annotation"];
        if (strlen($annotation) > 500) {
            $annotationErr = "Поле анотація не повинне перевищувати 500 символів";
        }
    }

    if (isset($_POST["content"])) {
        $content = $_POST["content"];
        if (strlen($content) > 30000) {
            $contentErr = "Поле контенту не повинно перевищувати 30 000 символів";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Поле email не повинно бути порожнім";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Поле emai має бути валідним email";
        }
    }

    if (isset($_POST["views"])) {
        $views = test_input($_POST["views"]);
        if (!is_int($views)) {
            $viewsErr = "Кількість переглядів має бути числом";
        }
        if ($views < 0) {
            $viewsErr = "Кількість переглядів не повинно бути негативним";
        }
    }
    //  межах розміру UNSIGNED INT.

    if (isset($_POST["date"])) {
        $date = $_POST["date"];
        if (strtotime($date) > time()) {
            $dateErr = "Дата публікації не повинна бути раніше поточної дати";
        }
    }
    //це повинна бути валідна дата

    if (empty($_POST["publish_in_index"])) {
        $publishInIndexErr = "Поле публікувати на головній має бути обов'язковим";
    }
     else {
        $publishInIndex = $_POST["publish_in_index"];
        if ($publishInIndex !== 'yes' || $publishInIndex !== 'no') {
            $publishInIndexErr = "Поле публікувати на головній має містити значення 'yes' або 'no'";
        }
    }

    if (isset($_POST["category"])) {
        $category = $_POST["category"];
        if (!is_int($category)) {
            $categoryErr = "Поле категрія має бути числом і бути одним із значень [1, 2, 3]";
        }
    }

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Palmo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .error {color: red;}
    </style>
</head>
<body>

<br>
<div class="container">
    <ul class="menu">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="form.php">Form</a>
        </li>
    </ul>

    <div class="row">
    <p><span class="error">* required field</span></p>
        <form style="width: 100%" method="post" target="frame">
            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label">Заголовок</label>
                <div class="col-md-10">
                    <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value=""
                    >
                    <div class="invalid-feedback">

                    </div>
                    <span class="error">* <?php echo $titleErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="annotation" class="col-md-2 col-form-label">Аннотация</label>
                <div class="col-md-10">
                    <textarea
                            name="annotation"
                            id="annotation"
                            class="form-control"
                            cols="30"
                            rows="10"></textarea>
                    <div class="invalid-feedback"> 
                    </div>
                    <span class="error"> <?php echo $annotationErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="content" class="col-md-2 col-form-label">Текст новости</label>
                <div class="col-md-10">
                    <textarea
                            name="content"
                            id="content"
                            class="form-control"
                            cols="30"
                            rows="10"></textarea>
                    <div class="invalid-feedback">
                    </div>
                    <span class="error"> <?php echo $contentErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label">Email  автора для связи</label>
                <div class="col-md-10">
                    <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            value=""
                    >
                    <div class="invalid-feedback">
                    </div>
                    <span class="error">* <?php echo $emailErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="views" class="col-md-2 col-form-label">Кол-во просмотров</label>
                <div class="col-md-10">
                    <input
                            type="text"
                            class="form-control"
                            id="views"
                            name="views"
                            value="views"
                    >
                    <div class="invalid-feedback">
                    </div>
                    <span class="error"> <?php echo $viewsErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="date" class="col-md-2 col-form-label">Дата публикации</label>
                <div class="col-md-10">
                    <input
                            type="date"
                            class="form-control"
                            id="date"
                            name="date"
                            value=""
                    >
                    <div class="invalid-feedback">
                    </div>
                    <span class="error"> <?php echo $dateErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="is_publish" class="col-md-2 col-form-label">Публичная новость</label>
                <div class="col-md-10">
                    <input
                            type="checkbox"
                            class="form-control"
                            id="is_publish"
                            name="is_publish"
                    >
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Публиковать на главной</label>
                <div class="col-md-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="publish_in_index" id="publish_in_index_yes" value="yes" checked>
                        <label class="form-check-label" for="publish_in_index_yes">
                            Да
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="publish_in_index" id="publish_in_index_no" value="no">
                        <label class="form-check-label" for="publish_in_index_no">
                            Нет
                        </label>
                    </div>
                    <div class="invalid-feedback">
                    </div>
                    <span class="error">* <?php echo $publishInIndexErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-md-2 col-form-label">Публичная новость</label>
                <div class="col-md-10">
                    <select id="category" class="form-control" name="category">
                        <option disabled selected>Выберете категорию из списка..</option>
                        <option value="1">Спорт</option>
                        <option value="2">Культура</option>
                        <option value="3">Политика</option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                    <span class="error"> <?php echo $categoryErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-9">
                    <button type="submit" name="submit" class="btn btn-primary">Отправить</button>
                </div>
                <div class="col-md-3">
                    <div class="alert alert-success">
                        <button type="button" name="validate" class="btn btn-primary">Форма валидна</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
<iframe name="frame"></iframe>
</body>
</html>