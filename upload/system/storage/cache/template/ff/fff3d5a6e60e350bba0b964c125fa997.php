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

/* cp-akis/view/default/plates/marketplace/promotion.twig */
class __TwigTemplate_50ab272330461390b2e060e9b581a627 extends Template
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
        if (($context["banner"] ?? null)) {
            // line 2
            echo "\t<div class=\"text-center\">";
            echo ($context["banner"] ?? null);
            echo "</div>
\t<br/>
";
        }
        // line 5
        if (($context["extensions"] ?? null)) {
            // line 6
            echo "\t<fieldset id=\"recommended\">
\t\t<legend>";
            // line 7
            echo ($context["text_recommended"] ?? null);
            echo "</legend>
\t\t<div class=\"table-responsive\">
\t\t\t<table class=\"table table-bordered table-hover\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-start\">";
            // line 12
            echo ($context["column_name"] ?? null);
            echo "</td>
\t\t\t\t\t\t<td class=\"text-end\">";
            // line 13
            echo ($context["column_action"] ?? null);
            echo "</td>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                // line 18
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text-start\"><a href=\"";
                // line 19
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "href", [], "any", false, false, false, 19);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 19);
                echo "</a></td>
\t\t\t\t\t\t\t<td class=\"text-end\">
\t\t\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t\t\t<div class=\"btn-group\">
\t\t\t\t\t\t\t\t\t\t<button type=\"button\" value=\"";
                // line 23
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "download", [], "any", false, false, false, 23);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_download"] ?? null);
                echo "\" class=\"btn btn-primary\"";
                if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "download", [], "any", false, false, false, 23)) {
                    echo " disabled";
                }
                echo "><i class=\"fa-solid fa-download\"></i></button>
\t\t\t\t\t\t\t\t\t\t<button type=\"button\" data-bs-toggle=\"dropdown\" class=\"btn btn-outline-dark dropdown-toggle dropdown-toggle-split\"><i class=\"fa-solid fa-caret-down\"></i></button>
\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown-menu dropdown-menu-end\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 26
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "install", [], "any", false, false, false, 26);
                echo "\" class=\"dropdown-item";
                if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "install", [], "any", false, false, false, 26)) {
                    echo " disabled";
                }
                echo "\"><i class=\"fa-solid fa-plus-circle fa-fw\"></i> ";
                echo ($context["text_install"] ?? null);
                echo "</a> <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "delete", [], "any", false, false, false, 26);
                echo "\" class=\"dropdown-item";
                if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "delete", [], "any", false, false, false, 26)) {
                    echo " disabled";
                }
                echo "\"><i class=\"fa-regular fa-trash-can fa-fw\"></i> ";
                echo ($context["text_delete"] ?? null);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</fieldset>
";
        }
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/marketplace/promotion.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 33,  98 => 26,  86 => 23,  77 => 19,  74 => 18,  70 => 17,  63 => 13,  59 => 12,  51 => 7,  48 => 6,  46 => 5,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if banner %}
\t<div class=\"text-center\">{{ banner }}</div>
\t<br/>
{% endif %}
{% if extensions %}
\t<fieldset id=\"recommended\">
\t\t<legend>{{ text_recommended }}</legend>
\t\t<div class=\"table-responsive\">
\t\t\t<table class=\"table table-bordered table-hover\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-start\">{{ column_name }}</td>
\t\t\t\t\t\t<td class=\"text-end\">{{ column_action }}</td>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t{% for extension in extensions %}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text-start\"><a href=\"{{ extension.href }}\">{{ extension.name }}</a></td>
\t\t\t\t\t\t\t<td class=\"text-end\">
\t\t\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t\t\t<div class=\"btn-group\">
\t\t\t\t\t\t\t\t\t\t<button type=\"button\" value=\"{{ extension.download }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_download }}\" class=\"btn btn-primary\"{% if not extension.download %} disabled{% endif %}><i class=\"fa-solid fa-download\"></i></button>
\t\t\t\t\t\t\t\t\t\t<button type=\"button\" data-bs-toggle=\"dropdown\" class=\"btn btn-outline-dark dropdown-toggle dropdown-toggle-split\"><i class=\"fa-solid fa-caret-down\"></i></button>
\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown-menu dropdown-menu-end\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"{{ extension.install }}\" class=\"dropdown-item{% if not extension.install %} disabled{% endif %}\"><i class=\"fa-solid fa-plus-circle fa-fw\"></i> {{ text_install }}</a> <a href=\"{{ extension.delete }}\" class=\"dropdown-item{% if not extension.delete %} disabled{% endif %}\"><i class=\"fa-regular fa-trash-can fa-fw\"></i> {{ text_delete }}</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{% endfor %}
\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</fieldset>
{% endif %}
", "cp-akis/view/default/plates/marketplace/promotion.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/marketplace/promotion.twig");
    }
}
