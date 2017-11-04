angular
    .module('app')
    .controller('TestQuestionsCtrl', TestQuestionsCtrl);

function TestQuestionsCtrl($scope, TestQuestionsService, Constants) {

    TestQuestionsService.getData().then(function(response) {
            $scope.questions = response.entity;
            console.log($scope.questions);
        },
        function(response){
        });

    //Save edit user
    $scope.doTest = function(answers) {
        TestQuestionsService.doTest(answers).then(function(response) {
                $scope.answers = response.entity;
                console.log($scope.answers);
            },
            function(response){
            });
    }
}