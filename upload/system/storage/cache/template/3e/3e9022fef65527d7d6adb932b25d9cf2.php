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

/* cp-akis/view//plates/extension/ventocart/analytics/google_analytics.twig */
class __TwigTemplate_517e05a5982508844e9a090bb5b1f7c3 extends Template
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
\t\t\t\t<button type=\"submit\" form=\"form-analytics\" data-bs-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\"
\t\t\t\t\tclass=\"btn btn-primary\"><i class=\"fa-solid fa-save\"></i></button>
\t\t\t\t<a href=\"";
        // line 8
        echo ($context["back"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_back"] ?? null);
        echo "\" class=\"btn btn-light\"><i
\t\t\t\t\t\tclass=\"fa-solid fa-reply\"></i></a>
\t\t\t</div>
\t\t\t<h1>";
        // line 11
        echo ($context["heading_title"] ?? null);
        echo "</h1>
\t\t\t<ol class=\"breadcrumb\">
\t\t\t\t";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 14
            echo "\t\t\t\t<li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 14);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 14);
            echo "</a></li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "\t\t\t</ol>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
\t\t<div class=\"card\">
\t\t\t<div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 21
        echo ($context["text_edit"] ?? null);
        echo "</div>
\t\t\t<div class=\"card-body\">
\t\t\t\t<form id=\"form-analytics\" action=\"";
        // line 23
        echo ($context["save"] ?? null);
        echo "\" method=\"post\" data-oc-toggle=\"ajax\">


\t\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t\t<label class=\"col-sm-2 col-form-label\">";
        // line 27
        echo ($context["entry_status"] ?? null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t<div class=\"form-check form-switch form-switch-lg\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"analytics_google_analytics_status\" value=\"0\" />
\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"analytics_google_analytics_status\" value=\"1\" id=\"input-status\"
\t\t\t\t\t\t\t\t\tclass=\"form-check-input\" ";
        // line 32
        if (($context["status"] ?? null)) {
            echo " checked";
        }
        echo " />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<input name=\"store_id\" type=\"hidden\" value=\"";
        // line 36
        echo ($context["store_id"] ?? null);
        echo "\">
\t 
\t\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t\t<label for=\"input-tag\" class=\"col-sm-2 col-form-label\">Tag</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t<input type=\"text\" placeholder=\"GT-XXXXXXXXX\" name=\"analytics_google_analytics_tag\" id=\"input-tag\" class=\"form-control\" value=\"";
        // line 41
        echo ($context["store_tag"] ?? null);
        echo "\" placeholder=\"Enter Tag\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
 
";
        // line 50
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/extension/ventocart/analytics/google_analytics.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 50,  123 => 41,  115 => 36,  106 => 32,  98 => 27,  91 => 23,  86 => 21,  79 => 16,  68 => 14,  64 => 13,  59 => 11,  51 => 8,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"float-end\">
\t\t\t\t<button type=\"submit\" form=\"form-analytics\" data-bs-toggle=\"tooltip\" title=\"{{ button_save }}\"
\t\t\t\t\tclass=\"btn btn-primary\"><i class=\"fa-solid fa-save\"></i></button>
\t\t\t\t<a href=\"{{ back }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_back }}\" class=\"btn btn-light\"><i
\t\t\t\t\t\tclass=\"fa-solid fa-reply\"></i></a>
\t\t\t</div>
\t\t\t<h1>{{ heading_title }}</h1>
\t\t\t<ol class=\"breadcrumb\">
\t\t\t\t{% for breadcrumb in breadcrumbs %}
\t\t\t\t<li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
\t\t\t\t{% endfor %}
\t\t\t</ol>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
\t\t<div class=\"card\">
\t\t\t<div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> {{ text_edit }}</div>
\t\t\t<div class=\"card-body\">
\t\t\t\t<form id=\"form-analytics\" action=\"{{ save }}\" method=\"post\" data-oc-toggle=\"ajax\">


\t\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t\t<label class=\"col-sm-2 col-form-label\">{{ entry_status }}</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t<div class=\"form-check form-switch form-switch-lg\">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"analytics_google_analytics_status\" value=\"0\" />
\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"analytics_google_analytics_status\" value=\"1\" id=\"input-status\"
\t\t\t\t\t\t\t\t\tclass=\"form-check-input\" {% if status %} checked{% endif %} />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<input name=\"store_id\" type=\"hidden\" value=\"{{store_id}}\">
\t 
\t\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t\t<label for=\"input-tag\" class=\"col-sm-2 col-form-label\">Tag</label>
\t\t\t\t\t\t<div class=\"col-sm-10\">
\t\t\t\t\t\t\t<input type=\"text\" placeholder=\"GT-XXXXXXXXX\" name=\"analytics_google_analytics_tag\" id=\"input-tag\" class=\"form-control\" value=\"{{ store_tag  }}\" placeholder=\"Enter Tag\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
 
{{ footer }}", "cp-akis/view//plates/extension/ventocart/analytics/google_analytics.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/extension/ventocart/analytics/google_analytics.twig");
    }
}
