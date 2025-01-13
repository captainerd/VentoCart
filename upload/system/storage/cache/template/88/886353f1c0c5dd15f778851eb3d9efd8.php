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

/* cp-akis/view//plates/catalog/product_tabs/options_tab.twig */
class __TwigTemplate_1f60445a33d3d692fd2099c56faa3d02 extends Template
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
 
<script  src=\"view/javascript/Sortable.min.js\"></script>


 
<div class=\"row mb-3\">
  <label for=\"input-option\" class=\"col-sm-2 col-form-label\">";
        // line 9
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
        // line 22
        echo ($context["entry_existing_option"] ?? null);
        echo "</label>
    <div class=\"col-sm-10\">
      <div class=\"row\">
        <!-- New row for both the label and the input/button -->
        <div class=\"col-md-6\">
          <input type=\"text\" name=\"option\" value=\"\" placeholder=\"";
        // line 27
        echo ($context["entry_option"] ?? null);
        echo "\" id=\"input-option\" data-oc-target=\"autocomplete-option\" class=\"form-control\" autocomplete=\"off\"/>
          <ul id=\"autocomplete-option\" class=\"dropdown-menu\"></ul>
          <div class=\"form-text\">";
        // line 29
        echo ($context["help_option"] ?? null);
        echo "</div>
        </div>
    
      </div>
    </div>
  </div>


                ";
        // line 37
        $context["option_row"] = 0;
        // line 38
        echo "                ";
        $context["option_value_row"] = 0;
        // line 39
        echo "
                <ul class=\"listWithHandle\" id=\"option-row-body-b-";
        // line 40
        echo ($context["option_row"] ?? null);
        echo "\" style=\"padding: 0; margin: 0\">

                ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_options"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_option"]) {
            // line 43
            echo "
                <li class=\"list-group-item\">


                ";
            // line 47
            $context["showcallendar"] = "";
            // line 48
            echo "                ";
            $context["showaddbutton"] = "";
            // line 49
            echo "                ";
            if ((((twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 49) != "date") && (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 49) != "time")) && (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 49) != "datetime"))) {
                // line 50
                echo "                ";
                $context["showcallendar"] = "d-none";
                // line 51
                echo "                ";
            }
            // line 52
            echo "                ";
            if ((((((twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 52) == "date") || (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 52) == "time")) || (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 52) == "datetime")) || (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 52) == "text")) || (twig_get_attribute($this->env, $this->source,             // line 53
$context["product_option"], "type", [], "any", false, false, false, 53) == "texarea"))) {
                // line 55
                echo "                ";
                $context["showaddbutton"] = "d-none";
                // line 56
                echo "                ";
            }
            // line 57
            echo "               
                  

                  <fieldset class=\"border rounded\" id=\"option-row-";
            // line 60
            echo ($context["option_row"] ?? null);
            echo "\">
                    <div class=\"accordion\" id=\"accordion";
            // line 61
            echo ($context["option_row"] ?? null);
            echo "\">
                      <div class=\"accordion-item\">
                        
                          <h2 class=\"accordion-header\" id=\"heading";
            // line 64
            echo ($context["option_row"] ?? null);
            echo "\">
                       
                            <div class=\"d-flex align-items-center\">
                            
                              <button class=\"accordion-button collapsed flex-grow-1\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse";
            // line 68
            echo ($context["option_row"] ?? null);
            echo "\" aria-expanded=\"true\" aria-controls=\"collapse";
            echo ($context["option_row"] ?? null);
            echo "\">
                                <span class=\"my-handle\" aria-hidden=\"true\">
                               
                                    <i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
                                  </span>  ";
            // line 72
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "name", [], "any", false, false, false, 72);
            echo "
                              </button>
                            
                              <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"";
            // line 75
            echo ($context["button_option_value_add"] ?? null);
            echo "\" data-option-row=\"";
            echo ($context["option_row"] ?? null);
            echo "\" class=\"btn mx-1 btn-primary  add-opt-button ";
            echo ($context["showaddbutton"] ?? null);
            echo "\">
                                <i class=\"fa-solid fa-plus-circle\"></i>
                            </button>
                            <a href=\"index.php?route=catalog/option.form&user_token=";
            // line 78
            echo ($context["user_token"] ?? null);
            echo "&option_id=";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 78);
            echo "\" class=\"btn mx-1 btn-primary\">
                                <i class=\"fa-solid fa-pencil\"></i>
                            </a>
                              <!-- Buttons -->
                              <button type=\"button\" class=\"btn btn-danger\" onclick=\"removeAllGroup(";
            // line 82
            echo ($context["option_row"] ?? null);
            echo ", ";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "product_option_id", [], "any", false, false, false, 82);
            echo ");\">
                                <i class=\"fa-solid fa-minus-circle\"></i>
                              </button>
                            </div>
                            
                          </h2>
                          <div id=\"collapse";
            // line 88
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
            // line 95
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
            // line 102
            echo ($context["option_row"] ?? null);
            echo "][required]\" id=\"input-required-";
            echo ($context["option_row"] ?? null);
            echo "\" class=\"form-select\">
                                                <option value=\"1\"";
            // line 103
            if (twig_get_attribute($this->env, $this->source, $context["product_option"], "required", [], "any", false, false, false, 103)) {
                echo " selected";
            }
            echo ">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                                                <option value=\"0\"";
            // line 104
            if ( !twig_get_attribute($this->env, $this->source, $context["product_option"], "required", [], "any", false, false, false, 104)) {
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
            // line 114
            echo ($context["option_row"] ?? null);
            echo "][name]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "name", [], "any", false, false, false, 114);
            echo "\"/> 
                    <input type=\"hidden\" name=\"product_option[";
            // line 115
            echo ($context["option_row"] ?? null);
            echo "][option_id]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 115);
            echo "\"/> 
                    <input type=\"hidden\" name=\"product_option[";
            // line 116
            echo ($context["option_row"] ?? null);
            echo "][type]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 116);
            echo "\"/>
                    <input type=\"hidden\" name=\"product_option[";
            // line 117
            echo ($context["option_row"] ?? null);
            echo "][sort_order]\"  value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "sort_order", [], "any", false, false, false, 117);
            echo "\" class=\"sort-value\">
                    <select class=\"d-none\" id=\"select-default-row-";
            // line 118
            echo ($context["option_row"] ?? null);
            echo "\">
                      ";
            // line 119
            if ((($__internal_compile_0 = ($context["option_values"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 119)] ?? null) : null)) {
                // line 120
                echo "                      ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((($__internal_compile_1 = ($context["option_values"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 120)] ?? null) : null));
                foreach ($context['_seq'] as $context["_key"] => $context["option_value"]) {
                    // line 121
                    echo "                   
                      <option value=\"";
                    // line 122
                    echo twig_get_attribute($this->env, $this->source, $context["option_value"], "option_value_id", [], "any", false, false, false, 122);
                    echo "\" ";
                    if ((twig_get_attribute($this->env, $this->source, ($context["product_option_value"] ?? null), "name", [], "any", false, false, false, 122) == twig_get_attribute($this->env, $this->source, $context["option_value"], "name", [], "any", false, false, false, 122))) {
                        // line 123
                        echo "selected";
                    }
                    echo ">";
                    echo twig_get_attribute($this->env, $this->source, $context["option_value"], "name", [], "any", false, false, false, 123);
                    echo "</option>
                       
                      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option_value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 126
                echo "                      ";
            }
            // line 127
            echo "
                    </select>


                    ";
            // line 131
            $context["inputType"] = "";
            // line 132
            echo "         
                    ";
            // line 133
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 133), ["text", "textarea", "date", "time", "datetime"])) {
                // line 134
                echo "                        ";
                if ((twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 134) == "textarea")) {
                    // line 135
                    echo "                            ";
                    $context["inputType"] = "textarea";
                    // line 136
                    echo "                        ";
                } else {
                    // line 137
                    echo "                            ";
                    $context["inputType"] = "text";
                    // line 138
                    echo "                        ";
                }
                // line 139
                echo "                 


                    
                        <div class=\"row mb-3\">
                            <label for=\"input-option-";
                // line 144
                echo ($context["option_row"] ?? null);
                echo "\" class=\"col-sm-2 col-form-label\">";
                echo ($context["entry_option_value"] ?? null);
                echo "</label>
                            <div class=\"col-sm-10 col-md-4\">
                                
                                    <div class=\"input-group\">
                                        <input type=\"";
                // line 148
                echo ($context["inputType"] ?? null);
                echo "\" name=\"product_option[";
                echo ($context["option_row"] ?? null);
                echo "][value]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product_option"], "value", [], "any", false, false, false, 148);
                echo "\" placeholder=\"";
                echo ($context["entry_option_value"] ?? null);
                echo "\" id=\"input-option-";
                echo ($context["option_row"] ?? null);
                echo "\" class=\"form-control ";
                echo twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 148);
                echo "\"  />
                                        <div  class=\"input-group-text ";
                // line 149
                echo ($context["showcallendar"] ?? null);
                echo "\"><i class=\"fa-regular fa-calendar\"></i></div>
                                    </div>
                            </div>
                        </div>
                    ";
            }
            // line 154
            echo "                    <input type=\"hidden\" name=\"product_option[";
            echo ($context["option_row"] ?? null);
            echo "][product_option_id]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "product_option_id", [], "any", false, false, false, 154);
            echo "\"/>
                    <input type=\"hidden\" name=\"product_option[";
            // line 155
            echo ($context["option_row"] ?? null);
            echo "][option_id]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 155);
            echo "\"/>
                    
                    ";
            // line 157
            if (((((twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 157) == "select") || (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 157) == "radio")) || (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 157) == "checkbox")) || (twig_get_attribute($this->env, $this->source, $context["product_option"], "type", [], "any", false, false, false, 157) == "image"))) {
                // line 158
                echo "      
   

                             <!-- start of shortable accordion table -->
                             <ul class=\"listWithHandle\" id=\"option-row-body-";
                // line 162
                echo ($context["option_row"] ?? null);
                echo "\" style=\"padding: 0; margin: 0\">
                            ";
                // line 163
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product_option"], "product_option_value", [], "any", false, false, false, 163));
                foreach ($context['_seq'] as $context["_key"] => $context["product_option_value"]) {
                    // line 164
                    echo "                            <li class=\"list-group-item\">
                               
                            <div class=\"accordion  sortable-accordion\" id=\"accordion";
                    // line 166
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\">
                              <div class=\"accordion-item\">
                                <div class=\"d-flex align-items-center\">
                                  <button  class=\"accordion-button  collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse";
                    // line 169
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
                    // line 173
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "name", [], "any", false, false, false, 173);
                    echo "  </span>  
                                  </button>

                                  <input type=\"hidden\" value=\"";
                    // line 176
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "sort_order", [], "any", false, false, false, 176);
                    echo "\" name=\"product_option[";
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][sort_order]\" class=\"sort-value\">

                                  <button type=\"button\"   
                         onclick=\"removeOptionValue('accordion";
                    // line 179
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "', ";
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "product_option_id", [], "any", false, false, false, 179);
                    echo ");\"
                      data-bs-toggle=\"tooltip\" title=\"";
                    // line 180
                    echo ($context["button_remove"] ?? null);
                    echo "\" class=\"btn btn-danger\">
                    <i class=\"fa-solid fa-minus-circle\"></i>
                      </button>
                    </div>
                                 
                                <div id=\"collapse";
                    // line 185
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
                    // line 189
                    echo ($context["entry_image"] ?? null);
                    echo "</strong></td>
  <td class=\"text-start\">

    <div style=\"max-width: 60px; display: inline-block\">
     
      <img src=\"";
                    // line 194
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "image", [], "any", false, false, false, 194);
                    echo "\" alt=\"\" title=\"\" id=\"thumb-image-";
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\"
        data-oc-placeholder=\"";
                    // line 195
                    echo ($context["placeholder"] ?? null);
                    echo "\" class=\"  card-img-top \" />
    </div>
    </br>
    <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image-";
                    // line 198
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\"
      data-oc-thumb=\"#thumb-image-";
                    // line 199
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\" class=\"btn btn-info btn-sm btn-block\"
      name=\"product_option_button[";
                    // line 200
                    echo ($context["option_row"] ?? null);
                    echo "][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][image]\">
      <i class=\"fa-solid fa-pencil\"></i> ";
                    // line 201
                    echo ($context["entry_image"] ?? null);
                    echo "
    </button>
    <input type=\"hidden\" class=\"optimage\"
      name=\"product_option[";
                    // line 204
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][image]\"
      id=\"input-image-";
                    // line 205
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "value", [], "any", false, false, false, 205);
                    echo "\" />

    <button type=\"button\" data-clear=\"";
                    // line 207
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\"
      class=\"btn clear-button  btn-warning btn-sm btn-block\"
      name=\"product_option_button[";
                    // line 209
                    echo ($context["option_row"] ?? null);
                    echo "][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][clear]\">
      <i class=\"fa-regular fa-trash-can\"></i> ";
                    // line 210
                    echo ($context["button_clear"] ?? null);
                    echo "
    </button>

  </td>
