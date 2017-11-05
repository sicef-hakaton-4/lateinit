angular
    .module('app')
    .constant('Constants', {
        ENDPOINT_URL: "http://localhost:8000/api/",
        // ENDPOINT_URL: "http://homestead.dev/api/",
        LOGIN_API: "login",
        EXPERT_ROLE: "expert",
        LOGOUT_MESSAGE: "Successfully logged out",
        REGISTER_URL: "register",
        CREATE_OPENING_URL: "put/opening",
        TESTINFO_URL: "put/application"
    });