<?php
    /*
        * Config for PayPal specific values
    */

    //Whether Sandbox environment is being used, Keep it true for testing
    define("SANDBOX_FLAG", true);

    //PayPal REST API endpoints
    define("SANDBOX_ENDPOINT", "https://api.sandbox.paypal.com");
    define("LIVE_ENDPOINT", "https://api.paypal.com");

    //Merchant ID
    define("MERCHANT_ID","Q6KYVA9NZEUX8");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("SANDBOX_CLIENT_ID" , "AZlKd048lsDpHkrcsTahhcU3L_KiGfhCBvyjbdlo8nj8VJchNCOa_uIz6aTup6DMI9GXSncSha4SlIN2");
    define("SANDBOX_CLIENT_SECRET", "EIgW7eaqduvP5jJM6NDaCTh-xXuJO34tR0p9BR42oJ695uUhcOV8M3ldkwpXQ1vP2hDrddCt4d0mvPov");

    //Environments -Sandbox and Production/Live
    define("SANDBOX_ENV", "sandbox");
    define("LIVE_ENV", "production");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("LIVE_CLIENT_ID" , "live_Client_Id");
    define("LIVE_CLIENT_SECRET" , "live_Client_Secret");

    //ButtonSource Tracker Code
    define("SBN_CODE","PP-DemoPortal-EC-IC-php-REST");

?>