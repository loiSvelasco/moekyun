{% extends "layout/base.php" %}
{% block title %}Posts{% endblock %}

{% block body %}
<h1>View posts</h1>
<ul>
    {% for post in posts %}
    <h2><a href="/posts/view/{{ post.id }}">{{ post.title }}</a></h2>
    <p>{{ post.content }}</p>
    {% endfor %}
</ul>

{% endblock %}