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

    // $stateProvider.state('menu', {
    //     abstract: true,
    //     templateUrl: 'partials/nav-menu/nav-menu.view.html',
    //     css: 'partials/nav-menu/nav-menu.css',
    //     controller: 'GlobalController'
    // });

    $stateProvider.state('home', {
        url: '/',
        templateUrl: 'partials/home/home.html',
        css: 'partials/home/home.css',
        controller: 'HomeCtrl'
    });
});