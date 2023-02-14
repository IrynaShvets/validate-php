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


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Palmo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .err {
            background: #ffe6ee;
            border: 1px solid #b1395f;
        }

        .emsg {
            color: #c12020;
            font-weight: bold;
        }
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
            <form name="myForm" style="width: 100%" method="post" action="form.php" onsubmit="return onSubmit()">
            <div class=" form-group row">
                <label for="title" class="col-md-2 col-form-label">Заголовок</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="vtitle" name="title" value="" required minlength="3" maxlength="255">
                    <div class="invalid-feedback">
                    </div>
                    <div id="cname" class="emsg"></div>


                </div>
        </div>
        <div class="form-group row">
            <label for="annotation" class="col-md-2 col-form-label">Аннотация</label>
            <div class="col-md-10">
                <textarea name="annotation" id="vannotation" class="form-control" cols="30" rows="10" maxlength="500"></textarea>

                <div class="invalid-feedback">

                </div><span class="error"></span>
            </div>
        </div>

        <div class="form-group row">
            <label for="content" class="col-md-2 col-form-label">Текст новости</label>
            <div class="col-md-10">
                <textarea name="content" id="vcontent" class="form-control" cols="30" rows="10" maxlength="30000"></textarea>
                <div class="invalid-feedback">
                    <span class="error"></span>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label">Email автора для связи</label>
            <div class="col-md-10">
                <input type="email" class="form-control" id="vemail" name="email" value="" required pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" title="Поле email має бути валідним email і не повинно бути порожнім">
                <div class="invalid-feedback">

                </div><span class="error">*</span>
            </div>
        </div>

        <div class="form-group row">
            <label for="views" class="col-md-2 col-form-label">Кол-во просмотров</label>
            <div class="col-md-10">
                <input type="number" class="form-control" id="vviews" name="views" value="views" min="0" title="Кількість переглядів має бути числом, не повинно бути негативним і в межах розміру UNSIGNED INT">
                <div class="invalid-feedback">
                    <span class="error"></span>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Дата публикации</label>
            <div class="col-md-10">
                <input type="date" class="form-control" id="vdate" name="date" value="date" min="<?php echo date('yyyy-MM-dd'); ?>" step="1">
                <div class="invalid-feedback">
                    <span class="error"></span>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="is_publish" class="col-md-2 col-form-label">Публичная новость</label>
            <div class="col-md-10">
                <input type="checkbox" class="form-control" id="vis_publish" name="is_publish">
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2 col-form-label">Публиковать на главной</label>
            <div class="col-md-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="publish_in_index" required id="vpublish_in_index_yes" value="yes" checked>
                    <label class="form-check-label" for="vpublish_in_index_yes">
                        Да
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="publish_in_index" required id="vpublish_in_index_no" value="no">
                    <label class="form-check-label" for="publish_in_index_no">
                        Нет
                    </label>
                </div>
                <div class="invalid-feedback">

                </div><span class="error">*</span>
            </div>
        </div>

        <div class="form-group row">
            <label for="category" class="col-md-2 col-form-label">Публичная новость</label>
            <div class="col-md-10">
                <select id="vcategory" class="form-control" name="category">
                    <option disabled selected>Выберете категорию из списка..</option>
                    <option value="1">Спорт</option>
                    <option value="2">Культура</option>
                    <option value="3">Политика</option>
                </select>
                <div class="invalid-feedback">
                    <span class="error"></span>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-9">
                <button type="submit" name="submit" class="btn btn-primary">Отправить</button>
            </div>
            <div class="col-md-3">
                <div class="alert alert-success">
                    <button type="button" name="validate" class="btn btn-primary" onclick="return validateForm()">Форма валидна</button>
                </div>
            </div>
        </div>
        </form>

    </div>
    </div>

    <script>
        function validateForm() {
            let valid = true,
                error = "",
                field = "";

            field = document.getElementById("vtitle");
            error = document.getElementById("cname");

            let title = document.forms["myForm"]["title"].value;
            let annotation = document.forms["myForm"]["annotation"].value;
            let content = document.forms["myForm"]["content"].value;
            let email = document.forms["myForm"]["email"].value;
            let views = document.forms["myForm"]["views"].value;
            let date = document.forms["myForm"]["date"].value;
            let is_publish = document.forms["myForm"]["is_publish"].value;
            let publish_in_index = document.forms["myForm"]["publish_in_index"].value;
            let category = document.forms["myForm"]["category"].value;

            if (title === "" || email === "" || publish_in_index === "") {
                field.classList.add("err");
                error.innerHTML = "Name must be 3-255 characters\r\n";
            } else {
                field.classList.remove("err");
                error.innerHTML = "";
            }


        }
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        function onSubmit() {

            let title = document.forms["myForm"]["title"].value;
            let annotation = document.forms["myForm"]["annotation"].value;
            let content = document.forms["myForm"]["content"].value;
            let email = document.forms["myForm"]["email"].value;
            let views = document.forms["myForm"]["views"].value;
            let date = document.forms["myForm"]["date"].value;
            let is_publish = document.forms["myForm"]["is_publish"].value;
            let publish_in_index = document.forms["myForm"]["publish_in_index"].value;
            let category = document.forms["myForm"]["category"].value;

            $.ajax({
                type: "post",
                url: "form.php",
                data: {
                    'title': title,
                    'annotation': annotation,
                    'content': content,
                    'email': email,
                    'views': views,
                    'date': date,
                    'is_publish': is_publish,
                    'publish_in_index': publish_in_index,
                    'category': category,
                },
                cache: true,
                success: function(html) {
                    alert('Data Send');
                    $('#msg').html(html);
                }
            });
            return false;
        }
    </script>
</body>

</html>