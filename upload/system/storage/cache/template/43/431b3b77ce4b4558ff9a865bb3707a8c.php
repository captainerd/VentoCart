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

/* admin/view/template/catalog/product_report.twig */
class __TwigTemplate_38657a7f83e8e5236b96a94c9b8df38a extends Template
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
  <table class=\"table table-bordered table-hover\">
    <thead>
      <tr>
        <td class=\"text-start\">";
        // line 5
        echo ($context["column_ip"] ?? null);
        echo "</td>
        <td class=\"text-start\">";
        // line 6
        echo ($context["column_store"] ?? null);
        echo "</td>
        <td class=\"text-start\">";
        // line 7
        echo ($context["column_country"] ?? null);
        echo "</td>
        <td class=\"text-start\">";
        // line 8
        echo ($context["column_date_added"] ?? null);
        echo "</td>
      </tr>
    </thead>
    <tbody>
      ";
        // line 12
        if (($context["reports"] ?? null)) {
            // line 13
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["reports"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
                // line 14
                echo "          <tr>
            <td class=\"text-start\"><a href=\"https://whatismyipaddress.com/ip/";
                // line 15
                echo twig_get_attribute($this->env, $this->source, $context["report"], "ip", [], "any", false, false, false, 15);
                echo "\" target=\"_blank\">";
                echo twig_get_attribute($this->env, $this->source, $context["report"], "ip", [], "any", false, false, false, 15);
                echo "</a></td>
            <td class=\"text-start\">";
                // line 16
                echo twig_get_attribute($this->env, $this->source, $context["report"], "store", [], "any", false, false, false, 16);
                echo "</td>
            <td class=\"text-start\">";
                // line 17
                echo twig_get_attribute($this->env, $this->source, $context["report"], "country", [], "any", false, false, false, 17);
                echo "</td>
            <td class=\"text-start\">";
                // line 18
                echo twig_get_attribute($this->env, $this->source, $context["report"], "date_added", [], "any", false, false, false, 18);
                echo "</td>
          </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['report'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "      ";
        } else {
            // line 22
            echo "        <tr>
          <td class=\"text-center\" colspan=\"4\">";
            // line 23
            echo ($context["text_no_results"] ?? null);
            echo "</td>
        </tr>
      ";
        }
        // line 26
        echo "    </tbody>
  </table>
</div>
<div class=\"row\">
  <div class=\"col-sm-6 text-start\">";
        // line 30
        echo ($context["pagination"] ?? null);
        echo "</div>
  <div class=\"col-sm-6 text-end\">";
        // line 31
        echo ($context["results"] ?? null);
        echo "</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin/view/template/catalog/product_report.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 31,  113 => 30,  107 => 26,  101 => 23,  98 => 22,  95 => 21,  86 => 18,  82 => 17,  78 => 16,  72 => 15,  69 => 14,  64 => 13,  62 => 12,  55 => 8,  51 => 7,  47 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"table-responsive\">
  <table class=\"table table-bordered table-hover\">
    <thead>
      <tr>
        <td class=\"text-start\">{{ column_ip }}</td>
        <td class=\"text-start\">{{ column_store }}</td>
        <td class=\"text-start\">{{ column_country }}</td>
        <td class=\"text-start\">{{ column_date_added }}</td>
      </tr>
    </thead>
    <tbody>
      {% if reports %}
        {% for report in reports %}
          <tr>
            <td class=\"text-start\"><a href=\"https://whatismyipaddress.com/ip/{{ report.ip }}\" target=\"_blank\">{{ report.ip }}</a></td>
            <td class=\"text-start\">{{ report.store }}</td>
            <td class=\"text-start\">{{ report.country }}</td>
            <td class=\"text-start\">{{ report.date_added }}</td>
          </tr>
        {% endfor %}
      {% else %}
        <tr>
          <td class=\"text-center\" colspan=\"4\">{{ text_no_results }}</td>
        </tr>
      {% endif %}
    </tbody>
  </table>
</div>
<div class=\"row\">
  <div class=\"col-sm-6 text-start\">{{ pagination }}</div>
  <div class=\"col-sm-6 text-end\">{{ results }}</div>
</div>
", "admin/view/template/catalog/product_report.twig", "/var/www/html/admin/view/template/catalog/product_report.twig");
    }
}
