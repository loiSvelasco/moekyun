
<!DOCTYPE html>
<html>
  
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Mono&display=swap');
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css");

        body {
            font-family: 'Fira Mono', monospace;
            background-color: #f0f0f0;
        }

        h3 {
            color: #db3406;
        }

        div .box {
            /* overflow-wrap: break-word; */
            overflow: scroll-y;
        }

        pre {
            overflow: scroll-x;
            background-color: #dbdbdb;
            padding: .5rem;
        }

        p {
            font-size: .9rem;
        }

        .message {
            font-size: 1rem;
            background-color: #fcd999;
            padding: .5rem;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 2%;
        }

        .flex-item {
            width: 50vw;
            padding: 0 1rem;
            background-color: #FFF;
        }
    </style>
    <title>{% block title %}{% endblock %}</title>
</head>
  
<body>
    {% block body %}{% endblock %}
</body>
  
</html>