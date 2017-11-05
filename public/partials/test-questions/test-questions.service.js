angular
    .module('app')
    .service('TestQuestionsService', TestQuestionsService);

function TestQuestionsService($q, $http, Constants) {
    function getData(id) {
        var deffered = $q.defer();
        $http.post(Constants.ENDPOINT_URL + Constants.TESTINFO_URL, {opening_id: id})
            .then(function (response) {
                deffered.resolve(response.data);
            })
            .catch(function (error) {
                deffered.reject(error.data);
            });

        return deffered.promise;
    }

    function start(id) {
        var deferred = $q.defer();
        $http.post(Constants.ENDPOINT_URL + Constants.START_TEST_URL + id)
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
        start: start
    }
}