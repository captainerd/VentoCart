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

/* cp-akis/view//plates/common/dashboard.twig */
class __TwigTemplate_41a561c09bb061126adab7df18220a40 extends Template
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
 
      </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 20
        if (($context["new_version"] ?? null)) {
            // line 21
            echo "    <div class=\"container mt-4\">
      <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
          <strong>Attention!</strong> A new version is available:  <strong>";
            // line 23
            echo ($context["new_version"] ?? null);
            echo "</strong> You are using ";
            echo ($context["installed_version"] ?? null);
            echo " Please visit VentoCart project to update.
       
      </div>
  </div>
        ";
        }
        // line 28
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 29
            echo "      <div class=\"row\">
        
        ";
            // line 31
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["row"]);
            foreach ($context['_seq'] as $context["_key"] => $context["dashboard_1"]) {
                // line 32
                echo "          ";
                $context["class"] = twig_sprintf("col-lg-%s %s", twig_get_attribute($this->env, $this->source, $context["dashboard_1"], "width", [], "any", false, false, false, 32), "col-md-3 col-sm-6");
                // line 33
                echo "          ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["row"]);
                foreach ($context['_seq'] as $context["_key"] => $context["dashboard_2"]) {
                    // line 34
                    echo "            ";
                    if ((twig_get_attribute($this->env, $this->source, $context["dashboard_2"], "width", [], "any", false, false, false, 34) > 3)) {
                        // line 35
                        echo "              ";
                        $context["class"] = twig_sprintf("col-lg-%s %s", twig_get_attribute($this->env, $this->source, $context["dashboard_1"], "width", [], "any", false, false, false, 35), "col-md-12 col-sm-12");
                        // line 36
                        echo "            ";
                    }
                    // line 37
                    echo "          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dashboard_2'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 38
                echo "          <div class=\"";
                echo ($context["class"] ?? null);
                echo " mb-3\">";
                echo twig_get_attribute($this->env, $this->source, $context["dashboard_1"], "output", [], "any", false, false, false, 38);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dashboard_1'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "  </div>
  
  ";
        // line 44
        echo ($context["security"] ?? null);
        echo "
</div>
<script ><!--
\$('#button-setting').on('click', function () {
    \$.ajax({
        url: 'index.php?route=common/developer&user_token=";
        // line 49
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
        // line 72
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
        // line 102
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
        // line 127
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/common/dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  253 => 127,  225 => 102,  192 => 72,  166 => 49,  158 => 44,  154 => 42,  147 => 40,  136 => 38,  130 => 37,  127 => 36,  124 => 35,  121 => 34,  116 => 33,  113 => 32,  109 => 31,  105 => 29,  100 => 28,  90 => 23,  86 => 21,  84 => 20,  77 => 15,  66 => 13,  62 => 12,  56 => 10,  50 => 7,  47 => 6,  45 => 5,  37 => 1,);
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
 
      </div>
  </div>
  <div class=\"container-fluid\">
    {% if new_version %}
    <div class=\"container mt-4\">
      <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
          <strong>Attention!</strong> A new version is available:  <strong>{{new_version}}</strong> You are using {{installed_version}} Please visit VentoCart project to update.
       
      </div>
  </div>
        {% endif %}
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
<script ><!--
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
{{ footer }}", "cp-akis/view//plates/common/dashboard.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/common/dashboard.twig");
    }
}
