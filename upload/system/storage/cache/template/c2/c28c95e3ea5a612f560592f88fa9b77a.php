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

/* cp-akis/view//plates/sale/returns_list.twig */
class __TwigTemplate_8d3c16c62b23cdbaeb8af7269e91a200 extends Template
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
        echo "<form id=\"form-return\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
        echo ($context["action"] ?? null);
        echo "\" data-oc-target=\"#return\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
          <td class=\"text-end\"><a href=\"";
        // line 7
        echo ($context["sort_return_id"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "r.return_id")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_return_id"] ?? null);
        echo "</a></td>
          <td class=\"text-end\"><a href=\"";
        // line 8
        echo ($context["sort_order_id"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "r.order_id")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_order_id"] ?? null);
        echo "</a></td>
          <td class=\"text-start\"><a href=\"";
        // line 9
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
        // line 10
        echo ($context["sort_product"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "r.product")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_product"] ?? null);
        echo "</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"";
        // line 11
        echo ($context["sort_model"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "r.model")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_model"] ?? null);
        echo "</a></td>
          <td class=\"text-start\"><a href=\"";
        // line 12
        echo ($context["sort_status"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "return_status")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_status"] ?? null);
        echo "</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"";
        // line 13
        echo ($context["sort_date_added"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "r.date_added")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_date_added"] ?? null);
        echo "</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"";
        // line 14
        echo ($context["sort_date_modified"] ?? null);
        echo "\"";
        if ((($context["sort"] ?? null) == "r.date_modified")) {
            echo " class=\"";
            echo twig_lower_filter($this->env, ($context["order"] ?? null));
            echo "\"";
        }
        echo ">";
        echo ($context["column_date_modified"] ?? null);
        echo "</a></td>
          <td class=\"text-end\">";
        // line 15
        echo ($context["column_action"] ?? null);
        echo "</td>
        </tr>
      </thead>
      <tbody>
        ";
        // line 19
        if (($context["returns"] ?? null)) {
            // line 20
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["returns"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["return"]) {
                // line 21
                echo "            <tr>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"";
                // line 22
                echo twig_get_attribute($this->env, $this->source, $context["return"], "return_id", [], "any", false, false, false, 22);
                echo "\" class=\"form-check-input\"/></td>
              <td class=\"text-end\">";
                // line 23
                echo twig_get_attribute($this->env, $this->source, $context["return"], "return_id", [], "any", false, false, false, 23);
                echo "</td>
              <td class=\"text-end\">";
                // line 24
                echo twig_get_attribute($this->env, $this->source, $context["return"], "order_id", [], "any", false, false, false, 24);
                echo "</td>
              <td class=\"text-start\">";
                // line 25
                echo twig_get_attribute($this->env, $this->source, $context["return"], "customer", [], "any", false, false, false, 25);
                echo "</td>
              <td class=\"text-start\">";
                // line 26
                echo twig_get_attribute($this->env, $this->source, $context["return"], "product", [], "any", false, false, false, 26);
                echo "</td>
              <td class=\"text-start d-none d-lg-table-cell\">";
                // line 27
                echo twig_get_attribute($this->env, $this->source, $context["return"], "model", [], "any", false, false, false, 27);
                echo "</td>
              <td class=\"text-start\">";
                // line 28
                echo twig_get_attribute($this->env, $this->source, $context["return"], "return_status", [], "any", false, false, false, 28);
                echo "</td>
              <td class=\"text-start d-none d-lg-table-cell\">";
                // line 29
                echo twig_get_attribute($this->env, $this->source, $context["return"], "date_added", [], "any", false, false, false, 29);
                echo "</td>
              <td class=\"text-start d-none d-lg-table-cell\">";
                // line 30
                echo twig_get_attribute($this->env, $this->source, $context["return"], "date_modified", [], "any", false, false, false, 30);
                echo "</td>
              <td class=\"text-end\"><a href=\"";
                // line 31
                echo twig_get_attribute($this->env, $this->source, $context["return"], "edit", [], "any", false, false, false, 31);
                echo "\" data-bs-toggle=\"tooltip\" title=\"";
                echo ($context["button_edit"] ?? null);
                echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a></td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['return'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "        ";
        } else {
            // line 35
            echo "          <tr>
            <td class=\"text-center\" colspan=\"10\">";
            // line 36
            echo ($context["text_no_results"] ?? null);
            echo "</td>
          </tr>
        ";
        }
        // line 39
        echo "      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">";
        // line 43
        echo ($context["pagination"] ?? null);
        echo "</div>
    <div class=\"col-sm-6 text-end\">";
        // line 44
        echo ($context["results"] ?? null);
        echo "</div>
  </div>
</form>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/sale/returns_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  229 => 44,  225 => 43,  219 => 39,  213 => 36,  210 => 35,  207 => 34,  196 => 31,  192 => 30,  188 => 29,  184 => 28,  180 => 27,  176 => 26,  172 => 25,  168 => 24,  164 => 23,  160 => 22,  157 => 21,  152 => 20,  150 => 19,  143 => 15,  131 => 14,  119 => 13,  107 => 12,  95 => 11,  83 => 10,  71 => 9,  59 => 8,  47 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form id=\"form-return\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ action }}\" data-oc-target=\"#return\">
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <td class=\"text-center\" style=\"width: 1px;\"><input type=\"checkbox\" onclick=\"\$('input[name*=\\'selected\\']').prop('checked', \$(this).prop('checked'));\" class=\"form-check-input\"/></td>
          <td class=\"text-end\"><a href=\"{{ sort_return_id }}\"{% if sort == 'r.return_id' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_return_id }}</a></td>
          <td class=\"text-end\"><a href=\"{{ sort_order_id }}\"{% if sort == 'r.order_id' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_order_id }}</a></td>
          <td class=\"text-start\"><a href=\"{{ sort_customer }}\"{% if sort == 'customer' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_customer }}</a></td>
          <td class=\"text-start\"><a href=\"{{ sort_product }}\"{% if sort == 'r.product' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_product }}</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"{{ sort_model }}\"{% if sort == 'r.model' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_model }}</a></td>
          <td class=\"text-start\"><a href=\"{{ sort_status }}\"{% if sort == 'return_status' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_status }}</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"{{ sort_date_added }}\"{% if sort == 'r.date_added' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_date_added }}</a></td>
          <td class=\"text-start d-none d-lg-table-cell\"><a href=\"{{ sort_date_modified }}\"{% if sort == 'r.date_modified' %} class=\"{{ order|lower }}\"{% endif %}>{{ column_date_modified }}</a></td>
          <td class=\"text-end\">{{ column_action }}</td>
        </tr>
      </thead>
      <tbody>
        {% if returns %}
          {% for return in returns %}
            <tr>
              <td class=\"text-center\"><input type=\"checkbox\" name=\"selected[]\" value=\"{{ return.return_id }}\" class=\"form-check-input\"/></td>
              <td class=\"text-end\">{{ return.return_id }}</td>
              <td class=\"text-end\">{{ return.order_id }}</td>
              <td class=\"text-start\">{{ return.customer }}</td>
              <td class=\"text-start\">{{ return.product }}</td>
              <td class=\"text-start d-none d-lg-table-cell\">{{ return.model }}</td>
              <td class=\"text-start\">{{ return.return_status }}</td>
              <td class=\"text-start d-none d-lg-table-cell\">{{ return.date_added }}</td>
              <td class=\"text-start d-none d-lg-table-cell\">{{ return.date_modified }}</td>
              <td class=\"text-end\"><a href=\"{{ return.edit }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_edit }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-pencil\"></i></a></td>
            </tr>
          {% endfor %}
        {% else %}
          <tr>
            <td class=\"text-center\" colspan=\"10\">{{ text_no_results }}</td>
          </tr>
        {% endif %}
      </tbody>
    </table>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-start\">{{ pagination }}</div>
    <div class=\"col-sm-6 text-end\">{{ results }}</div>
  </div>
</form>", "cp-akis/view//plates/sale/returns_list.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/sale/returns_list.twig");
    }
}
