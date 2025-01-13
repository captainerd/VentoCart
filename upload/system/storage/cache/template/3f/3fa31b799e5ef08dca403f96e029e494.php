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

/* cp-akis/view/default/plates/marketplace/installer.twig */
class __TwigTemplate_b1ede0395e8419fbe71b8aaffd75699c extends Template
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
      <div class=\"float-end\"><button type=\"button\" id=\"button-upload\" data-bs-toggle=\"tooltip\" title=\"";
        // line 5
        echo ($context["button_upload"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-upload\"></i> ";
        echo ($context["button_upload"] ?? null);
        echo "</button></div>
      <h1>";
        // line 6
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 9
            echo "          <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 9);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 9);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-puzzle-piece\"></i> ";
        // line 16
        echo ($context["heading_title"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <fieldset>
          <legend>";
        // line 19
        echo ($context["text_progress"] ?? null);
        echo "</legend>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">";
        // line 21
        echo ($context["entry_progress"] ?? null);
        echo "</label>
            <div class=\"col-sm-10 mt-2\">
              <div class=\"progress\">
                <div id=\"progress-bar\" class=\"progress-bar\" style=\"width: 0%;\"></div>
              </div>
              <div id=\"progress-text\"></div>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>";
        // line 31
        echo ($context["text_installed"] ?? null);
        echo "</legend>
          <div id=\"extension\">";
        // line 32
        echo ($context["list"] ?? null);
        echo "</div>
        </fieldset>
      </div>
    </div>
  </div>
</div>
<script ><!--
\$('#extension').on('click', 'thead a, .pagination a', function (e) {
    e.preventDefault();

    \$('#extension').load(this.href);
});

// Upload
\$('#button-upload').on('click', function () {
    var element = this;

    if (!\$('#button-upload').prop('disabled')) {
        \$('#form-upload').remove();

        \$('body').prepend('<form enctype=\"multipart/form-data\" id=\"form-upload\" style=\"display: none;\"><input type=\"file\" name=\"file\"/></form>');

        \$('#form-upload input[name=\\'file\\']').trigger('click');

        \$('#form-upload input[name=\\'file\\']').on('change', function () {
            if ((this.files[0].size / 1024) > ";
        // line 57
        echo ($context["config_file_max_size"] ?? null);
        echo ") {
                \$(this).val('');

                alert('";
        // line 60
        echo ($context["error_upload_size"] ?? null);
        echo "');
            }

            if (!this.files[0].name.endsWith('.vemod.zip') && !this.files[0].name.endsWith('.vetheme.zip')) {
                \$(this).val('');

                alert('";
        // line 66
        echo ($context["error_filetype"] ?? null);
        echo "');
            }
        });

        if (typeof timer != 'undefined') {
            clearInterval(timer);
        }

        timer = setInterval(function () {
            if (\$('#form-upload input[name=\\'file\\']').val() !== '') {
                clearInterval(timer);

                \$.ajax({
                    url: 'index.php?route=marketplace/installer.upload&user_token=";
        // line 79
        echo ($context["user_token"] ?? null);
        echo "',
                    type: 'post',
                    data: new FormData(\$('#form-upload')[0]),
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        \$(element).button('loading');
                    },
                    complete: function () {
                        \$(element).button('reset');
                    },
                    success: function (json) {
                        
                        if (json['error']) {
                            \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                        }

                        if (json['success']) {
                            \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                            \$('#extension').load('index.php?route=marketplace/installer.list&user_token=";
        // line 101
        echo ($context["user_token"] ?? null);
        echo "');
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
                    }
                });
            }
        }, 500);
    }
});
// Install
\$('#extension').on('click', '.btn-success, .btn-warning', function (e) {
    e.preventDefault();

    var element = this;

    \$(element).button('loading');

    var next = \$(element).attr('href');

    \$('#progress-bar').removeClass('bg-danger bg-success').css('width', '0%');
    \$('#progress-text').html('');

    // Recursive installer function
    function installer(nextUrl) {
        \$.ajax({
            url: nextUrl,
            dataType: 'json',
            success: function (json) {
                \$('.alert-dismissible').remove();

                if (json['error']) {
                    \$('#progress-bar').addClass('bg-danger');
                    \$('#progress-text').html('<div class=\"text-danger\">' + json['error'] + '</div>');
                    \$(element).button('reset');
                }

                if (json['text']) {
                    \$('#progress-bar').addClass('bg-success');
                    \$('#progress-text').html('<div class=\"text-success\">' + json['text'] + '</div>');

                         \$('#extension').load('index.php?route=marketplace/installer.list&user_token=";
        // line 143
        echo ($context["user_token"] ?? null);
        echo "');
                }

                if (json['success']) {
                    
                    \$('#progress-bar').addClass('bg-success').css('width', '100%');
                    \$('#progress-text').html('<div class=\"text-success\">' + json['success'] + '</div>');
                    \$(element).button('reset');

                    // Refresh the extension list
                    \$('#extension').load('index.php?route=marketplace/installer.list&user_token=";
        // line 153
        echo ($context["user_token"] ?? null);
        echo "');
                }

                // If there's a next step, recursively call installer
                if (json['next']) {
                    installer(json['next']);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.error(thrownError, xhr.statusText, xhr.responseText);
                \$(element).button('reset');
            }
        });
    }

    // Start the installer with the initial URL
    installer(next);
});

// Delete
\$('#extension').on('click', '.btn-danger', function (e) {
    e.preventDefault();

    var element = this;

    if (confirm('";
        // line 178
        echo ($context["text_confirm"] ?? null);
        echo "')) {
        \$.ajax({
            url: \$(element).attr('href'),
            dataType: 'json',
            beforeSend: function () {
                \$(element).button('loading');
            },
            complete: function () {
                \$(element).button('reset');
            },
            success: function (json) {
                //x console.log(json);

                \$('.alert-dismissible').remove();

                if (json['error']) {
                    \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                if (json['success']) {
                    \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                    \$('#extension').load('index.php?route=marketplace/installer.list&user_token=";
        // line 200
        echo ($context["user_token"] ?? null);
        echo "');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    }
});

\$('.tab-content .btn-danger').on('click', function () {
    var element = this;

    if (confirm('";
        // line 213
        echo ($context["text_confirm"] ?? null);
        echo "')) {
        \$.ajax({
            url: \$(element).attr('value'),
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

                    \$('#' + \$(element).attr('data-oc-target')).val('');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    }
});
//--></script>
";
        // line 243
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/marketplace/installer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  350 => 243,  317 => 213,  301 => 200,  276 => 178,  248 => 153,  235 => 143,  190 => 101,  165 => 79,  149 => 66,  140 => 60,  134 => 57,  106 => 32,  102 => 31,  89 => 21,  84 => 19,  78 => 16,  71 => 11,  60 => 9,  56 => 8,  51 => 6,  45 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\"><button type=\"button\" id=\"button-upload\" data-bs-toggle=\"tooltip\" title=\"{{ button_upload }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-upload\"></i> {{ button_upload }}</button></div>
      <h1>{{ heading_title }}</h1>
      <ol class=\"breadcrumb\">
        {% for breadcrumb in breadcrumbs %}
          <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
        {% endfor %}
      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-puzzle-piece\"></i> {{ heading_title }}</div>
      <div class=\"card-body\">
        <fieldset>
          <legend>{{ text_progress }}</legend>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">{{ entry_progress }}</label>
            <div class=\"col-sm-10 mt-2\">
              <div class=\"progress\">
                <div id=\"progress-bar\" class=\"progress-bar\" style=\"width: 0%;\"></div>
              </div>
              <div id=\"progress-text\"></div>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>{{ text_installed }}</legend>
          <div id=\"extension\">{{ list }}</div>
        </fieldset>
      </div>
    </div>
  </div>
</div>
<script ><!--
\$('#extension').on('click', 'thead a, .pagination a', function (e) {
    e.preventDefault();

    \$('#extension').load(this.href);
});

// Upload
\$('#button-upload').on('click', function () {
    var element = this;

    if (!\$('#button-upload').prop('disabled')) {
        \$('#form-upload').remove();

        \$('body').prepend('<form enctype=\"multipart/form-data\" id=\"form-upload\" style=\"display: none;\"><input type=\"file\" name=\"file\"/></form>');

        \$('#form-upload input[name=\\'file\\']').trigger('click');

        \$('#form-upload input[name=\\'file\\']').on('change', function () {
            if ((this.files[0].size / 1024) > {{ config_file_max_size }}) {
                \$(this).val('');

                alert('{{ error_upload_size }}');
            }

            if (!this.files[0].name.endsWith('.vemod.zip') && !this.files[0].name.endsWith('.vetheme.zip')) {
                \$(this).val('');

                alert('{{ error_filetype }}');
            }
        });

        if (typeof timer != 'undefined') {
            clearInterval(timer);
        }

        timer = setInterval(function () {
            if (\$('#form-upload input[name=\\'file\\']').val() !== '') {
                clearInterval(timer);

                \$.ajax({
                    url: 'index.php?route=marketplace/installer.upload&user_token={{ user_token }}',
                    type: 'post',
                    data: new FormData(\$('#form-upload')[0]),
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        \$(element).button('loading');
                    },
                    complete: function () {
                        \$(element).button('reset');
                    },
                    success: function (json) {
                        
                        if (json['error']) {
                            \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                        }

                        if (json['success']) {
                            \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                            \$('#extension').load('index.php?route=marketplace/installer.list&user_token={{ user_token }}');
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
                    }
                });
            }
        }, 500);
    }
});
// Install
\$('#extension').on('click', '.btn-success, .btn-warning', function (e) {
    e.preventDefault();

    var element = this;

    \$(element).button('loading');

    var next = \$(element).attr('href');

    \$('#progress-bar').removeClass('bg-danger bg-success').css('width', '0%');
    \$('#progress-text').html('');

    // Recursive installer function
    function installer(nextUrl) {
        \$.ajax({
            url: nextUrl,
            dataType: 'json',
            success: function (json) {
                \$('.alert-dismissible').remove();

                if (json['error']) {
                    \$('#progress-bar').addClass('bg-danger');
                    \$('#progress-text').html('<div class=\"text-danger\">' + json['error'] + '</div>');
                    \$(element).button('reset');
                }

                if (json['text']) {
                    \$('#progress-bar').addClass('bg-success');
                    \$('#progress-text').html('<div class=\"text-success\">' + json['text'] + '</div>');

                         \$('#extension').load('index.php?route=marketplace/installer.list&user_token={{ user_token }}');
                }

                if (json['success']) {
                    
                    \$('#progress-bar').addClass('bg-success').css('width', '100%');
                    \$('#progress-text').html('<div class=\"text-success\">' + json['success'] + '</div>');
                    \$(element).button('reset');

                    // Refresh the extension list
                    \$('#extension').load('index.php?route=marketplace/installer.list&user_token={{ user_token }}');
                }

                // If there's a next step, recursively call installer
                if (json['next']) {
                    installer(json['next']);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.error(thrownError, xhr.statusText, xhr.responseText);
                \$(element).button('reset');
            }
        });
    }

    // Start the installer with the initial URL
    installer(next);
});

// Delete
\$('#extension').on('click', '.btn-danger', function (e) {
    e.preventDefault();

    var element = this;

    if (confirm('{{ text_confirm }}')) {
        \$.ajax({
            url: \$(element).attr('href'),
            dataType: 'json',
            beforeSend: function () {
                \$(element).button('loading');
            },
            complete: function () {
                \$(element).button('reset');
            },
            success: function (json) {
                //x console.log(json);

                \$('.alert-dismissible').remove();

                if (json['error']) {
                    \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                if (json['success']) {
                    \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                    \$('#extension').load('index.php?route=marketplace/installer.list&user_token={{ user_token }}');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    }
});

\$('.tab-content .btn-danger').on('click', function () {
    var element = this;

    if (confirm('{{ text_confirm }}')) {
        \$.ajax({
            url: \$(element).attr('value'),
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

                    \$('#' + \$(element).attr('data-oc-target')).val('');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    }
});
//--></script>
{{ footer }}
", "cp-akis/view/default/plates/marketplace/installer.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/marketplace/installer.twig");
    }
}
