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

/* cp-akis/view/default/plates/localisation/language_form.twig */
class __TwigTemplate_eec91f2cc456ad18811369cd457ce37e extends Template
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
        <button type=\"submit\" form=\"form-language\" formaction=\"";
        // line 9
        echo ($context["save"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\"
          title=\"";
        // line 10
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"";
        // line 11
        echo ($context["back"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_back"] ?? null);
        echo "\" class=\"btn btn-light\"><i
            class=\"fa-solid fa-reply\"></i></a>
      </div>
      <h1>";
        // line 14
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 17
            echo "        <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 17);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 17);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "      </ol>
    </div>
  </div>


  <div class=\"container-fluid\">


    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 28
        echo ($context["text_form"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <form id=\"form-language\" action=\"";
        // line 30
        echo ($context["save"] ?? null);
        echo "\" method=\"post\" data-oc-toggle=\"ajax\">

          ";
        // line 32
        if ((($context["language_id"] ?? null) == 0)) {
            // line 33
            echo "          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">";
            // line 34
            echo ($context["entry_country_flag"] ?? null);
            echo " <img style=\"width: 25px;\" id=\"flag\"
                src=\"\" /></label>
            <div class=\"col-sm-10\">
              <input type=\"hidden\" name=\"flag\" id=\"input-flag\" />
              <select name=\"country\" id=\"select-country\" class=\"form-select\">
                <option>";
            // line 39
            echo ($context["option_select_country"] ?? null);
            echo "</option>
                ";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["countries"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
                // line 41
                echo "                <option value=\"";
                echo (($__internal_compile_0 = $context["country"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["isoCountryCode"] ?? null) : null);
                echo "\" data-flag=\"";
                echo (($__internal_compile_1 = $context["country"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["flag"] ?? null) : null);
                echo "\">
                  ";
                // line 42
                echo (($__internal_compile_2 = $context["country"]) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["country"] ?? null) : null);
                echo "
                </option>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "              </select>
            </div>
          </div>
          ";
        }
        // line 49
        echo "
          <div class=\"row mb-3 ";
        // line 50
        if ((($context["language_id"] ?? null) == 0)) {
            echo " required   ";
        }
        echo "\">
            <label for=\"input-name\" class=\"col-sm-2 col-form-label\">";
        // line 51
        echo ($context["entry_name"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">

              ";
        // line 54
        if ((($context["language_id"] ?? null) == 0)) {
            // line 55
            echo "              <!-- HTML Select for Languages -->
              <input type=\"hidden\" name=\"name\" id=\"input-name\" />
              <select name=\"language\" id=\"select-language\" class=\"form-select\">
                <!-- Options will be populated dynamically using JavaScript -->
              </select>
              ";
        } else {
            // line 61
            echo "              <label  class=\" col-form-label\">      ";
            echo ($context["name"] ?? null);
            echo "</label>
              <input type=\"hidden\" name=\"name\" value=\"";
            // line 62
            echo ($context["name"] ?? null);
            echo "\" placeholder=\"";
            echo ($context["entry_name"] ?? null);
            echo "\" id=\"input-name\" class=\"form-control\"/>
              ";
        }
        // line 64
        echo "
              <div id=\"error-name\" class=\"invalid-feedback\"></div>
            </div>
          </div>

          <input type=\"hidden\" name=\"code\" value=\"";
        // line 69
        echo ($context["code"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_code"] ?? null);
        echo "\" id=\"input-code\"
          class=\"form-control\" />
          <input type=\"hidden\" name=\"extension\" value=\"";
        // line 71
        echo ($context["extension"] ?? null);
        echo "\" id=\"input-extension\" class=\"form-control\"
          readonly />
          <input type=\"hidden\" name=\"locale\" value=\"";
        // line 73
        echo ($context["locale"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_locale"] ?? null);
        echo "\" id=\"input-locale\"
          class=\"form-control\" />
          

          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">";
        // line 78
        echo ($context["entry_status"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"status\" value=\"0\" />
                <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\" ";
        // line 82
        if (($context["status"] ?? null)) {
            // line 83
            echo " checked";
        }
        echo " />
              </div>
              <div class=\"form-text\">";
        // line 85
        echo ($context["help_status"] ?? null);
        echo "</div>
            </div>
          </div>



          <div class=\"row mb-3\">
            <label for=\"input-sort-order\" class=\"col-sm-2 col-form-label\">";
        // line 92
        echo ($context["entry_sort_order"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"sort_order\" value=\"";
        // line 94
        echo ($context["sort_order"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_sort_order"] ?? null);
        echo "\"
                id=\"input-sort-order\" class=\"form-control\" />
            </div>
          </div>

          <input type=\"hidden\" name=\"language_id\" value=\"";
        // line 99
        echo ($context["language_id"] ?? null);
        echo "\" id=\"input-language-id\" />
        </form>
        <div class=\"row mb-3\">
          <label for=\"input-extension\" class=\"col-sm-2 col-form-label\"></label>
          <div class=\"col-sm-10\">
            <button type=\"button\" id=\"translate\" class=\"btn btn-primary\">";
        // line 104
        echo ($context["button_proceed_to_translate"] ?? null);
        echo "</button>
          </div>

        </div>
      </div>
    </div>



  </div>
</div>


<script>
  var countriesObject = ";
        // line 118
        echo json_encode(($context["countries"] ?? null));
        echo ";
  \$(document).ready(function () {


    function populateLanguages(selectedCountry) {
      var selectLanguage = \$('#select-language');
      selectLanguage.empty(); // Clear existing options

      if (selectedCountry !== '--') {
        var selectedCountryObject = countriesObject.find(function (country) {
          return country.isoCountryCode === selectedCountry;
        });

        if (selectedCountryObject) {
          \$.each(selectedCountryObject.locales, function (index, locale) {
            var option = \$('<option>').val(locale.locale).text(locale.languageFullName);
            selectLanguage.append(option);
          });
          if (selectedCountryObject.locales.length == 1) {

            let formattedLanguage = selectedCountryObject.locales[0].locale.toLowerCase().replace(/_/g, '-');

            // Set the formatted language as the value of the input
            \$(\"#input-code\").val(formattedLanguage);

            \$(\"#input-locale\").val(selectedCountryObject.locales[0].locale);
            \$(\"#input-name\").val(selectedCountryObject.locales[0].languageFullName);
          } else {
            var option = \$('<option selected value=\"0\">').text('";
        // line 146
        echo ($context["option_select_language"] ?? null);
        echo "');
            selectLanguage.prepend(option);

            \$(\"#input-code\").val('');
            \$(\"#input-locale\").val('');
          }
        }
      }
    }

    // Event listener for the country select using jQuery
    \$('#select-country').on('change', function () {
      var selectedCountry = \$(this).val();
      let flag = \$(this).find(\":selected\").data(\"flag\");
      console.log(flag);
      \$(\"#flag\").attr('src', \"/catalog/language/flags/\" + flag);
      \$(\"#input-flag\").val(flag);
   
      populateLanguages(selectedCountry);
    });

    // Event listener for the language select using jQuery
    \$('#select-language').on('change', function () {
      var selectedLanguage = \$(this).val();
      // Perform actions based on the selected language
      if (selectedLanguage == 0) {
        \$(\"#input-code\").val('');
        \$(\"#input-locale\").val('');
        return;
      }

      let formattedLanguage = selectedLanguage.toLowerCase().replace(/_/g, '-');

      // Set the formatted language as the value of the input
      \$(\"#input-code\").val(formattedLanguage);
      \$(\"#input-locale\").val(selectedLanguage);
      \$(\"#input-name\").val(\$(this).find(\":selected\").text().trim())
    });


    \$(\"#translate\").click(function () {
      if (\$(\"#input-language-id\").val() == 0) {
        alert('Save the language first');
        return;
      }
      // Construct the URL with the desired parameters
      var userToken = \"";
        // line 192
        echo ($context["user_token"] ?? null);
        echo "\";
      var languageCode = \$(\"#input-code\").val();
      var redirectUrl = \"index.php?route=localisation/language.translate&user_token=\" + userToken + \"&code=\" + languageCode + '&language_id=' + \$(\"#input-language-id\").val();

      // Redirect to the specified URL
      window.location.href = redirectUrl;
    });

  });
</script>
";
        // line 202
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/localisation/language_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  373 => 202,  360 => 192,  311 => 146,  280 => 118,  263 => 104,  255 => 99,  245 => 94,  240 => 92,  230 => 85,  224 => 83,  222 => 82,  215 => 78,  205 => 73,  200 => 71,  193 => 69,  186 => 64,  179 => 62,  174 => 61,  166 => 55,  164 => 54,  158 => 51,  152 => 50,  149 => 49,  143 => 45,  134 => 42,  127 => 41,  123 => 40,  119 => 39,  111 => 34,  108 => 33,  106 => 32,  101 => 30,  96 => 28,  85 => 19,  74 => 17,  70 => 16,  65 => 14,  57 => 11,  53 => 10,  49 => 9,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}



<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"submit\" form=\"form-language\" formaction=\"{{ save }}\" data-bs-toggle=\"tooltip\"
          title=\"{{ button_save }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"{{ back }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_back }}\" class=\"btn btn-light\"><i
            class=\"fa-solid fa-reply\"></i></a>
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


    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> {{ text_form }}</div>
      <div class=\"card-body\">
        <form id=\"form-language\" action=\"{{ save }}\" method=\"post\" data-oc-toggle=\"ajax\">

          {% if language_id == 0 %}
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">{{entry_country_flag}} <img style=\"width: 25px;\" id=\"flag\"
                src=\"\" /></label>
            <div class=\"col-sm-10\">
              <input type=\"hidden\" name=\"flag\" id=\"input-flag\" />
              <select name=\"country\" id=\"select-country\" class=\"form-select\">
                <option>{{option_select_country}}</option>
                {% for country in countries %}
                <option value=\"{{ country['isoCountryCode'] }}\" data-flag=\"{{ country['flag'] }}\">
                  {{ country['country'] }}
                </option>
                {% endfor %}
              </select>
            </div>
          </div>
          {% endif %}

          <div class=\"row mb-3 {% if language_id == 0 %} required   {% endif %}\">
            <label for=\"input-name\" class=\"col-sm-2 col-form-label\">{{ entry_name }}</label>
            <div class=\"col-sm-10\">

              {% if language_id == 0 %}
              <!-- HTML Select for Languages -->
              <input type=\"hidden\" name=\"name\" id=\"input-name\" />
              <select name=\"language\" id=\"select-language\" class=\"form-select\">
                <!-- Options will be populated dynamically using JavaScript -->
              </select>
              {% else %}
              <label  class=\" col-form-label\">      {{ name }}</label>
              <input type=\"hidden\" name=\"name\" value=\"{{ name }}\" placeholder=\"{{ entry_name }}\" id=\"input-name\" class=\"form-control\"/>
              {% endif %}

              <div id=\"error-name\" class=\"invalid-feedback\"></div>
            </div>
          </div>

          <input type=\"hidden\" name=\"code\" value=\"{{ code }}\" placeholder=\"{{ entry_code }}\" id=\"input-code\"
          class=\"form-control\" />
          <input type=\"hidden\" name=\"extension\" value=\"{{ extension }}\" id=\"input-extension\" class=\"form-control\"
          readonly />
          <input type=\"hidden\" name=\"locale\" value=\"{{ locale }}\" placeholder=\"{{ entry_locale }}\" id=\"input-locale\"
          class=\"form-control\" />
          

          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">{{ entry_status }}</label>
            <div class=\"col-sm-10\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"status\" value=\"0\" />
                <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\" {% if status
                  %} checked{% endif %} />
              </div>
              <div class=\"form-text\">{{ help_status }}</div>
            </div>
          </div>



          <div class=\"row mb-3\">
            <label for=\"input-sort-order\" class=\"col-sm-2 col-form-label\">{{ entry_sort_order }}</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"sort_order\" value=\"{{ sort_order }}\" placeholder=\"{{ entry_sort_order }}\"
                id=\"input-sort-order\" class=\"form-control\" />
            </div>
          </div>

          <input type=\"hidden\" name=\"language_id\" value=\"{{ language_id }}\" id=\"input-language-id\" />
        </form>
        <div class=\"row mb-3\">
          <label for=\"input-extension\" class=\"col-sm-2 col-form-label\"></label>
          <div class=\"col-sm-10\">
            <button type=\"button\" id=\"translate\" class=\"btn btn-primary\">{{button_proceed_to_translate}}</button>
          </div>

        </div>
      </div>
    </div>



  </div>
</div>


<script>
  var countriesObject = {{ countries| json_encode | raw }};
  \$(document).ready(function () {


    function populateLanguages(selectedCountry) {
      var selectLanguage = \$('#select-language');
      selectLanguage.empty(); // Clear existing options

      if (selectedCountry !== '--') {
        var selectedCountryObject = countriesObject.find(function (country) {
          return country.isoCountryCode === selectedCountry;
        });

        if (selectedCountryObject) {
          \$.each(selectedCountryObject.locales, function (index, locale) {
            var option = \$('<option>').val(locale.locale).text(locale.languageFullName);
            selectLanguage.append(option);
          });
          if (selectedCountryObject.locales.length == 1) {

            let formattedLanguage = selectedCountryObject.locales[0].locale.toLowerCase().replace(/_/g, '-');

            // Set the formatted language as the value of the input
            \$(\"#input-code\").val(formattedLanguage);

            \$(\"#input-locale\").val(selectedCountryObject.locales[0].locale);
            \$(\"#input-name\").val(selectedCountryObject.locales[0].languageFullName);
          } else {
            var option = \$('<option selected value=\"0\">').text('{{option_select_language}}');
            selectLanguage.prepend(option);

            \$(\"#input-code\").val('');
            \$(\"#input-locale\").val('');
          }
        }
      }
    }

    // Event listener for the country select using jQuery
    \$('#select-country').on('change', function () {
      var selectedCountry = \$(this).val();
      let flag = \$(this).find(\":selected\").data(\"flag\");
      console.log(flag);
      \$(\"#flag\").attr('src', \"/catalog/language/flags/\" + flag);
      \$(\"#input-flag\").val(flag);
   
      populateLanguages(selectedCountry);
    });

    // Event listener for the language select using jQuery
    \$('#select-language').on('change', function () {
      var selectedLanguage = \$(this).val();
      // Perform actions based on the selected language
      if (selectedLanguage == 0) {
        \$(\"#input-code\").val('');
        \$(\"#input-locale\").val('');
        return;
      }

      let formattedLanguage = selectedLanguage.toLowerCase().replace(/_/g, '-');

      // Set the formatted language as the value of the input
      \$(\"#input-code\").val(formattedLanguage);
      \$(\"#input-locale\").val(selectedLanguage);
      \$(\"#input-name\").val(\$(this).find(\":selected\").text().trim())
    });


    \$(\"#translate\").click(function () {
      if (\$(\"#input-language-id\").val() == 0) {
        alert('Save the language first');
        return;
      }
      // Construct the URL with the desired parameters
      var userToken = \"{{user_token}}\";
      var languageCode = \$(\"#input-code\").val();
      var redirectUrl = \"index.php?route=localisation/language.translate&user_token=\" + userToken + \"&code=\" + languageCode + '&language_id=' + \$(\"#input-language-id\").val();

      // Redirect to the specified URL
      window.location.href = redirectUrl;
    });

  });
</script>
{{ footer }}", "cp-akis/view/default/plates/localisation/language_form.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/localisation/language_form.twig");
    }
}
