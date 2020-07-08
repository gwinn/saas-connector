<?php

namespace SaaS\Service\Dellin\Exception;

class DellinApiResponseException extends DellinApiException
{
    private $response;

    public function __construct(string $response, array $errors)
    {
        parent::__construct($errors);

        $this->response = $response;
    }

    public function getResponse(): string
    {
        return $this->response;
    }
}
