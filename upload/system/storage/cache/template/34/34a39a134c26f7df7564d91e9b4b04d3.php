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

/* cp-akis/view//plates/design/theme.twig */
class __TwigTemplate_f43e47264f004a18c45892a1e9044923 extends Template
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
\t\t\t<h1>";
        // line 5
        echo ($context["heading_title"] ?? null);
        echo "</h1>
\t\t\t<ol class=\"breadcrumb\">
\t\t\t\t";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 8
            echo "\t\t\t\t\t<li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 8);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 8);
            echo "</a></li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "\t\t\t</ol>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
\t\t<div class=\"card\">
\t\t\t<div class=\"card-header\"><i class=\"fa-solid fa-list\"></i> ";
        // line 15
        echo ($context["text_edit"] ?? null);
        echo "</div>
\t\t\t<div class=\"card-body\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-lg-3 col-md-3 col-sm-12\">
\t\t\t\t\t\t<div class=\"list-group mb-3\">
\t\t\t\t\t\t\t<div class=\"list-group-item\">
\t\t\t\t\t\t\t\t<h4 class=\"list-group-item-heading\">";
        // line 21
        echo ($context["text_theme"] ?? null);
        echo "</h4>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"list-group-item\">
\t\t\t\t\t\t\t\t<select name=\"theme_id\" id=\"input-theme\" class=\"form-select\">
\t\t\t\t\t\t 
\t\t\t\t\t\t\t\t\t";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["themes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
            // line 27
            echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["theme"], "theme_id", [], "any", false, false, false, 27);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["theme"], "name", [], "any", false, false, false, 27);
            echo "</option>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['theme'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"list-group\">
\t\t\t\t\t\t\t<div class=\"list-group-item\">
\t\t\t\t\t\t\t\t<h4 class=\"list-group-item-heading\">";
        // line 34
        echo ($context["text_template"] ?? null);
        echo "</h4>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"path\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-lg-9 col-md-12\">
\t\t\t\t\t\t<div class=\"alert alert-info\"><i class=\"fa-solid fa-info-circle\"></i> ";
        // line 40
        echo ($context["text_twig"] ?? null);
        echo "</div>
