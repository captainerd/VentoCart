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

/* cp-akis/view/default/plates/extension/ventocart/dashboard/recent_info.twig */
class __TwigTemplate_7aff4fbbe75ff59a434b37c3f89caf9e extends Template
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
        echo "<div class=\"card mb-3\">
  <div class=\"card-header\"><i class=\"fa-solid fa-shopping-cart\"></i> ";
        // line 2
        echo ($context["heading_title"] ?? null);
        echo "</div>
  <div class=\"table-responsive\">
    <table class=\"table\">
      <thead>
        <tr>
          <td class=\"text-end\">";
        // line 7
        echo ($context["column_order_id"] ?? null);
        echo "</td>
          <td>";
        // line 8
        echo ($context["column_customer"] ?? null);
        echo "</td>
          <td>";
        // line 9
        echo ($context["column_status"] ?? null);
        echo "</td>
          <td>";
        // line 10
        echo ($context["column_date_added"] ?? null);
        echo "</td>
          <td class=\"text-end\">";
        // line 11
        echo ($context["column_total"] ?? null);
        echo "</td>
          <td class=\"text-end\">";
        // line 12
        echo ($context["column_action"] ?? null);
        echo "</td>
        </tr>
      </thead>
      <tbody>
        ";
        // line 16
        if (($context["orders"] ?? null)) {
            // line 17
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 18
                echo "            <tr>
              <td class=\"text-end\">";
                // line 19
                echo twig_get_attribute($this->env, $this->source, $context["order"], "order_id", [], "any", false, false, false, 19);
                echo "</td>
              <td>";
                // line 20
                echo twig_get_attribute($this->env, $this->source, $context["order"], "customer", [], "any", false, false, false, 20);
                echo "</td>
              <td>";
                // line 21
                echo twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 21);
                echo "</td>
              <td>";
                // line 22
                echo twig_get_attribute($this->env, $this->source, $context["order"], "date_added", [], "any", false, false, false, 22);
                echo "</td>
              <td class=\"text-end\">";
                // line 23
                echo twig_get_attribute($this->env, $this->source, $context["order"], "total", [], "any", false, false, false, 23);
                echo "</td>
              <td class=\"text-end\"><a href=\"";
                // line 24
                echo twig_get_attribute($this->env, $this->source, $context["order"], "view", [], "any", false, false, false, 24);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_view"] ?? null);
                echo "\" class=\"btn btn-info\"><i class=\"fa-solid fa-eye\"></i></a></td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "        ";
        } else {
            // line 28
            echo "          <tr>
            <td class=\"text-center\" colspan=\"6\">";
            // line 29
            echo ($context["text_no_results"] ?? null);
            echo "</td>
          </tr>
        ";
        }
        // line 32
        echo "      </tbody>
    </table>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/extension/ventocart/dashboard/recent_info.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 32,  122 => 29,  119 => 28,  116 => 27,  105 => 24,  101 => 23,  97 => 22,  93 => 21,  89 => 20,  85 => 19,  82 => 18,  77 => 17,  75 => 16,  68 => 12,  64 => 11,  60 => 10,  56 => 9,  52 => 8,  48 => 7,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"card mb-3\">
  <div class=\"card-header\"><i class=\"fa-solid fa-shopping-cart\"></i> {{ heading_title }}</div>
  <div class=\"table-responsive\">
    <table class=\"table\">
      <thead>
        <tr>
          <td class=\"text-end\">{{ column_order_id }}</td>
          <td>{{ column_customer }}</td>
          <td>{{ column_status }}</td>
          <td>{{ column_date_added }}</td>
          <td class=\"text-end\">{{ column_total }}</td>
          <td class=\"text-end\">{{ column_action }}</td>
        </tr>
      </thead>
      <tbody>
        {% if orders %}
          {% for order in orders %}
            <tr>
              <td class=\"text-end\">{{ order.order_id }}</td>
              <td>{{ order.customer }}</td>
              <td>{{ order.status }}</td>
              <td>{{ order.date_added }}</td>
              <td class=\"text-end\">{{ order.total }}</td>
              <td class=\"text-end\"><a href=\"{{ order.view }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_view }}\" class=\"btn btn-info\"><i class=\"fa-solid fa-eye\"></i></a></td>
            </tr>
          {% endfor %}
        {% else %}
          <tr>
            <td class=\"text-center\" colspan=\"6\">{{ text_no_results }}</td>
          </tr>
        {% endif %}
      </tbody>
    </table>
  </div>
</div>
", "cp-akis/view/default/plates/extension/ventocart/dashboard/recent_info.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/extension/ventocart/dashboard/recent_info.twig");
    }
}