</tr>

<tr>

  <td class=\"text-start\"><strong>";
                    // line 218
                    echo ($context["entry_option_value"] ?? null);
                    echo "</strong></td>
  <td class=\"text-start\">
    <select  name=\"product_option[";
                    // line 220
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][option_value_id]\" class=\"read-only option-select form-select\" id=\"product-option-values-";
                    echo ($context["option_row"] ?? null);
                    echo "\">
      ";
                    // line 221
                    if ((($__internal_compile_2 = ($context["option_values"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 221)] ?? null) : null)) {
                        // line 222
                        echo "      ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((($__internal_compile_3 = ($context["option_values"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[twig_get_attribute($this->env, $this->source, $context["product_option"], "option_id", [], "any", false, false, false, 222)] ?? null) : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["option_value"]) {
                            // line 223
                            echo "      <option value=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["option_value"], "option_value_id", [], "any", false, false, false, 223);
                            echo "\" ";
                            if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "name", [], "any", false, false, false, 223) == twig_get_attribute($this->env, $this->source, $context["option_value"], "name", [], "any", false, false, false, 223))) {
                                // line 224
                                echo "selected";
                            }
                            echo ">";
                            echo twig_get_attribute($this->env, $this->source, $context["option_value"], "name", [], "any", false, false, false, 224);
                            echo "</option>
      ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option_value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 226
                        echo "      ";
                    }
                    // line 227
                    echo "    </select>

    <input type=\"hidden\"
      name=\"product_option[";
                    // line 230
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][product_option_id]\"
      value=\"";
                    // line 231
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "product_option_id", [], "any", false, false, false, 231);
                    echo "\" />
    
      
 
  </td>
