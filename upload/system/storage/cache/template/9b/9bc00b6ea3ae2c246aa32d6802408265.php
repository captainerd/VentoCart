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

/* themes/default/plates/mail/order_history.twig */
class __TwigTemplate_f5c7aa81c99dd2390e2e285c562d1c8c extends Template
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
        echo ($context["text_order_id"] ?? null);
        echo " ";
        echo ($context["order_id"] ?? null);
        echo "<br/>
";
        // line 2
        echo ($context["text_date_added"] ?? null);
        echo " ";
        echo ($context["date_added"] ?? null);
        echo "<br/>
<br/>
";
        // line 4
        echo ($context["text_order_status"] ?? null);
        echo "<br/>
<br/>
";
        // line 6
        echo ($context["order_status"] ?? null);
        echo "<br/>
<br/>
";
        // line 8
        if (($context["link"] ?? null)) {
            // line 9
            echo ($context["text_link"] ?? null);
            echo "<br/>
<br/>
";
            // line 11
            echo ($context["link"] ?? null);
            echo "<br/>
";
        }
        // line 13
        if (($context["comment"] ?? null)) {
            // line 14
            echo "<br/>
";
            // line 15
            echo ($context["text_comment"] ?? null);
            echo "<br/>
<br/>
";
            // line 17
            echo ($context["comment"] ?? null);
            echo "<br/>
";
            // line 18
            echo ($context["text_footer"] ?? null);
            echo "<br/>
";
        } else {
            // line 19
            echo " 
";
            // line 20
            echo ($context["text_footer"] ?? null);
            echo "<br/>
";
        }
        // line 22
        echo "<br/>
";
        // line 23
        echo ($context["store"] ?? null);
        echo "<br/>
";
        // line 24
        echo ($context["store_url"] ?? null);
    }

    public function getTemplateName()
    {
        return "themes/default/plates/mail/order_history.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 24,  102 => 23,  99 => 22,  94 => 20,  91 => 19,  86 => 18,  82 => 17,  77 => 15,  74 => 14,  72 => 13,  67 => 11,  62 => 9,  60 => 8,  55 => 6,  50 => 4,  43 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ text_order_id }} {{ order_id }}<br/>
{{ text_date_added }} {{ date_added }}<br/>
<br/>
{{ text_order_status }}<br/>
<br/>
{{ order_status }}<br/>
<br/>
{% if link %}
{{ text_link }}<br/>
<br/>
{{ link }}<br/>
{% endif %}
{% if comment %}
<br/>
{{ text_comment }}<br/>
<br/>
{{ comment }}<br/>
{{ text_footer }}<br/>
{% else %} 
{{ text_footer }}<br/>
{% endif %}
<br/>
{{ store }}<br/>
{{ store_url }}", "themes/default/plates/mail/order_history.twig", "/home/natsos/web/ventocart.lan/public_html/themes/default/plates/mail/order_history.twig");
    }
}
