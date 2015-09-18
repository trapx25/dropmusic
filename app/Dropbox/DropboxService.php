<?php

namespace DropMusic\Dropbox;

use Illuminate\Support\Collection;

class DropboxService
{
    private $client;

    public function retrieveAllAudioFiles()
    {
        $songs = $this->getAllFiles()->filter(function($file) {
            $mimeTypes = ['audio/mpeg'];
            return (array_key_exists('mime_type', $file[1]) && in_array($file[1]['mime_type'], $mimeTypes));
        })->map(function($item, $key) {
            $item[1]['temp_url'] = $this->createPlayableLinkForSong($item[1]['path']);
            return $item;
        });
        return ($songs->isEmpty()) ? null : $songs;
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    private function getAllFiles()
    {
        return new Collection($this->getClient()->getDelta()['entries']);
    }

    private function createPlayableLinkForSong($song)
    {
        return $this->getClient()->createTemporaryDirectLink($song)[0];
    }

    private function getClient()
    {
        return $this->client;
    }
}