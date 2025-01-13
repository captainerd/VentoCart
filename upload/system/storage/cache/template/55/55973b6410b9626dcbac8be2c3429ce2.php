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

/* catalog/view/template/mail/order_alert.twig */
class __TwigTemplate_cd1737150f25ad9132a09f23d655144f extends Template
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
        echo ($context["text_received"] ?? null);
        echo "<br/>
<br/>
";
        // line 3
        echo ($context["text_order_id"] ?? null);
        echo " ";
        echo ($context["order_id"] ?? null);
        echo "<br/>
";
        // line 4
        echo ($context["text_date_added"] ?? null);
        echo " ";
        echo ($context["date_added"] ?? null);
        echo "<br/>
";
        // line 5
        echo ($context["text_order_status"] ?? null);
        echo " ";
        echo ($context["order_status"] ?? null);
        echo "<br/>
<br/>
";
        // line 7
        echo ($context["text_product"] ?? null);
        echo "<br/>
<br/>
";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 10
            echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 10);
            echo "x ";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 10);
            echo " (";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "model", [], "any", false, false, false, 10);
            echo ") ";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "total", [], "any", false, false, false, 10);
            echo "<br/>
";
            // line 11
            if (twig_get_attribute($this->env, $this->source, $context["product"], "option", [], "any", false, false, false, 11)) {
                // line 12
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "option", [], "any", false, false, false, 12));
                foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                    // line 13
                    echo "\t- ";
                    echo twig_get_attribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 13);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, false, 13);
                    echo "<br/>
";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo " 
<br/>
";
        // line 19
        echo ($context["text_total"] ?? null);
        echo "<br/>
<br/>
";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["totals"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["total"]) {
            // line 22
            echo twig_get_attribute($this->env, $this->source, $context["total"], "title", [], "any", false, false, false, 22);
            echo ": ";
            echo twig_get_attribute($this->env, $this->source, $context["total"], "value", [], "any", false, false, false, 22);
            echo "<br/>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['total'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "<br/>
";
        // line 25
        if (($context["comment"] ?? null)) {
            // line 26
            echo ($context["text_comment"] ?? null);
            echo "<br/>
<br/>
";
            // line 28
            echo ($context["comment"] ?? null);
            echo "<br/>
";
        }
        // line 30
        echo "<br/>
";
        // line 31
        echo ($context["store"] ?? null);
        echo "<br/>
";
        // line 32
        echo ($context["store_url"] ?? null);
    }

    public function getTemplateName()
    {
        return "catalog/view/template/mail/order_alert.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 32,  143 => 31,  140 => 30,  135 => 28,  130 => 26,  128 => 25,  125 => 24,  115 => 22,  111 => 21,  106 => 19,  102 => 17,  86 => 13,  82 => 12,  80 => 11,  70 => 10,  66 => 9,  61 => 7,  54 => 5,  48 => 4,  42 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ text_received }}<br/>
<br/>
{{ text_order_id }} {{ order_id }}<br/>
{{ text_date_added }} {{ date_added }}<br/>
{{ text_order_status }} {{ order_status }}<br/>
<br/>
{{ text_product }}<br/>
<br/>
{% for product in products %}
{{ product.quantity }}x {{ product.name }} ({{ product.model }}) {{ product.total }}<br/>
{% if product.option %}
{% for option in product.option %}
\t- {{ option.name }} {{ option.value }}<br/>
{% endfor %}
{% endif %}
{% endfor %}
 
<br/>
{{ text_total }}<br/>
<br/>
{% for total in totals %}
{{ total.title }}: {{ total.value }}<br/>
{% endfor %}
<br/>
{% if comment %}
{{ text_comment }}<br/>
<br/>
{{ comment }}<br/>
{% endif %}
<br/>
{{ store }}<br/>
{{ store_url }}", "catalog/view/template/mail/order_alert.twig", "/home/natsos/web/ventocart.lan/public_html/catalog/view/template/mail/order_alert.twig");
    }
}
