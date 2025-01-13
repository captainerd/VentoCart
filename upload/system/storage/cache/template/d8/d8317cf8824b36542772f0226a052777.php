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

/* cp-akis/view/default/plates/extension/stripe/payment/stripe.twig */
class __TwigTemplate_4894cd82a3e7f0b5858e8bd4ceeff2b6 extends Template
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
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"pull-right\">
\t\t\t\t<button type=\"submit\" form=\"form-stripe\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i
\t\t\t\t\t class=\"fa fa-save\"></i></button>
\t\t\t\t<a href=\"";
        // line 8
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a>
\t\t\t</div>
\t\t\t<h1>";
        // line 10
        echo ($context["heading_title"] ?? null);
        echo "</h1>
\t\t\t<ul class=\"breadcrumb\">
\t\t\t\t";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 13
            echo "\t\t\t\t<li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 13);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 13);
            echo "</a></li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
\t\t";
        // line 19
        if (($context["error_warning"] ?? null)) {
            // line 20
            echo "\t\t<div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
\t 
\t\t</div>
\t\t";
        }
        // line 24
        echo "\t\t";
        if (($context["success"] ?? null)) {
            // line 25
            echo "\t\t<div class=\"alert alert-success\"><i class=\"fa fa-check-circle\"></i> ";
            echo ($context["success"] ?? null);
            echo "
\t\t\t 
\t\t</div>
\t\t";
        }
        // line 29
        echo "\t\t<div class=\"panel panel-default\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 31
        echo ($context["text_edit"] ?? null);
        echo "</h3>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t<form action=\"";
        // line 34
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-stripe\" class=\"form-horizontal\">
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_environment\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"";
        // line 37
        echo ($context["entry_environment_help"] ?? null);
        echo "\">";
        echo ($context["entry_environment"] ?? null);
        echo "</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_environment\" class=\"form-control\">
