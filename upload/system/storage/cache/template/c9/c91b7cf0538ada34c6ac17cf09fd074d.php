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

/* cp-akis/view/default/plates/customer/customer_list.twig */
class __TwigTemplate_2e1bd3a89b099acbb435227bb4148bc6 extends Template
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
        echo "<form id=\"form-customer\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
        echo ($context["action"] ?? null);
        echo "\" data-oc-target=\"#customer\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
          <td class=\"text-start\"><a href=\"";
        // line 7
        echo ($context["sort_name"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "name")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_name"] ?? null);
        echo "</a></td>
          <td class=\"text-start\"><a href=\"";
        // line 8
        echo ($context["sort_email"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "c.email")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_email"] ?? null);
        echo "</a></td>
          <td class=\"text-start\"><a href=\"";
        // line 9
        echo ($context["sort_customer_group"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "customer_group")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_customer_group"] ?? null);
        echo "</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"";
        // line 10
        echo ($context["sort_date_added"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "c.date_added")) {
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
        if (($context["customers"] ?? null)) {
            // line 16
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["customers"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["customer"]) {
                // line 17
                echo "            <tr>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"";
                // line 18
                echo twig_get_attribute($this->env, $this->source, $context["customer"], "customer_id", [], "any", false, false, false, 18);
                echo "\" class=\"form-check-input\"/></td>
              <td class=\"text-start\">";
                // line 19
                echo twig_get_attribute($this->env, $this->source, $context["customer"], "name", [], "any", false, false, false, 19);
                echo "
                <br/>
                ";
                // line 21
                if (twig_get_attribute($this->env, $this->source, $context["customer"], "status", [], "any", false, false, false, 21)) {
                    // line 22
                    echo "                  <small class=\"text-success\">";
                    echo ($context["text_enabled"] ?? null);
                    echo "</small>
                ";
                } else {
                    // line 24
                    echo "                  <small class=\"text-danger\">";
                    echo ($context["text_disabled"] ?? null);
                    echo "</small>
                ";
                }
                // line 26
                echo "              </td>
              <td class=\"text-start\">";
                // line 27
                echo twig_get_attribute($this->env, $this->source, $context["customer"], "email", [], "any", false, false, false, 27);
                echo "</td>
              <td class=\"text-start\">";
                // line 28
                echo twig_get_attribute($this->env, $this->source, $context["customer"], "customer_group", [], "any", false, false, false, 28);
                echo "</td>
              <td class=\"text-start d-none d-lg-table-cell\">";
                // line 29
                echo twig_get_attribute($this->env, $this->source, $context["customer"], "date_added", [], "any", false, false, false, 29);
                echo "</td>
              <td class=\"text-end\">
                <div class=\"btn-group dropdown\">
                  <a href=\"";
                // line 32
                echo twig_get_attribute($this->env, $this->source, $context["customer"], "edit", [], "any", false, false, false, 32);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_edit"] ?? null);
                echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a>
                  <button type=\"button\" data-bs-toggle=\"dropdown\" class=\"btn btn-primary dropdown-toggle dropdown-toggle-split\"><span class=\"fa-solid fa-caret-down\"></span></button>
                  <ul class=\"dropdown-menu dropdown-menu-end\">
                    <li><h6 class=\"dropdown-header\">";
                // line 35
                echo ($context["text_option"] ?? null);
                echo "</h6></li>
                    ";
                // line 36
                if (twig_get_attribute($this->env, $this->source, $context["customer"], "unlock", [], "any", false, false, false, 36)) {
                    // line 37
                    echo "                      <li><a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["customer"], "unlock", [], "any", false, false, false, 37);
                    echo "\" class=\"dropdown-item\"><i class=\"fa-solid fa-unlock\"></i> ";
                    echo ($context["text_unlock"] ?? null);
                    echo "</a></li>
                    ";
                } else {
                    // line 39
                    echo "                      <li><a href=\"#\" class=\"dropdown-item disabled\"><i class=\"fa-solid fa-unlock\"></i> ";
                    echo ($context["text_unlock"] ?? null);
                    echo "</a></li>
                    ";
                }
                // line 41
                echo "                    <li>
                      <hr class=\"dropdown-divider\">
                    </li>
                    <li><h6 class=\"dropdown-header\">";
                // line 44
                echo ($context["text_login"] ?? null);
                echo "</h6></li>
                    ";
                // line 45
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["customer"], "store", [], "any", false, false, false, 45));
                foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
                    // line 46
                    echo "                      <li><a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["store"], "href", [], "any", false, false, false, 46);
                    echo "\" target=\"_blank\" class=\"dropdown-item\"><i class=\"fa-solid fa-lock\"></i> ";
                    echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 46);
                    echo "</a></li>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 48
                echo "                  </ul>
                </div>
              </td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "        ";
        } else {
            // line 54
            echo "          <tr>
            <td class=\"text-center\" colspan=\"7\">";
            // line 55
            echo ($context["text_no_results"] ?? null);
            echo "</td>
          </tr>
        ";
        }
        // line 58
        echo "      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">";
        // line 62
        echo ($context["pagination"] ?? null);
        echo "</div>
    <div class=\"col-sm-6 text-end\">";
        // line 63
        echo ($context["results"] ?? null);
        echo "</div>
  </div>
</form>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/customer/customer_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  236 => 63,  232 => 62,  226 => 58,  220 => 55,  217 => 54,  214 => 53,  204 => 48,  193 => 46,  189 => 45,  185 => 44,  180 => 41,  174 => 39,  166 => 37,  164 => 36,  160 => 35,  152 => 32,  146 => 29,  142 => 28,  138 => 27,  135 => 26,  129 => 24,  123 => 22,  121 => 21,  116 => 19,  112 => 18,  109 => 17,  104 => 16,  102 => 15,  95 => 11,  83 => 10,  71 => 9,  59 => 8,  47 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form id=\"form-customer\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ action }}\" data-oc-target=\"#customer\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
          <td class=\"text-start\"><a href=\"{{ sort_name }}\"{% if sort == 'name' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_name }}</a></td>
          <td class=\"text-start\"><a href=\"{{ sort_email }}\"{% if sort == 'c.email' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_email }}</a></td>
          <td class=\"text-start\"><a href=\"{{ sort_customer_group }}\"{% if sort == 'customer_group' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_customer_group }}</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"{{ sort_date_added }}\"{% if sort == 'c.date_added' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_date_added }}</a></td>
          <td class=\"text-end\">{{ column_action }}</td>
        </tr>
      </thead>
      <tbody>
        {% if customers %}
          {% for customer in customers %}
            <tr>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"{{ customer.customer_id }}\" class=\"form-check-input\"/></td>
              <td class=\"text-start\">{{ customer.name }}
                <br/>
                {% if customer.status %}
                  <small class=\"text-success\">{{ text_enabled }}</small>
                {% else %}
                  <small class=\"text-danger\">{{ text_disabled }}</small>
                {% endif %}
              </td>
              <td class=\"text-start\">{{ customer.email }}</td>
              <td class=\"text-start\">{{ customer.customer_group }}</td>
              <td class=\"text-start d-none d-lg-table-cell\">{{ customer.date_added }}</td>
              <td class=\"text-end\">
                <div class=\"btn-group dropdown\">
                  <a href=\"{{ customer.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a>
                  <button type=\"button\" data-bs-toggle=\"dropdown\" class=\"btn btn-primary dropdown-toggle dropdown-toggle-split\"><span class=\"fa-solid fa-caret-down\"></span></button>
                  <ul class=\"dropdown-menu dropdown-menu-end\">
                    <li><h6 class=\"dropdown-header\">{{ text_option }}</h6></li>
                    {% if customer.unlock %}
                      <li><a href=\"{{ customer.unlock }}\" class=\"dropdown-item\"><i class=\"fa-solid fa-unlock\"></i> {{ text_unlock }}</a></li>
                    {% else %}
                      <li><a href=\"#\" class=\"dropdown-item disabled\"><i class=\"fa-solid fa-unlock\"></i> {{ text_unlock }}</a></li>
                    {% endif %}
                    <li>
                      <hr class=\"dropdown-divider\">
                    </li>
                    <li><h6 class=\"dropdown-header\">{{ text_login }}</h6></li>
                    {% for store in customer.store %}
                      <li><a href=\"{{ store.href }}\" target=\"_blank\" class=\"dropdown-item\"><i class=\"fa-solid fa-lock\"></i> {{ store.name }}</a></li>
                    {% endfor %}
                  </ul>
                </div>
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
</form>", "cp-akis/view/default/plates/customer/customer_list.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/customer/customer_list.twig");
    }
}
