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

/* cp-akis/view//plates/extension/dashboard.twig */
class __TwigTemplate_645990b29dac80c053efc3213dd1dbf8 extends Template
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
        echo ($context["promotion"] ?? null);
        echo "
<fieldset>
\t<legend>";
        // line 3
        echo ($context["heading_title"] ?? null);
        echo "</legend>
\t<div class=\"table-responsive\">
\t\t<table class=\"table table-bordered table-hover\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text-start\">";
        // line 8
        echo ($context["column_name"] ?? null);
        echo "</td>
\t\t\t\t\t<td class=\"text-end\">";
        // line 9
        echo ($context["column_width"] ?? null);
        echo "</td>
\t\t\t\t\t<td class=\"text-start\">";
        // line 10
        echo ($context["column_status"] ?? null);
        echo "</td>
\t\t\t\t\t<td class=\"text-end\">";
        // line 11
        echo ($context["column_sort_order"] ?? null);
        echo "</td>
\t\t\t\t\t<td class=\"text-end\">";
        // line 12
        echo ($context["column_action"] ?? null);
        echo "</td>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
        // line 16
        if (($context["extensions"] ?? null)) {
            // line 17
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                // line 18
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text-start\">";
                // line 19
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 19);
                echo "</td>
\t\t\t\t\t\t\t<td class=\"text-end\">";
                // line 20
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "width", [], "any", false, false, false, 20);
                echo "</td>
\t\t\t\t\t\t\t<td class=\"text-start\">";
                // line 21
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "status", [], "any", false, false, false, 21);
                echo "</td>
\t\t\t\t\t\t\t<td class=\"text-end\">";
                // line 22
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "sort_order", [], "any", false, false, false, 22);
                echo "</td>
\t\t\t\t\t\t\t<td class=\"text-end text-nowrap\">";
                // line 23
                if (twig_get_attribute($this->env, $this->source, $context["extension"], "installed", [], "any", false, false, false, 23)) {
                    // line 24
                    echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "edit", [], "any", false, false, false, 24);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_edit"] ?? null);
                    echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 26
                    echo "\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-primary\" disabled=\"disabled\"><i class=\"fa-solid fa-pencil\"></i></button>
\t\t\t\t\t\t\t\t";
                }
                // line 28
                echo "\t\t\t\t\t\t\t\t";
                if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "installed", [], "any", false, false, false, 28)) {
                    // line 29
                    echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "install", [], "any", false, false, false, 29);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_install"] ?? null);
                    echo "\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></a>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 31
                    echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "uninstall", [], "any", false, false, false, 31);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_uninstall"] ?? null);
                    echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></a>
\t\t\t\t\t\t\t\t";
                }
                // line 32
                echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "\t\t\t\t";
        } else {
            // line 36
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-center\" colspan=\"3\">";
            // line 37
            echo ($context["text_no_results"] ?? null);
            echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t";
        }
        // line 40
        echo "\t\t\t</tbody>
\t\t</table>
\t</div>
</fieldset>
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/extension/dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 40,  146 => 37,  143 => 36,  140 => 35,  132 => 32,  124 => 31,  116 => 29,  113 => 28,  109 => 26,  101 => 24,  99 => 23,  95 => 22,  91 => 21,  87 => 20,  83 => 19,  80 => 18,  75 => 17,  73 => 16,  66 => 12,  62 => 11,  58 => 10,  54 => 9,  50 => 8,  42 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ promotion }}
<fieldset>
\t<legend>{{ heading_title }}</legend>
\t<div class=\"table-responsive\">
\t\t<table class=\"table table-bordered table-hover\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"text-start\">{{ column_name }}</td>
\t\t\t\t\t<td class=\"text-end\">{{ column_width }}</td>
\t\t\t\t\t<td class=\"text-start\">{{ column_status }}</td>
\t\t\t\t\t<td class=\"text-end\">{{ column_sort_order }}</td>
\t\t\t\t\t<td class=\"text-end\">{{ column_action }}</td>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t{% if extensions %}
\t\t\t\t\t{% for extension in extensions %}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text-start\">{{ extension.name }}</td>
\t\t\t\t\t\t\t<td class=\"text-end\">{{ extension.width }}</td>
\t\t\t\t\t\t\t<td class=\"text-start\">{{ extension.status }}</td>
\t\t\t\t\t\t\t<td class=\"text-end\">{{ extension.sort_order }}</td>
\t\t\t\t\t\t\t<td class=\"text-end text-nowrap\">{% if extension.installed %}
\t\t\t\t\t\t\t\t\t<a href=\"{{ extension.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-primary\" disabled=\"disabled\"><i class=\"fa-solid fa-pencil\"></i></button>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t{% if not extension.installed %}
\t\t\t\t\t\t\t\t\t<a href=\"{{ extension.install }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_install }}\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></a>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t<a href=\"{{ extension.uninstall }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_uninstall }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></a>
\t\t\t\t\t\t\t\t{% endif %}</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{% endfor %}
\t\t\t\t{% else %}
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-center\" colspan=\"3\">{{ text_no_results }}</td>
\t\t\t\t\t</tr>
\t\t\t\t{% endif %}
\t\t\t</tbody>
\t\t</table>
\t</div>
</fieldset>
", "cp-akis/view//plates/extension/dashboard.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/extension/dashboard.twig");
    }
}
