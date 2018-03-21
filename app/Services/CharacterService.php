<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 20/03/2018
 * Time: 12:46
 */

namespace App\Services;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class CharacterService
{

    private $client = null;
    private $endpoints = null;
    private $ts = null;
    private $hash = null;

    public function __construct()
    {

        $this->ts = time();
        $this->hash = md5($this->ts . config('marvel.private_key') . config('marvel.public_key'));

        $this->client = new Client([
            'base_uri' => 'http://gateway.marvel.com/v1/public/',
            'query' => [
                'apikey' => config('marvel.public_key'),
                'ts' => $this->ts,
                'hash' => $this->hash
            ]
        ]);
    }

    public function findAll()
    {
        $this->endpoints = 'characters';

        try {

            $query = $this->client->getConfig('query');

            $response = $this->client->get('http://gateway.marvel.com/v1/public/' . $this->endpoints, ['query' => $query]);
            $response = json_decode($response->getBody()->getContents(), true);

            return $response['data'];

        } catch (GuzzleException $e) {
            return $e->getTrace();

        }

    }

    public function findById(int $id)
    {
        $this->endpoints = 'characters/' . $id;

        try {

            $query = $this->client->getConfig('query');

            $response = $this->client->get('http://gateway.marvel.com/v1/public/' . $this->endpoints, ['query' => $query]);
            $response = json_decode($response->getBody()->getContents(), true);

            return $response['data']['results'][0];

        } catch (GuzzleException $e) {
            return $e->getTrace();

        }

    }

    public function findByName(string $name)
    {

        try {

            $dataCharacter = $this->findAll();

            foreach ($dataCharacter['results'] as $item){
                if($item['name'] == $name){
                    return $item;
                }

            }


        } catch (GuzzleException $e) {
            return $e->getTrace();

        }

    }



}