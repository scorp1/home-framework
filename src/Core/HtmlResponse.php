<?php
namespace Otus\Core;

use Otus\Core\Film;
use Otus\Interfaces\ResponseInterface;

class HtmlResponse implements ResponseInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * HtmlResponse constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Returns data of response
     *
     * @return string
     */
    public function getResponse(): string
    {
        $html = '
            <table style="width: 100%;" border="1">
                <thead>
                    <tr>
                        <th>age</th>
                        <th>title</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>                                                               
                ';

        foreach ($this->data as $item) {
            if (!($item instanceof Film))
                continue;

            $html .= sprintf("
                    <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td> 
                    </tr>
                    ",
                $item->getAge(),
                $item->getTitle(),
                $item->getName()
            );
        }

        $html .= '                
            </tbody>
            </table>
                ';

        return $html;
    }
}