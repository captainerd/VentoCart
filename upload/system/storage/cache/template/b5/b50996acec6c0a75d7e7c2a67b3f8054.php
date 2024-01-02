<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* admin/view/template/catalog/product_form_tab_options.twig */
class __TwigTemplate_e209e3d5d81a43bcfe8ba240b0c7e35a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "
<div id=\"option\">
  <style>
    .read-only {
      -webkit-appearance: none;
-moz-appearance: none;
appearance: none;
pointer-events: none;
padding-right: 1.25em; /* Adjust as needed to give space for custom arrow */
background-image: url(''); 
border: 0;
background-color: #ffffff00; /* Optional: Change background color for visual indication */
color: #0d0d0d; /* Optional: Change text color for visual indication */
}
.read-only select::-ms-expand {
display: none;
}
.my-handle {
  cursor: grab;
font-size: 21px;
cursor: -webkit-grabbing;
color: #595959;
}
</style>
<script type=\"text/javascript\" src=\"view/javascript/Sortable.min.js\"></script>


 
<div class=\"row mb-3\">
  <label for=\"input-option\" class=\"col-sm-2 col-form-label\">";
        // line 30
        echo ($context["entry_new_option"] ?? null);
        echo "</label>
  <div class=\"col-sm-10\">
    <div class=\"row\">
      <!-- New row for both the label and the input/button -->
      <div class=\"col-md-6\">
        <input type=\"button\" id=\"quich-opt-add\" class=\"btn btn-primary\" value=\"New Option\"/>

      </div>
  
    </div>
  </div>
</div>   
  <div class=\"row mb-3\">
    <label for=\"input-option\" class=\"col-sm-2 col-form-label\"> ";
        // line 43
        echo ($context["entry_existing_option"] ?? null);
        echo "</label>
    <div class=\"col-sm-10\">
      <div class=\"row\">
        <!-- New row for both the label and the input/button -->
        <div class=\"col-md-6\">
          <input type=\"text\" name=\"option\" value=\"\" placeholder=\"";
        // line 48
        echo ($context["entry_option"] ?? null);
        echo "\" id=\"input-option\" data-oc-target=\"autocomplete-option\" class=\"form-control\" autocomplete=\"off\"/>
          <ul id=\"autocomplete-option\" class=\"dropdown-menu\"></ul>
          <div class=\"form-text\">";
        // line 50
        echo ($context["help_option"] ?? null);
        echo "</div>
        </div>
    
      </div>
    </div>
  </div>


                ";
        // line 58
        $context["option_row"] = 0;
        // line 59
        echo "                ";
        $context["option_value_row"] = 0;
        // line 60
        echo "
                <ul class=\"listWithHandle\" id=\"option-row-body-b-";
        // line 61
        echo ($context["option_row"] ?? null);
        echo "\" style=\"padding: 0; margin: 0\">

                ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_options"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_option"]) {
            // line 64
            echo "
                <li class=\"list-group-item\">


                ";
            // line 68
            $context["showcallendar"] = "";
            // line 69
            echo "                ";
            $context["showaddbutton"] = "";
            // line 70
            echo "                ";
            if ((((twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 70) != "date") && (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 70) != "time")) && (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 70) != "datetime"))) {
                // line 71
                echo "                ";
                $context["showcallendar"] = "d-none";
                // line 72
                echo "                ";
            }
            // line 73
            echo "                ";
            if ((((((twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 73) == "date") || (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 73) == "time")) || (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 73) == "datetime")) || (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 73) == "text")) || (twig_get_attribute($this->env, $this->source,             // line 74
$context["product_option"], "type", [], "any", false, false, false, 74) == "texarea"))) {
                // line 76
                echo "                ";
                $context["showaddbutton"] = "d-none";
                // line 77
                echo "                ";
            }
            // line 78
            echo "               
                  

                  <fieldset class=\"border rounded\" id=\"option-row-";
            // line 81
            echo ($context["option_row"] ?? null);
            echo "\">
                    <div class=\"accordion\" id=\"accordion";
            // line 82
            echo ($context["option_row"] ?? null);
            echo "\">
                      <div class=\"accordion-item\">
                        
                          <h2 class=\"accordion-header\" id=\"heading";
            // line 85
            echo ($context["option_row"] ?? null);
            echo "\">
                       
                            <div class=\"d-flex align-items-center\">
                            
                              <button class=\"accordion-button collapsed flex-grow-1\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse";
            // line 89
            echo ($context["option_row"] ?? null);
            echo "\" aria-expanded=\"true\" aria-controls=\"collapse";
            echo ($context["option_row"] ?? null);
            echo "\">
                                <span class=\"my-handle\" aria-hidden=\"true\">
                               
                                    <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                                  </span>  ";
            // line 93
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "name", [], "any", false, false, false, 93);
            echo "
                              </button>
                            
                              <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"";
            // line 96
            echo ($context["button_option_value_add"] ?? null);
            echo "\" data-option-row=\"";
            echo ($context["option_row"] ?? null);
            echo "\" class=\"btn mx-1 btn-primary  add-opt-button ";
            echo ($context["showaddbutton"] ?? null);
            echo "\">
                                <i class=\"fa-solid fa-plus-circle\"></i>
                            </button>
                            <a href=\"index.php?route=catalog/option.form&user_token=";
            // line 99
            echo ($context["user_token"] ?? null);
            echo "&option_id=";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 99);
            echo "\" class=\"btn mx-1 btn-primary\">
                                <i class=\"fa-solid fa-pencil\"></i>
                            </a>
                              <!-- Buttons -->
                              <button type=\"button\" class=\"btn btn-danger\" onclick=\"removeAllGroup(";
            // line 103
            echo ($context["option_row"] ?? null);
            echo ", ";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "poption_id", [], "any", false, false, false, 103);
            echo ");\">
                                <i class=\"fa-solid fa-minus-circle\"></i>
                              </button>
                            </div>
                            
                          </h2>
                          <div id=\"collapse";
            // line 109
            echo ($context["option_row"] ?? null);
            echo "\" class=\"accordion-collapse collapse\" aria-labelledby=\"heading";
            echo ($context["option_row"] ?? null);
            echo "\" data-bs-parent=\"#accordion";
            echo ($context["option_row"] ?? null);
            echo "\">
                              <div class=\"accordion-body\"  >
                                  <!-- Content goes here -->
                           
                                  <div class=\"row mb-3\">
                                    <div class=\"col-sm-2\">
                                        <!-- Your label goes here -->
                                        <label for=\"input-required-";
            // line 116
            echo ($context["option_row"] ?? null);
            echo "\" class=\"col-form-label\">";
            echo ($context["entry_required"] ?? null);
            echo "</label>
                                    </div>
                                    <div class=\"col-sm-10\">
                                        <!-- Input and buttons in the same row -->
                                        <div class=\"input-group\">
                                            <!-- Input -->
                                            <div style=\"width: 100px\"> 
                                            <select name=\"product_option[";
            // line 123
            echo ($context["option_row"] ?? null);
            echo "][required]\" id=\"input-required-";
            echo ($context["option_row"] ?? null);
            echo "\" class=\"form-select\">
                                                <option value=\"1\"";
            // line 124
            if (twig_get_attribute($this->env, $this->source, $context["product_option"], "required", [], "any", false, false, false, 124)) {
                echo " selected";
            }
            echo ">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                                <option value=\"0\"";
            // line 125
            if ( !twig_get_attribute($this->env, $this->source, $context["product_option"], "required", [], "any", false, false, false, 125)) {
                echo " selected";
            }
            echo ">";
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                                            </select></div>
                                         
                                     
                                        </div>
                                    </div>
                                </div>
                                

            
                    <input type=\"hidden\" name=\"product_option[";
            // line 135
            echo ($context["option_row"] ?? null);
            echo "][name]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "name", [], "any", false, false, false, 135);
            echo "\"/> 
                    <input type=\"hidden\" name=\"product_option[";
            // line 136
            echo ($context["option_row"] ?? null);
            echo "][option_id]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 136);
            echo "\"/> 
                    <input type=\"hidden\" name=\"product_option[";
            // line 137
            echo ($context["option_row"] ?? null);
            echo "][type]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 137);
            echo "\"/>
                    <input type=\"hidden\" name=\"product_option[";
            // line 138
            echo ($context["option_row"] ?? null);
            echo "][sort_order]\"  value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "sort_order", [], "any", false, false, false, 138);
            echo "\" class=\"sort-value\">
                    <select class=\"d-none\" id=\"select-default-row-";
            // line 139
            echo ($context["option_row"] ?? null);
            echo "\">
                      ";
            // line 140
            if ((($__internal_compile_0 = ($context["option_values"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 140)] ?? null) : null)) {
                // line 141
                echo "                      ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((($__internal_compile_1 = ($context["option_values"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 141)] ?? null) : null));
                foreach ($context['_seq'] as $context["_key"] => $context["option_value"]) {
                    // line 142
                    echo "                      <option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["option_value"], "option_value_id", [], "any", false, false, false, 142);
                    echo "\" ";
                    if ((twig_get_attribute($this->env, $this->source, ($context["product_option_value"] ?? null), "name", [], "any", false, false, false, 142) == twig_get_attribute($this->env, $this->source, $context["option_value"], "name", [], "any", false, false, false, 142))) {
                        // line 143
                        echo "selected";
                    }
                    echo ">";
                    echo twig_get_attribute($this->env, $this->source, $context["option_value"], "name", [], "any", false, false, false, 143);
                    echo "</option>
                      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option_value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 145
                echo "                      ";
            }
            // line 146
            echo "
                    </select>


                    ";
            // line 150
            $context["inputType"] = "";
            // line 151
            echo "         
                    ";
            // line 152
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 152), ["text", "textarea", "date", "time", "datetime"])) {
                // line 153
                echo "                        ";
                if ((twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 153) == "textarea")) {
                    // line 154
                    echo "                            ";
                    $context["inputType"] = "textarea";
                    // line 155
                    echo "                        ";
                } else {
                    // line 156
                    echo "                            ";
                    $context["inputType"] = "text";
                    // line 157
                    echo "                        ";
                }
                // line 158
                echo "                 


                    
                        <div class=\"row mb-3\">
                            <label for=\"input-option-";
                // line 163
                echo ($context["option_row"] ?? null);
                echo "\" class=\"col-sm-2 col-form-label\">";
                echo ($context["entry_option_value"] ?? null);
                echo "</label>
                            <div class=\"col-sm-10 col-md-4\">
                                
                                    <div class=\"input-group\">
                                        <input type=\"";
                // line 167
                echo ($context["inputType"] ?? null);
                echo "\" name=\"product_option[";
                echo ($context["option_row"] ?? null);
                echo "][value]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product_option"], "value", [], "any", false, false, false, 167);
                echo "\" placeholder=\"";
                echo ($context["entry_option_value"] ?? null);
                echo "\" id=\"input-option-";
                echo ($context["option_row"] ?? null);
                echo "\" class=\"form-control ";
                echo twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 167);
                echo "\"  />
                                        <div  class=\"input-group-text ";
                // line 168
                echo ($context["showcallendar"] ?? null);
                echo "\"><i class=\"fa-regular fa-calendar\"></i></div>
                                    </div>
                            </div>
                        </div>
                    ";
            }
            // line 173
            echo "                    <input type=\"hidden\" name=\"product_option[";
            echo ($context["option_row"] ?? null);
            echo "][poption_id]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "poption_id", [], "any", false, false, false, 173);
            echo "\"/>
                    <input type=\"hidden\" name=\"product_option[";
            // line 174
            echo ($context["option_row"] ?? null);
            echo "][option_id]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 174);
            echo "\"/>
                    
                    ";
            // line 176
            if (((((twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 176) == "select") || (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 176) == "radio")) || (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 176) == "checkbox")) || (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 176) == "image"))) {
                // line 177
                echo "      
   

                             <!-- start of shortable accordion table -->
                             <ul class=\"listWithHandle\" id=\"option-row-body-";
                // line 181
                echo ($context["option_row"] ?? null);
                echo "\" style=\"padding: 0; margin: 0\">
                            ";
                // line 182
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product_option"], "product_option_value", [], "any", false, false, false, 182));
                foreach ($context['_seq'] as $context["_key"] => $context["product_option_value"]) {
                    // line 183
                    echo "                            <li class=\"list-group-item\">
                               
                            <div class=\"accordion  sortable-accordion\" id=\"accordion";
                    // line 185
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\">
                              <div class=\"accordion-item\">
                                <div class=\"d-flex align-items-center\">
                                  <button  class=\"accordion-button  collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse";
                    // line 188
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\" aria-expanded=\"true\" aria-controls=\"collapse";
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\">
                                    <span class=\"  my-handle\" aria-hidden=\"true\">

                                      <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                                    </span>      <span class=\"option-title-accordion\">";
                    // line 192
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "name", [], "any", false, false, false, 192);
                    echo "  </span>  
                                  </button>

                                  <input type=\"hidden\" value=\"";
                    // line 195
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "sort_order", [], "any", false, false, false, 195);
                    echo "\" name=\"product_option[";
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][sort_order]\" class=\"sort-value\">

                                  <button type=\"button\"   
                         onclick=\"removeOptionValue('accordion";
                    // line 198
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "', ";
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "poption_id", [], "any", false, false, false, 198);
                    echo ");\"
                      data-bs-toggle=\"tooltip\" title=\"";
                    // line 199
                    echo ($context["button_remove"] ?? null);
                    echo "\" class=\"btn btn-danger\">
                    <i class=\"fa-solid fa-minus-circle\"></i>
                      </button>
                    </div>
                                 
                                <div id=\"collapse";
                    // line 204
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading";
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\" data-bs-parent=\"#accordion";
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\">
      
