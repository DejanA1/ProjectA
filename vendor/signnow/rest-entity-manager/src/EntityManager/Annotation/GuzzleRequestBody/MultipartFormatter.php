<?php
declare(strict_types = 1);

namespace SignNow\Rest\EntityManager\Annotation\GuzzleRequestBody;

use GuzzleHttp\RequestOptions;
use SignNow\Rest\EntityManager\Annotation\GuzzleRequestBody\Multipart\Item;
use SignNow\Rest\Service\Serializer\Type\FileLink;
use SplFileInfo;

/**
 * Class MultipartFormatter
 *
 * @package SignNow\Rest\EntityManager\Annotation\GuzzleRequestBody
 */
class MultipartFormatter extends Formatter
{
    /**
     * @var array
     */
    protected $unprocessableTypes = [];
    
    /**
     * @return string
     */
    public function getGuzzleOptionKey(): string
    {
        return RequestOptions::MULTIPART;
    }
    
    /**
     * @param array $content
     *
     * @return mixed
     */
    public function prepareBody(array $content = [])
    {
        return $this->createMultipartRequest($this->filterRequest($content));
    }
    
    /**
     * @param array $response
     *
     * @return array
     */
    private function createMultipartRequest(array $response = [])
    {
        $result = [];
        foreach ($response as $name => $value) {
            $part = $this->createPart($name, $value);
            
            $result = array_merge($result, is_array($part) ? $part : [$part]);
        }
        
        return array_map(function (Item $item) {
            return $item->toArray();
        }, $result);
    }
    
    /**
     * @param $name
     * @param $value
     *
     * @return array|Item
     */
    private function createPart($name, $value)
    {
        if (is_array($value)) {
            $parts = [];
            foreach ($value as $key => $content) {
                $part = $this->createPart(sprintf("%s[%s]", $name, $key), $content);
                
                $parts = array_merge($parts, is_array($part) ? $part : [$part]);
            }
            
            return $parts;
        } elseif ($value instanceof SplFileInfo) {
            $sdlfk = $value->getRealPath();
            return new Item($name, fopen($value->getRealPath(), 'r'), [], $value->getFilename());
        } elseif ($value instanceof FileLink) {
            $context = stream_context_create(['http' => ['method' => 'GET']]);
            return new Item($name, fopen($value->getLink(), 'r', false, $context), [], $value->getFilename());
        } else {
            return new Item($name, $value);
        }
    }
}
