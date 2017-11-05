angular
    .module('app')
    .service('ResultsConcursService', ResultsConcursService);

function ResultsConcursService($q, $http, Constants) {
    function getData(id) {
        var deffered = $q.defer();
        $http.get(Constants.ENDPOINT_URL + Constants.CONCURS_SINGLE_URL + id)
            .then(function (response) {
                deffered.resolve(response.data);
            })
            .catch(function (error) {
                deffered.reject(error.data);
            });

        return deffered.promise;
    }

    function sendInterview(params) {
        var deffered = $q.defer();
        $http.post(Constants.ENDPOINT_URL + Constants.INTERVIEW_URL, params)
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
        sendInterview: sendInterview
    }
}