<table class=\"table table-bordered  \">
<tr>
  <td class=\"text-start\"><strong>";
                    // line 208
                    echo ($context["entry_image"] ?? null);
                    echo "</strong></td>
  <td class=\"text-start\">

    <div style=\"max-width: 60px; display: inline-block\">
     
      <img src=\"";
                    // line 213
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "image", [], "any", false, false, false, 213);
                    echo "\" alt=\"\" title=\"\" id=\"thumb-image-";
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\"
        data-oc-placeholder=\"";
                    // line 214
                    echo ($context["placeholder"] ?? null);
                    echo "\" class=\"  card-img-top \" />
    </div>
    </br>
    <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image-";
                    // line 217
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\"
      data-oc-thumb=\"#thumb-image-";
                    // line 218
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\" class=\"btn btn-info btn-sm btn-block\"
      name=\"product_option_button[";
                    // line 219
                    echo ($context["option_row"] ?? null);
                    echo "][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][image]\">
      <i class=\"fa-solid fa-pencil\"></i> ";
                    // line 220
                    echo ($context["entry_image"] ?? null);
                    echo "
    </button>
    <input type=\"hidden\" class=\"optimage\"
      name=\"product_option[";
                    // line 223
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][image]\"
      id=\"input-image-";
                    // line 224
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "value", [], "any", false, false, false, 224);
                    echo "\" />

    <button type=\"button\" data-clear=\"";
                    // line 226
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\"
      class=\"btn clear-button  btn-warning btn-sm btn-block\"
      name=\"product_option_button[";
                    // line 228
                    echo ($context["option_row"] ?? null);
                    echo "][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][clear]\">
      <i class=\"fa-regular fa-trash-can\"></i> ";
                    // line 229
                    echo ($context["button_clear"] ?? null);
                    echo "
    </button>

  </td>
</tr>

<tr>

  <td class=\"text-start\"><strong>";
                    // line 237
                    echo ($context["entry_option_value"] ?? null);
                    echo "</strong></td>
  <td class=\"text-start\">
    <select  name=\"product_option[";
                    // line 239
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][option_value_id]\" class=\"read-only option-select form-select\" id=\"product-option-values-";
                    echo ($context["option_row"] ?? null);
                    echo "\">
      ";
                    // line 240
                    if ((($__internal_compile_2 = ($context["option_values"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 240)] ?? null) : null)) {
                        // line 241
                        echo "      ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((($__internal_compile_3 = ($context["option_values"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 241)] ?? null) : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["option_value"]) {
                            // line 242
                            echo "      <option value=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["option_value"], "option_value_id", [], "any", false, false, false, 242);
                            echo "\" ";
                            if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "name", [], "any", false, false, false, 242) == twig_get_attribute($this->env, $this->source, $context["option_value"], "name", [], "any", false, false, false, 242))) {
                                // line 243
                                echo "selected";
                            }
                            echo ">";
                            echo twig_get_attribute($this->env, $this->source, $context["option_value"], "name", [], "any", false, false, false, 243);
                            echo "</option>
      ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option_value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 245
                        echo "      ";
                    }
                    // line 246
                    echo "    </select>

    <input type=\"hidden\"
      name=\"product_option[";
                    // line 249
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][poption_id]\"
      value=\"";
                    // line 250
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "poption_id", [], "any", false, false, false, 250);
                    echo "\" />
    
      
 
  </td>
</tr>

<tr>
  <td class=\"text-start\"><strong>";
                    // line 258
                    echo ($context["entry_quantity"] ?? null);
                    echo "</strong></td>
  <td class=\"text-start\">
    <input class=\"read-only form-control\" pattern=\"[0-9]+([\\.,][0-9]+)?\" style=\"min-width: 80px;\" type=\"text\"
      name=\"product_option[";
                    // line 261
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][quantity]\"
      value=\"";
                    // line 262
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "quantity", [], "any", false, false, false, 262);
                    echo "\" />
  </td>
</tr>

<tr>
  <td class=\"text-start\"><strong>";
                    // line 267
                    echo ($context["entry_subtract"] ?? null);
                    echo "</strong></td>
  <td class=\"text-start\">
    <select class=\"read-only form-select\"
      name=\"product_option[";
                    // line 270
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][subtract]\">
      <option value=\"0\" ";
                    // line 271
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "subtract", [], "any", false, false, false, 271) == "0")) {
                        echo "selected";
                    }
                    echo ">No</option>
      <option value=\"1\" ";
                    // line 272
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "subtract", [], "any", false, false, false, 272) == "1")) {
                        echo "selected";
                    }
                    echo ">Yes</option>
    </select>
  </td>
</tr>



<tr>
  <td    class=\"text-start\"><strong>";
                    // line 280
                    echo ($context["entry_price"] ?? null);
                    echo "</strong></td>
  <td class=\"text-start\">
    <div class=\"input-group\">
      <div style=\"width: 70px;\">
        <select class=\"read-only form-select \"
          name=\"product_option[";
                    // line 285
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][price_prefix]\">
          <option value=\"+\" ";
                    // line 286
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "price_prefix", [], "any", false, false, false, 286) == "+")) {
                        echo "selected";
                    }
                    echo ">+</option>
          <option value=\"-\" ";
                    // line 287
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "price_prefix", [], "any", false, false, false, 287) == "-")) {
                        echo "selected";
                    }
                    echo ">-</option>
          <option value=\"-\" ";
                    // line 288
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "price_prefix", [], "any", false, false, false, 288) == "=")) {
                        echo "selected";
                    }
                    echo ">=</option>
        </select>
      </div>
      <input class=\"read-only form-control\" pattern=\"[0-9]+([\\.,][0-9]+)?\" style=\"min-width: 80px;\" type=\"text\"
        name=\"product_option[";
                    // line 292
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][price]\"
        value=\"";
                    // line 293
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "price", [], "any", false, false, false, 293);
                    echo "\" />
    </div>
  </td>
</tr>

<tr>

  <td class=\"text-start\"><strong>";
                    // line 300
                    echo ($context["entry_points"] ?? null);
                    echo "</strong></td>
  <td class=\"text-start\">
    <div class=\"input-group\">
      <div style=\"width: 70px;\">
        <select class=\"read-only form-select\"
          name=\"product_option[";
                    // line 305
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][points_prefix]\">
          <option value=\"+\" ";
                    // line 306
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "points_prefix", [], "any", false, false, false, 306) == "+")) {
                        echo "selected";
                    }
                    echo ">+</option>
          <option value=\"-\" ";
                    // line 307
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "points_prefix", [], "any", false, false, false, 307) == "-")) {
                        echo "selected";
                    }
                    echo ">-</option>
        </select>
      </div>
      <input class=\"read-only form-control\" style=\"min-width: 80px;\" pattern=\"[0-9]+([\\.,][0-9]+)?\" type=\"text\"
        name=\"product_option[";
                    // line 311
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][points]\"
        value=\"";
                    // line 312
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "points", [], "any", false, false, false, 312);
                    echo "\" />
    </div>
  </td>
</tr>

<tr>

  <td class=\"text-start\" ><strong>";
                    // line 319
                    echo ($context["entry_weight"] ?? null);
                    echo "</strong></td>
  <td class=\"text-start\">
    <div class=\"input-group\">
      <div style=\"width: 70px;\">
        <select class=\"read-only form-select\"
          name=\"product_option[";
                    // line 324
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][weight_prefix]\">
          <option value=\"+\" ";
                    // line 325
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "weight_prefix", [], "any", false, false, false, 325) == "+")) {
                        echo "selected";
                    }
                    echo ">+</option>
          <option value=\"-\" ";
                    // line 326
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "weight_prefix", [], "any", false, false, false, 326) == "-")) {
                        echo "selected";
                    }
                    echo ">-</option>
        </select>
      </div>
      <input class=\"read-only form-control\" style=\"min-width: 80px;\" pattern=\"[0-9]+([\\.,][0-9]+)?\" type=\"text\"
        name=\"product_option[";
                    // line 330
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][weight]\"
        value=\"";
                    // line 331
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "weight", [], "any", false, false, false, 331);
                    echo "\" />
    </div>
  </td>
<tr>
<td>
</td>
<td>

<button type=\"button\" data-bs-toggle=\"tooltip\" title=\"Lock/Unlock\"  
data-option-value-row=\"accordion";
                    // line 340
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\" data-poption-id=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "poption_id", [], "any", false, false, false, 340);
                    echo "\"
class=\"btn btn-primary add-or-edit-btn\"> <i class=\"fa-solid fa-unlock\"></i></button>

</td>
</tr>
</tr>
</table>
                             
                         </li>
                              ";
                    // line 349
                    $context["option_value_row"] = (($context["option_value_row"] ?? null) + 1);
                    // line 350
                    echo "                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_option_value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 351
                echo "                          </ul>
                          <!-- end of shortable accordion table -->
                          </tbody>
                          <tfoot>
                          </tfoot>
                        </table>
                   
                      </div>
                    ";
            }
            // line 360
            echo "                  </fieldset>
     
    </li>
                  ";
            // line 363
            $context["option_row"] = (($context["option_row"] ?? null) + 1);
            // line 364
            echo "    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 366
        echo "   
            </div>
          </ul>





