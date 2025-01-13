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

/* cp-akis/view/default/plates/extension/ventocart/report/customer_activity_list.twig */
class __TwigTemplate_3d18d7ec01e1e4fcdd85beeb10306edf extends Template
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
        echo "<div class=\"table-responsive\">
  <table class=\"table table-bordered\">
    <thead>
      <tr>
        <td class=\"text-start\">";
        // line 5
        echo ($context["column_comment"] ?? null);
        echo "</td>
        <td class=\"text-start\">";
        // line 6
        echo ($context["column_ip"] ?? null);
        echo "</td>
        <td class=\"text-start\">";
        // line 7
        echo ($context["column_date_added"] ?? null);
        echo "</td>
      </tr>
    </thead>
    <tbody>
      ";
        // line 11
        if (($context["activities"] ?? null)) {
            // line 12
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["activities"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["activity"]) {
                // line 13
                echo "          <tr>
            <td class=\"text-start\">";
                // line 14
                echo twig_get_attribute($this->env, $this->source, $context["activity"], "comment", [], "any", false, false, false, 14);
                echo "</td>
            <td class=\"text-start\">";
                // line 15
                echo twig_get_attribute($this->env, $this->source, $context["activity"], "ip", [], "any", false, false, false, 15);
                echo "</td>
            <td class=\"text-start\">";
                // line 16
                echo twig_get_attribute($this->env, $this->source, $context["activity"], "date_added", [], "any", false, false, false, 16);
                echo "</td>
          </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['activity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "      ";
        } else {
            // line 20
            echo "        <tr>
          <td class=\"text-center\" colspan=\"3\">";
            // line 21
            echo ($context["text_no_results"] ?? null);
            echo "</td>
        </tr>
      ";
        }
        // line 24
        echo "    </tbody>
  </table>
</div>
<div class=\"row\">
  <div class=\"col-sm-6 text-start\">";
        // line 28
        echo ($context["pagination"] ?? null);
        echo "</div>
  <div class=\"col-sm-6 text-end\">";
        // line 29
        echo ($context["results"] ?? null);
        echo "</div>
</div>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/extension/ventocart/report/customer_activity_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 29,  103 => 28,  97 => 24,  91 => 21,  88 => 20,  85 => 19,  76 => 16,  72 => 15,  68 => 14,  65 => 13,  60 => 12,  58 => 11,  51 => 7,  47 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"table-responsive\">
  <table class=\"table table-bordered\">
    <thead>
      <tr>
        <td class=\"text-start\">{{ column_comment }}</td>
        <td class=\"text-start\">{{ column_ip }}</td>
        <td class=\"text-start\">{{ column_date_added }}</td>
      </tr>
    </thead>
    <tbody>
      {% if activities %}
        {% for activity in activities %}
          <tr>
            <td class=\"text-start\">{{ activity.comment }}</td>
            <td class=\"text-start\">{{ activity.ip }}</td>
            <td class=\"text-start\">{{ activity.date_added }}</td>
          </tr>
        {% endfor %}
      {% else %}
        <tr>
          <td class=\"text-center\" colspan=\"3\">{{ text_no_results }}</td>
        </tr>
      {% endif %}
    </tbody>
  </table>
</div>
<div class=\"row\">
  <div class=\"col-sm-6 text-start\">{{ pagination }}</div>
  <div class=\"col-sm-6 text-end\">{{ results }}</div>
</div>", "cp-akis/view/default/plates/extension/ventocart/report/customer_activity_list.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/extension/ventocart/report/customer_activity_list.twig");
    }
}
