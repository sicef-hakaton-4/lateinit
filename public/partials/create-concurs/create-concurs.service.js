angular
    .module('app')
    .service('CreateConcursService', CreateConcursService);

function CreateConcursService($q, $http, Constants) {

    function createConcurs(data) {
        var deferred = $q.defer();
        $http.post(Constants.ENDPOINT_URL + Constants.CREATE_OPENING_URL, data)
            .then(function (response) {
                console.log(response);
                deferred.resolve(response.data);
            })
            .catch(function (error) {
                deferred.reject(error.data);
            });

        return deferred.promise;
    }

    return {
        createConcurs: createConcurs
    }
}