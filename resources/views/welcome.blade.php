<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sicef</title>

    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/angular-bootstrap/ui-bootstrap-csp.css">
    <link rel="stylesheet" href="bower_components/ngToast/dist/ngToast.min.css">
    <link rel="stylesheet" href="partials/home/home.css">
    <link rel="stylesheet" href="partials/nav-menu/nav-menu.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="partials/login/login.css">
    <link rel="stylesheet" href="partials/register/register.css">
    <link rel="stylesheet" href="partials/find-a-job/find-a-job.css">
    <link rel="stylesheet" href="partials/single-view-job/single-view-job.css">
    <link rel="stylesheet" href="partials/profile-expert/profile-expert.css">
    <link rel="stylesheet" href="partials/test-questions/test-questions.css">
    <link rel="stylesheet" href="partials/test-code/test-code.css">
    <link rel="stylesheet" href="partials/find-expert/find-expert.css">
    <link rel="stylesheet" href="partials/single-view-expert/single-view-expert.css">
    <link rel="stylesheet" href="partials/profil-firm/profil-firm.css">
    <link rel="stylesheet" href="partials/view-profile-firm/view-profile-firm.css">
    <link rel="stylesheet" href="partials/my-concurs/my-concurs.css">
    <link rel="stylesheet" href="partials/create-concurs/create-concurs.css">
    <link rel="stylesheet" href="partials/results-concurs/results-concurs.css">
</head>

<body>
<toast></toast>
<ui-view></ui-view>
</body>

<script src="bower_components/angular/angular.min.js"></script>
<script src="bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
<script src="bower_components/angular-animate/angular-animate.min.js"></script>
<script src="bower_components/angular-sanitize/angular-sanitize.min.js"></script>
<script src="bower_components/angular-css/angular-css.min.js"></script>
<script src="bower_components/ngstorage/ngStorage.min.js"></script>
<script src="bower_components/ngToast/dist/ngToast.min.js"></script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
<script src="bower_components/angular-spinner/dist/angular-spinner.min.js"></script>

<!-- Main js -->
<script src="js/app.js"></script>
<script src="js/global.controller.js"></script>
<script src="js/constants.js"></script>
<script src="js/http.interceptor.js"></script>

<!-- Controllers -->
<script src="partials/home/home.controller.js"></script>
<script src="partials/login/login.controller.js"></script>
<script src="partials/register/register.controller.js"></script>
<script src="partials/find-a-job/find-a-job.controller.js"></script>
<script src="partials/single-view-job/single-view-job.controller.js"></script>
<script src="partials/profile-expert/profile-expert.controller.js"></script>
<script src="partials/test-questions/test-questions.controller.js"></script>
<script src="partials/test-code/test-code.controller.js"></script>
<script src="partials/find-expert/find-expert.controller.js"></script>
<script src="partials/single-view-expert/single-view-expert.controller.js"></script>
<script src="partials/profil-firm/profil-firm.controller.js"></script>
<script src="partials/view-profile-firm/view-profile-firm.controller.js"></script>
<script src="partials/my-concurs/my-concurs.controller.js"></script>
<script src="partials/create-concurs/create-concurs.controller.js"></script>
<script src="partials/results-concurs/results-concurs.controller.js"></script>

<!-- Services -->
<script src="js/auth.service.js"></script>
<script src="partials/home/home.service.js"></script>
<script src="partials/login/login.service.js"></script>
<script src="partials/register/register.service.js"></script>
<script src="partials/find-a-job/find-a-job.service.js"></script>
<script src="partials/single-view-job/single-view-job.service.js"></script>
<script src="partials/profile-expert/profile-expert.service.js"></script>
<script src="partials/test-questions/test-questions.service.js"></script>
<script src="partials/test-code/test-code.service.js"></script>
<script src="partials/find-expert/find-expert.service.js"></script>
<script src="partials/single-view-expert/single-view-expert.service.js"></script>
<script src="partials/profil-firm/profil-firm.service.js"></script>
<script src="partials/view-profile-firm/view-profile-firm.service.js"></script>
<script src="partials/my-concurs/my-concurs.service.js"></script>
<script src="partials/create-concurs/create-concurs.service.js"></script>
<script src="partials/results-concurs/results-concurs.service.js"></script>
</html>