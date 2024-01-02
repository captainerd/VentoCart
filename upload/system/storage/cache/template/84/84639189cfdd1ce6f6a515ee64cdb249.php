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

/* admin/view/template/common/dashboard.twig */
class __TwigTemplate_45e8368af52240409aa384f2989677e0 extends Template
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
      ";
        // line 5
        if (($context["developer_status"] ?? null)) {
            // line 6
            echo "        <div class=\"float-end\">
          <button type=\"button\" id=\"button-setting\" data-bs-toggle=\"tooltip\" title=\"";
            // line 7
            echo ($context["button_developer"] ?? null);
            echo "\" class=\"btn btn-info\"><i class=\"fa-solid fa-cog\"></i></button>
        </div>
      ";
        }
        // line 10
        echo "      <h1>";
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
      <button id=\"security_modal\" style=\"font-size:  32px; color: #0063f7\" class=\"fa-regular nav-link   fa-solid fa-cog\"></button>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 21
            echo "      <div class=\"row\">
        ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["row"]);
            foreach ($context['_seq'] as $context["_key"] => $context["dashboard_1"]) {
                // line 23
                echo "          ";
                $context["class"] = twig_sprintf("col-lg-%s %s", twig_get_attribute($this->env, $this->source, $context["dashboard_1"], "width", [], "any", false, false, false, 23), "col-md-3 col-sm-6");
                // line 24
                echo "          ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["row"]);
                foreach ($context['_seq'] as $context["_key"] => $context["dashboard_2"]) {
                    // line 25
                    echo "            ";
                    if ((twig_get_attribute($this->env, $this->source, $context["dashboard_2"], "width", [], "any", false, false, false, 25) > 3)) {
                        // line 26
                        echo "              ";
                        $context["class"] = twig_sprintf("col-lg-%s %s", twig_get_attribute($this->env, $this->source, $context["dashboard_1"], "width", [], "any", false, false, false, 26), "col-md-12 col-sm-12");
                        // line 27
                        echo "            ";
                    }
                    // line 28
                    echo "          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dashboard_2'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 29
                echo "          <div class=\"";
                echo ($context["class"] ?? null);
                echo " mb-3\">";
                echo twig_get_attribute($this->env, $this->source, $context["dashboard_1"], "output", [], "any", false, false, false, 29);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dashboard_1'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "  </div>
  ";
        // line 34
        echo ($context["security"] ?? null);
        echo "
</div>
<script type=\"text/javascript\"><!--
\$('#button-setting').on('click', function () {
    \$.ajax({
        url: 'index.php?route=common/developer&user_token=";
        // line 39
        echo ($context["user_token"] ?? null);
        echo "',
        dataType: 'html',
        beforeSend: function () {
            \$('#button-setting').button('loading');
        },
        complete: function () {
            \$('#button-setting').button('reset');
        },
        success: function (html) {
            \$('#modal-developer').remove();

            \$('body').prepend(html);

            \$('#modal-developer').modal('show');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('input[name=\\'developer_sass\\']').on('change', function () {
    \$.ajax({
        url: 'index.php?route=common/developer.edit&user_token=";
        // line 62
        echo ($context["user_token"] ?? null);
        echo "',
        type: 'post',
        data: \$('input[name=\\'developer_sass\\']:checked'),
        dataType: 'json',
        beforeSend: function () {
            \$('input[name=\\'developer_sass\\']').prop('disabled', true);
        },
        complete: function () {
            \$('input[name=\\'developer_sass\\']').prop('disabled', false);
        },
        success: function (json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#modal-developer .modal-body').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }
            if (json['success']) {
                \$('#modal-developer .modal-body').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#modal-developer table button').on('click', function () {
    var element = this;

    \$.ajax({
        url: 'index.php?route=common/developer.' + \$(element).attr('value') + '&user_token=";
        // line 92
        echo ($context["user_token"] ?? null);
        echo "',
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
                \$('#modal-developer .modal-body').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#modal-developer .modal-body').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});
//--></script>
";
        // line 117
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "admin/view/template/common/dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  234 => 117,  206 => 92,  173 => 62,  147 => 39,  139 => 34,  136 => 33,  129 => 31,  118 => 29,  112 => 28,  109 => 27,  106 => 26,  103 => 25,  98 => 24,  95 => 23,  91 => 22,  88 => 21,  84 => 20,  77 => 15,  66 => 13,  62 => 12,  56 => 10,  50 => 7,  47 => 6,  45 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      {% if developer_status %}
        <div class=\"float-end\">
          <button type=\"button\" id=\"button-setting\" data-bs-toggle=\"tooltip\" title=\"{{ button_developer }}\" class=\"btn btn-info\"><i class=\"fa-solid fa-cog\"></i></button>
        </div>
      {% endif %}
      <h1>{{ heading_title }}</h1>
      <ol class=\"breadcrumb\">
        {% for breadcrumb in breadcrumbs %}
          <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
        {% endfor %}
      </ol>
      <button id=\"security_modal\" style=\"font-size:  32px; color: #0063f7\" class=\"fa-regular nav-link   fa-solid fa-cog\"></button>
    </div>
  </div>
  <div class=\"container-fluid\">
    {% for row in rows %}
      <div class=\"row\">
        {% for dashboard_1 in row %}
          {% set class = 'col-lg-%s %s'|format(dashboard_1.width, 'col-md-3 col-sm-6') %}
          {% for dashboard_2 in row %}
            {% if dashboard_2.width > 3 %}
              {% set class = 'col-lg-%s %s'|format(dashboard_1.width, 'col-md-12 col-sm-12') %}
            {% endif %}
          {% endfor %}
          <div class=\"{{ class }} mb-3\">{{ dashboard_1.output }}</div>
        {% endfor %}
      </div>
    {% endfor %}
  </div>
  {{ security }}
</div>
<script type=\"text/javascript\"><!--
\$('#button-setting').on('click', function () {
    \$.ajax({
        url: 'index.php?route=common/developer&user_token={{ user_token }}',
        dataType: 'html',
        beforeSend: function () {
            \$('#button-setting').button('loading');
        },
        complete: function () {
            \$('#button-setting').button('reset');
        },
        success: function (html) {
            \$('#modal-developer').remove();

            \$('body').prepend(html);

            \$('#modal-developer').modal('show');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('input[name=\\'developer_sass\\']').on('change', function () {
    \$.ajax({
        url: 'index.php?route=common/developer.edit&user_token={{ user_token }}',
        type: 'post',
        data: \$('input[name=\\'developer_sass\\']:checked'),
        dataType: 'json',
        beforeSend: function () {
            \$('input[name=\\'developer_sass\\']').prop('disabled', true);
        },
        complete: function () {
            \$('input[name=\\'developer_sass\\']').prop('disabled', false);
        },
        success: function (json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#modal-developer .modal-body').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }
            if (json['success']) {
                \$('#modal-developer .modal-body').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#modal-developer table button').on('click', function () {
    var element = this;

    \$.ajax({
        url: 'index.php?route=common/developer.' + \$(element).attr('value') + '&user_token={{ user_token }}',
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
                \$('#modal-developer .modal-body').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#modal-developer .modal-body').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});
//--></script>
{{ footer }}", "admin/view/template/common/dashboard.twig", "/var/www/html/admin/view/template/common/dashboard.twig");
    }
}
