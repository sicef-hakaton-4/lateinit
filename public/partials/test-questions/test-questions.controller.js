angular
    .module('app')
    .controller('TestQuestionsCtrl', TestQuestionsCtrl);

function TestQuestionsCtrl($scope, $stateParams, TestQuestionsService, $interval) {
    $scope.isLoading = false;
    TestQuestionsService.getData($stateParams.id)
        .then(function(response) {
            $scope.numTest = response.entity.testNum;
            $scope.time = response.entity.nextTest.time;
            $scope.activeTest = response.entity.nextTest.queue;
            $scope.minRate = response.entity.nextTest.min_rate;
            $scope.questionCount = response.entity.nextTest.questionCount;
            $scope.applicationId = response.entity.applicaton_id;
        },
        function(response) {

        });

    $scope.countTime = function() {
        $interval(function() {
            if($scope.time.minutes == 0) {
                console.log("Finished");
            }

            if($scope.time.seconds > 0) {
                $scope.time.seconds--;
            }

            if($scope.time.seconds == 0) {
                $scope.time.minutes--;
                $scope.time.seconds = 59;
            }
        }, $scope.time.totalSeconds);
    };

    $scope.start = function() {
        $scope.isLoading = true;
        TestQuestionsService.start($stateParams.id)
            .then(function(response) {
                $scope.isLoading = false;
                $scope.question = response.entity;
            },
            function(response) {

            });
    };

    $scope.next = function() {

    };
}