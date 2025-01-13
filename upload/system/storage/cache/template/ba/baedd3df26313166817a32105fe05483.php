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

/* cp-akis/view//plates/sale/order_shipping.twig */
class __TwigTemplate_490c36a97a2077b05910d69b3f3f4aee extends Template
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
        echo "<!DOCTYPE html>
<html dir=\"";
        // line 2
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\">
<head>
  <meta charset=\"UTF-8\"/>
  <title>";
        // line 5
        echo ($context["title"] ?? null);
        echo "</title>
  <base href=\"";
        // line 6
        echo ($context["base"] ?? null);
        echo "\"/>
  <link href=\"";
        // line 7
        echo ($context["bootstrap_css"] ?? null);
        echo "\" type=\"text/css\" rel=\"stylesheet\"/>
  <link href=\"";
        // line 8
        echo ($context["icons"] ?? null);
        echo "\" type=\"text/css\" rel=\"stylesheet\"/>
  <script src=\"";
        // line 9
        echo ($context["jquery"] ?? null);
        echo "\" ></script>
  <script src=\"";
        // line 10
        echo ($context["bootstrap_js"] ?? null);
        echo "\" ></script>
  <link href=\"";
        // line 11
        echo ($context["stylesheet"] ?? null);
        echo "\" type=\"text/css\" rel=\"stylesheet\"/>
