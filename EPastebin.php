<?php
//TODO
// create the js to hide the .epastebin_return
// the success funciton function toggleBackground() {}
class EPastebin extends CWidget
{
    private $cssFiles = array("epastebin.css");
    private $jsFiles = array("epastebin.js");
    
    private $cssPath = "css";
    private $jsPath = "js";

    private $css = null;
    private $js = null;
    private $format = array();
    private $expireDate = array(
        "N"=>"Never",
        "10M"=>"10 Minutes",
        "1H"=>"1 Hour",
        "1D"=>"1 Day",
        "1M"=>"1 Month"
    );

    public $loginKey = "";
    public $default = array(
        "format"=>"text",
        "expire"=>"1H"
    );
    public $form = "_form";

    private function registerScripts()
    {
        $cs = Yii::app()->clientScript;

        if($this->css===null) {
            $cssPath = dirname(__FILE__).DIRECTORY_SEPARATOR.$this->cssPath.DIRECTORY_SEPARATOR;

            $cssAssetPath = Yii::app()->getAssetManager()->publish($cssPath);
            foreach($this->cssFiles as $file)
            {
                $cs->registerCssFile($cssAssetPath.DIRECTORY_SEPARATOR.$file);
            }
        }
        if(!$cs->isScriptRegistered('jquery')) {
            $cs->registerCoreScript('jquery');
        }
        if($this->js===null) {
            $jsPath = dirname(__FILE__).DIRECTORY_SEPARATOR.$this->jsPath.DIRECTORY_SEPARATOR;

            $jsAssetPath = Yii::app()->getAssetManager()->publish($jsPath);
            foreach($this->jsFiles as $file)
            {
                $cs->registerScriptFile($jsAssetPath.DIRECTORY_SEPARATOR.$file, CClientScript::POS_HEAD);
            }
        }
    }
    public function init()
    {    
        $this->registerScripts();
        $this->format = require_once(dirname(__FILE__).DIRECTORY_SEPARATOR."format.php");
        parent::init();
    }
    public function run()
    {
        $this->render($this->form, array(
            'format'=>$this->format,
            'key'=>$this->loginKey,
            'expireDate'=>$this->expireDate,
            'default'=>$this->default,
        ));
    }
}
