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
        'token' => '30fb018f28fb2808b05d64d625cdae905da8ab4d72600566a2144de02f55c38e',
        'host' => 'https://api-eval.signnow.com/',
        'username' => 'info@yplmedia.com',
        'password' => 'SignNow2192',
        'scope' => '*',
        'code' => "AUTHORIZATION_CODE",
        'refresh_token' => '2c8f25f6200fb84e90ddf806ccbf2a5003f0ba13179494b690e284a0d672e135 ',
    ],
];