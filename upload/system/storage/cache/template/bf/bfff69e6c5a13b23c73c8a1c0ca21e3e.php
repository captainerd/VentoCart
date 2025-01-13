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

/* cp-akis/view/default/plates/report/statistics_list.twig */
class __TwigTemplate_9d475c6ed85752696766a250fb8b5764 extends Template
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
\t<table class=\"table table-bordered\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<td class=\"text-start\">";
        // line 5
        echo ($context["column_name"] ?? null);
        echo "</td>
\t\t\t\t<td class=\"text-end\">";
        // line 6
        echo ($context["column_value"] ?? null);
        echo "</td>
\t\t\t\t<td class=\"text-end\">";
        // line 7
        echo ($context["column_action"] ?? null);
        echo "</td>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t";
        // line 11
        if (($context["statistics"] ?? null)) {
            // line 12
            echo "\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["statistics"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["statistic"]) {
                // line 13
                echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-start\">";
                // line 14
                echo twig_get_attribute($this->env, $this->source, $context["statistic"], "name", [], "any", false, false, false, 14);
                echo "</td>
\t\t\t\t\t\t<td class=\"text-end\">";
                // line 15
                echo twig_get_attribute($this->env, $this->source, $context["statistic"], "value", [], "any", false, false, false, 15);
                echo "</td>
\t\t\t\t\t\t<td class=\"text-end\"><a href=\"";
                // line 16
                echo twig_get_attribute($this->env, $this->source, $context["statistic"], "href", [], "any", false, false, false, 16);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_refresh"] ?? null);
                echo "\" class=\"btn btn-warning\"><i class=\"fa-solid fa-rotate\"></i></a></td>
\t\t\t\t\t</tr>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['statistic'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "\t\t\t";
        } else {
            // line 20
            echo "\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text-center\" colspan=\"3\">";
            // line 21
            echo ($context["text_no_results"] ?? null);
            echo "</td>
\t\t\t\t</tr>
\t\t\t";
        }
        // line 24
        echo "\t\t</tbody>
\t</table>
</div>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/report/statistics_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 24,  93 => 21,  90 => 20,  87 => 19,  76 => 16,  72 => 15,  68 => 14,  65 => 13,  60 => 12,  58 => 11,  51 => 7,  47 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"table-responsive\">
\t<table class=\"table table-bordered\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<td class=\"text-start\">{{ column_name }}</td>
\t\t\t\t<td class=\"text-end\">{{ column_value }}</td>
\t\t\t\t<td class=\"text-end\">{{ column_action }}</td>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t{% if statistics %}
\t\t\t\t{% for statistic in statistics %}
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-start\">{{ statistic.name }}</td>
\t\t\t\t\t\t<td class=\"text-end\">{{ statistic.value }}</td>
\t\t\t\t\t\t<td class=\"text-end\"><a href=\"{{ statistic.href }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_refresh }}\" class=\"btn btn-warning\"><i class=\"fa-solid fa-rotate\"></i></a></td>
\t\t\t\t\t</tr>
\t\t\t\t{% endfor %}
\t\t\t{% else %}
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text-center\" colspan=\"3\">{{ text_no_results }}</td>
\t\t\t\t</tr>
\t\t\t{% endif %}
\t\t</tbody>
\t</table>
</div>", "cp-akis/view/default/plates/report/statistics_list.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/report/statistics_list.twig");
    }
}
