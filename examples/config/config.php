<?php

use Examples\Auth\AuthorizationCodeExample;
use Examples\Auth\AuthorizationPasswordExample;
use Examples\Auth\AuthorizationRefreshTokenExample;
use Examples\Document\Upload\UploadExample;
use Examples\Document\AddFieldsExample;
use Examples\EventSubscription\CreateUserEventSubscriptionExample;
use Examples\EventSubscription\DeleteUserEventSubscriptionExample;
use Examples\EventSubscription\GetUserEventSubscriptionsExample;
use Examples\FreeForm\FreeFormInviteExample;
use Examples\Invite\InviteExample;
use Examples\Invite\CancelInviteExample;
use Examples\Invite\SigningLinkExample;

return [
    'map' => [
        'auth_code' => AuthorizationCodeExample::class,
        'password' => AuthorizationPasswordExample::class,
        'refresh_token' => AuthorizationRefreshTokenExample::class,
        'add_fields' => AddFieldsExample::class,
        'field_invite' => InviteExample::class,
        'upload' => UploadExample::class,
        'free_form_invite' => FreeFormInviteExample::class,
        'cancel_invite' => CancelInviteExample::class,
        'signing_link' => SigningLinkExample::class,
        'get_event_subscription' => GetUserEventSubscriptionsExample::class,
        'create_event_subscription' => CreateUserEventSubscriptionExample::class,
        'delete_event_subscription' => DeleteUserEventSubscriptionExample::class,
    ],
    'parameters' => [
        'authtype' => 'Basic',
        // 'authtype' => 'Bearer',
        // 'token' => 'd4c80bd64586b0143fd7ee13b0e0f3e2f1e9e0c72632da2e6deb1a0d6ce8b8ca ',
        'token' => 'NWQ0MTZlZGYyMTAxY2U3ZTE5MTU2YWZiYTliNDI4ODQ6MTczMjY2ZmJlMzI0NGYyMTliMGFhZWMwMThmMjI2NWQ=',
        'host' => 'https://api.signnow.com/',
        'username' => 'info@yplmedia.com',
        'password' => 'SignNow2192',
        'scope' => '*',
        'code' => "AUTHORIZATION_CODE",
        'refresh_token' => '581462c608ff261fda33c8745a49960490fa889a20e8e2b6344af47db80e0f10',
    ],
];
