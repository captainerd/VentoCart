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

/* cp-akis/view//plates/marketplace/modification.twig */
class __TwigTemplate_3f070ddaeebb9ea03873299cb9e230a6 extends Template
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
        <button type=\"button\" id=\"button-refresh\" data-bs-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_refresh"] ?? null);
        echo "\" class=\"btn btn-info\"><i class=\"fa-solid fa-refresh\"></i></button>
        <button type=\"button\" id=\"button-clear\" data-bs-toggle=\"tooltip\" title=\"";
        // line 7
        echo ($context["button_clear"] ?? null);
        echo "\" class=\"btn btn-warning\"><i class=\"fa-solid fa-eraser\"></i></button>
        <button type=\"submit\" form=\"form-modification\" formaction=\"";
        // line 8
        echo ($context["delete"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_delete"] ?? null);
        echo "\" onclick=\"return confirm('";
        echo ($context["text_confirm"] ?? null);
        echo "');\" class=\"btn btn-danger\"><i class=\"fa-regular fa-trash-can\"></i></button>
      </div>
      <h1>";
        // line 10
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 13
            echo "          <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 13);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 13);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"alert alert-info\"><i class=\"fa fa-info-circle\"></i> ";
        // line 19
        echo ($context["text_refresh"] ?? null);
        echo "</div>
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-list\"></i> ";
        // line 21
        echo ($context["text_list"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <ul class=\"nav nav-tabs\">
          <li class=\"nav-item\"><a href=\"#tab-general\" data-bs-toggle=\"tab\" class=\"nav-link active\">";
        // line 24
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
          <li class=\"nav-item\"><a href=\"#tab-log\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 25
        echo ($context["tab_log"] ?? null);
        echo "</a></li>
        </ul>
        <div class=\"tab-content\">
          <div id=\"tab-general\" class=\"tab-pane active\">
            <div id=\"modification\">";
        // line 29
        echo ($context["list"] ?? null);
        echo "</div>
          </div>
          <div id=\"tab-log\" class=\"tab-pane\">
            <p>
              <textarea id=\"input-log\" wrap=\"off\" rows=\"15\" class=\"form-control\">";
        // line 33
        echo ($context["log"] ?? null);
        echo "</textarea>
            </p>
            <div class=\"row row-cols-2\">
              <div class=\"col\"><a href=\"";
        // line 36
        echo ($context["download"] ?? null);
        echo "\" class=\"btn btn-primary w-100\"";
        if ( !($context["download"] ?? null)) {
            echo " disabled";
        }
        echo "><i class=\"fa-solid fa-download\"></i> ";
        echo ($context["button_download"] ?? null);
        echo "</a></div>
              <div class=\"col\"><button type=\"button\" id=\"button-log\" class=\"btn btn-danger w-100\"><i class=\"fa-solid fa-eraser\"></i> ";
        // line 37
        echo ($context["button_clear"] ?? null);
        echo "</button></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script ><!--
\$('#modification').on('click', 'thead a, .pagination a', function(e) {
    e.preventDefault();

    \$('#modification').load(this.href);
});

\$('#button-refresh').on('click', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=marketplace/modification.refresh&user_token=";
        // line 58
        echo ($context["user_token"] ?? null);
        echo "',
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            \$('#input-log').load('index.php?route=marketplace/modification.log&user_token=";
        // line 77
        echo ($context["user_token"] ?? null);
        echo "');
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#button-clear').on('click', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=marketplace/modification.clear&user_token=";
        // line 91
        echo ($context["user_token"] ?? null);
        echo "',
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#modification').on('click', '.btn-success, .btn-danger', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: \$(element).val(),
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#modification').load(\$('#form-modification').attr('data-oc-load'));
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#button-log').on('click', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=tool/log.clear&user_token=";
        // line 155
        echo ($context["user_token"] ?? null);
        echo "&filename=ocmod.log',
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#input-log').load('index.php?route=marketplace/modification.log&user_token=";
        // line 173
        echo ($context["user_token"] ?? null);
        echo "');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});
//--></script>
";
        // line 182
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/marketplace/modification.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  297 => 182,  285 => 173,  264 => 155,  197 => 91,  180 => 77,  158 => 58,  134 => 37,  124 => 36,  118 => 33,  111 => 29,  104 => 25,  100 => 24,  94 => 21,  89 => 19,  83 => 15,  72 => 13,  68 => 12,  63 => 10,  54 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"button\" id=\"button-refresh\" data-bs-toggle=\"tooltip\" title=\"{{ button_refresh }}\" class=\"btn btn-info\"><i class=\"fa-solid fa-refresh\"></i></button>
        <button type=\"button\" id=\"button-clear\" data-bs-toggle=\"tooltip\" title=\"{{ button_clear }}\" class=\"btn btn-warning\"><i class=\"fa-solid fa-eraser\"></i></button>
        <button type=\"submit\" form=\"form-modification\" formaction=\"{{ delete }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_delete }}\" onclick=\"return confirm('{{ text_confirm }}');\" class=\"btn btn-danger\"><i class=\"fa-regular fa-trash-can\"></i></button>
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
    <div class=\"alert alert-info\"><i class=\"fa fa-info-circle\"></i> {{ text_refresh }}</div>
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-list\"></i> {{ text_list }}</div>
      <div class=\"card-body\">
        <ul class=\"nav nav-tabs\">
          <li class=\"nav-item\"><a href=\"#tab-general\" data-bs-toggle=\"tab\" class=\"nav-link active\">{{ tab_general }}</a></li>
          <li class=\"nav-item\"><a href=\"#tab-log\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_log }}</a></li>
        </ul>
        <div class=\"tab-content\">
          <div id=\"tab-general\" class=\"tab-pane active\">
            <div id=\"modification\">{{ list }}</div>
          </div>
          <div id=\"tab-log\" class=\"tab-pane\">
            <p>
              <textarea id=\"input-log\" wrap=\"off\" rows=\"15\" class=\"form-control\">{{ log }}</textarea>
            </p>
            <div class=\"row row-cols-2\">
              <div class=\"col\"><a href=\"{{ download }}\" class=\"btn btn-primary w-100\"{% if not download %} disabled{% endif %}><i class=\"fa-solid fa-download\"></i> {{ button_download }}</a></div>
              <div class=\"col\"><button type=\"button\" id=\"button-log\" class=\"btn btn-danger w-100\"><i class=\"fa-solid fa-eraser\"></i> {{ button_clear }}</button></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script ><!--
\$('#modification').on('click', 'thead a, .pagination a', function(e) {
    e.preventDefault();

    \$('#modification').load(this.href);
});

\$('#button-refresh').on('click', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=marketplace/modification.refresh&user_token={{ user_token }}',
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            \$('#input-log').load('index.php?route=marketplace/modification.log&user_token={{ user_token }}');
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#button-clear').on('click', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=marketplace/modification.clear&user_token={{ user_token }}',
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#modification').on('click', '.btn-success, .btn-danger', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: \$(element).val(),
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#modification').load(\$('#form-modification').attr('data-oc-load'));
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#button-log').on('click', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=tool/log.clear&user_token={{ user_token }}&filename=ocmod.log',
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#input-log').load('index.php?route=marketplace/modification.log&user_token={{ user_token }}');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});
//--></script>
{{ footer }}
", "cp-akis/view//plates/marketplace/modification.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/marketplace/modification.twig");
    }
}