</tr>

<tr>
  <td class=\"text-start\"><strong>";
                    // line 239
                    echo ($context["entry_quantity"] ?? null);
                    echo "</strong></td>
  <td class=\"text-start\">
    <input class=\"read-only form-control\" pattern=\"[0-9]+([\\.,][0-9]+)?\" style=\"min-width: 80px;\" type=\"text\"
      name=\"product_option[";
                    // line 242
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][quantity]\"
      value=\"";
                    // line 243
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "quantity", [], "any", false, false, false, 243);
                    echo "\" />
  </td>
</tr>

<tr>
  <td class=\"text-start\"><strong>";
                    // line 248
                    echo ($context["entry_subtract"] ?? null);
                    echo "</strong></td>
  <td class=\"text-start\">
    <select class=\"read-only form-select\"
      name=\"product_option[";
                    // line 251
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][subtract]\">
      <option value=\"0\" ";
                    // line 252
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "subtract", [], "any", false, false, false, 252) == "0")) {
                        echo "selected";
                    }
                    echo ">No</option>
      <option value=\"1\" ";
                    // line 253
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "subtract", [], "any", false, false, false, 253) == "1")) {
                        echo "selected";
                    }
                    echo ">Yes</option>
    </select>
  </td>
</tr>



<tr>
  <td    class=\"text-start\"><strong>";
                    // line 261
                    echo ($context["entry_price"] ?? null);
                    echo "</strong></td>
  <td class=\"text-start\">
    <div class=\"input-group\">
      <div style=\"width: 70px;\">
        <select class=\"read-only form-select \"
          name=\"product_option[";
                    // line 266
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][price_prefix]\">
          <option value=\"+\" ";
                    // line 267
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "price_prefix", [], "any", false, false, false, 267) == "+")) {
                        echo "selected";
                    }
                    echo ">+</option>
          <option value=\"-\" ";
                    // line 268
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "price_prefix", [], "any", false, false, false, 268) == "-")) {
                        echo "selected";
                    }
                    echo ">-</option>
          <option value=\"=\" ";
                    // line 269
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "price_prefix", [], "any", false, false, false, 269) == "=")) {
                        echo "selected";
                    }
                    echo ">=</option>
        </select>
      </div>
      <input class=\"read-only form-control\" pattern=\"[0-9]+([\\.,][0-9]+)?\" style=\"min-width: 80px;\" type=\"text\"
        name=\"product_option[";
                    // line 273
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][price]\"
        value=\"";
                    // line 274
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "price", [], "any", false, false, false, 274);
                    echo "\" />
    </div>
  </td>
