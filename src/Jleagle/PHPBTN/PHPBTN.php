<?php
namespace Jleagle\PHPBTN;

class PHPBTN
{

    private $apiKey;
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
        "getTorrentsBrowse",
        "getTorrentsSearch",
        "getTorrents",
        "getTorrentsUrl",
        "getForumsIndex",
        "getForumsPage",
        "getTorrentById",
        "getUserSubscriptions",
        "getUserSnatchlist",
        "getUserStats"
    );

    private $apiUrl = 'http://api.btnapps.net/';

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function __call($method, $parameters = array())
    {

        if (!in_array($method, $this->methods)){
            throw new \Exception('Invalid method.');
        }

//        print_r($parameters);

        $client = new \JsonRpc\Client($this->apiUrl);
        return $client->{$method}($this->apiKey, array($parameters));
    }

}
