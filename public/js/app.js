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

    $stateProvider.
    state('menu.find-a-job', {
        url: '/find-a-job',
        views: {
            'menuContent': {
                templateUrl: 'partials/find-a-job/find-a-job.html',
                css: 'partials/find-a-job/find-a-job.css',
                controller: 'FindAJobCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.single-view-job', {
        url: '/single-view-job',
        views: {
            'menuContent': {
                templateUrl: 'partials/single-view-job/single-view-job.html',
                css: 'partials/single-view-job/single-view-job.css',
                controller: 'SingleViewJobCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.profile-expert', {
        url: '/profile-expert',
        views: {
            'menuContent': {
                templateUrl: 'partials/profile-expert/profile-expert.html',
                css: 'partials/profile-expert/profile-expert.css',
                controller: 'ProfileExpertCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.test-questions', {
        url: '/test-questions',
        views: {
            'menuContent': {
                templateUrl: 'partials/test-questions/test-questions.html',
                css: 'partials/test-questions/test-questions.css',
                controller: 'TestQuestionsCtrl'
            }
        }
    });
});