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

/* cp-akis/view//plates/catalog/product_tabs/pricing_tab.twig */
class __TwigTemplate_e5e98ca858e5ac1ad161758fd550241b extends Template
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
        echo ($context["text_price"] ?? null);
        echo "</legend>
      <div class=\"row mb-3\">
        <label for=\"input-price\" class=\"col-sm-2 col-form-label\">";
        // line 6
        echo ($context["entry_price"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"price\" value=\"";
        // line 9
        echo ($context["price"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_price"] ?? null);
        echo "\" id=\"input-price\" class=\"form-control\"/>
      
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-price\" class=\"col-sm-2 col-form-label\">";
        // line 15
        echo ($context["entry_supply_cost"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"supply_cost\" value=\"";
        // line 18
        echo ($context["supply_cost"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["supply_cost"] ?? null);
        echo "\" id=\"input-supply-cost\" class=\"form-control\"/>
      
          </div>
        </div>
      </div>

      <div class=\"row mb-3\">
        <label for=\"input-tax-class\" class=\"col-sm-2 col-form-label\">";
        // line 25
        echo ($context["entry_tax_class"] ?? null);
        echo "</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <select name=\"tax_class_id\" id=\"input-tax-class\" class=\"form-select\">
              <option value=\"0\">";
        // line 29
        echo ($context["text_none"] ?? null);
        echo "</option>
              ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tax_classes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tax_class"]) {
            // line 31
            echo "                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["tax_class"], "tax_class_id", [], "any", false, false, false, 31);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["tax_class"], "tax_class_id", [], "any", false, false, false, 31) == ($context["tax_class_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["tax_class"], "title", [], "any", false, false, false, 31);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tax_class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "            </select>
      
          </div>
        </div>
      </div>
    </fieldset>
    <fieldset>

    <h4>";
        // line 41
        echo ($context["text_quantity_discount"] ?? null);
        echo "</h4>
    <div class=\"table-responsive\">
      <table id=\"product-discount\" class=\"table table-bordered table-hover\">
        <thead>
          <tr>
            <td class=\"text-start\">";
        // line 46
        echo ($context["entry_customer_group"] ?? null);
        echo "</td>
            <td class=\"text-end\">";
        // line 47
        echo ($context["entry_quantity"] ?? null);
        echo "</td>
            <td class=\"text-end\">";
        // line 48
        echo ($context["entry_priority"] ?? null);
        echo "</td>
            <td class=\"text-end\">";
        // line 49
        echo ($context["entry_price"] ?? null);
        echo "</td>
            <td class=\"text-start\">";
        // line 50
        echo ($context["entry_date_start"] ?? null);
        echo "</td>
            <td class=\"text-start\">";
        // line 51
        echo ($context["entry_date_end"] ?? null);
        echo "</td>
            <td class=\"text-end\"> </td>
          </tr>
        </thead>
        <tbody>
          ";
        // line 56
        $context["discount_row"] = 0;
        // line 57
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_discounts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_discount"]) {
            // line 58
            echo "            <tr id=\"discount-row-";
            echo ($context["discount_row"] ?? null);
            echo "\">
              <td class=\"text-start\"><select name=\"product_discount[";
            // line 59
            echo ($context["discount_row"] ?? null);
            echo "][customer_group_id]\" class=\"form-select\">
                  ";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
                // line 61
                echo "                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 61);
                echo "\"";
                if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 61) == twig_get_attribute($this->env, $this->source, $context["product_discount"], "customer_group_id", [], "any", false, false, false, 61))) {
                    echo " selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 61);
                echo "</option>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            echo "                </select></td>
              <td class=\"text-end\"><input type=\"text\" name=\"product_discount[";
            // line 64
            echo ($context["discount_row"] ?? null);
            echo "][quantity]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_discount"], "quantity", [], "any", false, false, false, 64);
            echo "\" placeholder=\"";
            echo ($context["entry_quantity"] ?? null);
            echo "\" class=\"form-control\"/></td>
              <td class=\"text-end\"><input type=\"text\" name=\"product_discount[";
            // line 65
            echo ($context["discount_row"] ?? null);
            echo "][priority]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_discount"], "priority", [], "any", false, false, false, 65);
            echo "\" placeholder=\"";
            echo ($context["entry_priority"] ?? null);
            echo "\" class=\"form-control\"/></td>
              <td class=\"text-end\"><input type=\"text\" name=\"product_discount[";
            // line 66
            echo ($context["discount_row"] ?? null);
            echo "][price]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_discount"], "price", [], "any", false, false, false, 66);
            echo "\" placeholder=\"";
            echo ($context["entry_price"] ?? null);
            echo "\" class=\"form-control\"/></td>
              <td class=\"text-start\">
                <div class=\"input-group\">
                  <input type=\"text\" name=\"product_discount[";
            // line 69
            echo ($context["discount_row"] ?? null);
            echo "][date_start]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_discount"], "date_start", [], "any", false, false, false, 69);
            echo "\" placeholder=\"";
            echo ($context["entry_date_start"] ?? null);
            echo "\" class=\"form-control date\"/>
                  <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                </div>
              </td>
              <td class=\"text-start\">
                <div class=\"input-group\">
                  <input type=\"text\" name=\"product_discount[";
            // line 75
            echo ($context["discount_row"] ?? null);
            echo "][date_end]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_discount"], "date_end", [], "any", false, false, false, 75);
            echo "\" placeholder=\"";
            echo ($context["entry_date_end"] ?? null);
            echo "\" class=\"form-control date\"/>
                  <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                </div>
              </td>
              <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#discount-row-";
            // line 79
            echo ($context["discount_row"] ?? null);
            echo "').remove();\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_remove"] ?? null);
            echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
            </tr>
            ";
            // line 81
            $context["discount_row"] = (($context["discount_row"] ?? null) + 1);
            // line 82
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_discount'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        echo "        </tbody>
        <tfoot>
          <tr>
            <td colspan=\"6\"></td>
            <td class=\"text-end\"><button type=\"button\" id=\"button-discount\" data-bs-toggle=\"tooltip\" title=\"";
        // line 87
        echo ($context["button_discount_add"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
          </tr>
        </tfoot>
      </table>
    </div>
<hr/>
<h4>";
        // line 93
        echo ($context["text_discount"] ?? null);
        echo "</h4>
              <div class=\"table-responsive\">
      <table id=\"product-special\" class=\"table table-bordered table-hover\">
        <thead>
          <tr>
            <td class=\"text-start\">";
        // line 98
        echo ($context["entry_customer_group"] ?? null);
        echo "</td>
            <td class=\"text-end\">";
        // line 99
        echo ($context["entry_priority"] ?? null);
        echo "</td>
            <td class=\"text-end\">";
        // line 100
        echo ($context["entry_value"] ?? null);
        echo "</td>
            <td class=\"text-end\">";
        // line 101
        echo ($context["entry_applies"] ?? null);
        echo " </td>
            <td class=\"text-end\">";
        // line 102
        echo ($context["entry_type"] ?? null);
        echo " </td>
            <td class=\"text-start\">";
        // line 103
        echo ($context["entry_date_start"] ?? null);
        echo "</td>
            <td class=\"text-start\">";
        // line 104
        echo ($context["entry_date_end"] ?? null);
        echo "</td>
            <td class=\"text-center\">
              
         
            
            
            </td>
          </tr>
        </thead>
        <tbody>
          ";
        // line 114
        $context["special_row"] = 0;
        // line 115
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_specials"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_special"]) {
            // line 116
            echo "            <tr id=\"special-row-";
            echo ($context["special_row"] ?? null);
            echo "\">
              <td class=\"text-start\"><select name=\"product_special[";
            // line 117
            echo ($context["special_row"] ?? null);
            echo "][customer_group_id]\" class=\"form-select\">
                  ";
            // line 118
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
                // line 119
                echo "                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 119);
                echo "\"";
                if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 119) == twig_get_attribute($this->env, $this->source, $context["product_special"], "customer_group_id", [], "any", false, false, false, 119))) {
                    echo " selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 119);
                echo "</option>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            echo "                </select></td>
              <td class=\"text-end\"><input type=\"text\" name=\"product_special[";
            // line 122
            echo ($context["special_row"] ?? null);
            echo "][priority]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_special"], "priority", [], "any", false, false, false, 122);
            echo "\" placeholder=\"";
            echo ($context["entry_priority"] ?? null);
            echo "\" class=\"form-control\"/></td>
              <td class=\"text-end\"><input type=\"text\" name=\"product_special[";
            // line 123
            echo ($context["special_row"] ?? null);
            echo "][price]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_special"], "price", [], "any", false, false, false, 123);
            echo "\" placeholder=\"";
            echo ($context["entry_price"] ?? null);
            echo "\" class=\"form-control\"/></td>
              <td class=\"text-end\">
                
               
           <select class=\"form-select\" name=\"product_special[";
            // line 127
            echo ($context["special_row"] ?? null);
            echo "][apply]\">
            <option value=\"0\" ";
            // line 128
            if ((twig_get_attribute($this->env, $this->source, $context["product_special"], "apply", [], "any", false, false, false, 128) == 0)) {
                echo "selected";
            }
            echo ">";
            echo ($context["option_product_price"] ?? null);
            echo "</option>
            <option value=\"1\" ";
            // line 129
            if ((twig_get_attribute($this->env, $this->source, $context["product_special"], "apply", [], "any", false, false, false, 129) == 1)) {
                echo "selected";
            }
            echo ">";
            echo ($context["option_end_price"] ?? null);
            echo "</option>
      

           </select>
           </td>
           <td class=\"text-end\">
            <select class=\"form-select\" name=\"product_special[";
            // line 135
            echo ($context["special_row"] ?? null);
            echo "][type]\">
              <option value=\"0\" ";
            // line 136
            if ((twig_get_attribute($this->env, $this->source, $context["product_special"], "type", [], "any", false, false, false, 136) == 0)) {
                echo "selected";
            }
            echo ">";
            echo ($context["option_price"] ?? null);
            echo "</option>
              <option value=\"1\" ";
            // line 137
            if ((twig_get_attribute($this->env, $this->source, $context["product_special"], "type", [], "any", false, false, false, 137) == 1)) {
                echo "selected";
            }
            echo ">";
            echo ($context["option_percentage"] ?? null);
            echo "</option>

             </select>

            </td>
           
           
                <td class=\"text-start\">
                <div class=\"input-group\">
                  <input type=\"text\" name=\"product_special[";
            // line 146
            echo ($context["special_row"] ?? null);
            echo "][date_start]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_special"], "date_start", [], "any", false, false, false, 146);
            echo "\" placeholder=\"";
            echo ($context["entry_date_start"] ?? null);
            echo "\" class=\"form-control date\"/>
                  <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                </div>
              </td>
              <td class=\"text-start\">
                <div class=\"input-group\">
                  <input type=\"text\" name=\"product_special[";
            // line 152
            echo ($context["special_row"] ?? null);
            echo "][date_end]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_special"], "date_end", [], "any", false, false, false, 152);
            echo "\" placeholder=\"";
            echo ($context["entry_date_end"] ?? null);
            echo "\" class=\"form-control date\"/>
                  <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                </div>
              </td>
              <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#special-row-";
            // line 156
            echo ($context["special_row"] ?? null);
            echo "').remove();\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_remove"] ?? null);
            echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
            </tr>
            ";
            // line 158
            $context["special_row"] = (($context["special_row"] ?? null) + 1);
            // line 159
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_special'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 160
        echo "        </tbody>
        <tfoot>
          <tr>
            <td colspan=\"7\"></td>
            <td class=\"text-end\"><button type=\"button\" id=\"button-special\" data-bs-toggle=\"tooltip\" title=\"";
        // line 164
        echo ($context["button_special_add"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
          </tr>
        </tfoot>
      </table>
    </div>
 
    <script>
        
        var discount_row = ";
        // line 172
        echo ($context["discount_row"] ?? null);
        echo ";

\$('#button-discount').on('click', function () {
    html = '<tr id=\"discount-row-' + discount_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"product_discount[' + discount_row + '][customer_group_id]\" class=\"form-select\">';
  ";
        // line 177
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 178
            echo "    html += '    <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 178);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 178), "js");
            echo "</option>';
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 180
        echo "    html += '  </select><input type=\"hidden\" name=\"product_discount[' + discount_row + '][product_discount_id]\" value=\"\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_discount[' + discount_row + '][quantity]\" value=\"\" placeholder=\"";
        // line 181
        echo twig_escape_filter($this->env, ($context["entry_quantity"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_discount[' + discount_row + '][priority]\" value=\"\" placeholder=\"";
        // line 182
        echo twig_escape_filter($this->env, ($context["entry_priority"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_discount[' + discount_row + '][price]\" value=\"\" placeholder=\"";
        // line 183
        echo twig_escape_filter($this->env, ($context["entry_price"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_discount[' + discount_row + '][date_start]\" value=\"\" placeholder=\"";
        // line 184
        echo twig_escape_filter($this->env, ($context["entry_date_start"] ?? null), "js");
        echo "\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_discount[' + discount_row + '][date_end]\" value=\"\" placeholder=\"";
        // line 185
        echo twig_escape_filter($this->env, ($context["entry_date_end"] ?? null), "js");
        echo "\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#discount-row-' + discount_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"";
        // line 186
        echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-discount tbody').append(html);

    discount_row++;
});

var special_row = ";
        // line 194
        echo ($context["special_row"] ?? null);
        echo ";

\$('#button-special').on('click', function () {
    html = '<tr id=\"special-row-' + special_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"product_special[' + special_row + '][customer_group_id]\" class=\"form-select\">';
  ";
        // line 199
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 200
            echo "    html += '      <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 200);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 200), "js");
            echo "</option>';
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 202
        echo "    html += '  </select><input type=\"hidden\" name=\"product_special[' + special_row + '][product_special_id]\" value=\"\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_special[' + special_row + '][priority]\" value=\"\" placeholder=\"";
        // line 203
        echo twig_escape_filter($this->env, ($context["entry_priority"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_special[' + special_row + '][price]\" value=\"\" placeholder=\"";
        // line 204
        echo twig_escape_filter($this->env, ($context["entry_price"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
  
    html += '  </select></td>';
    html += '  <td class=\"text-end\"><select name=\"product_special[' + special_row + '][apply]\" class=\"form-select\">';
    html += '      <option value=\"0\">";
        // line 208
        echo ($context["option_product_price"] ?? null);
        echo "</option>';
    html += '      <option value=\"1\">";
        // line 209
        echo ($context["option_end_price"] ?? null);
        echo "</option>';
    html += '  </select></td>';

    // New select for \"type\"
    html += '  <td class=\"text-end\"><select name=\"product_special[' + special_row + '][type]\" class=\"form-select\">';
    html += '      <option value=\"0\">";
        // line 214
        echo ($context["option_price"] ?? null);
        echo "</option>';
    html += '      <option value=\"1\">";
        // line 215
        echo ($context["option_percentage"] ?? null);
        echo "</option>';
    html += '  </select></td>';
  
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_special[' + special_row + '][date_start]\" value=\"\" placeholder=\"";
        // line 218
        echo twig_escape_filter($this->env, ($context["entry_date_start"] ?? null), "js");
        echo "\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_special[' + special_row + '][date_end]\" value=\"\" placeholder=\"";
        // line 219
        echo twig_escape_filter($this->env, ($context["entry_date_end"] ?? null), "js");
        echo "\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#special-row-' + special_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"";
        // line 220
        echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-special tbody').append(html);

    special_row++;
});


        </script>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/catalog/product_tabs/pricing_tab.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  611 => 220,  607 => 219,  603 => 218,  597 => 215,  593 => 214,  585 => 209,  581 => 208,  574 => 204,  570 => 203,  567 => 202,  556 => 200,  552 => 199,  544 => 194,  533 => 186,  529 => 185,  525 => 184,  521 => 183,  517 => 182,  513 => 181,  510 => 180,  499 => 178,  495 => 177,  487 => 172,  476 => 164,  470 => 160,  464 => 159,  462 => 158,  455 => 156,  444 => 152,  431 => 146,  415 => 137,  407 => 136,  403 => 135,  390 => 129,  382 => 128,  378 => 127,  367 => 123,  359 => 122,  356 => 121,  341 => 119,  337 => 118,  333 => 117,  328 => 116,  323 => 115,  321 => 114,  308 => 104,  304 => 103,  300 => 102,  296 => 101,  292 => 100,  288 => 99,  284 => 98,  276 => 93,  267 => 87,  261 => 83,  255 => 82,  253 => 81,  246 => 79,  235 => 75,  222 => 69,  212 => 66,  204 => 65,  196 => 64,  193 => 63,  178 => 61,  174 => 60,  170 => 59,  165 => 58,  160 => 57,  158 => 56,  150 => 51,  146 => 50,  142 => 49,  138 => 48,  134 => 47,  130 => 46,  122 => 41,  112 => 33,  97 => 31,  93 => 30,  89 => 29,  82 => 25,  70 => 18,  64 => 15,  53 => 9,  47 => 6,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source(" 

    <fieldset>
      <legend>{{ text_price }}</legend>
      <div class=\"row mb-3\">
        <label for=\"input-price\" class=\"col-sm-2 col-form-label\">{{ entry_price }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"price\" value=\"{{ price }}\" placeholder=\"{{ entry_price }}\" id=\"input-price\" class=\"form-control\"/>
      
          </div>
        </div>
      </div>
      <div class=\"row mb-3\">
        <label for=\"input-price\" class=\"col-sm-2 col-form-label\">{{entry_supply_cost}}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <input type=\"text\" name=\"supply_cost\" value=\"{{ supply_cost }}\" placeholder=\"{{ supply_cost }}\" id=\"input-supply-cost\" class=\"form-control\"/>
      
          </div>
        </div>
      </div>

      <div class=\"row mb-3\">
        <label for=\"input-tax-class\" class=\"col-sm-2 col-form-label\">{{ entry_tax_class }}</label>
        <div class=\"col-sm-10\">
          <div class=\"input-group\">
            <select name=\"tax_class_id\" id=\"input-tax-class\" class=\"form-select\">
              <option value=\"0\">{{ text_none }}</option>
              {% for tax_class in tax_classes %}
                <option value=\"{{ tax_class.tax_class_id }}\"{% if tax_class.tax_class_id == tax_class_id %} selected{% endif %}>{{ tax_class.title }}</option>
              {% endfor %}
            </select>
      
          </div>
        </div>
      </div>
    </fieldset>
    <fieldset>

    <h4>{{text_quantity_discount}}</h4>
    <div class=\"table-responsive\">
      <table id=\"product-discount\" class=\"table table-bordered table-hover\">
        <thead>
          <tr>
            <td class=\"text-start\">{{ entry_customer_group }}</td>
            <td class=\"text-end\">{{ entry_quantity }}</td>
            <td class=\"text-end\">{{ entry_priority }}</td>
            <td class=\"text-end\">{{ entry_price }}</td>
            <td class=\"text-start\">{{ entry_date_start }}</td>
            <td class=\"text-start\">{{ entry_date_end }}</td>
            <td class=\"text-end\"> </td>
          </tr>
        </thead>
        <tbody>
          {% set discount_row = 0 %}
          {% for product_discount in product_discounts %}
            <tr id=\"discount-row-{{ discount_row }}\">
              <td class=\"text-start\"><select name=\"product_discount[{{ discount_row }}][customer_group_id]\" class=\"form-select\">
                  {% for customer_group in customer_groups %}
                    <option value=\"{{ customer_group.customer_group_id }}\"{% if customer_group.customer_group_id == product_discount.customer_group_id %} selected{% endif %}>{{ customer_group.name }}</option>
                  {% endfor %}
                </select></td>
              <td class=\"text-end\"><input type=\"text\" name=\"product_discount[{{ discount_row }}][quantity]\" value=\"{{ product_discount.quantity }}\" placeholder=\"{{ entry_quantity }}\" class=\"form-control\"/></td>
              <td class=\"text-end\"><input type=\"text\" name=\"product_discount[{{ discount_row }}][priority]\" value=\"{{ product_discount.priority }}\" placeholder=\"{{ entry_priority }}\" class=\"form-control\"/></td>
              <td class=\"text-end\"><input type=\"text\" name=\"product_discount[{{ discount_row }}][price]\" value=\"{{ product_discount.price }}\" placeholder=\"{{ entry_price }}\" class=\"form-control\"/></td>
              <td class=\"text-start\">
                <div class=\"input-group\">
                  <input type=\"text\" name=\"product_discount[{{ discount_row }}][date_start]\" value=\"{{ product_discount.date_start }}\" placeholder=\"{{ entry_date_start }}\" class=\"form-control date\"/>
                  <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                </div>
              </td>
              <td class=\"text-start\">
                <div class=\"input-group\">
                  <input type=\"text\" name=\"product_discount[{{ discount_row }}][date_end]\" value=\"{{ product_discount.date_end }}\" placeholder=\"{{ entry_date_end }}\" class=\"form-control date\"/>
                  <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                </div>
              </td>
              <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#discount-row-{{ discount_row }}').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
            </tr>
            {% set discount_row = discount_row + 1 %}
          {% endfor %}
        </tbody>
        <tfoot>
          <tr>
            <td colspan=\"6\"></td>
            <td class=\"text-end\"><button type=\"button\" id=\"button-discount\" data-bs-toggle=\"tooltip\" title=\"{{ button_discount_add }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
          </tr>
        </tfoot>
      </table>
    </div>
<hr/>
<h4>{{text_discount}}</h4>
              <div class=\"table-responsive\">
      <table id=\"product-special\" class=\"table table-bordered table-hover\">
        <thead>
          <tr>
            <td class=\"text-start\">{{ entry_customer_group }}</td>
            <td class=\"text-end\">{{ entry_priority }}</td>
            <td class=\"text-end\">{{ entry_value }}</td>
            <td class=\"text-end\">{{entry_applies}} </td>
            <td class=\"text-end\">{{entry_type}} </td>
            <td class=\"text-start\">{{ entry_date_start }}</td>
            <td class=\"text-start\">{{ entry_date_end }}</td>
            <td class=\"text-center\">
              
         
            
            
            </td>
          </tr>
        </thead>
        <tbody>
          {% set special_row = 0 %}
          {% for product_special in product_specials %}
            <tr id=\"special-row-{{ special_row }}\">
              <td class=\"text-start\"><select name=\"product_special[{{ special_row }}][customer_group_id]\" class=\"form-select\">
                  {% for customer_group in customer_groups %}
                    <option value=\"{{ customer_group.customer_group_id }}\"{% if customer_group.customer_group_id == product_special.customer_group_id %} selected{% endif %}>{{ customer_group.name }}</option>
                  {% endfor %}
                </select></td>
              <td class=\"text-end\"><input type=\"text\" name=\"product_special[{{ special_row }}][priority]\" value=\"{{ product_special.priority }}\" placeholder=\"{{ entry_priority }}\" class=\"form-control\"/></td>
              <td class=\"text-end\"><input type=\"text\" name=\"product_special[{{ special_row }}][price]\" value=\"{{ product_special.price }}\" placeholder=\"{{ entry_price }}\" class=\"form-control\"/></td>
              <td class=\"text-end\">
                
               
           <select class=\"form-select\" name=\"product_special[{{ special_row }}][apply]\">
            <option value=\"0\" {% if product_special.apply == 0 %}selected{% endif %}>{{option_product_price}}</option>
            <option value=\"1\" {% if product_special.apply == 1 %}selected{% endif %}>{{option_end_price}}</option>
      

           </select>
           </td>
           <td class=\"text-end\">
            <select class=\"form-select\" name=\"product_special[{{ special_row }}][type]\">
              <option value=\"0\" {% if product_special.type == 0 %}selected{% endif %}>{{option_price}}</option>
              <option value=\"1\" {% if product_special.type == 1 %}selected{% endif %}>{{option_percentage}}</option>

             </select>

            </td>
           
           
                <td class=\"text-start\">
                <div class=\"input-group\">
                  <input type=\"text\" name=\"product_special[{{ special_row }}][date_start]\" value=\"{{ product_special.date_start }}\" placeholder=\"{{ entry_date_start }}\" class=\"form-control date\"/>
                  <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                </div>
              </td>
              <td class=\"text-start\">
                <div class=\"input-group\">
                  <input type=\"text\" name=\"product_special[{{ special_row }}][date_end]\" value=\"{{ product_special.date_end }}\" placeholder=\"{{ entry_date_end }}\" class=\"form-control date\"/>
                  <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                </div>
              </td>
              <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#special-row-{{ special_row }}').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
            </tr>
            {% set special_row = special_row + 1 %}
          {% endfor %}
        </tbody>
        <tfoot>
          <tr>
            <td colspan=\"7\"></td>
            <td class=\"text-end\"><button type=\"button\" id=\"button-special\" data-bs-toggle=\"tooltip\" title=\"{{ button_special_add }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
          </tr>
        </tfoot>
      </table>
    </div>
 
    <script>
        
        var discount_row = {{ discount_row }};

\$('#button-discount').on('click', function () {
    html = '<tr id=\"discount-row-' + discount_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"product_discount[' + discount_row + '][customer_group_id]\" class=\"form-select\">';
  {% for customer_group in customer_groups %}
    html += '    <option value=\"{{ customer_group.customer_group_id }}\">{{ customer_group.name|escape('js') }}</option>';
  {% endfor %}
    html += '  </select><input type=\"hidden\" name=\"product_discount[' + discount_row + '][product_discount_id]\" value=\"\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_discount[' + discount_row + '][quantity]\" value=\"\" placeholder=\"{{ entry_quantity|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_discount[' + discount_row + '][priority]\" value=\"\" placeholder=\"{{ entry_priority|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_discount[' + discount_row + '][price]\" value=\"\" placeholder=\"{{ entry_price|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_discount[' + discount_row + '][date_start]\" value=\"\" placeholder=\"{{ entry_date_start|escape('js') }}\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_discount[' + discount_row + '][date_end]\" value=\"\" placeholder=\"{{ entry_date_end|escape('js') }}\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#discount-row-' + discount_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-discount tbody').append(html);

    discount_row++;
});

var special_row = {{ special_row }};

\$('#button-special').on('click', function () {
    html = '<tr id=\"special-row-' + special_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"product_special[' + special_row + '][customer_group_id]\" class=\"form-select\">';
  {% for customer_group in customer_groups %}
    html += '      <option value=\"{{ customer_group.customer_group_id }}\">{{ customer_group.name|escape('js') }}</option>';
  {% endfor %}
    html += '  </select><input type=\"hidden\" name=\"product_special[' + special_row + '][product_special_id]\" value=\"\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_special[' + special_row + '][priority]\" value=\"\" placeholder=\"{{ entry_priority|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_special[' + special_row + '][price]\" value=\"\" placeholder=\"{{ entry_price|escape('js') }}\" class=\"form-control\"/></td>';
  
    html += '  </select></td>';
    html += '  <td class=\"text-end\"><select name=\"product_special[' + special_row + '][apply]\" class=\"form-select\">';
    html += '      <option value=\"0\">{{option_product_price}}</option>';
    html += '      <option value=\"1\">{{option_end_price}}</option>';
    html += '  </select></td>';

    // New select for \"type\"
    html += '  <td class=\"text-end\"><select name=\"product_special[' + special_row + '][type]\" class=\"form-select\">';
    html += '      <option value=\"0\">{{option_price}}</option>';
    html += '      <option value=\"1\">{{option_percentage}}</option>';
    html += '  </select></td>';
  
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_special[' + special_row + '][date_start]\" value=\"\" placeholder=\"{{ entry_date_start|escape('js') }}\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-start\"><div class=\"input-group\"><input type=\"text\" name=\"product_special[' + special_row + '][date_end]\" value=\"\" placeholder=\"{{ entry_date_end|escape('js') }}\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#special-row-' + special_row + '\\').remove();\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-special tbody').append(html);

    special_row++;
});


        </script>", "cp-akis/view//plates/catalog/product_tabs/pricing_tab.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/catalog/product_tabs/pricing_tab.twig");
    }
}
