angular
    .module('app')
    .service('FindAJobService', FindAJobService);

function FindAJobService($q, $http, Constants) {
    function getData() {
        var deffered = $q.defer();
        $http.get(Constants.ENDPOINT_URL + "get/opening")
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