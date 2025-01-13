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

/* cp-akis/view//plates/marketplace/cron.twig */
class __TwigTemplate_31a1e2691b75e44fc2be21c4360b8e31 extends Template
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
        <button type=\"submit\" form=\"form-cron\" formaction=\"";
        // line 6
        echo ($context["delete"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_delete"] ?? null);
        echo "\" onclick=\"return confirm('";
        echo ($context["text_confirm"] ?? null);
        echo "');\" class=\"btn btn-danger\"><i class=\"fa-regular fa-trash-can\"></i></button>
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
      <div class=\"card-header\"><i class=\"fa-solid fa-question-circle\"></i> ";
        // line 18
        echo ($context["text_instruction"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <p>";
        // line 20
        echo ($context["text_cron_1"] ?? null);
        echo "</p>
        <p>";
        // line 21
        echo ($context["text_cron_2"] ?? null);
        echo "</p>
        <div class=\"mb-3\">
          <div class=\"input-group\">
            <div class=\"input-group-text\">";
        // line 24
        echo ($context["entry_cron"] ?? null);
        echo "</div>
            <input type=\"text\" value=\"wget &quot;";
        // line 25
        echo ($context["cron"] ?? null);
        echo "&quot; --read-timeout=5400\" id=\"input-cron\" class=\"form-control\"/>
            <button type=\"button\" id=\"button-copy\" data-bs-toggle=\"tooltip\" title=\"";
        // line 26
        echo ($context["button_copy"] ?? null);
        echo "\" class=\"btn btn-light\"><i class=\"fa-regular fa-copy\"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-list\"></i> ";
        // line 32
        echo ($context["text_list"] ?? null);
        echo "</div>
      <div id=\"cron\" class=\"card-body\">";
        // line 33
        echo ($context["list"] ?? null);
        echo "</div>
    </div>
  </div>
</div>
<script ><!--
\$('#cron').on('click', 'thead a, .pagination a', function (e) {
    e.preventDefault();

    \$('#cron').load(this.href);
});

\$('#button-copy').on('click', function () {
    var copyText = document.getElementById('input-cron');

    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);
});

\$('#cron').on('click', '.btn-success, .btn-warning, .btn-danger', function () {
    var element = this;

    \$.ajax({
        url: \$(element).val(),
        dataType: 'json',
        beforeSend: function () {
            \$(element).button('loading');
        },
        complete: function () {
            \$(element).button('reset');
        },
        success: function (json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#cron').load(\$('#form-cron').attr('data-oc-load'));
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});
//--></script>
";
        // line 86
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/marketplace/cron.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 86,  118 => 33,  114 => 32,  105 => 26,  101 => 25,  97 => 24,  91 => 21,  87 => 20,  82 => 18,  75 => 13,  64 => 11,  60 => 10,  55 => 8,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"submit\" form=\"form-cron\" formaction=\"{{ delete }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_delete }}\" onclick=\"return confirm('{{ text_confirm }}');\" class=\"btn btn-danger\"><i class=\"fa-regular fa-trash-can\"></i></button>
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
      <div class=\"card-header\"><i class=\"fa-solid fa-question-circle\"></i> {{ text_instruction }}</div>
      <div class=\"card-body\">
        <p>{{ text_cron_1 }}</p>
        <p>{{ text_cron_2 }}</p>
        <div class=\"mb-3\">
          <div class=\"input-group\">
            <div class=\"input-group-text\">{{ entry_cron }}</div>
            <input type=\"text\" value=\"wget &quot;{{ cron }}&quot; --read-timeout=5400\" id=\"input-cron\" class=\"form-control\"/>
            <button type=\"button\" id=\"button-copy\" data-bs-toggle=\"tooltip\" title=\"{{ button_copy }}\" class=\"btn btn-light\"><i class=\"fa-regular fa-copy\"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-list\"></i> {{ text_list }}</div>
      <div id=\"cron\" class=\"card-body\">{{ list }}</div>
    </div>
  </div>
</div>
<script ><!--
\$('#cron').on('click', 'thead a, .pagination a', function (e) {
    e.preventDefault();

    \$('#cron').load(this.href);
});

\$('#button-copy').on('click', function () {
    var copyText = document.getElementById('input-cron');

    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);
});

\$('#cron').on('click', '.btn-success, .btn-warning, .btn-danger', function () {
    var element = this;

    \$.ajax({
        url: \$(element).val(),
        dataType: 'json',
        beforeSend: function () {
            \$(element).button('loading');
        },
        complete: function () {
            \$(element).button('reset');
        },
        success: function (json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#cron').load(\$('#form-cron').attr('data-oc-load'));
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});
//--></script>
{{ footer }}
", "cp-akis/view//plates/marketplace/cron.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/marketplace/cron.twig");
    }
}
