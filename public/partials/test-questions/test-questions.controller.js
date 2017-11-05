angular
    .module('app')
    .controller('TestQuestionsCtrl', TestQuestionsCtrl);

function TestQuestionsCtrl($scope, $state, $stateParams, TestQuestionsService, $interval, ngToast) {
    $scope.isLoading = false;
    $scope.isStarted = false;
    $scope.options = {};
    $scope.questionNumber = 0;
    $scope.options.choosedAnswer = '';
    $scope.answer = '';
    TestQuestionsService.getData($stateParams.id)
        .then(function(response) {
            $scope.numTest = response.entity.testNum;
            $scope.time = response.entity.nextTest.time;
            $scope.activeTest = response.entity.nextTest.queue;
            $scope.testId = response.entity.nextTest.id;
            $scope.minRate = response.entity.nextTest.min_rate;
            $scope.questionCount = response.entity.nextTest.questionCount;
            $scope.applicationId = response.entity.applicaton_id;
        },
        function(response) {

        });

    $scope.start = function() {
        $scope.isLoading = true;
        TestQuestionsService.start($scope.testId)
            .then(function(response) {
                    $scope.isLoading = false;
                    $scope.question = response.entity;
                    $scope.questionNumber = 1;
                    $scope.isStarted = true;
                    $scope.countTime();
                },
                function(response) {
                    $scope.isLoading = false;
                });
    };

    $scope.countTime = function() {
        $scope.interval = $interval(function() {
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
        }, 1000);
    };

    $scope.next = function(id, type, answer) {
        $scope.isLoading = true;
        TestQuestionsService.next(id, type, $scope.applicationId, answer)
            .then(function(response) {
                    $scope.isLoading = false;
                    $scope.options.choosedAnswer = '';
                    $scope.answer = '';
                    if(response.entity.nextQuestion) {
                        ngToast.success({
                            content: response.message
                        });
                        $scope.question = response.entity.nextQuestion;
                        $scope.questionNumber++;
                    } else if(response.entity.nextTest) {
                        ngToast.success({
                            content: response.message
                        });
                        $scope.time = response.entity.nextTest.time;
                        $scope.activeTest = response.entity.nextTest.queue;
                        $scope.testId = response.entity.nextTest.id;
                        $scope.minRate = response.entity.nextTest.min_rate;
                        $scope.questionCount = response.entity.nextTest.questionCount;
                        $scope.question = null;
                        $interval.cancel($scope.interval);
                        $scope.isStarted = false;
                    } else {
                        ngToast.success({
                            content: "You have completed all the tests. You might be contacted by the employer soon."
                        });
                        $state.go('menu.findjob');
                    }
                },
                function(response) {
                    $scope.isLoading = false;
                });
    };
}