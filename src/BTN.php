<?php
namespace Jleagle\BTN;

use Jleagle\BTN\Libs\jsonRPCClient;

class BTN
{
  private $apiKey;
  private $apiUrl = 'http://api.btnapps.net/';
  private $methods = [
    "userInfo"              => [1, 1],
    "getChangelog"          => [0, 0],
    "getNews"               => [1, 1],
    "getNewsById"           => [2, 2],
    "getBlog"               => [1, 1],
    "getBlogById"           => [2, 2],
    "getTVNews"             => [1, 1],
    "getTVNewsById"         => [2, 2],
    "getInbox"              => [2, 1],
    "getInboxConversation"  => [2, 2],
    "sendInboxConversation" => [3, 3],
    "getSchedule"           => [2, 1],
    "getNewSeries"          => [1, 1],
    // "getTorrentsBrowse" => array(3, 1),
    // "getTorrentsSearch" => array(4, 2),
    "getTorrents"           => [4, 2],
    "getTorrentsUrl"        => [2, 2],
    "getForumsIndex"        => [2, 1],
    "getForumsPage"         => [3, 2],
    "getTorrentById"        => [2, 2],
    "getUserSubscriptions"  => [1, 1],
    "getUserSnatchlist"     => [3, 1],
    "getUserStats"          => [1, 1],
  ];

  public function __construct($apiKey)
  {
    $this->apiKey = $apiKey;
  }

  public function __call($method, $parameters = [])
  {

    $parameters = $parameters[0];
    array_unshift($parameters, $this->apiKey);

    if(!array_key_exists($method, $this->methods))
    {
      throw new \Exception('Invalid method.');
    }

    $limits = $this->methods[$method];

    if(count($parameters) > $limits[0] || count($parameters) < $limits[1])
    {
      throw new \Exception('Incorrect number of parameters.');
    }

    $json = new jsonRPCClient($this->apiUrl);

    return call_user_func_array([$json, $method], $parameters);
  }
}
