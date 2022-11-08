{% if session.warn %}
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <!-- <i data-feather="alert-circle" class="mr-3"></i> -->
        <i class="fas fa-info-circle"></i>
        <strong>Oh no!</strong> {{ flash('warn') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
{% elseif session.inform %}
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong>Holy guacamole!</strong> {{ flash('inform') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
{% elseif session.alert %}
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong>Holy guacamole!</strong> {{ flash('alert') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
{% elseif session.error %}
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong>Holy guacamole!</strong> {{ flash('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
{% elseif session.success %}
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-info-circle"></i>
        <strong>Holy guacamole!</strong> {{ flash('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
{% endif %}