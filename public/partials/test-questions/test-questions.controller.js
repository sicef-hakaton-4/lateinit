angular
    .module('app')
    .controller('TestQuestionsCtrl', TestQuestionsCtrl);

function TestQuestionsCtrl($scope, $stateParams, TestQuestionsService) {

    TestQuestionsService.getData($stateParams.id)
        .then(function(response) {
            console.log(response);
        },
        function(response) {

        });

    //Save edit user
    $scope.start = function() {
        TestQuestionsService.start()
            .then(function(response) {
                console.log(response);
            },
            function(response) {

            });
    }
}