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

/* cp-akis/view//plates/marketplace/extension.twig */
class __TwigTemplate_20fb0c082f8cfb58f96c597b9a70cc35 extends Template
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
      <h1>";
        // line 5
        echo ($context["heading_title"] ?? null);
        echo "</h1>

                <div class=\"float-end\"><button type=\"button\" id=\"button-upload\" data-bs-toggle=\"tooltip\" title=\"";
        // line 7
        echo ($context["button_upload"] ?? null);
        echo "\" class=\"btn btn-primary\"> <i class=\"fa-solid fa-upload\"></i> ";
        echo ($context["button_upload"] ?? null);
        echo " </button></div>
      <ol class=\"breadcrumb\">
        ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 10
            echo "          <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 10);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 10);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card\">

    
      <div class=\"card-header\"><i class=\"fa-solid fa-puzzle-piece\"></i> ";
        // line 19
        echo ($context["text_list"] ?? null);
        echo " </div>
      <div class=\"card-body\">
      
            ";
        // line 22
        if ((($context["which"] ?? null) != "theme")) {
            // line 23
            echo "        <fieldset>
          <legend>";
            // line 24
            echo ($context["text_type"] ?? null);
            echo "</legend>
          <div class=\"card bg-light\">
            <div class=\"card-body\">
       
              <div class=\"input-group\">
                <select name=\"type\" id=\"input-type\" class=\"form-select\">
                  ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 31
                echo "                    <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 31);
                echo "\"";
                if ((($context["which"] ?? null) == twig_get_attribute($this->env, $this->source, $context["category"], "code", [], "any", false, false, false, 31))) {
                    echo " selected";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["category"], "text", [], "any", false, false, false, 31);
                echo "</option>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "                </select>
                <div class=\"input-group-text\"><i class=\"fa-solid fa-filter\"></i>&nbsp;";
            // line 34
            echo ($context["text_filter"] ?? null);
            echo "</div>
              </div>
            
            </div>
          </div>
        </fieldset>
           ";
        }
        // line 41
        echo "             
        <div id=\"extension\">";
        // line 42
        echo ($context["extension"] ?? null);
        echo "</div>
 
     
      </div>
        
    </div>
  </div>
