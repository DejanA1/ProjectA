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
        'authtype' => 'Bearer',
        'token' => '6e2889dc26ea6a50aa84e83e58d06804119d2cb84af2149bc10ba02472a031d7',
        'host' => 'https://api.signnow.com/',
        'username' => 'info@yplmedia.com',
        'password' => 'SignNow2192',
        'scope' => '*',
        'code' => "AUTHORIZATION_CODE",
        'refresh_token' => '449d460d3ced269ae57f2bc2319b6e4db0656fa5348e9fa88876cc5aba1cb60e',
    ],
];