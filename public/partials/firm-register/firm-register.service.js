angular
    .module('app')
    .service('FirmRegisterService', FirmRegisterService);

function FirmRegisterService($q, $http, Constants) {
    function register() {
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
        getData: getData
    }
}