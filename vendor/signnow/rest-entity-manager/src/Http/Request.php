<?php
declare(strict_types=1);

namespace SignNow\Rest\Http;

/**
 * Class Request
 *
 * @package SignNow\Rest\Http
 */
class Request
{
    const METHOD_HEAD = 'HEAD';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    // const METHOD_PATCH = 'PATCH';
    const METHOD_PATCH = 'PUT';
    const METHOD_DELETE = 'DELETE';
    const METHOD_PURGE = 'PURGE';
    const METHOD_OPTIONS = 'OPTIONS';
    const METHOD_TRACE = 'TRACE';
    const METHOD_CONNECT = 'CONNECT';
}
