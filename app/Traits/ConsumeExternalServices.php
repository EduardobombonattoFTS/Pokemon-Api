<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ConsumeExternalServices {

    /**
     * Send a request to PokeAPI
     * @return stdClass|string
     */
    public function makeRequest($method, $requestUrl, $queryParams = []) {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        #PokeAPI não aceita parametros na URL, a resposta deve ser tratada dentro da função.
        try {
            $response = $client->request($method, $requestUrl, [
                'query' => $queryParams,
            ]);
        } catch (RequestException $e) {
            throw new NotFoundHttpException("Erro ao fazer a requisição: " . $e->getMessage());
        }


        $response = $response->getBody()->getContents();

        #Decifra o json da resposta da pokeapi.
        if (method_exists($this, 'decodeResponse')) {
            $response = $this->decodeResponse($response);
        }

        #checa se a resposta tem erros.
        if (method_exists($this, 'checkIfErrorResponse')) {
            $this->checkIfErrorResponse($response);
        }

        return $response;
    }
}
