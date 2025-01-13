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

/* cp-akis/view//plates/catalog/product_tabs/subscription_tab.twig */
class __TwigTemplate_fdc8345ec4cb8c4ce9f0e29245e51b00 extends Template
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
 
    <div class=\"table-responsive\">
      <table id=\"product-subscription\" class=\"table table-bordered table-hover\">
        <thead>
          <tr>
            <td class=\"text-start\">";
        // line 7
        echo ($context["entry_subscription"] ?? null);
        echo "</td>
            <td class=\"text-start\">";
        // line 8
        echo ($context["entry_customer_group"] ?? null);
        echo "</td>
            <td class=\"text-start\">";
        // line 9
        echo ($context["entry_trial_price"] ?? null);
        echo "</td>
            <td class=\"text-start\">";
        // line 10
        echo ($context["entry_price"] ?? null);
        echo "</td>
            <td>
        
            </td>
          </tr>
        </thead>
        <tbody>
          ";
        // line 17
        $context["subscription_row"] = 0;
        // line 18
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_subscriptions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product_subscription"]) {
            // line 19
            echo "            <tr id=\"subscription-row-";
            echo ($context["subscription_row"] ?? null);
            echo "\">
              <td class=\"text-start\"><select name=\"product_subscription[";
            // line 20
            echo ($context["subscription_row"] ?? null);
            echo "][subscription_plan_id]\" class=\"form-select\">
                  ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["subscription_plans"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["subscription_plan"]) {
                // line 22
                echo "                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["subscription_plan"], "subscription_plan_id", [], "any", false, false, false, 22);
                echo "\"";
                if ((twig_get_attribute($this->env, $this->source, $context["subscription_plan"], "subscription_plan_id", [], "any", false, false, false, 22) == twig_get_attribute($this->env, $this->source, $context["product_subscription"], "subscription_plan_id", [], "any", false, false, false, 22))) {
                    echo " selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["subscription_plan"], "name", [], "any", false, false, false, 22);
                echo "</option>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription_plan'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "                </select></td>
              <td class=\"text-start\"><select name=\"product_subscription[";
            // line 25
            echo ($context["subscription_row"] ?? null);
            echo "][customer_group_id]\" class=\"form-select\">
                  ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
                // line 27
                echo "                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 27);
                echo "\"";
                if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 27) == twig_get_attribute($this->env, $this->source, $context["product_subscription"], "customer_group_id", [], "any", false, false, false, 27))) {
                    echo " selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 27);
                echo "</option>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "                </select></td>
              <td class=\"text-start\"><input type=\"text\" name=\"product_subscription[";
            // line 30
            echo ($context["subscription_row"] ?? null);
            echo "][trial_price]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_subscription"], "trial_price", [], "any", false, false, false, 30);
            echo "\" placeholder=\"";
            echo ($context["entry_trial_price"] ?? null);
            echo "\" class=\"form-control\"/></td>
              <td class=\"text-start\"><input type=\"text\" name=\"product_subscription[";
            // line 31
            echo ($context["subscription_row"] ?? null);
            echo "][price]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product_subscription"], "price", [], "any", false, false, false, 31);
            echo "\" placeholder=\"";
            echo ($context["entry_price"] ?? null);
            echo "\" class=\"form-control\"/></td>
              <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#subscription-row-";
            // line 32
            echo ($context["subscription_row"] ?? null);
            echo "').remove()\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_remove"] ?? null);
            echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
            </tr>
            ";
            // line 34
            $context["subscription_row"] = (($context["subscription_row"] ?? null) + 1);
            // line 35
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_subscription'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "        </tbody>
        <tfoot>
          <tr>
            <td colspan=\"4\"></td>
            <td class=\"text-end\"><button type=\"button\" id=\"button-subscription\" data-bs-toggle=\"tooltip\" title=\"";
        // line 40
        echo ($context["button_subscription_add"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
          </tr>
        </tfoot>
      </table>
    </div>
 <script>
    var subscription_row = ";
        // line 46
        echo ($context["subscription_row"] ?? null);
        echo ";

\$('#button-subscription').on('click', function () {
    html = '<tr id=\"subscription-row-' + subscription_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"product_subscription[' + subscription_row + '][subscription_plan_id]\" class=\"form-select\">';
  ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subscription_plans"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["subscription_plan"]) {
            // line 52
            echo "    html += '      <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_plan"], "subscription_plan_id", [], "any", false, false, false, 52);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["subscription_plan"], "name", [], "any", false, false, false, 52), "js");
            echo "</option>';
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription_plan'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "    html += '  </select></td>';
    html += '  <td class=\"text-start\"><select name=\"product_subscription[' + subscription_row + '][customer_group_id]\" class=\"form-select\">';
  ";
        // line 56
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 57
            echo "    html += '      <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 57);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 57), "js");
            echo "</option>';
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "    html += '  <select></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_subscription[' + subscription_row + '][trial_price]\" value=\"\" placeholder=\"";
        // line 60
        echo twig_escape_filter($this->env, ($context["entry_trial_price"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_subscription[' + subscription_row + '][price]\" value=\"\" placeholder=\"";
        // line 61
        echo twig_escape_filter($this->env, ($context["entry_price"] ?? null), "js");
        echo "\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#subscription-row-' + subscription_row + '\\').remove()\" data-bs-toggle=\"tooltip\" title=\"";
        // line 62
        echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-subscription tbody').append(html);

    subscription_row++;
});

    
    
    </script>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/catalog/product_tabs/subscription_tab.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  230 => 62,  226 => 61,  222 => 60,  219 => 59,  208 => 57,  204 => 56,  200 => 54,  189 => 52,  185 => 51,  177 => 46,  168 => 40,  162 => 36,  156 => 35,  154 => 34,  147 => 32,  139 => 31,  131 => 30,  128 => 29,  113 => 27,  109 => 26,  105 => 25,  102 => 24,  87 => 22,  83 => 21,  79 => 20,  74 => 19,  69 => 18,  67 => 17,  57 => 10,  53 => 9,  49 => 8,  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
 
    <div class=\"table-responsive\">
      <table id=\"product-subscription\" class=\"table table-bordered table-hover\">
        <thead>
          <tr>
            <td class=\"text-start\">{{ entry_subscription }}</td>
            <td class=\"text-start\">{{ entry_customer_group }}</td>
            <td class=\"text-start\">{{ entry_trial_price }}</td>
            <td class=\"text-start\">{{ entry_price }}</td>
            <td>
        
            </td>
          </tr>
        </thead>
        <tbody>
          {% set subscription_row = 0 %}
          {% for product_subscription in product_subscriptions %}
            <tr id=\"subscription-row-{{ subscription_row }}\">
              <td class=\"text-start\"><select name=\"product_subscription[{{ subscription_row }}][subscription_plan_id]\" class=\"form-select\">
                  {% for subscription_plan in subscription_plans %}
                    <option value=\"{{ subscription_plan.subscription_plan_id }}\"{% if subscription_plan.subscription_plan_id == product_subscription.subscription_plan_id %} selected{% endif %}>{{ subscription_plan.name }}</option>
                  {% endfor %}
                </select></td>
              <td class=\"text-start\"><select name=\"product_subscription[{{ subscription_row }}][customer_group_id]\" class=\"form-select\">
                  {% for customer_group in customer_groups %}
                    <option value=\"{{ customer_group.customer_group_id }}\"{% if customer_group.customer_group_id == product_subscription.customer_group_id %} selected{% endif %}>{{ customer_group.name }}</option>
                  {% endfor %}
                </select></td>
              <td class=\"text-start\"><input type=\"text\" name=\"product_subscription[{{ subscription_row }}][trial_price]\" value=\"{{ product_subscription.trial_price }}\" placeholder=\"{{ entry_trial_price }}\" class=\"form-control\"/></td>
              <td class=\"text-start\"><input type=\"text\" name=\"product_subscription[{{ subscription_row }}][price]\" value=\"{{ product_subscription.price }}\" placeholder=\"{{ entry_price }}\" class=\"form-control\"/></td>
              <td class=\"text-end\"><button type=\"button\" onclick=\"\$('#subscription-row-{{ subscription_row }}').remove()\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>
            </tr>
            {% set subscription_row = subscription_row + 1 %}
          {% endfor %}
        </tbody>
        <tfoot>
          <tr>
            <td colspan=\"4\"></td>
            <td class=\"text-end\"><button type=\"button\" id=\"button-subscription\" data-bs-toggle=\"tooltip\" title=\"{{ button_subscription_add }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
          </tr>
        </tfoot>
      </table>
    </div>
 <script>
    var subscription_row = {{ subscription_row }};

\$('#button-subscription').on('click', function () {
    html = '<tr id=\"subscription-row-' + subscription_row + '\">';
    html += '  <td class=\"text-start\"><select name=\"product_subscription[' + subscription_row + '][subscription_plan_id]\" class=\"form-select\">';
  {% for subscription_plan in subscription_plans %}
    html += '      <option value=\"{{ subscription_plan.subscription_plan_id }}\">{{ subscription_plan.name|escape('js') }}</option>';
  {% endfor %}
    html += '  </select></td>';
    html += '  <td class=\"text-start\"><select name=\"product_subscription[' + subscription_row + '][customer_group_id]\" class=\"form-select\">';
  {% for customer_group in customer_groups %}
    html += '      <option value=\"{{ customer_group.customer_group_id }}\">{{ customer_group.name|escape('js') }}</option>';
  {% endfor %}
    html += '  <select></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_subscription[' + subscription_row + '][trial_price]\" value=\"\" placeholder=\"{{ entry_trial_price|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><input type=\"text\" name=\"product_subscription[' + subscription_row + '][price]\" value=\"\" placeholder=\"{{ entry_price|escape('js') }}\" class=\"form-control\"/></td>';
    html += '  <td class=\"text-end\"><button type=\"button\" onclick=\"\$(\\'#subscription-row-' + subscription_row + '\\').remove()\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
    html += '</tr>';

    \$('#product-subscription tbody').append(html);

    subscription_row++;
});

    
    
    </script>", "cp-akis/view//plates/catalog/product_tabs/subscription_tab.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/catalog/product_tabs/subscription_tab.twig");
    }
}
