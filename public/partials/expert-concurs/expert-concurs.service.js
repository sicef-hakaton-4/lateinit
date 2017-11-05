angular
    .module('app')
    .service('ExpertConcursService', ExpertConcursService);

function ExpertConcursService($q, $http, Constants) {

    function getData() {
        var deferred = $q.defer();
        $http.get(Constants.ENDPOINT_URL + "my/openings")
            .then(function (response) {
                deferred.resolve(response.data);
            })
            .catch(function (error) {
                deferred.reject(error.data);
            });

        return deferred.promise;
    }

    return {
        getData: getData
    }
}