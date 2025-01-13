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

/* cp-akis/view//plates/tool/upgrade.twig */
class __TwigTemplate_7c54277277de29929f8b6edd58f569e8 extends Template
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
      <ol class=\"breadcrumb\">
        ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 8
            echo "          <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 8);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 8);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-rotate\"></i> ";
        // line 15
        echo ($context["text_upgrade"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <fieldset>
          <legend>";
        // line 18
        echo ($context["text_information"] ?? null);
        echo "</legend>
          <div class=\"row mb-3\">
            <div class=\"col\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>";
        // line 22
        echo ($context["text_current_version"] ?? null);
        echo "</strong>
                  <br/>
                  <span";
        // line 24
        if (($context["upgrade"] ?? null)) {
            echo " class=\"text-danger\"";
        }
        echo ">";
        echo ($context["current_version"] ?? null);
        echo "</span>
                </div>
              </div>
            </div>
            <div class=\"col\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>";
        // line 30
        echo ($context["text_latest_version"] ?? null);
        echo "</strong>
                  <br/>
                  ";
        // line 32
        echo ($context["latest_version"] ?? null);
        echo "
                </div>
              </div>
            </div>
            <div class=\"col\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>";
        // line 38
        echo ($context["text_date_added"] ?? null);
        echo "</strong>
                  <br/>
                  ";
        // line 40
        echo ($context["date_added"] ?? null);
        echo "
                </div>
              </div>
            </div>
          </div>
          <div class=\"form-control border rounded-start\">
            <div class=\"lead\"><strong>";
        // line 46
        echo ($context["text_change"] ?? null);
        echo "</strong>
              <br/>
              ";
        // line 48
        echo ($context["log"] ?? null);
        echo "
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>";
        // line 53
        echo ($context["text_status"] ?? null);
        echo "</legend>
          <div class=\"input-group input-group-lg\">
            <button type=\"button\" id=\"button-upgrade\" class=\"btn btn-warning btn-lg\"";
        // line 55
        if ( !($context["upgrade"] ?? null)) {
            echo " disabled";
        }
        echo "><i class=\"fa-solid fa-level-up-alt\"></i> ";
        echo ($context["button_upgrade"] ?? null);
        echo "</button>
            <input type=\"text\" id=\"input-upgrade\" value=\"";
        // line 56
        echo ($context["text_ready"] ?? null);
        echo "\" class=\"form-control bg-white\" readonly/>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>
<script ><!--
\$('#button-upgrade').on('click', function () {
    var element = this;

    \$(element).button('loading');

    if (confirm('";
        // line 69
        echo ($context["text_confirm"] ?? null);
        echo "')) {
        \$('#progress').html('";
        // line 70
        echo twig_escape_filter($this->env, ($context["text_download"] ?? null), "js");
        echo "');

        var next = 'index.php?route=tool/upgrade.download&user_token=";
        // line 72
        echo ($context["user_token"] ?? null);
        echo "&version=";
        echo ($context["latest_version"] ?? null);
        echo "';

        var upgrade = function() {
            return \$.ajax({
                url: next,
                dataType: 'json',
                success: function(json) {
                    \$('#input-upgrade').removeClass('is-valid is-invalid');

                    if (json['error']) {
                        \$('#input-upgrade').val(json['error']);
                        \$('#input-upgrade').addClass('is-invalid');

                        \$(element).button('reset');
                    }

                    if (json['text']) {
                        \$('#input-upgrade').val(json['text']);
                    }

                    if (json['success']) {
                        \$('#input-upgrade').val(json['success']);
                        \$('#input-upgrade').addClass('is-valid');

                        \$(element).button('reset');
                    }
                        if (json['finish']) {
                          alert('The upgrade has been completed')
                        location.href = json['finish'];

                        chain.attach(upgrade);
                    }
                    if (json['next']) {
                        next = json['next'];

                        chain.attach(upgrade);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);

                    \$(element).button('reset');
                }
            });
        };

        chain.attach(upgrade);
    }
});
//--></script>
";
        // line 122
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/tool/upgrade.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  237 => 122,  182 => 72,  177 => 70,  173 => 69,  157 => 56,  149 => 55,  144 => 53,  136 => 48,  131 => 46,  122 => 40,  117 => 38,  108 => 32,  103 => 30,  90 => 24,  85 => 22,  78 => 18,  72 => 15,  65 => 10,  54 => 8,  50 => 7,  45 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
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
      <div class=\"card-header\"><i class=\"fa-solid fa-rotate\"></i> {{ text_upgrade }}</div>
      <div class=\"card-body\">
        <fieldset>
          <legend>{{ text_information }}</legend>
          <div class=\"row mb-3\">
            <div class=\"col\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>{{ text_current_version }}</strong>
                  <br/>
                  <span{% if upgrade %} class=\"text-danger\"{% endif %}>{{ current_version }}</span>
                </div>
              </div>
            </div>
            <div class=\"col\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>{{ text_latest_version }}</strong>
                  <br/>
                  {{ latest_version }}
                </div>
              </div>
            </div>
            <div class=\"col\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>{{ text_date_added }}</strong>
                  <br/>
                  {{ date_added }}
                </div>
              </div>
            </div>
          </div>
          <div class=\"form-control border rounded-start\">
            <div class=\"lead\"><strong>{{ text_change }}</strong>
              <br/>
              {{ log }}
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>{{ text_status }}</legend>
          <div class=\"input-group input-group-lg\">
            <button type=\"button\" id=\"button-upgrade\" class=\"btn btn-warning btn-lg\"{% if not upgrade %} disabled{% endif %}><i class=\"fa-solid fa-level-up-alt\"></i> {{ button_upgrade }}</button>
            <input type=\"text\" id=\"input-upgrade\" value=\"{{ text_ready }}\" class=\"form-control bg-white\" readonly/>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>
<script ><!--
\$('#button-upgrade').on('click', function () {
    var element = this;

    \$(element).button('loading');

    if (confirm('{{ text_confirm }}')) {
        \$('#progress').html('{{ text_download|escape('js') }}');

        var next = 'index.php?route=tool/upgrade.download&user_token={{ user_token }}&version={{ latest_version }}';

        var upgrade = function() {
            return \$.ajax({
                url: next,
                dataType: 'json',
                success: function(json) {
                    \$('#input-upgrade').removeClass('is-valid is-invalid');

                    if (json['error']) {
                        \$('#input-upgrade').val(json['error']);
                        \$('#input-upgrade').addClass('is-invalid');

                        \$(element).button('reset');
                    }

                    if (json['text']) {
                        \$('#input-upgrade').val(json['text']);
                    }

                    if (json['success']) {
                        \$('#input-upgrade').val(json['success']);
                        \$('#input-upgrade').addClass('is-valid');

                        \$(element).button('reset');
                    }
                        if (json['finish']) {
                          alert('The upgrade has been completed')
                        location.href = json['finish'];

                        chain.attach(upgrade);
                    }
                    if (json['next']) {
                        next = json['next'];

                        chain.attach(upgrade);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);

                    \$(element).button('reset');
                }
            });
        };

        chain.attach(upgrade);
    }
});
//--></script>
{{ footer }}", "cp-akis/view//plates/tool/upgrade.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/tool/upgrade.twig");
    }
}
