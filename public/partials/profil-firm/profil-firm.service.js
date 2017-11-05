angular
    .module('app')
    .service('ProfilFirmService', ProfilFirmService);

function ProfilFirmService($q, $http, Constants) {
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
        console.log(user);
        var deferred = $q.defer();
        $http.post(Constants.ENDPOINT_URL + "my/account/patch", user)
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