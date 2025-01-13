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

/* cp-akis/view/default/plates/report/report.twig */
class __TwigTemplate_c7cdc1ca8c9030f8f8acec7d1e4845cc extends Template
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
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_filter"] ?? null);
        echo "\" onclick=\"\$('#filter-report').toggleClass('d-none');\" class=\"btn btn-light d-md-none d-lg-none\"><i class=\"fa-solid fa-filter\"></i></button>
      </div>
      <h1>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "          <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card mb-3\">
      <div class=\"card-header\"><i class=\"fa-solid fa-chart-bar\"></i> ";
        // line 18
        echo ($context["text_type"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <div class=\"card\">
          <div class=\"card-body bg-light\">
            <div class=\"input-group\">
              <select name=\"report\" id=\"input-report\" class=\"form-select\">
                ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["reports"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
            // line 25
            echo "                  <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["report"], "href", [], "any", false, false, false, 25);
            echo "\"";
            if ((($context["code"] ?? null) == twig_get_attribute($this->env, $this->source, $context["report"], "code", [], "any", false, false, false, 25))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["report"], "text", [], "any", false, false, false, 25);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['report'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "              </select>
              <div class=\"input-group-text\"><i class=\"fa-solid fa-filter\"></i>&nbsp;";
        // line 28
        echo ($context["text_filter"] ?? null);
        echo "</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id=\"report\"></div>
  </div>
</div>
<script ><!--
\$('#input-report').on('change', function (e) {
    if (\$(this).val()) {
        \$('#report').load(this.value);
    }
});

\$('#input-report').trigger('change');
//--></script>
";
        // line 46
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/report/report.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 46,  109 => 28,  106 => 27,  91 => 25,  87 => 24,  78 => 18,  71 => 13,  60 => 11,  56 => 10,  51 => 8,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"button\" data-bs-toggle=\"tooltip\" title=\"{{ button_filter }}\" onclick=\"\$('#filter-report').toggleClass('d-none');\" class=\"btn btn-light d-md-none d-lg-none\"><i class=\"fa-solid fa-filter\"></i></button>
      </div>
      <h1>{{ heading_title }}</h1>
      <ol class=\"breadcrumb\">
        {% for breadcrumb in breadcrumbs %}
          <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
        {% endfor %}
      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card mb-3\">
      <div class=\"card-header\"><i class=\"fa-solid fa-chart-bar\"></i> {{ text_type }}</div>
      <div class=\"card-body\">
        <div class=\"card\">
          <div class=\"card-body bg-light\">
            <div class=\"input-group\">
              <select name=\"report\" id=\"input-report\" class=\"form-select\">
                {% for report in reports %}
                  <option value=\"{{ report.href }}\"{% if code == report.code %} selected{% endif %}>{{ report.text }}</option>
                {% endfor %}
              </select>
              <div class=\"input-group-text\"><i class=\"fa-solid fa-filter\"></i>&nbsp;{{ text_filter }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id=\"report\"></div>
  </div>
</div>
<script ><!--
\$('#input-report').on('change', function (e) {
    if (\$(this).val()) {
        \$('#report').load(this.value);
    }
});

\$('#input-report').trigger('change');
//--></script>
{{ footer }}
", "cp-akis/view/default/plates/report/report.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/report/report.twig");
    }
}
