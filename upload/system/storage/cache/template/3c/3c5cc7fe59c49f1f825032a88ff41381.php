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

/* cp-akis/view/default/plates/marketplace/startup_list.twig */
class __TwigTemplate_9a081214ab104d141d110f1a040a4965 extends Template
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
        echo "<form id=\"form-startup\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
        echo ($context["action"] ?? null);
        echo "\" data-oc-target=\"#startup\">
\t<div class=\"table-responsive\">
\t\t<table class=\"table table-bordered table-hover\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
\t\t\t\t\t<td class=\"text-start\"><a href=\"";
        // line 7
        echo ($context["sort_code"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "code")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_code"] ?? null);
        echo "</a></td>
\t\t\t\t\t<td class=\"text-start\"><a href=\"";
        // line 8
        echo ($context["sort_action"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "action")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_action"] ?? null);
        echo "</a></td>
\t\t\t\t\t<td class=\"text-end\"><a href=\"";
        // line 9
        echo ($context["sort_sort_order"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "sort_order")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_sort_order"] ?? null);
        echo "</a></td>
\t\t\t\t\t<td class=\"text-end\">";
        // line 10
        echo ($context["column_action"] ?? null);
        echo "</td>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
        // line 14
        if (($context["startups"] ?? null)) {
            // line 15
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["startups"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["startup"]) {
                // line 16
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"";
                // line 17
                echo twig_get_attribute($this->env, $this->source, $context["startup"], "startup_id", [], "any", false, false, false, 17);
                echo "\" class=\"form-check-input\"/></td>
\t\t\t\t\t\t\t<td class=\"text-start\">";
                // line 18
                echo twig_get_attribute($this->env, $this->source, $context["startup"], "code", [], "any", false, false, false, 18);
                echo "</td>
\t\t\t\t\t\t\t<td class=\"text-start\">";
                // line 19
                echo twig_get_attribute($this->env, $this->source, $context["startup"], "action", [], "any", false, false, false, 19);
                echo "</td>
\t\t\t\t\t\t\t<td class=\"text-end\">";
                // line 20
                echo twig_get_attribute($this->env, $this->source, $context["startup"], "sort_order", [], "any", false, false, false, 20);
                echo "</td>
\t\t\t\t\t\t\t<td class=\"text-end text-nowrap\">
\t\t\t\t\t\t\t\t";
                // line 22
                if (twig_get_attribute($this->env, $this->source, $context["startup"], "description", [], "any", false, false, false, 22)) {
                    // line 23
                    echo "\t\t\t\t\t\t\t\t\t<button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-startup-";
                    echo twig_get_attribute($this->env, $this->source, $context["startup"], "startup_id", [], "any", false, false, false, 23);
                    echo "\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 25
                    echo "\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-info\" disabled><i class=\"fa-solid fa-info-circle\"></i></button>
\t\t\t\t\t\t\t\t";
                }
                // line 27
                echo "\t\t\t\t\t\t\t\t";
                if ( !twig_get_attribute($this->env, $this->source, $context["startup"], "status", [], "any", false, false, false, 27)) {
                    // line 28
                    echo "\t\t\t\t\t\t\t\t\t<button type=\"button\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["startup"], "enable", [], "any", false, false, false, 28);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_enable"] ?? null);
                    echo "\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 30
                    echo "\t\t\t\t\t\t\t\t\t<button type=\"button\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["startup"], "disable", [], "any", false, false, false, 30);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_disable"] ?? null);
                    echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
\t\t\t\t\t\t\t\t";
                }
                // line 31
                echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['startup'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "\t\t\t\t";
        } else {
            // line 35
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-center\" colspan=\"5\">";
            // line 36
            echo ($context["text_no_results"] ?? null);
            echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t";
        }
        // line 39
        echo "\t\t\t</tbody>
\t\t</table>
\t</div>
\t<div class=\"row\">
\t\t<div class=\"col-sm-6 text-start\">";
        // line 43
        echo ($context["pagination"] ?? null);
        echo "</div>
\t\t<div class=\"col-sm-6 text-end\">";
        // line 44
        echo ($context["results"] ?? null);
        echo "</div>
\t</div>
</form>
";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["startups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["startup"]) {
            // line 48
            echo "\t";
            if (twig_get_attribute($this->env, $this->source, $context["startup"], "description", [], "any", false, false, false, 48)) {
                // line 49
                echo "\t\t<div id=\"modal-startup-";
                echo twig_get_attribute($this->env, $this->source, $context["startup"], "startup_id", [], "any", false, false, false, 49);
                echo "\" class=\"modal\">
\t\t\t<div class=\"modal-dialog\">
\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t\t\t<h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> ";
                // line 53
                echo ($context["text_info"] ?? null);
                echo "</h5>
\t\t\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"modal-body\"><textarea rows=\"5\" class=\"form-control\" readonly>";
                // line 56
                echo twig_get_attribute($this->env, $this->source, $context["startup"], "description", [], "any", false, false, false, 56);
                echo "</textarea></div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['startup'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/marketplace/startup_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 56,  199 => 53,  191 => 49,  188 => 48,  184 => 47,  178 => 44,  174 => 43,  168 => 39,  162 => 36,  159 => 35,  156 => 34,  148 => 31,  140 => 30,  132 => 28,  129 => 27,  125 => 25,  119 => 23,  117 => 22,  112 => 20,  108 => 19,  104 => 18,  100 => 17,  97 => 16,  92 => 15,  90 => 14,  83 => 10,  71 => 9,  59 => 8,  47 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form id=\"form-startup\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ action }}\" data-oc-target=\"#startup\">
\t<div class=\"table-responsive\">
\t\t<table class=\"table table-bordered table-hover\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
\t\t\t\t\t<td class=\"text-start\"><a href=\"{{ sort_code }}\"{% if sort == 'code' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_code }}</a></td>
\t\t\t\t\t<td class=\"text-start\"><a href=\"{{ sort_action }}\"{% if sort == 'action' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_action }}</a></td>
\t\t\t\t\t<td class=\"text-end\"><a href=\"{{ sort_sort_order }}\"{% if sort == 'sort_order' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_sort_order }}</a></td>
\t\t\t\t\t<td class=\"text-end\">{{ column_action }}</td>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t{% if startups %}
\t\t\t\t\t{% for startup in startups %}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"{{ startup.startup_id }}\" class=\"form-check-input\"/></td>
\t\t\t\t\t\t\t<td class=\"text-start\">{{ startup.code }}</td>
\t\t\t\t\t\t\t<td class=\"text-start\">{{ startup.action }}</td>
\t\t\t\t\t\t\t<td class=\"text-end\">{{ startup.sort_order }}</td>
\t\t\t\t\t\t\t<td class=\"text-end text-nowrap\">
\t\t\t\t\t\t\t\t{% if startup.description %}
\t\t\t\t\t\t\t\t\t<button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-startup-{{ startup.startup_id }}\" class=\"btn btn-info\"><i class=\"fa-solid fa-info-circle\"></i></button>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-info\" disabled><i class=\"fa-solid fa-info-circle\"></i></button>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t{% if not startup.status %}
\t\t\t\t\t\t\t\t\t<button type=\"button\" value=\"{{ startup.enable }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_enable }}\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t<button type=\"button\" value=\"{{ startup.disable }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_disable }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
\t\t\t\t\t\t\t\t{% endif %}</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{% endfor %}
\t\t\t\t{% else %}
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-center\" colspan=\"5\">{{ text_no_results }}</td>
\t\t\t\t\t</tr>
\t\t\t\t{% endif %}
\t\t\t</tbody>
\t\t</table>
\t</div>
\t<div class=\"row\">
\t\t<div class=\"col-sm-6 text-start\">{{ pagination }}</div>
\t\t<div class=\"col-sm-6 text-end\">{{ results }}</div>
\t</div>
</form>
{% for startup in startups %}
\t{% if startup.description %}
\t\t<div id=\"modal-startup-{{ startup.startup_id }}\" class=\"modal\">
\t\t\t<div class=\"modal-dialog\">
\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t\t\t<h5 class=\"modal-title\"><i class=\"fa-solid fa-info-circle\"></i> {{ text_info }}</h5>
\t\t\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"modal-body\"><textarea rows=\"5\" class=\"form-control\" readonly>{{ startup.description }}</textarea></div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t{% endif %}
{% endfor %}", "cp-akis/view/default/plates/marketplace/startup_list.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/marketplace/startup_list.twig");
    }
}