</head>
<body>
<div class=\"container\">
  ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 16
            echo "    <div style=\"page-break-after: always;\">
      <h1>";
            // line 17
            echo ($context["text_dispatch_note"] ?? null);
            echo " #";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "order_id", [], "any", false, false, false, 17);
            echo "</h1>

      <div class=\"row\">
        <!-- Grouped Order and Store Details -->
        <div class=\"col-md-6\">
          <div class=\"form-control-plaintext p-0 border rounded mb-3\">
            <div class=\"lead p-2\">
              <strong>";
            // line 24
            echo ($context["text_order_details"] ?? null);
            echo "</strong>
              <ul class=\"list-unstyled mb-0\">
                <li><strong>";
            // line 26
            echo ($context["text_order_id"] ?? null);
            echo ":</strong> ";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "order_id", [], "any", false, false, false, 26);
            echo "</li>
                <li><strong>";
            // line 27
            echo ($context["text_invoice"] ?? null);
            echo ":</strong> ";
            if (twig_get_attribute($this->env, $this->source, $context["order"], "invoice_no", [], "any", false, false, false, 27)) {
                echo twig_get_attribute($this->env, $this->source, $context["order"], "invoice_no", [], "any", false, false, false, 27);
            } else {
                echo "N/A";
            }
            echo "</li>
                <li><strong>";
            // line 28
            echo ($context["text_date_added"] ?? null);
            echo ":</strong> ";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "date_added", [], "any", false, false, false, 28);
            echo "</li>
                <li><strong>";
            // line 29
            echo ($context["text_shipping_method"] ?? null);
            echo ":</strong> ";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "shipping_method", [], "any", false, false, false, 29);
            echo "</li>
              </ul>
            </div>
          </div>
        </div>

        <div class=\"col-md-6\">
          <div class=\"form-control-plaintext p-0 border rounded mb-3\">
            <div class=\"lead p-2\">
              <strong>";
            // line 38
            echo ($context["text_store_details"] ?? null);
            echo "</strong>
              <ul class=\"list-unstyled mb-0\">
                <li><strong>";
            // line 40
            echo ($context["text_store"] ?? null);
            echo ":</strong> ";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "store_name", [], "any", false, false, false, 40);
            echo "</li>
                <li><strong>";
            // line 41
            echo ($context["text_store_telephone"] ?? null);
            echo ":</strong> ";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "store_telephone", [], "any", false, false, false, 41);
            echo "</li>
                <li><strong>";
            // line 42
            echo ($context["text_store_email"] ?? null);
            echo ":</strong> ";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "store_email", [], "any", false, false, false, 42);
            echo "</li>
                <li><strong>";
            // line 43
            echo ($context["text_store_address"] ?? null);
            echo ":</strong> ";
            echo twig_get_attribute($this->env, $this->source, $context["order"], "store_address", [], "any", false, false, false, 43);
            echo "</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class=\"row\">
    

        <div class=\"col-md-6\">
          <div class=\"form-control-plaintext p-0 border rounded mb-3\">
            <div class=\"lead p-2\">
              <strong>";
            // line 56
            echo ($context["text_shipping_address"] ?? null);
            echo "</strong>
              <br> ";
            // line 57
            if (twig_get_attribute($this->env, $this->source, $context["order"], "email", [], "any", false, false, false, 57)) {
                echo twig_get_attribute($this->env, $this->source, $context["order"], "email", [], "any", false, false, false, 57);
            } else {
                echo "N/A";
            }
            echo " 
              <p class=\"mb-0\">";
            // line 58
            if (twig_get_attribute($this->env, $this->source, $context["order"], "shipping_address", [], "any", false, false, false, 58)) {
                echo twig_get_attribute($this->env, $this->source, $context["order"], "shipping_address", [], "any", false, false, false, 58);
            } else {
                echo "N/A";
            }
            // line 59
            echo "              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Product Details -->
      <table class=\"table table-bordered\">
        <thead>
          <tr>
            <td><b>";
            // line 69
            echo ($context["column_location"] ?? null);
            echo "</b></td>
            <td><b>";
            // line 70
            echo ($context["column_reference"] ?? null);
            echo "</b></td>
            <td><b>";
            // line 71
            echo ($context["column_product"] ?? null);
            echo "</b></td>
            <td><b>";
            // line 72
            echo ($context["column_weight"] ?? null);
            echo "</b></td>
            <td><b>";
            // line 73
            echo ($context["column_model"] ?? null);
            echo "</b></td>
            <td class=\"text-end\"><b>";
            // line 74
            echo ($context["column_quantity"] ?? null);
            echo "</b></td>
          </tr>
        </thead>
        <tbody>
          ";
            // line 78
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 78));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 79
                echo "            <tr>
              <td>";
                // line 80
                echo twig_get_attribute($this->env, $this->source, $context["product"], "location", [], "any", false, false, false, 80);
                echo "</td>
              <td>
                ";
                // line 82
                if (twig_get_attribute($this->env, $this->source, $context["product"], "sku", [], "any", false, false, false, 82)) {
                    echo ($context["text_sku"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "sku", [], "any", false, false, false, 82);
                    echo "<br/>";
                }
                // line 83
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "upc", [], "any", false, false, false, 83)) {
                    echo ($context["text_upc"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "upc", [], "any", false, false, false, 83);
                    echo "<br/>";
                }
                // line 84
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "ean", [], "any", false, false, false, 84)) {
                    echo ($context["text_ean"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "ean", [], "any", false, false, false, 84);
                    echo "<br/>";
                }
                // line 85
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "jan", [], "any", false, false, false, 85)) {
                    echo ($context["text_jan"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "jan", [], "any", false, false, false, 85);
                    echo "<br/>";
                }
                // line 86
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "isbn", [], "any", false, false, false, 86)) {
                    echo ($context["text_isbn"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "isbn", [], "any", false, false, false, 86);
                    echo "<br/>";
                }
                // line 87
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "mpn", [], "any", false, false, false, 87)) {
                    echo ($context["text_mpn"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "mpn", [], "any", false, false, false, 87);
                    echo "<br/>";
                }
                // line 88
                echo "              </td>
              <td>";
                // line 89
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 89);
                echo "
                ";
                // line 90
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "option", [], "any", false, false, false, 90));
                foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                    // line 91
                    echo "                  <br/><small> - ";
                    echo twig_get_attribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 91);
                    echo ": ";
                    echo twig_get_attribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, false, 91);
                    echo "</small>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 93
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "reward", [], "any", false, false, false, 93)) {
                    // line 94
                    echo "                  <br/><small> - ";
                    echo ($context["text_points"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "reward", [], "any", false, false, false, 94);
                    echo "</small>
                ";
                }
                // line 96
                echo "              </td>
              <td>";
                // line 97
                echo twig_get_attribute($this->env, $this->source, $context["product"], "weight", [], "any", false, false, false, 97);
                echo "</td>
              <td>";
                // line 98
                echo twig_get_attribute($this->env, $this->source, $context["product"], "model", [], "any", false, false, false, 98);
                echo "</td>
              <td class=\"text-end\">";
                // line 99
                echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 99);
                echo "</td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 102
            echo "        </tbody>
      </table>

      <!-- Optional Comments Section -->
      ";
            // line 106
            if (twig_get_attribute($this->env, $this->source, $context["order"], "comment", [], "any", false, false, false, 106)) {
                // line 107
                echo "        <table class=\"table table-bordered\">
          <thead>
            <tr>
              <td><b>";
                // line 110
                echo ($context["text_comment"] ?? null);
                echo "</b></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>";
                // line 115
                echo twig_get_attribute($this->env, $this->source, $context["order"], "comment", [], "any", false, false, false, 115);
                echo "</td>
            </tr>
          </tbody>
        </table>
      ";
            }
            // line 120
            echo "    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 122
        echo "</div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/sale/order_shipping.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  385 => 122,  378 => 120,  370 => 115,  362 => 110,  357 => 107,  355 => 106,  349 => 102,  340 => 99,  336 => 98,  332 => 97,  329 => 96,  321 => 94,  318 => 93,  307 => 91,  303 => 90,  299 => 89,  296 => 88,  288 => 87,  280 => 86,  272 => 85,  264 => 84,  256 => 83,  249 => 82,  244 => 80,  241 => 79,  237 => 78,  230 => 74,  226 => 73,  222 => 72,  218 => 71,  214 => 70,  210 => 69,  198 => 59,  192 => 58,  184 => 57,  180 => 56,  162 => 43,  156 => 42,  150 => 41,  144 => 40,  139 => 38,  125 => 29,  119 => 28,  109 => 27,  103 => 26,  98 => 24,  86 => 17,  83 => 16,  79 => 15,  72 => 11,  68 => 10,  64 => 9,  60 => 8,  56 => 7,  52 => 6,  48 => 5,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html dir=\"{{ direction }}\" lang=\"{{ lang }}\">
