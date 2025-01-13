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

/* cp-akis/view/template/sale/order_list.twig */
class __TwigTemplate_1a0ab1db3342a43dcee8693021459407 extends Template
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
        echo "<form id=\"form-order\" method=\"post\" enctype=\"application/x-www-form-urlencoded\" data-load=\"";
        echo ($context["action"] ?? null);
        echo "\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').trigger('click');\" class=\"form-check-input\"/></td>
          <td class=\"text-end\"><a href=\"";
        // line 7
        echo ($context["sort_order"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "o.order_id")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_order_id"] ?? null);
        echo "</a></td>
          <td class=\"text-start\"><a href=\"";
        // line 8
        echo ($context["sort_store_name"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "o.store_name")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_store"] ?? null);
        echo "</a></td>
          <td class=\"text-start\"><a href=\"";
        // line 9
        echo ($context["sort_customer"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "customer")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_customer"] ?? null);
        echo "</a></td>
          <td class=\"text-start\"><a href=\"";
        // line 10
        echo ($context["sort_status"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "order_status")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_status"] ?? null);
        echo "</a></td>
          <td class=\"text-end d-none d-lg-table-cell\"><a href=\"";
        // line 11
        echo ($context["sort_total"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "o.total")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_total"] ?? null);
        echo "</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"";
        // line 12
        echo ($context["sort_date_added"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "o.date_added")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_date_added"] ?? null);
        echo "</a></td>
          <td class=\"text-start d-none d-xl-table-cell\"><a href=\"";
        // line 13
        echo ($context["sort_date_modified"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "o.date_modified")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_date_modified"] ?? null);
        echo "</a></td>
          <td class=\"text-end\">";
        // line 14
        echo ($context["column_action"] ?? null);
        echo "</td>
        </tr>
      </thead>
      <tbody>
        ";
        // line 18
        if (($context["orders"] ?? null)) {
            // line 19
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 20
                echo "            <tr>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"";
                // line 21
                echo twig_get_attribute($this->env, $this->source, $context["order"], "order_id", [], "any", false, false, false, 21);
                echo "\" class=\"form-check-input\"/>
                <input type=\"hidden\" name=\"shipping_method[]\" value=\"";
                // line 22
                if (twig_get_attribute($this->env, $this->source, $context["order"], "shipping_method", [], "any", false, false, false, 22)) {
                    echo "1";
                    echo ($context["else"] ?? null);
                    echo "0";
                }
                echo "\"/></td>
              <td class=\"text-end\">";
                // line 23
                echo twig_get_attribute($this->env, $this->source, $context["order"], "order_id", [], "any", false, false, false, 23);
                echo "</td>
              <td class=\"text-start\">";
                // line 24
                echo twig_get_attribute($this->env, $this->source, $context["order"], "store_name", [], "any", false, false, false, 24);
                echo "</td>
              <td class=\"text-start\">";
                // line 25
                echo twig_get_attribute($this->env, $this->source, $context["order"], "customer", [], "any", false, false, false, 25);
                echo "</td>
              <td class=\"text-start\"><label>";
                // line 26
                echo twig_get_attribute($this->env, $this->source, $context["order"], "order_status", [], "any", false, false, false, 26);
                echo "</label></td>
              <td class=\"text-end d-none d-lg-table-cell\">";
                // line 27
                echo twig_get_attribute($this->env, $this->source, $context["order"], "total", [], "any", false, false, false, 27);
                echo "</td>
              <td class=\"text-start d-none d-lg-table-cell\">";
                // line 28
                echo twig_get_attribute($this->env, $this->source, $context["order"], "date_added", [], "any", false, false, false, 28);
                echo "</td>
              <td class=\"text-start d-none d-xl-table-cell\">";
                // line 29
                echo twig_get_attribute($this->env, $this->source, $context["order"], "date_modified", [], "any", false, false, false, 29);
                echo "</td>
              <td class=\"text-end\"><a href=\"";
                // line 30
                echo twig_get_attribute($this->env, $this->source, $context["order"], "view", [], "any", false, false, false, 30);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_view"] ?? null);
                echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-eye\"></i></a></td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "        ";
        } else {
            // line 34
            echo "          <tr>
            <td class=\"text-center\" colspan=\"9\">";
            // line 35
            echo ($context["text_no_results"] ?? null);
            echo "</td>
          </tr>
        ";
        }
        // line 38
        echo "      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">";
        // line 42
        echo ($context["pagination"] ?? null);
        echo "</div>
    <div class=\"col-sm-6 text-end\">";
        // line 43
        echo ($context["results"] ?? null);
        echo "</div>
  </div>
</form>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/template/sale/order_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  221 => 43,  217 => 42,  211 => 38,  205 => 35,  202 => 34,  199 => 33,  188 => 30,  184 => 29,  180 => 28,  176 => 27,  172 => 26,  168 => 25,  164 => 24,  160 => 23,  152 => 22,  148 => 21,  145 => 20,  140 => 19,  138 => 18,  131 => 14,  119 => 13,  107 => 12,  95 => 11,  83 => 10,  71 => 9,  59 => 8,  47 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form id=\"form-order\" method=\"post\" enctype=\"application/x-www-form-urlencoded\" data-load=\"{{ action }}\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').trigger('click');\" class=\"form-check-input\"/></td>
          <td class=\"text-end\"><a href=\"{{ sort_order }}\"{% if sort == 'o.order_id' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_order_id }}</a></td>
          <td class=\"text-start\"><a href=\"{{ sort_store_name }}\"{% if sort == 'o.store_name' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_store }}</a></td>
          <td class=\"text-start\"><a href=\"{{ sort_customer }}\"{% if sort == 'customer' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_customer }}</a></td>
          <td class=\"text-start\"><a href=\"{{ sort_status }}\"{% if sort == 'order_status' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_status }}</a></td>
          <td class=\"text-end d-none d-lg-table-cell\"><a href=\"{{ sort_total }}\"{% if sort == 'o.total' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_total }}</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"{{ sort_date_added }}\"{% if sort == 'o.date_added' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_date_added }}</a></td>
          <td class=\"text-start d-none d-xl-table-cell\"><a href=\"{{ sort_date_modified }}\"{% if sort == 'o.date_modified' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_date_modified }}</a></td>
          <td class=\"text-end\">{{ column_action }}</td>
        </tr>
      </thead>
      <tbody>
        {% if orders %}
          {% for order in orders %}
            <tr>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"{{ order.order_id }}\" class=\"form-check-input\"/>
                <input type=\"hidden\" name=\"shipping_method[]\" value=\"{% if order.shipping_method %}1{{ else }}0{% endif %}\"/></td>
              <td class=\"text-end\">{{ order.order_id }}</td>
              <td class=\"text-start\">{{ order.store_name }}</td>
              <td class=\"text-start\">{{ order.customer }}</td>
              <td class=\"text-start\"><label>{{ order.order_status }}</label></td>
              <td class=\"text-end d-none d-lg-table-cell\">{{ order.total }}</td>
              <td class=\"text-start d-none d-lg-table-cell\">{{ order.date_added }}</td>
              <td class=\"text-start d-none d-xl-table-cell\">{{ order.date_modified }}</td>
              <td class=\"text-end\"><a href=\"{{ order.view }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_view }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-eye\"></i></a></td>
            </tr>
          {% endfor %}
        {% else %}
          <tr>
            <td class=\"text-center\" colspan=\"9\">{{ text_no_results }}</td>
          </tr>
        {% endif %}
      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">{{ pagination }}</div>
    <div class=\"col-sm-6 text-end\">{{ results }}</div>
  </div>
</form>", "cp-akis/view/template/sale/order_list.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/template/sale/order_list.twig");
    }
}
