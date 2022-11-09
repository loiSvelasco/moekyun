{% extends "layout/base.php" %}
{% block title %}Posts{% endblock %}

{% block body %}
<h1>View posts</h1>
<ul>
    <li>{{ track }}</li>
    <li>{{ status }}</li>
</ul>

{% endblock %}