</tr>

<tr>

  <td class=\"text-start\"><strong>";
                    // line 281
                    echo ($context["entry_points"] ?? null);
                    echo "</strong></td>
  <td class=\"text-start\">
    <div class=\"input-group\">
      <div style=\"width: 70px;\">
        <select class=\"read-only form-select\"
          name=\"product_option[";
                    // line 286
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][points_prefix]\">
          <option value=\"+\" ";
                    // line 287
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "points_prefix", [], "any", false, false, false, 287) == "+")) {
                        echo "selected";
                    }
                    echo ">+</option>
          <option value=\"-\" ";
                    // line 288
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "points_prefix", [], "any", false, false, false, 288) == "-")) {
                        echo "selected";
                    }
                    echo ">-</option>
        </select>
      </div>
      <input class=\"read-only form-control\" style=\"min-width: 80px;\" pattern=\"[0-9]+([\\.,][0-9]+)?\" type=\"text\"
        name=\"product_option[";
                    // line 292
                    echo ($context["option_row"] ?? null);
                    echo "][product_option_value][";
                    echo ($context["option_value_row"] ?? null);
                    echo "][points]\"
        value=\"";
                    // line 293
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "points", [], "any", false, false, false, 293);
                    echo "\" />
    </div>
  </td>
</tr>

