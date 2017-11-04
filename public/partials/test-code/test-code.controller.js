angular
    .module('app')
    .controller('TestCodeCtrl', TestCodeCtrl);

function TestCodeCtrl($scope, TestCodeService, Constants) {

    TestCodeService.getData().then(function(response) {
            $scope.questions = response.entity;
            console.log($scope.questions);
        },
        function(response){
        });

    //Save edit user
    $scope.doTest = function(answers) {
        TestCodeService.doTest2(answers).then(function(response) {
                $scope.answers = response.entity;
                console.log($scope.answers);
            },
            function(response){
            });
    }
}