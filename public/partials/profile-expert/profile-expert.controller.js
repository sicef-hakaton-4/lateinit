angular
    .module('app')
    .controller('ProfileExpertCtrl', ProfileExpertCtrl);

function ProfileExpertCtrl($scope, ProfileExpertService, Constants) {

    ProfileExpertService.getData().then(function(response) {
            $scope.user = response.entity;
            console.log($scope.user);
        },
        function(response){
        });

    //Save edit user
    $scope.editUser = function(user) {
        ProfileExpertService.editUser(user).then(function(response) {
                $scope.user = response.entity;
                console.log($scope.user);
            },
            function(response){
            });
    }
}