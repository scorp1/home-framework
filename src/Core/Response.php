<?php

namespace Otus\Core;

use Otus\Interfaces\ResponseInterface;
use Otus\Core\HtmlResponse;
use Otus\Core\FilmBuilder;

class Response implements ResponseInterface
{
    protected $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * @return string
     */
    public function getResponse(): string
    {
        return "<pre>" . var_dump($this->response) . "</pre>";
    }

    /**
     * @return string
     */
    public function getFormatHTMLResponse()
    {
        $count = 0;
        $html = '<table border="1">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Film</th>
                        <th>Name</th>
                        <th>Age</th>
                    </tr>
                     </thead>
                     <tbody>';
        foreach ($this->response as $key =>$value ) {
            $count++;
            if(!array_key_exists('age', $this->response[$key])){
                $age = 'Null';
            }else{
                $age = $this->response[$key]['age'];
            }
            if(!array_key_exists('name', $this->response[$key])){
                $name = 'Null';
            }else{
                $name = $this->response[$key]['name'];
            }
            $html.=sprintf("
            <tr>
                <td>%d</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>",
                $count,
                $this->response[$key]['title'],
                $name,
                $age);
        }
        $html.='</tbody>
                </table>';

        return $html;
    }

}