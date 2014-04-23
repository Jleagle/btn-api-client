<?php
namespace Jleagle\PHPBTN;

use Jleagle\jsonRPC\jsonRPCClient;

class PHPBTN
{

    private $apiKey;
    private $apiUrl = 'http://api.btnapps.net/';
    private $methods = array(
        "userInfo" => array(1, 1),
        "getChangelog" => array(0, 0),
        "getNews" => array(1, 1),
        "getNewsById" => array(2, 2),
        "getBlog" => array(1, 1),
        "getBlogById" => array(2, 2),
        "getTVNews" => array(1, 1),
        "getTVNewsById" => array(2, 2),
        "getInbox" => array(2, 1),
        "getInboxConversation" => array(2, 2),
        "sendInboxConversation" => array(3, 3),
        "getSchedule" => array(2, 1),
        "getNewSeries" => array(1, 1),
        // "getTorrentsBrowse" => array(3, 1),
        // "getTorrentsSearch" => array(4, 2),
        "getTorrents" => array(4, 2),
        "getTorrentsUrl" => array(2, 2),
        "getForumsIndex" => array(2, 1),
        "getForumsPage" => array(3, 2),
        "getTorrentById" => array(2, 2),
        "getUserSubscriptions" => array(1, 1),
        "getUserSnatchlist" => array(3, 1),
        "getUserStats" => array(1, 1),
    );

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function __call($method, $parameters = array())
    {

        $parameters = $parameters[0];
        array_unshift($parameters, $this->apiKey);

        if (!array_key_exists($method, $this->methods)){
            throw new \Exception('Invalid method.');
        }

        $limits = $this->methods[$method];

        if (count($parameters) > $limits[0] || count($parameters) < $limits[1]){
            throw new \Exception('Incorrect number of parameters.');
        }

        $json = new jsonRPCClient($this->apiUrl);

        return call_user_func_array(array($json, $method), $parameters);

    }

}
