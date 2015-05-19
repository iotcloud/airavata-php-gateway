<?php
return array(
    /**
     * *****************************************************************
     *  These are WSO2 Identity Server Related Configurations
     * *****************************************************************
     */

    'wsis' => [

        /**
         * Admin Role Name
         */
        'admin-role-name' => 'admin',

        /**
         * Gateway user role
         */
        'user-role-name' => 'Internal/everyone',

        /**
         * Tenant admin's username
         */
        'admin-username' => 'test@dsc.iu.edu',

        /**
         * Tenant admin's password
         */
        'admin-password' => 'testadmin@@dsc.iu.edu',

        /**
         * Identity server domain
         */
        'server' => 'dsc.iu.edu',

        /**
         * Identity server web services endpoint
         */
        'service-url' => 'https://149.165.158.139:9443/services/',

        /**
         * Gateway domain name
         */
        'gateway-id' => 'default',

        /**
         * Path to the server certificate file
         */
        'cafile-path' => app_path() . '/resources/security/idp_scigap_org.pem',

        /**
         * Enable HTTPS server verification
         */
        'verify-peer' => true,

        /**
         * Allow self signed server certificates
         */
        'allow-self-signed-cert' => true
    ],


    /**
     * *****************************************************************
     *  These are Airavata Related Configurations
     * *****************************************************************
     */
    'airavata' => [
        /**
         * Airavata API server location
         */
        'airavata-server' => '149.165.158.139',

        /**
         * Airavata API server port
         */
        'airavata-port' => '9930',

        /**
         * Airavata API server thrift communication timeout
         */
        'airavata-timeout' => '1000000'
    ]

);