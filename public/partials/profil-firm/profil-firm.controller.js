angular
    .module('app')
    .controller('ProfilFirmCtrl', ProfilFirmCtrl);

function ProfilFirmCtrl($scope, ProfilFirmService, Constants, ngToast) {

    $scope.user = [];

    ProfilFirmService.getData().then(function(response) {
            $scope.user = response.entity;
            console.log($scope.user);
        },
        function(response){
        });

    //Save edit user
    $scope.saveChanges = function(user) {
        angular.forEach($scope.techNew, function(tech) {
            user.project[projectId].technologies.push(tech.description);
        });
        angular.forEach(user.projects, function(project) {
            angular.forEach(project.techNew, function(tech) {
                console.log(tech.description);
                if(!project.technologies) {
                    project.technologies = [];
                }
                project.technologies.push(tech.description);
            });
            project.techNew = [];
        });
        console.log(user.projects);
        ProfilFirmService.editUser(user).then(function(response) {
                $scope.user = response.entity;
                console.log($scope.user);
                ngToast.success({
                    content: response.message
                });
                ProfilFirmService.getData().then(function(response) {
                        $scope.user = response.entity;
                        console.log($scope.user);
                    },
                    function(response){
                    });
            },
            function(response){
            });
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