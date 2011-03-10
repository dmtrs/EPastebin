<?php
        echo CHtml::beginForm('', "post", array(
            "class"=>"epastebin_container",
            "id"=>"ep_".$this->id,
        ));
        
        echo "<div class='epastebin_return' >";
        echo "</div>";
        echo CHtml::hiddenField("api_dev_key", $key);
        echo CHtml::hiddenField("api_option", "paste");
        echo "<div>";
        echo "Name:<br/>";
        echo CHtml::textField("api_paste_name");
        echo "</div>";
        echo "<div>";
        echo "Paste:<br/>";
        echo CHtml::textArea("api_paste_code");
        echo "</div>";
        echo "<div class='epastebin_controls'>";
        echo "  <div class='epastebin_control_right' >";
        echo CHtml::checkBox("api_paste_private")."Private";
        echo "  </div>";
        echo "  <div class='epastebin_control_left'>";
        echo "  Format<br/>";
        echo CHtml::dropDownList("api_paste_format", $default["format"], $format);
        echo "  </div>";
        echo "  <div class='epastebin_control_left'>";
        echo "  Expire Date<br/>";
        echo CHtml::dropDownList("api_paste_expire_date", $default["expire"], $expireDate);
        echo "  </div>";
        echo "  <div class='epastebin_control_left' >";
        echo "  <br />";
        echo CHtml::ajaxSubmitButton("Paste", array('epastebin'),
            array(
                "success"=>"js: function(data) { flashMessage(data); }"),
            array(
                "onclick"=>"$('.epastebin_return').hide('fast');")
        );
        echo "  </div>";
        echo "</div>";
        echo CHtml::endForm();
