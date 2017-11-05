angular
    .module('app')
    .controller('TestQuestionsCtrl', TestQuestionsCtrl);

function TestQuestionsCtrl($scope, $stateParams, TestQuestionsService) {
    $scope.isLoading = false;

    TestQuestionsService.getData($stateParams.id)
        .then(function(response) {
            $scope.numTest = response.entity.testNum;
            $scope.time = response.entity.nextTest.time;
            $scope.activeTest = response.entity.nextTest.queue;
            $scope.minRate = response.entity.nextTest.min_rate;
            $scope.questionCount = response.entity.nextTest.questionCount;
        },
        function(response) {

        });

    $scope.start = function() {
        $scope.isLoading = true;
        TestQuestionsService.start($stateParams.id)
            .then(function(response) {
                $scope.isLoading = false;
                console.log(response);
            },
            function(response) {

            });
    }
}