\t\t\t\t\t\t\t\t";
        // line 41
        if ((($context["payment_stripe_environment"] ?? null) == "test")) {
            // line 42
            echo "\t\t\t\t\t\t\t\t<option value=\"test\" selected=\"selected\">";
            echo ($context["text_test"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t\t<option value=\"live\">";
            // line 43
            echo ($context["text_live"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t\t";
        } else {
            // line 45
            echo "\t\t\t\t\t\t\t\t<option value=\"test\">";
            echo ($context["text_test"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t\t<option value=\"live\" selected=\"selected\">";
            // line 46
            echo ($context["text_live"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        // line 48
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<small class=\"text-info\">";
        // line 49
        echo ($context["entry_environment_help"] ?? null);
        echo "</small>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_test_public_key\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"";
        // line 54
        echo ($context["entry_test_public_key_help"] ?? null);
        echo "\">";
        echo ($context["entry_test_public_key"] ?? null);
        echo "</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"payment_stripe_test_public_key\" id=\"payment_stripe_test_public_key\" value=\"";
        // line 57
        echo ($context["payment_stripe_test_public_key"] ?? null);
        echo "\"
\t\t\t\t\t\t\t class=\"form-control\" />
\t\t\t\t\t\t\t<small class=\"text-info\">";
        // line 59
        echo ($context["entry_test_public_key_help"] ?? null);
        echo "</small>
\t\t\t\t\t\t\t";
        // line 60
        if (($context["error_test_public_key"] ?? null)) {
            // line 61
            echo "\t\t\t\t\t\t\t<div class=\"text-danger\">";
            echo ($context["error_test_public_key"] ?? null);
            echo "</div>
\t\t\t\t\t\t\t";
        }
        // line 63
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_test_secret_key\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"";
        // line 67
        echo ($context["entry_test_secret_key_help"] ?? null);
        echo "\">";
        echo ($context["entry_test_secret_key"] ?? null);
        echo "</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"payment_stripe_test_secret_key\" id=\"payment_stripe_test_secret_key\" value=\"";
        // line 70
        echo ($context["payment_stripe_test_secret_key"] ?? null);
        echo "\"
\t\t\t\t\t\t\t class=\"form-control\" />
\t\t\t\t\t\t\t<small class=\"text-info\">";
        // line 72
        echo ($context["entry_test_secret_key_help"] ?? null);
        echo "</small>
\t\t\t\t\t\t\t";
        // line 73
        if (($context["error_test_secret_key"] ?? null)) {
            // line 74
            echo "\t\t\t\t\t\t\t<div class=\"text-danger\">";
            echo ($context["error_test_secret_key"] ?? null);
            echo "</div>
\t\t\t\t\t\t\t";
        }
        // line 76
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_live_public_key\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"";
        // line 80
        echo ($context["entry_live_public_key_help"] ?? null);
        echo "\">";
        echo ($context["entry_live_public_key"] ?? null);
        echo "</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"payment_stripe_live_public_key\" id=\"payment_stripe_live_public_key\" value=\"";
        // line 83
        echo ($context["payment_stripe_live_public_key"] ?? null);
        echo "\"
\t\t\t\t\t\t\t class=\"form-control\" />
\t\t\t\t\t\t\t <small class=\"text-info\">";
        // line 85
        echo ($context["entry_live_public_key_help"] ?? null);
        echo "</small>
\t\t\t\t\t\t\t";
        // line 86
        if (($context["error_live_public_key"] ?? null)) {
            // line 87
            echo "\t\t\t\t\t\t\t<div class=\"text-danger\">";
            echo ($context["error_live_public_key"] ?? null);
            echo "</div>
\t\t\t\t\t\t\t";
        }
        // line 89
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_live_secret_key\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"";
        // line 93
        echo ($context["entry_live_secret_key_help"] ?? null);
        echo "\">";
        echo ($context["entry_live_secret_key"] ?? null);
        echo "</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"payment_stripe_live_secret_key\" id=\"payment_stripe_live_secret_key\" value=\"";
        // line 96
        echo ($context["payment_stripe_live_secret_key"] ?? null);
        echo "\"
\t\t\t\t\t\t\t class=\"form-control\" />
\t\t\t\t\t\t\t <small class=\"text-info\">";
        // line 98
        echo ($context["entry_live_secret_key_help"] ?? null);
        echo "</small>
\t\t\t\t\t\t\t";
        // line 99
        if (($context["error_live_secret_key"] ?? null)) {
            // line 100
            echo "\t\t\t\t\t\t\t<div class=\"text-danger\">";
            echo ($context["error_live_secret_key"] ?? null);
            echo "</div>
\t\t\t\t\t\t\t";
        }
        // line 102
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_order_success_status_id\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"";
        // line 106
        echo ($context["entry_order_success_status_help"] ?? null);
        echo "\">";
        echo ($context["entry_order_success_status"] ?? null);
        echo "</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_order_success_status_id\" id=\"payment_stripe_order_success_status_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t";
        // line 110
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 111
            echo "\t\t\t\t\t\t\t\t";
            if (((($__internal_compile_0 = $context["order_status"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["order_status_id"] ?? null) : null) == ($context["payment_stripe_order_success_status_id"] ?? null))) {
                // line 112
                echo "\t\t\t\t\t\t\t\t<option value=\"";
                echo (($__internal_compile_1 = $context["order_status"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["order_status_id"] ?? null) : null);
                echo "\" selected=\"selected\">";
                echo (($__internal_compile_2 = $context["order_status"]) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["name"] ?? null) : null);
                echo "</option>
\t\t\t\t\t\t\t\t";
            } else {
                // line 114
                echo "\t\t\t\t\t\t\t\t<option value=\"";
                echo (($__internal_compile_3 = $context["order_status"]) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["order_status_id"] ?? null) : null);
                echo "\">";
                echo (($__internal_compile_4 = $context["order_status"]) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["name"] ?? null) : null);
                echo "</option>
\t\t\t\t\t\t\t\t";
            }
            // line 116
            echo "\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 117
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<small class=\"text-info\">";
        // line 118
        echo ($context["entry_order_success_status_help"] ?? null);
        echo "</small>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_order_failed_status_id\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"";
        // line 123
        echo ($context["entry_order_failed_status_help"] ?? null);
        echo "\">";
        echo ($context["entry_order_failed_status"] ?? null);
        echo "</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_order_failed_status_id\" id=\"payment_stripe_order_failed_status_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t";
        // line 127
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 128
            echo "\t\t\t\t\t\t\t\t";
            if (((($__internal_compile_5 = $context["order_status"]) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["order_status_id"] ?? null) : null) == ($context["payment_stripe_order_failed_status_id"] ?? null))) {
                // line 129
                echo "\t\t\t\t\t\t\t\t<option value=\"";
                echo (($__internal_compile_6 = $context["order_status"]) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["order_status_id"] ?? null) : null);
                echo "\" selected=\"selected\">";
                echo (($__internal_compile_7 = $context["order_status"]) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["name"] ?? null) : null);
                echo "</option>
\t\t\t\t\t\t\t\t";
            } else {
                // line 131
                echo "\t\t\t\t\t\t\t\t<option value=\"";
                echo (($__internal_compile_8 = $context["order_status"]) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["order_status_id"] ?? null) : null);
                echo "\">";
                echo (($__internal_compile_9 = $context["order_status"]) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["name"] ?? null) : null);
                echo "</option>
\t\t\t\t\t\t\t\t";
            }
            // line 133
            echo "\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 134
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<small class=\"text-info\">";
        // line 135
        echo ($context["entry_order_failed_status_help"] ?? null);
        echo "</small>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_subscription_success_status_id\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"";
        // line 141
        echo ($context["entry_subscription_success_status_help"] ?? null);
        echo "\">";
        echo ($context["entry_subscription_success_status"] ?? null);
        echo "</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_subscription_success_status_id\" id=\"payment_stripe_subscription_success_status_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t";
        // line 145
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subscription_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["subscription_status"]) {
            // line 146
            echo "\t\t\t\t\t\t\t\t\t";
            if (((($__internal_compile_10 = $context["subscription_status"]) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["subscription_status_id"] ?? null) : null) == ($context["payment_stripe_subscription_success_status_id"] ?? null))) {
                // line 147
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo (($__internal_compile_11 = $context["subscription_status"]) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11["subscription_status_id"] ?? null) : null);
                echo "\" selected=\"selected\">";
                echo (($__internal_compile_12 = $context["subscription_status"]) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12["name"] ?? null) : null);
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            } else {
                // line 149
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo (($__internal_compile_13 = $context["subscription_status"]) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13["subscription_status_id"] ?? null) : null);
                echo "\">";
                echo (($__internal_compile_14 = $context["subscription_status"]) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14["name"] ?? null) : null);
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            }
            // line 151
            echo "\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 152
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<small class=\"text-info\">";
        // line 153
        echo ($context["entry_subscription_success_status_help"] ?? null);
        echo "</small>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_subscription_failed_status_id\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"";
        // line 159
        echo ($context["entry_subscription_failed_status_help"] ?? null);
        echo "\">";
        echo ($context["entry_subscription_failed_status"] ?? null);
        echo "</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_subscription_failed_status_id\" id=\"payment_stripe_subscription_failed_status_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t";
        // line 163
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["subscription_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["subscription_status"]) {
            // line 164
            echo "\t\t\t\t\t\t\t\t\t";
            if (((($__internal_compile_15 = $context["subscription_status"]) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15["subscription_status_id"] ?? null) : null) == ($context["payment_stripe_subscription_failed_status_id"] ?? null))) {
                // line 165
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo (($__internal_compile_16 = $context["subscription_status"]) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16["subscription_status_id"] ?? null) : null);
                echo "\" selected=\"selected\">";
                echo (($__internal_compile_17 = $context["subscription_status"]) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17["name"] ?? null) : null);
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            } else {
                // line 167
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo (($__internal_compile_18 = $context["subscription_status"]) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18["subscription_status_id"] ?? null) : null);
                echo "\">";
                echo (($__internal_compile_19 = $context["subscription_status"]) && is_array($__internal_compile_19) || $__internal_compile_19 instanceof ArrayAccess ? ($__internal_compile_19["name"] ?? null) : null);
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            }
            // line 169
            echo "\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subscription_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 170
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<small class=\"text-info\">";
        // line 171
        echo ($context["entry_subscription_failed_status_help"] ?? null);
        echo "</small>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_status\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"";
        // line 179
        echo ($context["entry_status_help"] ?? null);
        echo "\">";
        echo ($context["entry_status"] ?? null);
        echo "</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_status\" class=\"form-control\">
