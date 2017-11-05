angular
    .module('app')
    .controller('CreateConcursCtrl', CreateConcursCtrl);

function CreateConcursCtrl($scope, CreateConcursService, $uibModal) {
    $scope.requirements = [{description: ""}];
    $scope.technologies = [{description: ""}];
    $scope.tests = [];
    $scope.rates = [];
    for(var i = 1; i <= 100; i++) {
        $scope.rates.push(i);
    }

    $scope.isLoading = false;

    $scope.addRequirement = function() {
        $scope.requirements.push({description: ""});
        console.log($scope.requirements);
    };

    $scope.removeRequirement = function() {
        $scope.requirements.splice($scope.requirements.length - 1);
    };

    $scope.addTech = function() {
        $scope.technologies.push({description: ""});
        console.log($scope.technologies);
    };

    $scope.removeTech = function() {
        $scope.technologies.splice($scope.technologies.length - 1);
    };

    $scope.addTest = function() {
        $scope.tests.push({minutes: 0, seconds: 0, min_rate: 0, questions: []});
        console.log($scope.tests);
    };

    $scope.removeTest = function() {
        $scope.tests.splice($scope.tests.length - 1);
    };

    $scope.addQuestion = function(test) {
        var addQuestionModal = $uibModal.open({
            animation: true,
            templateUrl: 'partials/create-concurs/modals/add-question-modal.html',
            controller: 'AddQuestionModalCtrl',
            backdrop: true
        });

        addQuestionModal.result.then(function (question) {
            test.questions.push(question);
            console.log(test);
        }, function (response) {
            console.log(response);
        });
    };

    $scope.editQuestion = function(question) {
        var editQuestionModal = $uibModal.open({
            animation: true,
            templateUrl: 'partials/create-concurs/modals/edit-question-modal.html',
            controller: 'EditQuestionModalCtrl',
            backdrop: true,
            resolve: {
                question: function () {
                    return question;
                }
            }
        });

        editQuestionModal.result.then(function (question) {

        }, function (response) {
            console.log(response);
        });
    };

    $scope.removeQuestion = function(test) {
        test.questions.splice(test.questions.length - 1);
    };

    $scope.createConcurs = function(concursData) {
        $scope.isLoading = true;
        concursData.requirements = [];
        concursData.technologies = [];
        concursData.tests = [];

        angular.forEach($scope.requirements, function(requirement) {
           concursData.requirements.push(requirement.description);
        });

        angular.forEach($scope.technologies, function(tech) {
            concursData.technologies.push(tech.description);
        });

        angular.forEach($scope.tests, function(test) {
            concursData.tests.push(test);
        });

        console.log(concursData);

        // CreateConcursService.createConcurs(concursData)
        //     .then(function(response) {
        //         $scope.isLoading = false;
        //         console.log(response);
        //     })
        //     .catch(function() {
        //         $scope.isLoading = false;
        //     });
    }
}