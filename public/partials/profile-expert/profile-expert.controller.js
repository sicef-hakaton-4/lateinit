angular
    .module('app')
    .controller('ProfileExpertCtrl', ProfileExpertCtrl);

function ProfileExpertCtrl($scope, ProfileExpertService, Constants) {

    $scope.user = [];
    $scope.newTechnologies = [];

    ProfileExpertService.getData().then(function(response) {
            $scope.user = response.entity;
            console.log($scope.user);
        },
        function(response){
        });

    //Save edit user
    $scope.saveChanges = function(user) {
        angular.forEach($scope.newTechnologies, function(tech) {
            user.description.technologies.push(tech.description);
        });
        angular.forEach($scope.techNew, function(tech) {
            user.project[projectId].technologies.push(tech.description);
        });
        angular.forEach(user.projects, function(project) {
            angular.forEach(project.techNew, function(tech) {
                project.technologies.push(tech.description);
            });
            project.techNew = [];
        });
        $scope.newTechnologies = [];
        console.log(user.projects);
        ProfileExpertService.editUser(user).then(function(response) {
                $scope.user = response.entity;
                console.log($scope.user);
            },
            function(response){
            });
    };

    $scope.addInput = function() {
        $scope.newTechnologies.push({description: ""});
    };

    $scope.addProject = function() {
        $scope.user.projects.push({name: "", description: "", client: "", position: ""});
        console.log($scope.user.projects);
    };

    $scope.addTechnologies = function(project) {
        if(!project.techNew) {
            project.techNew = [];
        }
        project.techNew.push({description: ""});
    };
}