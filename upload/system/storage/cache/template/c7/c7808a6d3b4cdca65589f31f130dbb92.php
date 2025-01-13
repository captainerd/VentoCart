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

/* cp-akis/view//plates/extension/ventocart/payment/bank_transfer.twig */
class __TwigTemplate_6e1bb3ef7b249baa0e6c84c6f5c708d6 extends Template
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
        <button type=\"submit\" form=\"form-payment\" data-bs-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-save\"></i></button>
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
        echo ($context["text_edit"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <form id=\"form-payment\" action=\"";
        // line 20
        echo ($context["save"] ?? null);
        echo "\" method=\"post\" data-oc-toggle=\"ajax\">
          ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 22
            echo "            <div class=\"row mb-3 required\">
              <label for=\"input-bank";
            // line 23
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 23);
            echo "\" class=\"col-sm-2 col-form-label\">";
            echo ($context["entry_bank"] ?? null);
            echo "</label>
              <div class=\"col-sm-10\">
                <div class=\"input-group\">
                  <span class=\"input-group-text\"><img src=\"";
            // line 26
            echo twig_get_attribute($this->env, $this->source, $context["language"], "image", [], "any", false, false, false, 26);
            echo "\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 26);
            echo "\"/></span> <textarea name=\"payment_bank_transfer_bank_";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 26);
            echo "\" cols=\"80\" rows=\"10\" placeholder=\"";
            echo ($context["entry_bank"] ?? null);
            echo "\" id=\"input-bank-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 26);
            echo "\" class=\"form-control\">";
            echo (((($__internal_compile_0 = ($context["payment_bank_transfer_bank"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 26)] ?? null) : null)) ? ((($__internal_compile_1 = ($context["payment_bank_transfer_bank"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 26)] ?? null) : null)) : (""));
            echo "</textarea>
                </div>
                <div id=\"error-bank-";
            // line 28
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 28);
            echo "\" class=\"invalid-feedback\"></div>
              </div>
            </div>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "          <div class=\"row mb-3\">
            <label for=\"input-order-status\" class=\"col-sm-2 col-form-label\">";
        // line 33
        echo ($context["entry_order_status"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"payment_bank_transfer_order_status_id\" id=\"input-order-status\" class=\"form-select\">
                ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 37
            echo "                  <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 37);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 37) == ($context["payment_bank_transfer_order_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 37);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "              </select>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-geo-zone\" class=\"col-sm-2 col-form-label\">";
        // line 43
        echo ($context["entry_geo_zone"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"payment_bank_transfer_geo_zone_id\" id=\"input-geo-zone\" class=\"form-select\">
                <option value=\"0\">";
        // line 46
        echo ($context["text_all_zones"] ?? null);
        echo "</option>
                ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["geo_zones"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["geo_zone"]) {
            // line 48
            echo "                  <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["geo_zone"], "geo_zone_id", [], "any", false, false, false, 48);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["geo_zone"], "geo_zone_id", [], "any", false, false, false, 48) == ($context["payment_bank_transfer_geo_zone_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["geo_zone"], "name", [], "any", false, false, false, 48);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['geo_zone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "              </select>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">";
        // line 54
        echo ($context["entry_status"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"payment_bank_transfer_status\" value=\"0\"/>
                <input type=\"checkbox\" name=\"payment_bank_transfer_status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"";
        // line 58
        if (($context["payment_bank_transfer_status"] ?? null)) {
            echo " checked";
        }
        echo "/>
              </div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-sort-order\" class=\"col-sm-2 col-form-label\">";
        // line 63
        echo ($context["entry_sort_order"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"payment_bank_transfer_sort_order\" value=\"";
        // line 65
        echo ($context["payment_bank_transfer_sort_order"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_sort_order"] ?? null);
        echo "\" id=\"input-sort-order\" class=\"form-control\"/>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
";
        // line 73
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/extension/ventocart/payment/bank_transfer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  236 => 73,  223 => 65,  218 => 63,  208 => 58,  201 => 54,  195 => 50,  180 => 48,  176 => 47,  172 => 46,  166 => 43,  160 => 39,  145 => 37,  141 => 36,  135 => 33,  132 => 32,  122 => 28,  107 => 26,  99 => 23,  96 => 22,  92 => 21,  88 => 20,  83 => 18,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"submit\" form=\"form-payment\" data-bs-toggle=\"tooltip\" title=\"{{ button_save }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-save\"></i></button>
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
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> {{ text_edit }}</div>
      <div class=\"card-body\">
        <form id=\"form-payment\" action=\"{{ save }}\" method=\"post\" data-oc-toggle=\"ajax\">
          {% for language in languages %}
            <div class=\"row mb-3 required\">
              <label for=\"input-bank{{ language.language_id }}\" class=\"col-sm-2 col-form-label\">{{ entry_bank }}</label>
              <div class=\"col-sm-10\">
                <div class=\"input-group\">
                  <span class=\"input-group-text\"><img src=\"{{ language.image }}\" title=\"{{ language.name }}\"/></span> <textarea name=\"payment_bank_transfer_bank_{{ language.language_id }}\" cols=\"80\" rows=\"10\" placeholder=\"{{ entry_bank }}\" id=\"input-bank-{{ language.language_id }}\" class=\"form-control\">{{ payment_bank_transfer_bank[language.language_id] ? payment_bank_transfer_bank[language.language_id] }}</textarea>
                </div>
                <div id=\"error-bank-{{ language.language_id }}\" class=\"invalid-feedback\"></div>
              </div>
            </div>
          {% endfor %}
          <div class=\"row mb-3\">
            <label for=\"input-order-status\" class=\"col-sm-2 col-form-label\">{{ entry_order_status }}</label>
            <div class=\"col-sm-10\">
              <select name=\"payment_bank_transfer_order_status_id\" id=\"input-order-status\" class=\"form-select\">
                {% for order_status in order_statuses %}
                  <option value=\"{{ order_status.order_status_id }}\"{% if order_status.order_status_id == payment_bank_transfer_order_status_id %} selected{% endif %}>{{ order_status.name }}</option>
                {% endfor %}
              </select>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-geo-zone\" class=\"col-sm-2 col-form-label\">{{ entry_geo_zone }}</label>
            <div class=\"col-sm-10\">
              <select name=\"payment_bank_transfer_geo_zone_id\" id=\"input-geo-zone\" class=\"form-select\">
                <option value=\"0\">{{ text_all_zones }}</option>
                {% for geo_zone in geo_zones %}
                  <option value=\"{{ geo_zone.geo_zone_id }}\"{% if geo_zone.geo_zone_id == payment_bank_transfer_geo_zone_id %} selected{% endif %}>{{ geo_zone.name }}</option>
                {% endfor %}
              </select>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">{{ entry_status }}</label>
            <div class=\"col-sm-10\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"payment_bank_transfer_status\" value=\"0\"/>
                <input type=\"checkbox\" name=\"payment_bank_transfer_status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"{% if payment_bank_transfer_status %} checked{% endif %}/>
              </div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-sort-order\" class=\"col-sm-2 col-form-label\">{{ entry_sort_order }}</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"payment_bank_transfer_sort_order\" value=\"{{ payment_bank_transfer_sort_order }}\" placeholder=\"{{ entry_sort_order }}\" id=\"input-sort-order\" class=\"form-control\"/>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{ footer }}
", "cp-akis/view//plates/extension/ventocart/payment/bank_transfer.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/extension/ventocart/payment/bank_transfer.twig");
    }
}
