<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Webtor\Grpc;

/**
 */
class TorrentStoreClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Pushes torrent to the store
     * @param \Webtor\Grpc\PushRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Push(\Webtor\Grpc\PushRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/TorrentStore/Push',
        $argument,
        ['\Webtor\Grpc\PushReply', 'decode'],
        $metadata, $options);
    }

    /**
     * Pulls torrent from the store
     * @param \Webtor\Grpc\PullRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Pull(\Webtor\Grpc\PullRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/TorrentStore/Pull',
        $argument,
        ['\Webtor\Grpc\PullReply', 'decode'],
        $metadata, $options);
    }

    /**
     * Check torrent in the store for existence
     * @param \Webtor\Grpc\CheckRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Check(\Webtor\Grpc\CheckRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/TorrentStore/Check',
        $argument,
        ['\Webtor\Grpc\CheckReply', 'decode'],
        $metadata, $options);
    }

    /**
     * Touch torrent in the store
     * @param \Webtor\Grpc\TouchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Touch(\Webtor\Grpc\TouchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/TorrentStore/Touch',
        $argument,
        ['\Webtor\Grpc\TouchReply', 'decode'],
        $metadata, $options);
    }

}
