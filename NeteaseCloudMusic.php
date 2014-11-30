<?php
header("Content-Type:text/plain; charset=utf-8");
require './http.class.php';
class NeteaseCloudMusic {
    private $http;
    /**
     * 构造函数
     * 
     */
    public function __construct(){
        $this->http = new Http();
        $this->http->initialize([
            'referrer' => 'http://music.163.com',
            'params' => ['appver' => '2.3.1']
        ]);
    }

    /**
     * 音乐搜索
     * @param $s 关键字
     * @param $type 类型[1 单曲,10 专辑,100 歌手,1000 歌单,1002 用户]
     * @param $offset 偏移数量，用于分页
     * @param $limit 返回数量
     */
    public function search($s, $type = '1', $offset = '0', $limit = 60){
        $this->http->method = 'POST';
        $postData = [
            's' => $s,
            'type' => '1',
            'offset' => '0',
            'total' => 'true',
            'limit' => 60
        ];
        $result = $this->http->post('http://music.163.com/api/search/get/web', $postData);
        return json_decode($result, true);
    }

    /**
     * 音乐详细信息
     * @param $ids 音乐ID[Array]
     */
    public function detail($ids){
        $this->http->method = 'GET';
        $id = implode(',', $ids);
        $result = $this->http->get("http://music.163.com/api/song/detail?ids=[".$id."]");
        return json_decode($result, true);
    }

    /**
     * 加密音乐ID
     * @param $id 音乐ID
     * @return $result 加密后的ID
     */
    public function encrypted_id($id){
        $byte1 = $this->bytearray('3go8&$8*3*3h0k(2)2');
        $byte2 = $this->bytearray($id);
        $byte1_len = count($byte1);
        $byte2_len = count($byte2);
        for($i=0; $i<$byte2_len; $i++){
            $byte2[$i] = $byte2[$i] ^ $byte1[$i % $byte1_len];
        }
        for($i=0; $i<$byte2_len; $i++){
            $byte2[$i] = chr($byte2[$i]);
        }
        $result = base64_encode(md5(implode('', $byte2), true));
        $result = str_replace('/', '_', $result);
        $result = str_replace('+', '-', $result);
        return $result;
    }

    private function bytearray($str){
        if(!$str instanceof string) $str = (string)$str;
        $length = strlen($str);
        $res = [];
        for($i=0; $i<$length; $i++){
            $res[] = ord($str[$i]);
        }
        return $res;
    }
}

$obj = new NeteaseCloudMusic;
$songId = [
    '27493016',
    '28987773','25704102',
];
$res = $obj->detail($songId);
foreach($res['songs'] as $key => $song){
    $songData = [
        'title' => $song['name'],
        'artist' => [
            'id' => $song['artists']['0']['id'],
            'name' => $song['artists']['0']['name'],
            'pic' => $song['artists']['0']['picUrl']
        ],
        'album' => [
            'id' => $song['album']['id'],
            'name' => $song['album']['name'],
            'pic' => $song['album']['picUrl']
        ],
        'alies' => $song['alias']['0'],
        'lMusic' => $song['lMusic'],
        'bMusic' => $song['bMusic'],
        'hMusic' => $song['hMusic'],
        'mMusic' => $song['mMusic'],
        'mp3Url' => $song['mp3Url']
    ];

    $hMusic = $songData['hMusic'];
    $id = $hMusic['dfsId'];
    $enId = $obj->encrypted_id($id);
    if(!$id){
        $hMusic = $songData['mMusic'];
        $id = $hMusic['dfsId'];
        $enId = $obj->encrypted_id($id);
        $url = "http://m1.music.126.net/".$enId."/".$id.".mp3";
        echo "M - ".($key+1)." - ".$songData['title']." - ".$url."\n";
    }else{
        $url = "http://m1.music.126.net/".$enId."/".$id.".mp3";
        echo "H - ".($key+1)." - ".$songData['title']." - ".$url."\n";
    }
    //echo "wget -O \"".$songData['title'].".mp3\" ".$url."\n";
}
