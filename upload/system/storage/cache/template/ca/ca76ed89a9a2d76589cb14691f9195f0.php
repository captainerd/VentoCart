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

/* cp-akis/view/default/plates/design/translation_list.twig */
class __TwigTemplate_8329515cd4c25d8c26f23626e4eb9ca0 extends Template
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
        echo "<form id=\"form-translation\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
        echo ($context["action"] ?? null);
        echo "\" data-oc-target=\"#translation\">
\t<div class=\"table-responsive\">
\t\t<table class=\"table table-bordered\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
\t\t\t\t\t<td class=\"text-start\"><a href=\"";
        // line 7
        echo ($context["sort_store"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "store")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_store"] ?? null);
        echo "</a></td>
\t\t\t\t\t<td class=\"text-center\"><a href=\"";
        // line 8
        echo ($context["sort_language"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "language")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_language"] ?? null);
        echo "</a></td>
\t\t\t\t\t<td class=\"text-start\"><a href=\"";
        // line 9
        echo ($context["sort_route"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "route")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_route"] ?? null);
        echo "</a></td>
\t\t\t\t\t<td class=\"text-start\"><a href=\"";
        // line 10
        echo ($context["sort_key"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "key")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_key"] ?? null);
        echo "</a></td>
\t\t\t\t\t<td class=\"text-start\"><a href=\"";
        // line 11
        echo ($context["sort_value"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "value")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_value"] ?? null);
        echo "</a></td>
\t\t\t\t\t<td class=\"text-end\">";
        // line 12
        echo ($context["column_action"] ?? null);
        echo "</td>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
        // line 16
        if (($context["translations"] ?? null)) {
            // line 17
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["translations"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["translation"]) {
                // line 18
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"";
                // line 19
                echo twig_get_attribute($this->env, $this->source, $context["translation"], "translation_id", [], "any", false, false, false, 19);
                echo "\" class=\"form-check-input\"/></td>
\t\t\t\t\t\t\t<td class=\"text-start\">";
                // line 20
                echo twig_get_attribute($this->env, $this->source, $context["translation"], "store", [], "any", false, false, false, 20);
                echo "</td>
\t\t\t\t\t\t\t<td class=\"text-center\"><img src=\"";
                // line 21
                echo twig_get_attribute($this->env, $this->source, $context["translation"], "image", [], "any", false, false, false, 21);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["translation"], "language", [], "any", false, false, false, 21);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["translation"], "language", [], "any", false, false, false, 21);
                echo "\"></td>
\t\t\t\t\t\t\t<td class=\"text-start\">";
                // line 22
                echo twig_get_attribute($this->env, $this->source, $context["translation"], "route", [], "any", false, false, false, 22);
                echo "</td>
\t\t\t\t\t\t\t<td class=\"text-start\">";
                // line 23
                echo twig_get_attribute($this->env, $this->source, $context["translation"], "key", [], "any", false, false, false, 23);
                echo "</td>
\t\t\t\t\t\t\t<td class=\"text-start\">";
                // line 24
                echo twig_get_attribute($this->env, $this->source, $context["translation"], "value", [], "any", false, false, false, 24);
                echo "</td>
\t\t\t\t\t\t\t<td class=\"text-end\"><a href=\"";
                // line 25
                echo twig_get_attribute($this->env, $this->source, $context["translation"], "edit", [], "any", false, false, false, 25);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_edit"] ?? null);
                echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a></td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "\t\t\t\t";
        } else {
            // line 29
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-center\" colspan=\"7\">";
            // line 30
            echo ($context["text_no_results"] ?? null);
            echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t";
        }
        // line 33
        echo "\t\t\t</tbody>
\t\t</table>
\t</div>
\t<div class=\"row\">
\t\t<div class=\"col-sm-6 text-start\">";
        // line 37
        echo ($context["pagination"] ?? null);
        echo "</div>
\t\t<div class=\"col-sm-6 text-end\">";
        // line 38
        echo ($context["results"] ?? null);
        echo "</div>
\t</div>
</form>
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/design/translation_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 38,  181 => 37,  175 => 33,  169 => 30,  166 => 29,  163 => 28,  152 => 25,  148 => 24,  144 => 23,  140 => 22,  132 => 21,  128 => 20,  124 => 19,  121 => 18,  116 => 17,  114 => 16,  107 => 12,  95 => 11,  83 => 10,  71 => 9,  59 => 8,  47 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form id=\"form-translation\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ action }}\" data-oc-target=\"#translation\">
\t<div class=\"table-responsive\">
\t\t<table class=\"table table-bordered\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
\t\t\t\t\t<td class=\"text-start\"><a href=\"{{ sort_store }}\"{% if sort == 'store' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_store }}</a></td>
\t\t\t\t\t<td class=\"text-center\"><a href=\"{{ sort_language }}\"{% if sort == 'language' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_language }}</a></td>
\t\t\t\t\t<td class=\"text-start\"><a href=\"{{ sort_route }}\"{% if sort == 'route' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_route }}</a></td>
\t\t\t\t\t<td class=\"text-start\"><a href=\"{{ sort_key }}\"{% if sort == 'key' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_key }}</a></td>
\t\t\t\t\t<td class=\"text-start\"><a href=\"{{ sort_value }}\"{% if sort == 'value' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_value }}</a></td>
\t\t\t\t\t<td class=\"text-end\">{{ column_action }}</td>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t{% if translations %}
\t\t\t\t\t{% for translation in translations %}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"{{ translation.translation_id }}\" class=\"form-check-input\"/></td>
\t\t\t\t\t\t\t<td class=\"text-start\">{{ translation.store }}</td>
\t\t\t\t\t\t\t<td class=\"text-center\"><img src=\"{{ translation.image }}\" alt=\"{{ translation.language }}\" title=\"{{ translation.language }}\"></td>
\t\t\t\t\t\t\t<td class=\"text-start\">{{ translation.route }}</td>
\t\t\t\t\t\t\t<td class=\"text-start\">{{ translation.key }}</td>
\t\t\t\t\t\t\t<td class=\"text-start\">{{ translation.value }}</td>
\t\t\t\t\t\t\t<td class=\"text-end\"><a href=\"{{ translation.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a></td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{% endfor %}
\t\t\t\t{% else %}
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-center\" colspan=\"7\">{{ text_no_results }}</td>
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
", "cp-akis/view/default/plates/design/translation_list.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/design/translation_list.twig");
    }
}
