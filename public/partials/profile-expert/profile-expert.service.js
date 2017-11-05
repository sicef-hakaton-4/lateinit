angular
    .module('app')
    .service('ProfileExpertService', ProfileExpertService);

function ProfileExpertService($q, $http, Constants) {
    function getData() {
        var deffered = $q.defer();
        $http.get(Constants.ENDPOINT_URL + "my/account")
            .then(function (response) {
                deffered.resolve(response.data);
            })
            .catch(function (error) {
                deffered.reject(error.data);
            });

        return deffered.promise;
    }

    function editUser(user) {
        var deferred = $q.defer();
        $http.patch(Constants.ENDPOINT_URL + "patch/user")
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
        editUser: editUser
    }
}