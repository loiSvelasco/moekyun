{% extends "layout/error.php" %}
{% block title %}Oh no :({% endblock %}

{% block body %}
<div class="container">
    <div class="flex-item">
        <h3>Fatal Error</h3>
        <p>Uncaught Exception: <strong>'{{ exception }}'</strong></p>
        <p class="message"><i class="bi-exclamation-circle"></i> {{ message }}</p>
        <p>Stack Trace:</p>
        <pre>{{ dump(trace) }}</pre>
        <p>Thrown in {{ file }} on line {{ line }}.</p>
    </div>
</div>
{% endblock %}