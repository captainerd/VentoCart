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

/* cp-akis/view//plates/sale/subscription_list.twig */
class __TwigTemplate_c48672713714f95f1f7a26e5556f80a9 extends Template
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
        echo "<form id=\"form-subscription\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
        echo ($context["action"] ?? null);
        echo "\" data-oc-target=\"#subscription\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-end\"><a href=\"";
        // line 6
        echo ($context["sort_subscription"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "s.subscription_id")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_subscription_id"] ?? null);
        echo "</a></td>
          <td class=\"text-end\"><a href=\"";
        // line 7
        echo ($context["sort_order"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "s.order_id")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_order_id"] ?? null);
        echo "</a></td>
          <td class=\"text-start\"><a href=\"";
        // line 8
        echo ($context["sort_customer"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "customer")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_customer"] ?? null);
        echo "</a></td>
          <td class=\"text-start\"><a href=\"";
        // line 9
        echo ($context["sort_status"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "s.status")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_status"] ?? null);
        echo "</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"";
        // line 10
        echo ($context["sort_date_added"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "s.date_added")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_date_added"] ?? null);
        echo "</a></td>
          <td class=\"text-end\">";
        // line 11
        echo ($context["column_action"] ?? null);
        echo "</td>
        </tr>
      </thead>
      <tbody>
        ";
        // line 15
        if (($context["subscriptions"] ?? null)) {
            // line 16
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["subscriptions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["subscription"]) {
                // line 17
                echo "            <tr>
              <td class=\"text-end\">";
                // line 18
                echo twig_get_attribute($this->env, $this->source, $context["subscription"], "subscription_id", [], "any", false, false, false, 18);
                echo "</td>
              <td class=\"text-end\">";
                // line 19
                echo twig_get_attribute($this->env, $this->source, $context["subscription"], "order_id", [], "any", false, false, false, 19);
                echo "</td>
              <td class=\"text-start\">";
                // line 20
                echo twig_get_attribute($this->env, $this->source, $context["subscription"], "customer", [], "any", false, false, false, 20);
                echo "</td>
              <td class=\"text-start\">";
                // line 21
                echo twig_get_attribute($this->env, $this->source, $context["subscription"], "status", [], "any", false, false, false, 21);
                echo "</td>
              <td class=\"text-start d-none d-lg-table-cell\">";
                // line 22
                echo twig_get_attribute($this->env, $this->source, $context["subscription"], "date_added", [], "any", false, false, false, 22);
                echo "</td>
              <td class=\"text-end\"><a href=\"";
                // line 23
                echo twig_get_attribute($this->env, $this->source, $context["subscription"], "view", [], "any", false, false, false, 23);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_view"] ?? null);
                echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-eye\"></i></a> <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["subscription"], "order", [], "any", false, false, false, 23);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_order"] ?? null);
                echo "\" class=\"btn btn-light\"><i class=\"fa-solid fa-shopping-cart\"></i></a></td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "        ";
        } else {
            // line 27
            echo "          <tr>
            <td class=\"text-center\" colspan=\"6\">";
            // line 28
            echo ($context["text_no_results"] ?? null);
            echo "</td>
          </tr>
        ";
        }
        // line 31
        echo "      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">";
        // line 35
        echo ($context["pagination"] ?? null);
        echo "</div>
    <div class=\"col-sm-6 text-end\">";
        // line 36
        echo ($context["results"] ?? null);
        echo "</div>
  </div>
</form>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/sale/subscription_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 36,  176 => 35,  170 => 31,  164 => 28,  161 => 27,  158 => 26,  143 => 23,  139 => 22,  135 => 21,  131 => 20,  127 => 19,  123 => 18,  120 => 17,  115 => 16,  113 => 15,  106 => 11,  94 => 10,  82 => 9,  70 => 8,  58 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form id=\"form-subscription\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ action }}\" data-oc-target=\"#subscription\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-end\"><a href=\"{{ sort_subscription }}\"{% if sort == 's.subscription_id' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_subscription_id }}</a></td>
          <td class=\"text-end\"><a href=\"{{ sort_order }}\"{% if sort == 's.order_id' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_order_id }}</a></td>
          <td class=\"text-start\"><a href=\"{{ sort_customer }}\"{% if sort == 'customer' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_customer }}</a></td>
          <td class=\"text-start\"><a href=\"{{ sort_status }}\"{% if sort == 's.status' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_status }}</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"{{ sort_date_added }}\"{% if sort == 's.date_added' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_date_added }}</a></td>
          <td class=\"text-end\">{{ column_action }}</td>
        </tr>
      </thead>
      <tbody>
        {% if subscriptions %}
          {% for subscription in subscriptions %}
            <tr>
              <td class=\"text-end\">{{ subscription.subscription_id }}</td>
              <td class=\"text-end\">{{ subscription.order_id }}</td>
              <td class=\"text-start\">{{ subscription.customer }}</td>
              <td class=\"text-start\">{{ subscription.status }}</td>
              <td class=\"text-start d-none d-lg-table-cell\">{{ subscription.date_added }}</td>
              <td class=\"text-end\"><a href=\"{{ subscription.view }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_view }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-eye\"></i></a> <a href=\"{{ subscription.order }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_order }}\" class=\"btn btn-light\"><i class=\"fa-solid fa-shopping-cart\"></i></a></td>
            </tr>
          {% endfor %}
        {% else %}
          <tr>
            <td class=\"text-center\" colspan=\"6\">{{ text_no_results }}</td>
          </tr>
        {% endif %}
      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">{{ pagination }}</div>
    <div class=\"col-sm-6 text-end\">{{ results }}</div>
  </div>
</form>", "cp-akis/view//plates/sale/subscription_list.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/sale/subscription_list.twig");
    }
}
