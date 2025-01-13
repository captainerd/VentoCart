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

/* cp-akis/view/default/plates/setting/setting.twig */
class __TwigTemplate_6c8eb4bd2a73025732fa9e46375c5aff extends Template
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
        <button type=\"submit\" form=\"form-setting\" data-bs-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"";
        // line 7
        echo ($context["back"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_back"] ?? null);
        echo "\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a>
      </div>
      <h1>";
        // line 9
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 12
            echo "          <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 12);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 12);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 19
        echo ($context["text_edit"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <form id=\"form-setting\" action=\"";
        // line 21
        echo ($context["save"] ?? null);
        echo "\" method=\"post\" data-oc-toggle=\"ajax\">
          <ul class=\"nav nav-tabs\">
            <li class=\"nav-item\"><a href=\"#tab-general\" data-bs-toggle=\"tab\" class=\"nav-link active\">";
        // line 23
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-store\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 24
        echo ($context["tab_store"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-local\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 25
        echo ($context["tab_local"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-option\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 26
        echo ($context["tab_option"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-image\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 27
        echo ($context["tab_image"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-mail\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 28
        echo ($context["tab_mail"] ?? null);
        echo "</a></li>
            <li class=\"nav-item\"><a href=\"#tab-server\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 29
        echo ($context["tab_server"] ?? null);
        echo "</a></li>
          </ul>
          <div class=\"tab-content\">
            <div id=\"tab-general\" class=\"tab-pane active\">
              <div class=\"row mb-3 required\">
                <label for=\"input-meta-title\" class=\"col-sm-2 col-form-label\">";
        // line 34
        echo ($context["entry_meta_title"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_meta_title\" value=\"";
        // line 36
        echo ($context["config_meta_title"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_meta_title"] ?? null);
        echo "\" id=\"input-meta-title\" class=\"form-control\"/>
                  <div id=\"error-meta-title\" class=\"invalid-feedback\"></div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-meta-description\" class=\"col-sm-2 col-form-label\">";
        // line 41
        echo ($context["entry_meta_description"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_meta_description\" rows=\"5\" placeholder=\"";
        // line 43
        echo ($context["entry_meta_description"] ?? null);
        echo "\" id=\"input-meta-description\" class=\"form-control\">";
        echo ($context["config_meta_description"] ?? null);
        echo "</textarea>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-meta-keyword\" class=\"col-sm-2 col-form-label\">";
        // line 47
        echo ($context["entry_meta_keyword"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_meta_keyword\" rows=\"5\" placeholder=\"";
        // line 49
        echo ($context["entry_meta_keyword"] ?? null);
        echo "\" id=\"input-meta-keyword\" class=\"form-control\">";
        echo ($context["config_meta_keyword"] ?? null);
        echo "</textarea>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-logo\" class=\"col-sm-2 col-form-label\">";
        // line 53
        echo ($context["entry_logo"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"border rounded d-block\" style=\"max-width: 300px;\">
                    <img src=\"";
        // line 56
        echo ($context["logo"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-logo\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"img-fluid\"> <input type=\"hidden\" name=\"config_logo\" value=\"";
        echo ($context["config_logo"] ?? null);
        echo "\" id=\"input-logo\"/>
                    <div class=\"d-grid\">
                      <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-primary rounded-0\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 58
        echo ($context["button_edit"] ?? null);
        echo "</button>
                      <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-warning rounded-0\"><i class=\"fa-regular fa-trash-can\"></i> ";
        // line 59
        echo ($context["button_clear"] ?? null);
        echo "</button>
                    </div>
                  </div>
                </div>
              </div>
           
              <div class=\"row mb-3\">
                <label for=\"input-layout\" class=\"col-sm-2 col-form-label\">";
        // line 66
        echo ($context["entry_layout"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"config_layout_id\" id=\"input-layout\" class=\"form-select\">
                    ";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["layouts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["layout"]) {
            // line 70
            echo "                      <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 70);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 70) == ($context["config_layout_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["layout"], "name", [], "any", false, false, false, 70);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "                  </select>
                </div>
              </div>
            </div>
            <div id=\"tab-store\" class=\"tab-pane\">
              <div class=\"row mb-3 required\">
                <label for=\"input-name\" class=\"col-sm-2 col-form-label\">";
        // line 78
        echo ($context["entry_name"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_name\" value=\"";
        // line 80
        echo ($context["config_name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\"/>
                  <div id=\"error-name\" class=\"invalid-feedback\"></div>
                </div>
              </div>
              <div class=\"row mb-3 required\">
                <label for=\"input-owner\" class=\"col-sm-2 col-form-label\">";
        // line 85
        echo ($context["entry_owner"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_owner\" value=\"";
        // line 87
        echo ($context["config_owner"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_owner"] ?? null);
        echo "\" id=\"input-owner\" class=\"form-control\"/>
                  <div id=\"error-owner\" class=\"invalid-feedback\"></div>
                </div>
              </div>
              <div class=\"row mb-3 required\">
                <label for=\"input-address\" class=\"col-sm-2 col-form-label\">";
        // line 92
        echo ($context["entry_address"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_address\" rows=\"5\" placeholder=\"";
        // line 94
        echo ($context["entry_address"] ?? null);
        echo "\" id=\"input-address\" class=\"form-control\">";
        echo ($context["config_address"] ?? null);
        echo "</textarea>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-geocode\" class=\"col-sm-2 col-form-label\">";
        // line 98
        echo ($context["entry_geocode"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_geocode\" value=\"";
        // line 100
        echo ($context["config_geocode"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_geocode"] ?? null);
        echo "\" id=\"input-geocode\" class=\"form-control\"/>
                  <div class=\"form-text\">";
        // line 101
        echo ($context["help_geocode"] ?? null);
        echo "</div>
                </div>
              </div>
              <div class=\"row mb-3 required\">
                <label for=\"input-email\" class=\"col-sm-2 col-form-label\">";
        // line 105
        echo ($context["entry_email"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_email\" value=\"";
        // line 107
        echo ($context["config_email"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_email"] ?? null);
        echo "\" id=\"input-email\" class=\"form-control\"/>
                  <div id=\"error-email\" class=\"invalid-feedback\"></div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-telephone\" class=\"col-sm-2 col-form-label\">";
        // line 112
        echo ($context["entry_telephone"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_telephone\" value=\"";
        // line 114
        echo ($context["config_telephone"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_telephone"] ?? null);
        echo "\" id=\"input-telephone\" class=\"form-control\"/>
                  <div id=\"error-telephone\" class=\"invalid-feedback\"></div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-image\" class=\"col-sm-2 col-form-label\">";
        // line 119
        echo ($context["entry_image"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"border rounded d-block\" style=\"max-width: 300px;\">
                    <img src=\"";
        // line 122
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\" title=\"\" id=\"thumb-image\" data-oc-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" class=\"img-fluid\"> <input type=\"hidden\" name=\"config_image\" value=\"";
        echo ($context["config_image"] ?? null);
        echo "\" id=\"input-image\"/>
                    <div class=\"d-grid\">
                      <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-primary rounded-0\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 124
        echo ($context["button_edit"] ?? null);
        echo "</button>
                      <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-warning rounded-0\"><i class=\"fa-regular fa-trash-can\"></i> ";
        // line 125
        echo ($context["button_clear"] ?? null);
        echo "</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-open\" class=\"col-sm-2 col-form-label\">";
        // line 131
        echo ($context["entry_open"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_open\" rows=\"5\" placeholder=\"";
        // line 133
        echo ($context["entry_open"] ?? null);
        echo "\" id=\"input-open\" class=\"form-control\">";
        echo ($context["config_open"] ?? null);
        echo "</textarea>
                  <div class=\"form-text\">";
        // line 134
        echo ($context["help_open"] ?? null);
        echo "</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-comment\" class=\"col-sm-2 col-form-label\">";
        // line 138
        echo ($context["entry_comment"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_comment\" rows=\"5\" placeholder=\"";
        // line 140
        echo ($context["entry_comment"] ?? null);
        echo "\" id=\"input-comment\" class=\"form-control\">";
        echo ($context["config_comment"] ?? null);
        echo "</textarea>
                  <div class=\"form-text\">";
        // line 141
        echo ($context["help_comment"] ?? null);
        echo "</div>
                </div>
              </div>
              ";
        // line 144
        if (($context["locations"] ?? null)) {
            // line 145
            echo "                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
            // line 146
            echo ($context["entry_location"] ?? null);
            echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                      ";
            // line 149
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["locations"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
                // line 150
                echo "                        <div class=\"form-check\">
                          <input type=\"checkbox\" name=\"config_location[]\" value=\"";
                // line 151
                echo twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 151);
                echo "\" id=\"input-location-";
                echo twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 151);
                echo "\" class=\"form-check-input\"";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 151), ($context["config_location"] ?? null))) {
                    echo " checked";
                }
                echo "/> <label for=\"input-location-";
                echo twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 151);
                echo "\" class=\"form-check-label\">";
                echo twig_get_attribute($this->env, $this->source, $context["location"], "name", [], "any", false, false, false, 151);
                echo "</label>
                        </div>
                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['location'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 154
            echo "                    </div>
                    <div class=\"form-text\">";
            // line 155
            echo ($context["help_location"] ?? null);
            echo "</div>
                  </div>
                </div>
              ";
        }
        // line 159
        echo "            </div>
            <div id=\"tab-local\" class=\"tab-pane\">
              <fieldset>
                <legend>";
        // line 162
        echo ($context["text_region"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-country\" class=\"col-sm-2 col-form-label\">";
        // line 164
        echo ($context["entry_country"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_country_id\" id=\"input-country\" class=\"form-select\">
                      ";
        // line 167
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["countries"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 168
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["country"], "country_id", [], "any", false, false, false, 168);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["country"], "country_id", [], "any", false, false, false, 168) == ($context["config_country_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["country"], "name", [], "any", false, false, false, 168);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 170
        echo "                    </select>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-zone\" class=\"col-sm-2 col-form-label\">";
        // line 174
        echo ($context["entry_zone"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_zone_id\" id=\"input-zone\" class=\"form-select\"></select>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-timezone\" class=\"col-sm-2 col-form-label\">";
        // line 180
        echo ($context["entry_timezone"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_timezone\" id=\"input-timezone\" class=\"form-select\">
                      ";
        // line 183
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["timezones"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["timezone"]) {
            // line 184
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["timezone"], "value", [], "any", false, false, false, 184);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["timezone"], "value", [], "any", false, false, false, 184) == ($context["config_timezone"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["timezone"], "text", [], "any", false, false, false, 184);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['timezone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 186
        echo "                    </select>
                  </div>
                </div>
              </fieldset>

              <fieldset>
                <legend>";
        // line 192
        echo ($context["text_language"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-language\" class=\"col-sm-2 col-form-label\">";
        // line 194
        echo ($context["entry_language"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_language\" id=\"input-language\" class=\"form-select\">
                      ";
        // line 197
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 198
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 198);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 198) == ($context["config_language"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 198);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 200
        echo "                    </select>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-language-admin\" class=\"col-sm-2 col-form-label\">";
        // line 204
        echo ($context["entry_language_admin"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_language_admin\" id=\"input-language-admin\" class=\"form-select\">
                      ";
        // line 207
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 208
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 208);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 208) == ($context["config_language_admin"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 208);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 210
        echo "                    </select>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 215
        echo ($context["text_currency"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-currency\" class=\"col-sm-2 col-form-label\">";
        // line 217
        echo ($context["entry_currency"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_currency\" id=\"input-currency\" class=\"form-select\">
                      ";
        // line 220
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["currencies"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
            // line 221
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 221);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 221) == ($context["config_currency"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["currency"], "title", [], "any", false, false, false, 221);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 223
        echo "                    </select>
                    <div class=\"form-text\">";
        // line 224
        echo ($context["help_currency"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-currency-engine\" class=\"col-sm-2 col-form-label\">";
        // line 228
        echo ($context["entry_currency_engine"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_currency_engine\" id=\"input-currency-engine\" class=\"form-select\">
                      ";
        // line 231
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["currency_engines"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["currency_engine"]) {
            // line 232
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["currency_engine"], "value", [], "any", false, false, false, 232);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["currency_engine"], "value", [], "any", false, false, false, 232) == ($context["config_currency_engine"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["currency_engine"], "text", [], "any", false, false, false, 232);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency_engine'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 234
        echo "                    </select>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 238
        echo ($context["entry_currency_auto"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_currency_auto\" value=\"0\"/> <input type=\"checkbox\" name=\"config_currency_auto\" value=\"1\" id=\"input-currency-auto\" class=\"form-check-input\"";
        // line 241
        if (($context["config_currency_auto"] ?? null)) {
            echo " checked";
        }
        echo "/>
                    </div>
                    <div class=\"form-text\">";
        // line 243
        echo ($context["help_currency_auto"] ?? null);
        echo "</div>
                  </div>
                </div>
              </fieldset>

              <fieldset>
                <legend>";
        // line 249
        echo ($context["text_measurement"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-length-class\" class=\"col-sm-2 col-form-label\">";
        // line 251
        echo ($context["entry_length_class"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_length_class_id\" id=\"input-length-class\" class=\"form-select\">
                      ";
        // line 254
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["length_classes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["length_class"]) {
            // line 255
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["length_class"], "length_class_id", [], "any", false, false, false, 255);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["length_class"], "length_class_id", [], "any", false, false, false, 255) == ($context["config_length_class_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["length_class"], "title", [], "any", false, false, false, 255);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['length_class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 257
        echo "                    </select>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-weight-class\" class=\"col-sm-2 col-form-label\">";
        // line 261
        echo ($context["entry_weight_class"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_weight_class_id\" id=\"input-weight-class\" class=\"form-select\">
                      ";
        // line 264
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["weight_classes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["weight_class"]) {
            // line 265
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["weight_class"], "weight_class_id", [], "any", false, false, false, 265);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["weight_class"], "weight_class_id", [], "any", false, false, false, 265) == ($context["config_weight_class_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["weight_class"], "title", [], "any", false, false, false, 265);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['weight_class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 267
        echo "                    </select>
                  </div>
                </div>
              </fieldset>
            </div>

            <div id=\"tab-option\" class=\"tab-pane\">

              <div class=\"accordion\" id=\"accordion-option\">

                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-product\">";
        // line 278
        echo ($context["text_product"] ?? null);
        echo "</button></h2>

                  <div id=\"collapse-product\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">

                      <div class=\"row mt-2 mb-3 required\">
                        <label for=\"input-product-description-length\" class=\"col-sm-2 col-form-label\">";
        // line 284
        echo ($context["entry_product_description_length"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_product_description_length\" value=\"";
        // line 286
        echo ($context["config_product_description_length"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_product_description_length"] ?? null);
        echo "\" id=\"input-product-description-length\" class=\"form-control\"/>
                          <div class=\"form-text\">";
        // line 287
        echo ($context["help_product_description_length"] ?? null);
        echo "</div>
                          <div id=\"error-product-description-length\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3 required\">
                        <label for=\"input-pagination\" class=\"col-sm-2 col-form-label\">";
        // line 292
        echo ($context["entry_pagination"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_pagination\" value=\"";
        // line 294
        echo ($context["config_pagination"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_pagination"] ?? null);
        echo "\" id=\"input-pagination\" class=\"form-control\"/>
                          <div class=\"form-text\">";
        // line 295
        echo ($context["help_pagination"] ?? null);
        echo "</div>
                          <div id=\"error-pagination\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 300
        echo ($context["entry_infinite_scroll"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_product_infinite_scroll\" value=\"0\"/> <input type=\"checkbox\" name=\"config_product_infinite_scroll\" value=\"1\" id=\"input-product-infinite_scroll\" class=\"form-check-input\"";
        // line 303
        if (($context["config_product_infinite_scroll"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 305
        echo ($context["help_infinite_scroll"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 309
        echo ($context["entry_product_count"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_product_count\" value=\"0\"/> <input type=\"checkbox\" name=\"config_product_count\" value=\"1\" id=\"input-product-count\" class=\"form-check-input\"";
        // line 312
        if (($context["config_product_count"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 314
        echo ($context["help_product_count"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3 required\">
                        <label for=\"input-pagination-admin\" class=\"col-sm-2 col-form-label\">";
        // line 318
        echo ($context["entry_pagination_admin"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_pagination_admin\" value=\"";
        // line 320
        echo ($context["config_pagination_admin"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_pagination_admin"] ?? null);
        echo "\" id=\"input-pagination-admin\" class=\"form-control\"/>
                          <div class=\"form-text\">";
        // line 321
        echo ($context["help_pagination"] ?? null);
        echo "</div>
                          <div id=\"error-pagination-admin\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3 required\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 326
        echo ($context["entry_product_report"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_product_report_status\" value=\"0\"/> <input type=\"checkbox\" name=\"config_product_report_status\" value=\"1\" id=\"input-product-report\" class=\"form-check-input\"";
        // line 329
        if (($context["config_product_report_status"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 331
        echo ($context["help_product_report"] ?? null);
        echo "</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-review\">";
        // line 338
        echo ($context["text_review"] ?? null);
        echo "</button></h2>
                  <div id=\"collapse-review\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 342
        echo ($context["entry_review_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_review_status\" value=\"0\"/> <input type=\"checkbox\" name=\"config_review_status\" value=\"1\" id=\"input-review-status\" class=\"form-check-input\"";
        // line 345
        if (($context["config_review_status"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 347
        echo ($context["help_review"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 351
        echo ($context["entry_review_purchased"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_review_purchased\" value=\"0\"/> <input type=\"checkbox\" name=\"config_review_purchased\" value=\"1\" id=\"input-review-purchased\" class=\"form-check-input\"";
        // line 354
        if (($context["config_review_purchased"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 356
        echo ($context["help_review_purchased"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 360
        echo ($context["entry_review_guest"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_review_guest\" value=\"0\"/> <input type=\"checkbox\" name=\"config_review_guest\" value=\"1\" id=\"input-review-guest\" class=\"form-check-input\"";
        // line 363
        if (($context["config_review_guest"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 365
        echo ($context["help_review_guest"] ?? null);
        echo "</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-cms\">";
        // line 372
        echo ($context["text_cms"] ?? null);
        echo "</button></h2>
                  <div id=\"collapse-cms\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3 required\">
                        <label for=\"input-article-description-length\" class=\"col-sm-2 col-form-label\">";
        // line 376
        echo ($context["entry_article_description_length"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_article_description_length\" value=\"";
        // line 378
        echo ($context["config_article_description_length"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_article_description_length"] ?? null);
        echo "\" id=\"input-article-description-length\" class=\"form-control\"/>
                          <div class=\"form-text\">";
        // line 379
        echo ($context["help_article_description_length"] ?? null);
        echo "</div>
                          <div id=\"error-article-description-length\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 384
        echo ($context["entry_comment_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_comment_status\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_comment_status\" value=\"1\" id=\"input-comment-status\" class=\"form-check-input\"";
        // line 388
        if (($context["config_comment_status"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 390
        echo ($context["help_comment"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 394
        echo ($context["entry_comment_guest"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_comment_guest\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_comment_guest\" value=\"1\" id=\"input-comment-guest\" class=\"form-check-input\"";
        // line 398
        if (($context["config_comment_guest"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 400
        echo ($context["help_comment_guest"] ?? null);
        echo "</div>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 405
        echo ($context["entry_comment_approve"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_comment_approve\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_comment_approve\" value=\"1\" id=\"input-comment-approve\" class=\"form-check-input\"";
        // line 409
        if (($context["config_comment_approve"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 411
        echo ($context["help_comment_approve"] ?? null);
        echo "</div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              

                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-legal\">";
        // line 421
        echo ($context["text_legal"] ?? null);
        echo "</button></h2>
                  <div id=\"collapse-legal\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label for=\"input-cookie\" class=\"col-sm-2 col-form-label\">";
        // line 425
        echo ($context["entry_cookie"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_cookie_id\" id=\"input-cookie\" class=\"form-select\">
                            <option value=\"0\">";
        // line 428
        echo ($context["text_none"] ?? null);
        echo "</option>
                            ";
        // line 429
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 430
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 430);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 430) == ($context["config_cookie_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 430);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 432
        echo "                          </select>
                          <div class=\"form-text\">";
        // line 433
        echo ($context["help_cookie"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-gdpr\" class=\"col-sm-2 col-form-label\">";
        // line 437
        echo ($context["entry_gdpr"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_gdpr_id\" id=\"input-gdpr\" class=\"form-select\">
                            <option value=\"0\">";
        // line 440
        echo ($context["text_none"] ?? null);
        echo "</option>
                            ";
        // line 441
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 442
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 442);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 442) == ($context["config_gdpr_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 442);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 444
        echo "                          </select>
                          <div class=\"form-text\">";
        // line 445
        echo ($context["help_gdpr"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-gdpr-limit\" class=\"col-sm-2 col-form-label\">";
        // line 449
        echo ($context["entry_gdpr_limit"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_gdpr_limit\" value=\"";
        // line 451
        echo ($context["config_gdpr_limit"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_gdpr_limit"] ?? null);
        echo "\" id=\"input-gdpr-limit\" class=\"form-control\"/>
                          <div class=\"form-text\">";
        // line 452
        echo ($context["help_gdpr_limit"] ?? null);
        echo "</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-tax\">";
        // line 460
        echo ($context["text_tax"] ?? null);
        echo "</button></h2>
                  <div id=\"collapse-tax\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 464
        echo ($context["entry_tax"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_tax\" value=\"0\"/> <input type=\"checkbox\" name=\"config_tax\" value=\"1\" id=\"input-tax\" class=\"form-check-input\"";
        // line 467
        if (($context["config_tax"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-tax-default\" class=\"col-sm-2 col-form-label\">";
        // line 472
        echo ($context["entry_tax_default"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_tax_default\" id=\"input-tax-default\" class=\"form-select\">
                            <option value=\"\">";
        // line 475
        echo ($context["text_none"] ?? null);
        echo "</option>
                            <option value=\"shipping\"";
        // line 476
        if ((($context["config_tax_default"] ?? null) == "shipping")) {
            echo " selected";
        }
        echo ">";
        echo ($context["text_shipping"] ?? null);
        echo "</option>
                            <option value=\"payment\"";
        // line 477
        if ((($context["config_tax_default"] ?? null) == "payment")) {
            echo " selected";
        }
        echo ">";
        echo ($context["text_payment"] ?? null);
        echo "</option>
                          </select>
                          <div class=\"form-text\">";
        // line 479
        echo ($context["help_tax_default"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-tax-customer\" class=\"col-sm-2 col-form-label\">";
        // line 483
        echo ($context["entry_tax_customer"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_tax_customer\" id=\"input-tax-customer\" class=\"form-select\">
                            <option value=\"\">";
        // line 486
        echo ($context["text_none"] ?? null);
        echo "</option>
                            <option value=\"shipping\"";
        // line 487
        if ((($context["config_tax_customer"] ?? null) == "shipping")) {
            echo " selected";
        }
        echo ">";
        echo ($context["text_shipping"] ?? null);
        echo "</option>
                            <option value=\"payment\"";
        // line 488
        if ((($context["config_tax_customer"] ?? null) == "payment")) {
            echo " selected";
        }
        echo ">";
        echo ($context["text_payment"] ?? null);
        echo "</option>
                          </select>
                          <div class=\"form-text\">";
        // line 490
        echo ($context["help_tax_customer"] ?? null);
        echo "</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-account\">";
        // line 498
        echo ($context["text_account"] ?? null);
        echo "</button></h2>
                  <div id=\"collapse-account\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 502
        echo ($context["entry_customer_online"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_customer_online\" value=\"0\"/> <input type=\"checkbox\" name=\"config_customer_online\" value=\"1\" id=\"input-customer-online\" class=\"form-check-input\"";
        // line 505
        if (($context["config_customer_online"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 507
        echo ($context["help_customer_online"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-customer-online-expire\" class=\"col-sm-2 col-form-label\">";
        // line 511
        echo ($context["entry_customer_online_expire"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"input-group\">
                            <input type=\"text\" name=\"config_customer_online_expire\" value=\"";
        // line 514
        echo ($context["config_customer_online_expire"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_customer_online_expire"] ?? null);
        echo "\" id=\"input-customer-online-expire\" class=\"form-control\"/> <span class=\"input-group-text\" id=\"basic-addon2\">";
        echo ($context["text_hour"] ?? null);
        echo "</span>
                          </div>
                          <div class=\"form-text\">";
        // line 516
        echo ($context["help_customer_online_expire"] ?? null);
        echo "</div>
                          <div id=\"error-customer-online-expire\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 521
        echo ($context["entry_customer_activity"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_customer_activity\" value=\"0\"/> <input type=\"checkbox\" name=\"config_customer_activity\" value=\"1\" id=\"input-customer-activity\" class=\"form-check-input\"";
        // line 524
        if (($context["config_customer_activity"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 526
        echo ($context["help_customer_activity"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 530
        echo ($context["entry_customer_search"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_customer_search\" value=\"0\"/> <input type=\"checkbox\" name=\"config_customer_search\" value=\"1\" id=\"input-customer-search\" class=\"form-check-input\"";
        // line 533
        if (($context["config_customer_search"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-customer-group\" class=\"col-sm-2 col-form-label\">";
        // line 538
        echo ($context["entry_customer_group"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_customer_group_id\" id=\"input-customer-group\" class=\"form-select\">
                            ";
        // line 541
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 542
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 542);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 542) == ($context["config_customer_group_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 542);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 544
        echo "                          </select>
                          <div class=\"form-text\">";
        // line 545
        echo ($context["help_customer_group"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 549
        echo ($context["entry_customer_group_display"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div id=\"input-customer-group-display\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                            ";
        // line 552
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 553
            echo "                              <div class=\"form-check\">
                                <input type=\"checkbox\" name=\"config_customer_group_display[]\" value=\"";
            // line 554
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 554);
            echo "\" id=\"input-customer-group-";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 554);
            echo "\" class=\"form-check-input\"";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 554), ($context["config_customer_group_display"] ?? null))) {
                echo " checked";
            }
            echo "/> <label for=\"input-customer-group-";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 554);
            echo "\" class=\"form-check-label\">";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 554);
            echo "</label>
                              </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 557
        echo "                          </div>
                          <div class=\"form-text\">";
        // line 558
        echo ($context["help_customer_group_display"] ?? null);
        echo "</div>
                          <div id=\"error-customer-group-display\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 563
        echo ($context["entry_customer_price"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_customer_price\" value=\"0\"/> <input type=\"checkbox\" name=\"config_customer_price\" value=\"1\" id=\"input-customer-price\" class=\"form-check-input\"";
        // line 566
        if (($context["config_customer_price"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 568
        echo ($context["help_customer_price"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 572
        echo ($context["entry_telephone_display"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_telephone_display\" value=\"0\"/> <input type=\"checkbox\" name=\"config_telephone_display\" value=\"1\" id=\"input-telephone-display\" class=\"form-check-input\"";
        // line 575
        if (($context["config_telephone_display"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 580
        echo ($context["entry_telephone_required"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_telephone_required\" value=\"0\"/> <input type=\"checkbox\" name=\"config_telephone_required\" value=\"1\" id=\"input-telephone-required\" class=\"form-check-input\"";
        // line 583
        if (($context["config_telephone_required"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 588
        echo ($context["entry_customer_2fa"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_customer_2fa\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_customer_2fa\" value=\"1\" id=\"input-customer-2fa\" class=\"form-check-input\"";
        // line 592
        if (($context["config_customer_2fa"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 594
        echo ($context["help_customer_2fa"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-login-attempts\" class=\"col-sm-2 col-form-label\">";
        // line 598
        echo ($context["entry_login_attempts"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_login_attempts\" value=\"";
        // line 600
        echo ($context["config_login_attempts"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_login_attempts"] ?? null);
        echo "\" id=\"input-login-attempts\" class=\"form-control\"/>
                          <div class=\"form-text\">";
        // line 601
        echo ($context["help_login_attempts"] ?? null);
        echo "</div>
                          <div id=\"error-login-attempts\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-account\" class=\"col-sm-2 col-form-label\">";
        // line 606
        echo ($context["entry_account"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_account_id\" id=\"input-account\" class=\"form-select\">
                            <option value=\"0\">";
        // line 609
        echo ($context["text_none"] ?? null);
        echo "</option>
                            ";
        // line 610
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 611
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 611);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 611) == ($context["config_account_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 611);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 613
        echo "                          </select>
                          <div class=\"form-text\">";
        // line 614
        echo ($context["help_account"] ?? null);
        echo "</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-checkout\">";
        // line 622
        echo ($context["text_checkout"] ?? null);
        echo "</button></h2>
                  <div id=\"collapse-checkout\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label for=\"input-invoice-prefix\" class=\"col-sm-2 col-form-label\">";
        // line 626
        echo ($context["entry_invoice_prefix"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_invoice_prefix\" value=\"";
        // line 628
        echo ($context["config_invoice_prefix"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_invoice_prefix"] ?? null);
        echo "\" id=\"input-invoice-prefix\" class=\"form-control\"/>
                          <div class=\"form-text\">";
        // line 629
        echo ($context["help_invoice_prefix"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 633
        echo ($context["entry_cart_weight"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_cart_weight\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_cart_weight\" value=\"1\" id=\"input-cart-weight\" class=\"form-check-input\"";
        // line 637
        if (($context["config_cart_weight"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 639
        echo ($context["help_cart_weight"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 643
        echo ($context["entry_checkout_guest"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_checkout_guest\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_checkout_guest\" value=\"1\" id=\"input-checkout-guest\" class=\"form-check-input\"";
        // line 647
        if (($context["config_checkout_guest"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 649
        echo ($context["help_checkout_guest"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 653
        echo ($context["entry_config_show_company_field"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_show_company_field\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_show_company_field\" value=\"1\" id=\"input-show_company_field\" class=\"form-check-input\"";
        // line 657
        if (($context["config_show_company_field"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                         
                        </div>
                      </div>
              
                      <div class=\"row mb-3\">
                        <label for=\"input-checkout\" class=\"col-sm-2 col-form-label\">";
        // line 664
        echo ($context["entry_checkout"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_checkout_id\" id=\"input-checkout\" class=\"form-select\">
                            <option value=\"0\">";
        // line 667
        echo ($context["text_none"] ?? null);
        echo "</option>
                            ";
        // line 668
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 669
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 669);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 669) == ($context["config_checkout_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 669);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 671
        echo "                          </select>
                          <div class=\"form-text\">";
        // line 672
        echo ($context["help_checkout"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-order-status\" class=\"col-sm-2 col-form-label\">";
        // line 676
        echo ($context["entry_order_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_order_status_id\" id=\"input-order-status\" class=\"form-select\">
                            ";
        // line 679
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 680
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 680);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 680) == ($context["config_order_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 680);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 682
        echo "                          </select>
                          <div class=\"form-text\">";
        // line 683
        echo ($context["help_order_status"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 687
        echo ($context["entry_processing_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div id=\"input-processing-status\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                            ";
        // line 690
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 691
            echo "                              <div class=\"form-check\">
                                <input type=\"checkbox\" name=\"config_processing_status[]\" value=\"";
            // line 692
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 692);
            echo "\" id=\"input-processing-status-";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 692);
            echo "\" class=\"form-check-input\"";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 692), ($context["config_processing_status"] ?? null))) {
                echo " checked";
            }
            echo "/> <label for=\"input-processing-status-";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 692);
            echo "\" class=\"form-check-label\">";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 692);
            echo "</label>
                              </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 695
        echo "                          </div>
                          <div class=\"form-text\">";
        // line 696
        echo ($context["help_processing_status"] ?? null);
        echo "</div>
                          <div id=\"error-processing-status\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 701
        echo ($context["entry_complete_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div id=\"input-complete-status\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                            ";
        // line 704
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 705
            echo "                              <div class=\"form-check\">
                                <input type=\"checkbox\" name=\"config_complete_status[]\" value=\"";
            // line 706
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 706);
            echo "\" id=\"input-complete-status-";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 706);
            echo "\" class=\"form-check-input\"";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 706), ($context["config_complete_status"] ?? null))) {
                echo " checked";
            }
            echo "/> <label for=\"input-complete-status-";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 706);
            echo "\" class=\"form-check-label\">";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 706);
            echo "</label>
                              </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 709
        echo "                          </div>
                          <div class=\"form-text\">";
        // line 710
        echo ($context["help_complete_status"] ?? null);
        echo "</div>
                          <div id=\"error-complete-status\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-fraud-status\" class=\"col-sm-2 col-form-label\">";
        // line 715
        echo ($context["entry_fraud_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_fraud_status_id\" id=\"input-fraud-status\" class=\"form-select\">
                            ";
        // line 718
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 719
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 719);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 719) == ($context["config_fraud_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 719);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 721
        echo "                          </select>
                          <div class=\"form-text\">";
        // line 722
        echo ($context["help_fraud_status"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-api\" class=\"col-sm-2 col-form-label\">";
        // line 726
        echo ($context["entry_api"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_api_id\" id=\"input-api\" class=\"form-select\">
                            <option value=\"0\">";
        // line 729
        echo ($context["text_none"] ?? null);
        echo "</option>
                            ";
        // line 730
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["apis"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["api"]) {
            // line 731
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["api"], "api_id", [], "any", false, false, false, 731);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["api"], "api_id", [], "any", false, false, false, 731) == ($context["config_api_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["api"], "username", [], "any", false, false, false, 731);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['api'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 733
        echo "                          </select>
                          <div class=\"form-text\">";
        // line 734
        echo ($context["help_api"] ?? null);
        echo "</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-subscription\">";
        // line 741
        echo ($context["text_subscription"] ?? null);
        echo "</button></h2>
                  <div id=\"collapse-subscription\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-status\" class=\"col-sm-2 col-form-label\">";
        // line 746
        echo ($context["entry_subscription_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_status_id\" id=\"input-subscription-status\" class=\"form-select\">
                            ";
        // line 749
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subscription_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["subscription_status"]) {
            // line 750
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 750);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 750) == ($context["config_subscription_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "name", [], "any", false, false, false, 750);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 752
        echo "                          </select>
                          <div class=\"form-text\">";
        // line 753
        echo ($context["help_subscription"] ?? null);
        echo "</div>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-active-status\" class=\"col-sm-2 col-form-label\">";
        // line 758
        echo ($context["entry_subscription_active_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_active_status_id\" id=\"input-subscription-active-status\" class=\"form-select\">
                            ";
        // line 761
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subscription_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["subscription_status"]) {
            // line 762
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 762);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 762) == ($context["config_subscription_active_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "name", [], "any", false, false, false, 762);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 764
        echo "                          </select>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-expired-status\" class=\"col-sm-2 col-form-label\">";
        // line 769
        echo ($context["entry_subscription_expired_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_expired_status_id\" id=\"input-subscription-expired-status\" class=\"form-select\">
                            ";
        // line 772
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subscription_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["subscription_status"]) {
            // line 773
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 773);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 773) == ($context["config_subscription_expired_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "name", [], "any", false, false, false, 773);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 775
        echo "                          </select>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-suspended-status\" class=\"col-sm-2 col-form-label\">";
        // line 780
        echo ($context["entry_subscription_suspended_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_suspended_status_id\" id=\"input-subscription-suspended-status\" class=\"form-select\">
                            ";
        // line 783
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subscription_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["subscription_status"]) {
            // line 784
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 784);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 784) == ($context["config_subscription_suspended_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "name", [], "any", false, false, false, 784);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 786
        echo "                          </select>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-canceled-status\" class=\"col-sm-2 col-form-label\">";
        // line 791
        echo ($context["entry_subscription_canceled_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_canceled_status_id\" id=\"input-subscription-canceled-status\" class=\"form-select\">
                            ";
        // line 794
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subscription_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["subscription_status"]) {
            // line 795
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 795);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 795) == ($context["config_subscription_canceled_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "name", [], "any", false, false, false, 795);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 797
        echo "                          </select>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-failed-status\" class=\"col-sm-2 col-form-label\">";
        // line 802
        echo ($context["entry_subscription_failed_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_failed_status_id\" id=\"input-subscription-failed-status\" class=\"form-select\">
                            ";
        // line 805
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subscription_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["subscription_status"]) {
            // line 806
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 806);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 806) == ($context["config_subscription_failed_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "name", [], "any", false, false, false, 806);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 808
        echo "                          </select>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-denied-status\" class=\"col-sm-2 col-form-label\">";
        // line 813
        echo ($context["entry_subscription_denied_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_denied_status_id\" id=\"input-subscription-denied-status\" class=\"form-select\">
                            ";
        // line 816
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subscription_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["subscription_status"]) {
            // line 817
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 817);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["subscription_status"], "subscription_status_id", [], "any", false, false, false, 817) == ($context["config_subscription_denied_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["subscription_status"], "name", [], "any", false, false, false, 817);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 819
        echo "                          </select>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-stock\">";
        // line 827
        echo ($context["text_stock"] ?? null);
        echo "</button></h2>
                  <div id=\"collapse-stock\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 831
        echo ($context["entry_stock_display"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_stock_display\" value=\"0\"/> <input type=\"checkbox\" name=\"config_stock_display\" value=\"1\" id=\"input-stock-display\" class=\"form-check-input\"";
        // line 834
        if (($context["config_stock_display"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 836
        echo ($context["help_stock_display"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 840
        echo ($context["entry_stock_warning"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_stock_warning\" value=\"0\"/> <input type=\"checkbox\" name=\"config_stock_warning\" value=\"1\" id=\"input-stock-warning\" class=\"form-check-input\"";
        // line 843
        if (($context["config_stock_warning"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 845
        echo ($context["help_stock_warning"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 849
        echo ($context["entry_stock_checkout"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_stock_checkout\" value=\"0\"/> <input type=\"checkbox\" name=\"config_stock_checkout\" value=\"1\" id=\"input-stock-checkout\" class=\"form-check-input\"";
        // line 852
        if (($context["config_stock_checkout"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 854
        echo ($context["help_stock_checkout"] ?? null);
        echo "</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-affiliate\">";
        // line 861
        echo ($context["text_affiliate"] ?? null);
        echo "</button></h2>
                  <div id=\"collapse-affiliate\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 865
        echo ($context["entry_affiliate_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_affiliate_status\" value=\"0\"/> <input type=\"checkbox\" name=\"config_affiliate_status\" value=\"1\" id=\"input-affiliate-status\" class=\"form-check-input\"";
        // line 868
        if (($context["config_affiliate_status"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 870
        echo ($context["help_affiliate_status"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-affiliate-group\" class=\"col-sm-2 col-form-label\">";
        // line 874
        echo ($context["entry_affiliate_group"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_affiliate_group_id\" id=\"input-affiliate-group\" class=\"form-select\">
                            ";
        // line 877
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 878
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 878);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 878) == ($context["config_affiliate_group_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 878);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 880
        echo "                          </select>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 884
        echo ($context["entry_affiliate_approval"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_affiliate_approval\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_affiliate_approval\" value=\"1\" id=\"input-affiliate-approval\" class=\"form-check-input\"";
        // line 888
        if (($context["config_affiliate_approval"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 890
        echo ($context["help_affiliate_approval"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 894
        echo ($context["entry_affiliate_auto"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_affiliate_auto\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_affiliate_auto\" value=\"1\" id=\"input-affiliate-auto\" class=\"form-check-input\"";
        // line 898
        if (($context["config_affiliate_auto"] ?? null)) {
            echo " checked";
        }
        echo "/>
                          </div>
                          <div class=\"form-text\">";
        // line 900
        echo ($context["help_affiliate_auto"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-affiliate-commission\" class=\"col-sm-2 col-form-label\">";
        // line 904
        echo ($context["entry_affiliate_commission"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_affiliate_commission\" value=\"";
        // line 906
        echo ($context["config_affiliate_commission"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_affiliate_commission"] ?? null);
        echo "\" id=\"input-affiliate-commission\" class=\"form-control\"/>
                          <div class=\"form-text\">";
        // line 907
        echo ($context["help_affiliate_commission"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-affiliate-expire\" class=\"col-sm-2 col-form-label\">";
        // line 911
        echo ($context["entry_affiliate_expire"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_affiliate_expire\" value=\"";
        // line 913
        echo ($context["config_affiliate_expire"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_affiliate_expire"] ?? null);
        echo "\" id=\"input-affiliate-expire\" class=\"form-control\"/>
                          <div class=\"form-text\">";
        // line 914
        echo ($context["help_affiliate_expire"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-affiliate\" class=\"col-sm-2 col-form-label\">";
        // line 918
        echo ($context["entry_affiliate"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_affiliate_id\" id=\"input-affiliate\" class=\"form-select\">
                            <option value=\"0\">";
        // line 921
        echo ($context["text_none"] ?? null);
        echo "</option>
                            ";
        // line 922
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 923
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 923);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 923) == ($context["config_affiliate_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 923);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 925
        echo "                          </select>
                          <div class=\"form-text\">";
        // line 926
        echo ($context["help_affiliate"] ?? null);
        echo "</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-return\">";
        // line 933
        echo ($context["text_return"] ?? null);
        echo "</button></h2>
                  <div id=\"collapse-return\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mb-3\">
                        <label for=\"input-return-status\" class=\"col-sm-2 col-form-label\">";
        // line 937
        echo ($context["entry_return_status"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_return_status_id\" id=\"input-return-status\" class=\"form-select\">
                            ";
        // line 940
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["return_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["return_status"]) {
            // line 941
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["return_status"], "return_status_id", [], "any", false, false, false, 941);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["return_status"], "return_status_id", [], "any", false, false, false, 941) == ($context["config_return_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["return_status"], "name", [], "any", false, false, false, 941);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['return_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 943
        echo "                          </select>
                          <div class=\"form-text\">";
        // line 944
        echo ($context["help_return_status"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mt-2 mb-3\">
                        <label for=\"input-return\" class=\"col-sm-2 col-form-label\">";
        // line 948
        echo ($context["entry_return"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_return_id\" id=\"input-return\" class=\"form-select\">
                            <option value=\"0\">";
        // line 951
        echo ($context["text_none"] ?? null);
        echo "</option>
                            ";
        // line 952
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 953
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 953);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 953) == ($context["config_return_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 953);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 955
        echo "                          </select>
                          <div class=\"form-text\">";
        // line 956
        echo ($context["help_return"] ?? null);
        echo "</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-captcha\">";
        // line 963
        echo ($context["text_captcha"] ?? null);
        echo "</button></h2>
                  <div id=\"collapse-captcha\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label for=\"input-captcha\" class=\"col-sm-2 col-form-label\">";
        // line 967
        echo ($context["entry_captcha"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_captcha\" id=\"input-captcha\" class=\"form-select\">
                            <option value=\"\">";
        // line 970
        echo ($context["text_none"] ?? null);
        echo "</option>
                            ";
        // line 971
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["captchas"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["captcha"]) {
            // line 972
            echo "                              <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["captcha"], "value", [], "any", false, false, false, 972);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["captcha"], "value", [], "any", false, false, false, 972) == ($context["config_captcha"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["captcha"], "text", [], "any", false, false, false, 972);
            echo "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['captcha'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 974
        echo "                          </select>
                          <div class=\"form-text\">";
        // line 975
        echo ($context["help_captcha"] ?? null);
        echo "</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">";
        // line 979
        echo ($context["entry_captcha_page"] ?? null);
        echo "</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                            ";
        // line 982
        $context["captcha_page_row"] = 0;
        // line 983
        echo "                            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["captcha_pages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["captcha_page"]) {
            // line 984
            echo "                              <div class=\"form-check\">
                                <input type=\"checkbox\" name=\"config_captcha_page[]\" value=\"";
            // line 985
            echo twig_get_attribute($this->env, $this->source, $context["captcha_page"], "value", [], "any", false, false, false, 985);
            echo "\" id=\"input-captcha-";
            echo ($context["captcha_page_row"] ?? null);
            echo "\" class=\"form-check-input\"";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["captcha_page"], "value", [], "any", false, false, false, 985), ($context["config_captcha_page"] ?? null))) {
                echo " checked";
            }
            echo "/> <label for=\"input-captcha-";
            echo ($context["captcha_page_row"] ?? null);
            echo "\" class=\"form-check-label\">";
            echo twig_get_attribute($this->env, $this->source, $context["captcha_page"], "text", [], "any", false, false, false, 985);
            echo "</label>
                              </div>
                              ";
            // line 987
            $context["captcha_page_row"] = (($context["captcha_page_row"] ?? null) + 1);
            // line 988
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['captcha_page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 989
        echo "                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id=\"tab-image\" class=\"tab-pane\">
               <legend>";
        // line 998
        echo ($context["text_image_settings"] ?? null);
        echo "</legend>
              <fieldset>
              <!-- File Type Selection -->
<div class=\"row mb-3 required\">
  <label for=\"input-image-filetype\" class=\"col-sm-2 col-form-label\">";
        // line 1002
        echo ($context["entry_image_filetype"] ?? null);
        echo "</label>
  <div class=\"col-sm-10\">
    <select name=\"config_image_filetype\" id=\"input-image-filetype\" class=\"form-control\">
      <option value=\"as_uploaded\" ";
        // line 1005
        echo (((($context["config_image_filetype"] ?? null) == "as_uploaded")) ? ("selected") : (""));
        echo ">";
        echo ($context["entry_filetype_as_uploaded"] ?? null);
        echo "</option>
      <option value=\"webp\" ";
        // line 1006
        echo (((($context["config_image_filetype"] ?? null) == "webp")) ? ("selected") : (""));
        echo ">";
        echo ($context["entry_filetype_webp"] ?? null);
        echo "</option>
      <option value=\"avif\" ";
        // line 1007
        echo (((($context["config_image_filetype"] ?? null) == "avif")) ? ("selected") : (""));
        echo ">";
        echo ($context["entry_filetype_avif"] ?? null);
        echo "</option>
      <option value=\"jpeg\" ";
        // line 1008
        echo (((($context["config_image_filetype"] ?? null) == "jpeg")) ? ("selected") : (""));
        echo ">";
        echo ($context["entry_filetype_jpeg"] ?? null);
        echo "</option>
      <option value=\"png\" ";
        // line 1009
        echo (((($context["config_image_filetype"] ?? null) == "png")) ? ("selected") : (""));
        echo ">";
        echo ($context["entry_filetype_png"] ?? null);
        echo "</option>
    </select>
    <div id=\"error-image-filetype\" class=\"invalid-feedback\"></div>
  </div>
</div>

<!-- Image Quality Selection -->
<div class=\"row mb-3 required\">
  <label for=\"input-image-quality\" class=\"col-sm-2 col-form-label\">";
        // line 1017
        echo ($context["entry_image_quality"] ?? null);
        echo "</label>
  <div class=\"col-sm-10\">
    <input type=\"number\" name=\"config_image_quality\" value=\"";
        // line 1019
        echo ($context["config_image_quality"] ?? null);
        echo "\" min=\"1\" max=\"100\" placeholder=\"";
        echo ($context["entry_quality"] ?? null);
        echo "\" id=\"input-image-quality\" class=\"form-control\"/>
    <div id=\"error-image-quality\" class=\"invalid-feedback\"></div>
  </div>
</div>
                <legend>";
        // line 1023
        echo ($context["text_image_size"] ?? null);
        echo "</legend>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-default-width\" class=\"col-sm-2 col-form-label\">";
        // line 1025
        echo ($context["entry_image_default"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-default\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_default_width\" value=\"";
        // line 1029
        echo ($context["config_image_default_width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-image-default-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_default_height\" value=\"";
        // line 1032
        echo ($context["config_image_default_height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-image-default-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-default\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-category-width\" class=\"col-sm-2 col-form-label\">";
        // line 1039
        echo ($context["entry_image_category"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-category\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_category_width\" value=\"";
        // line 1043
        echo ($context["config_image_category_width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-image-category-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_category_height\" value=\"";
        // line 1046
        echo ($context["config_image_category_height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-image-category-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-category\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-thumb-width\" class=\"col-sm-2 col-form-label\">";
        // line 1053
        echo ($context["entry_image_thumb"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-thumb\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_thumb_width\" value=\"";
        // line 1057
        echo ($context["config_image_thumb_width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-image-thumb-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_thumb_height\" value=\"";
        // line 1060
        echo ($context["config_image_thumb_height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-image-thumb-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-thumb\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-popup-width\" class=\"col-sm-2 col-form-label\">";
        // line 1067
        echo ($context["entry_image_popup"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-popup\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_popup_width\" value=\"";
        // line 1071
        echo ($context["config_image_popup_width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-image-popup-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_popup_height\" value=\"";
        // line 1074
        echo ($context["config_image_popup_height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-image-popup-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-popup\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-product-width\" class=\"col-sm-2 col-form-label\">";
        // line 1081
        echo ($context["entry_image_product"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-product\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_product_width\" value=\"";
        // line 1085
        echo ($context["config_image_product_width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-image-product-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_product_height\" value=\"";
        // line 1088
        echo ($context["config_image_product_height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-image-product-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-product\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-additional-width\" class=\"col-sm-2 col-form-label\">";
        // line 1095
        echo ($context["entry_image_additional"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-additional\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_additional_width\" value=\"";
        // line 1099
        echo ($context["config_image_additional_width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-image-additional-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_additional_height\" value=\"";
        // line 1102
        echo ($context["config_image_additional_height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-image-additional-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-additional\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-related-width\" class=\"col-sm-2 col-form-label\">";
        // line 1109
        echo ($context["entry_image_related"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-related\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_related_width\" value=\"";
        // line 1113
        echo ($context["config_image_related_width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-image-related-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_related_height\" value=\"";
        // line 1116
        echo ($context["config_image_related_height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-image-related-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-related\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-article-width\" class=\"col-sm-2 col-form-label\">";
        // line 1123
        echo ($context["entry_image_article"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-article\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_article_width\" value=\"";
        // line 1127
        echo ($context["config_image_article_width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-image-article-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_article_height\" value=\"";
        // line 1130
        echo ($context["config_image_article_height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-image-article-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-article\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-topic-width\" class=\"col-sm-2 col-form-label\">";
        // line 1137
        echo ($context["entry_image_topic"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-topic\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_topic_width\" value=\"";
        // line 1141
        echo ($context["config_image_topic_width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-image-topic-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_topic_height\" value=\"";
        // line 1144
        echo ($context["config_image_topic_height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-image-topic-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-topic\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-compare-width\" class=\"col-sm-2 col-form-label\">";
        // line 1151
        echo ($context["entry_image_compare"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-compare\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_compare_width\" value=\"";
        // line 1155
        echo ($context["config_image_compare_width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-image-compare-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_compare_height\" value=\"";
        // line 1158
        echo ($context["config_image_compare_height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-image-compare-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-compare\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-wishlist-width\" class=\"col-sm-2 col-form-label\">";
        // line 1165
        echo ($context["entry_image_wishlist"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-wishlist\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_wishlist_width\" value=\"";
        // line 1169
        echo ($context["config_image_wishlist_width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-image-wishlist-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_wishlist_height\" value=\"";
        // line 1172
        echo ($context["config_image_wishlist_height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-image-wishlist-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-wishlist\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-cart-width\" class=\"col-sm-2 col-form-label\">";
        // line 1179
        echo ($context["entry_image_cart"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-cart\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_cart_width\" value=\"";
        // line 1183
        echo ($context["config_image_cart_width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-image-cart-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_cart_height\" value=\"";
        // line 1186
        echo ($context["config_image_cart_height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-image-cart-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-cart\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-location-width\" class=\"col-sm-2 col-form-label\">";
        // line 1193
        echo ($context["entry_image_location"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-location\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_location_width\" value=\"";
        // line 1197
        echo ($context["config_image_location_width"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_width"] ?? null);
        echo "\" id=\"input-image-location-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_location_height\" value=\"";
        // line 1200
        echo ($context["config_image_location_height"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_height"] ?? null);
        echo "\" id=\"input-image-location-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-location\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
              </fieldset>
            </div>
            <div id=\"tab-mail\" class=\"tab-pane\">
              <fieldset>
                <legend>";
        // line 1210
        echo ($context["text_general"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-engine\" class=\"col-sm-2 col-form-label\">";
        // line 1212
        echo ($context["entry_mail_engine"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_mail_engine\" id=\"input-mail-engine\" class=\"form-select\">
                      <option value=\"\">";
        // line 1215
        echo ($context["text_none"] ?? null);
        echo "</option>
                      <option value=\"mail\"";
        // line 1216
        if ((($context["config_mail_engine"] ?? null) == "mail")) {
            echo " selected";
        }
        echo ">";
        echo ($context["text_mail"] ?? null);
        echo "</option>
                      <option value=\"smtp\"";
        // line 1217
        if ((($context["config_mail_engine"] ?? null) == "smtp")) {
            echo " selected";
        }
        echo ">";
        echo ($context["text_smtp"] ?? null);
        echo "</option>
                    </select>
                    <div class=\"form-text\">";
        // line 1219
        echo ($context["help_mail_engine"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-parameter\" class=\"col-sm-2 col-form-label\">";
        // line 1223
        echo ($context["entry_mail_parameter"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_parameter\" value=\"";
        // line 1225
        echo ($context["config_mail_parameter"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mail_parameter"] ?? null);
        echo "\" id=\"input-mail-parameter\" class=\"form-control\"/>
                    <div class=\"form-text\">";
        // line 1226
        echo ($context["help_mail_parameter"] ?? null);
        echo "</div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 1231
        echo ($context["text_smtp"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-smtp-hostname\" class=\"col-sm-2 col-form-label\">";
        // line 1233
        echo ($context["entry_mail_smtp_hostname"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_hostname\" value=\"";
        // line 1235
        echo ($context["config_mail_smtp_hostname"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mail_smtp_hostname"] ?? null);
        echo "\" id=\"input-mail-smtp-hostname\" class=\"form-control\"/>
                    <div class=\"form-text\">";
        // line 1236
        echo ($context["help_mail_smtp_hostname"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-smtp-username\" class=\"col-sm-2 col-form-label\">";
        // line 1240
        echo ($context["entry_mail_smtp_username"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_username\" value=\"";
        // line 1242
        echo ($context["config_mail_smtp_username"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mail_smtp_username"] ?? null);
        echo "\" id=\"input-mail-smtp-username\" class=\"form-control\"/>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-smtp-password\" class=\"col-sm-2 col-form-label\">";
        // line 1246
        echo ($context["entry_mail_smtp_password"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_password\" value=\"";
        // line 1248
        echo ($context["config_mail_smtp_password"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mail_smtp_password"] ?? null);
        echo "\" id=\"input-mail-smtp-password\" class=\"form-control\"/>
                    <div class=\"form-text\">";
        // line 1249
        echo ($context["help_mail_smtp_password"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-smtp-port\" class=\"col-sm-2 col-form-label\">";
        // line 1253
        echo ($context["entry_mail_smtp_port"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_port\" value=\"";
        // line 1255
        echo ($context["config_mail_smtp_port"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mail_smtp_port"] ?? null);
        echo "\" id=\"input-mail-smtp-port\" class=\"form-control\"/>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-smtp-timeout\" class=\"col-sm-2 col-form-label\">";
        // line 1259
        echo ($context["entry_mail_smtp_timeout"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_timeout\" value=\"";
        // line 1261
        echo ($context["config_mail_smtp_timeout"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mail_smtp_timeout"] ?? null);
        echo "\" id=\"input-mail-smtp-timeout\" class=\"form-control\"/>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 1266
        echo ($context["text_mail_alert"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 1268
        echo ($context["entry_mail_alert"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                      ";
        // line 1271
        $context["mail_alert_row"] = 0;
        // line 1272
        echo "                      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["mail_alerts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["mail_alert"]) {
            // line 1273
            echo "                        <div class=\"form-check\">
                          <input type=\"checkbox\" name=\"config_mail_alert[]\" value=\"";
            // line 1274
            echo twig_get_attribute($this->env, $this->source, $context["mail_alert"], "value", [], "any", false, false, false, 1274);
            echo "\" id=\"input-mail-alert-";
            echo ($context["mail_alert_row"] ?? null);
            echo "\" class=\"form-check-input\"";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["mail_alert"], "value", [], "any", false, false, false, 1274), ($context["config_mail_alert"] ?? null))) {
                echo " checked";
            }
            echo "/> <label for=\"input-mail-alert-";
            echo ($context["mail_alert_row"] ?? null);
            echo "\" class=\"form-check-label\">";
            echo twig_get_attribute($this->env, $this->source, $context["mail_alert"], "text", [], "any", false, false, false, 1274);
            echo "</label>
                        </div>
                        ";
            // line 1276
            $context["mail_alert_row"] = (($context["mail_alert_row"] ?? null) + 1);
            // line 1277
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mail_alert'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1278
        echo "                    </div>
                    <div class=\"form-text\">";
        // line 1279
        echo ($context["help_mail_alert"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-alert-email\" class=\"col-sm-2 col-form-label\">";
        // line 1283
        echo ($context["entry_mail_alert_email"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"config_mail_alert_email\" rows=\"5\" placeholder=\"";
        // line 1285
        echo ($context["entry_mail_alert_email"] ?? null);
        echo "\" id=\"input-mail-alert-email\" class=\"form-control\">";
        echo ($context["config_mail_alert_email"] ?? null);
        echo "</textarea>
                    <div class=\"form-text\">";
        // line 1286
        echo ($context["help_mail_alert_email"] ?? null);
        echo "</div>
                  </div>
                </div>
              </fieldset>
            </div>
            <div id=\"tab-server\" class=\"tab-pane\">
              <fieldset>
                <legend>";
        // line 1293
        echo ($context["text_general"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 1295
        echo ($context["entry_maintenance"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_maintenance\" value=\"0\"/> <input type=\"checkbox\" name=\"config_maintenance\" value=\"1\" id=\"input-maintenance\" class=\"form-check-input\"";
        // line 1298
        if (($context["config_maintenance"] ?? null)) {
            echo " checked";
        }
        echo "/>
                    </div>
                    <div class=\"form-text\">";
        // line 1300
        echo ($context["help_maintenance"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-session-expire\" class=\"col-sm-2 col-form-label\">";
        // line 1304
        echo ($context["entry_session_expire"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_session_expire\" value=\"";
        // line 1306
        echo ($context["config_session_expire"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_session_expire"] ?? null);
        echo "\" id=\"input-session-expire\" class=\"form-control\"/>
                    <div class=\"form-text\">";
        // line 1307
        echo ($context["help_session_expire"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-session-samesite\" class=\"col-sm-2 col-form-label\">";
        // line 1311
        echo ($context["entry_session_samesite"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_session_samesite\" id=\"input-session-samesite\" class=\"form-select\">
                      <option value=\"None\"";
        // line 1314
        if ((($context["config_session_samesite"] ?? null) == "None")) {
            echo " selected";
        }
        echo ">";
        echo ($context["text_none"] ?? null);
        echo "</option>
                      <option value=\"Lax\"";
        // line 1315
        if ((($context["config_session_samesite"] ?? null) == "Lax")) {
            echo " selected";
        }
        echo ">";
        echo ($context["text_lax"] ?? null);
        echo "</option>
                      <option value=\"Strict\"";
        // line 1316
        if ((($context["config_session_samesite"] ?? null) == "Strict")) {
            echo " selected";
        }
        echo ">";
        echo ($context["text_strict"] ?? null);
        echo "</option>
                    </select>
                    <div class=\"form-text\">";
        // line 1318
        echo ($context["help_session_samesite"] ?? null);
        echo "</div>
                  </div>
                </div>

                       <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 1323
        echo ($context["entry_minify_all"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_minify_all\" value=\"0\"/> <input type=\"checkbox\" name=\"config_minify_all\" value=\"1\" id=\"input-minify-all\" class=\"form-check-input\"";
        // line 1326
        if (($context["config_minify_all"] ?? null)) {
            echo " checked";
        }
        echo "/>
                    </div>
                    <div class=\"form-text\">";
        // line 1328
        echo ($context["help_minify_all"] ?? null);
        echo "</div>
                  </div>
                </div>

                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 1333
        echo ($context["entry_seo_url"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_seo_url\" value=\"0\"/> <input type=\"checkbox\" name=\"config_seo_url\" value=\"1\" id=\"input-seo-url\" class=\"form-check-input\"";
        // line 1336
        if (($context["config_seo_url"] ?? null)) {
            echo " checked";
        }
        echo "/>
                    </div>
                    <div class=\"form-text\">";
        // line 1338
        echo ($context["help_seo_url"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-robots\" class=\"col-sm-2 col-form-label\">";
        // line 1342
        echo ($context["entry_robots"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"config_robots\" rows=\"5\" placeholder=\"";
        // line 1344
        echo ($context["entry_robots"] ?? null);
        echo "\" id=\"input-robots\" class=\"form-control\">";
        echo ($context["config_robots"] ?? null);
        echo "</textarea>
                    <div class=\"form-text\">";
        // line 1345
        echo ($context["help_robots"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-compression\" class=\"col-sm-2 col-form-label\">";
        // line 1349
        echo ($context["entry_compression"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_compression\" value=\"";
        // line 1351
        echo ($context["config_compression"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_compression"] ?? null);
        echo "\" id=\"input-compression\" class=\"form-control\"/>
                    <div class=\"form-text\">";
        // line 1352
        echo ($context["help_compression"] ?? null);
        echo "</div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 1357
        echo ($context["text_security"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 1359
        echo ($context["entry_user_2fa"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_user_2fa\" value=\"0\"/>
                      <input type=\"checkbox\" name=\"config_user_2fa\" value=\"1\" id=\"input-user-2fa\" class=\"form-check-input\"";
        // line 1363
        if (($context["config_user_2fa"] ?? null)) {
            echo " checked";
        }
        echo "/>
                    </div>
                    <div class=\"form-text\">";
        // line 1365
        echo ($context["help_user_2fa"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 1369
        echo ($context["entry_shared"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_shared\" value=\"0\"/> <input type=\"checkbox\" name=\"config_shared\" value=\"1\" id=\"input-shared\" class=\"form-check-input\"";
        // line 1372
        if (($context["config_shared"] ?? null)) {
            echo " checked";
        }
        echo "/>
                    </div>
                    <div class=\"form-text\">";
        // line 1374
        echo ($context["help_shared"] ?? null);
        echo "</div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 1379
        echo ($context["text_upload"] ?? null);
        echo "</legend>
                <div class=\"row mb-3 required\">
                  <label for=\"input-file-max-size\" class=\"col-sm-2 col-form-label\">";
        // line 1381
        echo ($context["entry_file_max_size"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_file_max_size\" value=\"";
        // line 1383
        echo ($context["config_file_max_size"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_file_max_size"] ?? null);
        echo "\" id=\"input-file-max-size\" class=\"form-control\"/>
                    <div class=\"form-text\">";
        // line 1384
        echo ($context["help_file_max_size"] ?? null);
        echo "</div>
                    <div id=\"error-file-max-size\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-file-ext-allowed\" class=\"col-sm-2 col-form-label\">";
        // line 1389
        echo ($context["entry_file_ext_allowed"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"config_file_ext_allowed\" rows=\"5\" placeholder=\"";
        // line 1391
        echo ($context["entry_file_ext_allowed"] ?? null);
        echo "\" id=\"input-file-ext-allowed\" class=\"form-control\">";
        echo ($context["config_file_ext_allowed"] ?? null);
        echo "</textarea>
                    <div class=\"form-text\">";
        // line 1392
        echo ($context["help_file_ext_allowed"] ?? null);
        echo "</div>
                    <div id=\"error-file-ext-allowed\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-file-mime-allowed\" class=\"col-sm-2 col-form-label\">";
        // line 1397
        echo ($context["entry_file_mime_allowed"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"config_file_mime_allowed\" rows=\"5\" placeholder=\"";
        // line 1399
        echo ($context["entry_file_mime_allowed"] ?? null);
        echo "\" id=\"input-file-mime-allowed\" class=\"form-control\">";
        echo ($context["config_file_mime_allowed"] ?? null);
        echo "</textarea>
                    <div class=\"form-text\">";
        // line 1400
        echo ($context["help_file_mime_allowed"] ?? null);
        echo "</div>
                    <div id=\"error-file-mime-allowed\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 1406
        echo ($context["text_error"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 1408
        echo ($context["entry_error_display"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_error_display\" value=\"0\"/> <input type=\"checkbox\" name=\"config_error_display\" value=\"1\" id=\"input-error-display\" class=\"form-check-input\"";
        // line 1411
        if (($context["config_error_display"] ?? null)) {
            echo " checked";
        }
        echo "/>
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 1416
        echo ($context["entry_error_log"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_error_log\" value=\"0\"/> <input type=\"checkbox\" name=\"config_error_log\" value=\"1\" id=\"input-error-log\" class=\"form-check-input\"";
        // line 1419
        if (($context["config_error_log"] ?? null)) {
            echo " checked";
        }
        echo "/>
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-error-filename\" class=\"col-sm-2 col-form-label\">";
        // line 1424
        echo ($context["entry_error_filename"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_error_filename\" value=\"";
        // line 1426
        echo ($context["config_error_filename"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_error_filename"] ?? null);
        echo "\" id=\"input-error-filename\" class=\"form-control\"/>
                    <div id=\"error-error-filename\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script ><!--
\$('#input-theme').on('change', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=setting/setting.theme&user_token=";
        // line 1443
        echo ($context["user_token"] ?? null);
        echo "&theme=' + this.value,
        dataType: 'html',
        beforeSend: function() {
            \$(element).prop('disabled', true);
        },
        complete: function() {
            \$(element).prop('disabled', false);
        },
        success: function(html) {
            \$('#theme-thumb').attr('src', html);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-theme').trigger('change');

\$('#input-country').on('change', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=localisation/country.country&user_token=";
        // line 1466
        echo ($context["user_token"] ?? null);
        echo "&country_id=' + this.value,
        dataType: 'json',
        beforeSend: function() {
            \$(element).prop('disabled', true);
            \$('#input-zone').prop('disabled', true);
        },
        complete: function() {
            \$(element).prop('disabled', false);
            \$('#input-zone').prop('disabled', false);
        },
        success: function(json) {
            html = '<option value=\"\">";
        // line 1477
        echo twig_escape_filter($this->env, ($context["text_select"] ?? null), "js");
        echo "</option>';

            if (json['zone'] && json['zone'] != '') {
                for (i = 0; i < json['zone'].length; i++) {
                    html += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';

                    if (json['zone'][i]['zone_id'] == '";
        // line 1483
        echo ($context["config_zone_id"] ?? null);
        echo "') {
                        html += ' selected';
                    }

                    html += '>' + json['zone'][i]['name'] + '</option>';
                }
            } else {
                html += '<option value=\"0\" selected>";
        // line 1490
        echo twig_escape_filter($this->env, ($context["text_none"] ?? null), "js");
        echo "</option>';
            }

            \$('#input-zone').html(html);

            \$('#button-save').prop('disabled', false);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-country').trigger('change');
//--></script>
";
        // line 1505
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/setting/setting.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  3588 => 1505,  3570 => 1490,  3560 => 1483,  3551 => 1477,  3537 => 1466,  3511 => 1443,  3489 => 1426,  3484 => 1424,  3474 => 1419,  3468 => 1416,  3458 => 1411,  3452 => 1408,  3447 => 1406,  3438 => 1400,  3432 => 1399,  3427 => 1397,  3419 => 1392,  3413 => 1391,  3408 => 1389,  3400 => 1384,  3394 => 1383,  3389 => 1381,  3384 => 1379,  3376 => 1374,  3369 => 1372,  3363 => 1369,  3356 => 1365,  3349 => 1363,  3342 => 1359,  3337 => 1357,  3329 => 1352,  3323 => 1351,  3318 => 1349,  3311 => 1345,  3305 => 1344,  3300 => 1342,  3293 => 1338,  3286 => 1336,  3280 => 1333,  3272 => 1328,  3265 => 1326,  3259 => 1323,  3251 => 1318,  3242 => 1316,  3234 => 1315,  3226 => 1314,  3220 => 1311,  3213 => 1307,  3207 => 1306,  3202 => 1304,  3195 => 1300,  3188 => 1298,  3182 => 1295,  3177 => 1293,  3167 => 1286,  3161 => 1285,  3156 => 1283,  3149 => 1279,  3146 => 1278,  3140 => 1277,  3138 => 1276,  3123 => 1274,  3120 => 1273,  3115 => 1272,  3113 => 1271,  3107 => 1268,  3102 => 1266,  3092 => 1261,  3087 => 1259,  3078 => 1255,  3073 => 1253,  3066 => 1249,  3060 => 1248,  3055 => 1246,  3046 => 1242,  3041 => 1240,  3034 => 1236,  3028 => 1235,  3023 => 1233,  3018 => 1231,  3010 => 1226,  3004 => 1225,  2999 => 1223,  2992 => 1219,  2983 => 1217,  2975 => 1216,  2971 => 1215,  2965 => 1212,  2960 => 1210,  2945 => 1200,  2937 => 1197,  2930 => 1193,  2918 => 1186,  2910 => 1183,  2903 => 1179,  2891 => 1172,  2883 => 1169,  2876 => 1165,  2864 => 1158,  2856 => 1155,  2849 => 1151,  2837 => 1144,  2829 => 1141,  2822 => 1137,  2810 => 1130,  2802 => 1127,  2795 => 1123,  2783 => 1116,  2775 => 1113,  2768 => 1109,  2756 => 1102,  2748 => 1099,  2741 => 1095,  2729 => 1088,  2721 => 1085,  2714 => 1081,  2702 => 1074,  2694 => 1071,  2687 => 1067,  2675 => 1060,  2667 => 1057,  2660 => 1053,  2648 => 1046,  2640 => 1043,  2633 => 1039,  2621 => 1032,  2613 => 1029,  2606 => 1025,  2601 => 1023,  2592 => 1019,  2587 => 1017,  2574 => 1009,  2568 => 1008,  2562 => 1007,  2556 => 1006,  2550 => 1005,  2544 => 1002,  2537 => 998,  2526 => 989,  2520 => 988,  2518 => 987,  2503 => 985,  2500 => 984,  2495 => 983,  2493 => 982,  2487 => 979,  2480 => 975,  2477 => 974,  2462 => 972,  2458 => 971,  2454 => 970,  2448 => 967,  2441 => 963,  2431 => 956,  2428 => 955,  2413 => 953,  2409 => 952,  2405 => 951,  2399 => 948,  2392 => 944,  2389 => 943,  2374 => 941,  2370 => 940,  2364 => 937,  2357 => 933,  2347 => 926,  2344 => 925,  2329 => 923,  2325 => 922,  2321 => 921,  2315 => 918,  2308 => 914,  2302 => 913,  2297 => 911,  2290 => 907,  2284 => 906,  2279 => 904,  2272 => 900,  2265 => 898,  2258 => 894,  2251 => 890,  2244 => 888,  2237 => 884,  2231 => 880,  2216 => 878,  2212 => 877,  2206 => 874,  2199 => 870,  2192 => 868,  2186 => 865,  2179 => 861,  2169 => 854,  2162 => 852,  2156 => 849,  2149 => 845,  2142 => 843,  2136 => 840,  2129 => 836,  2122 => 834,  2116 => 831,  2109 => 827,  2099 => 819,  2084 => 817,  2080 => 816,  2074 => 813,  2067 => 808,  2052 => 806,  2048 => 805,  2042 => 802,  2035 => 797,  2020 => 795,  2016 => 794,  2010 => 791,  2003 => 786,  1988 => 784,  1984 => 783,  1978 => 780,  1971 => 775,  1956 => 773,  1952 => 772,  1946 => 769,  1939 => 764,  1924 => 762,  1920 => 761,  1914 => 758,  1906 => 753,  1903 => 752,  1888 => 750,  1884 => 749,  1878 => 746,  1870 => 741,  1860 => 734,  1857 => 733,  1842 => 731,  1838 => 730,  1834 => 729,  1828 => 726,  1821 => 722,  1818 => 721,  1803 => 719,  1799 => 718,  1793 => 715,  1785 => 710,  1782 => 709,  1763 => 706,  1760 => 705,  1756 => 704,  1750 => 701,  1742 => 696,  1739 => 695,  1720 => 692,  1717 => 691,  1713 => 690,  1707 => 687,  1700 => 683,  1697 => 682,  1682 => 680,  1678 => 679,  1672 => 676,  1665 => 672,  1662 => 671,  1647 => 669,  1643 => 668,  1639 => 667,  1633 => 664,  1621 => 657,  1614 => 653,  1607 => 649,  1600 => 647,  1593 => 643,  1586 => 639,  1579 => 637,  1572 => 633,  1565 => 629,  1559 => 628,  1554 => 626,  1547 => 622,  1536 => 614,  1533 => 613,  1518 => 611,  1514 => 610,  1510 => 609,  1504 => 606,  1496 => 601,  1490 => 600,  1485 => 598,  1478 => 594,  1471 => 592,  1464 => 588,  1454 => 583,  1448 => 580,  1438 => 575,  1432 => 572,  1425 => 568,  1418 => 566,  1412 => 563,  1404 => 558,  1401 => 557,  1382 => 554,  1379 => 553,  1375 => 552,  1369 => 549,  1362 => 545,  1359 => 544,  1344 => 542,  1340 => 541,  1334 => 538,  1324 => 533,  1318 => 530,  1311 => 526,  1304 => 524,  1298 => 521,  1290 => 516,  1281 => 514,  1275 => 511,  1268 => 507,  1261 => 505,  1255 => 502,  1248 => 498,  1237 => 490,  1228 => 488,  1220 => 487,  1216 => 486,  1210 => 483,  1203 => 479,  1194 => 477,  1186 => 476,  1182 => 475,  1176 => 472,  1166 => 467,  1160 => 464,  1153 => 460,  1142 => 452,  1136 => 451,  1131 => 449,  1124 => 445,  1121 => 444,  1106 => 442,  1102 => 441,  1098 => 440,  1092 => 437,  1085 => 433,  1082 => 432,  1067 => 430,  1063 => 429,  1059 => 428,  1053 => 425,  1046 => 421,  1033 => 411,  1026 => 409,  1019 => 405,  1011 => 400,  1004 => 398,  997 => 394,  990 => 390,  983 => 388,  976 => 384,  968 => 379,  962 => 378,  957 => 376,  950 => 372,  940 => 365,  933 => 363,  927 => 360,  920 => 356,  913 => 354,  907 => 351,  900 => 347,  893 => 345,  887 => 342,  880 => 338,  870 => 331,  863 => 329,  857 => 326,  849 => 321,  843 => 320,  838 => 318,  831 => 314,  824 => 312,  818 => 309,  811 => 305,  804 => 303,  798 => 300,  790 => 295,  784 => 294,  779 => 292,  771 => 287,  765 => 286,  760 => 284,  751 => 278,  738 => 267,  723 => 265,  719 => 264,  713 => 261,  707 => 257,  692 => 255,  688 => 254,  682 => 251,  677 => 249,  668 => 243,  661 => 241,  655 => 238,  649 => 234,  634 => 232,  630 => 231,  624 => 228,  617 => 224,  614 => 223,  599 => 221,  595 => 220,  589 => 217,  584 => 215,  577 => 210,  562 => 208,  558 => 207,  552 => 204,  546 => 200,  531 => 198,  527 => 197,  521 => 194,  516 => 192,  508 => 186,  493 => 184,  489 => 183,  483 => 180,  474 => 174,  468 => 170,  453 => 168,  449 => 167,  443 => 164,  438 => 162,  433 => 159,  426 => 155,  423 => 154,  404 => 151,  401 => 150,  397 => 149,  391 => 146,  388 => 145,  386 => 144,  380 => 141,  374 => 140,  369 => 138,  362 => 134,  356 => 133,  351 => 131,  342 => 125,  338 => 124,  329 => 122,  323 => 119,  313 => 114,  308 => 112,  298 => 107,  293 => 105,  286 => 101,  280 => 100,  275 => 98,  266 => 94,  261 => 92,  251 => 87,  246 => 85,  236 => 80,  231 => 78,  223 => 72,  208 => 70,  204 => 69,  198 => 66,  188 => 59,  184 => 58,  175 => 56,  169 => 53,  160 => 49,  155 => 47,  146 => 43,  141 => 41,  131 => 36,  126 => 34,  118 => 29,  114 => 28,  110 => 27,  106 => 26,  102 => 25,  98 => 24,  94 => 23,  89 => 21,  84 => 19,  77 => 14,  66 => 12,  62 => 11,  57 => 9,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"submit\" form=\"form-setting\" data-bs-toggle=\"tooltip\" title=\"{{ button_save }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"{{ back }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_back }}\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a>
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
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> {{ text_edit }}</div>
      <div class=\"card-body\">
        <form id=\"form-setting\" action=\"{{ save }}\" method=\"post\" data-oc-toggle=\"ajax\">
          <ul class=\"nav nav-tabs\">
            <li class=\"nav-item\"><a href=\"#tab-general\" data-bs-toggle=\"tab\" class=\"nav-link active\">{{ tab_general }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-store\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_store }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-local\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_local }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-option\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_option }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-image\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_image }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-mail\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_mail }}</a></li>
            <li class=\"nav-item\"><a href=\"#tab-server\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_server }}</a></li>
          </ul>
          <div class=\"tab-content\">
            <div id=\"tab-general\" class=\"tab-pane active\">
              <div class=\"row mb-3 required\">
                <label for=\"input-meta-title\" class=\"col-sm-2 col-form-label\">{{ entry_meta_title }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_meta_title\" value=\"{{ config_meta_title }}\" placeholder=\"{{ entry_meta_title }}\" id=\"input-meta-title\" class=\"form-control\"/>
                  <div id=\"error-meta-title\" class=\"invalid-feedback\"></div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-meta-description\" class=\"col-sm-2 col-form-label\">{{ entry_meta_description }}</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_meta_description\" rows=\"5\" placeholder=\"{{ entry_meta_description }}\" id=\"input-meta-description\" class=\"form-control\">{{ config_meta_description }}</textarea>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-meta-keyword\" class=\"col-sm-2 col-form-label\">{{ entry_meta_keyword }}</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_meta_keyword\" rows=\"5\" placeholder=\"{{ entry_meta_keyword }}\" id=\"input-meta-keyword\" class=\"form-control\">{{ config_meta_keyword }}</textarea>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-logo\" class=\"col-sm-2 col-form-label\">{{ entry_logo }}</label>
                <div class=\"col-sm-10\">
                  <div class=\"border rounded d-block\" style=\"max-width: 300px;\">
                    <img src=\"{{ logo }}\" alt=\"\" title=\"\" id=\"thumb-logo\" data-oc-placeholder=\"{{ placeholder }}\" class=\"img-fluid\"> <input type=\"hidden\" name=\"config_logo\" value=\"{{ config_logo }}\" id=\"input-logo\"/>
                    <div class=\"d-grid\">
                      <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-primary rounded-0\"><i class=\"fa-solid fa-pencil\"></i> {{ button_edit }}</button>
                      <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-logo\" data-oc-thumb=\"#thumb-logo\" class=\"btn btn-warning rounded-0\"><i class=\"fa-regular fa-trash-can\"></i> {{ button_clear }}</button>
                    </div>
                  </div>
                </div>
              </div>
           
              <div class=\"row mb-3\">
                <label for=\"input-layout\" class=\"col-sm-2 col-form-label\">{{ entry_layout }}</label>
                <div class=\"col-sm-10\">
                  <select name=\"config_layout_id\" id=\"input-layout\" class=\"form-select\">
                    {% for layout in layouts %}
                      <option value=\"{{ layout.layout_id }}\"{% if layout.layout_id == config_layout_id %} selected{% endif %}>{{ layout.name }}</option>
                    {% endfor %}
                  </select>
                </div>
              </div>
            </div>
            <div id=\"tab-store\" class=\"tab-pane\">
              <div class=\"row mb-3 required\">
                <label for=\"input-name\" class=\"col-sm-2 col-form-label\">{{ entry_name }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_name\" value=\"{{ config_name }}\" placeholder=\"{{ entry_name }}\" id=\"input-name\" class=\"form-control\"/>
                  <div id=\"error-name\" class=\"invalid-feedback\"></div>
                </div>
              </div>
              <div class=\"row mb-3 required\">
                <label for=\"input-owner\" class=\"col-sm-2 col-form-label\">{{ entry_owner }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_owner\" value=\"{{ config_owner }}\" placeholder=\"{{ entry_owner }}\" id=\"input-owner\" class=\"form-control\"/>
                  <div id=\"error-owner\" class=\"invalid-feedback\"></div>
                </div>
              </div>
              <div class=\"row mb-3 required\">
                <label for=\"input-address\" class=\"col-sm-2 col-form-label\">{{ entry_address }}</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_address\" rows=\"5\" placeholder=\"{{ entry_address }}\" id=\"input-address\" class=\"form-control\">{{ config_address }}</textarea>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-geocode\" class=\"col-sm-2 col-form-label\">{{ entry_geocode }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_geocode\" value=\"{{ config_geocode }}\" placeholder=\"{{ entry_geocode }}\" id=\"input-geocode\" class=\"form-control\"/>
                  <div class=\"form-text\">{{ help_geocode }}</div>
                </div>
              </div>
              <div class=\"row mb-3 required\">
                <label for=\"input-email\" class=\"col-sm-2 col-form-label\">{{ entry_email }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_email\" value=\"{{ config_email }}\" placeholder=\"{{ entry_email }}\" id=\"input-email\" class=\"form-control\"/>
                  <div id=\"error-email\" class=\"invalid-feedback\"></div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-telephone\" class=\"col-sm-2 col-form-label\">{{ entry_telephone }}</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_telephone\" value=\"{{ config_telephone }}\" placeholder=\"{{ entry_telephone }}\" id=\"input-telephone\" class=\"form-control\"/>
                  <div id=\"error-telephone\" class=\"invalid-feedback\"></div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-image\" class=\"col-sm-2 col-form-label\">{{ entry_image }}</label>
                <div class=\"col-sm-10\">
                  <div class=\"border rounded d-block\" style=\"max-width: 300px;\">
                    <img src=\"{{ thumb }}\" alt=\"\" title=\"\" id=\"thumb-image\" data-oc-placeholder=\"{{ placeholder }}\" class=\"img-fluid\"> <input type=\"hidden\" name=\"config_image\" value=\"{{ config_image }}\" id=\"input-image\"/>
                    <div class=\"d-grid\">
                      <button type=\"button\" data-oc-toggle=\"image\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-primary rounded-0\"><i class=\"fa-solid fa-pencil\"></i> {{ button_edit }}</button>
                      <button type=\"button\" data-oc-toggle=\"clear\" data-oc-target=\"#input-image\" data-oc-thumb=\"#thumb-image\" class=\"btn btn-warning rounded-0\"><i class=\"fa-regular fa-trash-can\"></i> {{ button_clear }}</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-open\" class=\"col-sm-2 col-form-label\">{{ entry_open }}</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_open\" rows=\"5\" placeholder=\"{{ entry_open }}\" id=\"input-open\" class=\"form-control\">{{ config_open }}</textarea>
                  <div class=\"form-text\">{{ help_open }}</div>
                </div>
              </div>
              <div class=\"row mb-3\">
                <label for=\"input-comment\" class=\"col-sm-2 col-form-label\">{{ entry_comment }}</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_comment\" rows=\"5\" placeholder=\"{{ entry_comment }}\" id=\"input-comment\" class=\"form-control\">{{ config_comment }}</textarea>
                  <div class=\"form-text\">{{ help_comment }}</div>
                </div>
              </div>
              {% if locations %}
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_location }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                      {% for location in locations %}
                        <div class=\"form-check\">
                          <input type=\"checkbox\" name=\"config_location[]\" value=\"{{ location.location_id }}\" id=\"input-location-{{ location.location_id }}\" class=\"form-check-input\"{% if location.location_id in config_location %} checked{% endif %}/> <label for=\"input-location-{{ location.location_id }}\" class=\"form-check-label\">{{ location.name }}</label>
                        </div>
                      {% endfor %}
                    </div>
                    <div class=\"form-text\">{{ help_location }}</div>
                  </div>
                </div>
              {% endif %}
            </div>
            <div id=\"tab-local\" class=\"tab-pane\">
              <fieldset>
                <legend>{{ text_region }}</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-country\" class=\"col-sm-2 col-form-label\">{{ entry_country }}</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_country_id\" id=\"input-country\" class=\"form-select\">
                      {% for country in countries %}
                        <option value=\"{{ country.country_id }}\"{% if country.country_id == config_country_id %} selected{% endif %}>{{ country.name }}</option>
                      {% endfor %}
                    </select>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-zone\" class=\"col-sm-2 col-form-label\">{{ entry_zone }}</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_zone_id\" id=\"input-zone\" class=\"form-select\"></select>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-timezone\" class=\"col-sm-2 col-form-label\">{{ entry_timezone }}</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_timezone\" id=\"input-timezone\" class=\"form-select\">
                      {% for timezone in timezones %}
                        <option value=\"{{ timezone.value }}\"{% if timezone.value == config_timezone %} selected{% endif %}>{{ timezone.text }}</option>
                      {% endfor %}
                    </select>
                  </div>
                </div>
              </fieldset>

              <fieldset>
                <legend>{{ text_language }}</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-language\" class=\"col-sm-2 col-form-label\">{{ entry_language }}</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_language\" id=\"input-language\" class=\"form-select\">
                      {% for language in languages %}
                        <option value=\"{{ language.code }}\"{% if language.code == config_language %} selected{% endif %}>{{ language.name }}</option>
                      {% endfor %}
                    </select>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-language-admin\" class=\"col-sm-2 col-form-label\">{{ entry_language_admin }}</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_language_admin\" id=\"input-language-admin\" class=\"form-select\">
                      {% for language in languages %}
                        <option value=\"{{ language.code }}\"{% if language.code == config_language_admin %} selected{% endif %}>{{ language.name }}</option>
                      {% endfor %}
                    </select>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>{{ text_currency }}</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-currency\" class=\"col-sm-2 col-form-label\">{{ entry_currency }}</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_currency\" id=\"input-currency\" class=\"form-select\">
                      {% for currency in currencies %}
                        <option value=\"{{ currency.code }}\"{% if currency.code == config_currency %} selected{% endif %}>{{ currency.title }}</option>
                      {% endfor %}
                    </select>
                    <div class=\"form-text\">{{ help_currency }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-currency-engine\" class=\"col-sm-2 col-form-label\">{{ entry_currency_engine }}</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_currency_engine\" id=\"input-currency-engine\" class=\"form-select\">
                      {% for currency_engine in currency_engines %}
                        <option value=\"{{ currency_engine.value }}\"{% if currency_engine.value == config_currency_engine %} selected{% endif %}>{{ currency_engine.text }}</option>
                      {% endfor %}
                    </select>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_currency_auto }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_currency_auto\" value=\"0\"/> <input type=\"checkbox\" name=\"config_currency_auto\" value=\"1\" id=\"input-currency-auto\" class=\"form-check-input\"{% if config_currency_auto %} checked{% endif %}/>
                    </div>
                    <div class=\"form-text\">{{ help_currency_auto }}</div>
                  </div>
                </div>
              </fieldset>

              <fieldset>
                <legend>{{ text_measurement }}</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-length-class\" class=\"col-sm-2 col-form-label\">{{ entry_length_class }}</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_length_class_id\" id=\"input-length-class\" class=\"form-select\">
                      {% for length_class in length_classes %}
                        <option value=\"{{ length_class.length_class_id }}\"{% if length_class.length_class_id == config_length_class_id %} selected{% endif %}>{{ length_class.title }}</option>
                      {% endfor %}
                    </select>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-weight-class\" class=\"col-sm-2 col-form-label\">{{ entry_weight_class }}</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_weight_class_id\" id=\"input-weight-class\" class=\"form-select\">
                      {% for weight_class in weight_classes %}
                        <option value=\"{{ weight_class.weight_class_id }}\"{% if weight_class.weight_class_id == config_weight_class_id %} selected{% endif %}>{{ weight_class.title }}</option>
                      {% endfor %}
                    </select>
                  </div>
                </div>
              </fieldset>
            </div>

            <div id=\"tab-option\" class=\"tab-pane\">

              <div class=\"accordion\" id=\"accordion-option\">

                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-product\">{{ text_product }}</button></h2>

                  <div id=\"collapse-product\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">

                      <div class=\"row mt-2 mb-3 required\">
                        <label for=\"input-product-description-length\" class=\"col-sm-2 col-form-label\">{{ entry_product_description_length }}</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_product_description_length\" value=\"{{ config_product_description_length }}\" placeholder=\"{{ entry_product_description_length }}\" id=\"input-product-description-length\" class=\"form-control\"/>
                          <div class=\"form-text\">{{ help_product_description_length }}</div>
                          <div id=\"error-product-description-length\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3 required\">
                        <label for=\"input-pagination\" class=\"col-sm-2 col-form-label\">{{ entry_pagination }}</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_pagination\" value=\"{{ config_pagination }}\" placeholder=\"{{ entry_pagination }}\" id=\"input-pagination\" class=\"form-control\"/>
                          <div class=\"form-text\">{{ help_pagination }}</div>
                          <div id=\"error-pagination\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_infinite_scroll }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_product_infinite_scroll\" value=\"0\"/> <input type=\"checkbox\" name=\"config_product_infinite_scroll\" value=\"1\" id=\"input-product-infinite_scroll\" class=\"form-check-input\"{% if config_product_infinite_scroll %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_infinite_scroll  }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_product_count }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_product_count\" value=\"0\"/> <input type=\"checkbox\" name=\"config_product_count\" value=\"1\" id=\"input-product-count\" class=\"form-check-input\"{% if config_product_count %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_product_count }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3 required\">
                        <label for=\"input-pagination-admin\" class=\"col-sm-2 col-form-label\">{{ entry_pagination_admin }}</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_pagination_admin\" value=\"{{ config_pagination_admin }}\" placeholder=\"{{ entry_pagination_admin }}\" id=\"input-pagination-admin\" class=\"form-control\"/>
                          <div class=\"form-text\">{{ help_pagination }}</div>
                          <div id=\"error-pagination-admin\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3 required\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_product_report }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_product_report_status\" value=\"0\"/> <input type=\"checkbox\" name=\"config_product_report_status\" value=\"1\" id=\"input-product-report\" class=\"form-check-input\"{% if config_product_report_status %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_product_report }}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-review\">{{ text_review }}</button></h2>
                  <div id=\"collapse-review\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_review_status }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_review_status\" value=\"0\"/> <input type=\"checkbox\" name=\"config_review_status\" value=\"1\" id=\"input-review-status\" class=\"form-check-input\"{% if config_review_status %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_review }}</div>
                        </div>
                      </div>
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_review_purchased }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_review_purchased\" value=\"0\"/> <input type=\"checkbox\" name=\"config_review_purchased\" value=\"1\" id=\"input-review-purchased\" class=\"form-check-input\"{% if config_review_purchased %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_review_purchased }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_review_guest }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_review_guest\" value=\"0\"/> <input type=\"checkbox\" name=\"config_review_guest\" value=\"1\" id=\"input-review-guest\" class=\"form-check-input\"{% if config_review_guest %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_review_guest }}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-cms\">{{ text_cms }}</button></h2>
                  <div id=\"collapse-cms\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3 required\">
                        <label for=\"input-article-description-length\" class=\"col-sm-2 col-form-label\">{{ entry_article_description_length }}</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_article_description_length\" value=\"{{ config_article_description_length }}\" placeholder=\"{{ entry_article_description_length }}\" id=\"input-article-description-length\" class=\"form-control\"/>
                          <div class=\"form-text\">{{ help_article_description_length }}</div>
                          <div id=\"error-article-description-length\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_comment_status }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_comment_status\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_comment_status\" value=\"1\" id=\"input-comment-status\" class=\"form-check-input\"{% if config_comment_status %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_comment }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_comment_guest }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_comment_guest\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_comment_guest\" value=\"1\" id=\"input-comment-guest\" class=\"form-check-input\"{% if config_comment_guest %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_comment_guest }}</div>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_comment_approve }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_comment_approve\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_comment_approve\" value=\"1\" id=\"input-comment-approve\" class=\"form-check-input\"{% if config_comment_approve %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_comment_approve }}</div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              

                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-legal\">{{ text_legal }}</button></h2>
                  <div id=\"collapse-legal\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label for=\"input-cookie\" class=\"col-sm-2 col-form-label\">{{ entry_cookie }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_cookie_id\" id=\"input-cookie\" class=\"form-select\">
                            <option value=\"0\">{{ text_none }}</option>
                            {% for information in informations %}
                              <option value=\"{{ information.information_id }}\"{% if information.information_id == config_cookie_id %} selected{% endif %}>{{ information.title }}</option>
                            {% endfor %}
                          </select>
                          <div class=\"form-text\">{{ help_cookie }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-gdpr\" class=\"col-sm-2 col-form-label\">{{ entry_gdpr }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_gdpr_id\" id=\"input-gdpr\" class=\"form-select\">
                            <option value=\"0\">{{ text_none }}</option>
                            {% for information in informations %}
                              <option value=\"{{ information.information_id }}\"{% if information.information_id == config_gdpr_id %} selected{% endif %}>{{ information.title }}</option>
                            {% endfor %}
                          </select>
                          <div class=\"form-text\">{{ help_gdpr }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-gdpr-limit\" class=\"col-sm-2 col-form-label\">{{ entry_gdpr_limit }}</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_gdpr_limit\" value=\"{{ config_gdpr_limit }}\" placeholder=\"{{ entry_gdpr_limit }}\" id=\"input-gdpr-limit\" class=\"form-control\"/>
                          <div class=\"form-text\">{{ help_gdpr_limit }}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-tax\">{{ text_tax }}</button></h2>
                  <div id=\"collapse-tax\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_tax }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_tax\" value=\"0\"/> <input type=\"checkbox\" name=\"config_tax\" value=\"1\" id=\"input-tax\" class=\"form-check-input\"{% if config_tax %} checked{% endif %}/>
                          </div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-tax-default\" class=\"col-sm-2 col-form-label\">{{ entry_tax_default }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_tax_default\" id=\"input-tax-default\" class=\"form-select\">
                            <option value=\"\">{{ text_none }}</option>
                            <option value=\"shipping\"{% if config_tax_default == 'shipping' %} selected{% endif %}>{{ text_shipping }}</option>
                            <option value=\"payment\"{% if config_tax_default == 'payment' %} selected{% endif %}>{{ text_payment }}</option>
                          </select>
                          <div class=\"form-text\">{{ help_tax_default }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-tax-customer\" class=\"col-sm-2 col-form-label\">{{ entry_tax_customer }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_tax_customer\" id=\"input-tax-customer\" class=\"form-select\">
                            <option value=\"\">{{ text_none }}</option>
                            <option value=\"shipping\"{% if config_tax_customer == 'shipping' %} selected{% endif %}>{{ text_shipping }}</option>
                            <option value=\"payment\"{% if config_tax_customer == 'payment' %} selected{% endif %}>{{ text_payment }}</option>
                          </select>
                          <div class=\"form-text\">{{ help_tax_customer }}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-account\">{{ text_account }}</button></h2>
                  <div id=\"collapse-account\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_customer_online }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_customer_online\" value=\"0\"/> <input type=\"checkbox\" name=\"config_customer_online\" value=\"1\" id=\"input-customer-online\" class=\"form-check-input\"{% if config_customer_online %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_customer_online }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-customer-online-expire\" class=\"col-sm-2 col-form-label\">{{ entry_customer_online_expire }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"input-group\">
                            <input type=\"text\" name=\"config_customer_online_expire\" value=\"{{ config_customer_online_expire }}\" placeholder=\"{{ entry_customer_online_expire }}\" id=\"input-customer-online-expire\" class=\"form-control\"/> <span class=\"input-group-text\" id=\"basic-addon2\">{{ text_hour }}</span>
                          </div>
                          <div class=\"form-text\">{{ help_customer_online_expire }}</div>
                          <div id=\"error-customer-online-expire\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_customer_activity }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_customer_activity\" value=\"0\"/> <input type=\"checkbox\" name=\"config_customer_activity\" value=\"1\" id=\"input-customer-activity\" class=\"form-check-input\"{% if config_customer_activity %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_customer_activity }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_customer_search }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_customer_search\" value=\"0\"/> <input type=\"checkbox\" name=\"config_customer_search\" value=\"1\" id=\"input-customer-search\" class=\"form-check-input\"{% if config_customer_search %} checked{% endif %}/>
                          </div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-customer-group\" class=\"col-sm-2 col-form-label\">{{ entry_customer_group }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_customer_group_id\" id=\"input-customer-group\" class=\"form-select\">
                            {% for customer_group in customer_groups %}
                              <option value=\"{{ customer_group.customer_group_id }}\"{% if customer_group.customer_group_id == config_customer_group_id %} selected{% endif %}>{{ customer_group.name }}</option>
                            {% endfor %}
                          </select>
                          <div class=\"form-text\">{{ help_customer_group }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_customer_group_display }}</label>
                        <div class=\"col-sm-10\">
                          <div id=\"input-customer-group-display\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                            {% for customer_group in customer_groups %}
                              <div class=\"form-check\">
                                <input type=\"checkbox\" name=\"config_customer_group_display[]\" value=\"{{ customer_group.customer_group_id }}\" id=\"input-customer-group-{{ customer_group.customer_group_id }}\" class=\"form-check-input\"{% if customer_group.customer_group_id in config_customer_group_display %} checked{% endif %}/> <label for=\"input-customer-group-{{ customer_group.customer_group_id }}\" class=\"form-check-label\">{{ customer_group.name }}</label>
                              </div>
                            {% endfor %}
                          </div>
                          <div class=\"form-text\">{{ help_customer_group_display }}</div>
                          <div id=\"error-customer-group-display\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_customer_price }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_customer_price\" value=\"0\"/> <input type=\"checkbox\" name=\"config_customer_price\" value=\"1\" id=\"input-customer-price\" class=\"form-check-input\"{% if config_customer_price %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_customer_price }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_telephone_display }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_telephone_display\" value=\"0\"/> <input type=\"checkbox\" name=\"config_telephone_display\" value=\"1\" id=\"input-telephone-display\" class=\"form-check-input\"{% if config_telephone_display %} checked{% endif %}/>
                          </div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_telephone_required }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_telephone_required\" value=\"0\"/> <input type=\"checkbox\" name=\"config_telephone_required\" value=\"1\" id=\"input-telephone-required\" class=\"form-check-input\"{% if config_telephone_required %} checked{% endif %}/>
                          </div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_customer_2fa }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_customer_2fa\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_customer_2fa\" value=\"1\" id=\"input-customer-2fa\" class=\"form-check-input\"{% if config_customer_2fa %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_customer_2fa }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-login-attempts\" class=\"col-sm-2 col-form-label\">{{ entry_login_attempts }}</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_login_attempts\" value=\"{{ config_login_attempts }}\" placeholder=\"{{ entry_login_attempts }}\" id=\"input-login-attempts\" class=\"form-control\"/>
                          <div class=\"form-text\">{{ help_login_attempts }}</div>
                          <div id=\"error-login-attempts\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-account\" class=\"col-sm-2 col-form-label\">{{ entry_account }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_account_id\" id=\"input-account\" class=\"form-select\">
                            <option value=\"0\">{{ text_none }}</option>
                            {% for information in informations %}
                              <option value=\"{{ information.information_id }}\"{% if information.information_id == config_account_id %} selected{% endif %}>{{ information.title }}</option>
                            {% endfor %}
                          </select>
                          <div class=\"form-text\">{{ help_account }}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-checkout\">{{ text_checkout }}</button></h2>
                  <div id=\"collapse-checkout\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label for=\"input-invoice-prefix\" class=\"col-sm-2 col-form-label\">{{ entry_invoice_prefix }}</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_invoice_prefix\" value=\"{{ config_invoice_prefix }}\" placeholder=\"{{ entry_invoice_prefix }}\" id=\"input-invoice-prefix\" class=\"form-control\"/>
                          <div class=\"form-text\">{{ help_invoice_prefix }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_cart_weight }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_cart_weight\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_cart_weight\" value=\"1\" id=\"input-cart-weight\" class=\"form-check-input\"{% if config_cart_weight %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_cart_weight }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_checkout_guest }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_checkout_guest\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_checkout_guest\" value=\"1\" id=\"input-checkout-guest\" class=\"form-check-input\"{% if config_checkout_guest %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_checkout_guest }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_config_show_company_field }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_show_company_field\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_show_company_field\" value=\"1\" id=\"input-show_company_field\" class=\"form-check-input\"{% if config_show_company_field %} checked{% endif %}/>
                          </div>
                         
                        </div>
                      </div>
              
                      <div class=\"row mb-3\">
                        <label for=\"input-checkout\" class=\"col-sm-2 col-form-label\">{{ entry_checkout }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_checkout_id\" id=\"input-checkout\" class=\"form-select\">
                            <option value=\"0\">{{ text_none }}</option>
                            {% for information in informations %}
                              <option value=\"{{ information.information_id }}\"{% if information.information_id == config_checkout_id %} selected{% endif %}>{{ information.title }}</option>
                            {% endfor %}
                          </select>
                          <div class=\"form-text\">{{ help_checkout }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-order-status\" class=\"col-sm-2 col-form-label\">{{ entry_order_status }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_order_status_id\" id=\"input-order-status\" class=\"form-select\">
                            {% for order_status in order_statuses %}
                              <option value=\"{{ order_status.order_status_id }}\"{% if order_status.order_status_id == config_order_status_id %} selected{% endif %}>{{ order_status.name }}</option>
                            {% endfor %}
                          </select>
                          <div class=\"form-text\">{{ help_order_status }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_processing_status }}</label>
                        <div class=\"col-sm-10\">
                          <div id=\"input-processing-status\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                            {% for order_status in order_statuses %}
                              <div class=\"form-check\">
                                <input type=\"checkbox\" name=\"config_processing_status[]\" value=\"{{ order_status.order_status_id }}\" id=\"input-processing-status-{{ order_status.order_status_id }}\" class=\"form-check-input\"{% if order_status.order_status_id in config_processing_status %} checked{% endif %}/> <label for=\"input-processing-status-{{ order_status.order_status_id }}\" class=\"form-check-label\">{{ order_status.name }}</label>
                              </div>
                            {% endfor %}
                          </div>
                          <div class=\"form-text\">{{ help_processing_status }}</div>
                          <div id=\"error-processing-status\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_complete_status }}</label>
                        <div class=\"col-sm-10\">
                          <div id=\"input-complete-status\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                            {% for order_status in order_statuses %}
                              <div class=\"form-check\">
                                <input type=\"checkbox\" name=\"config_complete_status[]\" value=\"{{ order_status.order_status_id }}\" id=\"input-complete-status-{{ order_status.order_status_id }}\" class=\"form-check-input\"{% if order_status.order_status_id in config_complete_status %} checked{% endif %}/> <label for=\"input-complete-status-{{ order_status.order_status_id }}\" class=\"form-check-label\">{{ order_status.name }}</label>
                              </div>
                            {% endfor %}
                          </div>
                          <div class=\"form-text\">{{ help_complete_status }}</div>
                          <div id=\"error-complete-status\" class=\"invalid-feedback\"></div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-fraud-status\" class=\"col-sm-2 col-form-label\">{{ entry_fraud_status }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_fraud_status_id\" id=\"input-fraud-status\" class=\"form-select\">
                            {% for order_status in order_statuses %}
                              <option value=\"{{ order_status.order_status_id }}\"{% if order_status.order_status_id == config_fraud_status_id %} selected{% endif %}>{{ order_status.name }}</option>
                            {% endfor %}
                          </select>
                          <div class=\"form-text\">{{ help_fraud_status }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-api\" class=\"col-sm-2 col-form-label\">{{ entry_api }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_api_id\" id=\"input-api\" class=\"form-select\">
                            <option value=\"0\">{{ text_none }}</option>
                            {% for api in apis %}
                              <option value=\"{{ api.api_id }}\"{% if api.api_id == config_api_id %} selected{% endif %}>{{ api.username }}</option>
                            {% endfor %}
                          </select>
                          <div class=\"form-text\">{{ help_api }}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-subscription\">{{ text_subscription }}</button></h2>
                  <div id=\"collapse-subscription\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-status\" class=\"col-sm-2 col-form-label\">{{ entry_subscription_status }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_status_id\" id=\"input-subscription-status\" class=\"form-select\">
                            {% for subscription_status in subscription_statuses %}
                              <option value=\"{{ subscription_status.subscription_status_id }}\"{% if subscription_status.subscription_status_id == config_subscription_status_id %} selected{% endif %}>{{ subscription_status.name }}</option>
                            {% endfor %}
                          </select>
                          <div class=\"form-text\">{{ help_subscription }}</div>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-active-status\" class=\"col-sm-2 col-form-label\">{{ entry_subscription_active_status }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_active_status_id\" id=\"input-subscription-active-status\" class=\"form-select\">
                            {% for subscription_status in subscription_statuses %}
                              <option value=\"{{ subscription_status.subscription_status_id }}\"{% if subscription_status.subscription_status_id == config_subscription_active_status_id %} selected{% endif %}>{{ subscription_status.name }}</option>
                            {% endfor %}
                          </select>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-expired-status\" class=\"col-sm-2 col-form-label\">{{ entry_subscription_expired_status }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_expired_status_id\" id=\"input-subscription-expired-status\" class=\"form-select\">
                            {% for subscription_status in subscription_statuses %}
                              <option value=\"{{ subscription_status.subscription_status_id }}\"{% if subscription_status.subscription_status_id == config_subscription_expired_status_id %} selected{% endif %}>{{ subscription_status.name }}</option>
                            {% endfor %}
                          </select>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-suspended-status\" class=\"col-sm-2 col-form-label\">{{ entry_subscription_suspended_status }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_suspended_status_id\" id=\"input-subscription-suspended-status\" class=\"form-select\">
                            {% for subscription_status in subscription_statuses %}
                              <option value=\"{{ subscription_status.subscription_status_id }}\"{% if subscription_status.subscription_status_id == config_subscription_suspended_status_id %} selected{% endif %}>{{ subscription_status.name }}</option>
                            {% endfor %}
                          </select>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-canceled-status\" class=\"col-sm-2 col-form-label\">{{ entry_subscription_canceled_status }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_canceled_status_id\" id=\"input-subscription-canceled-status\" class=\"form-select\">
                            {% for subscription_status in subscription_statuses %}
                              <option value=\"{{ subscription_status.subscription_status_id }}\"{% if subscription_status.subscription_status_id == config_subscription_canceled_status_id %} selected{% endif %}>{{ subscription_status.name }}</option>
                            {% endfor %}
                          </select>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-failed-status\" class=\"col-sm-2 col-form-label\">{{ entry_subscription_failed_status }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_failed_status_id\" id=\"input-subscription-failed-status\" class=\"form-select\">
                            {% for subscription_status in subscription_statuses %}
                              <option value=\"{{ subscription_status.subscription_status_id }}\"{% if subscription_status.subscription_status_id == config_subscription_failed_status_id %} selected{% endif %}>{{ subscription_status.name }}</option>
                            {% endfor %}
                          </select>
                        </div>
                      </div>

                      <div class=\"row mb-3\">
                        <label for=\"input-subscription-denied-status\" class=\"col-sm-2 col-form-label\">{{ entry_subscription_denied_status }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_subscription_denied_status_id\" id=\"input-subscription-denied-status\" class=\"form-select\">
                            {% for subscription_status in subscription_statuses %}
                              <option value=\"{{ subscription_status.subscription_status_id }}\"{% if subscription_status.subscription_status_id == config_subscription_denied_status_id %} selected{% endif %}>{{ subscription_status.name }}</option>
                            {% endfor %}
                          </select>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-stock\">{{ text_stock }}</button></h2>
                  <div id=\"collapse-stock\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_stock_display }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_stock_display\" value=\"0\"/> <input type=\"checkbox\" name=\"config_stock_display\" value=\"1\" id=\"input-stock-display\" class=\"form-check-input\"{% if config_stock_display %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_stock_display }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_stock_warning }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_stock_warning\" value=\"0\"/> <input type=\"checkbox\" name=\"config_stock_warning\" value=\"1\" id=\"input-stock-warning\" class=\"form-check-input\"{% if config_stock_warning %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_stock_warning }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_stock_checkout }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_stock_checkout\" value=\"0\"/> <input type=\"checkbox\" name=\"config_stock_checkout\" value=\"1\" id=\"input-stock-checkout\" class=\"form-check-input\"{% if config_stock_checkout %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_stock_checkout }}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-affiliate\">{{ text_affiliate }}</button></h2>
                  <div id=\"collapse-affiliate\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_affiliate_status }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_affiliate_status\" value=\"0\"/> <input type=\"checkbox\" name=\"config_affiliate_status\" value=\"1\" id=\"input-affiliate-status\" class=\"form-check-input\"{% if config_affiliate_status %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_affiliate_status }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-affiliate-group\" class=\"col-sm-2 col-form-label\">{{ entry_affiliate_group }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_affiliate_group_id\" id=\"input-affiliate-group\" class=\"form-select\">
                            {% for customer_group in customer_groups %}
                              <option value=\"{{ customer_group.customer_group_id }}\"{% if customer_group.customer_group_id == config_affiliate_group_id %} selected{% endif %}>{{ customer_group.name }}</option>
                            {% endfor %}
                          </select>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_affiliate_approval }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_affiliate_approval\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_affiliate_approval\" value=\"1\" id=\"input-affiliate-approval\" class=\"form-check-input\"{% if config_affiliate_approval %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_affiliate_approval }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_affiliate_auto }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-check form-switch form-switch-lg\">
                            <input type=\"hidden\" name=\"config_affiliate_auto\" value=\"0\"/>
                            <input type=\"checkbox\" name=\"config_affiliate_auto\" value=\"1\" id=\"input-affiliate-auto\" class=\"form-check-input\"{% if config_affiliate_auto %} checked{% endif %}/>
                          </div>
                          <div class=\"form-text\">{{ help_affiliate_auto }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-affiliate-commission\" class=\"col-sm-2 col-form-label\">{{ entry_affiliate_commission }}</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_affiliate_commission\" value=\"{{ config_affiliate_commission }}\" placeholder=\"{{ entry_affiliate_commission }}\" id=\"input-affiliate-commission\" class=\"form-control\"/>
                          <div class=\"form-text\">{{ help_affiliate_commission }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-affiliate-expire\" class=\"col-sm-2 col-form-label\">{{ entry_affiliate_expire }}</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"config_affiliate_expire\" value=\"{{ config_affiliate_expire }}\" placeholder=\"{{ entry_affiliate_expire }}\" id=\"input-affiliate-expire\" class=\"form-control\"/>
                          <div class=\"form-text\">{{ help_affiliate_expire }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label for=\"input-affiliate\" class=\"col-sm-2 col-form-label\">{{ entry_affiliate }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_affiliate_id\" id=\"input-affiliate\" class=\"form-select\">
                            <option value=\"0\">{{ text_none }}</option>
                            {% for information in informations %}
                              <option value=\"{{ information.information_id }}\"{% if information.information_id == config_affiliate_id %} selected{% endif %}>{{ information.title }}</option>
                            {% endfor %}
                          </select>
                          <div class=\"form-text\">{{ help_affiliate }}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-return\">{{ text_return }}</button></h2>
                  <div id=\"collapse-return\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mb-3\">
                        <label for=\"input-return-status\" class=\"col-sm-2 col-form-label\">{{ entry_return_status }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_return_status_id\" id=\"input-return-status\" class=\"form-select\">
                            {% for return_status in return_statuses %}
                              <option value=\"{{ return_status.return_status_id }}\"{% if return_status.return_status_id == config_return_status_id %} selected{% endif %}>{{ return_status.name }}</option>
                            {% endfor %}
                          </select>
                          <div class=\"form-text\">{{ help_return_status }}</div>
                        </div>
                      </div>
                      <div class=\"row mt-2 mb-3\">
                        <label for=\"input-return\" class=\"col-sm-2 col-form-label\">{{ entry_return }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_return_id\" id=\"input-return\" class=\"form-select\">
                            <option value=\"0\">{{ text_none }}</option>
                            {% for information in informations %}
                              <option value=\"{{ information.information_id }}\"{% if information.information_id == config_return_id %} selected{% endif %}>{{ information.title }}</option>
                            {% endfor %}
                          </select>
                          <div class=\"form-text\">{{ help_return }}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"accordion-item\">
                  <h2 class=\"accordion-header\"><button type=\"button\" class=\"accordion-button collapsed\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse-captcha\">{{ text_captcha }}</button></h2>
                  <div id=\"collapse-captcha\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordion-option\">
                    <div class=\"accordion-body\">
                      <div class=\"row mt-2 mb-3\">
                        <label for=\"input-captcha\" class=\"col-sm-2 col-form-label\">{{ entry_captcha }}</label>
                        <div class=\"col-sm-10\">
                          <select name=\"config_captcha\" id=\"input-captcha\" class=\"form-select\">
                            <option value=\"\">{{ text_none }}</option>
                            {% for captcha in captchas %}
                              <option value=\"{{ captcha.value }}\"{% if captcha.value == config_captcha %} selected{% endif %}>{{ captcha.text }}</option>
                            {% endfor %}
                          </select>
                          <div class=\"form-text\">{{ help_captcha }}</div>
                        </div>
                      </div>
                      <div class=\"row mb-3\">
                        <label class=\"col-sm-2 col-form-label\">{{ entry_captcha_page }}</label>
                        <div class=\"col-sm-10\">
                          <div class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                            {% set captcha_page_row = 0 %}
                            {% for captcha_page in captcha_pages %}
                              <div class=\"form-check\">
                                <input type=\"checkbox\" name=\"config_captcha_page[]\" value=\"{{ captcha_page.value }}\" id=\"input-captcha-{{ captcha_page_row }}\" class=\"form-check-input\"{% if captcha_page.value in config_captcha_page %} checked{% endif %}/> <label for=\"input-captcha-{{ captcha_page_row }}\" class=\"form-check-label\">{{ captcha_page.text }}</label>
                              </div>
                              {% set captcha_page_row = captcha_page_row + 1 %}
                            {% endfor %}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id=\"tab-image\" class=\"tab-pane\">
               <legend>{{ text_image_settings }}</legend>
              <fieldset>
              <!-- File Type Selection -->
<div class=\"row mb-3 required\">
  <label for=\"input-image-filetype\" class=\"col-sm-2 col-form-label\">{{ entry_image_filetype }}</label>
  <div class=\"col-sm-10\">
    <select name=\"config_image_filetype\" id=\"input-image-filetype\" class=\"form-control\">
      <option value=\"as_uploaded\" {{ config_image_filetype == 'as_uploaded' ? 'selected' : '' }}>{{ entry_filetype_as_uploaded }}</option>
      <option value=\"webp\" {{ config_image_filetype == 'webp' ? 'selected' : '' }}>{{ entry_filetype_webp }}</option>
      <option value=\"avif\" {{ config_image_filetype == 'avif' ? 'selected' : '' }}>{{ entry_filetype_avif }}</option>
      <option value=\"jpeg\" {{ config_image_filetype == 'jpeg' ? 'selected' : '' }}>{{ entry_filetype_jpeg }}</option>
      <option value=\"png\" {{ config_image_filetype == 'png' ? 'selected' : '' }}>{{ entry_filetype_png }}</option>
    </select>
    <div id=\"error-image-filetype\" class=\"invalid-feedback\"></div>
  </div>
</div>

<!-- Image Quality Selection -->
<div class=\"row mb-3 required\">
  <label for=\"input-image-quality\" class=\"col-sm-2 col-form-label\">{{ entry_image_quality }}</label>
  <div class=\"col-sm-10\">
    <input type=\"number\" name=\"config_image_quality\" value=\"{{ config_image_quality }}\" min=\"1\" max=\"100\" placeholder=\"{{ entry_quality }}\" id=\"input-image-quality\" class=\"form-control\"/>
    <div id=\"error-image-quality\" class=\"invalid-feedback\"></div>
  </div>
</div>
                <legend>{{ text_image_size }}</legend>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-default-width\" class=\"col-sm-2 col-form-label\">{{ entry_image_default }}</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-default\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_default_width\" value=\"{{ config_image_default_width }}\" placeholder=\"{{ entry_width }}\" id=\"input-image-default-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_default_height\" value=\"{{ config_image_default_height }}\" placeholder=\"{{ entry_height }}\" id=\"input-image-default-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-default\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-category-width\" class=\"col-sm-2 col-form-label\">{{ entry_image_category }}</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-category\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_category_width\" value=\"{{ config_image_category_width }}\" placeholder=\"{{ entry_width }}\" id=\"input-image-category-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_category_height\" value=\"{{ config_image_category_height }}\" placeholder=\"{{ entry_height }}\" id=\"input-image-category-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-category\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-thumb-width\" class=\"col-sm-2 col-form-label\">{{ entry_image_thumb }}</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-thumb\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_thumb_width\" value=\"{{ config_image_thumb_width }}\" placeholder=\"{{ entry_width }}\" id=\"input-image-thumb-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_thumb_height\" value=\"{{ config_image_thumb_height }}\" placeholder=\"{{ entry_height }}\" id=\"input-image-thumb-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-thumb\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-popup-width\" class=\"col-sm-2 col-form-label\">{{ entry_image_popup }}</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-popup\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_popup_width\" value=\"{{ config_image_popup_width }}\" placeholder=\"{{ entry_width }}\" id=\"input-image-popup-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_popup_height\" value=\"{{ config_image_popup_height }}\" placeholder=\"{{ entry_height }}\" id=\"input-image-popup-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-popup\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-product-width\" class=\"col-sm-2 col-form-label\">{{ entry_image_product }}</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-product\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_product_width\" value=\"{{ config_image_product_width }}\" placeholder=\"{{ entry_width }}\" id=\"input-image-product-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_product_height\" value=\"{{ config_image_product_height }}\" placeholder=\"{{ entry_height }}\" id=\"input-image-product-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-product\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-additional-width\" class=\"col-sm-2 col-form-label\">{{ entry_image_additional }}</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-additional\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_additional_width\" value=\"{{ config_image_additional_width }}\" placeholder=\"{{ entry_width }}\" id=\"input-image-additional-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_additional_height\" value=\"{{ config_image_additional_height }}\" placeholder=\"{{ entry_height }}\" id=\"input-image-additional-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-additional\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-related-width\" class=\"col-sm-2 col-form-label\">{{ entry_image_related }}</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-related\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_related_width\" value=\"{{ config_image_related_width }}\" placeholder=\"{{ entry_width }}\" id=\"input-image-related-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_related_height\" value=\"{{ config_image_related_height }}\" placeholder=\"{{ entry_height }}\" id=\"input-image-related-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-related\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-article-width\" class=\"col-sm-2 col-form-label\">{{ entry_image_article }}</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-article\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_article_width\" value=\"{{ config_image_article_width }}\" placeholder=\"{{ entry_width }}\" id=\"input-image-article-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_article_height\" value=\"{{ config_image_article_height }}\" placeholder=\"{{ entry_height }}\" id=\"input-image-article-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-article\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-topic-width\" class=\"col-sm-2 col-form-label\">{{ entry_image_topic }}</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-topic\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_topic_width\" value=\"{{ config_image_topic_width }}\" placeholder=\"{{ entry_width }}\" id=\"input-image-topic-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_topic_height\" value=\"{{ config_image_topic_height }}\" placeholder=\"{{ entry_height }}\" id=\"input-image-topic-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-topic\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-compare-width\" class=\"col-sm-2 col-form-label\">{{ entry_image_compare }}</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-compare\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_compare_width\" value=\"{{ config_image_compare_width }}\" placeholder=\"{{ entry_width }}\" id=\"input-image-compare-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_compare_height\" value=\"{{ config_image_compare_height }}\" placeholder=\"{{ entry_height }}\" id=\"input-image-compare-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-compare\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-wishlist-width\" class=\"col-sm-2 col-form-label\">{{ entry_image_wishlist }}</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-wishlist\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_wishlist_width\" value=\"{{ config_image_wishlist_width }}\" placeholder=\"{{ entry_width }}\" id=\"input-image-wishlist-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_wishlist_height\" value=\"{{ config_image_wishlist_height }}\" placeholder=\"{{ entry_height }}\" id=\"input-image-wishlist-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-wishlist\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-cart-width\" class=\"col-sm-2 col-form-label\">{{ entry_image_cart }}</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-cart\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_cart_width\" value=\"{{ config_image_cart_width }}\" placeholder=\"{{ entry_width }}\" id=\"input-image-cart-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_cart_height\" value=\"{{ config_image_cart_height }}\" placeholder=\"{{ entry_height }}\" id=\"input-image-cart-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-cart\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-image-location-width\" class=\"col-sm-2 col-form-label\">{{ entry_image_location }}</label>
                  <div class=\"col-sm-10\">
                    <div id=\"input-image-location\" class=\"row\">
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_location_width\" value=\"{{ config_image_location_width }}\" placeholder=\"{{ entry_width }}\" id=\"input-image-location-width\" class=\"form-control\"/>
                      </div>
                      <div class=\"col-sm-6\">
                        <input type=\"text\" name=\"config_image_location_height\" value=\"{{ config_image_location_height }}\" placeholder=\"{{ entry_height }}\" id=\"input-image-location-height\" class=\"form-control\"/>
                      </div>
                    </div>
                    <div id=\"error-image-location\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
              </fieldset>
            </div>
            <div id=\"tab-mail\" class=\"tab-pane\">
              <fieldset>
                <legend>{{ text_general }}</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-engine\" class=\"col-sm-2 col-form-label\">{{ entry_mail_engine }}</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_mail_engine\" id=\"input-mail-engine\" class=\"form-select\">
                      <option value=\"\">{{ text_none }}</option>
                      <option value=\"mail\"{% if config_mail_engine == 'mail' %} selected{% endif %}>{{ text_mail }}</option>
                      <option value=\"smtp\"{% if config_mail_engine == 'smtp' %} selected{% endif %}>{{ text_smtp }}</option>
                    </select>
                    <div class=\"form-text\">{{ help_mail_engine }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-parameter\" class=\"col-sm-2 col-form-label\">{{ entry_mail_parameter }}</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_parameter\" value=\"{{ config_mail_parameter }}\" placeholder=\"{{ entry_mail_parameter }}\" id=\"input-mail-parameter\" class=\"form-control\"/>
                    <div class=\"form-text\">{{ help_mail_parameter }}</div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>{{ text_smtp }}</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-smtp-hostname\" class=\"col-sm-2 col-form-label\">{{ entry_mail_smtp_hostname }}</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_hostname\" value=\"{{ config_mail_smtp_hostname }}\" placeholder=\"{{ entry_mail_smtp_hostname }}\" id=\"input-mail-smtp-hostname\" class=\"form-control\"/>
                    <div class=\"form-text\">{{ help_mail_smtp_hostname }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-smtp-username\" class=\"col-sm-2 col-form-label\">{{ entry_mail_smtp_username }}</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_username\" value=\"{{ config_mail_smtp_username }}\" placeholder=\"{{ entry_mail_smtp_username }}\" id=\"input-mail-smtp-username\" class=\"form-control\"/>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-smtp-password\" class=\"col-sm-2 col-form-label\">{{ entry_mail_smtp_password }}</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_password\" value=\"{{ config_mail_smtp_password }}\" placeholder=\"{{ entry_mail_smtp_password }}\" id=\"input-mail-smtp-password\" class=\"form-control\"/>
                    <div class=\"form-text\">{{ help_mail_smtp_password }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-smtp-port\" class=\"col-sm-2 col-form-label\">{{ entry_mail_smtp_port }}</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_port\" value=\"{{ config_mail_smtp_port }}\" placeholder=\"{{ entry_mail_smtp_port }}\" id=\"input-mail-smtp-port\" class=\"form-control\"/>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-smtp-timeout\" class=\"col-sm-2 col-form-label\">{{ entry_mail_smtp_timeout }}</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_timeout\" value=\"{{ config_mail_smtp_timeout }}\" placeholder=\"{{ entry_mail_smtp_timeout }}\" id=\"input-mail-smtp-timeout\" class=\"form-control\"/>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>{{ text_mail_alert }}</legend>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_mail_alert }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                      {% set mail_alert_row = 0 %}
                      {% for mail_alert in mail_alerts %}
                        <div class=\"form-check\">
                          <input type=\"checkbox\" name=\"config_mail_alert[]\" value=\"{{ mail_alert.value }}\" id=\"input-mail-alert-{{ mail_alert_row }}\" class=\"form-check-input\"{% if mail_alert.value in config_mail_alert %} checked{% endif %}/> <label for=\"input-mail-alert-{{ mail_alert_row }}\" class=\"form-check-label\">{{ mail_alert.text }}</label>
                        </div>
                        {% set mail_alert_row = mail_alert_row + 1 %}
                      {% endfor %}
                    </div>
                    <div class=\"form-text\">{{ help_mail_alert }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-mail-alert-email\" class=\"col-sm-2 col-form-label\">{{ entry_mail_alert_email }}</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"config_mail_alert_email\" rows=\"5\" placeholder=\"{{ entry_mail_alert_email }}\" id=\"input-mail-alert-email\" class=\"form-control\">{{ config_mail_alert_email }}</textarea>
                    <div class=\"form-text\">{{ help_mail_alert_email }}</div>
                  </div>
                </div>
              </fieldset>
            </div>
            <div id=\"tab-server\" class=\"tab-pane\">
              <fieldset>
                <legend>{{ text_general }}</legend>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_maintenance }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_maintenance\" value=\"0\"/> <input type=\"checkbox\" name=\"config_maintenance\" value=\"1\" id=\"input-maintenance\" class=\"form-check-input\"{% if config_maintenance %} checked{% endif %}/>
                    </div>
                    <div class=\"form-text\">{{ help_maintenance }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-session-expire\" class=\"col-sm-2 col-form-label\">{{ entry_session_expire }}</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_session_expire\" value=\"{{ config_session_expire }}\" placeholder=\"{{ entry_session_expire }}\" id=\"input-session-expire\" class=\"form-control\"/>
                    <div class=\"form-text\">{{ help_session_expire }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-session-samesite\" class=\"col-sm-2 col-form-label\">{{ entry_session_samesite }}</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_session_samesite\" id=\"input-session-samesite\" class=\"form-select\">
                      <option value=\"None\"{% if config_session_samesite == 'None' %} selected{% endif %}>{{ text_none }}</option>
                      <option value=\"Lax\"{% if config_session_samesite == 'Lax' %} selected{% endif %}>{{ text_lax }}</option>
                      <option value=\"Strict\"{% if config_session_samesite == 'Strict' %} selected{% endif %}>{{ text_strict }}</option>
                    </select>
                    <div class=\"form-text\">{{ help_session_samesite }}</div>
                  </div>
                </div>

                       <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_minify_all }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_minify_all\" value=\"0\"/> <input type=\"checkbox\" name=\"config_minify_all\" value=\"1\" id=\"input-minify-all\" class=\"form-check-input\"{% if config_minify_all %} checked{% endif %}/>
                    </div>
                    <div class=\"form-text\">{{ help_minify_all }}</div>
                  </div>
                </div>

                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_seo_url }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_seo_url\" value=\"0\"/> <input type=\"checkbox\" name=\"config_seo_url\" value=\"1\" id=\"input-seo-url\" class=\"form-check-input\"{% if config_seo_url %} checked{% endif %}/>
                    </div>
                    <div class=\"form-text\">{{ help_seo_url }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-robots\" class=\"col-sm-2 col-form-label\">{{ entry_robots }}</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"config_robots\" rows=\"5\" placeholder=\"{{ entry_robots }}\" id=\"input-robots\" class=\"form-control\">{{ config_robots }}</textarea>
                    <div class=\"form-text\">{{ help_robots }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-compression\" class=\"col-sm-2 col-form-label\">{{ entry_compression }}</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_compression\" value=\"{{ config_compression }}\" placeholder=\"{{ entry_compression }}\" id=\"input-compression\" class=\"form-control\"/>
                    <div class=\"form-text\">{{ help_compression }}</div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>{{ text_security }}</legend>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_user_2fa }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_user_2fa\" value=\"0\"/>
                      <input type=\"checkbox\" name=\"config_user_2fa\" value=\"1\" id=\"input-user-2fa\" class=\"form-check-input\"{% if config_user_2fa %} checked{% endif %}/>
                    </div>
                    <div class=\"form-text\">{{ help_user_2fa }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_shared }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_shared\" value=\"0\"/> <input type=\"checkbox\" name=\"config_shared\" value=\"1\" id=\"input-shared\" class=\"form-check-input\"{% if config_shared %} checked{% endif %}/>
                    </div>
                    <div class=\"form-text\">{{ help_shared }}</div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>{{ text_upload }}</legend>
                <div class=\"row mb-3 required\">
                  <label for=\"input-file-max-size\" class=\"col-sm-2 col-form-label\">{{ entry_file_max_size }}</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_file_max_size\" value=\"{{ config_file_max_size }}\" placeholder=\"{{ entry_file_max_size }}\" id=\"input-file-max-size\" class=\"form-control\"/>
                    <div class=\"form-text\">{{ help_file_max_size }}</div>
                    <div id=\"error-file-max-size\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-file-ext-allowed\" class=\"col-sm-2 col-form-label\">{{ entry_file_ext_allowed }}</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"config_file_ext_allowed\" rows=\"5\" placeholder=\"{{ entry_file_ext_allowed }}\" id=\"input-file-ext-allowed\" class=\"form-control\">{{ config_file_ext_allowed }}</textarea>
                    <div class=\"form-text\">{{ help_file_ext_allowed }}</div>
                    <div id=\"error-file-ext-allowed\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-file-mime-allowed\" class=\"col-sm-2 col-form-label\">{{ entry_file_mime_allowed }}</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"config_file_mime_allowed\" rows=\"5\" placeholder=\"{{ entry_file_mime_allowed }}\" id=\"input-file-mime-allowed\" class=\"form-control\">{{ config_file_mime_allowed }}</textarea>
                    <div class=\"form-text\">{{ help_file_mime_allowed }}</div>
                    <div id=\"error-file-mime-allowed\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>{{ text_error }}</legend>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_error_display }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_error_display\" value=\"0\"/> <input type=\"checkbox\" name=\"config_error_display\" value=\"1\" id=\"input-error-display\" class=\"form-check-input\"{% if config_error_display %} checked{% endif %}/>
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_error_log }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"config_error_log\" value=\"0\"/> <input type=\"checkbox\" name=\"config_error_log\" value=\"1\" id=\"input-error-log\" class=\"form-check-input\"{% if config_error_log %} checked{% endif %}/>
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3 required\">
                  <label for=\"input-error-filename\" class=\"col-sm-2 col-form-label\">{{ entry_error_filename }}</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_error_filename\" value=\"{{ config_error_filename }}\" placeholder=\"{{ entry_error_filename }}\" id=\"input-error-filename\" class=\"form-control\"/>
                    <div id=\"error-error-filename\" class=\"invalid-feedback\"></div>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script ><!--
\$('#input-theme').on('change', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=setting/setting.theme&user_token={{ user_token }}&theme=' + this.value,
        dataType: 'html',
        beforeSend: function() {
            \$(element).prop('disabled', true);
        },
        complete: function() {
            \$(element).prop('disabled', false);
        },
        success: function(html) {
            \$('#theme-thumb').attr('src', html);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-theme').trigger('change');

\$('#input-country').on('change', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=localisation/country.country&user_token={{ user_token }}&country_id=' + this.value,
        dataType: 'json',
        beforeSend: function() {
            \$(element).prop('disabled', true);
            \$('#input-zone').prop('disabled', true);
        },
        complete: function() {
            \$(element).prop('disabled', false);
            \$('#input-zone').prop('disabled', false);
        },
        success: function(json) {
            html = '<option value=\"\">{{ text_select|escape('js') }}</option>';

            if (json['zone'] && json['zone'] != '') {
                for (i = 0; i < json['zone'].length; i++) {
                    html += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';

                    if (json['zone'][i]['zone_id'] == '{{ config_zone_id }}') {
                        html += ' selected';
                    }

                    html += '>' + json['zone'][i]['name'] + '</option>';
                }
            } else {
                html += '<option value=\"0\" selected>{{ text_none|escape('js') }}</option>';
            }

            \$('#input-zone').html(html);

            \$('#button-save').prop('disabled', false);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            //x console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-country').trigger('change');
//--></script>
{{ footer }}
", "cp-akis/view/default/plates/setting/setting.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/setting/setting.twig");
    }
}
