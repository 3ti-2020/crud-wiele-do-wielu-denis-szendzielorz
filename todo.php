
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styletodo.css">
</head>
<body>
    <div class="container">
        <div class="item a">

        <form class="form" id="todoForm">
            <div class="form-row"><ul class="ul">
                <li><label class="form-label" for="todoMessage">Podaj treść zadania todo:</label></li>
                <li><textarea class="form-message" name="todoMessage" id="todoMessage"></textarea></li>
                <li><button type="submit" class="button form-button">Dodaj zadanie</button></li></ul>
            </div>
        </form>

        <section class="list-cnt">
            
            <div class="list" id="todoList">
                <div class="element" >
                    <div class="element-bar"></div>
                </div>
            </div>

        </section>

    </div>

    <div class="item b">
        <ul class="ul2">
            <li><a class = "aa" href="todo.php">TODO</a></li>
            <li><a class = "aa" href="karty.php">Karty</a></li>
            <li><a class = "aa" href="https://github.com/3ti-2020/crud-wiele-do-wielu-denis-szendzielorz">GitHub</a></li>
        </ul>

    <template id="elementTemplate">
        <div class="element-bar"></div>
        <div class="element-text"></div>
    </template>

    </div>
    </div>
    
</body>
    <script src="main2.js"></script>
</html>