<tr>

  <td class=\"text-start\" ><strong>";
                    // line 300
                    echo ($context["entry_weight"] ?? null);
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
                    echo "][weight_prefix]\">
          <option value=\"+\" ";
                    // line 306
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "weight_prefix", [], "any", false, false, false, 306) == "+")) {
                        echo "selected";
                    }
                    echo ">+</option>
          <option value=\"-\" ";
                    // line 307
                    if ((twig_get_attribute($this->env, $this->source, $context["product_option_value"], "weight_prefix", [], "any", false, false, false, 307) == "-")) {
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
                    echo "][weight]\"
        value=\"";
                    // line 312
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "weight", [], "any", false, false, false, 312);
                    echo "\" />
    </div>
  </td>
<tr>
<td>
</td>
<td>

<button type=\"button\" data-bs-toggle=\"tooltip\" title=\"Lock/Unlock\"  
data-option-value-row=\"accordion";
                    // line 321
                    echo ($context["option_row"] ?? null);
                    echo "-";
                    echo ($context["option_value_row"] ?? null);
                    echo "\" data-poption-id=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product_option_value"], "product_option_id", [], "any", false, false, false, 321);
                    echo "\"
class=\"btn btn-primary add-or-edit-btn\"> <i class=\"fa-solid fa-unlock\"></i></button>

</td>
</tr>
</tr>
</table>
                             
                         </li>
                              ";
                    // line 330
                    $context["option_value_row"] = (($context["option_value_row"] ?? null) + 1);
                    // line 331
                    echo "                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_option_value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 332
                echo "                          </ul>
                          <!-- end of shortable accordion table -->
                          </tbody>
                          <tfoot>
                          </tfoot>
                        </table>
                   
                      </div>
                    ";
            }
            // line 341
            echo "                  </fieldset>
     
    </li>
                  ";
            // line 344
            $context["option_row"] = (($context["option_row"] ?? null) + 1);
            // line 345
            echo "    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 347
        echo "   
            </div>
          </ul>