<head>
  <meta charset=\"UTF-8\"/>
  <title>{{ title }}</title>
  <base href=\"{{ base }}\"/>
  <link href=\"{{ bootstrap_css }}\" type=\"text/css\" rel=\"stylesheet\"/>
  <link href=\"{{ icons }}\" type=\"text/css\" rel=\"stylesheet\"/>
  <script src=\"{{ jquery }}\" ></script>
  <script src=\"{{ bootstrap_js }}\" ></script>
  <link href=\"{{ stylesheet }}\" type=\"text/css\" rel=\"stylesheet\"/>
</head>
<body>
<div class=\"container\">
  {% for order in orders %}
    <div style=\"page-break-after: always;\">
      <h1>{{ text_dispatch_note }} #{{ order.order_id }}</h1>

      <div class=\"row\">
        <!-- Grouped Order and Store Details -->
        <div class=\"col-md-6\">
          <div class=\"form-control-plaintext p-0 border rounded mb-3\">
            <div class=\"lead p-2\">
              <strong>{{ text_order_details }}</strong>
              <ul class=\"list-unstyled mb-0\">
                <li><strong>{{ text_order_id }}:</strong> {{ order.order_id }}</li>
                <li><strong>{{ text_invoice }}:</strong> {% if order.invoice_no %}{{ order.invoice_no }}{% else %}N/A{% endif %}</li>
                <li><strong>{{ text_date_added }}:</strong> {{ order.date_added }}</li>
                <li><strong>{{ text_shipping_method }}:</strong> {{ order.shipping_method }}</li>
              </ul>
            </div>
          </div>
        </div>

        <div class=\"col-md-6\">
          <div class=\"form-control-plaintext p-0 border rounded mb-3\">
            <div class=\"lead p-2\">
              <strong>{{ text_store_details }}</strong>
              <ul class=\"list-unstyled mb-0\">
                <li><strong>{{ text_store }}:</strong> {{ order.store_name }}</li>
                <li><strong>{{ text_store_telephone }}:</strong> {{ order.store_telephone }}</li>
                <li><strong>{{ text_store_email }}:</strong> {{ order.store_email }}</li>
                <li><strong>{{ text_store_address }}:</strong> {{ order.store_address }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class=\"row\">
    

        <div class=\"col-md-6\">
          <div class=\"form-control-plaintext p-0 border rounded mb-3\">
            <div class=\"lead p-2\">
              <strong>{{ text_shipping_address }}</strong>
              <br> {% if order.email %}{{ order.email }}{% else %}N/A{% endif %} 
              <p class=\"mb-0\">{% if order.shipping_address %}{{ order.shipping_address }}{% else %}N/A{% endif %}
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Product Details -->
      <table class=\"table table-bordered\">
        <thead>
          <tr>
            <td><b>{{ column_location }}</b></td>
            <td><b>{{ column_reference }}</b></td>
            <td><b>{{ column_product }}</b></td>
            <td><b>{{ column_weight }}</b></td>
            <td><b>{{ column_model }}</b></td>
            <td class=\"text-end\"><b>{{ column_quantity }}</b></td>
          </tr>
        </thead>
        <tbody>
          {% for product in order.product %}
            <tr>
              <td>{{ product.location }}</td>
              <td>
                {% if product.sku %}{{ text_sku }} {{ product.sku }}<br/>{% endif %}
                {% if product.upc %}{{ text_upc }} {{ product.upc }}<br/>{% endif %}
                {% if product.ean %}{{ text_ean }} {{ product.ean }}<br/>{% endif %}
                {% if product.jan %}{{ text_jan }} {{ product.jan }}<br/>{% endif %}
                {% if product.isbn %}{{ text_isbn }} {{ product.isbn }}<br/>{% endif %}
                {% if product.mpn %}{{ text_mpn }} {{ product.mpn }}<br/>{% endif %}
              </td>
              <td>{{ product.name }}
                {% for option in product.option %}
                  <br/><small> - {{ option.name }}: {{ option.value }}</small>
                {% endfor %}
                {% if product.reward %}
                  <br/><small> - {{ text_points }} {{ product.reward }}</small>
                {% endif %}
              </td>
              <td>{{ product.weight }}</td>
              <td>{{ product.model }}</td>
              <td class=\"text-end\">{{ product.quantity }}</td>
            </tr>
          {% endfor %}
        </tbody>
      </table>

      <!-- Optional Comments Section -->
      {% if order.comment %}
        <table class=\"table table-bordered\">
          <thead>
            <tr>
              <td><b>{{ text_comment }}</b></td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ order.comment }}</td>
            </tr>
          </tbody>
        </table>
      {% endif %}
    </div>
  {% endfor %}
</div>
</body>
</html>
", "cp-akis/view//plates/sale/order_shipping.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/sale/order_shipping.twig");
    }
}
