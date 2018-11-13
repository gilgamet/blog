<?php

namespace Core\HTML;

class BootstrapForm extends Form
{

    /**
     * @param $html string Code HTML à entourer
     * @return string
     */
    protected function surround($html)
    {
        return "<div class=\"form-group\">{$html}</div>";
    }

    /**
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label=null, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        $label = '<label>' . $label . '</label>';
        if ($type === 'textarea') {
            $input = '<textarea name="' . $name . '"placeholder="'.$name.'" class="form-control" style="min-height: 250px; required">' . $this->getValue($name) . '</textarea>';
        } else {
            $input = '<input type="' . $type . '" name="' . $name .'" id="' . $name .'"placeholder="'.$name. '" value="' . $this->getValue($name) . '" class="form-control" required">';
        }
        return $this->surround($label . $input);
    }
    
    public function tinyInput($name, $label=null, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        if ($type === 'textarea') {
            $input = '<textarea name="' . $name . '"placeholder="'.$name.'" class="tinymce" style="min-height:450px;" required">' . $this->getValue($name) . '</textarea>';;
        } else {
            $input = '<input type="' . $type . '" name="' . $name .'" id="' . $name .'"placeholder="'.$name. '" value="' . $this->getValue($name) . '" class="form-control" required">';
        }
        return $this->surround($input);
    }

    public function select($name, $label, $options)
    {
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '">';
        foreach($options as $k => $v){
            $attributes = '';
            if ($k == $this->getValue($name)) {
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

    /**
     * @return string
     */
    public function submit()
    {
        return $this->surround("<button type='submit' onclick='submitform()' class='btn btn-primary'>Envoyer</button>");
    }

     /**
     * @return string
     */
    public function signal()
    {
        return $this->surround("<button type='submit' onclick='submitform()' class='btn btn-default btn-sm' name='report' value='report'>Signaler ce commentaire</button>");
    }
}