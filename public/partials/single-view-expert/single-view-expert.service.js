angular
    .module('app')
    .service('SingleViewExpertService', SingleViewExpertService);

function SingleViewExpertService($q, $http, Constants) {
    function getData(id) {
        var deffered = $q.defer();
        $http.get(Constants.ENDPOINT_URL + "get/user/" + id)
            .then(function (response) {
                deffered.resolve(response.data);
            })
            .catch(function (error) {
                deffered.reject(error.data);
            });

        return deffered.promise;
    }

    function sendMail(id, message) {
        var deffered = $q.defer();
        $http.post(Constants.ENDPOINT_URL + "")
            .then(function (response) {
                deffered.resolve(response.data);
            })
            .catch(function (error) {
                deffered.reject(error.data);
            });

        return deffered.promise;
    }

    return {
        getData: getData,
        sendMail: sendMail
    }
}