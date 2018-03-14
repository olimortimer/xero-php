<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class RateLimitExceededException extends Exception
{
    protected $message = 'The API rate limit for your organisation/application pairing has been exceeded.';

    protected $code = Response::STATUS_RATE_LIMIT_EXCEEDED;

    public function __construct($response_header) {
        $this->message .= ' ' . $response_header[key(preg_grep('/^X-Rate-Limit-Problem(.*)/', $response_header))];
    }

}
