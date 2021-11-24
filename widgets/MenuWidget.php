<?php


namespace app\widgets;


use app\models\Lang;
use app\models\Menu;
use yii\base\Widget;
use yii\helpers\VarDumper;

class MenuWidget extends Widget
{
    public $data;
    public $tree;

    public function init(){}

    public function run() {
        $lang = Lang::getCurrent();
        $current_lang = $lang->url;
        $lang_link = ($lang->url == 'ua') ? '' : "/" . $lang->url;
        $this->data = Menu::find()
            ->where(['active' => 1])
            ->select(['id', 'name_' . $current_lang, 'parent_id', 'link'])
            ->asArray()
            ->indexBy('id')
            ->orderBy('sort')
            ->all();

        $this->tree = $this->getTree();

        return $this->render('menu/menu', ['menu' => $this->tree, 'current_lang' => $current_lang, 'lang_link' => $lang_link]);
    }

    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id => &$node){
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            }else{
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
            }
        }
        //Сортровка по алфавиту вложеных пунктов меню
        foreach ($tree as $key => $item){
            if (isset($item['childs'])){
                usort($tree[$key]['childs'], array($this, 'sort_name'));
            }
        }

        return $tree;
    }

    public function sort_name($a, $b)
    {
        return strcasecmp($a["name_ua"], $b["name_ua"]);
    }
}