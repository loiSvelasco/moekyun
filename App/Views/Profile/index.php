{% extends "layout/base.php" %}
{% block title %}Profile{% endblock %}

{% block body %}
<h1>Profile</h1>

    <h2>{{ user.name }}</h2>
    <p>{{ user.email }}</p>

{% endblock %}