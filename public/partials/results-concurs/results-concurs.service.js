angular
    .module('app')
    .service('ResultsConcursService', ResultsConcursService);

function ResultsConcursService($q, $http, Constants) {
    function getData(id) {
        console.log(id);
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