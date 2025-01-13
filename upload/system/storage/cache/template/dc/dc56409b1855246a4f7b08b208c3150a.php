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

/* cp-akis/view/default/plates/design/translation_form.twig */
class __TwigTemplate_cff6f982f9da9504c103a3b1159d8d05 extends Template
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
        <button type=\"submit\" form=\"form-translation\" data-bs-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"";
        // line 7
        echo ($context["back"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_back"] ?? null);
        echo "\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a></div>
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
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 18
        echo ($context["text_form"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <form id=\"form-translation\" action=\"";
        // line 20
        echo ($context["save"] ?? null);
        echo "\" method=\"post\" data-oc-toggle=\"ajax\">
          <div class=\"row mb-3\">
            <label for=\"input-store\" class=\"col-sm-2 col-form-label\">";
        // line 22
        echo ($context["entry_store"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"store_id\" id=\"input-store\" class=\"form-select\">
                <option value=\"0\">";
        // line 25
        echo ($context["text_default"] ?? null);
        echo "</option>
                ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 27
            echo "                  <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 27);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 27) == ($context["store_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 27);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "              </select>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-language\" class=\"col-sm-2 col-form-label\">";
        // line 33
        echo ($context["entry_language"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"language_id\" id=\"input-language\" class=\"form-select\">
                ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 37
            echo "                  <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 37);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 37) == ($context["language_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 37);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "              </select>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-route\" class=\"col-sm-2 col-form-label\">";
        // line 43
        echo ($context["entry_route"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"route\" id=\"input-route\" class=\"form-select\"></select>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-key\" class=\"col-sm-2 col-form-label\">";
        // line 49
        echo ($context["entry_key"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select id=\"input-keys\" class=\"form-select\"></select>
              <input type=\"text\" name=\"key\" value=\"";
        // line 52
        echo ($context["key"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_key"] ?? null);
        echo "\" id=\"input-key\" class=\"form-control\"/>
              <div id=\"error-key\" class=\"invalid-feedback\"></div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-default\" class=\"col-sm-2 col-form-label\">";
        // line 57
        echo ($context["entry_default"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <textarea name=\"default\" rows=\"5\" placeholder=\"";
        // line 59
        echo ($context["entry_default"] ?? null);
        echo "\" id=\"input-default\" class=\"form-control\" disabled=\"disabled\">";
        if (($context["default"] ?? null)) {
            echo ($context["default"] ?? null);
        }
        echo "</textarea>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-value\" class=\"col-sm-2 col-form-label\">";
        // line 63
        echo ($context["entry_value"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <textarea name=\"value\" rows=\"5\" placeholder=\"";
        // line 65
        echo ($context["entry_value"] ?? null);
        echo "\" id=\"input-value\" class=\"form-control\">";
        echo ($context["value"] ?? null);
        echo "</textarea>
            </div>
          </div>
          <input type=\"hidden\" name=\"translation_id\" value=\"";
        // line 68
        echo ($context["translation_id"] ?? null);
        echo "\" id=\"input-translation-id\"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script ><!--
\$('#input-language').on('change', function () {
    \$.ajax({
        url: 'index.php?route=design/translation.path&user_token=";
        // line 77
        echo ($context["user_token"] ?? null);
        echo "&language_id=' + \$('#input-language').val(),
        dataType: 'json',
        beforeSend: function () {
            \$('#input-language').prop('disabled', true);
            \$('#input-route').prop('disabled', true);
            \$('#input-key').prop('disabled', true);
        },
        complete: function () {
            \$('#input-language').prop('disabled', false);
            \$('#input-route').prop('disabled', false);
            \$('#input-key').prop('disabled', false);
        },
        success: function (json) {
            html = '';

            if (json) {
                for (i = 0; i < json.length; i++) {
                    if (json[i] == '";
        // line 94
        echo ($context["route"] ?? null);
        echo "') {
                        html += '<option value=\"' + json[i] + '\" selected>' + json[i] + '</option>';
                    } else {
                        html += '<option value=\"' + json[i] + '\">' + json[i] + '</option>';
                    }
                }
            }

            \$('#input-route').html(html);

            \$('#input-route').trigger('change');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-route').on('change', function () {
    \$.ajax({
        url: 'index.php?route=design/translation.translation&user_token=";
        // line 114
        echo ($context["user_token"] ?? null);
        echo "&language_id=' + \$('#input-language').val() + '&path=' + \$('#input-route').val(),
        dataType: 'json',
        beforeSend: function () {
            \$('#input-language').prop('disabled', true);
            \$('#input-route').prop('disabled', true);
            \$('#input-key').prop('disabled', true);
        },
        complete: function () {
            \$('#input-language').prop('disabled', false);
            \$('#input-route').prop('disabled', false);
            \$('#input-key').prop('disabled', false);
        },
        success: function (json) {
            translation = [];

            html = '<option value=\"\"></option>';

            if (json) {
                for (i = 0; i < json.length; i++) {
                    if (json[i]['key'] == \$('#input-key').val()) {
                        html += '<option value=\"' + json[i]['key'] + '\" selected>' + json[i]['key'] + '</option>';
                    } else {
                        html += '<option value=\"' + json[i]['key'] + '\">' + json[i]['key'] + '</option>';
                    }

                    translation[json[i]['key']] = json[i]['value'];
                }
            }

            \$('#input-keys').html(html);

            \$('#input-keys').trigger('change');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-keys').on('change', function () {
    if (translation[\$('#input-keys').val()]) {
        \$('#input-default').val(translation[\$('#input-keys').val()]);

        \$('#input-key').val(\$('#input-keys').val());
    } else {
        \$('#input-default').val('');
    }
});

\$('#input-language').trigger('change');
//--></script>
";
        // line 165
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/design/translation_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  322 => 165,  268 => 114,  245 => 94,  225 => 77,  213 => 68,  205 => 65,  200 => 63,  189 => 59,  184 => 57,  174 => 52,  168 => 49,  159 => 43,  153 => 39,  138 => 37,  134 => 36,  128 => 33,  122 => 29,  107 => 27,  103 => 26,  99 => 25,  93 => 22,  88 => 20,  83 => 18,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"submit\" form=\"form-translation\" data-bs-toggle=\"tooltip\" title=\"{{ button_save }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"{{ back }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_back }}\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a></div>
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
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> {{ text_form }}</div>
      <div class=\"card-body\">
        <form id=\"form-translation\" action=\"{{ save }}\" method=\"post\" data-oc-toggle=\"ajax\">
          <div class=\"row mb-3\">
            <label for=\"input-store\" class=\"col-sm-2 col-form-label\">{{ entry_store }}</label>
            <div class=\"col-sm-10\">
              <select name=\"store_id\" id=\"input-store\" class=\"form-select\">
                <option value=\"0\">{{ text_default }}</option>
                {% for store in stores %}
                  <option value=\"{{ store.store_id }}\"{% if store.store_id == store_id %} selected{% endif %}>{{ store.name }}</option>
                {% endfor %}
              </select>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-language\" class=\"col-sm-2 col-form-label\">{{ entry_language }}</label>
            <div class=\"col-sm-10\">
              <select name=\"language_id\" id=\"input-language\" class=\"form-select\">
                {% for language in languages %}
                  <option value=\"{{ language.language_id }}\"{% if language.language_id == language_id %} selected{% endif %}>{{ language.name }}</option>
                {% endfor %}
              </select>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-route\" class=\"col-sm-2 col-form-label\">{{ entry_route }}</label>
            <div class=\"col-sm-10\">
              <select name=\"route\" id=\"input-route\" class=\"form-select\"></select>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-key\" class=\"col-sm-2 col-form-label\">{{ entry_key }}</label>
            <div class=\"col-sm-10\">
              <select id=\"input-keys\" class=\"form-select\"></select>
              <input type=\"text\" name=\"key\" value=\"{{ key }}\" placeholder=\"{{ entry_key }}\" id=\"input-key\" class=\"form-control\"/>
              <div id=\"error-key\" class=\"invalid-feedback\"></div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-default\" class=\"col-sm-2 col-form-label\">{{ entry_default }}</label>
            <div class=\"col-sm-10\">
              <textarea name=\"default\" rows=\"5\" placeholder=\"{{ entry_default }}\" id=\"input-default\" class=\"form-control\" disabled=\"disabled\">{% if default %}{{ default }}{% endif %}</textarea>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-value\" class=\"col-sm-2 col-form-label\">{{ entry_value }}</label>
            <div class=\"col-sm-10\">
              <textarea name=\"value\" rows=\"5\" placeholder=\"{{ entry_value }}\" id=\"input-value\" class=\"form-control\">{{ value }}</textarea>
            </div>
          </div>
          <input type=\"hidden\" name=\"translation_id\" value=\"{{ translation_id }}\" id=\"input-translation-id\"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script ><!--
\$('#input-language').on('change', function () {
    \$.ajax({
        url: 'index.php?route=design/translation.path&user_token={{ user_token }}&language_id=' + \$('#input-language').val(),
        dataType: 'json',
        beforeSend: function () {
            \$('#input-language').prop('disabled', true);
            \$('#input-route').prop('disabled', true);
            \$('#input-key').prop('disabled', true);
        },
        complete: function () {
            \$('#input-language').prop('disabled', false);
            \$('#input-route').prop('disabled', false);
            \$('#input-key').prop('disabled', false);
        },
        success: function (json) {
            html = '';

            if (json) {
                for (i = 0; i < json.length; i++) {
                    if (json[i] == '{{ route }}') {
                        html += '<option value=\"' + json[i] + '\" selected>' + json[i] + '</option>';
                    } else {
                        html += '<option value=\"' + json[i] + '\">' + json[i] + '</option>';
                    }
                }
            }

            \$('#input-route').html(html);

            \$('#input-route').trigger('change');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-route').on('change', function () {
    \$.ajax({
        url: 'index.php?route=design/translation.translation&user_token={{ user_token }}&language_id=' + \$('#input-language').val() + '&path=' + \$('#input-route').val(),
        dataType: 'json',
        beforeSend: function () {
            \$('#input-language').prop('disabled', true);
            \$('#input-route').prop('disabled', true);
            \$('#input-key').prop('disabled', true);
        },
        complete: function () {
            \$('#input-language').prop('disabled', false);
            \$('#input-route').prop('disabled', false);
            \$('#input-key').prop('disabled', false);
        },
        success: function (json) {
            translation = [];

            html = '<option value=\"\"></option>';

            if (json) {
                for (i = 0; i < json.length; i++) {
                    if (json[i]['key'] == \$('#input-key').val()) {
                        html += '<option value=\"' + json[i]['key'] + '\" selected>' + json[i]['key'] + '</option>';
                    } else {
                        html += '<option value=\"' + json[i]['key'] + '\">' + json[i]['key'] + '</option>';
                    }

                    translation[json[i]['key']] = json[i]['value'];
                }
            }

            \$('#input-keys').html(html);

            \$('#input-keys').trigger('change');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-keys').on('change', function () {
    if (translation[\$('#input-keys').val()]) {
        \$('#input-default').val(translation[\$('#input-keys').val()]);

        \$('#input-key').val(\$('#input-keys').val());
    } else {
        \$('#input-default').val('');
    }
});

\$('#input-language').trigger('change');
//--></script>
{{ footer }}", "cp-akis/view/default/plates/design/translation_form.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/design/translation_form.twig");
    }
}
