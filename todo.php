
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="content">

        <form class="form" id="todoForm">
            <div class="form-row">
                <label class="form-label" for="todoMessage">Podaj treść zadania todo</label>
                <textarea class="form-message" name="todoMessage" id="todoMessage"></textarea>
            </div>
            <div class="form-row">
                <button type="submit" class="button form-button">Dodaj zadanie</button>
            </div>
        </form>

        <section class="list-cnt">
            
            <div class="list" id="todoList">
                <div class="element" >
                    <div class="element-bar">
                    
                    </div>
                </div>
            </div>

        </section>
    </div>

    <template id="elementTemplate">
        <div class="element-bar">
        </div>
        <div class="element-text">

        </div>
    </template>

    
</body>
    <script src="main2.js"></script>
</html>