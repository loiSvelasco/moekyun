
<!DOCTYPE html>
<html>
  
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Mono&display=swap');

        body {
            font-family: 'Fira Mono', monospace;
            background-color: #f0f0f0;
        }
        .center {
            padding: 0 5%;
            margin: 0 auto;
            width: 50vw;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            flex-direction: column;
            align-items: flex-start;
            background-color: #FFF;
        }
        h3 {
            color: #db3406;
        }
    </style>
    <title>{% block title %}{% endblock %}</title>
</head>
  
<body>
    {% block body %}{% endblock %}
</body>
  
</html>