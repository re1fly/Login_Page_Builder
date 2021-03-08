<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>

    <title>React Laravel</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<button class="btn btn-primary" type="submit" onClick="saveJson()" style="float: right; margin: 0 20px 0 0">Save Json
</button>
<button class="btn btn-primary" type="submit" onClick="saveHtml()" style="float: right; margin: 0 20px 0 0">Save Html
</button>

<div id="editor-container" style="height: 700px"></div>
<script src="//editor.unlayer.com/embed.js"></script>

</body>
</html>
<script>
    unlayer.init({
        id: 'editor-container',
        projectId: 1,
        displayMode: 'web',
        contentWidth: "700px",
        height: '200px',
        tools: {
            form: {
                properties: {
                    action: {
                        editor: {
                            data: {
                                allowCustomUrl: true,
                                allowAddNewField: true,
                            }
                        }
                    }
                }
            }
        }

    });
    unlayer.setBodyValues({
        backgroundColor: "#e7e7e7",
        fontFamily: {
            label: "Helvetica",
            value: "'Helvetica Neue', Helvetica, Arial, sans-serif"
        },
        preheaderText: "Hello World"
    });

    //get
    const options = {
        method: 'GET',
        headers: {'Content-Type': 'application/json'},
    };
    fetch('http://127.0.0.1:8000/json', options)
        .then(response => {
            return response.json()
        })
        .then(results => unlayer.loadDesign((results.results)))
        .catch(err => console.error(err));

    //post_json
    function saveJson() {
        unlayer.saveDesign((design) => {
            const options = {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    "template": JSON.stringify({design})
                })
            };
            fetch('http://127.0.0.1:8000/json', options)
                .then(response => console.log(response))
                .catch(err => console.error(err));

        })
    }

    //saveHtml
    function saveHtml() {
        unlayer.exportHtml((data) => {
            const options = {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({"template": data.html})
            };
            fetch('http://127.0.0.1:8000/html', options)
                .then(response => console.log(response))
                .catch(err => console.error(err));

            console.log(data)
        })

    }


</script>
