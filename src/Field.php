<?php

namespace Ckeditor5;

use Carbon\Carbon;
use Form;


/**
 * to create dynamic fields for modules
 */
class Field
{
    private $config;
    private $view_path = 'ckeditor5::fields';
    private $app_path = 'ckeditor5::layouts.field-app';

    function __construct($theme = null)
    {
        $theme = $theme ? $theme : config('ckeditor5.default_theme');
        $config_themes = config('ckeditor5.themes');
        $config = isset($config_themes[$theme]) ? $config_themes[$theme] : $config_themes['default'];
        $this->config = $config;
    }


    /**
     * @param $field_attributes
     * @param array $params
     * @return array
     */
    private function buildFieldAttributes($field_attributes , $params = [])
    {
        $response = [];
        foreach ($params as $key => $value) {
            if(isset($field_attributes[$key])){

                $response += [$key => $field_attributes[$key]];
                unset($field_attributes[$key]);
            }else {
                $response += [$key => $value];
            }
        }

        $response += $field_attributes;
        return $response;
    }

    /**
     * @param $field_type
     * @param array $params
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    private function view($field_type , $params = [])
    {
        $params['config'] = $this->config;
        $params['field_type'] = $field_type;
        return view($this->app_path, $params);
    }

    /**
     * @param $nav_id
     * @return mixed
     */
    public function langNavTabs($nav_id = 'first')
    {
        return view($this->view_path.'.lang-nav-tabs',compact('nav_id'))->render();
    }



    /**
     * @param $name
     * @param $label
     * @param null $value
     * @param array $field_attributes
     * @return string
     */
    public function ckEditor5($name, $label, $value = null, $field_attributes = [])
    {
        $field_attributes = $this->buildFieldAttributes($field_attributes , [
            "placeholder" => $label,
            "class" => "form-control rtlEditor",
            "rows" => "8",
            "cols" => "8",
            "data-name" => $name,
            "id" => $name
        ]);
        return $this->view('ck-editor-5', compact('name', 'label', 'value', 'field_attributes'))->render();
    }
}