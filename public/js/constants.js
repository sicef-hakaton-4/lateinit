angular
    .module('app')
    .constant('Constants', {
        ENDPOINT_URL: "http://localhost:8000/api/",
        // ENDPOINT_URL: "http://homestead.dev/",
        LOGIN_API: "login",
        EXPERT_ROLE: "expert",
        LOGOUT_MESSAGE: "Successfully logged out"
    });