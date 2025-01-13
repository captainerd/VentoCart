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

/* cp-akis/view//plates/catalog/product_tabs/data_tab.twig */
class __TwigTemplate_c9d898560c0c0936478eba8047653f23 extends Template
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
         
    <fieldset>
      <legend>";
        // line 4
        echo ($context["text_model"] ?? null);
        echo "</legend>
      <div class=\"row mb-3 required\">
        <label for=\"input-model\" class=\"col-sm-2 col-form-label\">";
        // line 6
        echo ($context["entry_model"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"model\" value=\"";
        // line 9
        echo ($context["model"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_model"] ?? null);
        echo "\" id=\"input-model\" class=\"form-control\"/>
      
          </div>
          <div id=\"error-model\" class=\"invalid-feedback\"></div>
        </div>
      </div>
      <div class=\"row mb-3 required\">
        <label for=\"input-sku\" class=\"col-sm-2   col-form-label\">";
        // line 16
        echo ($context["entry_sku"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"sku\" value=\"";
        // line 19
        echo ($context["sku"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_sku"] ?? null);
        echo "\" id=\"input-sku\" class=\"form-control\"/>
    
          </div>
          <div class=\"form-text\">";
        // line 22
        echo ($context["help_sku"] ?? null);
        echo "</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-upc\" class=\"col-sm-2 col-form-label\">";
        // line 26
        echo ($context["entry_upc"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"upc\" value=\"";
        // line 29
        echo ($context["upc"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_upc"] ?? null);
        echo "\" id=\"input-upc\" class=\"form-control\"/>
       
          </div>
          <div class=\"form-text\">";
        // line 32
        echo ($context["help_upc"] ?? null);
        echo "</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-ean\" class=\"col-sm-2 col-form-label\">";
        // line 36
        echo ($context["entry_ean"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"ean\" value=\"";
        // line 39
        echo ($context["ean"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_ean"] ?? null);
        echo "\" id=\"input-ean\" class=\"form-control\"/>
       
          </div>
          <div class=\"form-text\">";
        // line 42
        echo ($context["help_ean"] ?? null);
        echo "</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-jan\" class=\"col-sm-2 col-form-label\">";
        // line 46
        echo ($context["entry_jan"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"jan\" value=\"";
        // line 49
        echo ($context["jan"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_jan"] ?? null);
        echo "\" id=\"input-jan\" class=\"form-control\"/>
     
          </div>
          <div class=\"form-text\">";
        // line 52
        echo ($context["help_jan"] ?? null);
        echo "</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-isbn\" class=\"col-sm-2 col-form-label\">";
        // line 56
        echo ($context["entry_isbn"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"isbn\" value=\"";
        // line 59
        echo ($context["isbn"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_isbn"] ?? null);
        echo "\" id=\"input-isbn\" class=\"form-control\"/>
     
          </div>
          <div class=\"form-text\">";
        // line 62
        echo ($context["help_isbn"] ?? null);
        echo "</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-mpn\" class=\"col-sm-2 col-form-label\">";
        // line 66
        echo ($context["entry_mpn"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"mpn\" value=\"";
        // line 69
        echo ($context["mpn"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mpn"] ?? null);
        echo "\" id=\"input-mpn\" class=\"form-control\"/>
    
          </div>
          <div class=\"form-text\">";
        // line 72
        echo ($context["help_mpn"] ?? null);
        echo "</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-location\" class=\"col-sm-2 col-form-label\">";
        // line 76
        echo ($context["entry_location"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"location\" value=\"";
        // line 79
        echo ($context["location"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_location"] ?? null);
        echo "\" id=\"input-location\" class=\"form-control\"/>
     
          </div>
        </div>
      </div>
    </fieldset>
   
      <legend>";
        // line 86
        echo ($context["text_stock"] ?? null);
        echo "</legend>
      <div class=\"row mb-3\">
        <label for=\"input-quantity\" class=\"col-sm-2 col-form-label\">";
        // line 88
        echo ($context["entry_quantity"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <input type=\"text\" name=\"quantity\" value=\"";
        // line 90
        echo ($context["quantity"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_quantity"] ?? null);
        echo "\" id=\"input-quantity\" class=\"form-control\"/>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-minimum\" class=\"col-sm-2 col-form-label\">";
        // line 94
        echo ($context["entry_minimum"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"minimum\" value=\"";
        // line 97
        echo ($context["minimum"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_minimum"] ?? null);
        echo "\" id=\"input-minimum\" class=\"form-control\"/>
        
          </div>
          <div class=\"form-text\">";
        // line 100
        echo ($context["help_minimum"] ?? null);
        echo "</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label class=\"col-sm-2 col-form-label\">";
        // line 104
        echo ($context["entry_subtract"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">

          <div class=\"input-group\">

            <div id=\"input-subtract\" class=\"form-check form-switch form-switch-lg\">
              <input type=\"hidden\" name=\"subtract\" value=\"0\"/> <input type=\"checkbox\" name=\"subtract\" value=\"1\" class=\"form-check-input\"";
        // line 110
        if (($context["subtract"] ?? null)) {
            echo " checked";
        }
        echo "/>
            </div>

       

          </div>

        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-stock-status\" class=\"col-sm-2 col-form-label\">";
        // line 120
        echo ($context["entry_stock_status"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <select name=\"stock_status_id\" id=\"input-stock-status\" class=\"form-select\">
              ";
        // line 124
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stock_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["stock_status"]) {
            // line 125
            echo "                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["stock_status"], "stock_status_id", [], "any", false, false, false, 125);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["stock_status"], "stock_status_id", [], "any", false, false, false, 125) == ($context["stock_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["stock_status"], "name", [], "any", false, false, false, 125);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stock_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 127
        echo "            </select>
        
          </div>
          <div class=\"form-text\">";
        // line 130
        echo ($context["help_stock_status"] ?? null);
        echo "</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-date-available\" class=\"col-sm-2 col-form-label\">";
        // line 134
        echo ($context["entry_date_available"] ?? null);
        echo "</label>
        <div class=\"col-sm-10 col-md-4\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"date_available\" value=\"";
        // line 137
        echo ($context["date_available"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_date_available"] ?? null);
        echo "\" id=\"input-date-available\" class=\"form-control date\"/>
            <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
        
          </div>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <legend>";
        // line 145
        echo ($context["text_specification"] ?? null);
        echo "</legend>
      <div class=\"row mb-3\">
        <label class=\"col-sm-2 col-form-label\">";
        // line 147
        echo ($context["entry_shipping"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">

            <div id=\"input-shipping\" class=\"form-check form-switch form-switch-lg\">
              <input type=\"hidden\" name=\"shipping\" value=\"0\"/> <input type=\"checkbox\" name=\"shipping\" value=\"1\" class=\"form-check-input\"";
        // line 152
        if (($context["shipping"] ?? null)) {
            echo " checked";
        }
        echo "/>
            </div>

        
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-length\" class=\"col-sm-2 col-form-label\">";
        // line 160
        echo ($context["entry_dimension"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"length\" value=\"";
        // line 163
        echo ($context["length"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_length"] ?? null);
        echo "\" id=\"input-length\" class=\"form-control\"/>
      
            <input type=\"text\" name=\"width\" value=\"";
        // line 165
        echo ($context["width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-width\" class=\"form-control\"/>
         
            <input type=\"text\" name=\"height\" value=\"";
        // line 167
        echo ($context["height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-height\" class=\"form-control\"/>
      
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-length-class\" class=\"col-sm-2 col-form-label\">";
        // line 173
        echo ($context["entry_length_class"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <select name=\"length_class_id\" id=\"input-length-class\" class=\"form-select\">
              ";
        // line 177
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["length_classes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["length_class"]) {
            // line 178
            echo "                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["length_class"], "length_class_id", [], "any", false, false, false, 178);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["length_class"], "length_class_id", [], "any", false, false, false, 178) == ($context["length_class_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["length_class"], "title", [], "any", false, false, false, 178);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['length_class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 180
        echo "            </select>
         
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-weight\" class=\"col-sm-2 col-form-label\">";
        // line 186
        echo ($context["entry_weight"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"weight\" value=\"";
        // line 189
        echo ($context["weight"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_weight"] ?? null);
        echo "\" id=\"input-weight\" class=\"form-control\"/>
         
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-weight-class\" class=\"col-sm-2 col-form-label\">";
        // line 195
        echo ($context["entry_weight_class"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <select name=\"weight_class_id\" id=\"input-weight-class\" class=\"form-select\">
              ";
        // line 199
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["weight_classes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["weight_class"]) {
            // line 200
            echo "                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["weight_class"], "weight_class_id", [], "any", false, false, false, 200);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["weight_class"], "weight_class_id", [], "any", false, false, false, 200) == ($context["weight_class_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["weight_class"], "title", [], "any", false, false, false, 200);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['weight_class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 202
        echo "            </select>
        
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-status\" class=\"col-sm-2 col-form-label\">";
        // line 208
        echo ($context["entry_status"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <div class=\"form-check form-switch form-switch-lg\">
              <input type=\"hidden\" name=\"status\" value=\"0\"/> <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"";
        // line 212
        if (($context["status"] ?? null)) {
            echo " checked";
        }
        echo "/>
            </div>
     
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-sort-order\" class=\"col-sm-2 col-form-label\">";
        // line 219
        echo ($context["entry_sort_order"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"sort_order\" value=\"";
        // line 222
        echo ($context["sort_order"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_sort_order"] ?? null);
        echo "\" id=\"input-sort-order\" class=\"form-control\"/>
        
          </div>
        </div>
      </div>
    </fieldset>
 <!-- JS is retained in product_form -->";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/catalog/product_tabs/data_tab.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  497 => 222,  491 => 219,  479 => 212,  472 => 208,  464 => 202,  449 => 200,  445 => 199,  438 => 195,  427 => 189,  421 => 186,  413 => 180,  398 => 178,  394 => 177,  387 => 173,  376 => 167,  369 => 165,  362 => 163,  356 => 160,  343 => 152,  335 => 147,  330 => 145,  317 => 137,  311 => 134,  304 => 130,  299 => 127,  284 => 125,  280 => 124,  273 => 120,  258 => 110,  249 => 104,  242 => 100,  234 => 97,  228 => 94,  219 => 90,  214 => 88,  209 => 86,  197 => 79,  191 => 76,  184 => 72,  176 => 69,  170 => 66,  163 => 62,  155 => 59,  149 => 56,  142 => 52,  134 => 49,  128 => 46,  121 => 42,  113 => 39,  107 => 36,  100 => 32,  92 => 29,  86 => 26,  79 => 22,  71 => 19,  65 => 16,  53 => 9,  47 => 6,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
         
    <fieldset>
      <legend>{{ text_model }}</legend>
      <div class=\"row mb-3 required\">
        <label for=\"input-model\" class=\"col-sm-2 col-form-label\">{{ entry_model }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"model\" value=\"{{ model }}\" placeholder=\"{{ entry_model }}\" id=\"input-model\" class=\"form-control\"/>
      
          </div>
          <div id=\"error-model\" class=\"invalid-feedback\"></div>
        </div>
      </div>
      <div class=\"row mb-3 required\">
        <label for=\"input-sku\" class=\"col-sm-2   col-form-label\">{{ entry_sku }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"sku\" value=\"{{ sku }}\" placeholder=\"{{ entry_sku }}\" id=\"input-sku\" class=\"form-control\"/>
    
          </div>
          <div class=\"form-text\">{{ help_sku }}</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-upc\" class=\"col-sm-2 col-form-label\">{{ entry_upc }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"upc\" value=\"{{ upc }}\" placeholder=\"{{ entry_upc }}\" id=\"input-upc\" class=\"form-control\"/>
       
          </div>
          <div class=\"form-text\">{{ help_upc }}</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-ean\" class=\"col-sm-2 col-form-label\">{{ entry_ean }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"ean\" value=\"{{ ean }}\" placeholder=\"{{ entry_ean }}\" id=\"input-ean\" class=\"form-control\"/>
       
          </div>
          <div class=\"form-text\">{{ help_ean }}</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-jan\" class=\"col-sm-2 col-form-label\">{{ entry_jan }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"jan\" value=\"{{ jan }}\" placeholder=\"{{ entry_jan }}\" id=\"input-jan\" class=\"form-control\"/>
     
          </div>
          <div class=\"form-text\">{{ help_jan }}</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-isbn\" class=\"col-sm-2 col-form-label\">{{ entry_isbn }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"isbn\" value=\"{{ isbn }}\" placeholder=\"{{ entry_isbn }}\" id=\"input-isbn\" class=\"form-control\"/>
     
          </div>
          <div class=\"form-text\">{{ help_isbn }}</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-mpn\" class=\"col-sm-2 col-form-label\">{{ entry_mpn }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"mpn\" value=\"{{ mpn }}\" placeholder=\"{{ entry_mpn }}\" id=\"input-mpn\" class=\"form-control\"/>
    
          </div>
          <div class=\"form-text\">{{ help_mpn }}</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-location\" class=\"col-sm-2 col-form-label\">{{ entry_location }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"location\" value=\"{{ location }}\" placeholder=\"{{ entry_location }}\" id=\"input-location\" class=\"form-control\"/>
     
          </div>
        </div>
      </div>
    </fieldset>
   
      <legend>{{ text_stock }}</legend>
      <div class=\"row mb-3\">
        <label for=\"input-quantity\" class=\"col-sm-2 col-form-label\">{{ entry_quantity }}</label>
        <div class=\"col-sm-10\">
          <input type=\"text\" name=\"quantity\" value=\"{{ quantity }}\" placeholder=\"{{ entry_quantity }}\" id=\"input-quantity\" class=\"form-control\"/>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-minimum\" class=\"col-sm-2 col-form-label\">{{ entry_minimum }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"minimum\" value=\"{{ minimum }}\" placeholder=\"{{ entry_minimum }}\" id=\"input-minimum\" class=\"form-control\"/>
        
          </div>
          <div class=\"form-text\">{{ help_minimum }}</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label class=\"col-sm-2 col-form-label\">{{ entry_subtract }}</label>
        <div class=\"col-sm-10\">

          <div class=\"input-group\">

            <div id=\"input-subtract\" class=\"form-check form-switch form-switch-lg\">
              <input type=\"hidden\" name=\"subtract\" value=\"0\"/> <input type=\"checkbox\" name=\"subtract\" value=\"1\" class=\"form-check-input\"{% if subtract %} checked{% endif %}/>
            </div>

       

          </div>

        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-stock-status\" class=\"col-sm-2 col-form-label\">{{ entry_stock_status }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <select name=\"stock_status_id\" id=\"input-stock-status\" class=\"form-select\">
              {% for stock_status in stock_statuses %}
                <option value=\"{{ stock_status.stock_status_id }}\"{% if stock_status.stock_status_id == stock_status_id %} selected{% endif %}>{{ stock_status.name }}</option>
              {% endfor %}
            </select>
        
          </div>
          <div class=\"form-text\">{{ help_stock_status }}</div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-date-available\" class=\"col-sm-2 col-form-label\">{{ entry_date_available }}</label>
        <div class=\"col-sm-10 col-md-4\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"date_available\" value=\"{{ date_available }}\" placeholder=\"{{ entry_date_available }}\" id=\"input-date-available\" class=\"form-control date\"/>
            <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
        
          </div>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <legend>{{ text_specification }}</legend>
      <div class=\"row mb-3\">
        <label class=\"col-sm-2 col-form-label\">{{ entry_shipping }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">

            <div id=\"input-shipping\" class=\"form-check form-switch form-switch-lg\">
              <input type=\"hidden\" name=\"shipping\" value=\"0\"/> <input type=\"checkbox\" name=\"shipping\" value=\"1\" class=\"form-check-input\"{% if shipping %} checked{% endif %}/>
            </div>

        
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-length\" class=\"col-sm-2 col-form-label\">{{ entry_dimension }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"length\" value=\"{{ length }}\" placeholder=\"{{ entry_length }}\" id=\"input-length\" class=\"form-control\"/>
      
            <input type=\"text\" name=\"width\" value=\"{{ width }}\" placeholder=\"{{ entry_width }}\" id=\"input-width\" class=\"form-control\"/>
         
            <input type=\"text\" name=\"height\" value=\"{{ height }}\" placeholder=\"{{ entry_height }}\" id=\"input-height\" class=\"form-control\"/>
      
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-length-class\" class=\"col-sm-2 col-form-label\">{{ entry_length_class }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <select name=\"length_class_id\" id=\"input-length-class\" class=\"form-select\">
              {% for length_class in length_classes %}
                <option value=\"{{ length_class.length_class_id }}\"{% if length_class.length_class_id == length_class_id %} selected{% endif %}>{{ length_class.title }}</option>
              {% endfor %}
            </select>
         
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-weight\" class=\"col-sm-2 col-form-label\">{{ entry_weight }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"weight\" value=\"{{ weight }}\" placeholder=\"{{ entry_weight }}\" id=\"input-weight\" class=\"form-control\"/>
         
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-weight-class\" class=\"col-sm-2 col-form-label\">{{ entry_weight_class }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <select name=\"weight_class_id\" id=\"input-weight-class\" class=\"form-select\">
              {% for weight_class in weight_classes %}
                <option value=\"{{ weight_class.weight_class_id }}\"{% if weight_class.weight_class_id == weight_class_id %} selected{% endif %}>{{ weight_class.title }}</option>
              {% endfor %}
            </select>
        
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-status\" class=\"col-sm-2 col-form-label\">{{ entry_status }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <div class=\"form-check form-switch form-switch-lg\">
              <input type=\"hidden\" name=\"status\" value=\"0\"/> <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"{% if status %} checked{% endif %}/>
            </div>
     
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-sort-order\" class=\"col-sm-2 col-form-label\">{{ entry_sort_order }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"sort_order\" value=\"{{ sort_order }}\" placeholder=\"{{ entry_sort_order }}\" id=\"input-sort-order\" class=\"form-control\"/>
        
          </div>
        </div>
      </div>
    </fieldset>
 <!-- JS is retained in product_form -->", "cp-akis/view//plates/catalog/product_tabs/data_tab.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/catalog/product_tabs/data_tab.twig");
    }
}