<!--  hidden modal quick add new option -->
<div id=\"quick-newmodal-option\" class=\"modal fade\" style=\"display: none;\">
  <div class=\"modal-dialog\">
      <div class=\"modal-content\">
          <div class=\"modal-header\">
              <h5 class=\"modal-title\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 360
        echo ($context["text_add_new_option"] ?? null);
        echo "</h5>
              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
          </div>
          <div class=\"modal-body\">
            <form id=\"quick-add-form\"> 
   
            <div class=\"mb-3\">
                <label for=\"input-modal-language\" class=\"form-label\">";
        // line 367
        echo ($context["entry_select_language"] ?? null);
        echo "</label>
                <select name=\"option_language\" id=\"input-modal-language\" class=\"form-select\">
                    ";
        // line 369
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["code"] => $context["language"]) {
            // line 370
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 370);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 370);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['code'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 372
        echo "                </select>
            </div>
 
            <div class=\"mb-3\">
                <label for=\"input-modal-option-type\" class=\"form-label\">";
        // line 376
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
        // line 391
        echo ($context["entry_group_option_name"] ?? null);
        echo "</label>
              <input type=\"text\" name=\"option_group_name\" value=\"\" placeholder=\"";
        // line 392
        echo ($context["entry_group_option_name"] ?? null);
        echo "\" id=\"input-modal-option-group\" class=\"form-control option-languaged\" />
          </div>
        
          <div id=\"opts-container\">
  
          </div>
          <div class=\"modal-footer\">
              <button type=\"button\" id=\"button-quick-option-save\" class=\"btn btn-primary \">";
        // line 399
        echo ($context["button_save"] ?? null);
        echo "</button>
              <button type=\"button\" class=\"btn btn-light\" data-bs-dismiss=\"modal\">";
        // line 400
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
        // line 411
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
                   <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"";
        // line 438
        echo ($context["button_option_value_add"] ?? null);
        echo "\"   data-option-row=\"option_row_placeholder\" class=\"btn mx-1 btn-primary showaddoption add-opt-button\">
                    <i class=\"fa-solid fa-plus-circle\"></i>
                </button>
             
                        
                    
                <a href=\"index.php?route=catalog/option.form&user_token=";
        // line 444
        echo ($context["user_token"] ?? null);
        echo "&option_id=option_id_placeholder\" class=\"btn mx-1 btn-primary\">
                  <i class=\"fa-solid fa-pencil\"></i>
              </a>
              <button type=\"button\" class=\"btn  btn-danger\" onclick=\"javascript:\$('#option-row-option_row_placeholder').remove();\">
                <i class=\"fa-solid fa-minus-circle\"></i>
            </button>
              </div>
            
        </h2>
        <div id=\"collapseoption_row_placeholder\" class=\"accordion-collapse collapse\" aria-labelledby=\"headingoption_row_placeholder\" data-bs-parent=\"#accordionoption_row_placeholder\">
            <div class=\"accordion-body\">
         
                <div class=\"row mb-3\">
                  <div class=\"col-sm-2\">
 
                      <label for=\"input-required-option_row_placeholder\" class=\"col-form-label\">";
        // line 459
        echo ($context["entry_required"] ?? null);
        echo "</label>
                  </div>
                  <div class=\"col-sm-10\">
                      <div class=\"input-group\">
                          <!-- Input -->
                          <div style=\"width: 100px\"> 
                          <select name=\"xxxproduct_option[option_row_placeholder][required]\" id=\"input-required-option_row_placeholder\" class=\"form-select\">
                              <option value=\"1\" >";
        // line 466
        echo ($context["text_enabled"] ?? null);
        echo "</option>
                              <option value=\"0\" >";
        // line 467
        echo ($context["text_disabled"] ?? null);
        echo "</option>
                          </select></div>
                   
                      </div>
                  </div>
              </div>

<div  class=\"row mb-3 showvalueinput\">
  <label for=\"input-option-option_row_placeholder\" class=\"col-sm-2 col-form-label\">";
        // line 475
        echo ($context["entry_option_value"] ?? null);
        echo "</label>
  <div class=\"col-sm-10 col-md-4\">
          <div class=\"input-group\">
              <input type=\"option_type_placeholder\" name=\"xxxproduct_option[option_row_placeholder][value]\" value=\"\" placeholder=\"";
        // line 478
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
        // line 518
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
        // line 528
        echo ($context["entry_image"] ?? null);
        echo "</strong></td>
<td class=\"text-start\">
<div style=\"max-width: 60px; display: inline-block\">
<img src=\"\" alt=\"\" title=\"\" id=\"thumb-image-option-row-placeholder-option-valuerow-placeholder\"
data-oc-placeholder=\"";
        // line 532
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"  card-img-top d-none\" />
</div>
</br>
<button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image-option-row-placeholder-option-valuerow-placeholder\"
data-oc-thumb=\"#thumb-image-option-row-placeholder-option-valuerow-placeholder\" class=\"btn btn-info btn-sm btn-block\"
name=\"xxxproduct_option_button[option-row-placeholder][option-valuerow-placeholder][image]\">
<i class=\"fa-solid fa-pencil\"></i> ";
        // line 538
        echo ($context["entry_image"] ?? null);
        echo "
</button>
<input type=\"hidden\" class=\"optimage\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][image]\"
id=\"input-image-option-row-placeholder-option-valuerow-placeholder\" value=\"";
        // line 542
        echo twig_get_attribute($this->env, $this->source, ($context["option"] ?? null), "image", [], "any", false, false, false, 542);
        echo "\" />
<button type=\"button\" data-clear=\"option-row-placeholder-option-valuerow-placeholder\"
class=\"btn clear-button  btn-warning btn-sm btn-block\"
name=\"xxxproduct_option_button[option-row-placeholder][option-valuerow-placeholder][clear]\">
<i class=\"fa-regular fa-trash-can\"></i> ";
        // line 546
        echo ($context["button_clear"] ?? null);
        echo "
</button>
</td>
</tr>
<tr>
<td class=\"text-start\"><strong>";
        // line 551
        echo ($context["entry_option_value"] ?? null);
        echo "</strong></td>
<td class=\"text-start insertselect\">
 
<input type=\"hidden\"
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][product_option_id]\"
value=\"undefined\" />
 
