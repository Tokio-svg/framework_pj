<?php
// -------------------------------------------------------
// 実際にResponseを返す際に利用する
// ResponseにHeaderをセットしたり、結果の出力を行ったりする
//
// Responseクラスの引数にコンテント、ステータスコードを渡し、send関数で出力します。
// Headerを別途追加したいときはsetHttpHeaders関数で追加します。
// -------------------------------------------------------

namespace Libs\Https;


class Response
{
    private string $content;
    private int $status_code;
    private string $status_text;
    private array $http_headers;

    // 引数で渡された各パラメータをプロパティに格納
    /**
     * Response constructor.
     * @param string $content
     * @param int $status_code
     * @param string $status_text
     */
    public function __construct(
        string $content = "",
        int $status_code = Status::HTTP_200_OK,
        string $status_text = '')
    {
        $this->content = $content;
        $this->status_code = $status_code;
        $this->status_text = empty($status_text) ? Status::text($status_code) : $status_text;
        $this->http_headers = array();
    }

    /**
     * Send response with header and content.
     */
    public function send()
    {
        header('HTTP/1.1 ' . $this->status_code . ' ' . $this->status_text);

        foreach ($this->http_headers as $name => $value) {
            header($name . ': ' . $value);
        }

        echo $this->content;
    }

    public function setHttpHeaders($name, $value)
    {
        $this->http_headers[$name] = $value;
    }

    public function statusCode()
    {
        return $this->status_code;
    }

    public function statusText()
    {
        return $this->status_text;
    }

    // リダイレクト処理
    public static function redirect($location){
        $response = new self("",
            Status::HTTP_301_MOVED_PERMANENTLY);
        $response->setHttpHeaders('Location', $location);
        return $response;
    }
}