\t\t\t\t\t\t\t\t";
        // line 183
        if (($context["payment_stripe_status"] ?? null)) {
            // line 184
            echo "\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t\t<option value=\"0\">";
            // line 185
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t\t";
        } else {
            // line 187
            echo "\t\t\t\t\t\t\t\t<option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 188
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        // line 190
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_debug\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"";
        // line 195
        echo ($context["entry_debug_help"] ?? null);
        echo "\">";
        echo ($context["entry_debug"] ?? null);
        echo "</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_debug\" class=\"form-control\">
\t\t\t\t\t\t\t\t";
        // line 199
        if (($context["payment_stripe_debug"] ?? null)) {
            // line 200
            echo "\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t\t<option value=\"0\">";
            // line 201
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t\t";
        } else {
            // line 203
            echo "\t\t\t\t\t\t\t\t<option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 204
            echo ($context["text_disabled"] ?? null);
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        // line 206
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"payment_stripe_sort_order\">";
        // line 210
        echo ($context["entry_sort_order"] ?? null);
        echo "</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"payment_stripe_sort_order\" value=\"";
        // line 212
        echo ($context["payment_stripe_sort_order"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_sort_order"] ?? null);
        echo "\"
\t\t\t\t\t\t\t id=\"payment_stripe_sort_order\" class=\"form-control\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
        // line 221
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/extension/stripe/payment/stripe.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  582 => 221,  568 => 212,  563 => 210,  557 => 206,  552 => 204,  547 => 203,  542 => 201,  537 => 200,  535 => 199,  526 => 195,  519 => 190,  514 => 188,  509 => 187,  504 => 185,  499 => 184,  497 => 183,  488 => 179,  477 => 171,  474 => 170,  468 => 169,  460 => 167,  452 => 165,  449 => 164,  445 => 163,  436 => 159,  427 => 153,  424 => 152,  418 => 151,  410 => 149,  402 => 147,  399 => 146,  395 => 145,  386 => 141,  377 => 135,  374 => 134,  368 => 133,  360 => 131,  352 => 129,  349 => 128,  345 => 127,  336 => 123,  328 => 118,  325 => 117,  319 => 116,  311 => 114,  303 => 112,  300 => 111,  296 => 110,  287 => 106,  281 => 102,  275 => 100,  273 => 99,  269 => 98,  264 => 96,  256 => 93,  250 => 89,  244 => 87,  242 => 86,  238 => 85,  233 => 83,  225 => 80,  219 => 76,  213 => 74,  211 => 73,  207 => 72,  202 => 70,  194 => 67,  188 => 63,  182 => 61,  180 => 60,  176 => 59,  171 => 57,  163 => 54,  155 => 49,  152 => 48,  147 => 46,  142 => 45,  137 => 43,  132 => 42,  130 => 41,  121 => 37,  115 => 34,  109 => 31,  105 => 29,  97 => 25,  94 => 24,  86 => 20,  84 => 19,  78 => 15,  67 => 13,  63 => 12,  58 => 10,  51 => 8,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
\t<div class=\"page-header\">
\t\t<div class=\"container-fluid\">
\t\t\t<div class=\"pull-right\">
\t\t\t\t<button type=\"submit\" form=\"form-stripe\" data-toggle=\"tooltip\" title=\"{{ button_save }}\" class=\"btn btn-primary\"><i
\t\t\t\t\t class=\"fa fa-save\"></i></button>
\t\t\t\t<a href=\"{{ cancel }}\" data-toggle=\"tooltip\" title=\"{{ button_cancel }}\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a>
\t\t\t</div>
\t\t\t<h1>{{ heading_title }}</h1>
\t\t\t<ul class=\"breadcrumb\">
\t\t\t\t{% for breadcrumb in breadcrumbs %}
\t\t\t\t<li><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
\t\t\t\t{% endfor %}
\t\t\t</ul>
\t\t</div>
\t</div>
\t<div class=\"container-fluid\">
\t\t{% if error_warning %}
\t\t<div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> {{ error_warning }}
\t 
\t\t</div>
\t\t{% endif %}
\t\t{% if success %}
\t\t<div class=\"alert alert-success\"><i class=\"fa fa-check-circle\"></i> {{ success }}
\t\t\t 
\t\t</div>
\t\t{% endif %}
\t\t<div class=\"panel panel-default\">
\t\t\t<div class=\"panel-heading\">
\t\t\t\t<h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> {{ text_edit }}</h3>
\t\t\t</div>
\t\t\t<div class=\"panel-body\">
\t\t\t\t<form action=\"{{ action }}\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-stripe\" class=\"form-horizontal\">
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_environment\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"{{ entry_environment_help }}\">{{ entry_environment }}</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_environment\" class=\"form-control\">
\t\t\t\t\t\t\t\t{% if payment_stripe_environment == 'test' %}
\t\t\t\t\t\t\t\t<option value=\"test\" selected=\"selected\">{{ text_test }}</option>
\t\t\t\t\t\t\t\t<option value=\"live\">{{ text_live }}</option>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<option value=\"test\">{{ text_test }}</option>
\t\t\t\t\t\t\t\t<option value=\"live\" selected=\"selected\">{{ text_live }}</option>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<small class=\"text-info\">{{ entry_environment_help }}</small>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_test_public_key\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"{{ entry_test_public_key_help }}\">{{ entry_test_public_key }}</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"payment_stripe_test_public_key\" id=\"payment_stripe_test_public_key\" value=\"{{ payment_stripe_test_public_key }}\"
\t\t\t\t\t\t\t class=\"form-control\" />
\t\t\t\t\t\t\t<small class=\"text-info\">{{ entry_test_public_key_help }}</small>
\t\t\t\t\t\t\t{% if error_test_public_key %}
\t\t\t\t\t\t\t<div class=\"text-danger\">{{ error_test_public_key }}</div>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_test_secret_key\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"{{ entry_test_secret_key_help }}\">{{ entry_test_secret_key }}</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"payment_stripe_test_secret_key\" id=\"payment_stripe_test_secret_key\" value=\"{{ payment_stripe_test_secret_key }}\"
\t\t\t\t\t\t\t class=\"form-control\" />
\t\t\t\t\t\t\t<small class=\"text-info\">{{ entry_test_secret_key_help }}</small>
\t\t\t\t\t\t\t{% if error_test_secret_key %}
\t\t\t\t\t\t\t<div class=\"text-danger\">{{ error_test_secret_key }}</div>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_live_public_key\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"{{ entry_live_public_key_help }}\">{{ entry_live_public_key }}</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"payment_stripe_live_public_key\" id=\"payment_stripe_live_public_key\" value=\"{{ payment_stripe_live_public_key }}\"
\t\t\t\t\t\t\t class=\"form-control\" />
\t\t\t\t\t\t\t <small class=\"text-info\">{{ entry_live_public_key_help }}</small>
\t\t\t\t\t\t\t{% if error_live_public_key %}
\t\t\t\t\t\t\t<div class=\"text-danger\">{{ error_live_public_key }}</div>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_live_secret_key\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"{{ entry_live_secret_key_help }}\">{{ entry_live_secret_key }}</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"payment_stripe_live_secret_key\" id=\"payment_stripe_live_secret_key\" value=\"{{ payment_stripe_live_secret_key }}\"
\t\t\t\t\t\t\t class=\"form-control\" />
\t\t\t\t\t\t\t <small class=\"text-info\">{{ entry_live_secret_key_help }}</small>
\t\t\t\t\t\t\t{% if error_live_secret_key %}
\t\t\t\t\t\t\t<div class=\"text-danger\">{{ error_live_secret_key }}</div>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_order_success_status_id\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"{{ entry_order_success_status_help }}\">{{ entry_order_success_status }}</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_order_success_status_id\" id=\"payment_stripe_order_success_status_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t{% for order_status in order_statuses %}
\t\t\t\t\t\t\t\t{% if order_status['order_status_id'] == payment_stripe_order_success_status_id %}
\t\t\t\t\t\t\t\t<option value=\"{{ order_status['order_status_id'] }}\" selected=\"selected\">{{ order_status['name'] }}</option>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<option value=\"{{ order_status['order_status_id'] }}\">{{ order_status['name'] }}</option>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<small class=\"text-info\">{{ entry_order_success_status_help }}</small>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_order_failed_status_id\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"{{ entry_order_failed_status_help }}\">{{ entry_order_failed_status }}</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_order_failed_status_id\" id=\"payment_stripe_order_failed_status_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t{% for order_status in order_statuses %}
\t\t\t\t\t\t\t\t{% if order_status['order_status_id'] == payment_stripe_order_failed_status_id %}
\t\t\t\t\t\t\t\t<option value=\"{{ order_status['order_status_id'] }}\" selected=\"selected\">{{ order_status['name'] }}</option>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<option value=\"{{ order_status['order_status_id'] }}\">{{ order_status['name'] }}</option>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<small class=\"text-info\">{{ entry_order_failed_status_help }}</small>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_subscription_success_status_id\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"{{ entry_subscription_success_status_help }}\">{{ entry_subscription_success_status }}</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_subscription_success_status_id\" id=\"payment_stripe_subscription_success_status_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t{% for subscription_status in subscription_statuses %}
\t\t\t\t\t\t\t\t\t{% if subscription_status['subscription_status_id'] == payment_stripe_subscription_success_status_id %}
\t\t\t\t\t\t\t\t\t\t<option value=\"{{ subscription_status['subscription_status_id'] }}\" selected=\"selected\">{{ subscription_status['name'] }}</option>
\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t<option value=\"{{ subscription_status['subscription_status_id'] }}\">{{ subscription_status['name'] }}</option>
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<small class=\"text-info\">{{ entry_subscription_success_status_help }}</small>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_subscription_failed_status_id\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"{{ entry_subscription_failed_status_help }}\">{{ entry_subscription_failed_status }}</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_subscription_failed_status_id\" id=\"payment_stripe_subscription_failed_status_id\" class=\"form-control\">
\t\t\t\t\t\t\t\t{% for subscription_status in subscription_statuses %}
\t\t\t\t\t\t\t\t\t{% if subscription_status['subscription_status_id'] == payment_stripe_subscription_failed_status_id %}
\t\t\t\t\t\t\t\t\t\t<option value=\"{{ subscription_status['subscription_status_id'] }}\" selected=\"selected\">{{ subscription_status['name'] }}</option>
\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t<option value=\"{{ subscription_status['subscription_status_id'] }}\">{{ subscription_status['name'] }}</option>
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<small class=\"text-info\">{{ entry_subscription_failed_status_help }}</small>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_status\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"{{ entry_status_help }}\">{{ entry_status }}</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_status\" class=\"form-control\">
\t\t\t\t\t\t\t\t{% if payment_stripe_status %}
\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">{{ text_enabled }}</option>
\t\t\t\t\t\t\t\t<option value=\"0\">{{ text_disabled }}</option>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<option value=\"1\">{{ text_enabled }}</option>
\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">{{ text_disabled }}</option>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group required\">
\t\t\t\t\t\t<label class=\"control-label col-sm-3\" for=\"payment_stripe_debug\">
\t\t\t\t\t\t\t<span data-toggle=\"tooltip\" title=\"{{ entry_debug_help }}\">{{ entry_debug }}</span>
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<select name=\"payment_stripe_debug\" class=\"form-control\">
\t\t\t\t\t\t\t\t{% if payment_stripe_debug %}
\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">{{ text_enabled }}</option>
\t\t\t\t\t\t\t\t<option value=\"0\">{{ text_disabled }}</option>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<option value=\"1\">{{ text_enabled }}</option>
\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">{{ text_disabled }}</option>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<label class=\"col-sm-3 control-label\" for=\"payment_stripe_sort_order\">{{ entry_sort_order }}</label>
\t\t\t\t\t\t<div class=\"col-sm-9\">
\t\t\t\t\t\t\t<input type=\"text\" name=\"payment_stripe_sort_order\" value=\"{{ payment_stripe_sort_order }}\" placeholder=\"{{ entry_sort_order }}\"
\t\t\t\t\t\t\t id=\"payment_stripe_sort_order\" class=\"form-control\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
{{ footer }}", "cp-akis/view/default/plates/extension/stripe/payment/stripe.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/extension/stripe/payment/stripe.twig");
    }
}
