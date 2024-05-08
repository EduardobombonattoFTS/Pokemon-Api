<?php

namespace App\Traits;

trait InteractWithPokeResponse {
    /**
     * Decode the correspondingly the response
     * @return stdClass
     */
    public function decodeResponse($response) {
        $decodedResponse = json_decode($response);
        return $decodedResponse;
    }

    /**
     * Resolves when the request fails
     * @return void
     */
    public function checkIfErrorResponse($response) {
        if (isset($response->error)) {
            throw new \Exception("Something failed: {$response->error}");
        }
    }
}
