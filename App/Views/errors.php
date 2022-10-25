{% extends "layout/error.php" %}
{% block title %}Oh no :({% endblock %}

{% block body %}
<div class='center'>
    <h3>Fatal Error:</h3>
    <p>Uncaught Exception: <strong>'{{ exception }}'</strong></p>
    <p>Message: {{ message }}</p>
</div>
<div class="center">
    <pre>{{ trace }}</pre>
    <p>Thrown in {{ file }} on line {{ line }}.</p>
</div>
{% endblock %}