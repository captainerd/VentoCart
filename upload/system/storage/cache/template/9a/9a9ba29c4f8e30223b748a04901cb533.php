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

/* admin/view/template/catalog/product_list.twig */
class __TwigTemplate_2bd65579304343024d2148b71ed1c113 extends Template
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
        echo "<form id=\"form-product\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
        echo ($context["action"] ?? null);
        echo "\" data-oc-target=\"#product\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
          <td class=\"text-center\">";
        // line 7
        echo ($context["column_image"] ?? null);
        echo "</td>
          <td class=\"text-start\"><a href=\"";
        // line 8
        echo ($context["sort_name"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "pd.name")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_name"] ?? null);
        echo "</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"";
        // line 9
        echo ($context["sort_model"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "p.model")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_model"] ?? null);
        echo "</a></td>
          <td class=\"text-end\"><a href=\"";
        // line 10
        echo ($context["sort_price"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "p.price")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_price"] ?? null);
        echo "</a></td>
          <td class=\"text-end\"><a href=\"";
        // line 11
        echo ($context["sort_quantity"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "p.quantity")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_quantity"] ?? null);
        echo "</a></td>
          <td class=\"text-end\">";
        // line 12
        echo ($context["column_action"] ?? null);
        echo "</td>
        </tr>
      </thead>
      <tbody>
        ";
        // line 16
        if (($context["products"] ?? null)) {
            // line 17
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 18
                echo "            <tr";
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "variant", [], "any", false, false, false, 18)) {
                    echo " class=\"table-warning\"";
                }
                echo ">
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"";
                // line 19
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 19);
                echo "\" class=\"form-check-input\"/></td>
              <td class=\"text-center\">
                
                ";
                // line 22
                if ((((is_string($__internal_compile_0 = twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 22)) && is_string($__internal_compile_1 = ".avi") && ('' === $__internal_compile_1 || $__internal_compile_1 === substr($__internal_compile_0, -strlen($__internal_compile_1)))) || (is_string($__internal_compile_2 = twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 22)) && is_string($__internal_compile_3 = ".mp4") && ('' === $__internal_compile_3 || $__internal_compile_3 === substr($__internal_compile_2, -strlen($__internal_compile_3))))) || (is_string($__internal_compile_4 = twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 22)) && is_string($__internal_compile_5 = ".mkv") && ('' === $__internal_compile_5 || $__internal_compile_5 === substr($__internal_compile_4, -strlen($__internal_compile_5)))))) {
                    // line 23
                    echo "                <video class=\"img-thumbnail\" style=\"width: 40px; height: 40px\" >
                    <source src=\"";
                    // line 24
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 24);
                    echo "\" type=\"video/";
                    echo twig_last($this->env, twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 24), "."));
                    echo "\">
                    Your browser does not support the video tag.
                </video>
            ";
                } else {
                    // line 28
                    echo "                <img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 28);
                    echo "\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 28);
                    echo "\" class=\"img-thumbnail\">
            ";
                }
                // line 30
                echo "

              <td class=\"text-start\">";
                // line 32
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 32);
                echo "
                <br/>
                ";
                // line 34
                if (twig_get_attribute($this->env, $this->source, $context["product"], "status", [], "any", false, false, false, 34)) {
                    // line 35
                    echo "                  <small class=\"text-success\">";
                    echo ($context["text_enabled"] ?? null);
                    echo "</small>
                ";
                } else {
                    // line 37
                    echo "                  <small class=\"text-danger\">";
                    echo ($context["text_disabled"] ?? null);
                    echo "</small>
                ";
                }
                // line 38
                echo "</td>
              <td class=\"text-start d-none d-lg-table-cell\">";
                // line 39
                echo twig_get_attribute($this->env, $this->source, $context["product"], "model", [], "any", false, false, false, 39);
                echo "</td>
              <td class=\"text-end\">
                ";
                // line 41
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 41)) {
                    echo "<span style=\"text-decoration: line-through;\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 41);
                    echo "</span>
                  <br/>
                  <div class=\"text-danger\">";
                    // line 43
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 43);
                    echo "</div>
                ";
                } else {
                    // line 45
                    echo "                  ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 45);
                    echo "
                ";
                }
                // line 46
                echo "</td>
              <td class=\"text-end\">
                ";
                // line 48
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 48) <= 0)) {
                    // line 49
                    echo "                  <span class=\"badge bg-warning\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 49);
                    echo "</span>
                ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 50
$context["product"], "quantity", [], "any", false, false, false, 50) <= 5)) {
                    // line 51
                    echo "                  <span class=\"badge bg-danger\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 51);
                    echo "</span>
                ";
                } else {
                    // line 53
                    echo "                  <span class=\"badge bg-success\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 53);
                    echo "</span>
                ";
                }
                // line 54
                echo "</td>
              <td class=\"text-end\">
                ";
                // line 56
                if (twig_get_attribute($this->env, $this->source, $context["product"], "variant", [], "any", false, false, false, 56)) {
                    // line 57
                    echo "                  <div class=\"btn-group\">
                    <a href=\"";
                    // line 58
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "edit", [], "any", false, false, false, 58);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_edit"] ?? null);
                    echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a>
                
                  </div>
                ";
                } else {
                    // line 62
                    echo "                  <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "edit", [], "any", false, false, false, 62);
                    echo "\" data-bs-toggle=\"tooltip\" title=\"";
                    echo ($context["button_edit"] ?? null);
                    echo "\" class=\"btn btn-warning\"><i class=\"fa-solid fa-pencil\"></i></a>
                ";
                }
                // line 64
                echo "              </td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "        ";
        } else {
            // line 68
            echo "          <tr>
            <td class=\"text-center\" colspan=\"7\">";
            // line 69
            echo ($context["text_no_results"] ?? null);
            echo "</td>
          </tr>
        ";
        }
        // line 72
        echo "      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">";
        // line 76
        echo ($context["pagination"] ?? null);
        echo "</div>
    <div class=\"col-sm-6 text-end\">";
        // line 77
        echo ($context["results"] ?? null);
        echo "</div>
  </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "admin/view/template/catalog/product_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  278 => 77,  274 => 76,  268 => 72,  262 => 69,  259 => 68,  256 => 67,  248 => 64,  240 => 62,  231 => 58,  228 => 57,  226 => 56,  222 => 54,  216 => 53,  210 => 51,  208 => 50,  203 => 49,  201 => 48,  197 => 46,  191 => 45,  186 => 43,  179 => 41,  174 => 39,  171 => 38,  165 => 37,  159 => 35,  157 => 34,  152 => 32,  148 => 30,  140 => 28,  131 => 24,  128 => 23,  126 => 22,  120 => 19,  113 => 18,  108 => 17,  106 => 16,  99 => 12,  87 => 11,  75 => 10,  63 => 9,  51 => 8,  47 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form id=\"form-product\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ action }}\" data-oc-target=\"#product\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
          <td class=\"text-center\">{{ column_image }}</td>
          <td class=\"text-start\"><a href=\"{{ sort_name }}\"{% if sort == 'pd.name' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_name }}</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"{{ sort_model }}\"{% if sort == 'p.model' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_model }}</a></td>
          <td class=\"text-end\"><a href=\"{{ sort_price }}\"{% if sort == 'p.price' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_price }}</a></td>
          <td class=\"text-end\"><a href=\"{{ sort_quantity }}\"{% if sort == 'p.quantity' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_quantity }}</a></td>
          <td class=\"text-end\">{{ column_action }}</td>
        </tr>
      </thead>
      <tbody>
        {% if products %}
          {% for product in products %}
            <tr{% if not product.variant %} class=\"table-warning\"{% endif %}>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"{{ product.product_id }}\" class=\"form-check-input\"/></td>
              <td class=\"text-center\">
                
                {% if product.image ends with '.avi' or product.image ends with '.mp4' or product.image ends with '.mkv' %}
                <video class=\"img-thumbnail\" style=\"width: 40px; height: 40px\" >
                    <source src=\"{{ product.image }}\" type=\"video/{{ product.image|split('.')|last }}\">
                    Your browser does not support the video tag.
                </video>
            {% else %}
                <img src=\"{{ product.image }}\" alt=\"{{ product.name }}\" class=\"img-thumbnail\">
            {% endif %}


              <td class=\"text-start\">{{ product.name }}
                <br/>
                {% if product.status %}
                  <small class=\"text-success\">{{ text_enabled }}</small>
                {% else %}
                  <small class=\"text-danger\">{{ text_disabled }}</small>
                {% endif %}</td>
              <td class=\"text-start d-none d-lg-table-cell\">{{ product.model }}</td>
              <td class=\"text-end\">
                {% if product.special %}<span style=\"text-decoration: line-through;\">{{ product.price }}</span>
                  <br/>
                  <div class=\"text-danger\">{{ product.special }}</div>
                {% else %}
                  {{ product.price }}
                {% endif %}</td>
              <td class=\"text-end\">
                {% if product.quantity <= 0 %}
                  <span class=\"badge bg-warning\">{{ product.quantity }}</span>
                {% elseif product.quantity <= 5 %}
                  <span class=\"badge bg-danger\">{{ product.quantity }}</span>
                {% else %}
                  <span class=\"badge bg-success\">{{ product.quantity }}</span>
                {% endif %}</td>
              <td class=\"text-end\">
                {% if product.variant %}
                  <div class=\"btn-group\">
                    <a href=\"{{ product.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a>
                
                  </div>
                {% else %}
                  <a href=\"{{ product.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-warning\"><i class=\"fa-solid fa-pencil\"></i></a>
                {% endif %}
              </td>
            </tr>
          {% endfor %}
        {% else %}
          <tr>
            <td class=\"text-center\" colspan=\"7\">{{ text_no_results }}</td>
          </tr>
        {% endif %}
      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">{{ pagination }}</div>
    <div class=\"col-sm-6 text-end\">{{ results }}</div>
  </div>
</form>
", "admin/view/template/catalog/product_list.twig", "/var/www/html/admin/view/template/catalog/product_list.twig");
    }
}
