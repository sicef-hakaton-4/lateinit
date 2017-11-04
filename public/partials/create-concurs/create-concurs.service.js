angular
    .module('app')
    .service('CreateConcursService', CreateConcursService);

function CreateConcursService($q, $http, Constants) {
    function getData() {
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

    function createConcurs(data) {
        var deferred = $q.defer();
        $http.post(Constants.ENDPOINT_URL + "")
            .then(function (response) {

                deferred.resolve(response.data);
            })
            .catch(function (error) {
                deferred.reject(error.data);
            });

        return deferred.promise;
    }

    return {
        getData: getData,
        createConcurs: createConcurs
    }
}