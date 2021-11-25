<?php


namespace app\widgets;


use app\models\Lang;
use yii\base\Widget;

class PaginationWidget extends Widget
{
    public $pageSize;
    public $pageTotal;
    public $currentPage;
    public $link;
    public $btnMoreName;

    public function init(){}

    public function run() {
        $lang = Lang::getCurrent();
        $lang_id = $lang->url;
        $lang_url = ($lang_id == 'ua') ? '' : $lang->url . "/";

        $prev_page = (($this->currentPage - 1) > 0) ? $this->currentPage - 1 : false;
        $next_page = (($this->currentPage + 1) <= $this->pageTotal) ? $this->currentPage + 1 : false;

        return $this->render('pagination/view', ([
            'pageSize' => $this->pageSize,
            'pageTotal' => $this->pageTotal,
            'currentPage' => $this->currentPage,
            'prev_page' => $prev_page,
            'next_page' => $next_page,
            'lang_id' => $lang_id,
            'lang_url' => $lang_url,
            'link' => $this->link,
            'btnMoreName' => $this->btnMoreName
        ]));
    }
}