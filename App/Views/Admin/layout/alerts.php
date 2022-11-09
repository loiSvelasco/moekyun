{% if session.has('warn') %}
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <!-- <i data-feather="alert-circle" class="mr-3"></i> -->
        <i class="fas fa-exclamation-circle"></i>
        <strong></strong> {{ session.flash('warn') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
{% elseif session.has('inform') %}
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong>Heads up!</strong> {{ session.flash('inform') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
{% elseif session.has('alert') %}
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong>Hey!</strong> {{ session.flash('alert') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
{% elseif session.has('error') %}
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-times"></i>
        <strong>Oh no!</strong> {{ session.flash('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
{% elseif session.has('success') %}
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check"></i>
        <strong>Success!</strong> {{ session.flash('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
{% endif %}