</div>
<script ><!--
\$('#input-type').on('change', function () {
    \$.ajax({
        url: \$(this).val(),
        dataType: 'html',
        beforeSend: function () {
            \$('.fa-filter').addClass('fa-circle-notch fa-spin');
            \$('.fa-filter').removeClass('fa-filter');
            \$('#input-type').prop('disabled', true);
        },
        complete: function () {
            \$('.fa-circle-notch').addClass('fa-filter');
            \$('.fa-circle-notch').removeClass('fa-circle-notch fa-spin');
            \$('#input-type').prop('disabled', false);
        },
        success: function (html) {
            \$('#extension').html(html);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Download promotion extension
\$('#extension').on('click', '#recommended .btn-primary', function (e) {
    e.preventDefault();

    var element = this;

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
                \$('#extension').before('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div></div>');
            }

            if (json['success']) {
                \$('#extension').before('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + '  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
   
                // Manually build the url so no need to refresh extensions and can trigger install
                // Once the extension is downloaded we trigger the installer
                \$(element).parent().find('.dropdown-menu').html('<a href=\"index.php?route=marketplace/installer.install&user_token=";
        // line 101
        echo ($context["user_token"] ?? null);
        echo "&extension_install_id=' + json['extension_install_id'] + '\" class=\"dropdown-item\"><i class=\"fa-solid fa-plus-circle fa-fw\"></i> ";
        echo ($context["text_install"] ?? null);
        echo "</a> <a href=\"index.php?route=marketplace/installer.delete&user_token=";
        echo ($context["user_token"] ?? null);
        echo "&extension_install_id=' + json['extension_install_id'] + '\" class=\"dropdown-item\"><i class=\"fa-regular fa-trash-can fa-fw\"></i> ";
        echo ($context["text_delete"] ?? null);
        echo "</a>');

                \$(element).parent().find('.dropdown-item:first').trigger('click');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);

            \$(element).button('reset');
        }
    });
});

// Download dropdown
\$('#extension').on('click', '.dropdown-item', function (e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: \$(element).attr('href'),
        dataType: 'json',
        success: function (json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#extension').before('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div></div>');
            }

            if (json['success']) {
                \$('#extension').before('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + '  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#extension').load(\$('#input-type').val());
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Install
\$('#extension').on('click', '.btn-success', function (e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: \$(element).attr('href'),
        dataType: 'json',
        beforeSend: function () {
            \$(element).button('loading');
        },
        complete: function () {
            \$(element).button('loading');
        },
        success: function (json) {
         
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
        if (window.location.href.indexOf('which=theme') !== -1) {
    // If 'which=theme' is present, load the extension
    \$('#extension').load('index.php?route=marketplace/extension&which=theme&user_token=";
        // line 169
        echo ($context["user_token"] ?? null);
        echo "');
  }

        
                \$('#input-type').trigger('change');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Uninstall / Delete
\$('#extension').on('click', '.btn-danger, .btn-outline-danger', function (e) {
    e.preventDefault();

    if (confirm('";
        // line 186
        echo ($context["text_confirm"] ?? null);
        echo "')) {
        var element = this;

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
                \$('.alert-dismissible').remove();

                if (json['error']) {
                    \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                if (json['success']) {
                    \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                    \$('#input-type').trigger('change');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    }
});

 \$('#button-upload').on('click', function () {
    var element = this;

    if (!\$('#button-upload').prop('disabled')) {
        \$('#form-upload').remove();

        \$('body').prepend('<form enctype=\"multipart/form-data\" id=\"form-upload\" style=\"display: none;\"><input type=\"file\" name=\"file\"/></form>');

        \$('#form-upload input[name=\\'file\\']').trigger('click');

        \$('#form-upload input[name=\\'file\\']').on('change', function () {
            if ((this.files[0].size / 1024) > ";
        // line 229
        echo ($context["config_file_max_size"] ?? null);
        echo ") {
                \$(this).val('');

                alert('";
        // line 232
        echo ($context["error_upload_size"] ?? null);
        echo "');
            }

            if (!this.files[0].name.endsWith('.vemod.zip') && !this.files[0].name.endsWith('.vetheme.zip')) {
                \$(this).val('');

                alert('";
        // line 238
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
        // line 251
        echo ($context["user_token"] ?? null);
        echo "&install=1',
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
        // line 272
        echo ($context["user_token"] ?? null);
        echo "');
                            setTimeout(function() {
                          location.reload(); // This will reload the current page
                            }, 3000); 
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

//--></script>
";
        // line 288
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/marketplace/extension.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  415 => 288,  396 => 272,  372 => 251,  356 => 238,  347 => 232,  341 => 229,  295 => 186,  275 => 169,  198 => 101,  136 => 42,  133 => 41,  123 => 34,  120 => 33,  105 => 31,  101 => 30,  92 => 24,  89 => 23,  87 => 22,  81 => 19,  72 => 12,  61 => 10,  57 => 9,  50 => 7,  45 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <h1>{{ heading_title }}</h1>

                <div class=\"float-end\"><button type=\"button\" id=\"button-upload\" data-bs-toggle=\"tooltip\" title=\"{{ button_upload }}\" class=\"btn btn-primary\"> <i class=\"fa-solid fa-upload\"></i> {{ button_upload }} </button></div>
      <ol class=\"breadcrumb\">
        {% for breadcrumb in breadcrumbs %}
          <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
        {% endfor %}
      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card\">

    
      <div class=\"card-header\"><i class=\"fa-solid fa-puzzle-piece\"></i> {{ text_list }} </div>
      <div class=\"card-body\">
      
            {% if which != 'theme' %}
        <fieldset>
          <legend>{{ text_type }}</legend>
          <div class=\"card bg-light\">
            <div class=\"card-body\">
       
              <div class=\"input-group\">
                <select name=\"type\" id=\"input-type\" class=\"form-select\">
                  {% for category in categories %}
                    <option value=\"{{ category.href }}\"{% if which == category.code %} selected{% endif %}>{{ category.text }}</option>
                  {% endfor %}
                </select>
                <div class=\"input-group-text\"><i class=\"fa-solid fa-filter\"></i>&nbsp;{{ text_filter }}</div>
              </div>
            
            </div>
          </div>
        </fieldset>
           {% endif %}
             
        <div id=\"extension\">{{ extension }}</div>
 
     
      </div>
        
    </div>
  </div>
</div>
<script ><!--
\$('#input-type').on('change', function () {
    \$.ajax({
        url: \$(this).val(),
        dataType: 'html',
        beforeSend: function () {
            \$('.fa-filter').addClass('fa-circle-notch fa-spin');
            \$('.fa-filter').removeClass('fa-filter');
            \$('#input-type').prop('disabled', true);
        },
        complete: function () {
            \$('.fa-circle-notch').addClass('fa-filter');
            \$('.fa-circle-notch').removeClass('fa-circle-notch fa-spin');
            \$('#input-type').prop('disabled', false);
        },
        success: function (html) {
            \$('#extension').html(html);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Download promotion extension
\$('#extension').on('click', '#recommended .btn-primary', function (e) {
    e.preventDefault();

    var element = this;

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
                \$('#extension').before('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div></div>');
            }

            if (json['success']) {
                \$('#extension').before('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + '  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
   
                // Manually build the url so no need to refresh extensions and can trigger install
                // Once the extension is downloaded we trigger the installer
                \$(element).parent().find('.dropdown-menu').html('<a href=\"index.php?route=marketplace/installer.install&user_token={{ user_token }}&extension_install_id=' + json['extension_install_id'] + '\" class=\"dropdown-item\"><i class=\"fa-solid fa-plus-circle fa-fw\"></i> {{ text_install }}</a> <a href=\"index.php?route=marketplace/installer.delete&user_token={{ user_token }}&extension_install_id=' + json['extension_install_id'] + '\" class=\"dropdown-item\"><i class=\"fa-regular fa-trash-can fa-fw\"></i> {{ text_delete }}</a>');

                \$(element).parent().find('.dropdown-item:first').trigger('click');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);

            \$(element).button('reset');
        }
    });
});

// Download dropdown
\$('#extension').on('click', '.dropdown-item', function (e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: \$(element).attr('href'),
        dataType: 'json',
        success: function (json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#extension').before('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div></div>');
            }

            if (json['success']) {
                \$('#extension').before('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + '  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#extension').load(\$('#input-type').val());
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Install
\$('#extension').on('click', '.btn-success', function (e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: \$(element).attr('href'),
        dataType: 'json',
        beforeSend: function () {
            \$(element).button('loading');
        },
        complete: function () {
            \$(element).button('loading');
        },
        success: function (json) {
         
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
        if (window.location.href.indexOf('which=theme') !== -1) {
    // If 'which=theme' is present, load the extension
    \$('#extension').load('index.php?route=marketplace/extension&which=theme&user_token={{ user_token }}');
  }

        
                \$('#input-type').trigger('change');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Uninstall / Delete
\$('#extension').on('click', '.btn-danger, .btn-outline-danger', function (e) {
    e.preventDefault();

    if (confirm('{{ text_confirm }}')) {
        var element = this;

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
                \$('.alert-dismissible').remove();

                if (json['error']) {
                    \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                if (json['success']) {
                    \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                    \$('#input-type').trigger('change');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    }
});

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
                    url: 'index.php?route=marketplace/installer.upload&user_token={{ user_token }}&install=1',
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
                            setTimeout(function() {
                          location.reload(); // This will reload the current page
                            }, 3000); 
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

//--></script>
{{ footer }}
", "cp-akis/view//plates/marketplace/extension.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/marketplace/extension.twig");
    }
}
