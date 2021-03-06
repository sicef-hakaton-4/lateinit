angular
    .module('app')
    .service('FindExpertService', FindExpertService);

function FindExpertService($q, $http, Constants) {
    function getData() {
        var deffered = $q.defer();
        $http.get(Constants.ENDPOINT_URL + "expert/get")
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