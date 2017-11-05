angular.module('app', [
    'ui.router',
    'angularCSS',
    'ngStorage',
    'ngToast',
    'ui.bootstrap',
    'angularSpinner'
])

.run(function ($rootScope, $localStorage, $transitions, $state, $q, Constants) {
    $rootScope.isLoggedIn = $localStorage.token != undefined;
    if($rootScope.isLoggedIn) {
        $rootScope.user = $localStorage.user;
    }

    $transitions.onBefore({to: 'menu.login'}, function() {
        var deferred = $q.defer();
        if($localStorage.token) {
            var params = { reload: true };
            var user = $localStorage.user;
            if(user.type == Constants.EXPERT_ROLE) {
                deferred.resolve($state.target('menu.findjob', undefined, params));
            } else {
                deferred.resolve($state.target('menu.createconcurs', undefined, params));
            }
        } else {
            deferred.resolve();
        }
        return deferred.promise;
    });

    $transitions.onBefore({to: 'menu.register'}, function() {
        var deferred = $q.defer();
        if($localStorage.token) {
            var params = { reload: true };
            var user = $localStorage.user;
            if(user.type == Constants.EXPERT_ROLE) {
                deferred.resolve($state.target('menu.findjob', undefined, params));
            } else {
                deferred.resolve($state.target('menu.createconcurs', undefined, params));
            }
        } else {
            deferred.resolve();
        }
        return deferred.promise;
    });
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
    state('menu.findjob', {
        url: '/find-a-job',
        views: {
            'menuContent': {
                templateUrl: 'partials/find-a-job/find-a-job.html',
                css: 'partials/find-a-job/find-a-job.css',
                controller: 'FindAJobCtrl'
            }
        },
        params: {
            fromLogIn: null
        }
    });

    $stateProvider.
    state('menu.singleViewJob', {
        url: '/single-view-job/:id',
        views: {
            'menuContent': {
                templateUrl: 'partials/single-view-job/single-view-job.html',
                css: 'partials/single-view-job/single-view-job.css',
                controller: 'SingleViewJobCtrl'
            }
        },
        params: {
            id: null
        }
    });

    $stateProvider.
    state('menu.profileexpert', {
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
    state('menu.testquestions', {
        url: '/test-questions/:id',
        views: {
            'menuContent': {
                templateUrl: 'partials/test-questions/test-questions.html',
                css: 'partials/test-questions/test-questions.css',
                controller: 'TestQuestionsCtrl'
            }
        },
        params: {
            id: null
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
    state('menu.singleViewExpert', {
        url: '/single-view-expert/:id',
        views: {
            'menuContent': {
                templateUrl: 'partials/single-view-expert/single-view-expert.html',
                css: 'partials/single-view-expert/single-view-expert.css',
                controller: 'SingleViewExpertCtrl'
            }
        },
        params: {
            id: null
        }
    });

    $stateProvider.
    state('menu.profilefirm', {
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
    state('menu.myConcurs', {
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
    state('menu.createconcurs', {
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
    state('menu.resultsConcurs', {
        url: '/results-concurs/:id',
        views: {
            'menuContent': {
                templateUrl: 'partials/results-concurs/results-concurs.html',
                css: 'partials/results-concurs/results-concurs.css',
                controller: 'ResultsConcursCtrl'
            }
        },
        params: {
            id: null
        }
    });

    $stateProvider.
    state('menu.expertRegister', {
        url: '/expert-register',
        views: {
            'menuContent': {
                templateUrl: 'partials/expert-register/expert-register.html',
                css: 'partials/expert-register/expert-register.css',
                controller: 'ExpertRegisterCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.firmRegister', {
        url: '/firm-register',
        views: {
            'menuContent': {
                templateUrl: 'partials/firm-register/firm-register.html',
                css: 'partials/firm-register/firm-register.css',
                controller: 'FirmRegisterCtrl'
            }
        }
    });

    $stateProvider.
    state('menu.expertConcurs', {
        url: '/expert-concurs',
        views: {
            'menuContent': {
                templateUrl: 'partials/expert-concurs/expert-concurs.html',
                css: 'partials/expert-concurs/expert-concurs.css',
                controller: 'ExpertConcursCtrl'
            }
        }
    });
});