<!--  hidden modal quick add new option -->
<div id=\"quick-newmodal-option\" class=\"modal fade\" style=\"display: none;\">
  <div class=\"modal-dialog\">
      <div class=\"modal-content\">
          <div class=\"modal-header\">
              <h5 class=\"modal-title\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 379
        echo ($context["text_add_new_option"] ?? null);
        echo "</h5>
              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
          </div>
          <div class=\"modal-body\">
            <form id=\"quick-add-form\"> 
   
            <div class=\"mb-3\">
                <label for=\"input-modal-language\" class=\"form-label\">";
        // line 386
        echo ($context["entry_select_language"] ?? null);
        echo "</label>
                <select name=\"option_language\" id=\"input-modal-language\" class=\"form-select\">
                    ";
        // line 388
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["code"] => $context["language"]) {
            // line 389
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 389);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 389);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['code'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 391
        echo "                </select>
            </div>
 
            <div class=\"mb-3\">
                <label for=\"input-modal-option-type\" class=\"form-label\">";
        // line 395
        echo ($context["option_type"] ?? null);
        echo "</label>
                <select name=\"option_type\" id=\"input-modal-option-type\" class=\"form-select\">
                    <option value=\"radio\">Radio</option>
                    <option value=\"checkbox\">Checkbox</option>
                    <option value=\"select\">Select</option>
                    <option value=\"file\">File</option>
                    <option value=\"text\">Text</option>
                    <option value=\"textarea\">TextArea</option>
                    <option value=\"date\">Date</option>
                    <option value=\"time\">Time</option>
                    <option value=\"datetime\">DateTime</option>
                </select>
            </div>

            <div class=\"mb-3\">
              <label for=\"input-modal-option-group\" class=\"form-label\">";
        // line 410
        echo ($context["entry_group_option_name"] ?? null);
        echo "</label>
              <input type=\"text\" name=\"option_group_name\" value=\"\" placeholder=\"";
        // line 411
        echo ($context["entry_group_option_name"] ?? null);
        echo "\" id=\"input-modal-option-group\" class=\"form-control option-languaged\" />
          </div>
        
          <div id=\"opts-container\">
  
          </div>
          <div class=\"modal-footer\">
              <button type=\"button\" id=\"button-quick-option-save\" class=\"btn btn-primary \">";
        // line 418
        echo ($context["button_save"] ?? null);
        echo "</button>
              <button type=\"button\" class=\"btn btn-light\" data-bs-dismiss=\"modal\">";
        // line 419
        echo ($context["button_cancel"] ?? null);
        echo "</button>
          </div>
        </form>
      </div>
   
  </div>
<!--  End /hidden modal quick add new option -->

<!-- Template, to generate opt, in new option modal -->
  <div id=\"variable-option-inputset\" class=\"row mb-6 d-none\">
    <div class=\"btn-group\">
    <input type=\"text\" name=\"option_q_name[xxx]\" value=\"\" placeholder=\"";
        // line 430
        echo ($context["entry_option_name"] ?? null);
        echo "\" id=\"input-modal-option-name-xxx\" class=\"form-control option-languaged\" />
    <button type=\"button\" data-bs-toggle=\"tooltip\"  class=\"btn btn-primary add-q-option\" aria-label=\"Add Option Value\" data-bs-original-title=\"Add Option Value\">
      <i class=\"fa-solid fa-plus-circle\"></i></button>
  </div>
</div>
<!-- End /Template, to generate opt, in new option modal -->


</div>


<!-- Template, to generate base opt -->

<li  id=\"option-row-option_row_placeholder\"    class=\"list-group-item  d-none \">
<fieldset     class=\"border rounded\" >
  <div class=\"accordion\" id=\"accordionoption_row_placeholder\">
    <div class=\"accordion-item\">
        <h2 class=\"accordion-header\" id=\"headingoption_row_placeholder\">
          <div class=\"d-flex align-items-center\"> 
            <button  class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseoption_row_placeholder\" aria-expanded=\"true\" aria-controls=\"collapseoption_row_placeholder\">
              <span class=\"  my-handle\" aria-hidden=\"true\">
                <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
              </span>     option_name_placeholder
           
            </button>

                   <!-- Buttons -->
                   <button type=\"button\" class=\"btn mx-1 btn-danger\" onclick=\"javascript:\$('#option-row-option_row_placeholder').remove();\">
                    <i class=\"fa-solid fa-minus-circle\"></i>
                </button>
                <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"";
        // line 460
        echo ($context["button_option_value_add"] ?? null);
        echo "\"   data-option-row=\"option_row_placeholder\" class=\"btn mx-1 btn-primary showaddoption add-opt-button\">
                    <i class=\"fa-solid fa-plus-circle\"></i>
                </button>
              </div>
            
        </h2>
        <div id=\"collapseoption_row_placeholder\" class=\"accordion-collapse collapse\" aria-labelledby=\"headingoption_row_placeholder\" data-bs-parent=\"#accordionoption_row_placeholder\">
            <div class=\"accordion-body\">
         
                <div class=\"row mb-3\">
                  <div class=\"col-sm-2\">
 
                      <label for=\"input-required-option_row_placeholder\" class=\"col-form-label\">";
        // line 472
        echo ($context["entry_required"] ?? null);
        echo "</label>
                  </div>
                  <div class=\"col-sm-10\">
                      <div class=\"input-group\">
                          <!-- Input -->
                          <div style=\"width: 100px\"> 
                          <select name=\"xxxproduct_option[option_row_placeholder][required]\" id=\"input-required-option_row_placeholder\" class=\"form-select\">
                              <option value=\"1\" >";
        // line 479
        echo ($context["text_enabled"] ?? null);
        echo "</option>
                              <option value=\"0\" >";
        // line 480
        echo ($context["text_disabled"] ?? null);
        echo "</option>
                          </select></div>
                          
                    
                          <a href=\"index.php?route=catalog/option.form&user_token=";
        // line 484
        echo ($context["user_token"] ?? null);
        echo "&option_id=option_id_placeholder\" class=\"btn mx-1 btn-primary\">
                              <i class=\"fa-solid fa-pencil\"></i>
                          </a>
                      </div>
                  </div>
              </div>

<div  class=\"row mb-3 showvalueinput\">
  <label for=\"input-option-option_row_placeholder\" class=\"col-sm-2 col-form-label\">";
        // line 492
        echo ($context["entry_option_value"] ?? null);
        echo "</label>
  <div class=\"col-sm-10 col-md-4\">
          <div class=\"input-group\">
              <input type=\"option_type_placeholder\" name=\"xxxproduct_option[option_row_placeholder][value]\" value=\"\" placeholder=\"";
        // line 495
        echo ($context["entry_option_value"] ?? null);
        echo "\" id=\"input-option-option_row_placeholder\" class=\"form-control   option_type_placeholder\"  />
              <div class=\"input-group-text showcallendar\"><i class=\"fa-regular fa-calendar\"></i></div>
          </div>
  </div>
 
</div>
<ul class=\"listWithHandle\" id=\"option-row-body-option_row_placeholder\" style=\"padding: 0; margin: 0\">

</ul>
</div>
</div>
<select class=\"d-none\" id=\"select-default-row-option_row_placeholder\"></select>
<input type=\"hidden\" name=\"xxxproduct_option[option_row_placeholder][name]\" value=\"option_name_placeholder\"/> 
<input type=\"hidden\" name=\"xxxproduct_option[option_row_placeholder][option_id]\" value=\"option_id_placeholder\"/> 
<input type=\"hidden\" name=\"xxxproduct_option[option_row_placeholder][type]\" value=\"option_type_placeholder\"/>
<input type=\"hidden\" name=\"xxxproduct_option[option_row_placeholder][sort_order]\"  value=\"100\" class=\"sort-value\">
</div>
</div>
</fieldset>
</li>
 
<!-- End /Template, to generate base opt -->



<!-- Template, to generate sub options to options -->
<div id=\"option-template-div\" class=\" d-none\">   
<li class=\"list-group-item\" >                        
  <div class=\"accordion  sortable-accordion\" id=\"accordionoption-row-placeholder-option-valuerow-placeholder\">
    <div class=\"accordion-item\">

      <div class=\"d-flex align-items-center\"> 
        <button  class=\"accordion-button  collapsed\" style=\"border: 1px solid #14d946;\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseoption-row-placeholder-option-valuerow-placeholder\" aria-expanded=\"true\" aria-controls=\"collapseoption-row-placeholder-option-valuerow-placeholder\">
          <span class=\"  my-handle\" aria-hidden=\"true\">
            <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
          </span>    <span class=\"option-title-accordion\">option-name-placeholder</span>
        </button>

        <button type=\"button\"   
onclick=\"javascript:\$(this).closest('li').remove();\"
data-bs-toggle=\"tooltip\" title=\"";
        // line 535
        echo ($context["button_remove"] ?? null);
        echo "\" class=\"btn btn-danger\">
<i class=\"fa-solid fa-minus-circle\"></i>
</button>

<input type=\"hidden\" name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][sort_order]\" value=\"100\"  class=\"sort-value\">
</div>

      <div id=\"collapseoption-row-placeholder-option-valuerow-placeholder\" class=\"accordion-collapse collapse \" aria-labelledby=\"headingoption-row-placeholder-option-valuerow-placeholder\" data-bs-parent=\"#accordionoption-row-placeholder-option-valuerow-placeholder\">
<table class=\"table table-bordered \">
<tr>
<td class=\"text-start\"><strong>";
        // line 545
        echo ($context["entry_image"] ?? null);
        echo "</strong></td>
<td class=\"text-start\">
<div style=\"max-width: 60px; display: inline-block\">
<img src=\"\" alt=\"\" title=\"\" id=\"thumb-image-option-row-placeholder-option-valuerow-placeholder\"
data-oc-placeholder=\"";
        // line 549
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"  card-img-top d-none\" />
</div>
</br>
<button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image-option-row-placeholder-option-valuerow-placeholder\"
data-oc-thumb=\"#thumb-image-option-row-placeholder-option-valuerow-placeholder\" class=\"btn btn-info btn-sm btn-block\"
name=\"xxxproduct_option_button[option-row-placeholder][option-valuerow-placeholder][image]\">
<i class=\"fa-solid fa-pencil\"></i> ";
        // line 555
        echo ($context["entry_image"] ?? null);
        echo "
</button>
<input type=\"hidden\" class=\"optimage\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][image]\"
id=\"input-image-option-row-placeholder-option-valuerow-placeholder\" value=\"";
        // line 559
        echo twig_get_attribute($this->env, $this->source, ($context["option"] ?? null), "image", [], "any", false, false, false, 559);
        echo "\" />
<button type=\"button\" data-clear=\"option-row-placeholder-option-valuerow-placeholder\"
class=\"btn clear-button  btn-warning btn-sm btn-block\"
name=\"xxxproduct_option_button[option-row-placeholder][option-valuerow-placeholder][clear]\">
<i class=\"fa-regular fa-trash-can\"></i> ";
        // line 563
        echo ($context["button_clear"] ?? null);
        echo "
</button>
</td>
</tr>
<tr>
<td class=\"text-start\"><strong>";
        // line 568
        echo ($context["entry_option_value"] ?? null);
        echo "</strong></td>
<td class=\"text-start insertselect\">
 
<input type=\"hidden\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][poption_id]\"
value=\"undefined\" />
 
</td>
</tr>
<tr>
<td class=\"text-start\"><strong>";
        // line 578
        echo ($context["entry_quantity"] ?? null);
        echo "</strong></td>
<td class=\"text-start\">
<input class=\"read-only form-control\" pattern=\"[0-9]+([\\.,][0-9]+)?\" style=\"min-width: 80px;\" type=\"text\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][quantity]\"
value=\"0\" />
</td>
</tr>
<tr>
<td class=\"text-start\"><strong>";
        // line 586
        echo ($context["entry_subtract"] ?? null);
        echo "</strong></td>
<td class=\"text-start\">
<select class=\"read-only form-select\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][subtract]\">
<option value=\"0\"  selected >No</option>
<option value=\"1\" >Yes</option>
</select>
</td>
</tr>
<tr>
<td class=\"text-start\"><strong>";
        // line 596
        echo ($context["entry_price"] ?? null);
        echo "</strong></td>
<td class=\"text-start\">
<div class=\"input-group\">
<div style=\"width: 70px;\">
<select class=\"read-only form-select \"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][price_prefix]\">
<option value=\"+\" selected >+</option>
<option value=\"-\" >-</option>
<option value=\"=\" >=</option>
</select>
</div>
<input class=\"read-only form-control\" pattern=\"[0-9]+([\\.,][0-9]+)?\" style=\"min-width: 80px;\" type=\"text\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][price]\"
value=\"0\" />
</div>
</td>
</tr>

<tr>
<td class=\"text-start\"><strong>";
        // line 615
        echo ($context["entry_points"] ?? null);
        echo "</strong></td>
<td class=\"text-start\">
<div class=\"input-group\">
<div style=\"width: 70px;\">
<select class=\"read-only form-select\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][points_prefix]\">
<option value=\"+\" selected >+</option>
<option value=\"-\" >-</option>
</select>
</div>
<input class=\"read-only form-control\" style=\"min-width: 80px;\" pattern=\"[0-9]+([\\.,][0-9]+)?\" type=\"text\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][points]\"
value=\"0\" />
</div>
</td>
</tr>

<tr>
<td class=\"text-start\" ><strong>";
        // line 633
        echo ($context["entry_weight"] ?? null);
        echo "</strong></td>
<td class=\"text-start\">
<div class=\"input-group\">
<div style=\"width: 70px;\">
<select class=\"read-only form-select\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][weight_prefix]\">
<option value=\"+\" selected >+</option>
<option value=\"-\" >-</option>
</select>
</div>
<input class=\"read-only form-control\" style=\"min-width: 80px;\" pattern=\"[0-9]+([\\.,][0-9]+)?\" type=\"text\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][weight]\"
value=\"0\" />
</div>
</td>
</tr>
<tr>
<td>
</td>
<td>
<button type=\"button\" data-bs-toggle=\"tooltip\" title=\"Lock/Unlock\" data-option-row=\"option-row-placeholder\"
data-option-value-row=\"accordionoption-row-placeholder-option-valuerow-placeholder\" 
class=\"btn btn-primary add-or-edit-btn\"> <i class=\"fa-solid fa-unlock\"></i></button>
 
</td>
</tr>
</tr>
</table>
      </div>
    </div>
  </div>

</li>
</div>
<!-- End /Template, to generate sub options to options -->






 

            <script>

              \$('#input-option').autocomplete({
  'source': function (request, response) {
      \$.ajax({
          url: 'index.php?route=catalog/option.autocomplete&user_token=";
        // line 681
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
          dataType: 'json',
          success: function (json) {
              response(\$.map(json, function (item) {
                  return {
                      category: item['category'],
                      label: item['name'],
                      value: item['option_id'],
                      type: item['type'],
                      option_value: item['option_value']
                  }
              }));
          }
      });
  },
  'select': function (item) {  
    addOption(item);
  }
});

var optionLanguages = {};
 
var option_row = ";
        // line 703
        echo ($context["option_row"] ?? null);
        echo ";

var quickoptcounter = 0;

var option_value_row = ";
        // line 707
        echo ($context["option_value_row"] ?? null);
        echo ";

var selectElement = document.getElementById('input-modal-language');

var selectedOption = selectElement.options[selectElement.selectedIndex];

var preSelectedLanguageId = selectedOption.value;

 
function addOption(option) {
  // Get the hidden template and clone it
  let template = \$('#option-row-option_row_placeholder').clone();
  // Remove the 'd-none' class
  template.removeClass('d-none');
  template.attr('id', 'option-row-' + option_row);

  // Replace placeholders with actual values, Remove submission protection tag 'xxx'
  template.html(template.html().replace(/xxx/g, ''));
  template.html(template.html().replace(/option_row_placeholder/g, option_row));
  template.html(template.html().replace(/option_type_placeholder/g, option.type));
  template.html(template.html().replace(/option_name_placeholder/g, option.label));
  template.html(template.html().replace(/option_id_placeholder/g, option.value));

  //hide callendar
  if (option.type != 'date' && option.type != 'time' && option.type != 'datetime') {
    template.find('.showcallendar').remove();
  }
  //hide add option
  if (option.type == 'date' || option.type == 'time' ||
    option.type == 'datetime' || option.type == 'text' || option.type == 'textarea') {

    template.find('.showaddoption').remove();
  }
  if (option.type == 'select' || option.type == 'checkbox' ||
    option.type == 'radio') {
    template.find('.showvalueinput').remove();
  }
  // Append the modified template to the #option element
  \$('#option-row-body-b-0').append(template);

  const selectElement = \$(\"#select-default-row-\" + option_row);

  // Loop through the option_value array and generate <option> elements
  option.option_value.forEach((optionValue) => {
    const optionElement = \$('<option>', {
      value: optionValue.option_value_id,
      text: optionValue.name
    });

    // Append the <option> element to the <select> element
    selectElement.append(optionElement);
  });

  option_row++;
  initializeSortables();
}

function initializeSortables() {
  \$('.listWithHandle').each(function () {
    // Check if Sortable instance already exists
    if (!\$(this).data('sortable')) {
      // Create Sortable instance
      Sortable.create(this, {
        handle: '.my-handle',
        animation: 150,
        onEnd: function (event) {
          // Update the values after sorting is complete
          updateSortValues(event.from);
        }
      });
    }
  });
}

function updateSortValues(sortableContainer) {
  \$(\"#option\").find('li').each(function (index) {
    // Update the value of the input with the position
    \$(this).find('.sort-value').val(index + 1);
  });
}
// Call the function to initialize Sortables
initializeSortables();

\$(document).on('change', \"#input-modal-option-type\", function () {

  optionLanguages = {};

  // Get the current value and store it as the previous value
  var currentType = \$(this).val();

  // Show or hide opts-container accordingly
  if (currentType === \"radio\" || currentType === \"checkbox\" || currentType === \"select\") {
    \$(\"#opts-container\").show();

    // Check if the previous type was not checkbox, radio, or select, then call addQuickOption
    if (previousType !== \"checkbox\" && previousType !== \"radio\" && previousType !== \"select\") {
      addQuickOption();
    }
  } else {
    quickoptcounter = 0;
    \$(\"#opts-container\").html('');
    \$(\"#opts-container\").hide();
  }

  // Update the previousType variable for the next change event
  previousType = currentType;
});

\$(document).ready(function () {

  \$('#quick-newmodal-option').on('keypress', 'input', function (event) {
    if (event.which === 13) { // Check if the pressed key is Enter
      event.preventDefault(); // Prevent the default form submission behavior
      \$('#button-quick-option-save').trigger('click'); // Trigger click event on the save button
    }
  });

  var languageInputs = {};

  // Iterate over all options in #input-modal-language select
  initializeOptionLanguages();

  function initializeOptionLanguages() {
    // Get the currently selected language
    var selectedLanguageId = \$('#input-modal-language').val();

    // Iterate over all options in #input-modal-language select
    \$('#input-modal-language option').each(function () {
      var langId = \$(this).val();

      // Create an entry for the language in the optionLanguages object
      if (typeof optionLanguages[langId] === 'undefined') optionLanguages[langId] = {};

      // Iterate over all inputs with class \"option-languaged\"
      \$('.option-languaged').each(function () {
        // Get the name attribute of the input
        var inputName = \$(this).attr('name');

        // Get the value of the input for the currently selected language
        var inputValue = \$(this).val();

        // Save the input value in the optionLanguages object
        if (selectedLanguageId === langId) {
          optionLanguages[langId][inputName] = inputValue;
        } else {
          if (typeof optionLanguages[langId][inputName] === 'undefined') optionLanguages[langId][
            inputName] = '';

        }
      });
    });

  }

  // Event listener for changes in the language select
  \$('#input-modal-language').change(function () {
    // Get the selected option's text
    var language = \$(this).find(':selected').text();

    // Loop through all text inputs in #opts-container
    \$('#quick-add-form input[type=\"text\"]').each(function () {
      // Update the placeholder
      var currentPlaceholder = \$(this).attr('placeholder');
      var currentPlaceholder = currentPlaceholder.replace(/\\s*\\([^)]*\\)\\s*/, '');
      \$(this).attr('placeholder', currentPlaceholder + '  (' + language + ')');
    });


    updateLanguageInputs(preSelectedLanguageId, \$(this).val());
    preSelectedLanguageId = \$(this).val();
  });
  var formDataOpt;
  // Function to update languageInputs object
  function updateLanguageInputs(oldlangid, newlangid) {

    // Create an entry for the new language if it doesn't exist
    // Check if optionLanguages[oldlangid] is defined
    if (!optionLanguages[oldlangid]) {
      optionLanguages[oldlangid] = {};
    }

    // Check if optionLanguages[newlangid] is defined
    if (!optionLanguages[newlangid]) {
      optionLanguages[newlangid] = {};
    }

    // Iterate over all inputs with class \"option-languaged\"
    \$('.option-languaged').each(function () {
      // Get the name attribute of the input
      let inputName = \$(this).attr('name');
      let inputValue = \$(this).val();


      if (!optionLanguages[newlangid][inputName]) {
        optionLanguages[newlangid][inputName] = \"\";
      }
      // Get the language-specific value based on newlangid
      let languageValue = optionLanguages[newlangid][inputName];

      // Save the current input value in the optionLanguages object for the old language
      optionLanguages[oldlangid][inputName] = inputValue;


      // Set the value of the input to the language-specific value
      \$(this).val(languageValue);
    });
  }

  \$('#button-quick-option-save').click(function () {
    initializeOptionLanguages();
    // Check if all available inputs in .option-languaged have non-empty values
    var isValuesSet = checkAllValuesSet();

    if (isValuesSet) {

      postOption({
        options: processSquareBrackets(optionLanguages),
        type: \$(\"#input-modal-option-type\").val()
      });

    }

  });

  function processSquareBrackets(obj) {
    let newObj = {};

    for (let key in obj) {
      if (obj.hasOwnProperty(key)) {
        // Check if the key contains square brackets
        if (key.includes('[') && key.includes(']')) {
          let [propertyName, index] = key.split(']')[0].split('[');

          // Create nested structures if needed
          newObj[propertyName] = newObj[propertyName] || {};

          // Assign the value to the nested structure
          newObj[propertyName][index] = obj[key];
        } else {
          // Copy non-matching keys as is
          newObj[key] = obj[key];
        }

        // Recursively process nested objects
        if (typeof obj[key] === 'object' && !Array.isArray(obj[key])) {
          newObj[key] = processSquareBrackets(obj[key]);
        } else if (Array.isArray(obj[key])) {
          // Process each element in the array
          newObj[key] = obj[key].map(element => processSquareBrackets(element));
        }
      }
    }

    return newObj;
  }

  function postOption(options) {
    let product_id =  \$(\"#input-product-id\").val();
    if (product_id == 0) {
      alert('Failed, please save that product first');
      return;
    }
    \$.ajax({
      type: 'POST',
      url: 'index.php?route=catalog/product.addOption&user_token=";
        // line 971
        echo ($context["user_token"] ?? null);
        echo "&product_id='+  product_id,
      dataType: 'json',
      data: options,
      success: function (response) {
        if (response.status == \"ok\") {

          //submit occurred reload option tab content
          \$(\"#quick-newmodal-option\").modal('hide');
          \$(\"#option\").html(
            '<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  '
            );
          \$(\"#option\").load(
            'index.php?route=catalog/product.reloadOptions&user_token=";
        // line 983
        echo ($context["user_token"] ?? null);
        echo "&product_id=' +  product_id
            );
        } else {
          console.log(response);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {

      }
    });
  }

  // Function to check if all values for the selected language are set
  function checkAllValuesSet() {
    // Check if all inputs in optionLanguages for all languages have non-empty values
    let allValuesSet = true;

    Object.keys(optionLanguages).forEach(function (langId) {
      let langValues = optionLanguages[langId];
      if (allValuesSet) {
        Object.keys(langValues).forEach(function (inputName) {
          // Skip checking if inputName contains \"xxx\"
          if (inputName.includes(\"xxx\") || !allValuesSet) {
            return; // Skip to the next iteration
          }

          let inputValue = langValues[inputName];

          if (inputValue === '') {
            // Alert if an empty value is found
            let langName = \$('#input-modal-language option[value=\"' + langId + '\"]').text();
            \$('#input-modal-language').val(langId).trigger('change');
            alert(\"You have not set up all values for \" + langName);

            // Set the flag to false
            allValuesSet = false;
          }

        });
      }
      // Check the flag and exit the outer loop if necessary
      if (!allValuesSet) {
        return false;
      }
    });

    return allValuesSet;
  }

  \$('#quich-opt-add').on('click', function () {
    event.preventDefault();
    \$('#quick-newmodal-option').modal('show');
    \$(\"#opts-container\").html('');
    optionLanguages = {};
    quickoptcounter = 0;
    \$(\"#input-modal-option-group\").val('');
    // Iterate over all options in #input-modal-language select
    initializeOptionLanguages();
    addQuickOption();
  });


  // When the value of input-modal-option-type changes
  var previousType;

  window.addQuickOption = () => addQuickOption();

  function addQuickOption() {

    // Clone the template
    var clonedSetHtml = \$('#variable-option-inputset').html();

    // Replace all occurrences of 'xxx' with the set number
    clonedSetHtml = clonedSetHtml.replace(/xxx/g, quickoptcounter);
    clonedSetHtml = clonedSetHtml.replace(/zzz/g, quickoptcounter + 1);
    // Increment the counter
    quickoptcounter++;

    // Append the cloned set to the container
    \$('#opts-container').append('<div class=\"row mb-6\">' + clonedSetHtml + '</div>');
    initializeOptionLanguages();
  }


});
\$(document).on('click', '.clear-button', function () {

  // Get the data-clear value to identify the option set
  var optionValueRow = \$(this).data('clear');

  // Update the input value and image source for the corresponding option set
  \$('#input-image-' + optionValueRow).val('');
  \$('#thumb-image-' + optionValueRow).attr('src', '').addClass('d-none');
});



function removeOptionValue(id, poptionId) {

  \$(\"#\" + id).html('');
  \$(\"#option\").append('<input type=\"hidden\" name=\"product_option[' + poptionId + '][delete]\" value=\"' + poptionId +
    '\"/>');
}


function removeAllGroup(optionValueRow, poptionId) {

  let newHiddenInput = '';
  \$('#option-row-' + optionValueRow + ' input[type=\"hidden\"][name\$=\"[poption_id]\"]').each(function () {
    var poptionIds = \$(this).val();
    newHiddenInput += '<input type=\"hidden\" name=\"product_option[' + poptionIds + '][delete]\" value=\"' +
      poptionIds + '\"/>';
  });

  \$('#option-row-' + optionValueRow).html('');
  \$('#option').append(newHiddenInput);
  \$('#option').append('<input type=\"hidden\" name=\"product_option[' + poptionId + '][delete]\" value=\"' + poptionId +
    '\"/>');
  \$('#option-row-' + optionValueRow).hide();
}
              </script>

              ";
    }

    public function getTemplateName()
    {
        return "admin/view/template/catalog/product_form_tab_options.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1618 => 983,  1603 => 971,  1336 => 707,  1329 => 703,  1304 => 681,  1253 => 633,  1232 => 615,  1210 => 596,  1197 => 586,  1186 => 578,  1173 => 568,  1165 => 563,  1158 => 559,  1151 => 555,  1142 => 549,  1135 => 545,  1122 => 535,  1079 => 495,  1073 => 492,  1062 => 484,  1055 => 480,  1051 => 479,  1041 => 472,  1026 => 460,  993 => 430,  979 => 419,  975 => 418,  965 => 411,  961 => 410,  943 => 395,  937 => 391,  926 => 389,  922 => 388,  917 => 386,  907 => 379,  892 => 366,  885 => 364,  883 => 363,  878 => 360,  867 => 351,  861 => 350,  859 => 349,  843 => 340,  831 => 331,  825 => 330,  816 => 326,  810 => 325,  804 => 324,  796 => 319,  786 => 312,  780 => 311,  771 => 307,  765 => 306,  759 => 305,  751 => 300,  741 => 293,  735 => 292,  726 => 288,  720 => 287,  714 => 286,  708 => 285,  700 => 280,  687 => 272,  681 => 271,  675 => 270,  669 => 267,  661 => 262,  655 => 261,  649 => 258,  638 => 250,  632 => 249,  627 => 246,  624 => 245,  613 => 243,  608 => 242,  603 => 241,  601 => 240,  593 => 239,  588 => 237,  577 => 229,  571 => 228,  564 => 226,  555 => 224,  549 => 223,  543 => 220,  537 => 219,  531 => 218,  525 => 217,  519 => 214,  511 => 213,  503 => 208,  486 => 204,  478 => 199,  470 => 198,  460 => 195,  454 => 192,  441 => 188,  433 => 185,  429 => 183,  425 => 182,  421 => 181,  415 => 177,  413 => 176,  406 => 174,  399 => 173,  391 => 168,  377 => 167,  368 => 163,  361 => 158,  358 => 157,  355 => 156,  352 => 155,  349 => 154,  346 => 153,  344 => 152,  341 => 151,  339 => 150,  333 => 146,  330 => 145,  319 => 143,  314 => 142,  309 => 141,  307 => 140,  303 => 139,  297 => 138,  291 => 137,  285 => 136,  279 => 135,  262 => 125,  254 => 124,  248 => 123,  236 => 116,  222 => 109,  211 => 103,  202 => 99,  192 => 96,  186 => 93,  177 => 89,  170 => 85,  164 => 82,  160 => 81,  155 => 78,  152 => 77,  149 => 76,  147 => 74,  145 => 73,  142 => 72,  139 => 71,  136 => 70,  133 => 69,  131 => 68,  125 => 64,  121 => 63,  116 => 61,  113 => 60,  110 => 59,  108 => 58,  97 => 50,  92 => 48,  84 => 43,  68 => 30,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<div id=\"option\">
  <style>
    .read-only {
      -webkit-appearance: none;
-moz-appearance: none;
appearance: none;
pointer-events: none;
padding-right: 1.25em; /* Adjust as needed to give space for custom arrow */
background-image: url(''); 
border: 0;
background-color: #ffffff00; /* Optional: Change background color for visual indication */
color: #0d0d0d; /* Optional: Change text color for visual indication */
}
.read-only select::-ms-expand {
display: none;
}
.my-handle {
  cursor: grab;
font-size: 21px;
cursor: -webkit-grabbing;
color: #595959;
}
</style>
<script type=\"text/javascript\" src=\"view/javascript/Sortable.min.js\"></script>


 
<div class=\"row mb-3\">
  <label for=\"input-option\" class=\"col-sm-2 col-form-label\">{{entry_new_option}}</label>
  <div class=\"col-sm-10\">
    <div class=\"row\">
      <!-- New row for both the label and the input/button -->
      <div class=\"col-md-6\">
        <input type=\"button\" id=\"quich-opt-add\" class=\"btn btn-primary\" value=\"New Option\"/>

      </div>
  
    </div>
  </div>
</div>   
  <div class=\"row mb-3\">
    <label for=\"input-option\" class=\"col-sm-2 col-form-label\"> {{ entry_existing_option }}</label>
    <div class=\"col-sm-10\">
      <div class=\"row\">
        <!-- New row for both the label and the input/button -->
        <div class=\"col-md-6\">
          <input type=\"text\" name=\"option\" value=\"\" placeholder=\"{{ entry_option }}\" id=\"input-option\" data-oc-target=\"autocomplete-option\" class=\"form-control\" autocomplete=\"off\"/>
          <ul id=\"autocomplete-option\" class=\"dropdown-menu\"></ul>
          <div class=\"form-text\">{{ help_option }}</div>
        </div>
    
      </div>
    </div>
  </div>


                {% set option_row = 0 %}
                {% set option_value_row = 0 %}

                <ul class=\"listWithHandle\" id=\"option-row-body-b-{{ option_row }}\" style=\"padding: 0; margin: 0\">

                {% for product_option in product_options %}

                <li class=\"list-group-item\">


                {% set showcallendar = '' %}
                {% set showaddbutton = '' %}
                {% if product_option.type != 'date' and product_option.type != 'time' and product_option.type != 'datetime' %}
                {% set showcallendar = 'd-none' %}
                {% endif %}
                {% if product_option.type == 'date' or product_option.type == 'time' or product_option.type == 'datetime' or product_option.type == 'text'
                or product_option.type == 'texarea' 
                %}
                {% set showaddbutton = 'd-none' %}
                {% endif %}
               
                  

                  <fieldset class=\"border rounded\" id=\"option-row-{{ option_row }}\">
                    <div class=\"accordion\" id=\"accordion{{ option_row }}\">
                      <div class=\"accordion-item\">
                        
                          <h2 class=\"accordion-header\" id=\"heading{{ option_row }}\">
                       
                            <div class=\"d-flex align-items-center\">
                            
                              <button class=\"accordion-button collapsed flex-grow-1\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse{{ option_row }}\" aria-expanded=\"true\" aria-controls=\"collapse{{ option_row }}\">
                                <span class=\"my-handle\" aria-hidden=\"true\">
                               
                                    <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                                  </span>  {{ product_option.name }}
                              </button>
                            
                              <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"{{ button_option_value_add }}\" data-option-row=\"{{ option_row }}\" class=\"btn mx-1 btn-primary  add-opt-button {{showaddbutton}}\">
                                <i class=\"fa-solid fa-plus-circle\"></i>
                            </button>
                            <a href=\"index.php?route=catalog/option.form&user_token={{ user_token }}&option_id={{ product_option.option_id }}\" class=\"btn mx-1 btn-primary\">
                                <i class=\"fa-solid fa-pencil\"></i>
                            </a>
                              <!-- Buttons -->
                              <button type=\"button\" class=\"btn btn-danger\" onclick=\"removeAllGroup({{ option_row }}, {{ product_option.poption_id }});\">
                                <i class=\"fa-solid fa-minus-circle\"></i>
                              </button>
                            </div>
                            
                          </h2>
                          <div id=\"collapse{{ option_row }}\" class=\"accordion-collapse collapse\" aria-labelledby=\"heading{{ option_row }}\" data-bs-parent=\"#accordion{{ option_row }}\">
                              <div class=\"accordion-body\"  >
                                  <!-- Content goes here -->
                           
                                  <div class=\"row mb-3\">
                                    <div class=\"col-sm-2\">
                                        <!-- Your label goes here -->
                                        <label for=\"input-required-{{ option_row }}\" class=\"col-form-label\">{{ entry_required }}</label>
                                    </div>
                                    <div class=\"col-sm-10\">
                                        <!-- Input and buttons in the same row -->
                                        <div class=\"input-group\">
                                            <!-- Input -->
                                            <div style=\"width: 100px\"> 
                                            <select name=\"product_option[{{ option_row }}][required]\" id=\"input-required-{{ option_row }}\" class=\"form-select\">
                                                <option value=\"1\"{% if product_option.required %} selected{% endif %}>{{ text_enabled }}</option>
                                                <option value=\"0\"{% if not product_option.required %} selected{% endif %}>{{ text_disabled }}</option>
                                            </select></div>
                                         
                                     
                                        </div>
                                    </div>
                                </div>
                                

            
                    <input type=\"hidden\" name=\"product_option[{{ option_row }}][name]\" value=\"{{ product_option.name }}\"/> 
                    <input type=\"hidden\" name=\"product_option[{{ option_row }}][option_id]\" value=\"{{ product_option.option_id }}\"/> 
                    <input type=\"hidden\" name=\"product_option[{{ option_row }}][type]\" value=\"{{ product_option.type }}\"/>
                    <input type=\"hidden\" name=\"product_option[{{ option_row }}][sort_order]\"  value=\"{{ product_option.sort_order }}\" class=\"sort-value\">
                    <select class=\"d-none\" id=\"select-default-row-{{ option_row }}\">
                      {% if option_values[product_option.option_id] %}
                      {% for option_value in option_values[product_option.option_id] %}
                      <option value=\"{{ option_value.option_value_id }}\" {% if product_option_value.name==option_value.name
                        %}selected{% endif %}>{{ option_value.name }}</option>
                      {% endfor %}
                      {% endif %}

                    </select>


                    {% set inputType = '' %}
         
                    {% if product_option.type in ['text', 'textarea', 'date', 'time', 'datetime'] %}
                        {% if product_option.type == 'textarea' %}
                            {% set inputType = 'textarea' %}
                        {% else %}
                            {% set inputType = 'text' %}
                        {% endif %}
                 


                    
                        <div class=\"row mb-3\">
                            <label for=\"input-option-{{ option_row }}\" class=\"col-sm-2 col-form-label\">{{ entry_option_value }}</label>
                            <div class=\"col-sm-10 col-md-4\">
                                
                                    <div class=\"input-group\">
                                        <input type=\"{{ inputType }}\" name=\"product_option[{{ option_row }}][value]\" value=\"{{ product_option.value }}\" placeholder=\"{{ entry_option_value }}\" id=\"input-option-{{ option_row }}\" class=\"form-control {{ product_option.type }}\"  />
                                        <div  class=\"input-group-text {{showcallendar}}\"><i class=\"fa-regular fa-calendar\"></i></div>
                                    </div>
                            </div>
                        </div>
                    {% endif %}
                    <input type=\"hidden\" name=\"product_option[{{ option_row }}][poption_id]\" value=\"{{ product_option.poption_id }}\"/>
                    <input type=\"hidden\" name=\"product_option[{{ option_row }}][option_id]\" value=\"{{ product_option.option_id  }}\"/>
                    
                    {% if product_option.type == 'select' or product_option.type == 'radio' or product_option.type == 'checkbox' or product_option.type == 'image' %}
      
   

                             <!-- start of shortable accordion table -->
                             <ul class=\"listWithHandle\" id=\"option-row-body-{{ option_row }}\" style=\"padding: 0; margin: 0\">
                            {% for product_option_value in product_option.product_option_value %}
                            <li class=\"list-group-item\">
                               
                            <div class=\"accordion  sortable-accordion\" id=\"accordion{{ option_row }}-{{option_value_row }}\">
                              <div class=\"accordion-item\">
                                <div class=\"d-flex align-items-center\">
                                  <button  class=\"accordion-button  collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse{{ option_row }}-{{option_value_row }}\" aria-expanded=\"true\" aria-controls=\"collapse{{ option_row }}-{{option_value_row }}\">
                                    <span class=\"  my-handle\" aria-hidden=\"true\">

                                      <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                                    </span>      <span class=\"option-title-accordion\">{{ product_option_value.name  }}  </span>  
                                  </button>

                                  <input type=\"hidden\" value=\"{{product_option_value.sort_order }}\" name=\"product_option[{{ option_row }}][product_option_value][{{ option_value_row }}][sort_order]\" class=\"sort-value\">

                                  <button type=\"button\"   
                         onclick=\"removeOptionValue('accordion{{ option_row }}-{{option_value_row }}', {{product_option_value.poption_id }});\"
                      data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn btn-danger\">
                    <i class=\"fa-solid fa-minus-circle\"></i>
                      </button>
                    </div>
                                 
                                <div id=\"collapse{{ option_row }}-{{option_value_row }}\" class=\"accordion-collapse collapse \" aria-labelledby=\"heading{{ option_row }}-{{option_value_row }}\" data-bs-parent=\"#accordion{{ option_row }}-{{option_value_row }}\">
      
<table class=\"table table-bordered  \">
<tr>
  <td class=\"text-start\"><strong>{{ entry_image }}</strong></td>
  <td class=\"text-start\">

    <div style=\"max-width: 60px; display: inline-block\">
     
      <img src=\"{{ product_option_value.image }}\" alt=\"\" title=\"\" id=\"thumb-image-{{ option_row }}-{{ option_value_row }}\"
        data-oc-placeholder=\"{{ placeholder }}\" class=\"  card-img-top \" />
    </div>
    </br>
    <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image-{{ option_row }}-{{ option_value_row }}\"
      data-oc-thumb=\"#thumb-image-{{ option_row }}-{{ option_value_row }}\" class=\"btn btn-info btn-sm btn-block\"
      name=\"product_option_button[{{ option_row }}][{{ option_value_row }}][image]\">
      <i class=\"fa-solid fa-pencil\"></i> {{ entry_image }}
    </button>
    <input type=\"hidden\" class=\"optimage\"
      name=\"product_option[{{ option_row }}][product_option_value][{{ option_value_row }}][image]\"
      id=\"input-image-{{ option_row }}-{{ option_value_row }}\" value=\"{{ product_option_value.value }}\" />

    <button type=\"button\" data-clear=\"{{ option_row }}-{{ option_value_row }}\"
      class=\"btn clear-button  btn-warning btn-sm btn-block\"
      name=\"product_option_button[{{ option_row }}][{{ option_value_row }}][clear]\">
      <i class=\"fa-regular fa-trash-can\"></i> {{ button_clear }}
    </button>

  </td>
</tr>

<tr>

  <td class=\"text-start\"><strong>{{ entry_option_value }}</strong></td>
  <td class=\"text-start\">
    <select  name=\"product_option[{{ option_row }}][product_option_value][{{ option_value_row }}][option_value_id]\" class=\"read-only option-select form-select\" id=\"product-option-values-{{ option_row }}\">
      {% if option_values[product_option.option_id] %}
      {% for option_value in option_values[product_option.option_id] %}
      <option value=\"{{ option_value.option_value_id }}\" {% if product_option_value.name==option_value.name
        %}selected{% endif %}>{{ option_value.name }}</option>
      {% endfor %}
      {% endif %}
    </select>

    <input type=\"hidden\"
      name=\"product_option[{{ option_row }}][product_option_value][{{ option_value_row }}][poption_id]\"
      value=\"{{ product_option_value.poption_id }}\" />
    
      
 
  </td>
</tr>

<tr>
  <td class=\"text-start\"><strong>{{ entry_quantity }}</strong></td>
  <td class=\"text-start\">
    <input class=\"read-only form-control\" pattern=\"[0-9]+([\\.,][0-9]+)?\" style=\"min-width: 80px;\" type=\"text\"
      name=\"product_option[{{ option_row }}][product_option_value][{{ option_value_row }}][quantity]\"
      value=\"{{ product_option_value.quantity }}\" />
  </td>
</tr>

<tr>
  <td class=\"text-start\"><strong>{{ entry_subtract }}</strong></td>
  <td class=\"text-start\">
    <select class=\"read-only form-select\"
      name=\"product_option[{{ option_row }}][product_option_value][{{ option_value_row }}][subtract]\">
      <option value=\"0\" {% if product_option_value.subtract=='0' %}selected{% endif %}>No</option>
      <option value=\"1\" {% if product_option_value.subtract=='1' %}selected{% endif %}>Yes</option>
    </select>
  </td>
</tr>



<tr>
  <td    class=\"text-start\"><strong>{{ entry_price }}</strong></td>
  <td class=\"text-start\">
    <div class=\"input-group\">
      <div style=\"width: 70px;\">
        <select class=\"read-only form-select \"
          name=\"product_option[{{ option_row }}][product_option_value][{{ option_value_row }}][price_prefix]\">
          <option value=\"+\" {% if product_option_value.price_prefix=='+' %}selected{% endif %}>+</option>
          <option value=\"-\" {% if product_option_value.price_prefix=='-' %}selected{% endif %}>-</option>
          <option value=\"-\" {% if product_option_value.price_prefix=='=' %}selected{% endif %}>=</option>
        </select>
      </div>
      <input class=\"read-only form-control\" pattern=\"[0-9]+([\\.,][0-9]+)?\" style=\"min-width: 80px;\" type=\"text\"
        name=\"product_option[{{ option_row }}][product_option_value][{{ option_value_row }}][price]\"
        value=\"{{ product_option_value.price }}\" />
    </div>
  </td>
</tr>

<tr>

  <td class=\"text-start\"><strong>{{ entry_points }}</strong></td>
  <td class=\"text-start\">
    <div class=\"input-group\">
      <div style=\"width: 70px;\">
        <select class=\"read-only form-select\"
          name=\"product_option[{{ option_row }}][product_option_value][{{ option_value_row }}][points_prefix]\">
          <option value=\"+\" {% if product_option_value.points_prefix=='+' %}selected{% endif %}>+</option>
          <option value=\"-\" {% if product_option_value.points_prefix=='-' %}selected{% endif %}>-</option>
        </select>
      </div>
      <input class=\"read-only form-control\" style=\"min-width: 80px;\" pattern=\"[0-9]+([\\.,][0-9]+)?\" type=\"text\"
        name=\"product_option[{{ option_row }}][product_option_value][{{ option_value_row }}][points]\"
        value=\"{{ product_option_value.points }}\" />
    </div>
  </td>
</tr>

<tr>

  <td class=\"text-start\" ><strong>{{ entry_weight }}</strong></td>
  <td class=\"text-start\">
    <div class=\"input-group\">
      <div style=\"width: 70px;\">
        <select class=\"read-only form-select\"
          name=\"product_option[{{ option_row }}][product_option_value][{{ option_value_row }}][weight_prefix]\">
          <option value=\"+\" {% if product_option_value.weight_prefix=='+' %}selected{% endif %}>+</option>
          <option value=\"-\" {% if product_option_value.weight_prefix=='-' %}selected{% endif %}>-</option>
        </select>
      </div>
      <input class=\"read-only form-control\" style=\"min-width: 80px;\" pattern=\"[0-9]+([\\.,][0-9]+)?\" type=\"text\"
        name=\"product_option[{{ option_row }}][product_option_value][{{ option_value_row }}][weight]\"
        value=\"{{ product_option_value.weight }}\" />
    </div>
  </td>
<tr>
<td>
</td>
<td>

<button type=\"button\" data-bs-toggle=\"tooltip\" title=\"Lock/Unlock\"  
data-option-value-row=\"accordion{{ option_row }}-{{option_value_row }}\" data-poption-id=\"{{product_option_value.poption_id }}\"
class=\"btn btn-primary add-or-edit-btn\"> <i class=\"fa-solid fa-unlock\"></i></button>

</td>
</tr>
</tr>
</table>
                             
                         </li>
                              {% set option_value_row = option_value_row + 1 %}
                            {% endfor %}
                          </ul>
                          <!-- end of shortable accordion table -->
                          </tbody>
                          <tfoot>
                          </tfoot>
                        </table>
                   
                      </div>
                    {% endif %}
                  </fieldset>
     
    </li>
                  {% set option_row = option_row + 1 %}
    
                {% endfor %}
   
            </div>
          </ul>





<!--  hidden modal quick add new option -->
<div id=\"quick-newmodal-option\" class=\"modal fade\" style=\"display: none;\">
  <div class=\"modal-dialog\">
      <div class=\"modal-content\">
          <div class=\"modal-header\">
              <h5 class=\"modal-title\"><i class=\"fa-solid fa-pencil\"></i> {{text_add_new_option}}</h5>
              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
          </div>
          <div class=\"modal-body\">
            <form id=\"quick-add-form\"> 
   
            <div class=\"mb-3\">
                <label for=\"input-modal-language\" class=\"form-label\">{{entry_select_language}}</label>
                <select name=\"option_language\" id=\"input-modal-language\" class=\"form-select\">
                    {% for code, language in languages %}
                        <option value=\"{{ language.language_id }}\">{{ language.name }}</option>
                    {% endfor %}
                </select>
            </div>
 
            <div class=\"mb-3\">
                <label for=\"input-modal-option-type\" class=\"form-label\">{{option_type}}</label>
                <select name=\"option_type\" id=\"input-modal-option-type\" class=\"form-select\">
                    <option value=\"radio\">Radio</option>
                    <option value=\"checkbox\">Checkbox</option>
                    <option value=\"select\">Select</option>
                    <option value=\"file\">File</option>
                    <option value=\"text\">Text</option>
                    <option value=\"textarea\">TextArea</option>
                    <option value=\"date\">Date</option>
                    <option value=\"time\">Time</option>
                    <option value=\"datetime\">DateTime</option>
                </select>
            </div>

            <div class=\"mb-3\">
              <label for=\"input-modal-option-group\" class=\"form-label\">{{entry_group_option_name}}</label>
              <input type=\"text\" name=\"option_group_name\" value=\"\" placeholder=\"{{entry_group_option_name}}\" id=\"input-modal-option-group\" class=\"form-control option-languaged\" />
          </div>
        
          <div id=\"opts-container\">
  
          </div>
          <div class=\"modal-footer\">
              <button type=\"button\" id=\"button-quick-option-save\" class=\"btn btn-primary \">{{ button_save }}</button>
              <button type=\"button\" class=\"btn btn-light\" data-bs-dismiss=\"modal\">{{ button_cancel  }}</button>
          </div>
        </form>
      </div>
   
  </div>
<!--  End /hidden modal quick add new option -->

<!-- Template, to generate opt, in new option modal -->
  <div id=\"variable-option-inputset\" class=\"row mb-6 d-none\">
    <div class=\"btn-group\">
    <input type=\"text\" name=\"option_q_name[xxx]\" value=\"\" placeholder=\"{{entry_option_name}}\" id=\"input-modal-option-name-xxx\" class=\"form-control option-languaged\" />
    <button type=\"button\" data-bs-toggle=\"tooltip\"  class=\"btn btn-primary add-q-option\" aria-label=\"Add Option Value\" data-bs-original-title=\"Add Option Value\">
      <i class=\"fa-solid fa-plus-circle\"></i></button>
  </div>
</div>
<!-- End /Template, to generate opt, in new option modal -->


</div>


<!-- Template, to generate base opt -->

<li  id=\"option-row-option_row_placeholder\"    class=\"list-group-item  d-none \">
<fieldset     class=\"border rounded\" >
  <div class=\"accordion\" id=\"accordionoption_row_placeholder\">
    <div class=\"accordion-item\">
        <h2 class=\"accordion-header\" id=\"headingoption_row_placeholder\">
          <div class=\"d-flex align-items-center\"> 
            <button  class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseoption_row_placeholder\" aria-expanded=\"true\" aria-controls=\"collapseoption_row_placeholder\">
              <span class=\"  my-handle\" aria-hidden=\"true\">
                <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
              </span>     option_name_placeholder
           
            </button>

                   <!-- Buttons -->
                   <button type=\"button\" class=\"btn mx-1 btn-danger\" onclick=\"javascript:\$('#option-row-option_row_placeholder').remove();\">
                    <i class=\"fa-solid fa-minus-circle\"></i>
                </button>
                <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"{{ button_option_value_add }}\"   data-option-row=\"option_row_placeholder\" class=\"btn mx-1 btn-primary showaddoption add-opt-button\">
                    <i class=\"fa-solid fa-plus-circle\"></i>
                </button>
              </div>
            
        </h2>
        <div id=\"collapseoption_row_placeholder\" class=\"accordion-collapse collapse\" aria-labelledby=\"headingoption_row_placeholder\" data-bs-parent=\"#accordionoption_row_placeholder\">
            <div class=\"accordion-body\">
         
                <div class=\"row mb-3\">
                  <div class=\"col-sm-2\">
 
                      <label for=\"input-required-option_row_placeholder\" class=\"col-form-label\">{{ entry_required }}</label>
                  </div>
                  <div class=\"col-sm-10\">
                      <div class=\"input-group\">
                          <!-- Input -->
                          <div style=\"width: 100px\"> 
                          <select name=\"xxxproduct_option[option_row_placeholder][required]\" id=\"input-required-option_row_placeholder\" class=\"form-select\">
                              <option value=\"1\" >{{ text_enabled }}</option>
                              <option value=\"0\" >{{ text_disabled }}</option>
                          </select></div>
                          
                    
                          <a href=\"index.php?route=catalog/option.form&user_token={{ user_token }}&option_id=option_id_placeholder\" class=\"btn mx-1 btn-primary\">
                              <i class=\"fa-solid fa-pencil\"></i>
                          </a>
                      </div>
                  </div>
              </div>

<div  class=\"row mb-3 showvalueinput\">
  <label for=\"input-option-option_row_placeholder\" class=\"col-sm-2 col-form-label\">{{ entry_option_value }}</label>
  <div class=\"col-sm-10 col-md-4\">
          <div class=\"input-group\">
              <input type=\"option_type_placeholder\" name=\"xxxproduct_option[option_row_placeholder][value]\" value=\"\" placeholder=\"{{ entry_option_value }}\" id=\"input-option-option_row_placeholder\" class=\"form-control   option_type_placeholder\"  />
              <div class=\"input-group-text showcallendar\"><i class=\"fa-regular fa-calendar\"></i></div>
          </div>
  </div>
 
</div>
<ul class=\"listWithHandle\" id=\"option-row-body-option_row_placeholder\" style=\"padding: 0; margin: 0\">

</ul>
</div>
</div>
<select class=\"d-none\" id=\"select-default-row-option_row_placeholder\"></select>
<input type=\"hidden\" name=\"xxxproduct_option[option_row_placeholder][name]\" value=\"option_name_placeholder\"/> 
<input type=\"hidden\" name=\"xxxproduct_option[option_row_placeholder][option_id]\" value=\"option_id_placeholder\"/> 
<input type=\"hidden\" name=\"xxxproduct_option[option_row_placeholder][type]\" value=\"option_type_placeholder\"/>
<input type=\"hidden\" name=\"xxxproduct_option[option_row_placeholder][sort_order]\"  value=\"100\" class=\"sort-value\">
</div>
</div>
</fieldset>
</li>
 
<!-- End /Template, to generate base opt -->



<!-- Template, to generate sub options to options -->
<div id=\"option-template-div\" class=\" d-none\">   
<li class=\"list-group-item\" >                        
  <div class=\"accordion  sortable-accordion\" id=\"accordionoption-row-placeholder-option-valuerow-placeholder\">
    <div class=\"accordion-item\">

      <div class=\"d-flex align-items-center\"> 
        <button  class=\"accordion-button  collapsed\" style=\"border: 1px solid #14d946;\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseoption-row-placeholder-option-valuerow-placeholder\" aria-expanded=\"true\" aria-controls=\"collapseoption-row-placeholder-option-valuerow-placeholder\">
          <span class=\"  my-handle\" aria-hidden=\"true\">
            <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
          </span>    <span class=\"option-title-accordion\">option-name-placeholder</span>
        </button>

        <button type=\"button\"   
onclick=\"javascript:\$(this).closest('li').remove();\"
data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn btn-danger\">
<i class=\"fa-solid fa-minus-circle\"></i>
</button>

<input type=\"hidden\" name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][sort_order]\" value=\"100\"  class=\"sort-value\">
</div>

      <div id=\"collapseoption-row-placeholder-option-valuerow-placeholder\" class=\"accordion-collapse collapse \" aria-labelledby=\"headingoption-row-placeholder-option-valuerow-placeholder\" data-bs-parent=\"#accordionoption-row-placeholder-option-valuerow-placeholder\">
<table class=\"table table-bordered \">
<tr>
<td class=\"text-start\"><strong>{{ entry_image }}</strong></td>
<td class=\"text-start\">
<div style=\"max-width: 60px; display: inline-block\">
<img src=\"\" alt=\"\" title=\"\" id=\"thumb-image-option-row-placeholder-option-valuerow-placeholder\"
data-oc-placeholder=\"{{ placeholder }}\" class=\"  card-img-top d-none\" />
</div>
</br>
<button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image-option-row-placeholder-option-valuerow-placeholder\"
data-oc-thumb=\"#thumb-image-option-row-placeholder-option-valuerow-placeholder\" class=\"btn btn-info btn-sm btn-block\"
name=\"xxxproduct_option_button[option-row-placeholder][option-valuerow-placeholder][image]\">
<i class=\"fa-solid fa-pencil\"></i> {{ entry_image }}
</button>
<input type=\"hidden\" class=\"optimage\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][image]\"
id=\"input-image-option-row-placeholder-option-valuerow-placeholder\" value=\"{{ option.image }}\" />
<button type=\"button\" data-clear=\"option-row-placeholder-option-valuerow-placeholder\"
class=\"btn clear-button  btn-warning btn-sm btn-block\"
name=\"xxxproduct_option_button[option-row-placeholder][option-valuerow-placeholder][clear]\">
<i class=\"fa-regular fa-trash-can\"></i> {{ button_clear }}
</button>
</td>
</tr>
<tr>
<td class=\"text-start\"><strong>{{ entry_option_value }}</strong></td>
<td class=\"text-start insertselect\">
 
<input type=\"hidden\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][poption_id]\"
value=\"undefined\" />
 
</td>
</tr>
<tr>
<td class=\"text-start\"><strong>{{ entry_quantity }}</strong></td>
<td class=\"text-start\">
<input class=\"read-only form-control\" pattern=\"[0-9]+([\\.,][0-9]+)?\" style=\"min-width: 80px;\" type=\"text\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][quantity]\"
value=\"0\" />
</td>
</tr>
<tr>
<td class=\"text-start\"><strong>{{ entry_subtract }}</strong></td>
<td class=\"text-start\">
<select class=\"read-only form-select\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][subtract]\">
<option value=\"0\"  selected >No</option>
<option value=\"1\" >Yes</option>
</select>
</td>
</tr>
<tr>
<td class=\"text-start\"><strong>{{ entry_price }}</strong></td>
<td class=\"text-start\">
<div class=\"input-group\">
<div style=\"width: 70px;\">
<select class=\"read-only form-select \"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][price_prefix]\">
<option value=\"+\" selected >+</option>
<option value=\"-\" >-</option>
<option value=\"=\" >=</option>
</select>
</div>
<input class=\"read-only form-control\" pattern=\"[0-9]+([\\.,][0-9]+)?\" style=\"min-width: 80px;\" type=\"text\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][price]\"
value=\"0\" />
</div>
</td>
</tr>

<tr>
<td class=\"text-start\"><strong>{{ entry_points }}</strong></td>
<td class=\"text-start\">
<div class=\"input-group\">
<div style=\"width: 70px;\">
<select class=\"read-only form-select\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][points_prefix]\">
<option value=\"+\" selected >+</option>
<option value=\"-\" >-</option>
</select>
</div>
<input class=\"read-only form-control\" style=\"min-width: 80px;\" pattern=\"[0-9]+([\\.,][0-9]+)?\" type=\"text\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][points]\"
value=\"0\" />
</div>
</td>
</tr>

<tr>
<td class=\"text-start\" ><strong>{{ entry_weight }}</strong></td>
<td class=\"text-start\">
<div class=\"input-group\">
<div style=\"width: 70px;\">
<select class=\"read-only form-select\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][weight_prefix]\">
<option value=\"+\" selected >+</option>
<option value=\"-\" >-</option>
</select>
</div>
<input class=\"read-only form-control\" style=\"min-width: 80px;\" pattern=\"[0-9]+([\\.,][0-9]+)?\" type=\"text\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][weight]\"
value=\"0\" />
</div>
</td>
</tr>
<tr>
<td>
</td>
<td>
<button type=\"button\" data-bs-toggle=\"tooltip\" title=\"Lock/Unlock\" data-option-row=\"option-row-placeholder\"
data-option-value-row=\"accordionoption-row-placeholder-option-valuerow-placeholder\" 
class=\"btn btn-primary add-or-edit-btn\"> <i class=\"fa-solid fa-unlock\"></i></button>
 
</td>
</tr>
</tr>
</table>
      </div>
    </div>
  </div>

</li>
</div>
<!-- End /Template, to generate sub options to options -->






 

            <script>

              \$('#input-option').autocomplete({
  'source': function (request, response) {
      \$.ajax({
          url: 'index.php?route=catalog/option.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
          dataType: 'json',
          success: function (json) {
              response(\$.map(json, function (item) {
                  return {
                      category: item['category'],
                      label: item['name'],
                      value: item['option_id'],
                      type: item['type'],
                      option_value: item['option_value']
                  }
              }));
          }
      });
  },
  'select': function (item) {  
    addOption(item);
  }
});

var optionLanguages = {};
 
var option_row = {{ option_row }};

var quickoptcounter = 0;

var option_value_row = {{ option_value_row }};

var selectElement = document.getElementById('input-modal-language');

var selectedOption = selectElement.options[selectElement.selectedIndex];

var preSelectedLanguageId = selectedOption.value;

 
function addOption(option) {
  // Get the hidden template and clone it
  let template = \$('#option-row-option_row_placeholder').clone();
  // Remove the 'd-none' class
  template.removeClass('d-none');
  template.attr('id', 'option-row-' + option_row);

  // Replace placeholders with actual values, Remove submission protection tag 'xxx'
  template.html(template.html().replace(/xxx/g, ''));
  template.html(template.html().replace(/option_row_placeholder/g, option_row));
  template.html(template.html().replace(/option_type_placeholder/g, option.type));
  template.html(template.html().replace(/option_name_placeholder/g, option.label));
  template.html(template.html().replace(/option_id_placeholder/g, option.value));

  //hide callendar
  if (option.type != 'date' && option.type != 'time' && option.type != 'datetime') {
    template.find('.showcallendar').remove();
  }
  //hide add option
  if (option.type == 'date' || option.type == 'time' ||
    option.type == 'datetime' || option.type == 'text' || option.type == 'textarea') {

    template.find('.showaddoption').remove();
  }
  if (option.type == 'select' || option.type == 'checkbox' ||
    option.type == 'radio') {
    template.find('.showvalueinput').remove();
  }
  // Append the modified template to the #option element
  \$('#option-row-body-b-0').append(template);

  const selectElement = \$(\"#select-default-row-\" + option_row);

  // Loop through the option_value array and generate <option> elements
  option.option_value.forEach((optionValue) => {
    const optionElement = \$('<option>', {
      value: optionValue.option_value_id,
      text: optionValue.name
    });

    // Append the <option> element to the <select> element
    selectElement.append(optionElement);
  });

  option_row++;
  initializeSortables();
}

function initializeSortables() {
  \$('.listWithHandle').each(function () {
    // Check if Sortable instance already exists
    if (!\$(this).data('sortable')) {
      // Create Sortable instance
      Sortable.create(this, {
        handle: '.my-handle',
        animation: 150,
        onEnd: function (event) {
          // Update the values after sorting is complete
          updateSortValues(event.from);
        }
      });
    }
  });
}

function updateSortValues(sortableContainer) {
  \$(\"#option\").find('li').each(function (index) {
    // Update the value of the input with the position
    \$(this).find('.sort-value').val(index + 1);
  });
}
// Call the function to initialize Sortables
initializeSortables();

\$(document).on('change', \"#input-modal-option-type\", function () {

  optionLanguages = {};

  // Get the current value and store it as the previous value
  var currentType = \$(this).val();

  // Show or hide opts-container accordingly
  if (currentType === \"radio\" || currentType === \"checkbox\" || currentType === \"select\") {
    \$(\"#opts-container\").show();

    // Check if the previous type was not checkbox, radio, or select, then call addQuickOption
    if (previousType !== \"checkbox\" && previousType !== \"radio\" && previousType !== \"select\") {
      addQuickOption();
    }
  } else {
    quickoptcounter = 0;
    \$(\"#opts-container\").html('');
    \$(\"#opts-container\").hide();
  }

  // Update the previousType variable for the next change event
  previousType = currentType;
});

\$(document).ready(function () {

  \$('#quick-newmodal-option').on('keypress', 'input', function (event) {
    if (event.which === 13) { // Check if the pressed key is Enter
      event.preventDefault(); // Prevent the default form submission behavior
      \$('#button-quick-option-save').trigger('click'); // Trigger click event on the save button
    }
  });

  var languageInputs = {};

  // Iterate over all options in #input-modal-language select
  initializeOptionLanguages();

  function initializeOptionLanguages() {
    // Get the currently selected language
    var selectedLanguageId = \$('#input-modal-language').val();

    // Iterate over all options in #input-modal-language select
    \$('#input-modal-language option').each(function () {
      var langId = \$(this).val();

      // Create an entry for the language in the optionLanguages object
      if (typeof optionLanguages[langId] === 'undefined') optionLanguages[langId] = {};

      // Iterate over all inputs with class \"option-languaged\"
      \$('.option-languaged').each(function () {
        // Get the name attribute of the input
        var inputName = \$(this).attr('name');

        // Get the value of the input for the currently selected language
        var inputValue = \$(this).val();

        // Save the input value in the optionLanguages object
        if (selectedLanguageId === langId) {
          optionLanguages[langId][inputName] = inputValue;
        } else {
          if (typeof optionLanguages[langId][inputName] === 'undefined') optionLanguages[langId][
            inputName] = '';

        }
      });
    });

  }

  // Event listener for changes in the language select
  \$('#input-modal-language').change(function () {
    // Get the selected option's text
    var language = \$(this).find(':selected').text();

    // Loop through all text inputs in #opts-container
    \$('#quick-add-form input[type=\"text\"]').each(function () {
      // Update the placeholder
      var currentPlaceholder = \$(this).attr('placeholder');
      var currentPlaceholder = currentPlaceholder.replace(/\\s*\\([^)]*\\)\\s*/, '');
      \$(this).attr('placeholder', currentPlaceholder + '  (' + language + ')');
    });


    updateLanguageInputs(preSelectedLanguageId, \$(this).val());
    preSelectedLanguageId = \$(this).val();
  });
  var formDataOpt;
  // Function to update languageInputs object
  function updateLanguageInputs(oldlangid, newlangid) {

    // Create an entry for the new language if it doesn't exist
    // Check if optionLanguages[oldlangid] is defined
    if (!optionLanguages[oldlangid]) {
      optionLanguages[oldlangid] = {};
    }

    // Check if optionLanguages[newlangid] is defined
    if (!optionLanguages[newlangid]) {
      optionLanguages[newlangid] = {};
    }

    // Iterate over all inputs with class \"option-languaged\"
    \$('.option-languaged').each(function () {
      // Get the name attribute of the input
      let inputName = \$(this).attr('name');
      let inputValue = \$(this).val();


      if (!optionLanguages[newlangid][inputName]) {
        optionLanguages[newlangid][inputName] = \"\";
      }
      // Get the language-specific value based on newlangid
      let languageValue = optionLanguages[newlangid][inputName];

      // Save the current input value in the optionLanguages object for the old language
      optionLanguages[oldlangid][inputName] = inputValue;


      // Set the value of the input to the language-specific value
      \$(this).val(languageValue);
    });
  }

  \$('#button-quick-option-save').click(function () {
    initializeOptionLanguages();
    // Check if all available inputs in .option-languaged have non-empty values
    var isValuesSet = checkAllValuesSet();

    if (isValuesSet) {

      postOption({
        options: processSquareBrackets(optionLanguages),
        type: \$(\"#input-modal-option-type\").val()
      });

    }

  });

  function processSquareBrackets(obj) {
    let newObj = {};

    for (let key in obj) {
      if (obj.hasOwnProperty(key)) {
        // Check if the key contains square brackets
        if (key.includes('[') && key.includes(']')) {
          let [propertyName, index] = key.split(']')[0].split('[');

          // Create nested structures if needed
          newObj[propertyName] = newObj[propertyName] || {};

          // Assign the value to the nested structure
          newObj[propertyName][index] = obj[key];
        } else {
          // Copy non-matching keys as is
          newObj[key] = obj[key];
        }

        // Recursively process nested objects
        if (typeof obj[key] === 'object' && !Array.isArray(obj[key])) {
          newObj[key] = processSquareBrackets(obj[key]);
        } else if (Array.isArray(obj[key])) {
          // Process each element in the array
          newObj[key] = obj[key].map(element => processSquareBrackets(element));
        }
      }
    }

    return newObj;
  }

  function postOption(options) {
    let product_id =  \$(\"#input-product-id\").val();
    if (product_id == 0) {
      alert('Failed, please save that product first');
      return;
    }
    \$.ajax({
      type: 'POST',
      url: 'index.php?route=catalog/product.addOption&user_token={{user_token}}&product_id='+  product_id,
      dataType: 'json',
      data: options,
      success: function (response) {
        if (response.status == \"ok\") {

          //submit occurred reload option tab content
          \$(\"#quick-newmodal-option\").modal('hide');
          \$(\"#option\").html(
            '<i class=\"fas fa-spinner fa-spin fa-3x y d-flex align-items-center justify-content-center\"></i>  '
            );
          \$(\"#option\").load(
            'index.php?route=catalog/product.reloadOptions&user_token={{user_token}}&product_id=' +  product_id
            );
        } else {
          console.log(response);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {

      }
    });
  }

  // Function to check if all values for the selected language are set
  function checkAllValuesSet() {
    // Check if all inputs in optionLanguages for all languages have non-empty values
    let allValuesSet = true;

    Object.keys(optionLanguages).forEach(function (langId) {
      let langValues = optionLanguages[langId];
      if (allValuesSet) {
        Object.keys(langValues).forEach(function (inputName) {
          // Skip checking if inputName contains \"xxx\"
          if (inputName.includes(\"xxx\") || !allValuesSet) {
            return; // Skip to the next iteration
          }

          let inputValue = langValues[inputName];

          if (inputValue === '') {
            // Alert if an empty value is found
            let langName = \$('#input-modal-language option[value=\"' + langId + '\"]').text();
            \$('#input-modal-language').val(langId).trigger('change');
            alert(\"You have not set up all values for \" + langName);

            // Set the flag to false
            allValuesSet = false;
          }

        });
      }
      // Check the flag and exit the outer loop if necessary
      if (!allValuesSet) {
        return false;
      }
    });

    return allValuesSet;
  }

  \$('#quich-opt-add').on('click', function () {
    event.preventDefault();
    \$('#quick-newmodal-option').modal('show');
    \$(\"#opts-container\").html('');
    optionLanguages = {};
    quickoptcounter = 0;
    \$(\"#input-modal-option-group\").val('');
    // Iterate over all options in #input-modal-language select
    initializeOptionLanguages();
    addQuickOption();
  });


  // When the value of input-modal-option-type changes
  var previousType;

  window.addQuickOption = () => addQuickOption();

  function addQuickOption() {

    // Clone the template
    var clonedSetHtml = \$('#variable-option-inputset').html();

    // Replace all occurrences of 'xxx' with the set number
    clonedSetHtml = clonedSetHtml.replace(/xxx/g, quickoptcounter);
    clonedSetHtml = clonedSetHtml.replace(/zzz/g, quickoptcounter + 1);
    // Increment the counter
    quickoptcounter++;

    // Append the cloned set to the container
    \$('#opts-container').append('<div class=\"row mb-6\">' + clonedSetHtml + '</div>');
    initializeOptionLanguages();
  }


});
\$(document).on('click', '.clear-button', function () {

  // Get the data-clear value to identify the option set
  var optionValueRow = \$(this).data('clear');

  // Update the input value and image source for the corresponding option set
  \$('#input-image-' + optionValueRow).val('');
  \$('#thumb-image-' + optionValueRow).attr('src', '').addClass('d-none');
});



function removeOptionValue(id, poptionId) {

  \$(\"#\" + id).html('');
  \$(\"#option\").append('<input type=\"hidden\" name=\"product_option[' + poptionId + '][delete]\" value=\"' + poptionId +
    '\"/>');
}


function removeAllGroup(optionValueRow, poptionId) {

  let newHiddenInput = '';
  \$('#option-row-' + optionValueRow + ' input[type=\"hidden\"][name\$=\"[poption_id]\"]').each(function () {
    var poptionIds = \$(this).val();
    newHiddenInput += '<input type=\"hidden\" name=\"product_option[' + poptionIds + '][delete]\" value=\"' +
      poptionIds + '\"/>';
  });

  \$('#option-row-' + optionValueRow).html('');
  \$('#option').append(newHiddenInput);
  \$('#option').append('<input type=\"hidden\" name=\"product_option[' + poptionId + '][delete]\" value=\"' + poptionId +
    '\"/>');
  \$('#option-row-' + optionValueRow).hide();
}
              </script>

              ", "admin/view/template/catalog/product_form_tab_options.twig", "/var/www/html/admin/view/template/catalog/product_form_tab_options.twig");
    }
}