</td>
</tr>
<tr>
<td class=\"text-start\"><strong>";
        // line 561
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
        // line 569
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
        // line 579
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
        // line 598
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
        // line 616
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


 <script >

  //**** Some JavaScript parts related to options are retained in product_form template ***

              \$('#input-option').autocomplete({
  'source': function (request, response) {
      \$.ajax({
          url: 'index.php?route=catalog/option.autocomplete&user_token=";
        // line 660
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
        // line 682
        echo ($context["option_row"] ?? null);
        echo ";

var quickoptcounter = 0;

var option_value_row = ";
        // line 686
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
  
}
initializeSortables();
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
      \$(this).data('sortable','true');
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
        // line 951
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
        // line 963
        echo ($context["user_token"] ?? null);
        echo "&product_id=' +  product_id
            );

            window.loadVariations();
            
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
  \$('#option-row-' + optionValueRow + ' input[type=\"hidden\"][name\$=\"[product_option_id]\"]').each(function () {
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
        return "cp-akis/view//plates/catalog/product_tabs/options_tab.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1599 => 963,  1584 => 951,  1316 => 686,  1309 => 682,  1284 => 660,  1237 => 616,  1216 => 598,  1194 => 579,  1181 => 569,  1170 => 561,  1157 => 551,  1149 => 546,  1142 => 542,  1135 => 538,  1126 => 532,  1119 => 528,  1106 => 518,  1063 => 478,  1057 => 475,  1046 => 467,  1042 => 466,  1032 => 459,  1014 => 444,  1005 => 438,  975 => 411,  961 => 400,  957 => 399,  947 => 392,  943 => 391,  925 => 376,  919 => 372,  908 => 370,  904 => 369,  899 => 367,  889 => 360,  874 => 347,  867 => 345,  865 => 344,  860 => 341,  849 => 332,  843 => 331,  841 => 330,  825 => 321,  813 => 312,  807 => 311,  798 => 307,  792 => 306,  786 => 305,  778 => 300,  768 => 293,  762 => 292,  753 => 288,  747 => 287,  741 => 286,  733 => 281,  723 => 274,  717 => 273,  708 => 269,  702 => 268,  696 => 267,  690 => 266,  682 => 261,  669 => 253,  663 => 252,  657 => 251,  651 => 248,  643 => 243,  637 => 242,  631 => 239,  620 => 231,  614 => 230,  609 => 227,  606 => 226,  595 => 224,  590 => 223,  585 => 222,  583 => 221,  575 => 220,  570 => 218,  559 => 210,  553 => 209,  546 => 207,  537 => 205,  531 => 204,  525 => 201,  519 => 200,  513 => 199,  507 => 198,  501 => 195,  493 => 194,  485 => 189,  468 => 185,  460 => 180,  452 => 179,  442 => 176,  436 => 173,  423 => 169,  415 => 166,  411 => 164,  407 => 163,  403 => 162,  397 => 158,  395 => 157,  388 => 155,  381 => 154,  373 => 149,  359 => 148,  350 => 144,  343 => 139,  340 => 138,  337 => 137,  334 => 136,  331 => 135,  328 => 134,  326 => 133,  323 => 132,  321 => 131,  315 => 127,  312 => 126,  300 => 123,  296 => 122,  293 => 121,  288 => 120,  286 => 119,  282 => 118,  276 => 117,  270 => 116,  264 => 115,  258 => 114,  241 => 104,  233 => 103,  227 => 102,  215 => 95,  201 => 88,  190 => 82,  181 => 78,  171 => 75,  165 => 72,  156 => 68,  149 => 64,  143 => 61,  139 => 60,  134 => 57,  131 => 56,  128 => 55,  126 => 53,  124 => 52,  121 => 51,  118 => 50,  115 => 49,  112 => 48,  110 => 47,  104 => 43,  100 => 42,  95 => 40,  92 => 39,  89 => 38,  87 => 37,  76 => 29,  71 => 27,  63 => 22,  47 => 9,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<div id=\"option\">
 
<script  src=\"view/javascript/Sortable.min.js\"></script>


 
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
                              <button type=\"button\" class=\"btn btn-danger\" onclick=\"removeAllGroup({{ option_row }}, {{ product_option.product_option_id }});\">
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
                    <input type=\"hidden\" name=\"product_option[{{ option_row }}][product_option_id]\" value=\"{{ product_option.product_option_id }}\"/>
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
                         onclick=\"removeOptionValue('accordion{{ option_row }}-{{option_value_row }}', {{product_option_value.product_option_id }});\"
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
      name=\"product_option[{{ option_row }}][product_option_value][{{ option_value_row }}][product_option_id]\"
      value=\"{{ product_option_value.product_option_id }}\" />
    
      
 
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
          <option value=\"=\" {% if product_option_value.price_prefix=='=' %}selected{% endif %}>=</option>
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
data-option-value-row=\"accordion{{ option_row }}-{{option_value_row }}\" data-poption-id=\"{{product_option_value.product_option_id }}\"
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
                   <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"{{ button_option_value_add }}\"   data-option-row=\"option_row_placeholder\" class=\"btn mx-1 btn-primary showaddoption add-opt-button\">
                    <i class=\"fa-solid fa-plus-circle\"></i>
                </button>
             
                        
                    
                <a href=\"index.php?route=catalog/option.form&user_token={{ user_token }}&option_id=option_id_placeholder\" class=\"btn mx-1 btn-primary\">
                  <i class=\"fa-solid fa-pencil\"></i>
              </a>
              <button type=\"button\" class=\"btn  btn-danger\" onclick=\"javascript:\$('#option-row-option_row_placeholder').remove();\">
                <i class=\"fa-solid fa-minus-circle\"></i>
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
name=\"xxxproduct_option[option-row-placeholder][product_option_value][option-valuerow-placeholder][product_option_id]\"
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


 <script >

  //**** Some JavaScript parts related to options are retained in product_form template ***

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
  
}
initializeSortables();
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
      \$(this).data('sortable','true');
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

            window.loadVariations();
            
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
  \$('#option-row-' + optionValueRow + ' input[type=\"hidden\"][name\$=\"[product_option_id]\"]').each(function () {
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

              ", "cp-akis/view//plates/catalog/product_tabs/options_tab.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/catalog/product_tabs/options_tab.twig");
    }
}
