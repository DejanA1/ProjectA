<?php
use Doctrine\Common\Annotations\AnnotationRegistry;
use Examples\BaseExample;
use SignNow\Api\Service\Guzzle\OptionBuilder;
use SignNow\Api\Service\OAuth\BasicToken;
use SignNow\Api\Service\OAuth\BearerToken;
use SignNow\Api\Service\Factories\TokenFactory;

require_once __DIR__ . '/../vendor/autoload.php';
$config = require_once __DIR__ . '/config/config.php';
AnnotationRegistry::registerLoader('class_exists');
$parameters = ["authtype:", "token:", "script:", "host:"];
// $arguments = getopt('', $parameters);
$arguments['script'] = 'password';
foreach ($parameters as $parameter) {
    $key = trim($parameter, ':');
    if (!isset($arguments[$key])) {
        $arguments[$key] = $config['parameters'][$key] ?? null;
    }
}

if (!isset($arguments['authtype'], $arguments['token'], $arguments['script'], $arguments['host'])) {
    die("Please set all required parameters : authtype, token, script, host" . PHP_EOL);
}

if (!isset($config['map'][$arguments['script']])) {
    die("Undefined script: " . $arguments['script'] . PHP_EOL);
}

$sdl = [BasicToken::TYPE, BearerToken::TYPE];
if (!in_array($arguments['authtype'], [BasicToken::TYPE, BearerToken::TYPE], true)) {
    die("Undefined auth type: " . $arguments['authtype'] . PHP_EOL);
}

$token = (new TokenFactory())->createToken($arguments['authtype'], $arguments['token']);

$options = (new OptionBuilder())
    ->setUri($arguments['host'])
    ->useAuthorization($token)
    ->getOptions();
$entityManager = (new \SignNow\Rest\EntityManagerFactory())->createEntityManager($options);
//  echo "new tokenfactorysdfsd is\n";
try {
    /** @var BaseExample $example */
    $example = new $config['map'][$arguments['script']]($entityManager, $config['parameters']);
    $newToken = $example->execute();
} catch (Throwable $exception) {
    print "Error during script execute: " . $exception->getMessage() . PHP_EOL;
}


// {!! General::selectMultiLevel('parent_id', $categories, ['class' => 'form-control', 'selected' => old('parent_id') ?? $category['parent_id'] ?? '', 'placeholder'=>'---Chose Category---' ]) !!}
// {!! General::selectMultiLevel('parent_id', $categories, ['class' => 'form-control', 'selected' => !empty(old('parent_id')) ? old('parent_id') : !empty($category['parent_id']) ? $category['parent_id'] : '', 'placeholder'=>'---Chose Category---' ]) !!}

// This source code is subject to the terms of the Mozilla Public License 2.0 at https://mozilla.org/MPL/2.0/
// © andrey

//*---------------------------------*//

$parameters = ["authtype:", "token:", "script:", "host:"];
// $arguments = getopt('', $parameters);
if(isset($_GET['script'])) $script = $_GET['script']; else $script = false;
if(!$script)
    $arguments['script'] = 'add_fields';
else
    $arguments['script'] = $script;

foreach ($parameters as $parameter) {
    $key = trim($parameter, ':');
    if (!isset($arguments[$key])) {
        $arguments[$key] = $config['parameters'][$key] ?? null;
    }
}

$config['parameters']['token'] = $newToken->accessToken;

if (!isset($arguments['authtype'], $arguments['token'], $arguments['script'], $arguments['host'])) {
    die("Please set all required parameters : authtype, token, script, host" . PHP_EOL);
}

if (!isset($config['map'][$arguments['script']])) {
    die("Undefined script: " . $arguments['script'] . PHP_EOL);
}

$sdl = [BasicToken::TYPE, BearerToken::TYPE];
if (!in_array($arguments['authtype'], [BasicToken::TYPE, BearerToken::TYPE], true)) {
    die("Undefined auth type: " . $arguments['authtype'] . PHP_EOL);
}

$token = (new TokenFactory())->createToken('Bearer', $newToken->accessToken);

$options = (new OptionBuilder())
    ->setUri($arguments['host'])
    ->useAuthorization($token)
    ->getOptions();
$entityManager = (new \SignNow\Rest\EntityManagerFactory())->createEntityManager($options);
//  echo "new tokenfactorysdfsd is\n";
try {
    /** @var BaseExample $example */
    $example = new $config['map'][$arguments['script']]($entityManager, $config['parameters']);
    print_r($example->execute());

    echo "\n";
} catch (Throwable $exception) {
    print "Error during script execute: " . $exception->getMessage() . PHP_EOL;
}

