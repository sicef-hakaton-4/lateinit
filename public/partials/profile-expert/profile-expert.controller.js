angular
    .module('app')
    .controller('ProfileExpertCtrl', ProfileExpertCtrl);

function ProfileExpertCtrl($scope, ProfileExpertService, Constants) {

    $scope.user = [];

    ProfileExpertService.getData().then(function(response) {
            $scope.user = response.entity;
            console.log($scope.user);
        },
        function(response){
        });

    //Save edit user
    $scope.saveChanges = function(user) {
        ProfileExpertService.editUser(user).then(function(response) {
                $scope.user = response.entity;
                console.log($scope.user);
            },
            function(response){
            });
    }

    $scope.addInput = function() {
        $scope.user.description.technologies.push("");
        console.log($scope.user.description.technologies);
    };

    $scope.addProject = function() {
        $scope.user.projects.push({name: "", description: "", client: "", position: ""});
        console.log($scope.user.projects);
    };

    $scope.addTechnologies = function(project) {
        console.log(project.technologies);
        if (project.technologies == undefined) {
            project.technologies = [];
            project.technologies.push("");
        }
        else {
            project.technologies.push("");
        }
    };
}