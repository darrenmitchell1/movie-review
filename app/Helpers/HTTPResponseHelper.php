<?php

namespace App\Helpers;

class HTTPResponseHelper
{
    /**
     * Format a Message Response for Json.
     *
     */
    public function formatMessageForJson($messageText)
    {
    	return ['message' => $messageText, 'errors' => null];
    }

}
