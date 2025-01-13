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

/* cp-akis/view//plates/extension/analytics.twig */
class __TwigTemplate_fc223cc69c93f0c3ada599ebe07f0d7f extends Template
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
\t\t\t\t\t<td class=\"text-start\">";
        // line 9
        echo ($context["column_status"] ?? null);
        echo "</td>
\t\t\t\t\t<td class=\"text-end\">";
        // line 10
        echo ($context["column_action"] ?? null);
        echo "</td>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
        // line 14
        if (($context["extensions"] ?? null)) {
            // line 15
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                // line 16
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text-start\" colspan=\"2\"><b>";
                // line 17
                echo twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 17);
                echo "</b></td>
\t\t\t\t\t\t\t<td class=\"text-end\">";
                // line 18
                if ( !twig_get_attribute($this->env, $this->source, $context["extension"], "installed", [], "any", false, false, false, 18)) {
                    // line 19
                    echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "install", [], "any", false, false, false, 19);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_install"] ?? null);
                    echo "\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></a>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 21
                    echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["extension"], "uninstall", [], "any", false, false, false, 21);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_uninstall"] ?? null);
                    echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></a>
\t\t\t\t\t\t\t\t";
                }
                // line 22
                echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
                // line 24
                if (twig_get_attribute($this->env, $this->source, $context["extension"], "installed", [], "any", false, false, false, 24)) {
                    // line 25
                    echo "\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["extension"], "store", [], "any", false, false, false, 25));
                    foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
                        // line 26
                        echo "\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"text-start\">&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;";
                        // line 27
                        echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 27);
                        echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"text-start\">";
                        // line 28
                        echo twig_get_attribute($this->env, $this->source, $context["store"], "status", [], "any", false, false, false, 28);
                        echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"text-end text-nowrap\"><a href=\"";
                        // line 29
                        echo twig_get_attribute($this->env, $this->source, $context["store"], "edit", [], "any", false, false, false, 29);
                        echo "\" data-bs-toggle=\"tooltip\" title=\"";
                        echo ($context["button_edit"] ?? null);
                        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a></td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 32
                    echo "\t\t\t\t\t\t";
                }
                // line 33
                echo "\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "\t\t\t\t";
        } else {
            // line 35
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-center\" colspan=\"3\">";
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
</fieldset>
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/extension/analytics.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 39,  145 => 36,  142 => 35,  139 => 34,  133 => 33,  130 => 32,  119 => 29,  115 => 28,  111 => 27,  108 => 26,  103 => 25,  101 => 24,  97 => 22,  89 => 21,  81 => 19,  79 => 18,  75 => 17,  72 => 16,  67 => 15,  65 => 14,  58 => 10,  54 => 9,  50 => 8,  42 => 3,  37 => 1,);
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
\t\t\t\t\t<td class=\"text-start\">{{ column_status }}</td>
\t\t\t\t\t<td class=\"text-end\">{{ column_action }}</td>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t{% if extensions %}
\t\t\t\t\t{% for extension in extensions %}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text-start\" colspan=\"2\"><b>{{ extension.name }}</b></td>
\t\t\t\t\t\t\t<td class=\"text-end\">{% if not extension.installed %}
\t\t\t\t\t\t\t\t\t<a href=\"{{ extension.install }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_install }}\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></a>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t<a href=\"{{ extension.uninstall }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_uninstall }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></a>
\t\t\t\t\t\t\t\t{% endif %}</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t{% if extension.installed %}
\t\t\t\t\t\t\t{% for store in extension.store %}
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"text-start\">&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;{{ store.name }}</td>
\t\t\t\t\t\t\t\t\t<td class=\"text-start\">{{ store.status }}</td>
\t\t\t\t\t\t\t\t\t<td class=\"text-end text-nowrap\"><a href=\"{{ store.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a></td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t{% endif %}
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
", "cp-akis/view//plates/extension/analytics.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/extension/analytics.twig");
    }
}