\t\t\t\t\t\t<div id=\"recent\">
\t\t\t\t\t\t\t<fieldset>
\t\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t</fieldset>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div id=\"code\" style=\"display: none;\">
\t\t\t\t\t\t\t<ul class=\"nav nav-tabs\"></ul>
\t\t\t\t\t\t\t<div class=\"tab-content\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<link href=\"view/javascript/codemirror/lib/codemirror.css\" rel=\"stylesheet\"/>
<link href=\"view/javascript/codemirror/theme/monokai.css\" rel=\"stylesheet\"/>
<script  src=\"view/javascript/codemirror/lib/codemirror.js\"></script>
<script  src=\"view/javascript/codemirror/mode/xml/xml.js\"></script>
<script  src=\"view/javascript/codemirror/mode/htmlmixed/htmlmixed.js\"></script>
<script ><!--
\$('#input-theme').on('change', function (e) {
    var element = this;

    \$.ajax({
        url: 'index.php?route=design/theme.path&user_token=";
        // line 66
        echo ($context["user_token"] ?? null);
        echo "&theme_id=' + \$(element).val(),
        dataType: 'json',
        beforeSend: function () {
            \$(element).prop('disabled', true);
        },
        complete: function () {
            \$(element).prop('disabled', false);
        },
        success: function (json) {
            html = '';

            if (json['directory']) {
                for (i = 0; i < json['directory'].length; i++) {
                    html += '<a href=\"' + json['directory'][i]['path'] + '\" class=\"list-group-item list-group-item-action directory\">' + json['directory'][i]['name'] + ' <i class=\"fa-solid fa-arrow-right fa-fw float-end\"></i></a>';
                }
            }

            if (json['file']) {
                for (i = 0; i < json['file'].length; i++) {
                    html += '<a href=\"' + json['file'][i]['path'] + '\" class=\"list-group-item list-group-item-action file\">' + json['file'][i]['name'] + ' <i class=\"fa-solid fa-arrow-right fa-fw float-end\"></i></a>';
                }
            }

            \$('#path').html(html);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-theme').trigger('change');

\$('#path').on('click', 'a.directory', function (e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=design/theme.path&user_token=";
        // line 105
        echo ($context["user_token"] ?? null);
        echo "&theme_id=' + \$('#input-theme').val() + '&path=' + \$(element).attr('href'),
        dataType: 'json',
        beforeSend: function () {
            \$(element).find('i').removeClass('fa-arrow-right');
            \$(element).find('i').addClass('fa-circle-notch fa-spin');
        },
        complete: function () {
            \$(element).find('i').removeClass('fa-circle-notch fa-spin');
            \$(element).find('i').addClass('fa-arrow-right');
        },
        success: function (json) {
            html = '';

            if (json['directory']) {
                for (i = 0; i < json['directory'].length; i++) {
                    html += '<a href=\"' + json['directory'][i]['path'] + '\" class=\"list-group-item list-group-item-action directory\">' + json['directory'][i]['name'] + ' <i class=\"fa-solid fa-arrow-right fa-fw float-end\"></i></a>';
                }
            }

            if (json['file']) {
                for (i = 0; i < json['file'].length; i++) {
                    html += '<a href=\"' + json['file'][i]['path'] + '\" class=\"list-group-item list-group-item-action file\">' + json['file'][i]['name'] + ' <i class=\"fa-solid fa-arrow-right fa-fw float-end\"></i></a>';
                }
            }

            if (json['extension']) {
                if (json['extension']['directory']) {
                    for (i = 0; i < json['extension']['directory'].length; i++) {
                        html += '<a href=\"' + json['extension']['directory'][i]['path'] + '\" class=\"list-group-item list-group-item-action directory\">' + json['extension']['directory'][i]['name'] + ' <i class=\"fa-solid fa-arrow-right fa-fw float-end\"></i></a>';
                    }
                }

                if (json['extension']['file']) {
                    for (i = 0; i < json['extension']['file'].length; i++) {
                        html += '<a href=\"' + json['extension']['file'][i]['path'] + '\" class=\"list-group-item list-group-item-action file\">' + json['extension']['file'][i]['name'] + ' <i class=\"fa-solid fa-arrow-right fa-fw float-end\"></i></a>';
                    }
                }
            }

            if (json['back']) {
                html += '<a href=\"' + json['back']['path'] + '\" class=\"list-group-item list-group-item-action directory\">' + json['back']['name'] + ' <i class=\"fa-solid fa-arrow-left fa-fw float-end\"></i></a>';
            }

            \$('#path').html(html);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

var editor = [];

\$('#path').on('click', 'a.file', function (e) {
    e.preventDefault();

    var element = this;

    // Check if the file has an extension
    var pos = \$(element).attr('href').lastIndexOf('.');

    if (pos != -1) {
        var tab_id = \$('#input-theme').val() + '-' + \$(element).attr('href').slice(0, pos).replace(/\\//g, '-').replace(/_/g, '-');
    } else {
        var tab_id = \$('#input-theme').val() + '-' + \$(element).attr('href').replace(/\\//g, '-').replace(/_/g, '-');
    }
 
    if (!editor['#tab-' + tab_id]) {
        editor['#tab-' + tab_id] = \$.ajax({
            url: 'index.php?route=design/theme.template&user_token=";
        // line 174
        echo ($context["user_token"] ?? null);
        echo "&theme_id=' + \$('#input-theme').val() + '&path=' + \$(element).attr('href'),
            dataType: 'json',
            beforeSend: function () {
                \$(element).find('i').removeClass('fa-arrow-right');
                \$(element).find('i').addClass('fa-circle-notch fa-spin');
            },
            complete: function () {
                \$(element).find('i').removeClass('fa-circle-notch fa-spin');
                \$(element).find('i').addClass('fa-arrow-right');
            },
            success: function (json) {
                if (json['code']) {
                    \$('#code').show();
                    \$('#recent').hide();

                    \$('.nav-tabs').append('<li class=\"nav-item\"><a href=\"#tab-' + tab_id + '\" data-bs-toggle=\"tab\" class=\"nav-link\">' + \$(element).attr('href').split('/').join(' / ') + '&nbsp;&nbsp;<i class=\"fa-solid fa-minus-circle\"></i></a></li>');

                    html = '<div class=\"tab-pane\" id=\"tab-' + tab_id + '\">';
                    html += '  <textarea name=\"code\" id=\"input-code-'  +  tab_id + '\" rows=\"10\" class=\"form-control\"></textarea>';
                    html += '  <input type=\"hidden\" name=\"theme_id\" value=\"' + \$('#input-theme').val() + '\" id=\"input-' + tab_id + '-theme\"/>';
                    html += '  <input type=\"hidden\" name=\"path\" value=\"' + \$(element).attr('href') + '\" id=\"input-' + tab_id + '-path\"/>';
                    html += '  <br/>';
                    html += '  <div class=\"float-end\">';
                    html += '    <button type=\"button\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> ";
        // line 197
        echo twig_escape_filter($this->env, ($context["button_save"] ?? null), "js");
        echo "</button>';
                 
                    html += '  </div>';
                    html += '</div>';

                    \$('.tab-content').append(html);

                    \$('.nav-tabs a[href=\\'#tab-' + tab_id + '\\']').tab('show');

                    // Initialize codemirrror
                    var codemirror = CodeMirror.fromTextArea(document.querySelector('#input-code-'  +  tab_id), {
                        mode: 'text/html',
                        lineNumbers: true,
                        lineWrapping: true,
                        autofocus: true,
                        theme: 'monokai'
                    });

                    codemirror.setValue(json['code']);
                    codemirror.setSize('100%', '500px');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    } else {
        \$('.nav-tabs a[href=\\'#tab-' + tab_id + '\\']').tab('show');
    }
});

\$('#code .nav-tabs').on('click', 'i.fas.fa-minus-circle', function (e) {
    e.preventDefault();

    // 1. Remove tab functionality
    \$(this).parent().removeAttr('data-bs-toggle');

    var remove = \$(this).parent().attr('href');

    // 2. Remove entry in the editor array
    if (editor[remove]) {
        delete editor[remove];
    }

    // 3. Remove the tab
    \$(this).parent().parent().remove();

    // 4. Remove the tab panel
    \$(remove).remove();

    if (\$(this).parent().hasClass('active')) {
        \$('.nav-tabs li:last-child a').tab('show');
    }

    if (!\$('#code > ul > li').length) {
        \$('#code').hide();
        \$('#recent').show();
    }


});

\$('.tab-content').on('click', '.btn-primary', function (e) {
    var element = this;

    var editor = \$('.tab-content .active .CodeMirror')[0].CodeMirror;

    \$.ajax({
        url: 'index.php?route=design/theme.save&user_token=";
        // line 265
        echo ($context["user_token"] ?? null);
        echo "&theme_id=' + \$('.tab-content .active input[name=\\'theme_id\\']').val() + '&path=' + \$('.tab-content .active input[name=\\'path\\']').val(),
        type: 'post',
        data: 'code=' + encodeURIComponent(editor.getValue()),
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
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + '  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + '  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

       
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

 
 

 
 

 
//--></script>
";
        // line 302
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/design/theme.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  400 => 302,  360 => 265,  289 => 197,  263 => 174,  191 => 105,  149 => 66,  120 => 40,  111 => 34,  104 => 29,  93 => 27,  89 => 26,  81 => 21,  72 => 15,  65 => 10,  54 => 8,  50 => 7,  45 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
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
\t\t\t<div class=\"card-header\"><i class=\"fa-solid fa-list\"></i> {{ text_edit }}</div>
\t\t\t<div class=\"card-body\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-lg-3 col-md-3 col-sm-12\">
\t\t\t\t\t\t<div class=\"list-group mb-3\">
\t\t\t\t\t\t\t<div class=\"list-group-item\">
\t\t\t\t\t\t\t\t<h4 class=\"list-group-item-heading\">{{ text_theme }}</h4>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"list-group-item\">
\t\t\t\t\t\t\t\t<select name=\"theme_id\" id=\"input-theme\" class=\"form-select\">
\t\t\t\t\t\t 
\t\t\t\t\t\t\t\t\t{% for theme in themes %}
\t\t\t\t\t\t\t\t\t\t<option value=\"{{ theme.theme_id }}\">{{ theme.name }}</option>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"list-group\">
\t\t\t\t\t\t\t<div class=\"list-group-item\">
\t\t\t\t\t\t\t\t<h4 class=\"list-group-item-heading\">{{ text_template }}</h4>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"path\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-lg-9 col-md-12\">
\t\t\t\t\t\t<div class=\"alert alert-info\"><i class=\"fa-solid fa-info-circle\"></i> {{ text_twig }}</div>
\t\t\t\t\t\t<div id=\"recent\">
\t\t\t\t\t\t\t<fieldset>
\t\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t</fieldset>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div id=\"code\" style=\"display: none;\">
\t\t\t\t\t\t\t<ul class=\"nav nav-tabs\"></ul>
\t\t\t\t\t\t\t<div class=\"tab-content\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<link href=\"view/javascript/codemirror/lib/codemirror.css\" rel=\"stylesheet\"/>
<link href=\"view/javascript/codemirror/theme/monokai.css\" rel=\"stylesheet\"/>
<script  src=\"view/javascript/codemirror/lib/codemirror.js\"></script>
<script  src=\"view/javascript/codemirror/mode/xml/xml.js\"></script>
<script  src=\"view/javascript/codemirror/mode/htmlmixed/htmlmixed.js\"></script>
<script ><!--
\$('#input-theme').on('change', function (e) {
    var element = this;

    \$.ajax({
        url: 'index.php?route=design/theme.path&user_token={{ user_token }}&theme_id=' + \$(element).val(),
        dataType: 'json',
        beforeSend: function () {
            \$(element).prop('disabled', true);
        },
        complete: function () {
            \$(element).prop('disabled', false);
        },
        success: function (json) {
            html = '';

            if (json['directory']) {
                for (i = 0; i < json['directory'].length; i++) {
                    html += '<a href=\"' + json['directory'][i]['path'] + '\" class=\"list-group-item list-group-item-action directory\">' + json['directory'][i]['name'] + ' <i class=\"fa-solid fa-arrow-right fa-fw float-end\"></i></a>';
                }
            }

            if (json['file']) {
                for (i = 0; i < json['file'].length; i++) {
                    html += '<a href=\"' + json['file'][i]['path'] + '\" class=\"list-group-item list-group-item-action file\">' + json['file'][i]['name'] + ' <i class=\"fa-solid fa-arrow-right fa-fw float-end\"></i></a>';
                }
            }

            \$('#path').html(html);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-theme').trigger('change');

\$('#path').on('click', 'a.directory', function (e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=design/theme.path&user_token={{ user_token }}&theme_id=' + \$('#input-theme').val() + '&path=' + \$(element).attr('href'),
        dataType: 'json',
        beforeSend: function () {
            \$(element).find('i').removeClass('fa-arrow-right');
            \$(element).find('i').addClass('fa-circle-notch fa-spin');
        },
        complete: function () {
            \$(element).find('i').removeClass('fa-circle-notch fa-spin');
            \$(element).find('i').addClass('fa-arrow-right');
        },
        success: function (json) {
            html = '';

            if (json['directory']) {
                for (i = 0; i < json['directory'].length; i++) {
                    html += '<a href=\"' + json['directory'][i]['path'] + '\" class=\"list-group-item list-group-item-action directory\">' + json['directory'][i]['name'] + ' <i class=\"fa-solid fa-arrow-right fa-fw float-end\"></i></a>';
                }
            }

            if (json['file']) {
                for (i = 0; i < json['file'].length; i++) {
                    html += '<a href=\"' + json['file'][i]['path'] + '\" class=\"list-group-item list-group-item-action file\">' + json['file'][i]['name'] + ' <i class=\"fa-solid fa-arrow-right fa-fw float-end\"></i></a>';
                }
            }

            if (json['extension']) {
                if (json['extension']['directory']) {
                    for (i = 0; i < json['extension']['directory'].length; i++) {
                        html += '<a href=\"' + json['extension']['directory'][i]['path'] + '\" class=\"list-group-item list-group-item-action directory\">' + json['extension']['directory'][i]['name'] + ' <i class=\"fa-solid fa-arrow-right fa-fw float-end\"></i></a>';
                    }
                }

                if (json['extension']['file']) {
                    for (i = 0; i < json['extension']['file'].length; i++) {
                        html += '<a href=\"' + json['extension']['file'][i]['path'] + '\" class=\"list-group-item list-group-item-action file\">' + json['extension']['file'][i]['name'] + ' <i class=\"fa-solid fa-arrow-right fa-fw float-end\"></i></a>';
                    }
                }
            }

            if (json['back']) {
                html += '<a href=\"' + json['back']['path'] + '\" class=\"list-group-item list-group-item-action directory\">' + json['back']['name'] + ' <i class=\"fa-solid fa-arrow-left fa-fw float-end\"></i></a>';
            }

            \$('#path').html(html);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

var editor = [];

\$('#path').on('click', 'a.file', function (e) {
    e.preventDefault();

    var element = this;

    // Check if the file has an extension
    var pos = \$(element).attr('href').lastIndexOf('.');

    if (pos != -1) {
        var tab_id = \$('#input-theme').val() + '-' + \$(element).attr('href').slice(0, pos).replace(/\\//g, '-').replace(/_/g, '-');
    } else {
        var tab_id = \$('#input-theme').val() + '-' + \$(element).attr('href').replace(/\\//g, '-').replace(/_/g, '-');
    }
 
    if (!editor['#tab-' + tab_id]) {
        editor['#tab-' + tab_id] = \$.ajax({
            url: 'index.php?route=design/theme.template&user_token={{ user_token }}&theme_id=' + \$('#input-theme').val() + '&path=' + \$(element).attr('href'),
            dataType: 'json',
            beforeSend: function () {
                \$(element).find('i').removeClass('fa-arrow-right');
                \$(element).find('i').addClass('fa-circle-notch fa-spin');
            },
            complete: function () {
                \$(element).find('i').removeClass('fa-circle-notch fa-spin');
                \$(element).find('i').addClass('fa-arrow-right');
            },
            success: function (json) {
                if (json['code']) {
                    \$('#code').show();
                    \$('#recent').hide();

                    \$('.nav-tabs').append('<li class=\"nav-item\"><a href=\"#tab-' + tab_id + '\" data-bs-toggle=\"tab\" class=\"nav-link\">' + \$(element).attr('href').split('/').join(' / ') + '&nbsp;&nbsp;<i class=\"fa-solid fa-minus-circle\"></i></a></li>');

                    html = '<div class=\"tab-pane\" id=\"tab-' + tab_id + '\">';
                    html += '  <textarea name=\"code\" id=\"input-code-'  +  tab_id + '\" rows=\"10\" class=\"form-control\"></textarea>';
                    html += '  <input type=\"hidden\" name=\"theme_id\" value=\"' + \$('#input-theme').val() + '\" id=\"input-' + tab_id + '-theme\"/>';
                    html += '  <input type=\"hidden\" name=\"path\" value=\"' + \$(element).attr('href') + '\" id=\"input-' + tab_id + '-path\"/>';
                    html += '  <br/>';
                    html += '  <div class=\"float-end\">';
                    html += '    <button type=\"button\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> {{ button_save|escape('js') }}</button>';
                 
                    html += '  </div>';
                    html += '</div>';

                    \$('.tab-content').append(html);

                    \$('.nav-tabs a[href=\\'#tab-' + tab_id + '\\']').tab('show');

                    // Initialize codemirrror
                    var codemirror = CodeMirror.fromTextArea(document.querySelector('#input-code-'  +  tab_id), {
                        mode: 'text/html',
                        lineNumbers: true,
                        lineWrapping: true,
                        autofocus: true,
                        theme: 'monokai'
                    });

                    codemirror.setValue(json['code']);
                    codemirror.setSize('100%', '500px');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    } else {
        \$('.nav-tabs a[href=\\'#tab-' + tab_id + '\\']').tab('show');
    }
});

\$('#code .nav-tabs').on('click', 'i.fas.fa-minus-circle', function (e) {
    e.preventDefault();

    // 1. Remove tab functionality
    \$(this).parent().removeAttr('data-bs-toggle');

    var remove = \$(this).parent().attr('href');

    // 2. Remove entry in the editor array
    if (editor[remove]) {
        delete editor[remove];
    }

    // 3. Remove the tab
    \$(this).parent().parent().remove();

    // 4. Remove the tab panel
    \$(remove).remove();

    if (\$(this).parent().hasClass('active')) {
        \$('.nav-tabs li:last-child a').tab('show');
    }

    if (!\$('#code > ul > li').length) {
        \$('#code').hide();
        \$('#recent').show();
    }


});

\$('.tab-content').on('click', '.btn-primary', function (e) {
    var element = this;

    var editor = \$('.tab-content .active .CodeMirror')[0].CodeMirror;

    \$.ajax({
        url: 'index.php?route=design/theme.save&user_token={{ user_token }}&theme_id=' + \$('.tab-content .active input[name=\\'theme_id\\']').val() + '&path=' + \$('.tab-content .active input[name=\\'path\\']').val(),
        type: 'post',
        data: 'code=' + encodeURIComponent(editor.getValue()),
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
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + '  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + '  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

       
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

 
 

 
 

 
//--></script>
{{ footer }}
", "cp-akis/view//plates/design/theme.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/design/theme.twig");
    }
}
