angular
    .module('app')
    .service('AuthService', AuthService);

function AuthService($q, $http, Constants) {
    function sample() {
        var deffered = $q.defer();
        $http.get(Constants.ENDPOINT_URL + "")
            .then(function (response) {
                deffered.resolve(response.data);
            })
            .catch(function (error) {
                deffered.reject(error.data);
            });

        return deffered.promise;
    }

    return {
        sample: sample
    }
}