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

<!-- Services -->
<script src="js/auth.service.js"></script>
<script src="partials/home/home.service.js"></script>
</html>