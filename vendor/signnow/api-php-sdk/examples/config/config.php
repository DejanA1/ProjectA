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
        'token' => 'ODZiZWRiMzcxOThmNDUxNjczNzI1MTc0NzA0Yjg4ZWI6NjVhODEyNmEzNjQwZGQ4OGE4MTNlODI3OTAyNjY4NGQ=',
        'host' => 'https://api.signnow.com/',
        'username' => 'info@yplmedia.com',
        'password' => 'SignNow2192',
        'scope' => '*',
        'code' => "AUTHORIZATION_CODE",
        'refresh_token' => '97c0cf489120652b644c3a838452e92c3f1cc8de5089055f38b555b0e15ff4b1',
    ],
];
