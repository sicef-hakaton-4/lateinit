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
                controller: 'LoginCtrl'
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

    $stateProvider.
    state('menu.test-code', {
        url: '/test-code',
        views: {
            'menuContent': {
                templateUrl: 'partials/test-code/test-code.html',
                css: 'partials/test-code/test-code.css',
                controller: 'TestCodeCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.find-expert', {
        url: '/find-expert',
        views: {
            'menuContent': {
                templateUrl: 'partials/find-expert/find-expert.html',
                css: 'partials/find-expert/find-expert.css',
                controller: 'FindExpertCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.single-view-expert', {
        url: '/single-view-expert',
        views: {
            'menuContent': {
                templateUrl: 'partials/single-view-expert/single-view-expert.html',
                css: 'partials/single-view-expert/single-view-expert.css',
                controller: 'SingleViewExpertCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.profil-firm', {
        url: '/profile-firm',
        views: {
            'menuContent': {
                templateUrl: 'partials/profil-firm/profil-firm.html',
                css: 'partials/profil-firm/profil-firm.css',
                controller: 'ProfilFirmCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.view-profile-firm', {
        url: '/view-profile-firm',
        views: {
            'menuContent': {
                templateUrl: 'partials/view-profile-firm/view-profile-firm.html',
                css: 'partials/view-profile-firm/view-profile-firm.css',
                controller: 'ViewProfileFirmCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.my-concurs', {
        url: '/my-concurs',
        views: {
            'menuContent': {
                templateUrl: 'partials/my-concurs/my-concurs.html',
                css: 'partials/my-concurs/my-concurs.css',
                controller: 'MyConcursCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.create-concurs', {
        url: '/create-concurs',
        views: {
            'menuContent': {
                templateUrl: 'partials/create-concurs/create-concurs.html',
                css: 'partials/create-concurs/create-concurs.css',
                controller: 'CreateConcursCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.results-concurs', {
        url: '/results-concurs',
        views: {
            'menuContent': {
                templateUrl: 'partials/results-concurs/results-concurs.html',
                css: 'partials/results-concurs/results-concurs.css',
                controller: 'ResultsConcursCtrl'
            }
        }
    });
});