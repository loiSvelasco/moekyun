{% extends "layout/base.php" %}
{% block title %}Home{% endblock %}

{% block body %}
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Vertically centered hero sign-up form</h1>
            <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form
                controls. Each required form group has a validation state that can be triggered by
                attempting to submit the form without completing it.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-0 bg-light" action="/user/register" method="POST">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control rounded-0" name="email" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-0" name="pass" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary rounded-0" type="submit">Sign up</button>
                <hr class="my-4">
                <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
            </form>
        </div>
    </div>
</div>

<div class="bg-dark text-secondary px-4 py-5 text-center">
    <div class="py-5">
        <h1 class="display-5 fw-bold text-white">Dark mode hero</h1>
        <div class="col-lg-6 mx-auto">
            <p class="fs-5 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap,
                the world’s most popular front-end open source toolkit, featuring Sass variables and mixins,
                responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Custom
                    button</button>
                <button type="button" class="btn btn-outline-light btn-lg px-4">Secondary</button>
            </div>
        </div>
    </div>
</div>
{% endblock %}