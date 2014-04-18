<?php
namespace Jleagle\PHPBTN;

use Jleagle\jsonRPC\jsonRPCClient;

class PHPBTN
{

    private $apiKey;
    private $apiUrl = 'http://api.btnapps.net/';
    private $methods = array(
        "userInfo",
        "getChangelog",
        "getNews",
        "getNewsById",
        "getBlog",
        "getBlogById",
        "getTVNews",
        "getTVNewsById",
        "getInbox",
        "getInboxConversation",
        "sendInboxConversation",
        "getSchedule",
        "getNewSeries",
        // "getTorrentsBrowse",
        // "getTorrentsSearch",
        "getTorrents",
        "getTorrentsUrl",
        "getForumsIndex",
        "getForumsPage",
        "getTorrentById",
        "getUserSubscriptions",
        "getUserSnatchlist",
        "getUserStats"
    );

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function __call($method, $parameters = array())
    {

        if (!in_array($method, $this->methods)){
            throw new \Exception('Invalid method.');
        }
        $args = func_get_args();
        if (count($args[1]) > 3){
            throw new \Exception('Too many parameters, you do not need to enter a key.');
        }

        $parameters[0] = (isset($parameters[0])?$parameters[0]:false);
        $parameters[1] = (isset($parameters[1])?$parameters[1]:false);
        $parameters[2] = (isset($parameters[2])?$parameters[2]:false);

        $json = new jsonRPCClient($this->apiUrl);
        return $json->{$method}($this->apiKey, $parameters[0], $parameters[1], $parameters[2]);

    }

}
