<?php
namespace Jleagle\Btn;

use Jleagle\Btn\Libs\JsonRPCClient;

class Btn
{
  const API_PATH = 'http://api.btnapps.net/';

  private $_key;

  /**
   * @param $apiKey
   */
  public function __construct($apiKey)
  {
    $this->_key = $apiKey;
  }

  /**
   * @return array
   */
  public function userInfo()
  {
    return $this->_call('userInfo');
  }

  /**
   * @return array
   */
  public function getChangelog()
  {
    return $this->_call('getChangelog');
  }

  /**
   * @return array
   */
  public function getNews()
  {
    return $this->_call('getNews');
  }

  /**
   * @param int $id
   *
   * @return array
   */
  public function getNewsById($id)
  {
    return $this->_call('getNewsById', [$id]);
  }

  /**
   * @return array
   */
  public function getBlog()
  {
    return $this->_call('getBlog');
  }

  /**
   * @param int $id
   *
   * @return array
   */
  public function getBlogById($id)
  {
    return $this->_call('getBlogById', [$id]);
  }

  /**
   * @return array
   */
  public function getTVNews()
  {
    return $this->_call('getTVNews');
  }

  /**
   * @param int $id
   *
   * @return array
   */
  public function getTVNewsById($id)
  {
    return $this->_call('getTVNewsById', [$id]);
  }

  /**
   * @param int $page
   *
   * @return array
   */
  public function getInbox($page = 1)
  {
    return $this->_call('getInbox', [$page]);
  }

  /**
   * @param int $convId
   *
   * @return array
   */
  public function getInboxConversation($convId)
  {
    return $this->_call('getInboxConversation', [$convId]);
  }

  /**
   * @param int    $convId
   * @param string $body
   *
   * @return string
   */
  public function sendInboxConversation($convId, $body)
  {
    return $this->_call('getInboxConversation', [$convId, $body]);
  }

  /**
   * @param string $sort
   *
   * @return string
   */
  public function getSchedule($sort = 'today')
  {
    return $this->_call('getSchedule', [$sort]);
  }

  /**
   * @return array
   */
  public function getNewSeries()
  {
    return $this->_call('getNewSeries');
  }

  /**
   * @param int $results
   * @param int $offset
   *
   * @return array
   */
  public function getTorrentsBrowse($results = 10, $offset = 0)
  {
    return $this->_call('getTorrentsBrowse', [$results, $offset]);
  }

  /**
   * @param string|array $search
   * @param int          $results
   * @param int          $offset
   *
   * @return array
   */
  public function getTorrentsSearch($search, $results = 10, $offset = 0)
  {
    return $this->_call('getTorrentsSearch', [$search, $results, $offset]);
  }

  /**
   * @param string|array $search
   * @param int          $results
   * @param int          $offset
   *
   * @return array
   */
  public function getTorrents($search, $results = 10, $offset = 0)
  {
    return $this->_call('getTorrents', [$search, $results, $offset]);
  }

  /**
   * @param int $torrentId
   *
   * @return array
   */
  public function getTorrentsUrl($torrentId)
  {
    return $this->_call('getTorrentsUrl', [$torrentId]);
  }

  /**
   * @param int $lastPost
   *
   * @return array
   */
  public function getForumsIndex($lastPost = 1)
  {
    return $this->_call('getForumsIndex', [$lastPost]);
  }

  /**
   * @param int $forumId
   * @param int $page
   *
   * @return array
   */
  public function getForumsPage($forumId, $page = 1)
  {
    return $this->_call('getForumsPage', [$forumId, $page]);
  }

  /**
   * @param int $id
   *
   * @return array
   */
  public function getTorrentById($id)
  {
    return $this->_call('getTorrentById', [$id]);
  }

  /**
   * @return array
   */
  public function getUserSubscriptions()
  {
    return $this->_call('getUserSubscriptions');
  }

  /**
   * @param int $results
   * @param int $offset
   *
   * @return array
   */
  public function getUserSnatchlist($results = 10, $offset = 0)
  {
    return $this->_call('getUserSnatchlist', [$results, $offset]);
  }

  /**
   * @return array
   */
  public function getUserStats()
  {
    return $this->_call('getUserStats');
  }

  private function _call($method, $params = [])
  {
    array_unshift($params, $this->_key);
    $json = new JsonRPCClient(self::API_PATH);
    return call_user_func_array([$json, $method], $params);
  }
}
