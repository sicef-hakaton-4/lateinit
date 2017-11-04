angular
    .module('app')
    .service('SingleViewJobService', SingleViewJobService);

function SingleViewJobService($q, $http, Constants) {
    function getData(id) {
        console.log(id);
        var deffered = $q.defer();
        $http.get(Constants.ENDPOINT_URL + "get/opening/" + id)
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