angular.module('app', [
    'ui.router',
    'angularCSS',
    'ngStorage',
    'ngToast',
    'ui.bootstrap',
    'angularSpinner'
])

.run(function ($rootScope, $localStorage, $transitions, $state, $q) {

})

.config(function ($stateProvider, $urlRouterProvider, $httpProvider, ngToastProvider) {
    $httpProvider.interceptors.push('httpInterceptor');

    ngToastProvider.configure({
        verticalPosition: 'bottom',
        horizontalPosition: 'right',
        animation: 'fade'
    });

    $urlRouterProvider.otherwise('/');

    $stateProvider.
    state('menu', {
        abstract: true,
        templateUrl: 'partials/nav-menu/nav-menu.view.html',
        css: 'partials/nav-menu/nav-menu.css',
        controller: 'GlobalController'
    });

    $stateProvider.
    state('menu.home', {
        url: '/',
        views: {
            'menuContent': {
                templateUrl: 'partials/home/home.html',
                css: 'partials/home/home.css',
                controller: 'HomeCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.login', {
        url: '/login',
        views: {
            'menuContent': {
                templateUrl: 'partials/login/login.html',
                css: 'partials/login/login.css',
                controller: 'HomeCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.register', {
        url: '/register',
        views: {
            'menuContent': {
                templateUrl: 'partials/register/register.html',
                css: 'partials/register/register.css',
                controller: 'RegisterCtrl'
            }
        }
    });
});