angular
    .module('app')
    .service('SingleViewExpertService', SingleViewExpertService);

function SingleViewExpertService($q, $http, Constants) {
    function getData(id) {
        var deffered = $q.defer();
        $http.get(Constants.ENDPOINT_URL + "expert/get/" + id)
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