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

/* cp-akis/view//plates/extension/ventocart/currency/fixer.twig */
class __TwigTemplate_8b21281d6873a4d934700cd3d1e4ae49 extends Template
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
        echo ($context["header"] ?? null);
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"float-end\">
\t\t\t\t<button type=\"submit\" form=\"form-currency\" data-bs-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-save\"></i></button>
\t\t\t\t<a href=\"";
        // line 7
        echo ($context["back"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_back"] ?? null);
        echo "\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a></div>
\t\t\t<h1>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h1>
\t\t\t<ol class=\"breadcrumb\">
\t\t\t\t";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "\t\t\t\t\t<li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            echo "</a></li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "\t\t\t</ol>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
\t\t<div class=\"card\">
\t\t\t<div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 18
        echo ($context["text_edit"] ?? null);
        echo "</div>
\t\t\t<div class=\"card-body\">
\t\t\t\t<div class=\"alert alert-info\"><i class=\"fa-solid fa-circle-exclamation\"></i> ";
        // line 20
        echo ($context["text_signup"] ?? null);
        echo "</div>
\t\t\t\t<form id=\"form-currency\" action=\"";
        // line 21
        echo ($context["save"] ?? null);
        echo "\" method=\"post\" data-oc-toggle=\"ajax\">
\t\t\t\t\t<div class=\"row mb-3 required\">
\t\t\t\t\t\t<label for=\"entry-api\" class=\"col-sm-2 col-form-label\">";
        // line 23
        echo ($context["entry_api"] ?? null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"currency_fixer_api\" value=\"";
        // line 25
        echo ($context["currency_fixer_api"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_api"] ?? null);
        echo "\" id=\"input-api\" class=\"form-control\"/>
\t\t\t\t\t\t\t<div id=\"error-api\" class=\"invalid-feedback\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t\t<label class=\"col-sm-2 col-form-label\">";
        // line 30
        echo ($context["entry_status"] ?? null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t<div class=\"form-check form-switch form-switch-lg\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"currency_fixer_status\" value=\"0\"/>
\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"currency_fixer_status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"";
        // line 34
        if (($context["currency_fixer_status"] ?? null)) {
            echo " checked";
        }
        echo "/>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
        // line 43
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/extension/ventocart/currency/fixer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 43,  119 => 34,  112 => 30,  102 => 25,  97 => 23,  92 => 21,  88 => 20,  83 => 18,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"float-end\">
\t\t\t\t<button type=\"submit\" form=\"form-currency\" data-bs-toggle=\"tooltip\" title=\"{{ button_save }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-save\"></i></button>
\t\t\t\t<a href=\"{{ back }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_back }}\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a></div>
\t\t\t<h1>{{ heading_title }}</h1>
\t\t\t<ol class=\"breadcrumb\">
\t\t\t\t{% for breadcrumb in breadcrumbs %}
\t\t\t\t\t<li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
\t\t\t\t{% endfor %}
\t\t\t</ol>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
\t\t<div class=\"card\">
\t\t\t<div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> {{ text_edit }}</div>
\t\t\t<div class=\"card-body\">
\t\t\t\t<div class=\"alert alert-info\"><i class=\"fa-solid fa-circle-exclamation\"></i> {{ text_signup }}</div>
\t\t\t\t<form id=\"form-currency\" action=\"{{ save }}\" method=\"post\" data-oc-toggle=\"ajax\">
\t\t\t\t\t<div class=\"row mb-3 required\">
\t\t\t\t\t\t<label for=\"entry-api\" class=\"col-sm-2 col-form-label\">{{ entry_api }}</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"currency_fixer_api\" value=\"{{ currency_fixer_api }}\" placeholder=\"{{ entry_api }}\" id=\"input-api\" class=\"form-control\"/>
\t\t\t\t\t\t\t<div id=\"error-api\" class=\"invalid-feedback\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t\t<label class=\"col-sm-2 col-form-label\">{{ entry_status }}</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t<div class=\"form-check form-switch form-switch-lg\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"currency_fixer_status\" value=\"0\"/>
\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"currency_fixer_status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"{% if currency_fixer_status %} checked{% endif %}/>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
{{ footer }}
", "cp-akis/view//plates/extension/ventocart/currency/fixer.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/extension/ventocart/currency/fixer.twig");
    }
}
