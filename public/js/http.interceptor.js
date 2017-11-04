angular
    .module('app')
    .factory('httpInterceptor', httpInterceptor);

function httpInterceptor($q, $localStorage, ngToast, $rootScope, $state) {
    function request(config) {
        if($localStorage.token) {
            config.headers.Authorization = 'Bearer ' + $localStorage.token;
        }
        return config;
    }

    function response(response) {
        return response;
    }

    function responseError(error) {
        switch (error.status) {
            case 400:
                if(error.data.entity) {
                    console.log(error.data.entity);
                    angular.forEach(error.data.entity, function(errors, value) {
                        for(var i = 0; i < errors.length; i++) {
                            ngToast.danger({
                                content: errors[i]
                            });
                        }
                    });
                } else {
                    ngToast.danger({
                        content: error.data.message
                    });
                }
                break;
            case 401:
                delete $localStorage.token;
                delete $localStorage.user;
                $rootScope.isLoggedIn = false;
                if(error.data.entity) {
                    angular.forEach(error.data.entity, function(errors, value) {
                        for(var i = 0; i < errors.length; i++) {
                            ngToast.danger({
                                content: errors[i]
                            });
                        }
                    });
                } else {
                    ngToast.danger({
                        content: error.data.message
                    });
                }
                $state.go('menu.login');
                break;
            case 403:
                delete $localStorage.token;
                delete $localStorage.user;
                $rootScope.isLoggedIn = false;
                if(error.data.entity) {
                    angular.forEach(error.data.entity, function(errors, value) {
                        for(var i = 0; i < errors.length; i++) {
                            ngToast.create({
                                className: 'danger',
                                content: errors[i]
                            });
                        }
                    });
                } else {
                    ngToast.create({
                        className: 'danger',
                        content: error.data.message
                    });
                }
                $state.go('menu.login');
                break;
            case 404:
                if(!error.data.entity) {
                    angular.forEach(error.data.entity, function(errors, value) {
                        for(var i = 0; i < errors.length; i++) {
                            ngToast.create({
                                className: 'danger',
                                content: errors[i]
                            });
                        }
                    });
                } else {
                    ngToast.create({
                        className: 'danger',
                        content: error.data.message
                    });
                }
                break;
            case 500:
                break;
        }
        return $q.reject(error);
    }

    return {
        request: request,
        response: response,
        responseError: responseError
    };
}