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

/* cp-akis/view//plates/sale/order_info.twig */
class __TwigTemplate_5e8762efe853a3dfba584eac5a3749ae extends Template
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
      <div class=\"float-end\"><a href=\"";
        // line 5
        echo ($context["invoice"] ?? null);
        echo "\" target=\"_blank\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_invoice_print"] ?? null);
        echo "\" class=\"btn btn-info";
        if ( !($context["order_id"] ?? null)) {
            echo " disabled";
        }
        echo "\"><i class=\"fa-solid fa-print\"></i></a> <a href=\"";
        echo ($context["shipping"] ?? null);
        echo "\" target=\"_blank\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_shipping_print"] ?? null);
        echo "\" class=\"btn btn-info";
        if ( !($context["shipping_code"] ?? null)) {
            echo " disabled";
        }
        echo "\"><i class=\"fa-solid fa-truck\"></i></a> <a href=\"";
        echo ($context["back"] ?? null);
        echo "\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_back"] ?? null);
        echo "\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a></div>
      <h1>";
        // line 6
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 9
            echo "          <li class=\"breadcrumb-item\"><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 9);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 9);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card mb-3\">
      <div class=\"card-header\"><i class=\"fa-solid fa-info-circle\"></i> ";
        // line 16
        echo ($context["text_form"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <div class=\"row row-cols-1 row-cols-sm-1 row-cols-md-3 row-cols-xl-3\">

          <div class=\"col\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>";
        // line 23
        echo ($context["text_invoice"] ?? null);
        echo "</strong>
                  <br/>
                  <span id=\"invoice-value\">";
        // line 25
        echo ($context["invoice_prefix"] ?? null);
        echo ($context["invoice_no"] ?? null);
        echo "</span>
                </div>
              </div>
              ";
        // line 28
        if ( !($context["invoice_no"] ?? null)) {
            // line 29
            echo "                <button type=\"button\" id=\"button-invoice\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_generate"] ?? null);
            echo "\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>
              ";
        } else {
            // line 31
            echo "                <button type=\"button\" disabled=\"disabled\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>
              ";
        }
        // line 33
        echo "            </div>
          </div>

          <div class=\"col\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>";
        // line 39
        echo ($context["text_customer"] ?? null);
        echo "</strong>
                  <br/>
                  ";
        // line 41
        if (($context["customer_id"] ?? null)) {
            // line 42
            echo "                    <div id=\"customer-value\"><a href=\"index.php?route=customer/customer.form&user_token=";
            echo ($context["user_token"] ?? null);
            echo "&customer_id=";
            echo ($context["customer_id"] ?? null);
            echo "\" target=\"_blank\">";
            echo ($context["firstname"] ?? null);
            echo " ";
            echo ($context["lastname"] ?? null);
            echo "</a></div>
                  ";
        } else {
            // line 44
            echo "                    <div id=\"customer-value\">";
            echo ($context["firstname"] ?? null);
            echo " ";
            echo ($context["lastname"] ?? null);
            echo "</div>
                  ";
        }
        // line 46
        echo "                </div>
              </div>
              <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-customer\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>
            </div>
          </div>

          <div class=\"col\">
            <div class=\"form-control p-0 border rounded mb-3\">
              <div class=\"lead p-2\"><strong>";
        // line 54
        echo ($context["text_date_added"] ?? null);
        echo "</strong>
                <br/>
                ";
        // line 56
        echo ($context["date_added"] ?? null);
        echo "
              </div>
            </div>
          </div>
        </div>

        <table class=\"table table-bordered\">
          <thead>
            <tr>
              <td class=\"text-start\">";
        // line 65
        echo ($context["column_product"] ?? null);
        echo "</td>
              <td class=\"text-start\">";
        // line 66
        echo ($context["column_sku"] ?? null);
        echo "</td>
              <td class=\"text-end\">";
        // line 67
        echo ($context["column_quantity"] ?? null);
        echo "</td>
              <td class=\"text-end\">";
        // line 68
        echo ($context["column_price"] ?? null);
        echo "</td>
              <td class=\"text-end\">";
        // line 69
        echo ($context["column_total"] ?? null);
        echo "</td>
              <td class=\"text-end\" style=\"width: 1px;\">";
        // line 70
        echo ($context["column_action"] ?? null);
        echo "</td>
            </tr>
          </thead>

          <tbody id=\"order-products\">
          
          <tr><td>  <div style=\"min-height: 300px !important;\" class=\"d-flex m-3 mt-10 justify-content-center my-3\">
        <div class=\"spinner-border text-primary\" role=\"status\">
            <span class=\"visually-hidden\">Loading...</span>
        </div>
    </div></td></tr>
          </tbody>
       
          <tfoot>
            <tr>
              <td colspan=\"5\"></td>
              <td class=\"text-end\"><button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-cart\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
            </tr>
          </tfoot>
        </table>

        <div id=\"collapse-order\"  >
          <div class=\"row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4\">

            <div class=\"col\">
              <form id=\"form-store\" class=\"mb-3\">
                <div class=\"form-floating\">
                  <select name=\"store_id\" id=\"input-store\" class=\"form-select\">
                    ";
        // line 98
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
            // line 99
            echo "                      <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 99);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["store"], "store_id", [], "any", false, false, false, 99) == ($context["store_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 99);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        echo "                  </select> <label for=\"input-store\">";
        echo ($context["entry_store"] ?? null);
        echo "</label>
                </div>
              </form>
            </div>

            <div class=\"col\">
              <form id=\"form-language\" class=\"mb-3\">
                <div class=\"form-floating\">
                  <select name=\"language\" id=\"input-language\" class=\"form-select\">
                    ";
        // line 110
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 111
            echo "                      <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 111);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 111) == ($context["language_code"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 111);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "                  </select> <label for=\"input-language\">";
        echo ($context["entry_language"] ?? null);
        echo "</label>
                </div>
              </form>
            </div>

            <div class=\"col\">
              <form id=\"form-currency\" class=\"mb-3\">
                <div class=\"form-floating\">
                  <select name=\"currency\" id=\"input-currency\" class=\"form-select\">
                    ";
        // line 122
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["currencies"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
            // line 123
            echo "                      <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 123);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 123) == ($context["currency_code"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["currency"], "title", [], "any", false, false, false, 123);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 125
        echo "                  </select> <label for=\"input-currency\">";
        echo ($context["entry_currency"] ?? null);
        echo "</label>
                </div>
              </form>
            </div>

            <div class=\"col\">
              <form id=\"form-coupon\" class=\"mb-3\">
                <div class=\"input-group form-floating\">
                  <input type=\"text\" name=\"coupon\" value=\"";
        // line 133
        echo ($context["total_coupon"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_coupon"] ?? null);
        echo "\" id=\"input-coupon\" class=\"form-control\"/> <label for=\"input-coupon\">";
        echo ($context["entry_coupon"] ?? null);
        echo "</label>
                  <button type=\"submit\" id=\"button-coupon\" data-bs-toogle=\"tooltip\" title=\"";
        // line 134
        echo ($context["button_apply"] ?? null);
        echo "\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-check\"></i></button>
                </div>
              </form>
            </div>

  

            <div class=\"col\">
              <form id=\"form-reward\" class=\"mb-3\">
                <div class=\"input-group form-floating\">
                  <input type=\"text\" name=\"reward\" value=\"";
        // line 144
        echo ($context["total_reward"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_reward"] ?? null);
        echo "\" id=\"input-reward\" class=\"form-control\"/> <label for=\"input-reward\">";
        echo ($context["entry_reward"] ?? null);
        echo "</label>
                  <button type=\"submit\" id=\"button-reward\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-check\"></i></button>
                </div>
              </form>
            </div>

            <div class=\"col\">
              <div class=\"input-group\">
                <div class=\"form-control border rounded-start\">
                  <div class=\"lead p-0\"><strong>";
        // line 153
        echo ($context["text_reward"] ?? null);
        echo "</strong>
                    <br/>
                    <div id=\"reward-value\">";
        // line 155
        echo ($context["points"] ?? null);
        echo "</div>
                  </div>
                </div>
                ";
        // line 158
        if ( !($context["reward_total"] ?? null)) {
            // line 159
            echo "                  <button type=\"button\" id=\"button-reward-add\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_reward_add"] ?? null);
            echo "\" class=\"btn btn-success\"";
            if (( !($context["customer_id"] ?? null) ||  !($context["points"] ?? null))) {
                echo " disabled";
            }
            echo "><i class=\"fa-solid fa-plus-circle\"></i></button>
                ";
        } else {
            // line 161
            echo "                  <button type=\"button\" id=\"button-reward-remove\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_reward_remove"] ?? null);
            echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
                ";
        }
        // line 163
        echo "              </div>
            </div>

            <div class=\"col\">
              <div class=\"input-group mb-3\">
                <div class=\"form-control border rounded-start\">
                  <div class=\"lead\"><strong>";
        // line 169
        echo ($context["text_affiliate"] ?? null);
        echo "</strong>
                    <br/>
                    ";
        // line 171
        if (($context["affiliate_id"] ?? null)) {
            // line 172
            echo "                      <div id=\"affiliate-value\"><a href=\"index.php?route=marketing/affiliate.form&user_token=";
            echo ($context["user_token"] ?? null);
            echo "&customer_id=";
            echo ($context["affiliate_id"] ?? null);
            echo "\" target=\"_blank\">";
            echo ($context["affiliate"] ?? null);
            echo "</a></div>
                    ";
        } else {
            // line 174
            echo "                      <div id=\"affiliate-value\">&nbsp;</div>
                    ";
        }
        // line 176
        echo "                  </div>
                </div>
                <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-affiliate\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>
              </div>
            </div>

            <div class=\"col\">
              <div class=\"input-group mb-3\">
                <div class=\"form-control border rounded-start\">
                  <div class=\"lead\"><strong>";
        // line 185
        echo ($context["text_commission"] ?? null);
        echo "</strong>
                    <br/>
                    ";
        // line 187
        if (($context["commission"] ?? null)) {
            // line 188
            echo "                      <div id=\"commission-value\">";
            echo ($context["commission"] ?? null);
            echo "</div>
                    ";
        } else {
            // line 190
            echo "                      <div id=\"commission-value\">&nbsp;</div>
                    ";
        }
        // line 192
        echo "                  </div>
                </div>
                ";
        // line 194
        if ( !($context["commission_total"] ?? null)) {
            // line 195
            echo "                  <button type=\"button\" id=\"button-commission-add\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_commission_add"] ?? null);
            echo "\" class=\"btn btn-success\"";
            if ( !($context["affiliate_id"] ?? null)) {
                echo " disabled";
            }
            echo "><i class=\"fa-solid fa-plus-circle\"></i></button>
                ";
        } else {
            // line 197
            echo "                  <button type=\"button\" id=\"button-commission-remove\" data-bs-toggle=\"tooltip\" title=\"";
            echo ($context["button_commission_remove"] ?? null);
            echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
                ";
        }
        // line 199
        echo "              </div>
            </div>

          </div>
        </div>
 
        <div class=\"row\">
          <div class=\"col-md\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>";
        // line 209
        echo ($context["text_payment_address"] ?? null);
        echo "</strong>
                  <br/>
                  <div id=\"payment-address-value\">
                    ";
        // line 212
        if (($context["payment_firstname"] ?? null)) {
            // line 213
            echo "                      ";
            echo ($context["payment_firstname"] ?? null);
            echo " ";
            echo ($context["payment_lastname"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 216
        echo "
                    ";
        // line 217
        if (($context["payment_company"] ?? null)) {
            // line 218
            echo "                      ";
            echo ($context["payment_company"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 221
        echo "
                    ";
        // line 222
        if (($context["payment_address_1"] ?? null)) {
            // line 223
            echo "                      ";
            echo ($context["payment_address_1"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 226
        echo "
                    ";
        // line 227
        if (($context["payment_phone"] ?? null)) {
            // line 228
            echo "                      ";
            echo ($context["payment_phone"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 231
        echo "
                    ";
        // line 232
        if (($context["payment_city"] ?? null)) {
            // line 233
            echo "                      ";
            echo ($context["payment_city"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 236
        echo "
                    ";
        // line 237
        if (($context["payment_postcode"] ?? null)) {
            // line 238
            echo "                      ";
            echo ($context["payment_postcode"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 241
        echo "
                    ";
        // line 242
        if (($context["payment_zone"] ?? null)) {
            // line 243
            echo "                      ";
            echo ($context["payment_zone"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 246
        echo "                    ";
        if (($context["payment_country"] ?? null)) {
            // line 247
            echo "                      ";
            echo ($context["payment_country"] ?? null);
            echo "
                    ";
        }
        // line 249
        echo "                  </div>
                </div>
              </div>
              <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-payment-address\" class=\"btn btn-outline-primary float-end\"><i class=\"fa-solid fa-cog\"></i></button>
            </div>
          </div>

          <div id=\"shipping-address\" class=\"col";
        // line 256
        if ( !($context["shipping_method"] ?? null)) {
            echo " d-none";
        }
        echo "\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>";
        // line 259
        echo ($context["text_shipping_address"] ?? null);
        echo "</strong>
                  <br/>
                  <div id=\"shipping-address-value\">
                    ";
        // line 262
        if (($context["shipping_firstname"] ?? null)) {
            // line 263
            echo "                      ";
            echo ($context["shipping_firstname"] ?? null);
            echo " ";
            echo ($context["shipping_lastname"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 266
        echo "                    ";
        if (($context["shipping_company"] ?? null)) {
            // line 267
            echo "                      ";
            echo ($context["shipping_company"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 270
        echo "                    ";
        if (($context["shipping_address_1"] ?? null)) {
            // line 271
            echo "                      ";
            echo ($context["shipping_address_1"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 274
        echo "                    ";
        if (($context["shipping_phone"] ?? null)) {
            // line 275
            echo "                      ";
            echo ($context["shipping_phone"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 278
        echo "                    ";
        if (($context["shipping_city"] ?? null)) {
            // line 279
            echo "                      ";
            echo ($context["shipping_city"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 282
        echo "                    ";
        if (($context["shipping_postcode"] ?? null)) {
            // line 283
            echo "                      ";
            echo ($context["shipping_postcode"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 286
        echo "                    ";
        if (($context["shipping_zone"] ?? null)) {
            // line 287
            echo "                      ";
            echo ($context["shipping_zone"] ?? null);
            echo "
                      <br/>
                    ";
        }
        // line 290
        echo "                    ";
        if (($context["shipping_country"] ?? null)) {
            // line 291
            echo "                      ";
            echo ($context["shipping_country"] ?? null);
            echo "
                    ";
        }
        // line 293
        echo "                  </div>
                </div>
              </div>
              <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-shipping-address\" class=\"btn btn-outline-primary float-end\"><i class=\"fa-solid fa-cog\"></i></button>
            </div>
          </div>

        </div>
        <div class=\"row\">

          <div id=\"shipping-method\" class=\"col-md";
        // line 303
        if ( !($context["shipping_method"] ?? null)) {
            echo " d-none";
        }
        echo "\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>";
        // line 306
        echo ($context["text_shipping_method"] ?? null);
        echo "</strong>
                  <br/>
                  ";
        // line 308
        if (($context["shipping_method"] ?? null)) {
            // line 309
            echo "                    <span id=\"shipping-method-value\">";
            echo ($context["shipping_method"] ?? null);
            echo "</span>
                  ";
        } else {
            // line 311
            echo "                    <span id=\"shipping-method-value\"></span>
                  ";
        }
        // line 313
        echo "                </div>
              </div>
              <input type=\"hidden\" name=\"shipping_code\" value=\"";
        // line 315
        echo ($context["shipping_code"] ?? null);
        echo "\" id=\"input-shipping-code\"/>
              <button type=\"button\" id=\"button-shipping-methods\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>
            </div>
          </div>

          <div id=\"payment-method\" class=\"col-md\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>";
        // line 323
        echo ($context["text_payment_method"] ?? null);
        echo "</strong>
                  <br/>
                  ";
        // line 325
        if (($context["payment_method"] ?? null)) {
            // line 326
            echo "                    <span id=\"payment-method-value\">";
            echo ($context["payment_method"] ?? null);
            echo "</span>
                  ";
        } else {
            // line 328
            echo "                    <span id=\"payment-method-value\"></span>
                  ";
        }
        // line 330
        echo "                </div>
              </div>
              <input type=\"hidden\" name=\"payment_code\" value=\"";
        // line 332
        echo ($context["payment_code"] ?? null);
        echo "\" id=\"input-payment-code\"/>
              <button type=\"button\" id=\"button-payment-methods\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>
            </div>
          </div>

        </div>

        <div class=\"row\">
          <div class=\"col\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>";
        // line 343
        echo ($context["text_comment"] ?? null);
        echo "</strong>
                  <br/>
                  ";
        // line 345
        if (($context["comment"] ?? null)) {
            // line 346
            echo "                    <span id=\"comment-value\">";
            echo ($context["comment"] ?? null);
            echo "</span>
                  ";
        } else {
            // line 348
            echo "                    <span id=\"comment-value\"></span>
                  ";
        }
        // line 350
        echo "                </div>
              </div>
              <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-comment\" class=\"btn btn-outline-primary float-end\"><i class=\"fa-solid fa-cog\"></i></button>
            </div>
          </div>
        </div>

        <table class=\"table table-bordered\">
          <tbody id=\"order-totals\">
            ";
        // line 359
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_totals"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_total"]) {
            // line 360
            echo "              <tr>
                <td class=\"text-end\"><strong>";
            // line 361
            echo twig_get_attribute($this->env, $this->source, $context["order_total"], "title", [], "any", false, false, false, 361);
            echo "</strong></td>
                <td class=\"text-end\" style=\"width: 1px;\">";
            // line 362
            echo twig_get_attribute($this->env, $this->source, $context["order_total"], "text", [], "any", false, false, false, 362);
            echo "</td>
              </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_total'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 365
        echo "          </tbody>
        </table>
        <div class=\"text-end\">
          <button type=\"button\" id=\"button-refresh\" data-bs-toggle=\"tooltip\" title=\"";
        // line 368
        echo ($context["button_refresh"] ?? null);
        echo "\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-rotate\"></i></button>
          <button type=\"button\" id=\"button-confirm\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> ";
        // line 369
        echo ($context["button_confirm"] ?? null);
        echo "</button>
        </div>
      </div>
    </div>

    <div class=\"card mb-3\">
      <div class=\"card-header\"><i class=\"fa-solid fa-comment\"></i> ";
        // line 375
        echo ($context["text_history"] ?? null);
        echo "</div>
      <div class=\"card-body\">
        <ul class=\"nav nav-tabs\">
          <li class=\"nav-item\"><a href=\"#tab-history\" data-bs-toggle=\"tab\" class=\"nav-link active\">";
        // line 378
        echo ($context["tab_history"] ?? null);
        echo "</a></li>
          <li class=\"nav-item\"><a href=\"#tab-additional\" data-bs-toggle=\"tab\" class=\"nav-link\">";
        // line 379
        echo ($context["tab_additional"] ?? null);
        echo "</a></li>
          ";
        // line 380
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tabs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tab"]) {
            // line 381
            echo "            <li class=\"nav-item\"><a href=\"#tab-";
            echo twig_get_attribute($this->env, $this->source, $context["tab"], "code", [], "any", false, false, false, 381);
            echo "\" data-bs-toggle=\"tab\" class=\"nav-link\">";
            echo twig_get_attribute($this->env, $this->source, $context["tab"], "title", [], "any", false, false, false, 381);
            echo "</a></li>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 383
        echo "        </ul>
        <div class=\"tab-content\">

          <div id=\"tab-history\" class=\"tab-pane active\">
            <fieldset>
              <legend>";
        // line 388
        echo ($context["text_history"] ?? null);
        echo "</legend>
              <div id=\"history\">";
        // line 389
        echo ($context["history"] ?? null);
        echo "</div>
            </fieldset>
            <form id=\"form-history\">
              <fieldset>
                <legend>";
        // line 393
        echo ($context["text_history_add"] ?? null);
        echo "</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-order-status\" class=\"col-sm-2 col-form-label\">";
        // line 395
        echo ($context["entry_order_status"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"order_status_id\" id=\"input-order-status\" class=\"form-select\">
                      ";
        // line 398
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 399
            echo "                        <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 399);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 399) == ($context["order_status_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 399);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 401
        echo "                    </select>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 405
        echo ($context["entry_override"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"override\" value=\"0\"/>
                      <input type=\"checkbox\" name=\"override\" value=\"1\" id=\"input-override\" class=\"form-check-input\">
                    </div>
                    <div class=\"form-text\">";
        // line 411
        echo ($context["help_override"] ?? null);
        echo "</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">";
        // line 415
        echo ($context["entry_notify"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"notify\" value=\"0\"/>
                      <input type=\"checkbox\" name=\"notify\" value=\"1\" id=\"input-notify\" class=\"form-check-input\"/>
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-history\" class=\"col-sm-2 col-form-label\">";
        // line 424
        echo ($context["entry_comment"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"comment\" rows=\"8\" placeholder=\"";
        // line 426
        echo ($context["entry_comment"] ?? null);
        echo "\" id=\"input-history\" class=\"form-control\"></textarea>
                  </div>
                </div>
                <div class=\"text-end\">
                  <button type=\"submit\" id=\"button-history\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i> ";
        // line 430
        echo ($context["button_history_add"] ?? null);
        echo "</button>
                </div>
              </fieldset>
              <input type=\"hidden\" name=\"order_id\" value=\"";
        // line 433
        echo ($context["order_id"] ?? null);
        echo "\" id=\"input-order-id\"/>
            </form>
          </div>

          <div id=\"tab-additional\" class=\"tab-pane\">
            <div class=\"table-responsive\">
              <table class=\"table table-bordered\">
                <thead>
                  <tr>
                    <td colspan=\"2\">";
        // line 442
        echo ($context["text_browser"] ?? null);
        echo "</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>";
        // line 447
        echo ($context["text_ip"] ?? null);
        echo "</td>
                    <td>";
        // line 448
        echo ($context["ip"] ?? null);
        echo "</td>
                  </tr>
                  ";
        // line 450
        if (($context["forwarded_ip"] ?? null)) {
            // line 451
            echo "                    <tr>
                      <td>";
            // line 452
            echo ($context["text_forwarded_ip"] ?? null);
            echo "</td>
                      <td>";
            // line 453
            echo ($context["forwarded_ip"] ?? null);
            echo "</td>
                    </tr>
                  ";
        }
        // line 456
        echo "                  <tr>
                    <td>";
        // line 457
        echo ($context["text_user_agent"] ?? null);
        echo "</td>
                    <td>";
        // line 458
        echo ($context["user_agent"] ?? null);
        echo "</td>
                  </tr>
                  <tr>
                    <td>";
        // line 461
        echo ($context["text_accept_language"] ?? null);
        echo "</td>
                    <td>";
        // line 462
        echo ($context["accept_language"] ?? null);
        echo "</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          ";
        // line 468
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tabs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tab"]) {
            // line 469
            echo "            <div id=\"tab-";
            echo twig_get_attribute($this->env, $this->source, $context["tab"], "code", [], "any", false, false, false, 469);
            echo "\" class=\"tab-pane\">";
            echo twig_get_attribute($this->env, $this->source, $context["tab"], "content", [], "any", false, false, false, 469);
            echo "</div>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 471
        echo "        </div>
      </div>
    </div>
  </div>
</div>

<div id=\"modal-customer\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">";
        // line 481
        echo ($context["text_customer"] ?? null);
        echo "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-customer\">
          <div class=\"mb-3\">
            <label for=\"input-customer\" class=\"form-label\">";
        // line 487
        echo ($context["entry_customer"] ?? null);
        echo "</label>
            <div class=\"input-group\">
              <input type=\"text\" name=\"customer\" value=\"";
        // line 489
        echo ($context["firstname"] ?? null);
        echo " ";
        echo ($context["lastname"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_customer"] ?? null);
        echo "\" id=\"input-customer\" data-oc-target=\"autocomplete-customer\" class=\"form-control\" autocomplete=\"off\"/> <a href=\"";
        echo ($context["customer_add"] ?? null);
        echo "\" target=\"_blank\" data-bs-toggle=\"tooltip\" title=\"";
        echo ($context["button_customer_add"] ?? null);
        echo "\" class=\"btn btn-outline-secondary\"><i class=\"fa-solid fa-user-plus\"></i></a>
            </div>
            <input type=\"hidden\" name=\"customer_id\" value=\"";
        // line 491
        echo ($context["customer_id"] ?? null);
        echo "\" id=\"input-customer-id\"/>
            <ul id=\"autocomplete-customer\" class=\"dropdown-menu\"></ul>
          </div>
          <div class=\"mb-3\">
            <label for=\"input-customer-group\" class=\"form-label\">";
        // line 495
        echo ($context["entry_customer_group"] ?? null);
        echo "</label>
            <select name=\"customer_group_id\" id=\"input-customer-group\" class=\"form-select\">
              ";
        // line 497
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 498
            echo "                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 498);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 498) == ($context["customer_group_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 498);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 500
        echo "            </select>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-firstname\" class=\"form-label\">";
        // line 503
        echo ($context["entry_firstname"] ?? null);
        echo "</label>
            <input type=\"text\" name=\"firstname\" value=\"";
        // line 504
        echo ($context["firstname"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_firstname"] ?? null);
        echo "\" id=\"input-firstname\" class=\"form-control\"/>
            <div id=\"error-firstname\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-lastname\" class=\"form-label\">";
        // line 508
        echo ($context["entry_lastname"] ?? null);
        echo "</label>
            <input type=\"text\" name=\"lastname\" value=\"";
        // line 509
        echo ($context["lastname"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_lastname"] ?? null);
        echo "\" id=\"input-lastname\" class=\"form-control\"/>
            <div id=\"error-lastname\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-email\" class=\"form-label\">";
        // line 513
        echo ($context["entry_email"] ?? null);
        echo "</label>
            <div class=\"input-group\">
              <input type=\"text\" name=\"email\" value=\"";
        // line 515
        echo ($context["email"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_email"] ?? null);
        echo "\" id=\"input-email\" class=\"form-control\"/> <a href=\"mailto:";
        echo ($context["email"] ?? null);
        echo "\" class=\"btn btn-outline-secondary\"><i class=\"fa-solid fa-envelope\"></i></a>
            </div>
            <div id=\"error-email\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3";
        // line 519
        if (($context["config_telephone_required"] ?? null)) {
            echo " required";
        }
        echo "\">
            <label for=\"input-telephone\" class=\"form-label\">";
        // line 520
        echo ($context["entry_telephone"] ?? null);
        echo "</label> <input type=\"text\" name=\"telephone\" value=\"";
        echo ($context["telephone"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_telephone"] ?? null);
        echo "\" id=\"input-telephone\" class=\"form-control\"/>
            <div id=\"error-telephone\" class=\"invalid-feedback\"></div>
          </div>
          ";
        // line 523
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["custom_fields"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
            // line 524
            echo "            ";
            if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "location", [], "any", false, false, false, 524) == "account")) {
                // line 525
                echo "
              ";
                // line 526
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 526) == "select")) {
                    // line 527
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 527);
                    echo "\">
                  <label for=\"input-custom-field-";
                    // line 528
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 528);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 528);
                    echo "</label> <select name=\"custom_field[";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 528);
                    echo "]\" id=\"input-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 528);
                    echo "\" class=\"form-select\">
                    <option value=\"\">";
                    // line 529
                    echo ($context["text_select"] ?? null);
                    echo "</option>
                    ";
                    // line 530
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_value", [], "any", false, false, false, 530));
                    foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                        // line 531
                        echo "                      <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 531);
                        echo "\"";
                        if (((($__internal_compile_0 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 531)] ?? null) : null) && (twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 531) == (($__internal_compile_1 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 531)] ?? null) : null)))) {
                            echo " selected";
                        }
                        echo ">";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 531);
                        echo "</option>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 533
                    echo "                  </select>
                  <div id=\"error-custom-field-";
                    // line 534
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 534);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 537
                echo "
              ";
                // line 538
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 538) == "radio")) {
                    // line 539
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 539);
                    echo "\">
                  <label class=\"form-label\">";
                    // line 540
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 540);
                    echo "</label>
                  <div id=\"input-custom-field-";
                    // line 541
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 541);
                    echo "\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    ";
                    // line 542
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_value", [], "any", false, false, false, 542));
                    foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                        // line 543
                        echo "                      <div class=\"form-check\">
                        <input type=\"radio\" name=\"custom_field[";
                        // line 544
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 544);
                        echo "]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 544);
                        echo "\" id=\"input-custom-value-";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 544);
                        echo "\" class=\"form-check-input\"";
                        if (((($__internal_compile_2 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 544)] ?? null) : null) && (twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 544) == (($__internal_compile_3 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 544)] ?? null) : null)))) {
                            echo " checked";
                        }
                        echo "/> <label for=\"input-custom-value-";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 544);
                        echo "\" class=\"form-check-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 544);
                        echo "</label>
                      </div>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 547
                    echo "                  </div>
                  <div id=\"error-custom-field-";
                    // line 548
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 548);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 551
                echo "
              ";
                // line 552
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 552) == "checkbox")) {
                    // line 553
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 553);
                    echo "\">
                  <label class=\"form-label\">";
                    // line 554
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 554);
                    echo "</label>
                  <div id=\"input-custom-field-";
                    // line 555
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 555);
                    echo "\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    ";
                    // line 556
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_value", [], "any", false, false, false, 556));
                    foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                        // line 557
                        echo "                      <div class=\"form-check\">
                        <input type=\"checkbox\" name=\"custom_field[";
                        // line 558
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 558);
                        echo "][]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 558);
                        echo "\" id=\"input-custom-value-";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 558);
                        echo "\" class=\"form-check-input\"";
                        if (((($__internal_compile_4 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 558)] ?? null) : null) && twig_in_filter(twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 558), (($__internal_compile_5 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 558)] ?? null) : null)))) {
                            echo " checked";
                        }
                        echo "/> <label for=\"input-custom-value-";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 558);
                        echo "\" class=\"form-check-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 558);
                        echo "</label>
                      </div>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 561
                    echo "                  </div>
                  <div id=\"error-custom-field-";
                    // line 562
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 562);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 565
                echo "
              ";
                // line 566
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 566) == "text")) {
                    // line 567
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 567);
                    echo "\">
                  <label for=\"input-custom-field-";
                    // line 568
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 568);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 568);
                    echo "</label> <input type=\"text\" name=\"custom_field[";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 568);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_6 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 568)] ?? null) : null)) ? ((($__internal_compile_7 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 568)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 568)));
                    echo "\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 568);
                    echo "\" id=\"input-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 568);
                    echo "\" class=\"form-control\"/>
                  <div id=\"error-custom-field-";
                    // line 569
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 569);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 572
                echo "
              ";
                // line 573
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 573) == "textarea")) {
                    // line 574
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 574);
                    echo "\">
                  <label for=\"input-custom-field-";
                    // line 575
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 575);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 575);
                    echo "</label> <textarea name=\"custom_field[";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 575);
                    echo "]\" rows=\"5\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 575);
                    echo "\" id=\"input-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 575);
                    echo "\" class=\"form-control\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 575);
                    echo "</textarea>
                  <div id=\"error-custom-field-";
                    // line 576
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 576);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 579
                echo "
              ";
                // line 580
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 580) == "file")) {
                    // line 581
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 581);
                    echo "\">
                  <label class=\"form-label\">";
                    // line 582
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 582);
                    echo "</label>
                  <div class=\"input-group\">
                    <button type=\"button\" data-oc-toggle=\"upload\" data-oc-url=\"";
                    // line 584
                    echo ($context["upload"] ?? null);
                    echo "\" data-oc-target=\"#input-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 584);
                    echo "\" data-oc-size-max=\"";
                    echo ($context["config_file_max_size"] ?? null);
                    echo "\" data-oc-size-error=\"";
                    echo ($context["error_upload_size"] ?? null);
                    echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-upload\"></i> ";
                    echo ($context["button_upload"] ?? null);
                    echo "</button>
                    <input type=\"text\" name=\"custom_field[";
                    // line 585
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 585);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_8 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 585)] ?? null) : null)) ? ((($__internal_compile_9 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 585)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 585)));
                    echo "\" id=\"input-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 585);
                    echo "\" class=\"form-control\"/>
                    <button type=\"button\" data-oc-toggle=\"download\" data-oc-target=\"#input-custom-field-";
                    // line 586
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 586);
                    echo "\"";
                    if ( !(($__internal_compile_10 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 586)] ?? null) : null)) {
                        echo " disabled";
                    }
                    echo " class=\"btn btn-outline-secondary\"><i class=\"fa-solid fa-download\"></i> ";
                    echo ($context["button_download"] ?? null);
                    echo "</button>
                    <button type=\"button\" data-oc-toggle=\"clear\" data-bs-toggle=\"tooltip\" title=\"";
                    // line 587
                    echo ($context["button_clear"] ?? null);
                    echo "\" data-oc-target=\"#input-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 587);
                    echo "\"";
                    if ( !(($__internal_compile_11 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 587)] ?? null) : null)) {
                        echo " disabled";
                    }
                    echo " class=\"btn btn-outline-danger\"><i class=\"fa-solid fa-eraser\"></i></button>
                  </div>
                  <div id=\"error-custom-field-";
                    // line 589
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 589);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 592
                echo "
              ";
                // line 593
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 593) == "date")) {
                    // line 594
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 594);
                    echo "\">
                  <label for=\"input-custom-field-";
                    // line 595
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 595);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 595);
                    echo "</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[";
                    // line 597
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 597);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_12 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 597)] ?? null) : null)) ? ((($__internal_compile_13 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 597)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 597)));
                    echo "\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 597);
                    echo "\" id=\"input-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 597);
                    echo "\" class=\"form-control date\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-custom-field-";
                    // line 600
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 600);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 603
                echo "
              ";
                // line 604
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 604) == "time")) {
                    // line 605
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 605);
                    echo "\">
                  <label for=\"input-custom-field-";
                    // line 606
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 606);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 606);
                    echo "</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[";
                    // line 608
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 608);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_14 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 608)] ?? null) : null)) ? ((($__internal_compile_15 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 608)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 608)));
                    echo "\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 608);
                    echo "\" id=\"input-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 608);
                    echo "\" class=\"form-control time\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-custom-field-";
                    // line 611
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 611);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 614
                echo "
              ";
                // line 615
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 615) == "datetime")) {
                    // line 616
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 616);
                    echo "\">
                  <label for=\"input-custom-field-";
                    // line 617
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 617);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 617);
                    echo "</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[";
                    // line 619
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 619);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_16 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 619)] ?? null) : null)) ? ((($__internal_compile_17 = ($context["account_custom_field"] ?? null)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 619)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 619)));
                    echo "\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 619);
                    echo "\" id=\"input-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 619);
                    echo "\" class=\"form-control datetime\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-custom-field-";
                    // line 622
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 622);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 625
                echo "
            ";
            }
            // line 627
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 628
        echo "          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-customer\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> ";
        // line 629
        echo ($context["button_save"] ?? null);
        echo "</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-cart\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">";
        // line 640
        echo ($context["text_cart_add"] ?? null);
        echo "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <ul class=\"nav nav-tabs\">
          <li class=\"nav-item\"><a href=\"#tab-product\" data-bs-toggle=\"tab\" class=\"nav-link active\">";
        // line 645
        echo ($context["tab_product"] ?? null);
        echo "</a></li>
       
        </ul>
        <div class=\"tab-content\">
          <div id=\"tab-product\" class=\"tab-pane active\">
            <form id=\"form-product-add\">
              <fieldset class=\"mb-0\">
                <legend>";
        // line 652
        echo ($context["text_product_add"] ?? null);
        echo "</legend>
                <div class=\"mb-3\">
                  <label for=\"input-product\" class=\"form-label\">";
        // line 654
        echo ($context["entry_product"] ?? null);
        echo "</label>
                  <input type=\"text\" name=\"product\" value=\"\" placeholder=\"";
        // line 655
        echo ($context["entry_product"] ?? null);
        echo "\" id=\"input-product\" data-oc-target=\"autocomplete-product\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-product\" class=\"dropdown-menu\"></ul>
                  <input type=\"hidden\" name=\"product_id\" value=\"\" id=\"input-product-id\"/>
                </div>
                <div class=\"mb-3\">
                  <label for=\"input-quantity\" class=\"form-label\">";
        // line 660
        echo ($context["entry_quantity"] ?? null);
        echo "</label>
                  <input type=\"text\" name=\"quantity\" placeholder=\"";
        // line 661
        echo ($context["entry_quantity"] ?? null);
        echo "\" value=\"1\" id=\"input-quantity\" class=\"form-control\"/>
                </div>
              </fieldset>
              <div id=\"option\"></div>
              <div id=\"subscription\"></div>
              <div class=\"text-end\">
                <button type=\"submit\" id=\"button-product-add\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> ";
        // line 667
        echo ($context["button_save"] ?? null);
        echo "</button>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-affiliate\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">";
        // line 681
        echo ($context["text_affiliate"] ?? null);
        echo "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-affiliate\">
          <div class=\"mb-3\">
            <label for=\"input-affiliate\" class=\"form-label\">";
        // line 687
        echo ($context["entry_affiliate"] ?? null);
        echo "</label> <input type=\"text\" name=\"affiliate\" value=\"";
        echo ($context["affiliate"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_affiliate"] ?? null);
        echo "\" id=\"input-affiliate\" data-oc-target=\"autocomplete-affiliate\" class=\"form-control\" autocomplete=\"off\"/> <input type=\"hidden\" name=\"affiliate_id\" value=\"";
        echo ($context["affiliate_id"] ?? null);
        echo "\" id=\"input-affiliate-id\"/>
            <ul id=\"autocomplete-affiliate\" class=\"dropdown-menu\"></ul>
          </div>
          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-affiliate\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> ";
        // line 691
        echo ($context["button_save"] ?? null);
        echo "</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-payment-address\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">";
        // line 702
        echo ($context["text_payment_address"] ?? null);
        echo "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-payment-address\">
          <div class=\"mb-3\">
            <label for=\"input-payment-address\" class=\"form-label\">";
        // line 708
        echo ($context["entry_address"] ?? null);
        echo "</label>
            <select name=\"payment_address_id\" id=\"input-payment-address\" class=\"form-select\">
              <option value=\"0\" selected>";
        // line 710
        echo ($context["text_none"] ?? null);
        echo "</option>
              ";
        // line 711
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["addresses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["address"]) {
            // line 712
            echo "                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["address"], "address_id", [], "any", false, false, false, 712);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["address"], "address_id", [], "any", false, false, false, 712) == ($context["payment_address_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["address"], "firstname", [], "any", false, false, false, 712);
            echo " ";
            echo twig_get_attribute($this->env, $this->source, $context["address"], "lastname", [], "any", false, false, false, 712);
            echo ",";
            if (twig_get_attribute($this->env, $this->source, $context["address"], "company", [], "any", false, false, false, 712)) {
                echo " ";
                echo twig_get_attribute($this->env, $this->source, $context["address"], "company", [], "any", false, false, false, 712);
                echo ",";
            }
            echo " ";
            echo twig_get_attribute($this->env, $this->source, $context["address"], "address_1", [], "any", false, false, false, 712);
            echo ", ";
            echo twig_get_attribute($this->env, $this->source, $context["address"], "city", [], "any", false, false, false, 712);
            echo ", ";
            echo twig_get_attribute($this->env, $this->source, $context["address"], "country", [], "any", false, false, false, 712);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['address'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 714
        echo "            </select>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-firstname\" class=\"form-label\">";
        // line 717
        echo ($context["entry_firstname"] ?? null);
        echo "</label>
            <input type=\"text\" name=\"firstname\" value=\"";
        // line 718
        echo ($context["payment_firstname"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_firstname"] ?? null);
        echo "\" id=\"input-payment-firstname\" class=\"form-control\"/>
            <div id=\"error-payment-firstname\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-lastname\" class=\"form-label\">";
        // line 722
        echo ($context["entry_lastname"] ?? null);
        echo "</label>
            <input type=\"text\" name=\"lastname\" value=\"";
        // line 723
        echo ($context["payment_lastname"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_lastname"] ?? null);
        echo "\" id=\"input-payment-lastname\" class=\"form-control\"/>
            <div id=\"error-payment-lastname\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3\">
            <label for=\"input-payment-company\" class=\"form-label\">";
        // line 727
        echo ($context["entry_company"] ?? null);
        echo "</label>
            <input type=\"text\" name=\"company\" value=\"";
        // line 728
        echo ($context["payment_company"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_company"] ?? null);
        echo "\" id=\"input-payment-company\" class=\"form-control\"/>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-address-1\" class=\"form-label\">";
        // line 731
        echo ($context["entry_address_1"] ?? null);
        echo "</label>
            <input type=\"text\" name=\"address_1\" value=\"";
        // line 732
        echo ($context["payment_address_1"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_address_1"] ?? null);
        echo "\" id=\"input-payment-address-1\" class=\"form-control\"/>
            <div id=\"error-payment-address-1\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3\">
            <label for=\"input-payment-address-2\" class=\"form-label\">";
        // line 736
        echo ($context["entry_phone"] ?? null);
        echo "</label>
            <input type=\"text\" name=\"phone\" value=\"";
        // line 737
        echo ($context["payment_phone"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_phone"] ?? null);
        echo "\" id=\"input-payment-address-2\" class=\"form-control\"/>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-city\" class=\"form-label\">";
        // line 740
        echo ($context["entry_city"] ?? null);
        echo "</label>
            <input type=\"text\" name=\"city\" value=\"";
        // line 741
        echo ($context["payment_city"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_city"] ?? null);
        echo "\" id=\"input-payment-city\" class=\"form-control\"/>
            <div id=\"error-payment-city\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-postcode\" class=\"form-label\">";
        // line 745
        echo ($context["entry_postcode"] ?? null);
        echo "</label>
            <input type=\"text\" name=\"postcode\" value=\"";
        // line 746
        echo ($context["payment_postcode"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_postcode"] ?? null);
        echo "\" id=\"input-payment-postcode\" class=\"form-control\"/>
            <div id=\"error-payment-postcode\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-country\" class=\"form-label\">";
        // line 750
        echo ($context["entry_country"] ?? null);
        echo "</label>
            <select name=\"country_id\" id=\"input-payment-country\" class=\"form-select\">
              <option value=\"0\">";
        // line 752
        echo ($context["text_select"] ?? null);
        echo "</option>
              ";
        // line 753
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["countries"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 754
            echo "                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["country"], "country_id", [], "any", false, false, false, 754);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["country"], "country_id", [], "any", false, false, false, 754) == ($context["payment_country_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["country"], "name", [], "any", false, false, false, 754);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 756
        echo "            </select>
            <div id=\"error-payment-country\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-zone\" class=\"form-label\">";
        // line 760
        echo ($context["entry_zone"] ?? null);
        echo "</label> <select name=\"zone_id\" id=\"input-payment-zone\" class=\"form-select\"></select>
            <div id=\"error-payment-zone\" class=\"invalid-feedback\"></div>
          </div>
          ";
        // line 763
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["custom_fields"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
            // line 764
            echo "            ";
            if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "location", [], "any", false, false, false, 764) == "address")) {
                // line 765
                echo "              ";
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 765) == "select")) {
                    // line 766
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 766);
                    echo "\">
                  <label for=\"input-payment-custom-field-";
                    // line 767
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 767);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 767);
                    echo "</label> <select name=\"custom_field[";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 767);
                    echo "]\" id=\"input-payment-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 767);
                    echo "\" class=\"form-select\">
                    <option value=\"\">";
                    // line 768
                    echo ($context["text_select"] ?? null);
                    echo "</option>
                    ";
                    // line 769
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_value", [], "any", false, false, false, 769));
                    foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                        // line 770
                        echo "                      <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 770);
                        echo "\"";
                        if (((($__internal_compile_18 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 770)] ?? null) : null) && (twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 770) == (($__internal_compile_19 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_19) || $__internal_compile_19 instanceof ArrayAccess ? ($__internal_compile_19[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 770)] ?? null) : null)))) {
                            echo " selected";
                        }
                        echo ">";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 770);
                        echo "</option>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 772
                    echo "                  </select>
                  <div id=\"error-payment-custom-field-";
                    // line 773
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 773);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 776
                echo "              ";
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 776) == "radio")) {
                    // line 777
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 777);
                    echo "\">
                  <label class=\"form-label\">";
                    // line 778
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 778);
                    echo "</label>
                  <div id=\"input-payment-custom-field-";
                    // line 779
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 779);
                    echo "\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    ";
                    // line 780
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_value", [], "any", false, false, false, 780));
                    foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                        // line 781
                        echo "                      <div class=\"form-check\">
                        <input type=\"radio\" name=\"custom_field[";
                        // line 782
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 782);
                        echo "]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 782);
                        echo "\" id=\"input-payment-custom-value-";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 782);
                        echo "\" class=\"form-check-input\"";
                        if (((($__internal_compile_20 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_20) || $__internal_compile_20 instanceof ArrayAccess ? ($__internal_compile_20[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 782)] ?? null) : null) && (twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 782) == (($__internal_compile_21 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_21) || $__internal_compile_21 instanceof ArrayAccess ? ($__internal_compile_21[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 782)] ?? null) : null)))) {
                            echo " checked";
                        }
                        echo "/> <label for=\"input-payment-custom-value-";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 782);
                        echo "\" class=\"form-check-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 782);
                        echo "</label>
                      </div>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 785
                    echo "                  </div>
                  <div id=\"error-payment-custom-field-";
                    // line 786
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 786);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 789
                echo "              ";
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 789) == "checkbox")) {
                    // line 790
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 790);
                    echo "\">
                  <label class=\"form-label\">";
                    // line 791
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 791);
                    echo "</label>
                  <div id=\"input-payment-custom-field-";
                    // line 792
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 792);
                    echo "\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    ";
                    // line 793
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_value", [], "any", false, false, false, 793));
                    foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                        // line 794
                        echo "                      <div class=\"form-check\">
                        <input type=\"checkbox\" name=\"custom_field[";
                        // line 795
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 795);
                        echo "][]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 795);
                        echo "\" id=\"input-payment-custom-value-";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 795);
                        echo "\" class=\"form-check-input\"";
                        if (((($__internal_compile_22 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_22) || $__internal_compile_22 instanceof ArrayAccess ? ($__internal_compile_22[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 795)] ?? null) : null) && twig_in_filter(twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 795), (($__internal_compile_23 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_23) || $__internal_compile_23 instanceof ArrayAccess ? ($__internal_compile_23[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 795)] ?? null) : null)))) {
                            echo " checked";
                        }
                        echo "/> <label for=\"input-payment-custom-value-";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 795);
                        echo "\" class=\"form-check-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 795);
                        echo "</label>
                      </div>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 798
                    echo "                  </div>
                  <div id=\"error-payment-custom-field-";
                    // line 799
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 799);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 802
                echo "              ";
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 802) == "text")) {
                    // line 803
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 803);
                    echo "\">
                  <label for=\"input-payment-custom-field-";
                    // line 804
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 804);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 804);
                    echo "</label> <input type=\"text\" name=\"custom_field[";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 804);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_24 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_24) || $__internal_compile_24 instanceof ArrayAccess ? ($__internal_compile_24[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 804)] ?? null) : null)) ? ((($__internal_compile_25 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_25) || $__internal_compile_25 instanceof ArrayAccess ? ($__internal_compile_25[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 804)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 804)));
                    echo "\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 804);
                    echo "\" id=\"input-payment-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 804);
                    echo "\" class=\"form-control\"/>
                  <div id=\"error-payment-custom-field-";
                    // line 805
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 805);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 808
                echo "              ";
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 808) == "textarea")) {
                    // line 809
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 809);
                    echo "\">
                  <label for=\"input-payment-custom-field-";
                    // line 810
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 810);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 810);
                    echo "</label> <textarea name=\"custom_field[";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 810);
                    echo "]\" rows=\"5\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 810);
                    echo "\" id=\"input-payment-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 810);
                    echo "\" class=\"form-control\">";
                    echo (((($__internal_compile_26 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_26) || $__internal_compile_26 instanceof ArrayAccess ? ($__internal_compile_26[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 810)] ?? null) : null)) ? ((($__internal_compile_27 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_27) || $__internal_compile_27 instanceof ArrayAccess ? ($__internal_compile_27[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 810)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 810)));
                    echo "</textarea>
                  <div id=\"error-payment-custom-field-";
                    // line 811
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 811);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 814
                echo "              ";
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 814) == "file")) {
                    // line 815
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 815);
                    echo "\">
                  <label class=\"form-label\">";
                    // line 816
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 816);
                    echo "</label>
                  <div class=\"input-group\">
                    <button type=\"button\" data-oc-toggle=\"upload\" data-oc-url=\"";
                    // line 818
                    echo ($context["upload"] ?? null);
                    echo "\" data-oc-target=\"#input-payment-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 818);
                    echo "\" data-oc-size-max=\"";
                    echo ($context["config_file_max_size"] ?? null);
                    echo "\" data-oc-size-error=\"";
                    echo ($context["error_upload_size"] ?? null);
                    echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-upload\"></i> ";
                    echo ($context["button_upload"] ?? null);
                    echo "</button>
                    <input type=\"text\" name=\"custom_field[";
                    // line 819
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 819);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_28 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_28) || $__internal_compile_28 instanceof ArrayAccess ? ($__internal_compile_28[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 819)] ?? null) : null)) ? ((($__internal_compile_29 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_29) || $__internal_compile_29 instanceof ArrayAccess ? ($__internal_compile_29[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 819)] ?? null) : null)) : (""));
                    echo "\" id=\"input-payment-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 819);
                    echo "\" class=\"form-control\" readonly/>
                    <button type=\"button\" data-oc-toggle=\"download\" data-oc-target=\"#input-payment-custom-field-";
                    // line 820
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 820);
                    echo "\"";
                    if ( !(($__internal_compile_30 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_30) || $__internal_compile_30 instanceof ArrayAccess ? ($__internal_compile_30[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 820)] ?? null) : null)) {
                        echo " disabled";
                    }
                    echo " class=\"btn btn-outline-secondary\"><i class=\"fa-solid fa-download\"></i> ";
                    echo ($context["button_download"] ?? null);
                    echo "</button>
                    <button type=\"button\" data-oc-toggle=\"clear\" data-bs-toggle=\"tooltip\" title=\"";
                    // line 821
                    echo ($context["button_clear"] ?? null);
                    echo "\" data-oc-target=\"#input-payment-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 821);
                    echo "\"";
                    if ( !(($__internal_compile_31 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_31) || $__internal_compile_31 instanceof ArrayAccess ? ($__internal_compile_31[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 821)] ?? null) : null)) {
                        echo " disabled";
                    }
                    echo " class=\"btn btn-outline-danger\"><i class=\"fa-solid fa-eraser\"></i></button>
                  </div>
                  <div id=\"error-payment-custom-field-";
                    // line 823
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 823);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 826
                echo "              ";
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 826) == "date")) {
                    // line 827
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 827);
                    echo "\">
                  <label for=\"input-payment-custom-field-";
                    // line 828
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 828);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 828);
                    echo "</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[";
                    // line 830
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 830);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_32 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_32) || $__internal_compile_32 instanceof ArrayAccess ? ($__internal_compile_32[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 830)] ?? null) : null)) ? ((($__internal_compile_33 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_33) || $__internal_compile_33 instanceof ArrayAccess ? ($__internal_compile_33[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 830)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 830)));
                    echo "\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 830);
                    echo "\" id=\"input-payment-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 830);
                    echo "\" class=\"form-control date\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-payment-custom-field-";
                    // line 833
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 833);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 836
                echo "              ";
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 836) == "time")) {
                    // line 837
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 837);
                    echo "\">
                  <label for=\"input-payment-custom-field-";
                    // line 838
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 838);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 838);
                    echo "</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[";
                    // line 840
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 840);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_34 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_34) || $__internal_compile_34 instanceof ArrayAccess ? ($__internal_compile_34[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 840)] ?? null) : null)) ? ((($__internal_compile_35 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_35) || $__internal_compile_35 instanceof ArrayAccess ? ($__internal_compile_35[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 840)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 840)));
                    echo "\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 840);
                    echo "\" id=\"input-payment-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 840);
                    echo "\" class=\"form-control time\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-payment-custom-field-";
                    // line 843
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 843);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 846
                echo "              ";
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 846) == "datetime")) {
                    // line 847
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 847);
                    echo "\">
                  <label for=\"input-payment-custom-field-";
                    // line 848
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 848);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 848);
                    echo "</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[";
                    // line 850
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 850);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_36 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_36) || $__internal_compile_36 instanceof ArrayAccess ? ($__internal_compile_36[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 850)] ?? null) : null)) ? ((($__internal_compile_37 = ($context["payment_custom_field"] ?? null)) && is_array($__internal_compile_37) || $__internal_compile_37 instanceof ArrayAccess ? ($__internal_compile_37[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 850)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 850)));
                    echo "\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 850);
                    echo "\" id=\"input-payment-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 850);
                    echo "\" class=\"form-control datetime\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-payment-custom-field-";
                    // line 853
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 853);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 856
                echo "            ";
            }
            // line 857
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 858
        echo "          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-payment-address\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> ";
        // line 859
        echo ($context["button_save"] ?? null);
        echo "</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-payment\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\"><i class=\"fa fa-credit-card\"></i> ";
        // line 870
        echo ($context["text_payment_method"] ?? null);
        echo "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-payment-method\">
          <p>";
        // line 875
        echo ($context["text_payment"] ?? null);
        echo "</p>
          <div id=\"payment-methods\"></div>
          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-payment-method\" class=\"btn btn-primary\">";
        // line 878
        echo ($context["button_continue"] ?? null);
        echo "</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-shipping-address\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">";
        // line 889
        echo ($context["text_shipping_address"] ?? null);
        echo "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-shipping-address\">
          <div class=\"mb-3\">
            <label for=\"input-shipping-address\" class=\"form-label\">";
        // line 895
        echo ($context["entry_address"] ?? null);
        echo "</label>
            <select name=\"shipping_address_id\" id=\"input-shipping-address\" class=\"form-select\">
              <option value=\"0\">";
        // line 897
        echo ($context["text_none"] ?? null);
        echo "</option>
              ";
        // line 898
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["addresses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["address"]) {
            // line 899
            echo "                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["address"], "address_id", [], "any", false, false, false, 899);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["address"], "address_id", [], "any", false, false, false, 899) == ($context["shipping_address_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["address"], "firstname", [], "any", false, false, false, 899);
            echo " ";
            echo twig_get_attribute($this->env, $this->source, $context["address"], "lastname", [], "any", false, false, false, 899);
            echo ",";
            if (twig_get_attribute($this->env, $this->source, $context["address"], "company", [], "any", false, false, false, 899)) {
                echo " ";
                echo twig_get_attribute($this->env, $this->source, $context["address"], "company", [], "any", false, false, false, 899);
                echo ",";
            }
            echo " ";
            echo twig_get_attribute($this->env, $this->source, $context["address"], "address_1", [], "any", false, false, false, 899);
            echo ", ";
            echo twig_get_attribute($this->env, $this->source, $context["address"], "city", [], "any", false, false, false, 899);
            echo ", ";
            echo twig_get_attribute($this->env, $this->source, $context["address"], "country", [], "any", false, false, false, 899);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['address'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 901
        echo "            </select>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-shipping-firstname\" class=\"form-label\">";
        // line 904
        echo ($context["entry_firstname"] ?? null);
        echo "</label> <input type=\"text\" name=\"firstname\" value=\"";
        echo ($context["shipping_firstname"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_firstname"] ?? null);
        echo "\" id=\"input-shipping-firstname\" class=\"form-control\"/>
            <div id=\"error-shipping-firstname\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-shipping-lastname\" class=\"form-label\">";
        // line 908
        echo ($context["entry_lastname"] ?? null);
        echo "</label> <input type=\"text\" name=\"lastname\" value=\"";
        echo ($context["shipping_lastname"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_lastname"] ?? null);
        echo "\" id=\"input-shipping-lastname\" class=\"form-control\"/>
            <div id=\"error-shipping-lastname\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3\">
            <label for=\"input-shipping-company\" class=\"form-label\">";
        // line 912
        echo ($context["entry_company"] ?? null);
        echo "</label> <input type=\"text\" name=\"company\" value=\"";
        echo ($context["shipping_company"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_company"] ?? null);
        echo "\" id=\"input-shipping-company\" class=\"form-control\"/>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-shipping-address-1\" class=\"form-label\">";
        // line 915
        echo ($context["entry_address_1"] ?? null);
        echo "</label> <input type=\"text\" name=\"address_1\" value=\"";
        echo ($context["shipping_address_1"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_address_1"] ?? null);
        echo "\" id=\"input-shipping-address-1\" class=\"form-control\"/>
            <div id=\"error-shipping-address-1\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3\">
            <label for=\"input-shipping-address-2\" class=\"form-label\">";
        // line 919
        echo ($context["entry_phone"] ?? null);
        echo "</label> <input type=\"text\" name=\"phone\" value=\"";
        echo ($context["shipping_phone"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_phone"] ?? null);
        echo "\" id=\"input-shipping-address-2\" class=\"form-control\"/>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-shipping-city\" class=\"form-label\">";
        // line 922
        echo ($context["entry_city"] ?? null);
        echo "</label> <input type=\"text\" name=\"city\" value=\"";
        echo ($context["shipping_city"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_city"] ?? null);
        echo "\" id=\"input-shipping-city\" class=\"form-control\"/>
            <div id=\"error-shipping-city\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-shipping-postcode\" class=\"form-label\">";
        // line 926
        echo ($context["entry_postcode"] ?? null);
        echo "</label> <input type=\"text\" name=\"postcode\" value=\"";
        echo ($context["shipping_postcode"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_postcode"] ?? null);
        echo "\" id=\"input-shipping-postcode\" class=\"form-control\"/>
            <div id=\"error-shipping-postcode\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-shipping-country\" class=\"form-label\">";
        // line 930
        echo ($context["entry_country"] ?? null);
        echo "</label> <select name=\"country_id\" id=\"input-shipping-country\" class=\"form-select\">
              <option value=\"0\">";
        // line 931
        echo ($context["text_select"] ?? null);
        echo "</option>
              ";
        // line 932
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["countries"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 933
            echo "                <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["country"], "country_id", [], "any", false, false, false, 933);
            echo "\"";
            if ((twig_get_attribute($this->env, $this->source, $context["country"], "country_id", [], "any", false, false, false, 933) == ($context["shipping_country_id"] ?? null))) {
                echo " selected";
            }
            echo ">";
            echo twig_get_attribute($this->env, $this->source, $context["country"], "name", [], "any", false, false, false, 933);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 935
        echo "            </select>
            <div id=\"error-shipping-country\" class=\"invalid-feedback\"></div>
          </div>

          <div class=\"mb-3 required\">
            <label for=\"input-shipping-zone\" class=\"form-label\">";
        // line 940
        echo ($context["entry_zone"] ?? null);
        echo "</label> <select name=\"zone_id\" id=\"input-shipping-zone\" class=\"form-select\"></select>
            <div id=\"error-shipping-zone\" class=\"invalid-feedback\"></div>
          </div>

          ";
        // line 944
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["custom_fields"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["custom_field"]) {
            // line 945
            echo "            ";
            if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "location", [], "any", false, false, false, 945) == "address")) {
                // line 946
                echo "
              ";
                // line 947
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 947) == "select")) {
                    // line 948
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 948);
                    echo "\">
                  <label for=\"input-shipping-custom-field-";
                    // line 949
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 949);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 949);
                    echo "</label> <select name=\"custom_field[";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 949);
                    echo "]\" id=\"input-shipping-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 949);
                    echo "\" class=\"form-select\">
                    <option value=\"\">";
                    // line 950
                    echo ($context["text_select"] ?? null);
                    echo "</option>
                    ";
                    // line 951
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_value", [], "any", false, false, false, 951));
                    foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                        // line 952
                        echo "                      <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 952);
                        echo "\"";
                        if (((($__internal_compile_38 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_38) || $__internal_compile_38 instanceof ArrayAccess ? ($__internal_compile_38[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 952)] ?? null) : null) && (twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 952) == (($__internal_compile_39 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_39) || $__internal_compile_39 instanceof ArrayAccess ? ($__internal_compile_39[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 952)] ?? null) : null)))) {
                            echo " selected";
                        }
                        echo ">";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 952);
                        echo "</option>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 954
                    echo "                  </select>
                  <div id=\"error-shipping-custom-field-";
                    // line 955
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 955);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 958
                echo "
              ";
                // line 959
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 959) == "radio")) {
                    // line 960
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 960);
                    echo "\">
                  <label class=\"form-label\">";
                    // line 961
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 961);
                    echo "</label>
                  <div id=\"input-shipping-custom-field-";
                    // line 962
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 962);
                    echo "\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    ";
                    // line 963
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_value", [], "any", false, false, false, 963));
                    foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                        // line 964
                        echo "                      <div class=\"form-check\">
                        <input type=\"radio\" name=\"custom_field[";
                        // line 965
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 965);
                        echo "]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 965);
                        echo "\" id=\"input-shipping-custom-value-";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 965);
                        echo "\" class=\"form-check-input\"";
                        if (((($__internal_compile_40 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_40) || $__internal_compile_40 instanceof ArrayAccess ? ($__internal_compile_40[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 965)] ?? null) : null) && (twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 965) == (($__internal_compile_41 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_41) || $__internal_compile_41 instanceof ArrayAccess ? ($__internal_compile_41[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 965)] ?? null) : null)))) {
                            echo " checked";
                        }
                        echo "/> <label for=\"input-shipping-custom-value-";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 965);
                        echo "\" class=\"form-check-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 965);
                        echo "</label>
                      </div>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 968
                    echo "                  </div>
                  <div id=\"error-shipping-custom-field-";
                    // line 969
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 969);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 972
                echo "
              ";
                // line 973
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 973) == "checkbox")) {
                    // line 974
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 974);
                    echo "\">
                  <label class=\"form-label\">";
                    // line 975
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 975);
                    echo "</label>
                  <div id=\"input-shipping-custom-field-";
                    // line 976
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 976);
                    echo "\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    ";
                    // line 977
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_value", [], "any", false, false, false, 977));
                    foreach ($context['_seq'] as $context["_key"] => $context["custom_field_value"]) {
                        // line 978
                        echo "                      <div class=\"form-check\">
                        <input type=\"checkbox\" name=\"custom_field[";
                        // line 979
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 979);
                        echo "][]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 979);
                        echo "\" id=\"input-shipping-custom-value-";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 979);
                        echo "\" class=\"form-check-input\"";
                        if (((($__internal_compile_42 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_42) || $__internal_compile_42 instanceof ArrayAccess ? ($__internal_compile_42[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 979)] ?? null) : null) && twig_in_filter(twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 979), (($__internal_compile_43 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_43) || $__internal_compile_43 instanceof ArrayAccess ? ($__internal_compile_43[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 979)] ?? null) : null)))) {
                            echo " checked";
                        }
                        echo "/> <label for=\"input-shipping-custom-value-";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "custom_field_value_id", [], "any", false, false, false, 979);
                        echo "\" class=\"form-check-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["custom_field_value"], "name", [], "any", false, false, false, 979);
                        echo "</label>
                      </div>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 982
                    echo "                  </div>
                  <div id=\"error-shipping-custom-field-";
                    // line 983
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 983);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 986
                echo "
              ";
                // line 987
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 987) == "text")) {
                    // line 988
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 988);
                    echo "\">
                  <label for=\"input-shipping-custom-field-";
                    // line 989
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 989);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 989);
                    echo "</label> <input type=\"text\" name=\"custom_field[";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 989);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_44 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_44) || $__internal_compile_44 instanceof ArrayAccess ? ($__internal_compile_44[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 989)] ?? null) : null)) ? ((($__internal_compile_45 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_45) || $__internal_compile_45 instanceof ArrayAccess ? ($__internal_compile_45[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 989)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 989)));
                    echo "\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 989);
                    echo "\" id=\"input-shipping-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 989);
                    echo "\" class=\"form-control\"/>
                  <div id=\"error-shipping-custom-field-";
                    // line 990
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 990);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 993
                echo "
              ";
                // line 994
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 994) == "textarea")) {
                    // line 995
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 995);
                    echo "\">
                  <label for=\"input-shipping-custom-field-";
                    // line 996
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 996);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 996);
                    echo "</label> <textarea name=\"custom_field[";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 996);
                    echo "]\" rows=\"5\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 996);
                    echo "\" id=\"input-shipping-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 996);
                    echo "\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 996);
                    echo "\" class=\"form-control\">";
                    echo (((($__internal_compile_46 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_46) || $__internal_compile_46 instanceof ArrayAccess ? ($__internal_compile_46[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 996)] ?? null) : null)) ? ((($__internal_compile_47 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_47) || $__internal_compile_47 instanceof ArrayAccess ? ($__internal_compile_47[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 996)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 996)));
                    echo "</textarea>
                  <div id=\"error-shipping-custom-field-";
                    // line 997
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 997);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 1000
                echo "
              ";
                // line 1001
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 1001) == "file")) {
                    // line 1002
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1002);
                    echo "\">
                  <label class=\"form-label\">";
                    // line 1003
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 1003);
                    echo "</label>
                  <div class=\"input-group\">
                    <button type=\"button\" data-oc-toggle=\"upload\" data-oc-url=\"";
                    // line 1005
                    echo ($context["upload"] ?? null);
                    echo "\" data-oc-target=\"#input-shipping-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1005);
                    echo "\" data-oc-size-max=\"";
                    echo ($context["config_file_max_size"] ?? null);
                    echo "\" data-oc-size-error=\"";
                    echo ($context["error_upload_size"] ?? null);
                    echo "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-upload\"></i> ";
                    echo ($context["button_upload"] ?? null);
                    echo "</button>
                    <input type=\"text\" name=\"custom_field[";
                    // line 1006
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1006);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_48 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_48) || $__internal_compile_48 instanceof ArrayAccess ? ($__internal_compile_48[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1006)] ?? null) : null)) ? ((($__internal_compile_49 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_49) || $__internal_compile_49 instanceof ArrayAccess ? ($__internal_compile_49[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1006)] ?? null) : null)) : (""));
                    echo "\" id=\"input-shipping-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1006);
                    echo "\" class=\"form-control\" readonly/>
                    <button type=\"button\" data-oc-toggle=\"download\" data-oc-target=\"#input-shipping-custom-field-";
                    // line 1007
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1007);
                    echo "\"";
                    if ( !(($__internal_compile_50 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_50) || $__internal_compile_50 instanceof ArrayAccess ? ($__internal_compile_50[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1007)] ?? null) : null)) {
                        echo " disabled";
                    }
                    echo " class=\"btn btn-outline-secondary\"><i class=\"fa-solid fa-download\"></i> ";
                    echo ($context["button_download"] ?? null);
                    echo "</button>
                    <button type=\"button\" data-oc-toggle=\"clear\" data-bs-toggle=\"tooltip\" title=\"";
                    // line 1008
                    echo ($context["button_clear"] ?? null);
                    echo "\" data-oc-target=\"#input-shipping-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1008);
                    echo "\"";
                    if ( !(($__internal_compile_51 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_51) || $__internal_compile_51 instanceof ArrayAccess ? ($__internal_compile_51[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1008)] ?? null) : null)) {
                        echo " disabled";
                    }
                    echo " class=\"btn btn-outline-danger\"><i class=\"fa-solid fa-eraser\"></i></button>
                  </div>
                  <div id=\"error-shipping-custom-field-";
                    // line 1010
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1010);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 1013
                echo "
              ";
                // line 1014
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 1014) == "date")) {
                    // line 1015
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1015);
                    echo "\">
                  <label for=\"input-shipping-custom-field-";
                    // line 1016
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1016);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 1016);
                    echo "</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[";
                    // line 1018
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1018);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_52 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_52) || $__internal_compile_52 instanceof ArrayAccess ? ($__internal_compile_52[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1018)] ?? null) : null)) ? ((($__internal_compile_53 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_53) || $__internal_compile_53 instanceof ArrayAccess ? ($__internal_compile_53[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1018)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 1018)));
                    echo "\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 1018);
                    echo "\" id=\"input-shipping-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1018);
                    echo "\" class=\"form-control date\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-shipping-custom-field-";
                    // line 1021
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1021);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 1024
                echo "
              ";
                // line 1025
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 1025) == "time")) {
                    // line 1026
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1026);
                    echo "\">
                  <label for=\"input-shipping-custom-field-";
                    // line 1027
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1027);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 1027);
                    echo "</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[";
                    // line 1029
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1029);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_54 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_54) || $__internal_compile_54 instanceof ArrayAccess ? ($__internal_compile_54[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1029)] ?? null) : null)) ? ((($__internal_compile_55 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_55) || $__internal_compile_55 instanceof ArrayAccess ? ($__internal_compile_55[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1029)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 1029)));
                    echo "\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 1029);
                    echo "\" id=\"input-shipping-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1029);
                    echo "\" class=\"form-control time\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-shipping-custom-field-";
                    // line 1032
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1032);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 1035
                echo "
              ";
                // line 1036
                if ((twig_get_attribute($this->env, $this->source, $context["custom_field"], "type", [], "any", false, false, false, 1036) == "datetime")) {
                    // line 1037
                    echo "                <div class=\"mb-3 custom-field custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1037);
                    echo "\">
                  <label for=\"input-shipping-custom-field-";
                    // line 1038
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1038);
                    echo "\" class=\"form-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 1038);
                    echo "</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[";
                    // line 1040
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1040);
                    echo "]\" value=\"";
                    echo (((($__internal_compile_56 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_56) || $__internal_compile_56 instanceof ArrayAccess ? ($__internal_compile_56[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1040)] ?? null) : null)) ? ((($__internal_compile_57 = ($context["shipping_custom_field"] ?? null)) && is_array($__internal_compile_57) || $__internal_compile_57 instanceof ArrayAccess ? ($__internal_compile_57[twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1040)] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, $context["custom_field"], "value", [], "any", false, false, false, 1040)));
                    echo "\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "name", [], "any", false, false, false, 1040);
                    echo "\" id=\"input-shipping-custom-field-";
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1040);
                    echo "\" class=\"form-control datetime\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-shipping-custom-field-";
                    // line 1043
                    echo twig_get_attribute($this->env, $this->source, $context["custom_field"], "custom_field_id", [], "any", false, false, false, 1043);
                    echo "\" class=\"invalid-feedback\"></div>
                </div>
              ";
                }
                // line 1046
                echo "
            ";
            }
            // line 1048
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['custom_field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1049
        echo "          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-shipping-address\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> ";
        // line 1050
        echo ($context["button_save"] ?? null);
        echo "</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-shipping\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\"><i class=\"fa fa-truck\"></i> ";
        // line 1061
        echo ($context["text_shipping_method"] ?? null);
        echo "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-shipping-method\">
          <p>";
        // line 1066
        echo ($context["text_shipping"] ?? null);
        echo "</p>
          <div id=\"shipping-methods\"></div>
          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-shipping-method\" class=\"btn btn-primary\">";
        // line 1069
        echo ($context["button_continue"] ?? null);
        echo "</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-comment\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">";
        // line 1080
        echo ($context["text_comment"] ?? null);
        echo "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-comment\">
          <div class=\"mb-3\">
            <textarea name=\"comment\" rows=\"5\" placeholder=\"";
        // line 1086
        echo ($context["entry_comment"] ?? null);
        echo "\" id=\"input-comment\" class=\"form-control\">";
        echo ($context["comment"] ?? null);
        echo "</textarea>
          </div>
          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-comment\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> ";
        // line 1089
        echo ($context["button_save"] ?? null);
        echo "</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script ><!--
\$(document).ready(function () {
 
     \$('#button-refresh').trigger('click');
 
   
});

 

\$(document).on('click', '#button-invoice', function() {
    \$.ajax({
        url: 'index.php?route=sale/order.createInvoiceNo&user_token=";
        // line 1108
        echo ($context["user_token"] ?? null);
        echo "&order_id=";
        echo ($context["order_id"] ?? null);
        echo "',
        dataType: 'json',
        beforeSend: function() {
            \$('#button-invoice').button('loading');
        },
        complete: function() {
            \$('#button-invoice').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#invoice-value').html(json['invoice_no']);

                \$('#button-invoice').replaceWith('<button disabled=\"disabled\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Customer
\$('#input-customer').autocomplete({
    'source': function(request, response) {
        \$.ajax({
            url: 'index.php?route=customer/customer.autocomplete&user_token=";
        // line 1141
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function(json) {
                json.unshift({
                    customer_id: 0,
                    customer_group_id: ";
        // line 1146
        echo ($context["customer_group_id"] ?? null);
        echo ",
                    name: '";
        // line 1147
        echo ($context["text_none"] ?? null);
        echo "',
                    customer_group: '',
                    firstname: '',
                    lastname: '',
                    email: '',
                    telephone: '',
                    custom_field: [],
                    address: []
                });

                response(\$.map(json, function(item) {
                    return {
                        category: item['customer_group'],
                        label: item['name'],
                        value: item['customer_id'],
                        customer_group_id: item['customer_group_id'],
                        firstname: item['firstname'],
                        lastname: item['lastname'],
                        email: item['email'],
                        telephone: item['telephone'],
                        custom_field: item['custom_field'],
                        address: item['address']
                    }
                }));
            }
        });
    },
    'select': function(item) {
        // Reset all custom fields
        \$('#form-customer input[type=\\'text\\'], #form-customer textarea').not('#input-customer, #input-customer-id').val('');
        \$('#form-customer select option').removeAttr('selected');
        \$('#form-customer input[type=\\'checkbox\\'], #form-customer input[type=\\'radio\\']').removeAttr('checked');

        \$('#input-customer-id').val(item['value']);
        \$('#input-customer-group').val(item['customer_group_id']);
        \$('#input-firstname').val(item['firstname']);
        \$('#input-lastname').val(item['lastname']);
        \$('#input-email').val(item['email']);
        \$('#input-telephone').val(item['telephone']);

        for (i in item.custom_field) {
            \$('#input-custom-field-' + i).val(item.custom_field[i]);

            if (item.custom_field[i] instanceof Array) {
                for (j = 0; j < item.custom_field[i].length; j++) {
                    \$('#input-custom-field-value-' + item.custom_field[i][j]).prop('checked', true);
                }
            }
        }

        \$('#input-customer-group').trigger('change');

        html = '<option value=\"0\">";
        // line 1199
        echo twig_escape_filter($this->env, ($context["text_none"] ?? null), "js");
        echo "</option>';

        for (i in item['address']) {
            html += '<option value=\"' + item['address'][i]['address_id'] + '\">' + item['address'][i]['firstname'] + ' ' + item['address'][i]['lastname'] + ', ' + (item['address'][i]['company'] ? item['address'][i]['company'] + ', ' : '') + item['address'][i]['address_1'] + ', ' + item['address'][i]['city'] + ', ' + item['address'][i]['country'] + '</option>';
        }

        \$('#input-payment-address').html(html);
        \$('#input-shipping-address').html(html);

        //\$('#payment-method-value').html('');
       // \$('#shipping-method-value').html('');
    }
});

// Custom Fields
\$('#input-customer-group').on('change', function() {
    \$.ajax({
        url: 'index.php?route=customer/customer.customfield&user_token=";
        // line 1216
        echo ($context["user_token"] ?? null);
        echo "&customer_group_id=' + this.value,
        dataType: 'json',
        success: function(json) {
            \$('.custom-field').hide();
            \$('.custom-field').removeClass('required');

            for (i = 0; i < json.length; i++) {
                custom_field = json[i];

                \$('.custom-field-' + custom_field['custom_field_id']).show();

                if (custom_field['required']) {
                    \$('.custom-field-' + custom_field['custom_field_id']).addClass('required');
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-customer-group').trigger('change');

// Customer
\$('#form-customer').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 1245
        echo ($context["user_token"] ?? null);
        echo "&action=sale/customer&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        type: 'post',
        data: \$('#form-customer').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-customer').button('loading');
        },
        complete: function() {
            \$('#button-customer').button('reset');
        },
        success: function(json) {
            console.log(json);

            \$('.alert-dismissible').remove();
            \$('.is-invalid').removeClass('is-invalid');
            \$('.invalid-feedback').removeClass('d-block');

            // Check for errors
            if (json['error']) {
                if (json['error']['warning']) {
                    \$('#form-customer').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                for (key in json['error']) {
                    \$('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                    \$('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                }
            }

            if (json['success']) {
                \$('#form-customer').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#customer-value').html('<a href=\"index.php?route=customer/customer.form&user_token=";
        // line 1278
        echo ($context["user_token"] ?? null);
        echo "&customer_id=' + \$('#input-customer-id').val() + '\">' + \$('#input-firstname').val() + ' ' + \$('#input-lastname').val() + '</a>');

                //\$('#payment-method-value').html('');
               // \$('#shipping-method-value').html('');

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Product
\$('#input-product').autocomplete({
    'source': function(request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/product.autocomplete&user_token=";
        // line 1296
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function(json) {
                response(\$.map(json, function(item) {
                    return {
                        label: item['name'],
                        value: item['product_id'],
                        sku: item['sku'],
                        option: item['option'],
                        subscription: item['subscription'],
                        price: item['price']
                    }
                }));
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    },
    'select': function(item) {
        \$('#input-product-id').val(item['value']);
        \$('#input-product').val(item['label']);
        
        if (item['option']) {
            html = '<fieldset class=\"mb-0\">';
            html += '  <legend>";
        // line 1321
        echo twig_escape_filter($this->env, ($context["entry_option"] ?? null), "js");
        echo "</legend>';

            for (i = 0; i < item['option'].length; i++) {
                option = item['option'][i];

                if (option['type'] == 'select') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <select name=\"option[' + option['product_option_id'] + ']\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-select\">';
                    html += '    <option value=\"\">";
        // line 1330
        echo twig_escape_filter($this->env, ($context["text_select"] ?? null), "js");
        echo "</option>';

                    for (j = 0; j < option['product_option_value'].length; j++) {
                        option_value = option['product_option_value'][j];

                        html += '<option value=\"' + option_value['product_option_value_id'] + '\">' + option_value['name'];

                        if (option_value['price']) {
                            html += ' (' + option_value['price_prefix'] + option_value['price'] + ')';
                        }

                        html += '</option>';
                    }

                    html += '  </select>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'radio') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <select name=\"option[' + option['product_option_id'] + ']\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-select\">';
                    html += '    <option value=\"\">";
        // line 1353
        echo twig_escape_filter($this->env, ($context["text_select"] ?? null), "js");
        echo "</option>';

                    for (j = 0; j < option['product_option_value'].length; j++) {
                        option_value = option['product_option_value'][j];

                        html += '<option value=\"' + option_value['product_option_value_id'] + '\">' + option_value['name'];

                        if (option_value['price']) {
                            html += ' (' + option_value['price_prefix'] + option_value['price'] + ')';
                        }

                        html += '</option>';
                    }

                    html += '  </select>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'checkbox') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label class=\"form-label\">' + option['name'] + '</label>';

                    html += '  <div id=\"input-option-' + option['product_option_id'] + '\" class=\"form-control\">';

                    for (j = 0; j < option['product_option_value'].length; j++) {
                        option_value = option['product_option_value'][j];

                        html += '<div class=\"form-check\">';
                        html += '  <input type=\"checkbox\" name=\"option[' + option['product_option_id'] + '][]\" value=\"' + option_value['product_option_value_id'] + '\" id=\"input-option-value-' + option_value['product_option_value_id'] + '\" class=\"form-check-input\"/> ';
                        html += '  <label for=\"input-option-value-' + option_value['product_option_value_id'] + '\" class=\"form-check-label\">' + option_value['name'];

                        if (option_value['price']) {
                            html += ' (' + option_value['price_prefix'] + option_value['price'] + ')';
                        }

                        html += '  </label>';
                        html += '</div>';
                    }

                    html += '  </div>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'image') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';

                    html += '  <select name=\"option[' + option['product_option_id'] + ']\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-select\">';
                    html += '    <option value=\"\">";
        // line 1403
        echo twig_escape_filter($this->env, ($context["text_select"] ?? null), "js");
        echo "</option>';

                    for (j = 0; j < option['product_option_value'].length; j++) {
                        option_value = option['product_option_value'][j];

                        html += '<option value=\"' + option_value['product_option_value_id'] + '\">' + option_value['name'];

                        if (option_value['price']) {
                            html += ' (' + option_value['price_prefix'] + option_value['price'] + ')';
                        }

                        html += '</option>';
                    }

                    html += '  </select>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'text') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <input type=\"text\" name=\"option[' + option['product_option_id'] + ']\" value=\"' + option['value'] + '\" placeholder=\"' + option['name'] + '\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-control\"/>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'textarea') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <textarea name=\"option[' + option['product_option_id'] + ']\" rows=\"5\" placeholder=\"' + option['name'] + '\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-control\">' + option['value'] + '</textarea>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'file') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <div>';
                    html += '    <button type=\"button\" data-oc-toggle=\"upload\" data-oc-url=\"";
        // line 1442
        echo ($context["upload"] ?? null);
        echo "\" data-oc-target=\"#input-option-' + option['product_option_id'] + '\" data-oc-size-max=\"";
        echo ($context["config_file_max_size"] ?? null);
        echo "\" data-oc-size-error=\"";
        echo twig_escape_filter($this->env, ($context["error_upload_size"] ?? null), "js");
        echo "\" class=\"btn btn-light\"><i class=\"fa-solid fa-upload\"></i> ";
        echo twig_escape_filter($this->env, ($context["button_upload"] ?? null), "js");
        echo "</button>';
                    html += '    <a href=\"\" class=\"btn btn-light\"><i class=\"fa-solid fa-download\"></i></a>';
                    html += '    <input type=\"hidden\" name=\"option[' + option['product_option_id'] + ']\" value=\"' + option['value'] + '\" id=\"input-option-' + option['product_option_id'] + '\"/>';
                    html += '  </div>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'date') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <div class=\"input-group\"><input type=\"text\" name=\"option[' + option['product_option_id'] + ']\" value=\"' + option['value'] + '\" placeholder=\"' + option['name'] + '\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'datetime') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <div class=\"input-group\"><input type=\"text\" name=\"option[' + option['product_option_id'] + ']\" value=\"' + option['value'] + '\" placeholder=\"' + option['name'] + '\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-control datetime\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'time') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <div class=\"input-group\"><input type=\"text\" name=\"option[' + option['product_option_id'] + ']\" value=\"' + option['value'] + '\" placeholder=\"' + option['name'] + '\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-control time\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }
            }

            html += '</fieldset>';

            \$('#option').html(html);
        } else {
            \$('#option').html('');
        }

        if (item['subscription'] ) {
            html = '<fieldset class=\"mb-0\">';
            html += '  <legend>";
        // line 1484
        echo twig_escape_filter($this->env, ($context["entry_subscription"] ?? null), "js");
        echo "</legend>';
            html += '  <div class=\"mb-3 required\">';
            html += '    <select name=\"subscription_plan_id\" id=\"input-subscription-plan\" class=\"form-select\">';
            html += '      <option value=\"\">";
        // line 1487
        echo twig_escape_filter($this->env, ($context["text_select"] ?? null), "js");
        echo "</option>';

            for (i = 0; i < item['subscription'].length; i++) {
                html += '<option value=\"' + item['subscription'][i]['subscription_plan_id'] + '\">' + item['subscription'][i]['name'] + '</option>';
            }

            html += '  </select>';

            for (i = 0; i < item['subscription'].length; i++) {
                html += '  <div id=\"subscription-description-' + item['subscription'][i]['subscription_plan_id'] + '\" class=\"form-text subscription d-none\">' + item['subscription'][i]['description'] + '</div>';
            }

            html += '    <div id=\"error-subscription\" class=\"invalid-feedback\"></div>';
            html += '  </div>';
            html += '</fieldset>';

            \$('#subscription').html(html);
        } else {
            \$('#subscription').html('');
        }
    }
});

\$('#form-product-add').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 1514
        echo ($context["user_token"] ?? null);
        echo "&action=sale/cart.addProduct&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        type: 'post',
        data: \$('#form-product-add').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-product-add').button('loading');
        },
        complete: function() {
            \$('#button-product-add').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();
            \$('.is-invalid').removeClass('is-invalid');
            \$('.invalid-feedback').removeClass('d-block');

            if (json['error']) {
                if (json['error']['warning']) {
                    \$('#form-product-add').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                for (key in json['error']) {
                    \$('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                    \$('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                }
            }

            if (json['success']) {
                \$('#form-product-add').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

               // \$('#payment-method-value').html('');
               // \$('#shipping-method-value').html('');

                // Refresh products,  and totals
                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Remove product
\$('#order-products').on('submit', 'form', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 1564
        echo ($context["user_token"] ?? null);
        echo "&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&action=sale/cart.remove',
        type: 'post',
        data: \$(element).serialize(),
        dataType: 'json',
        beforeSend: function() {
            \$(e.target).button('loading');
        },
        complete: function() {
            \$(e.target).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            // Check for errors
            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

               // \$('#payment-method-value').html('');
               // \$('#shipping-method-value').html('');

                // Refresh products and totals
                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

 

 

\$('#input-store').on('change', function(e) {
    e.preventDefault();

    \$('#button-refresh').trigger('click');
});

\$('#input-language').on('change', function(e) {
    e.preventDefault();

    \$('#button-refresh').trigger('click');
});

\$('#input-currency').on('change', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 1618
        echo ($context["user_token"] ?? null);
        echo "&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&action=localisation/currency',
        type: 'post',
        data: \$('#form-currency').serialize(),
        dataType: 'json',
        beforeSend: function() {
            \$('#input-currency').prop('disabled', true);
        },
        complete: function() {
            \$('#input-currency').prop('disabled', false);
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Coupon
\$('#form-coupon').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 1652
        echo ($context["user_token"] ?? null);
        echo "&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&action=sale/coupon',
        type: 'post',
        data: \$('#form-coupon').serialize(),
        dataType: 'json',
        beforeSend: function() {
            \$('#button-coupon').button('loading');
        },
        complete: function() {
            \$('#button-coupon').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                // Refresh products and totals
                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

 
// Reward
\$('#form-reward').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 1688
        echo ($context["user_token"] ?? null);
        echo "&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&action=sale/reward',
        type: 'post',
        data: \$('#form-reward').serialize(),
        dataType: 'json',
        beforeSend: function() {
            \$('#button-reward').button('loading');
        },
        complete: function() {
            \$('#button-reward').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Reward
\$(document).on('click', '#button-reward-add, #button-reward-remove', function(e) {
    var element = this;

    if (\$(element).hasClass('btn-success')) {
        var action = 'add';
    } else {
        var action = 'remove';
    }

    \$.ajax({
        url: 'index.php?route=sale/order.' + action + 'Reward&user_token=";
        // line 1728
        echo ($context["user_token"] ?? null);
        echo "&order_id=' + \$('#input-order-id').val(),
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                if (action == 'add') {
                    \$(element).replaceWith('<button type=\"button\" id=\"button-reward-remove\" data-bs-toggle=\"tooltip\" title=\"";
        // line 1748
        echo twig_escape_filter($this->env, ($context["button_reward_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>');
                }

                if (action == 'remove') {
                    \$(element).replaceWith('<button type=\"button\" id=\"button-reward-add\" data-bs-toggle=\"tooltip\" title=\"";
        // line 1752
        echo twig_escape_filter($this->env, ($context["button_reward_add"] ?? null), "js");
        echo "\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>');
                }

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Affiliate
\$('#input-affiliate').autocomplete({
    'source': function(request, response) {
        \$.ajax({
            url: 'index.php?route=marketing/affiliate.autocomplete&user_token=";
        // line 1768
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function(json) {
                json.unshift({
                    name: '";
        // line 1772
        echo ($context["text_none"] ?? null);
        echo "',
                    customer_id: 0
                });

                response(\$.map(json, function(item) {
                    return {
                        label: item['name'],
                        value: item['customer_id']
                    }
                }));
            }
        });
    },
    'select': function(item) {
        \$('#input-affiliate-id').val(item['value']);
        \$('#input-affiliate').val(item['label']);
    }
});

// Affiliate
\$('#form-affiliate').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 1796
        echo ($context["user_token"] ?? null);
        echo "&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&action=sale/affiliate',
        type: 'post',
        data: \$('#form-affiliate').serialize(),
        dataType: 'json',
        beforeSend: function() {
            \$('#button-affiliate').button('loading');
        },
        complete: function() {
            \$('#button-affiliate').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#form-affiliate').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#form-affiliate').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                if (\$('#input-affiliate-id').val()) {
                    \$('#affiliate-value').html('<a href=\"index.php?route=marketing/affiliate.form&user_token=";
        // line 1817
        echo ($context["user_token"] ?? null);
        echo "&customer_id=' + \$('#input-affiliate-id').val() + '\" target=\"_blank\">' + \$('#input-affiliate').val() + '</a>');
                } else {
                    \$('#affiliate-value').html('&nbsp;');
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Commission
\$(document).on('click', '#button-commission-add, #button-commission-remove', function(e) {
    var element = this;

    if (\$(element).hasClass('btn-success')) {
        var action = 'add';
    } else {
        var action = 'remove';
    }

    \$.ajax({
        url: 'index.php?route=sale/order.' + action + 'Commission&user_token=";
        // line 1840
        echo ($context["user_token"] ?? null);
        echo "&order_id=' + \$('#input-order-id').val(),
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                if (action == 'add') {
                    \$(element).replaceWith('<button type=\"button\" id=\"button-commission-remove\" data-bs-toggle=\"tooltip\" title=\"";
        // line 1860
        echo twig_escape_filter($this->env, ($context["button_commission_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>');
                }

                if (action == 'remove') {
                    \$(element).replaceWith('<button type=\"button\" id=\"button-commission-add\" data-bs-toggle=\"tooltip\" title=\"";
        // line 1864
        echo twig_escape_filter($this->env, ($context["button_commission_add"] ?? null), "js");
        echo "\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>');
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Payment Address
\$('#input-payment-address').on('change', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=customer/customer.address&user_token=";
        // line 1879
        echo ($context["user_token"] ?? null);
        echo "&address_id=' + this.value,
        dataType: 'json',
        beforeSend: function() {
            \$(element).prop('disabled', true);
        },
        complete: function() {
            \$(element).prop('disabled', false);
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#form-payment-address').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            // Reset all fields
            \$('#form-payment-address input[type=\\'text\\'], #form-payment-address textarea').val('');
            \$('#form-payment-address select option').not('#input-payment-address').removeAttr('selected');
            \$('#form-payment-address input[type=\\'checkbox\\'], #form-payment-address input[type=\\'radio\\']').removeAttr('checked');

            \$('#input-payment-firstname').val(json['firstname']);
            \$('#input-payment-lastname').val(json['lastname']);
            \$('#input-payment-company').val(json['company']);
            \$('#input-payment-address-1').val(json['address_1']);
            \$('#input-payment-address-2').val(json['phone']);
            \$('#input-payment-city').val(json['city']);
            \$('#input-payment-postcode').val(json['postcode']);
            \$('#input-payment-country').val(json['country_id']);

            payment_zone_id = json['zone_id'];

            \$('#input-payment-country').trigger('change');

            for (i in json['custom_field']) {
                \$('#input-payment-custom-field-' + i).val(json['custom_field'][i]);

                if (json['custom_field'][i] instanceof Array) {
                    for (j = 0; j < json['custom_field'][i].length; j++) {
                        \$('#input-payment-custom-field-value-' + item.custom_field[i][j]).prop('checked', true);
                    }
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#form-payment-address').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 1932
        echo ($context["user_token"] ?? null);
        echo "&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&action=sale/payment_address'  + \"&order_id=";
        echo ($context["order_id"] ?? null);
        echo "\",
        type: 'post',
        data: \$('#form-payment-address').serialize(),
        dataType: 'json',
        beforeSend: function() {
            \$('#button-payment-address').button('loading');
        },
        complete: function() {
            \$('#button-payment-address').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();
            \$('.is-invalid').removeClass('is-invalid');
            \$('.invalid-feedback').removeClass('d-block');

            // Check for errors
            if (json['error']) {
                if (json['error']['warning']) {
                    \$('#form-payment-address').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                for (key in json['error']) {
                    \$('#input-payment-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                    \$('#error-payment-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                }
            }

            if (json['success']) {
                \$('#form-payment-address').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                var address = \$('#input-payment-firstname').val() + ' ' + \$('#input-payment-lastname').val() + \"<br/>\";

                var company = \$('#input-payment-company').val();

                if (company) {
                    address += \$('#input-payment-company').val() + \"<br/>\";
                }

                address += \$('#input-payment-address-1').val() + \"<br/>\";

                var phone = \$('#input-payment-address-2').val();

                if (phone) {
                    address += \$('#input-payment-address-2').val() + \"<br/>\";
                }

                address += \$('#input-payment-city').val() + \"<br/>\";

                var postcode = \$('#input-payment-postcode').val();

                if (postcode) {
                    address += postcode + \"<br/>\";
                }

                address += \$('#input-payment-zone option:selected').text() + \"<br/>\";
                address += \$('#input-payment-country option:selected').text();

                \$('#payment-address-value').html(address);

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

var payment_zone_id = '";
        // line 2000
        echo ($context["payment_zone_id"] ?? null);
        echo "';

\$('#input-payment-country').on('change', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=localisation/country.country&user_token=";
        // line 2006
        echo ($context["user_token"] ?? null);
        echo "&country_id=' + this.value,
        dataType: 'json',
        beforeSend: function() {
            \$(element).prop('disabled', true);
        },
        complete: function() {
            \$(element).prop('disabled', false);
        },
        success: function(json) {
            if (json['postcode_required'] == '1') {
                \$('#input-payment-postcode').parent().addClass('required');
            } else {
                \$('#input-payment-postcode').parent().removeClass('required');
            }

            html = '<option value=\"\">";
        // line 2021
        echo twig_escape_filter($this->env, ($context["text_select"] ?? null), "js");
        echo "</option>';

            if (json['zone'] && json['zone'] != '') {
                for (i = 0; i < json['zone'].length; i++) {
                    html += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';

                    if (json['zone'][i]['zone_id'] == payment_zone_id) {
                        html += ' selected';
                    }

                    html += '>' + json['zone'][i]['name'] + '</option>';
                }
            } else {
                html += '<option value=\"0\" selected>";
        // line 2034
        echo twig_escape_filter($this->env, ($context["text_none"] ?? null), "js");
        echo "</option>';
            }

            \$('#input-payment-zone').html(html);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-payment-country').trigger('change');

// Shipping Address
\$('#input-shipping-address').on('change', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=customer/customer.address&user_token=";
        // line 2052
        echo ($context["user_token"] ?? null);
        echo "&address_id=' + this.value,
        dataType: 'json',
        beforeSend: function() {
            \$(element).prop('disabled', true);
        },
        complete: function() {
            \$(element).prop('disabled', false);
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#form-shipping-address').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            // Reset all fields
            \$('#form-shipping-address input[type=\\'text\\'], #form-shipping-address input[type=\\'text\\'], #form-shipping-address textarea').val('');
            \$('#form-shipping-address select option').not('#input-shipping-address').removeAttr('selected');
            \$('#form-shipping-address input[type=\\'checkbox\\'], #form-shipping-address input[type=\\'radio\\']').removeAttr('checked');

            \$('#input-shipping-firstname').val(json['firstname']);
            \$('#input-shipping-lastname').val(json['lastname']);
            \$('#input-shipping-company').val(json['company']);
            \$('#input-shipping-address-1').val(json['address_1']);
            \$('#input-shipping-address-2').val(json['phone']);
            \$('#input-shipping-city').val(json['city']);
            \$('#input-shipping-postcode').val(json['postcode']);
            \$('#input-shipping-country').val(json['country_id']);

            shipping_zone_id = json['zone_id'];

            \$('#input-shipping-country').trigger('change');

            for (i in json['custom_field']) {
                \$('#input-shipping-custom-field-' + i).val(json['custom_field'][i]);

                if (json['custom_field'][i] instanceof Array) {
                    for (j = 0; j < json['custom_field'][i].length; j++) {
                        \$('#input-shipping-custom-field-value-' + json['custom_field'][i][j]).prop('checked', true);
                    }
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#form-shipping-address').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 2105
        echo ($context["user_token"] ?? null);
        echo "&action=sale/shipping_address&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        type: 'post',
        data: \$('#form-shipping-address').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-shipping-address').button('loading');
        },
        complete: function() {
            \$('#button-shipping-address').button('reset');
        },
        success: function(json) {
            \$('#form-shipping-address .alert-dismissible').remove();
            \$('#form-shipping-address .is-invalid').removeClass('is-invalid');
            \$('#form-shipping-address .invalid-feedback').removeClass('d-block');

            // Check for errors
            if (json['error']) {
                if (json['error']['warning']) {
                    \$('#form-shipping-address').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                for (key in json['error']) {
                    \$('#input-shipping-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                    \$('#error-shipping-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                }
            }

            if (json['success']) {
                \$('#form-shipping-address').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                var address = \$('#input-shipping-firstname').val() + ' ' + \$('#input-shipping-lastname').val() + \"<br/>\";

                var company = \$('#input-shipping-company').val();

                if (company) {
                    address += \$('#input-shipping-company').val() + \"<br/>\";
                }

                address += \$('#input-shipping-address-1').val() + \"<br/>\";

                var phone = \$('#input-shipping-address-2').val();

                if (phone) {
                    address += \$('#input-shipping-address-2').val() + \"<br/>\";
                }

                address += \$('#input-shipping-city').val() + \"<br/>\";

                var postcode = \$('#input-shipping-postcode').val();

                if (postcode) {
                    address += postcode + \"<br/>\";
                }

                address += \$('#input-shipping-zone option:selected').text() + \"<br/>\";
                address += \$('#input-shipping-country option:selected').text();

                \$('#shipping-address-value').html(address);

                // Refresh products and totals
                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

var shipping_zone_id = '";
        // line 2175
        echo ($context["shipping_zone_id"] ?? null);
        echo "';

\$('#input-shipping-country').on('change', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=localisation/country.country&user_token=";
        // line 2181
        echo ($context["user_token"] ?? null);
        echo "&country_id=' + this.value,
        dataType: 'json',
        beforeSend: function() {
            \$(element).prop('disabled', true);
        },
        complete: function() {
            \$(element).prop('disabled', false);
        },
        success: function(json) {
            if (json['postcode_required'] == '1') {
                \$('#input-shipping-postcode').parent().addClass('required');
            } else {
                \$('#input-shipping-postcode').parent().removeClass('required');
            }

            html = '<option value=\"\">";
        // line 2196
        echo twig_escape_filter($this->env, ($context["text_select"] ?? null), "js");
        echo "</option>';

            if (json['zone'] && json['zone'] != '') {
                for (i = 0; i < json['zone'].length; i++) {
                    html += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';

                    if (json['zone'][i]['zone_id'] == shipping_zone_id) {
                        html += ' selected';
                    }

                    html += '>' + json['zone'][i]['name'] + '</option>';
                }
            } else {
                html += '<option value=\"0\" selected>";
        // line 2209
        echo twig_escape_filter($this->env, ($context["text_none"] ?? null), "js");
        echo "</option>';
            }

            \$('#input-shipping-zone').html(html);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-shipping-country').trigger('change');

// Shipping Method
\$('#button-shipping-methods').on('click', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 2227
        echo ($context["user_token"] ?? null);
        echo "&action=sale/shipping_method&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['shipping_methods']) {
                html = '';

                for (i in json['shipping_methods']) {
                    html += '<p><strong>' + json['shipping_methods'][i]['name'] + '</strong></p>';

                    if (!json['shipping_methods'][i]['error']) {
                        for (j in json['shipping_methods'][i]['quote']) {
                            html += '<div class=\"form-check\">';

                            var code = i + '-' + j.replaceAll('_', '-');

                            html += '<input type=\"radio\" name=\"shipping_method\" value=\"' + json['shipping_methods'][i]['quote'][j]['code'] + '\" id=\"input-shipping-method-' + code + '\"';

                            if (json['shipping_methods'][i]['quote'][j]['code'] == \$('#input-shipping-code').val()) {
                                html += ' checked';
                            }

                            html += '/>';
                            html += '  <label for=\"input-shipping-method-' + code + '\">' + json['shipping_methods'][i]['quote'][j]['name'] + ' - ' + json['shipping_methods'][i]['quote'][j]['text'] + '</label>';
                            html += '</div>';
                        }
                    } else {
                        html += '<div class=\"alert alert-danger\">' + json['shipping_methods'][i]['error'] + '</div>';
                    }
                }

                \$('#shipping-methods').html(html);

                \$('#modal-shipping').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#form-shipping-method').on('submit', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 2286
        echo ($context["user_token"] ?? null);
        echo "&action=sale/shipping_method.save&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        type: 'post',
        data: \$('#form-shipping-method').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-shipping-method').button('loading');
        },
        complete: function() {
            \$('#button-shipping-method').button('reset');
        },
        success: function(json) {
            console.log(json);

            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#form-shipping-method').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#form-shipping-method').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#shipping-method-value').html(\$('input[name=\\'shipping_method\\']:checked').parent().find('label').text());
                \$('#input-shipping-code').val(\$('input[name=\\'shipping_method\\']:checked').val());

                //\$('#payment-method-value').html('');

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Payment Method
\$('#button-payment-methods').on('click', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 2328
        echo ($context["user_token"] ?? null);
        echo "&action=sale/payment_method&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val()  + \"&order_id=";
        echo ($context["order_id"] ?? null);
        echo "\",
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['payment_methods']) {
                var html = '';

                for (i in json['payment_methods']) {
                    html += '<p><strong>' + json['payment_methods'][i]['name'] + '</strong></p>';

                    if (!json['payment_methods'][i]['error']) {
                        for (j in json['payment_methods'][i]['option']) {
                            html += '<div class=\"form-check\">';

                            var code = i + '-' + j.replaceAll('_', '-');

                            html += '<input type=\"radio\" name=\"payment_method\" value=\"' + json['payment_methods'][i]['option'][j]['code'] + '\" id=\"input-payment-method-' + code + '\"';

                            if (json['payment_methods'][i]['option'][j]['code'] == \$('#input-payment-code').val()) {
                                html += ' checked';
                            }

                            html += '/>';
                            html += '  <label for=\"input-payment-method-' + code + '\">' + json['payment_methods'][i]['option'][j]['name'] + '</label>';
                            html += '</div>';
                        }
                    } else {
                        html += '<div class=\"alert alert-danger\">' + json['payment_methods'][i]['error'] + '</div>';
                    }
                }

                \$('#payment-methods').html(html);

                \$('#modal-payment').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#form-payment-method').on('submit', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 2387
        echo ($context["user_token"] ?? null);
        echo "&action=sale/payment_method.save&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        type: 'post',
        data: \$('#form-payment-method').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-payment-method').button('loading');
        },
        complete: function() {
            \$('#button-payment-method').button('reset');
        },
        success: function(json) {
            console.log(json);

            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#form-payment-method').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#form-payment-method').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#payment-method-value').html(\$('input[name=\\'payment_method\\']:checked').parent().find('label').text());
                \$('#input-payment-code').val(\$('input[name=\\'payment_method\\']:checked').val());

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#form-comment').on('submit', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 2428
        echo ($context["user_token"] ?? null);
        echo "&action=sale/order.comment&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        type: 'post',
        data: \$('#form-comment').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-comment').button('loading');
        },
        complete: function() {
            \$('#button-comment').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            // Check for errors
            if (json['error']) {
                \$('#form-comment').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#form-comment').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#comment-value').html(\$('#input-comment').val().replace(/([^>\\r\\n]?)(\\r\\n|\\n\\r|\\r|\\n)/g, '\$1<br/>\$2'));
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Refresh all products and totals
\$('#button-refresh').on('click', function() {
  \$.ajax({
    url: 'index.php?route=sale/order.call&user_token=";
        // line 2462
        echo ($context["user_token"] ?? null);
        echo "&action=sale/cart&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val()  + \"&order_id=";
        echo ($context["order_id"] ?? null);
        echo "\",
    dataType: 'json',
    beforeSend: function() {
        \$('#button-refresh').button('loading');
        \$('#button-confirm').prop('disabled', true);
    },
    complete: function() {
        \$('#button-refresh').button('reset');
        \$('#button-confirm').prop('disabled', false);
    },
    success: function(json) {
        let html = '';

        if (Object.keys(json['products']).length > 0) {
         
            for (const productId in json['products']) {
                const product = json['products'][productId];

                html += '<tr>';
                html += '  <td class=\"text-start\"><a href=\"index.php?route=catalog/product.form&user_token=";
        // line 2481
        echo ($context["user_token"] ?? null);
        echo "&product_id=' + product['product_id'] + '\" target=\"_blank\">' + product['name'] + '</a>' + (!product['stock'] ? ' <span class=\"text-danger\">***</span>' : '');

                if (product['option']) {
                    for (const option of product['option']) {
                        html += '<br/>';
                        html += '  - <small>' + option['name'] + ': ' + option['value'] + '</small>';
                    }
                }

                if (product['reward']) {
                    html += '<br/>';
                    html += '  - <small>";
        // line 2492
        echo twig_escape_filter($this->env, ($context["text_points"] ?? null), "js");
        echo ": ' + product['reward'] + '</small>';
                }
               
                if (product['subscription'].length > 0) {
                    html += '<br/>';
                    html += '  - <small>";
        // line 2497
        echo twig_escape_filter($this->env, ($context["text_subscription"] ?? null), "js");
        echo ": <a href=\"index.php?route=sale/subscription.info&user_token=";
        echo ($context["user_token"] ?? null);
        echo "&subscription_id=";
        echo twig_get_attribute($this->env, $this->source, ($context["order_product"] ?? null), "subscription_id", [], "any", false, false, false, 2497);
        echo "\" target=\"_blank\">' + product['subscription'] + '</small>';
                }

                html += '  </td>';
                html += '  <td class=\"text-start\">' + product['sku'] + '</td>';
                html += '  <td class=\"text-end\">' + product['quantity'] + '</td>';
                html += '  <td class=\"text-end\">' + product['price'] + '</td>';
                html += '  <td class=\"text-end\">' + product['total'] + '</td>';
                html += '  <td class=\"text-end\">';
                html += '    <form>';
                html += '      <button type=\"submit\" data-bs-toggle=\"tooltip\" title=\"";
        // line 2507
        echo twig_escape_filter($this->env, ($context["button_remove"] ?? null), "js");
        echo "\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>';
                html += '      <input type=\"hidden\" name=\"card_id\" value=\"' + product['cart_id'] + '\"/>';
                html += '    </form>';
                html += '  </td>';
                html += '</tr>';
            }
        }

        \$('#order-products').html(html);

        html = '';

    
        if (json['products'].length === 0) {
            console.log(json['products']);
            html += '<tr>';
            html += '  <td colspan=\"6\" class=\"text-center\">";
        // line 2523
        echo twig_escape_filter($this->env, ($context["text_no_results"] ?? null), "js");
        echo "</td>';
            html += '</tr>';
        }
 
        // Totals
        html = '';

        if (json['totals']?.length) {
            for (const total of json['totals']) {
                html += '<tr>';
                html += '  <td class=\"text-end\"><strong>' + total['title'] + '</strong></td>';
                html += '  <td class=\"text-end\" style=\"width: 1px;\">' + total['text'] + '</td>';
                html += '</tr>';
            }
        }

        \$('#order-totals').html(html);

        if (json['shipping_required']) {
            \$('#shipping-address').removeClass('d-none');
            \$('#shipping-method').removeClass('d-none');
            \$('#button-shipping').prop('disabled', false);
        } else {
       
            \$('#button-shipping').prop('disabled', true);
        }
    }
});

});
 
// Checkout
\$('#button-confirm').on('click', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 2559
        echo ($context["user_token"] ?? null);
        echo "&action=sale/order.confirm&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + \"&order_id=";
        echo ($context["order_id"] ?? null);
        echo "\" ,
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            console.log(json);

            \$('.alert-dismissible').remove();

            if (json['error']) {
                for (i in json['error']) {
                    \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'][i] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                if (json['order_id']) {
                    \$('#input-order-id').val(json['order_id']);
                }

                if (json['points']) {
                    \$('#reward-value').html(json['points']);
                    \$('#button-reward-add').prop('disabled', false);
                    \$('#button-reward-remove').prop('disabled', false);
                } else {
                    \$('#reward-value').html(0);
                    \$('#button-reward-add').prop('disabled', true);
                    \$('#button-reward-remove').prop('disabled', true);
                }

                if (json['commission']) {
                    \$('#commission-value').html(json['commission']);
                    \$('#button-commission-add').prop('disabled', false);
                    \$('#button-commission-remove').prop('disabled', false);
                } else {
                    \$('#commission-value').html('&nbsp;');
                    \$('#button-commission-add').prop('disabled', true);
                    \$('#button-commission-remove').prop('disabled', true);
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#history').on('click', '.pagination a', function(e) {
    e.preventDefault();

    \$('#history').load(this.href);
});

\$('#form-history').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token=";
        // line 2622
        echo ($context["user_token"] ?? null);
        echo "&action=sale/order.addHistory&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&order_id=' + \$('#input-order-id').val(),
        type: 'post',
        dataType: 'json',
        data: \$('#form-history').serialize(),
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-history').button('loading');
        },
        complete: function() {
            \$('#button-history').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#history').load('index.php?route=sale/order.history&user_token=";
        // line 2643
        echo ($context["user_token"] ?? null);
        echo "&order_id=' + \$('#input-order-id').val());

                \$('#input-history').val('');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});
//--></script>
";
        // line 2654
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "cp-akis/view//plates/sale/order_info.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  4736 => 2654,  4722 => 2643,  4698 => 2622,  4630 => 2559,  4591 => 2523,  4572 => 2507,  4555 => 2497,  4547 => 2492,  4533 => 2481,  4509 => 2462,  4472 => 2428,  4428 => 2387,  4364 => 2328,  4319 => 2286,  4257 => 2227,  4236 => 2209,  4220 => 2196,  4202 => 2181,  4193 => 2175,  4120 => 2105,  4064 => 2052,  4043 => 2034,  4027 => 2021,  4009 => 2006,  4000 => 2000,  3927 => 1932,  3871 => 1879,  3853 => 1864,  3846 => 1860,  3823 => 1840,  3797 => 1817,  3773 => 1796,  3746 => 1772,  3739 => 1768,  3720 => 1752,  3713 => 1748,  3690 => 1728,  3647 => 1688,  3608 => 1652,  3571 => 1618,  3514 => 1564,  3461 => 1514,  3431 => 1487,  3425 => 1484,  3374 => 1442,  3332 => 1403,  3279 => 1353,  3253 => 1330,  3241 => 1321,  3213 => 1296,  3192 => 1278,  3156 => 1245,  3124 => 1216,  3104 => 1199,  3049 => 1147,  3045 => 1146,  3037 => 1141,  2999 => 1108,  2977 => 1089,  2969 => 1086,  2960 => 1080,  2946 => 1069,  2940 => 1066,  2932 => 1061,  2918 => 1050,  2915 => 1049,  2909 => 1048,  2905 => 1046,  2899 => 1043,  2887 => 1040,  2880 => 1038,  2875 => 1037,  2873 => 1036,  2870 => 1035,  2864 => 1032,  2852 => 1029,  2845 => 1027,  2840 => 1026,  2838 => 1025,  2835 => 1024,  2829 => 1021,  2817 => 1018,  2810 => 1016,  2805 => 1015,  2803 => 1014,  2800 => 1013,  2794 => 1010,  2783 => 1008,  2773 => 1007,  2765 => 1006,  2753 => 1005,  2748 => 1003,  2743 => 1002,  2741 => 1001,  2738 => 1000,  2732 => 997,  2716 => 996,  2711 => 995,  2709 => 994,  2706 => 993,  2700 => 990,  2686 => 989,  2681 => 988,  2679 => 987,  2676 => 986,  2670 => 983,  2667 => 982,  2646 => 979,  2643 => 978,  2639 => 977,  2635 => 976,  2631 => 975,  2626 => 974,  2624 => 973,  2621 => 972,  2615 => 969,  2612 => 968,  2591 => 965,  2588 => 964,  2584 => 963,  2580 => 962,  2576 => 961,  2571 => 960,  2569 => 959,  2566 => 958,  2560 => 955,  2557 => 954,  2542 => 952,  2538 => 951,  2534 => 950,  2524 => 949,  2519 => 948,  2517 => 947,  2514 => 946,  2511 => 945,  2507 => 944,  2500 => 940,  2493 => 935,  2478 => 933,  2474 => 932,  2470 => 931,  2466 => 930,  2455 => 926,  2444 => 922,  2434 => 919,  2423 => 915,  2413 => 912,  2402 => 908,  2391 => 904,  2386 => 901,  2357 => 899,  2353 => 898,  2349 => 897,  2344 => 895,  2335 => 889,  2321 => 878,  2315 => 875,  2307 => 870,  2293 => 859,  2290 => 858,  2284 => 857,  2281 => 856,  2275 => 853,  2263 => 850,  2256 => 848,  2251 => 847,  2248 => 846,  2242 => 843,  2230 => 840,  2223 => 838,  2218 => 837,  2215 => 836,  2209 => 833,  2197 => 830,  2190 => 828,  2185 => 827,  2182 => 826,  2176 => 823,  2165 => 821,  2155 => 820,  2147 => 819,  2135 => 818,  2130 => 816,  2125 => 815,  2122 => 814,  2116 => 811,  2102 => 810,  2097 => 809,  2094 => 808,  2088 => 805,  2074 => 804,  2069 => 803,  2066 => 802,  2060 => 799,  2057 => 798,  2036 => 795,  2033 => 794,  2029 => 793,  2025 => 792,  2021 => 791,  2016 => 790,  2013 => 789,  2007 => 786,  2004 => 785,  1983 => 782,  1980 => 781,  1976 => 780,  1972 => 779,  1968 => 778,  1963 => 777,  1960 => 776,  1954 => 773,  1951 => 772,  1936 => 770,  1932 => 769,  1928 => 768,  1918 => 767,  1913 => 766,  1910 => 765,  1907 => 764,  1903 => 763,  1897 => 760,  1891 => 756,  1876 => 754,  1872 => 753,  1868 => 752,  1863 => 750,  1854 => 746,  1850 => 745,  1841 => 741,  1837 => 740,  1829 => 737,  1825 => 736,  1816 => 732,  1812 => 731,  1804 => 728,  1800 => 727,  1791 => 723,  1787 => 722,  1778 => 718,  1774 => 717,  1769 => 714,  1740 => 712,  1736 => 711,  1732 => 710,  1727 => 708,  1718 => 702,  1704 => 691,  1691 => 687,  1682 => 681,  1665 => 667,  1656 => 661,  1652 => 660,  1644 => 655,  1640 => 654,  1635 => 652,  1625 => 645,  1617 => 640,  1603 => 629,  1600 => 628,  1594 => 627,  1590 => 625,  1584 => 622,  1572 => 619,  1565 => 617,  1560 => 616,  1558 => 615,  1555 => 614,  1549 => 611,  1537 => 608,  1530 => 606,  1525 => 605,  1523 => 604,  1520 => 603,  1514 => 600,  1502 => 597,  1495 => 595,  1490 => 594,  1488 => 593,  1485 => 592,  1479 => 589,  1468 => 587,  1458 => 586,  1450 => 585,  1438 => 584,  1433 => 582,  1428 => 581,  1426 => 580,  1423 => 579,  1417 => 576,  1403 => 575,  1398 => 574,  1396 => 573,  1393 => 572,  1387 => 569,  1373 => 568,  1368 => 567,  1366 => 566,  1363 => 565,  1357 => 562,  1354 => 561,  1333 => 558,  1330 => 557,  1326 => 556,  1322 => 555,  1318 => 554,  1313 => 553,  1311 => 552,  1308 => 551,  1302 => 548,  1299 => 547,  1278 => 544,  1275 => 543,  1271 => 542,  1267 => 541,  1263 => 540,  1258 => 539,  1256 => 538,  1253 => 537,  1247 => 534,  1244 => 533,  1229 => 531,  1225 => 530,  1221 => 529,  1211 => 528,  1206 => 527,  1204 => 526,  1201 => 525,  1198 => 524,  1194 => 523,  1184 => 520,  1178 => 519,  1167 => 515,  1162 => 513,  1153 => 509,  1149 => 508,  1140 => 504,  1136 => 503,  1131 => 500,  1116 => 498,  1112 => 497,  1107 => 495,  1100 => 491,  1087 => 489,  1082 => 487,  1073 => 481,  1061 => 471,  1050 => 469,  1046 => 468,  1037 => 462,  1033 => 461,  1027 => 458,  1023 => 457,  1020 => 456,  1014 => 453,  1010 => 452,  1007 => 451,  1005 => 450,  1000 => 448,  996 => 447,  988 => 442,  976 => 433,  970 => 430,  963 => 426,  958 => 424,  946 => 415,  939 => 411,  930 => 405,  924 => 401,  909 => 399,  905 => 398,  899 => 395,  894 => 393,  887 => 389,  883 => 388,  876 => 383,  865 => 381,  861 => 380,  857 => 379,  853 => 378,  847 => 375,  838 => 369,  834 => 368,  829 => 365,  820 => 362,  816 => 361,  813 => 360,  809 => 359,  798 => 350,  794 => 348,  788 => 346,  786 => 345,  781 => 343,  767 => 332,  763 => 330,  759 => 328,  753 => 326,  751 => 325,  746 => 323,  735 => 315,  731 => 313,  727 => 311,  721 => 309,  719 => 308,  714 => 306,  706 => 303,  694 => 293,  688 => 291,  685 => 290,  678 => 287,  675 => 286,  668 => 283,  665 => 282,  658 => 279,  655 => 278,  648 => 275,  645 => 274,  638 => 271,  635 => 270,  628 => 267,  625 => 266,  616 => 263,  614 => 262,  608 => 259,  600 => 256,  591 => 249,  585 => 247,  582 => 246,  575 => 243,  573 => 242,  570 => 241,  563 => 238,  561 => 237,  558 => 236,  551 => 233,  549 => 232,  546 => 231,  539 => 228,  537 => 227,  534 => 226,  527 => 223,  525 => 222,  522 => 221,  515 => 218,  513 => 217,  510 => 216,  501 => 213,  499 => 212,  493 => 209,  481 => 199,  475 => 197,  465 => 195,  463 => 194,  459 => 192,  455 => 190,  449 => 188,  447 => 187,  442 => 185,  431 => 176,  427 => 174,  417 => 172,  415 => 171,  410 => 169,  402 => 163,  396 => 161,  386 => 159,  384 => 158,  378 => 155,  373 => 153,  357 => 144,  344 => 134,  336 => 133,  324 => 125,  309 => 123,  305 => 122,  292 => 113,  277 => 111,  273 => 110,  260 => 101,  245 => 99,  241 => 98,  210 => 70,  206 => 69,  202 => 68,  198 => 67,  194 => 66,  190 => 65,  178 => 56,  173 => 54,  163 => 46,  155 => 44,  143 => 42,  141 => 41,  136 => 39,  128 => 33,  124 => 31,  118 => 29,  116 => 28,  109 => 25,  104 => 23,  94 => 16,  87 => 11,  76 => 9,  72 => 8,  67 => 6,  45 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\"><a href=\"{{ invoice }}\" target=\"_blank\" data-bs-toggle=\"tooltip\" title=\"{{ button_invoice_print }}\" class=\"btn btn-info{% if not order_id %} disabled{% endif %}\"><i class=\"fa-solid fa-print\"></i></a> <a href=\"{{ shipping }}\" target=\"_blank\" data-bs-toggle=\"tooltip\" title=\"{{ button_shipping_print }}\" class=\"btn btn-info{% if not shipping_code %} disabled{% endif %}\"><i class=\"fa-solid fa-truck\"></i></a> <a href=\"{{ back }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_back }}\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a></div>
      <h1>{{ heading_title }}</h1>
      <ol class=\"breadcrumb\">
        {% for breadcrumb in breadcrumbs %}
          <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
        {% endfor %}
      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card mb-3\">
      <div class=\"card-header\"><i class=\"fa-solid fa-info-circle\"></i> {{ text_form }}</div>
      <div class=\"card-body\">
        <div class=\"row row-cols-1 row-cols-sm-1 row-cols-md-3 row-cols-xl-3\">

          <div class=\"col\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>{{ text_invoice }}</strong>
                  <br/>
                  <span id=\"invoice-value\">{{ invoice_prefix }}{{ invoice_no }}</span>
                </div>
              </div>
              {% if not invoice_no %}
                <button type=\"button\" id=\"button-invoice\" data-bs-toggle=\"tooltip\" title=\"{{ button_generate }}\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>
              {% else %}
                <button type=\"button\" disabled=\"disabled\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>
              {% endif %}
            </div>
          </div>

          <div class=\"col\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>{{ text_customer }}</strong>
                  <br/>
                  {% if customer_id %}
                    <div id=\"customer-value\"><a href=\"index.php?route=customer/customer.form&user_token={{ user_token }}&customer_id={{ customer_id }}\" target=\"_blank\">{{ firstname }} {{ lastname }}</a></div>
                  {% else %}
                    <div id=\"customer-value\">{{ firstname }} {{ lastname }}</div>
                  {% endif %}
                </div>
              </div>
              <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-customer\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>
            </div>
          </div>

          <div class=\"col\">
            <div class=\"form-control p-0 border rounded mb-3\">
              <div class=\"lead p-2\"><strong>{{ text_date_added }}</strong>
                <br/>
                {{ date_added }}
              </div>
            </div>
          </div>
        </div>

        <table class=\"table table-bordered\">
          <thead>
            <tr>
              <td class=\"text-start\">{{ column_product }}</td>
              <td class=\"text-start\">{{ column_sku }}</td>
              <td class=\"text-end\">{{ column_quantity }}</td>
              <td class=\"text-end\">{{ column_price }}</td>
              <td class=\"text-end\">{{ column_total }}</td>
              <td class=\"text-end\" style=\"width: 1px;\">{{ column_action }}</td>
            </tr>
          </thead>

          <tbody id=\"order-products\">
          
          <tr><td>  <div style=\"min-height: 300px !important;\" class=\"d-flex m-3 mt-10 justify-content-center my-3\">
        <div class=\"spinner-border text-primary\" role=\"status\">
            <span class=\"visually-hidden\">Loading...</span>
        </div>
    </div></td></tr>
          </tbody>
       
          <tfoot>
            <tr>
              <td colspan=\"5\"></td>
              <td class=\"text-end\"><button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-cart\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i></button></td>
            </tr>
          </tfoot>
        </table>

        <div id=\"collapse-order\"  >
          <div class=\"row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4\">

            <div class=\"col\">
              <form id=\"form-store\" class=\"mb-3\">
                <div class=\"form-floating\">
                  <select name=\"store_id\" id=\"input-store\" class=\"form-select\">
                    {% for store in stores %}
                      <option value=\"{{ store.store_id }}\"{% if store.store_id == store_id %} selected{% endif %}>{{ store.name }}</option>
                    {% endfor %}
                  </select> <label for=\"input-store\">{{ entry_store }}</label>
                </div>
              </form>
            </div>

            <div class=\"col\">
              <form id=\"form-language\" class=\"mb-3\">
                <div class=\"form-floating\">
                  <select name=\"language\" id=\"input-language\" class=\"form-select\">
                    {% for language in languages %}
                      <option value=\"{{ language.code }}\"{% if language.code == language_code %} selected{% endif %}>{{ language.name }}</option>
                    {% endfor %}
                  </select> <label for=\"input-language\">{{ entry_language }}</label>
                </div>
              </form>
            </div>

            <div class=\"col\">
              <form id=\"form-currency\" class=\"mb-3\">
                <div class=\"form-floating\">
                  <select name=\"currency\" id=\"input-currency\" class=\"form-select\">
                    {% for currency in currencies %}
                      <option value=\"{{ currency.code }}\"{% if currency.code == currency_code %} selected{% endif %}>{{ currency.title }}</option>
                    {% endfor %}
                  </select> <label for=\"input-currency\">{{ entry_currency }}</label>
                </div>
              </form>
            </div>

            <div class=\"col\">
              <form id=\"form-coupon\" class=\"mb-3\">
                <div class=\"input-group form-floating\">
                  <input type=\"text\" name=\"coupon\" value=\"{{ total_coupon }}\" placeholder=\"{{ entry_coupon }}\" id=\"input-coupon\" class=\"form-control\"/> <label for=\"input-coupon\">{{ entry_coupon }}</label>
                  <button type=\"submit\" id=\"button-coupon\" data-bs-toogle=\"tooltip\" title=\"{{ button_apply }}\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-check\"></i></button>
                </div>
              </form>
            </div>

  

            <div class=\"col\">
              <form id=\"form-reward\" class=\"mb-3\">
                <div class=\"input-group form-floating\">
                  <input type=\"text\" name=\"reward\" value=\"{{ total_reward }}\" placeholder=\"{{ entry_reward }}\" id=\"input-reward\" class=\"form-control\"/> <label for=\"input-reward\">{{ entry_reward }}</label>
                  <button type=\"submit\" id=\"button-reward\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-check\"></i></button>
                </div>
              </form>
            </div>

            <div class=\"col\">
              <div class=\"input-group\">
                <div class=\"form-control border rounded-start\">
                  <div class=\"lead p-0\"><strong>{{ text_reward }}</strong>
                    <br/>
                    <div id=\"reward-value\">{{ points }}</div>
                  </div>
                </div>
                {% if not reward_total %}
                  <button type=\"button\" id=\"button-reward-add\" data-bs-toggle=\"tooltip\" title=\"{{ button_reward_add }}\" class=\"btn btn-success\"{% if not customer_id or not points %} disabled{% endif %}><i class=\"fa-solid fa-plus-circle\"></i></button>
                {% else %}
                  <button type=\"button\" id=\"button-reward-remove\" data-bs-toggle=\"tooltip\" title=\"{{ button_reward_remove }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
                {% endif %}
              </div>
            </div>

            <div class=\"col\">
              <div class=\"input-group mb-3\">
                <div class=\"form-control border rounded-start\">
                  <div class=\"lead\"><strong>{{ text_affiliate }}</strong>
                    <br/>
                    {% if affiliate_id %}
                      <div id=\"affiliate-value\"><a href=\"index.php?route=marketing/affiliate.form&user_token={{ user_token }}&customer_id={{ affiliate_id }}\" target=\"_blank\">{{ affiliate }}</a></div>
                    {% else %}
                      <div id=\"affiliate-value\">&nbsp;</div>
                    {% endif %}
                  </div>
                </div>
                <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-affiliate\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>
              </div>
            </div>

            <div class=\"col\">
              <div class=\"input-group mb-3\">
                <div class=\"form-control border rounded-start\">
                  <div class=\"lead\"><strong>{{ text_commission }}</strong>
                    <br/>
                    {% if commission %}
                      <div id=\"commission-value\">{{ commission }}</div>
                    {% else %}
                      <div id=\"commission-value\">&nbsp;</div>
                    {% endif %}
                  </div>
                </div>
                {% if not commission_total %}
                  <button type=\"button\" id=\"button-commission-add\" data-bs-toggle=\"tooltip\" title=\"{{ button_commission_add }}\" class=\"btn btn-success\"{% if not affiliate_id %} disabled{% endif %}><i class=\"fa-solid fa-plus-circle\"></i></button>
                {% else %}
                  <button type=\"button\" id=\"button-commission-remove\" data-bs-toggle=\"tooltip\" title=\"{{ button_commission_remove }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>
                {% endif %}
              </div>
            </div>

          </div>
        </div>
 
        <div class=\"row\">
          <div class=\"col-md\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>{{ text_payment_address }}</strong>
                  <br/>
                  <div id=\"payment-address-value\">
                    {% if payment_firstname %}
                      {{ payment_firstname }} {{ payment_lastname }}
                      <br/>
                    {% endif %}

                    {% if payment_company %}
                      {{ payment_company }}
                      <br/>
                    {% endif %}

                    {% if payment_address_1 %}
                      {{ payment_address_1 }}
                      <br/>
                    {% endif %}

                    {% if payment_phone %}
                      {{ payment_phone }}
                      <br/>
                    {% endif %}

                    {% if payment_city %}
                      {{ payment_city }}
                      <br/>
                    {% endif %}

                    {% if payment_postcode %}
                      {{ payment_postcode }}
                      <br/>
                    {% endif %}

                    {% if payment_zone %}
                      {{ payment_zone }}
                      <br/>
                    {% endif %}
                    {% if payment_country %}
                      {{ payment_country }}
                    {% endif %}
                  </div>
                </div>
              </div>
              <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-payment-address\" class=\"btn btn-outline-primary float-end\"><i class=\"fa-solid fa-cog\"></i></button>
            </div>
          </div>

          <div id=\"shipping-address\" class=\"col{% if not shipping_method %} d-none{% endif %}\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>{{ text_shipping_address }}</strong>
                  <br/>
                  <div id=\"shipping-address-value\">
                    {% if shipping_firstname %}
                      {{ shipping_firstname }} {{ shipping_lastname }}
                      <br/>
                    {% endif %}
                    {% if shipping_company %}
                      {{ shipping_company }}
                      <br/>
                    {% endif %}
                    {% if shipping_address_1 %}
                      {{ shipping_address_1 }}
                      <br/>
                    {% endif %}
                    {% if shipping_phone %}
                      {{ shipping_phone }}
                      <br/>
                    {% endif %}
                    {% if shipping_city %}
                      {{ shipping_city }}
                      <br/>
                    {% endif %}
                    {% if shipping_postcode %}
                      {{ shipping_postcode }}
                      <br/>
                    {% endif %}
                    {% if shipping_zone %}
                      {{ shipping_zone }}
                      <br/>
                    {% endif %}
                    {% if shipping_country %}
                      {{ shipping_country }}
                    {% endif %}
                  </div>
                </div>
              </div>
              <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-shipping-address\" class=\"btn btn-outline-primary float-end\"><i class=\"fa-solid fa-cog\"></i></button>
            </div>
          </div>

        </div>
        <div class=\"row\">

          <div id=\"shipping-method\" class=\"col-md{% if not shipping_method %} d-none{% endif %}\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>{{ text_shipping_method }}</strong>
                  <br/>
                  {% if shipping_method %}
                    <span id=\"shipping-method-value\">{{ shipping_method }}</span>
                  {% else %}
                    <span id=\"shipping-method-value\"></span>
                  {% endif %}
                </div>
              </div>
              <input type=\"hidden\" name=\"shipping_code\" value=\"{{ shipping_code }}\" id=\"input-shipping-code\"/>
              <button type=\"button\" id=\"button-shipping-methods\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>
            </div>
          </div>

          <div id=\"payment-method\" class=\"col-md\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>{{ text_payment_method }}</strong>
                  <br/>
                  {% if payment_method %}
                    <span id=\"payment-method-value\">{{ payment_method }}</span>
                  {% else %}
                    <span id=\"payment-method-value\"></span>
                  {% endif %}
                </div>
              </div>
              <input type=\"hidden\" name=\"payment_code\" value=\"{{ payment_code }}\" id=\"input-payment-code\"/>
              <button type=\"button\" id=\"button-payment-methods\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>
            </div>
          </div>

        </div>

        <div class=\"row\">
          <div class=\"col\">
            <div class=\"input-group mb-3\">
              <div class=\"form-control border rounded-start\">
                <div class=\"lead\"><strong>{{ text_comment }}</strong>
                  <br/>
                  {% if comment %}
                    <span id=\"comment-value\">{{ comment }}</span>
                  {% else %}
                    <span id=\"comment-value\"></span>
                  {% endif %}
                </div>
              </div>
              <button type=\"button\" data-bs-toggle=\"modal\" data-bs-target=\"#modal-comment\" class=\"btn btn-outline-primary float-end\"><i class=\"fa-solid fa-cog\"></i></button>
            </div>
          </div>
        </div>

        <table class=\"table table-bordered\">
          <tbody id=\"order-totals\">
            {% for order_total in order_totals %}
              <tr>
                <td class=\"text-end\"><strong>{{ order_total.title }}</strong></td>
                <td class=\"text-end\" style=\"width: 1px;\">{{ order_total.text }}</td>
              </tr>
            {% endfor %}
          </tbody>
        </table>
        <div class=\"text-end\">
          <button type=\"button\" id=\"button-refresh\" data-bs-toggle=\"tooltip\" title=\"{{ button_refresh }}\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-rotate\"></i></button>
          <button type=\"button\" id=\"button-confirm\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> {{ button_confirm }}</button>
        </div>
      </div>
    </div>

    <div class=\"card mb-3\">
      <div class=\"card-header\"><i class=\"fa-solid fa-comment\"></i> {{ text_history }}</div>
      <div class=\"card-body\">
        <ul class=\"nav nav-tabs\">
          <li class=\"nav-item\"><a href=\"#tab-history\" data-bs-toggle=\"tab\" class=\"nav-link active\">{{ tab_history }}</a></li>
          <li class=\"nav-item\"><a href=\"#tab-additional\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab_additional }}</a></li>
          {% for tab in tabs %}
            <li class=\"nav-item\"><a href=\"#tab-{{ tab.code }}\" data-bs-toggle=\"tab\" class=\"nav-link\">{{ tab.title }}</a></li>
          {% endfor %}
        </ul>
        <div class=\"tab-content\">

          <div id=\"tab-history\" class=\"tab-pane active\">
            <fieldset>
              <legend>{{ text_history }}</legend>
              <div id=\"history\">{{ history }}</div>
            </fieldset>
            <form id=\"form-history\">
              <fieldset>
                <legend>{{ text_history_add }}</legend>
                <div class=\"row mb-3\">
                  <label for=\"input-order-status\" class=\"col-sm-2 col-form-label\">{{ entry_order_status }}</label>
                  <div class=\"col-sm-10\">
                    <select name=\"order_status_id\" id=\"input-order-status\" class=\"form-select\">
                      {% for order_status in order_statuses %}
                        <option value=\"{{ order_status.order_status_id }}\"{% if order_status.order_status_id == order_status_id %} selected{% endif %}>{{ order_status.name }}</option>
                      {% endfor %}
                    </select>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_override }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"override\" value=\"0\"/>
                      <input type=\"checkbox\" name=\"override\" value=\"1\" id=\"input-override\" class=\"form-check-input\">
                    </div>
                    <div class=\"form-text\">{{ help_override }}</div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label class=\"col-sm-2 col-form-label\">{{ entry_notify }}</label>
                  <div class=\"col-sm-10\">
                    <div class=\"form-check form-switch form-switch-lg\">
                      <input type=\"hidden\" name=\"notify\" value=\"0\"/>
                      <input type=\"checkbox\" name=\"notify\" value=\"1\" id=\"input-notify\" class=\"form-check-input\"/>
                    </div>
                  </div>
                </div>
                <div class=\"row mb-3\">
                  <label for=\"input-history\" class=\"col-sm-2 col-form-label\">{{ entry_comment }}</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"comment\" rows=\"8\" placeholder=\"{{ entry_comment }}\" id=\"input-history\" class=\"form-control\"></textarea>
                  </div>
                </div>
                <div class=\"text-end\">
                  <button type=\"submit\" id=\"button-history\" class=\"btn btn-primary\"><i class=\"fa-solid fa-plus-circle\"></i> {{ button_history_add }}</button>
                </div>
              </fieldset>
              <input type=\"hidden\" name=\"order_id\" value=\"{{ order_id }}\" id=\"input-order-id\"/>
            </form>
          </div>

          <div id=\"tab-additional\" class=\"tab-pane\">
            <div class=\"table-responsive\">
              <table class=\"table table-bordered\">
                <thead>
                  <tr>
                    <td colspan=\"2\">{{ text_browser }}</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ text_ip }}</td>
                    <td>{{ ip }}</td>
                  </tr>
                  {% if forwarded_ip %}
                    <tr>
                      <td>{{ text_forwarded_ip }}</td>
                      <td>{{ forwarded_ip }}</td>
                    </tr>
                  {% endif %}
                  <tr>
                    <td>{{ text_user_agent }}</td>
                    <td>{{ user_agent }}</td>
                  </tr>
                  <tr>
                    <td>{{ text_accept_language }}</td>
                    <td>{{ accept_language }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          {% for tab in tabs %}
            <div id=\"tab-{{ tab.code }}\" class=\"tab-pane\">{{ tab.content }}</div>
          {% endfor %}
        </div>
      </div>
    </div>
  </div>
</div>

<div id=\"modal-customer\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">{{ text_customer }}</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-customer\">
          <div class=\"mb-3\">
            <label for=\"input-customer\" class=\"form-label\">{{ entry_customer }}</label>
            <div class=\"input-group\">
              <input type=\"text\" name=\"customer\" value=\"{{ firstname }} {{ lastname }}\" placeholder=\"{{ entry_customer }}\" id=\"input-customer\" data-oc-target=\"autocomplete-customer\" class=\"form-control\" autocomplete=\"off\"/> <a href=\"{{ customer_add }}\" target=\"_blank\" data-bs-toggle=\"tooltip\" title=\"{{ button_customer_add }}\" class=\"btn btn-outline-secondary\"><i class=\"fa-solid fa-user-plus\"></i></a>
            </div>
            <input type=\"hidden\" name=\"customer_id\" value=\"{{ customer_id }}\" id=\"input-customer-id\"/>
            <ul id=\"autocomplete-customer\" class=\"dropdown-menu\"></ul>
          </div>
          <div class=\"mb-3\">
            <label for=\"input-customer-group\" class=\"form-label\">{{ entry_customer_group }}</label>
            <select name=\"customer_group_id\" id=\"input-customer-group\" class=\"form-select\">
              {% for customer_group in customer_groups %}
                <option value=\"{{ customer_group.customer_group_id }}\"{% if customer_group.customer_group_id == customer_group_id %} selected{% endif %}>{{ customer_group.name }}</option>
              {% endfor %}
            </select>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-firstname\" class=\"form-label\">{{ entry_firstname }}</label>
            <input type=\"text\" name=\"firstname\" value=\"{{ firstname }}\" placeholder=\"{{ entry_firstname }}\" id=\"input-firstname\" class=\"form-control\"/>
            <div id=\"error-firstname\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-lastname\" class=\"form-label\">{{ entry_lastname }}</label>
            <input type=\"text\" name=\"lastname\" value=\"{{ lastname }}\" placeholder=\"{{ entry_lastname }}\" id=\"input-lastname\" class=\"form-control\"/>
            <div id=\"error-lastname\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-email\" class=\"form-label\">{{ entry_email }}</label>
            <div class=\"input-group\">
              <input type=\"text\" name=\"email\" value=\"{{ email }}\" placeholder=\"{{ entry_email }}\" id=\"input-email\" class=\"form-control\"/> <a href=\"mailto:{{ email }}\" class=\"btn btn-outline-secondary\"><i class=\"fa-solid fa-envelope\"></i></a>
            </div>
            <div id=\"error-email\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3{% if config_telephone_required %} required{% endif %}\">
            <label for=\"input-telephone\" class=\"form-label\">{{ entry_telephone }}</label> <input type=\"text\" name=\"telephone\" value=\"{{ telephone }}\" placeholder=\"{{ entry_telephone }}\" id=\"input-telephone\" class=\"form-control\"/>
            <div id=\"error-telephone\" class=\"invalid-feedback\"></div>
          </div>
          {% for custom_field in custom_fields %}
            {% if custom_field.location == 'account' %}

              {% if custom_field.type == 'select' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label> <select name=\"custom_field[{{ custom_field.custom_field_id }}]\" id=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-select\">
                    <option value=\"\">{{ text_select }}</option>
                    {% for custom_field_value in custom_field.custom_field_value %}
                      <option value=\"{{ custom_field_value.custom_field_value_id }}\"{% if account_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id == account_custom_field[custom_field.custom_field_id] %} selected{% endif %}>{{ custom_field_value.name }}</option>
                    {% endfor %}
                  </select>
                  <div id=\"error-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'radio' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label class=\"form-label\">{{ custom_field.name }}</label>
                  <div id=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    {% for custom_field_value in custom_field.custom_field_value %}
                      <div class=\"form-check\">
                        <input type=\"radio\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ custom_field_value.custom_field_value_id }}\" id=\"input-custom-value-{{ custom_field_value.custom_field_value_id }}\" class=\"form-check-input\"{% if account_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id == account_custom_field[custom_field.custom_field_id] %} checked{% endif %}/> <label for=\"input-custom-value-{{ custom_field_value.custom_field_value_id }}\" class=\"form-check-label\">{{ custom_field_value.name }}</label>
                      </div>
                    {% endfor %}
                  </div>
                  <div id=\"error-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'checkbox' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label class=\"form-label\">{{ custom_field.name }}</label>
                  <div id=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    {% for custom_field_value in custom_field.custom_field_value %}
                      <div class=\"form-check\">
                        <input type=\"checkbox\" name=\"custom_field[{{ custom_field.custom_field_id }}][]\" value=\"{{ custom_field_value.custom_field_value_id }}\" id=\"input-custom-value-{{ custom_field_value.custom_field_value_id }}\" class=\"form-check-input\"{% if account_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id in account_custom_field[custom_field.custom_field_id] %} checked{% endif %}/> <label for=\"input-custom-value-{{ custom_field_value.custom_field_value_id }}\" class=\"form-check-label\">{{ custom_field_value.name }}</label>
                      </div>
                    {% endfor %}
                  </div>
                  <div id=\"error-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'text' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label> <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ account_custom_field[custom_field.custom_field_id] ? account_custom_field[custom_field.custom_field_id] : custom_field.value }}\" placeholder=\"{{ custom_field.name }}\" id=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\"/>
                  <div id=\"error-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'textarea' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label> <textarea name=\"custom_field[{{ custom_field.custom_field_id }}]\" rows=\"5\" placeholder=\"{{ custom_field.name }}\" id=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\">{{ custom_field.value }}</textarea>
                  <div id=\"error-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'file' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label class=\"form-label\">{{ custom_field.name }}</label>
                  <div class=\"input-group\">
                    <button type=\"button\" data-oc-toggle=\"upload\" data-oc-url=\"{{ upload }}\" data-oc-target=\"#input-custom-field-{{ custom_field.custom_field_id }}\" data-oc-size-max=\"{{ config_file_max_size }}\" data-oc-size-error=\"{{ error_upload_size }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-upload\"></i> {{ button_upload }}</button>
                    <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ account_custom_field[custom_field.custom_field_id] ? account_custom_field[custom_field.custom_field_id] : custom_field.value }}\" id=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\"/>
                    <button type=\"button\" data-oc-toggle=\"download\" data-oc-target=\"#input-custom-field-{{ custom_field.custom_field_id }}\"{% if not account_custom_field[custom_field.custom_field_id] %} disabled{% endif %} class=\"btn btn-outline-secondary\"><i class=\"fa-solid fa-download\"></i> {{ button_download }}</button>
                    <button type=\"button\" data-oc-toggle=\"clear\" data-bs-toggle=\"tooltip\" title=\"{{ button_clear }}\" data-oc-target=\"#input-custom-field-{{ custom_field.custom_field_id }}\"{% if not account_custom_field[custom_field.custom_field_id] %} disabled{% endif %} class=\"btn btn-outline-danger\"><i class=\"fa-solid fa-eraser\"></i></button>
                  </div>
                  <div id=\"error-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'date' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ account_custom_field[custom_field.custom_field_id] ? account_custom_field[custom_field.custom_field_id] : custom_field.value }}\" placeholder=\"{{ custom_field.name }}\" id=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control date\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'time' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ account_custom_field[custom_field.custom_field_id] ? account_custom_field[custom_field.custom_field_id] : custom_field.value }}\" placeholder=\"{{ custom_field.name }}\" id=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control time\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'datetime' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ account_custom_field[custom_field.custom_field_id] ? account_custom_field[custom_field.custom_field_id] : custom_field.value }}\" placeholder=\"{{ custom_field.name }}\" id=\"input-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control datetime\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

            {% endif %}
          {% endfor %}
          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-customer\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> {{ button_save }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-cart\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">{{ text_cart_add }}</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <ul class=\"nav nav-tabs\">
          <li class=\"nav-item\"><a href=\"#tab-product\" data-bs-toggle=\"tab\" class=\"nav-link active\">{{ tab_product }}</a></li>
       
        </ul>
        <div class=\"tab-content\">
          <div id=\"tab-product\" class=\"tab-pane active\">
            <form id=\"form-product-add\">
              <fieldset class=\"mb-0\">
                <legend>{{ text_product_add }}</legend>
                <div class=\"mb-3\">
                  <label for=\"input-product\" class=\"form-label\">{{ entry_product }}</label>
                  <input type=\"text\" name=\"product\" value=\"\" placeholder=\"{{ entry_product }}\" id=\"input-product\" data-oc-target=\"autocomplete-product\" class=\"form-control\" autocomplete=\"off\"/>
                  <ul id=\"autocomplete-product\" class=\"dropdown-menu\"></ul>
                  <input type=\"hidden\" name=\"product_id\" value=\"\" id=\"input-product-id\"/>
                </div>
                <div class=\"mb-3\">
                  <label for=\"input-quantity\" class=\"form-label\">{{ entry_quantity }}</label>
                  <input type=\"text\" name=\"quantity\" placeholder=\"{{ entry_quantity }}\" value=\"1\" id=\"input-quantity\" class=\"form-control\"/>
                </div>
              </fieldset>
              <div id=\"option\"></div>
              <div id=\"subscription\"></div>
              <div class=\"text-end\">
                <button type=\"submit\" id=\"button-product-add\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> {{ button_save }}</button>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-affiliate\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">{{ text_affiliate }}</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-affiliate\">
          <div class=\"mb-3\">
            <label for=\"input-affiliate\" class=\"form-label\">{{ entry_affiliate }}</label> <input type=\"text\" name=\"affiliate\" value=\"{{ affiliate }}\" placeholder=\"{{ entry_affiliate }}\" id=\"input-affiliate\" data-oc-target=\"autocomplete-affiliate\" class=\"form-control\" autocomplete=\"off\"/> <input type=\"hidden\" name=\"affiliate_id\" value=\"{{ affiliate_id }}\" id=\"input-affiliate-id\"/>
            <ul id=\"autocomplete-affiliate\" class=\"dropdown-menu\"></ul>
          </div>
          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-affiliate\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> {{ button_save }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-payment-address\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">{{ text_payment_address }}</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-payment-address\">
          <div class=\"mb-3\">
            <label for=\"input-payment-address\" class=\"form-label\">{{ entry_address }}</label>
            <select name=\"payment_address_id\" id=\"input-payment-address\" class=\"form-select\">
              <option value=\"0\" selected>{{ text_none }}</option>
              {% for address in addresses %}
                <option value=\"{{ address.address_id }}\"{% if address.address_id == payment_address_id %} selected{% endif %}>{{ address.firstname }} {{ address.lastname }},{% if address.company %} {{ address.company }},{% endif %} {{ address.address_1 }}, {{ address.city }}, {{ address.country }}</option>
              {% endfor %}
            </select>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-firstname\" class=\"form-label\">{{ entry_firstname }}</label>
            <input type=\"text\" name=\"firstname\" value=\"{{ payment_firstname }}\" placeholder=\"{{ entry_firstname }}\" id=\"input-payment-firstname\" class=\"form-control\"/>
            <div id=\"error-payment-firstname\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-lastname\" class=\"form-label\">{{ entry_lastname }}</label>
            <input type=\"text\" name=\"lastname\" value=\"{{ payment_lastname }}\" placeholder=\"{{ entry_lastname }}\" id=\"input-payment-lastname\" class=\"form-control\"/>
            <div id=\"error-payment-lastname\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3\">
            <label for=\"input-payment-company\" class=\"form-label\">{{ entry_company }}</label>
            <input type=\"text\" name=\"company\" value=\"{{ payment_company }}\" placeholder=\"{{ entry_company }}\" id=\"input-payment-company\" class=\"form-control\"/>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-address-1\" class=\"form-label\">{{ entry_address_1 }}</label>
            <input type=\"text\" name=\"address_1\" value=\"{{ payment_address_1 }}\" placeholder=\"{{ entry_address_1 }}\" id=\"input-payment-address-1\" class=\"form-control\"/>
            <div id=\"error-payment-address-1\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3\">
            <label for=\"input-payment-address-2\" class=\"form-label\">{{ entry_phone }}</label>
            <input type=\"text\" name=\"phone\" value=\"{{ payment_phone }}\" placeholder=\"{{ entry_phone }}\" id=\"input-payment-address-2\" class=\"form-control\"/>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-city\" class=\"form-label\">{{ entry_city }}</label>
            <input type=\"text\" name=\"city\" value=\"{{ payment_city }}\" placeholder=\"{{ entry_city }}\" id=\"input-payment-city\" class=\"form-control\"/>
            <div id=\"error-payment-city\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-postcode\" class=\"form-label\">{{ entry_postcode }}</label>
            <input type=\"text\" name=\"postcode\" value=\"{{ payment_postcode }}\" placeholder=\"{{ entry_postcode }}\" id=\"input-payment-postcode\" class=\"form-control\"/>
            <div id=\"error-payment-postcode\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-country\" class=\"form-label\">{{ entry_country }}</label>
            <select name=\"country_id\" id=\"input-payment-country\" class=\"form-select\">
              <option value=\"0\">{{ text_select }}</option>
              {% for country in countries %}
                <option value=\"{{ country.country_id }}\"{% if country.country_id == payment_country_id %} selected{% endif %}>{{ country.name }}</option>
              {% endfor %}
            </select>
            <div id=\"error-payment-country\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-payment-zone\" class=\"form-label\">{{ entry_zone }}</label> <select name=\"zone_id\" id=\"input-payment-zone\" class=\"form-select\"></select>
            <div id=\"error-payment-zone\" class=\"invalid-feedback\"></div>
          </div>
          {% for custom_field in custom_fields %}
            {% if custom_field.location == 'address' %}
              {% if custom_field.type == 'select' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label> <select name=\"custom_field[{{ custom_field.custom_field_id }}]\" id=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-select\">
                    <option value=\"\">{{ text_select }}</option>
                    {% for custom_field_value in custom_field.custom_field_value %}
                      <option value=\"{{ custom_field_value.custom_field_value_id }}\"{% if payment_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id == payment_custom_field[custom_field.custom_field_id] %} selected{% endif %}>{{ custom_field_value.name }}</option>
                    {% endfor %}
                  </select>
                  <div id=\"error-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}
              {% if custom_field.type == 'radio' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label class=\"form-label\">{{ custom_field.name }}</label>
                  <div id=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    {% for custom_field_value in custom_field.custom_field_value %}
                      <div class=\"form-check\">
                        <input type=\"radio\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ custom_field_value.custom_field_value_id }}\" id=\"input-payment-custom-value-{{ custom_field_value.custom_field_value_id }}\" class=\"form-check-input\"{% if payment_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id == payment_custom_field[custom_field.custom_field_id] %} checked{% endif %}/> <label for=\"input-payment-custom-value-{{ custom_field_value.custom_field_value_id }}\" class=\"form-check-label\">{{ custom_field_value.name }}</label>
                      </div>
                    {% endfor %}
                  </div>
                  <div id=\"error-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}
              {% if custom_field.type == 'checkbox' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label class=\"form-label\">{{ custom_field.name }}</label>
                  <div id=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    {% for custom_field_value in custom_field.custom_field_value %}
                      <div class=\"form-check\">
                        <input type=\"checkbox\" name=\"custom_field[{{ custom_field.custom_field_id }}][]\" value=\"{{ custom_field_value.custom_field_value_id }}\" id=\"input-payment-custom-value-{{ custom_field_value.custom_field_value_id }}\" class=\"form-check-input\"{% if payment_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id in payment_custom_field[custom_field.custom_field_id] %} checked{% endif %}/> <label for=\"input-payment-custom-value-{{ custom_field_value.custom_field_value_id }}\" class=\"form-check-label\">{{ custom_field_value.name }}</label>
                      </div>
                    {% endfor %}
                  </div>
                  <div id=\"error-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}
              {% if custom_field.type == 'text' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label> <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ payment_custom_field[custom_field.custom_field_id] ? payment_custom_field[custom_field.custom_field_id] : custom_field.value }}\" placeholder=\"{{ custom_field.name }}\" id=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\"/>
                  <div id=\"error-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}
              {% if custom_field.type == 'textarea' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label> <textarea name=\"custom_field[{{ custom_field.custom_field_id }}]\" rows=\"5\" placeholder=\"{{ custom_field.name }}\" id=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\">{{ payment_custom_field[custom_field.custom_field_id] ? payment_custom_field[custom_field.custom_field_id] : custom_field.value }}</textarea>
                  <div id=\"error-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}
              {% if custom_field.type == 'file' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label class=\"form-label\">{{ custom_field.name }}</label>
                  <div class=\"input-group\">
                    <button type=\"button\" data-oc-toggle=\"upload\" data-oc-url=\"{{ upload }}\" data-oc-target=\"#input-payment-custom-field-{{ custom_field.custom_field_id }}\" data-oc-size-max=\"{{ config_file_max_size }}\" data-oc-size-error=\"{{ error_upload_size }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-upload\"></i> {{ button_upload }}</button>
                    <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ payment_custom_field[custom_field.custom_field_id] ? payment_custom_field[custom_field.custom_field_id] }}\" id=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\" readonly/>
                    <button type=\"button\" data-oc-toggle=\"download\" data-oc-target=\"#input-payment-custom-field-{{ custom_field.custom_field_id }}\"{% if not payment_custom_field[custom_field.custom_field_id] %} disabled{% endif %} class=\"btn btn-outline-secondary\"><i class=\"fa-solid fa-download\"></i> {{ button_download }}</button>
                    <button type=\"button\" data-oc-toggle=\"clear\" data-bs-toggle=\"tooltip\" title=\"{{ button_clear }}\" data-oc-target=\"#input-payment-custom-field-{{ custom_field.custom_field_id }}\"{% if not payment_custom_field[custom_field.custom_field_id] %} disabled{% endif %} class=\"btn btn-outline-danger\"><i class=\"fa-solid fa-eraser\"></i></button>
                  </div>
                  <div id=\"error-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}
              {% if custom_field.type == 'date' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ payment_custom_field[custom_field.custom_field_id] ? payment_custom_field[custom_field.custom_field_id] : custom_field.value }}\" placeholder=\"{{ custom_field.name }}\" id=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control date\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}
              {% if custom_field.type == 'time' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ payment_custom_field[custom_field.custom_field_id] ? payment_custom_field[custom_field.custom_field_id] : custom_field.value }}\" placeholder=\"{{ custom_field.name }}\" id=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control time\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}
              {% if custom_field.type == 'datetime' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ payment_custom_field[custom_field.custom_field_id] ? payment_custom_field[custom_field.custom_field_id] : custom_field.value }}\" placeholder=\"{{ custom_field.name }}\" id=\"input-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control datetime\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-payment-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}
            {% endif %}
          {% endfor %}
          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-payment-address\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> {{ button_save }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-payment\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\"><i class=\"fa fa-credit-card\"></i> {{ text_payment_method }}</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-payment-method\">
          <p>{{ text_payment }}</p>
          <div id=\"payment-methods\"></div>
          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-payment-method\" class=\"btn btn-primary\">{{ button_continue }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-shipping-address\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">{{ text_shipping_address }}</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-shipping-address\">
          <div class=\"mb-3\">
            <label for=\"input-shipping-address\" class=\"form-label\">{{ entry_address }}</label>
            <select name=\"shipping_address_id\" id=\"input-shipping-address\" class=\"form-select\">
              <option value=\"0\">{{ text_none }}</option>
              {% for address in addresses %}
                <option value=\"{{ address.address_id }}\"{% if address.address_id == shipping_address_id %} selected{% endif %}>{{ address.firstname }} {{ address.lastname }},{% if address.company %} {{ address.company }},{% endif %} {{ address.address_1 }}, {{ address.city }}, {{ address.country }}</option>
              {% endfor %}
            </select>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-shipping-firstname\" class=\"form-label\">{{ entry_firstname }}</label> <input type=\"text\" name=\"firstname\" value=\"{{ shipping_firstname }}\" placeholder=\"{{ entry_firstname }}\" id=\"input-shipping-firstname\" class=\"form-control\"/>
            <div id=\"error-shipping-firstname\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-shipping-lastname\" class=\"form-label\">{{ entry_lastname }}</label> <input type=\"text\" name=\"lastname\" value=\"{{ shipping_lastname }}\" placeholder=\"{{ entry_lastname }}\" id=\"input-shipping-lastname\" class=\"form-control\"/>
            <div id=\"error-shipping-lastname\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3\">
            <label for=\"input-shipping-company\" class=\"form-label\">{{ entry_company }}</label> <input type=\"text\" name=\"company\" value=\"{{ shipping_company }}\" placeholder=\"{{ entry_company }}\" id=\"input-shipping-company\" class=\"form-control\"/>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-shipping-address-1\" class=\"form-label\">{{ entry_address_1 }}</label> <input type=\"text\" name=\"address_1\" value=\"{{ shipping_address_1 }}\" placeholder=\"{{ entry_address_1 }}\" id=\"input-shipping-address-1\" class=\"form-control\"/>
            <div id=\"error-shipping-address-1\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3\">
            <label for=\"input-shipping-address-2\" class=\"form-label\">{{ entry_phone }}</label> <input type=\"text\" name=\"phone\" value=\"{{ shipping_phone }}\" placeholder=\"{{ entry_phone }}\" id=\"input-shipping-address-2\" class=\"form-control\"/>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-shipping-city\" class=\"form-label\">{{ entry_city }}</label> <input type=\"text\" name=\"city\" value=\"{{ shipping_city }}\" placeholder=\"{{ entry_city }}\" id=\"input-shipping-city\" class=\"form-control\"/>
            <div id=\"error-shipping-city\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-shipping-postcode\" class=\"form-label\">{{ entry_postcode }}</label> <input type=\"text\" name=\"postcode\" value=\"{{ shipping_postcode }}\" placeholder=\"{{ entry_postcode }}\" id=\"input-shipping-postcode\" class=\"form-control\"/>
            <div id=\"error-shipping-postcode\" class=\"invalid-feedback\"></div>
          </div>
          <div class=\"mb-3 required\">
            <label for=\"input-shipping-country\" class=\"form-label\">{{ entry_country }}</label> <select name=\"country_id\" id=\"input-shipping-country\" class=\"form-select\">
              <option value=\"0\">{{ text_select }}</option>
              {% for country in countries %}
                <option value=\"{{ country.country_id }}\"{% if country.country_id == shipping_country_id %} selected{% endif %}>{{ country.name }}</option>
              {% endfor %}
            </select>
            <div id=\"error-shipping-country\" class=\"invalid-feedback\"></div>
          </div>

          <div class=\"mb-3 required\">
            <label for=\"input-shipping-zone\" class=\"form-label\">{{ entry_zone }}</label> <select name=\"zone_id\" id=\"input-shipping-zone\" class=\"form-select\"></select>
            <div id=\"error-shipping-zone\" class=\"invalid-feedback\"></div>
          </div>

          {% for custom_field in custom_fields %}
            {% if custom_field.location == 'address' %}

              {% if custom_field.type == 'select' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label> <select name=\"custom_field[{{ custom_field.custom_field_id }}]\" id=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-select\">
                    <option value=\"\">{{ text_select }}</option>
                    {% for custom_field_value in custom_field.custom_field_value %}
                      <option value=\"{{ custom_field_value.custom_field_value_id }}\"{% if shipping_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id == shipping_custom_field[custom_field.custom_field_id] %} selected{% endif %}>{{ custom_field_value.name }}</option>
                    {% endfor %}
                  </select>
                  <div id=\"error-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'radio' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label class=\"form-label\">{{ custom_field.name }}</label>
                  <div id=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    {% for custom_field_value in custom_field.custom_field_value %}
                      <div class=\"form-check\">
                        <input type=\"radio\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ custom_field_value.custom_field_value_id }}\" id=\"input-shipping-custom-value-{{ custom_field_value.custom_field_value_id }}\" class=\"form-check-input\"{% if shipping_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id == shipping_custom_field[custom_field.custom_field_id] %} checked{% endif %}/> <label for=\"input-shipping-custom-value-{{ custom_field_value.custom_field_value_id }}\" class=\"form-check-label\">{{ custom_field_value.name }}</label>
                      </div>
                    {% endfor %}
                  </div>
                  <div id=\"error-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'checkbox' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label class=\"form-label\">{{ custom_field.name }}</label>
                  <div id=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\" style=\"height: 150px; overflow: auto;\">
                    {% for custom_field_value in custom_field.custom_field_value %}
                      <div class=\"form-check\">
                        <input type=\"checkbox\" name=\"custom_field[{{ custom_field.custom_field_id }}][]\" value=\"{{ custom_field_value.custom_field_value_id }}\" id=\"input-shipping-custom-value-{{ custom_field_value.custom_field_value_id }}\" class=\"form-check-input\"{% if shipping_custom_field[custom_field.custom_field_id] and custom_field_value.custom_field_value_id in shipping_custom_field[custom_field.custom_field_id] %} checked{% endif %}/> <label for=\"input-shipping-custom-value-{{ custom_field_value.custom_field_value_id }}\" class=\"form-check-label\">{{ custom_field_value.name }}</label>
                      </div>
                    {% endfor %}
                  </div>
                  <div id=\"error-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'text' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label> <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ shipping_custom_field[custom_field.custom_field_id] ? shipping_custom_field[custom_field.custom_field_id] : custom_field.value }}\" placeholder=\"{{ custom_field.name }}\" id=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\"/>
                  <div id=\"error-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'textarea' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label> <textarea name=\"custom_field[{{ custom_field.custom_field_id }}]\" rows=\"5\" placeholder=\"{{ custom_field.name }}\" id=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" placeholder=\"{{ custom_field.name }}\" class=\"form-control\">{{ shipping_custom_field[custom_field.custom_field_id] ? shipping_custom_field[custom_field.custom_field_id] : custom_field.value }}</textarea>
                  <div id=\"error-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'file' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label class=\"form-label\">{{ custom_field.name }}</label>
                  <div class=\"input-group\">
                    <button type=\"button\" data-oc-toggle=\"upload\" data-oc-url=\"{{ upload }}\" data-oc-target=\"#input-shipping-custom-field-{{ custom_field.custom_field_id }}\" data-oc-size-max=\"{{ config_file_max_size }}\" data-oc-size-error=\"{{ error_upload_size }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-upload\"></i> {{ button_upload }}</button>
                    <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ shipping_custom_field[custom_field.custom_field_id] ? shipping_custom_field[custom_field.custom_field_id] }}\" id=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control\" readonly/>
                    <button type=\"button\" data-oc-toggle=\"download\" data-oc-target=\"#input-shipping-custom-field-{{ custom_field.custom_field_id }}\"{% if not shipping_custom_field[custom_field.custom_field_id] %} disabled{% endif %} class=\"btn btn-outline-secondary\"><i class=\"fa-solid fa-download\"></i> {{ button_download }}</button>
                    <button type=\"button\" data-oc-toggle=\"clear\" data-bs-toggle=\"tooltip\" title=\"{{ button_clear }}\" data-oc-target=\"#input-shipping-custom-field-{{ custom_field.custom_field_id }}\"{% if not shipping_custom_field[custom_field.custom_field_id] %} disabled{% endif %} class=\"btn btn-outline-danger\"><i class=\"fa-solid fa-eraser\"></i></button>
                  </div>
                  <div id=\"error-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'date' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ shipping_custom_field[custom_field.custom_field_id] ? shipping_custom_field[custom_field.custom_field_id] : custom_field.value }}\" placeholder=\"{{ custom_field.name }}\" id=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control date\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'time' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ shipping_custom_field[custom_field.custom_field_id] ? shipping_custom_field[custom_field.custom_field_id] : custom_field.value }}\" placeholder=\"{{ custom_field.name }}\" id=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control time\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

              {% if custom_field.type == 'datetime' %}
                <div class=\"mb-3 custom-field custom-field-{{ custom_field.custom_field_id }}\">
                  <label for=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-label\">{{ custom_field.name }}</label>
                  <div class=\"input-group\">
                    <input type=\"text\" name=\"custom_field[{{ custom_field.custom_field_id }}]\" value=\"{{ shipping_custom_field[custom_field.custom_field_id] ? shipping_custom_field[custom_field.custom_field_id] : custom_field.value }}\" placeholder=\"{{ custom_field.name }}\" id=\"input-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"form-control datetime\"/>
                    <div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div>
                  </div>
                  <div id=\"error-shipping-custom-field-{{ custom_field.custom_field_id }}\" class=\"invalid-feedback\"></div>
                </div>
              {% endif %}

            {% endif %}
          {% endfor %}
          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-shipping-address\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> {{ button_save }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-shipping\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\"><i class=\"fa fa-truck\"></i> {{ text_shipping_method }}</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-shipping-method\">
          <p>{{ text_shipping }}</p>
          <div id=\"shipping-methods\"></div>
          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-shipping-method\" class=\"btn btn-primary\">{{ button_continue }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id=\"modal-comment\" class=\"modal\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">{{ text_comment }}</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-comment\">
          <div class=\"mb-3\">
            <textarea name=\"comment\" rows=\"5\" placeholder=\"{{ entry_comment }}\" id=\"input-comment\" class=\"form-control\">{{ comment }}</textarea>
          </div>
          <div class=\"text-end\">
            <button type=\"submit\" id=\"button-comment\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i> {{ button_save }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script ><!--
\$(document).ready(function () {
 
     \$('#button-refresh').trigger('click');
 
   
});

 

\$(document).on('click', '#button-invoice', function() {
    \$.ajax({
        url: 'index.php?route=sale/order.createInvoiceNo&user_token={{ user_token }}&order_id={{ order_id }}',
        dataType: 'json',
        beforeSend: function() {
            \$('#button-invoice').button('loading');
        },
        complete: function() {
            \$('#button-invoice').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#invoice-value').html(json['invoice_no']);

                \$('#button-invoice').replaceWith('<button disabled=\"disabled\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-cog\"></i></button>');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Customer
\$('#input-customer').autocomplete({
    'source': function(request, response) {
        \$.ajax({
            url: 'index.php?route=customer/customer.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function(json) {
                json.unshift({
                    customer_id: 0,
                    customer_group_id: {{ customer_group_id }},
                    name: '{{ text_none }}',
                    customer_group: '',
                    firstname: '',
                    lastname: '',
                    email: '',
                    telephone: '',
                    custom_field: [],
                    address: []
                });

                response(\$.map(json, function(item) {
                    return {
                        category: item['customer_group'],
                        label: item['name'],
                        value: item['customer_id'],
                        customer_group_id: item['customer_group_id'],
                        firstname: item['firstname'],
                        lastname: item['lastname'],
                        email: item['email'],
                        telephone: item['telephone'],
                        custom_field: item['custom_field'],
                        address: item['address']
                    }
                }));
            }
        });
    },
    'select': function(item) {
        // Reset all custom fields
        \$('#form-customer input[type=\\'text\\'], #form-customer textarea').not('#input-customer, #input-customer-id').val('');
        \$('#form-customer select option').removeAttr('selected');
        \$('#form-customer input[type=\\'checkbox\\'], #form-customer input[type=\\'radio\\']').removeAttr('checked');

        \$('#input-customer-id').val(item['value']);
        \$('#input-customer-group').val(item['customer_group_id']);
        \$('#input-firstname').val(item['firstname']);
        \$('#input-lastname').val(item['lastname']);
        \$('#input-email').val(item['email']);
        \$('#input-telephone').val(item['telephone']);

        for (i in item.custom_field) {
            \$('#input-custom-field-' + i).val(item.custom_field[i]);

            if (item.custom_field[i] instanceof Array) {
                for (j = 0; j < item.custom_field[i].length; j++) {
                    \$('#input-custom-field-value-' + item.custom_field[i][j]).prop('checked', true);
                }
            }
        }

        \$('#input-customer-group').trigger('change');

        html = '<option value=\"0\">{{ text_none|escape('js') }}</option>';

        for (i in item['address']) {
            html += '<option value=\"' + item['address'][i]['address_id'] + '\">' + item['address'][i]['firstname'] + ' ' + item['address'][i]['lastname'] + ', ' + (item['address'][i]['company'] ? item['address'][i]['company'] + ', ' : '') + item['address'][i]['address_1'] + ', ' + item['address'][i]['city'] + ', ' + item['address'][i]['country'] + '</option>';
        }

        \$('#input-payment-address').html(html);
        \$('#input-shipping-address').html(html);

        //\$('#payment-method-value').html('');
       // \$('#shipping-method-value').html('');
    }
});

// Custom Fields
\$('#input-customer-group').on('change', function() {
    \$.ajax({
        url: 'index.php?route=customer/customer.customfield&user_token={{ user_token }}&customer_group_id=' + this.value,
        dataType: 'json',
        success: function(json) {
            \$('.custom-field').hide();
            \$('.custom-field').removeClass('required');

            for (i = 0; i < json.length; i++) {
                custom_field = json[i];

                \$('.custom-field-' + custom_field['custom_field_id']).show();

                if (custom_field['required']) {
                    \$('.custom-field-' + custom_field['custom_field_id']).addClass('required');
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-customer-group').trigger('change');

// Customer
\$('#form-customer').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&action=sale/customer&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        type: 'post',
        data: \$('#form-customer').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-customer').button('loading');
        },
        complete: function() {
            \$('#button-customer').button('reset');
        },
        success: function(json) {
            console.log(json);

            \$('.alert-dismissible').remove();
            \$('.is-invalid').removeClass('is-invalid');
            \$('.invalid-feedback').removeClass('d-block');

            // Check for errors
            if (json['error']) {
                if (json['error']['warning']) {
                    \$('#form-customer').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                for (key in json['error']) {
                    \$('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                    \$('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                }
            }

            if (json['success']) {
                \$('#form-customer').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#customer-value').html('<a href=\"index.php?route=customer/customer.form&user_token={{ user_token }}&customer_id=' + \$('#input-customer-id').val() + '\">' + \$('#input-firstname').val() + ' ' + \$('#input-lastname').val() + '</a>');

                //\$('#payment-method-value').html('');
               // \$('#shipping-method-value').html('');

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Product
\$('#input-product').autocomplete({
    'source': function(request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/product.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function(json) {
                response(\$.map(json, function(item) {
                    return {
                        label: item['name'],
                        value: item['product_id'],
                        sku: item['sku'],
                        option: item['option'],
                        subscription: item['subscription'],
                        price: item['price']
                    }
                }));
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            }
        });
    },
    'select': function(item) {
        \$('#input-product-id').val(item['value']);
        \$('#input-product').val(item['label']);
        
        if (item['option']) {
            html = '<fieldset class=\"mb-0\">';
            html += '  <legend>{{ entry_option|escape('js') }}</legend>';

            for (i = 0; i < item['option'].length; i++) {
                option = item['option'][i];

                if (option['type'] == 'select') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <select name=\"option[' + option['product_option_id'] + ']\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-select\">';
                    html += '    <option value=\"\">{{ text_select|escape('js') }}</option>';

                    for (j = 0; j < option['product_option_value'].length; j++) {
                        option_value = option['product_option_value'][j];

                        html += '<option value=\"' + option_value['product_option_value_id'] + '\">' + option_value['name'];

                        if (option_value['price']) {
                            html += ' (' + option_value['price_prefix'] + option_value['price'] + ')';
                        }

                        html += '</option>';
                    }

                    html += '  </select>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'radio') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <select name=\"option[' + option['product_option_id'] + ']\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-select\">';
                    html += '    <option value=\"\">{{ text_select|escape('js') }}</option>';

                    for (j = 0; j < option['product_option_value'].length; j++) {
                        option_value = option['product_option_value'][j];

                        html += '<option value=\"' + option_value['product_option_value_id'] + '\">' + option_value['name'];

                        if (option_value['price']) {
                            html += ' (' + option_value['price_prefix'] + option_value['price'] + ')';
                        }

                        html += '</option>';
                    }

                    html += '  </select>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'checkbox') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label class=\"form-label\">' + option['name'] + '</label>';

                    html += '  <div id=\"input-option-' + option['product_option_id'] + '\" class=\"form-control\">';

                    for (j = 0; j < option['product_option_value'].length; j++) {
                        option_value = option['product_option_value'][j];

                        html += '<div class=\"form-check\">';
                        html += '  <input type=\"checkbox\" name=\"option[' + option['product_option_id'] + '][]\" value=\"' + option_value['product_option_value_id'] + '\" id=\"input-option-value-' + option_value['product_option_value_id'] + '\" class=\"form-check-input\"/> ';
                        html += '  <label for=\"input-option-value-' + option_value['product_option_value_id'] + '\" class=\"form-check-label\">' + option_value['name'];

                        if (option_value['price']) {
                            html += ' (' + option_value['price_prefix'] + option_value['price'] + ')';
                        }

                        html += '  </label>';
                        html += '</div>';
                    }

                    html += '  </div>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'image') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';

                    html += '  <select name=\"option[' + option['product_option_id'] + ']\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-select\">';
                    html += '    <option value=\"\">{{ text_select|escape('js') }}</option>';

                    for (j = 0; j < option['product_option_value'].length; j++) {
                        option_value = option['product_option_value'][j];

                        html += '<option value=\"' + option_value['product_option_value_id'] + '\">' + option_value['name'];

                        if (option_value['price']) {
                            html += ' (' + option_value['price_prefix'] + option_value['price'] + ')';
                        }

                        html += '</option>';
                    }

                    html += '  </select>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'text') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <input type=\"text\" name=\"option[' + option['product_option_id'] + ']\" value=\"' + option['value'] + '\" placeholder=\"' + option['name'] + '\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-control\"/>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'textarea') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <textarea name=\"option[' + option['product_option_id'] + ']\" rows=\"5\" placeholder=\"' + option['name'] + '\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-control\">' + option['value'] + '</textarea>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'file') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <div>';
                    html += '    <button type=\"button\" data-oc-toggle=\"upload\" data-oc-url=\"{{ upload }}\" data-oc-target=\"#input-option-' + option['product_option_id'] + '\" data-oc-size-max=\"{{ config_file_max_size }}\" data-oc-size-error=\"{{ error_upload_size|escape('js') }}\" class=\"btn btn-light\"><i class=\"fa-solid fa-upload\"></i> {{ button_upload|escape('js') }}</button>';
                    html += '    <a href=\"\" class=\"btn btn-light\"><i class=\"fa-solid fa-download\"></i></a>';
                    html += '    <input type=\"hidden\" name=\"option[' + option['product_option_id'] + ']\" value=\"' + option['value'] + '\" id=\"input-option-' + option['product_option_id'] + '\"/>';
                    html += '  </div>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'date') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <div class=\"input-group\"><input type=\"text\" name=\"option[' + option['product_option_id'] + ']\" value=\"' + option['value'] + '\" placeholder=\"' + option['name'] + '\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-control date\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'datetime') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <div class=\"input-group\"><input type=\"text\" name=\"option[' + option['product_option_id'] + ']\" value=\"' + option['value'] + '\" placeholder=\"' + option['name'] + '\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-control datetime\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }

                if (option['type'] == 'time') {
                    html += '<div class=\"mb-3' + (option['required'] == 1 ? ' required' : '') + '\">';
                    html += '  <label for=\"input-option-' + option['product_option_id'] + '\" class=\"form-label\">' + option['name'] + '</label>';
                    html += '  <div class=\"input-group\"><input type=\"text\" name=\"option[' + option['product_option_id'] + ']\" value=\"' + option['value'] + '\" placeholder=\"' + option['name'] + '\" id=\"input-option-' + option['product_option_id'] + '\" class=\"form-control time\"/><div class=\"input-group-text\"><i class=\"fa-regular fa-calendar\"></i></div></div>';
                    html += '  <div id=\"error-option-' + option['product_option_id'] + '\" class=\"invalid-feedback\"></div>';
                    html += '</div>';
                }
            }

            html += '</fieldset>';

            \$('#option').html(html);
        } else {
            \$('#option').html('');
        }

        if (item['subscription'] ) {
            html = '<fieldset class=\"mb-0\">';
            html += '  <legend>{{ entry_subscription|escape('js') }}</legend>';
            html += '  <div class=\"mb-3 required\">';
            html += '    <select name=\"subscription_plan_id\" id=\"input-subscription-plan\" class=\"form-select\">';
            html += '      <option value=\"\">{{ text_select|escape('js') }}</option>';

            for (i = 0; i < item['subscription'].length; i++) {
                html += '<option value=\"' + item['subscription'][i]['subscription_plan_id'] + '\">' + item['subscription'][i]['name'] + '</option>';
            }

            html += '  </select>';

            for (i = 0; i < item['subscription'].length; i++) {
                html += '  <div id=\"subscription-description-' + item['subscription'][i]['subscription_plan_id'] + '\" class=\"form-text subscription d-none\">' + item['subscription'][i]['description'] + '</div>';
            }

            html += '    <div id=\"error-subscription\" class=\"invalid-feedback\"></div>';
            html += '  </div>';
            html += '</fieldset>';

            \$('#subscription').html(html);
        } else {
            \$('#subscription').html('');
        }
    }
});

\$('#form-product-add').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&action=sale/cart.addProduct&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        type: 'post',
        data: \$('#form-product-add').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-product-add').button('loading');
        },
        complete: function() {
            \$('#button-product-add').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();
            \$('.is-invalid').removeClass('is-invalid');
            \$('.invalid-feedback').removeClass('d-block');

            if (json['error']) {
                if (json['error']['warning']) {
                    \$('#form-product-add').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                for (key in json['error']) {
                    \$('#input-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                    \$('#error-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                }
            }

            if (json['success']) {
                \$('#form-product-add').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

               // \$('#payment-method-value').html('');
               // \$('#shipping-method-value').html('');

                // Refresh products,  and totals
                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Remove product
\$('#order-products').on('submit', 'form', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&action=sale/cart.remove',
        type: 'post',
        data: \$(element).serialize(),
        dataType: 'json',
        beforeSend: function() {
            \$(e.target).button('loading');
        },
        complete: function() {
            \$(e.target).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            // Check for errors
            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

               // \$('#payment-method-value').html('');
               // \$('#shipping-method-value').html('');

                // Refresh products and totals
                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

 

 

\$('#input-store').on('change', function(e) {
    e.preventDefault();

    \$('#button-refresh').trigger('click');
});

\$('#input-language').on('change', function(e) {
    e.preventDefault();

    \$('#button-refresh').trigger('click');
});

\$('#input-currency').on('change', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&action=localisation/currency',
        type: 'post',
        data: \$('#form-currency').serialize(),
        dataType: 'json',
        beforeSend: function() {
            \$('#input-currency').prop('disabled', true);
        },
        complete: function() {
            \$('#input-currency').prop('disabled', false);
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Coupon
\$('#form-coupon').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&action=sale/coupon',
        type: 'post',
        data: \$('#form-coupon').serialize(),
        dataType: 'json',
        beforeSend: function() {
            \$('#button-coupon').button('loading');
        },
        complete: function() {
            \$('#button-coupon').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                // Refresh products and totals
                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

 
// Reward
\$('#form-reward').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&action=sale/reward',
        type: 'post',
        data: \$('#form-reward').serialize(),
        dataType: 'json',
        beforeSend: function() {
            \$('#button-reward').button('loading');
        },
        complete: function() {
            \$('#button-reward').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Reward
\$(document).on('click', '#button-reward-add, #button-reward-remove', function(e) {
    var element = this;

    if (\$(element).hasClass('btn-success')) {
        var action = 'add';
    } else {
        var action = 'remove';
    }

    \$.ajax({
        url: 'index.php?route=sale/order.' + action + 'Reward&user_token={{ user_token }}&order_id=' + \$('#input-order-id').val(),
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                if (action == 'add') {
                    \$(element).replaceWith('<button type=\"button\" id=\"button-reward-remove\" data-bs-toggle=\"tooltip\" title=\"{{ button_reward_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>');
                }

                if (action == 'remove') {
                    \$(element).replaceWith('<button type=\"button\" id=\"button-reward-add\" data-bs-toggle=\"tooltip\" title=\"{{ button_reward_add|escape('js') }}\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>');
                }

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Affiliate
\$('#input-affiliate').autocomplete({
    'source': function(request, response) {
        \$.ajax({
            url: 'index.php?route=marketing/affiliate.autocomplete&user_token={{ user_token }}&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function(json) {
                json.unshift({
                    name: '{{ text_none }}',
                    customer_id: 0
                });

                response(\$.map(json, function(item) {
                    return {
                        label: item['name'],
                        value: item['customer_id']
                    }
                }));
            }
        });
    },
    'select': function(item) {
        \$('#input-affiliate-id').val(item['value']);
        \$('#input-affiliate').val(item['label']);
    }
});

// Affiliate
\$('#form-affiliate').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&action=sale/affiliate',
        type: 'post',
        data: \$('#form-affiliate').serialize(),
        dataType: 'json',
        beforeSend: function() {
            \$('#button-affiliate').button('loading');
        },
        complete: function() {
            \$('#button-affiliate').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#form-affiliate').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#form-affiliate').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                if (\$('#input-affiliate-id').val()) {
                    \$('#affiliate-value').html('<a href=\"index.php?route=marketing/affiliate.form&user_token={{ user_token }}&customer_id=' + \$('#input-affiliate-id').val() + '\" target=\"_blank\">' + \$('#input-affiliate').val() + '</a>');
                } else {
                    \$('#affiliate-value').html('&nbsp;');
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Commission
\$(document).on('click', '#button-commission-add, #button-commission-remove', function(e) {
    var element = this;

    if (\$(element).hasClass('btn-success')) {
        var action = 'add';
    } else {
        var action = 'remove';
    }

    \$.ajax({
        url: 'index.php?route=sale/order.' + action + 'Commission&user_token={{ user_token }}&order_id=' + \$('#input-order-id').val(),
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                if (action == 'add') {
                    \$(element).replaceWith('<button type=\"button\" id=\"button-commission-remove\" data-bs-toggle=\"tooltip\" title=\"{{ button_commission_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>');
                }

                if (action == 'remove') {
                    \$(element).replaceWith('<button type=\"button\" id=\"button-commission-add\" data-bs-toggle=\"tooltip\" title=\"{{ button_commission_add|escape('js') }}\" class=\"btn btn-success\"><i class=\"fa-solid fa-plus-circle\"></i></button>');
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Payment Address
\$('#input-payment-address').on('change', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=customer/customer.address&user_token={{ user_token }}&address_id=' + this.value,
        dataType: 'json',
        beforeSend: function() {
            \$(element).prop('disabled', true);
        },
        complete: function() {
            \$(element).prop('disabled', false);
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#form-payment-address').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            // Reset all fields
            \$('#form-payment-address input[type=\\'text\\'], #form-payment-address textarea').val('');
            \$('#form-payment-address select option').not('#input-payment-address').removeAttr('selected');
            \$('#form-payment-address input[type=\\'checkbox\\'], #form-payment-address input[type=\\'radio\\']').removeAttr('checked');

            \$('#input-payment-firstname').val(json['firstname']);
            \$('#input-payment-lastname').val(json['lastname']);
            \$('#input-payment-company').val(json['company']);
            \$('#input-payment-address-1').val(json['address_1']);
            \$('#input-payment-address-2').val(json['phone']);
            \$('#input-payment-city').val(json['city']);
            \$('#input-payment-postcode').val(json['postcode']);
            \$('#input-payment-country').val(json['country_id']);

            payment_zone_id = json['zone_id'];

            \$('#input-payment-country').trigger('change');

            for (i in json['custom_field']) {
                \$('#input-payment-custom-field-' + i).val(json['custom_field'][i]);

                if (json['custom_field'][i] instanceof Array) {
                    for (j = 0; j < json['custom_field'][i].length; j++) {
                        \$('#input-payment-custom-field-value-' + item.custom_field[i][j]).prop('checked', true);
                    }
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#form-payment-address').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&action=sale/payment_address'  + \"&order_id={{order_id}}\",
        type: 'post',
        data: \$('#form-payment-address').serialize(),
        dataType: 'json',
        beforeSend: function() {
            \$('#button-payment-address').button('loading');
        },
        complete: function() {
            \$('#button-payment-address').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();
            \$('.is-invalid').removeClass('is-invalid');
            \$('.invalid-feedback').removeClass('d-block');

            // Check for errors
            if (json['error']) {
                if (json['error']['warning']) {
                    \$('#form-payment-address').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                for (key in json['error']) {
                    \$('#input-payment-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                    \$('#error-payment-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                }
            }

            if (json['success']) {
                \$('#form-payment-address').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                var address = \$('#input-payment-firstname').val() + ' ' + \$('#input-payment-lastname').val() + \"<br/>\";

                var company = \$('#input-payment-company').val();

                if (company) {
                    address += \$('#input-payment-company').val() + \"<br/>\";
                }

                address += \$('#input-payment-address-1').val() + \"<br/>\";

                var phone = \$('#input-payment-address-2').val();

                if (phone) {
                    address += \$('#input-payment-address-2').val() + \"<br/>\";
                }

                address += \$('#input-payment-city').val() + \"<br/>\";

                var postcode = \$('#input-payment-postcode').val();

                if (postcode) {
                    address += postcode + \"<br/>\";
                }

                address += \$('#input-payment-zone option:selected').text() + \"<br/>\";
                address += \$('#input-payment-country option:selected').text();

                \$('#payment-address-value').html(address);

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

var payment_zone_id = '{{ payment_zone_id }}';

\$('#input-payment-country').on('change', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=localisation/country.country&user_token={{ user_token }}&country_id=' + this.value,
        dataType: 'json',
        beforeSend: function() {
            \$(element).prop('disabled', true);
        },
        complete: function() {
            \$(element).prop('disabled', false);
        },
        success: function(json) {
            if (json['postcode_required'] == '1') {
                \$('#input-payment-postcode').parent().addClass('required');
            } else {
                \$('#input-payment-postcode').parent().removeClass('required');
            }

            html = '<option value=\"\">{{ text_select|escape('js') }}</option>';

            if (json['zone'] && json['zone'] != '') {
                for (i = 0; i < json['zone'].length; i++) {
                    html += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';

                    if (json['zone'][i]['zone_id'] == payment_zone_id) {
                        html += ' selected';
                    }

                    html += '>' + json['zone'][i]['name'] + '</option>';
                }
            } else {
                html += '<option value=\"0\" selected>{{ text_none|escape('js') }}</option>';
            }

            \$('#input-payment-zone').html(html);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-payment-country').trigger('change');

// Shipping Address
\$('#input-shipping-address').on('change', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=customer/customer.address&user_token={{ user_token }}&address_id=' + this.value,
        dataType: 'json',
        beforeSend: function() {
            \$(element).prop('disabled', true);
        },
        complete: function() {
            \$(element).prop('disabled', false);
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#form-shipping-address').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            // Reset all fields
            \$('#form-shipping-address input[type=\\'text\\'], #form-shipping-address input[type=\\'text\\'], #form-shipping-address textarea').val('');
            \$('#form-shipping-address select option').not('#input-shipping-address').removeAttr('selected');
            \$('#form-shipping-address input[type=\\'checkbox\\'], #form-shipping-address input[type=\\'radio\\']').removeAttr('checked');

            \$('#input-shipping-firstname').val(json['firstname']);
            \$('#input-shipping-lastname').val(json['lastname']);
            \$('#input-shipping-company').val(json['company']);
            \$('#input-shipping-address-1').val(json['address_1']);
            \$('#input-shipping-address-2').val(json['phone']);
            \$('#input-shipping-city').val(json['city']);
            \$('#input-shipping-postcode').val(json['postcode']);
            \$('#input-shipping-country').val(json['country_id']);

            shipping_zone_id = json['zone_id'];

            \$('#input-shipping-country').trigger('change');

            for (i in json['custom_field']) {
                \$('#input-shipping-custom-field-' + i).val(json['custom_field'][i]);

                if (json['custom_field'][i] instanceof Array) {
                    for (j = 0; j < json['custom_field'][i].length; j++) {
                        \$('#input-shipping-custom-field-value-' + json['custom_field'][i][j]).prop('checked', true);
                    }
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#form-shipping-address').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&action=sale/shipping_address&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        type: 'post',
        data: \$('#form-shipping-address').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-shipping-address').button('loading');
        },
        complete: function() {
            \$('#button-shipping-address').button('reset');
        },
        success: function(json) {
            \$('#form-shipping-address .alert-dismissible').remove();
            \$('#form-shipping-address .is-invalid').removeClass('is-invalid');
            \$('#form-shipping-address .invalid-feedback').removeClass('d-block');

            // Check for errors
            if (json['error']) {
                if (json['error']['warning']) {
                    \$('#form-shipping-address').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }

                for (key in json['error']) {
                    \$('#input-shipping-' + key.replaceAll('_', '-')).addClass('is-invalid').find('.form-control, .form-select, .form-check-input, .form-check-label').addClass('is-invalid');
                    \$('#error-shipping-' + key.replaceAll('_', '-')).html(json['error'][key]).addClass('d-block');
                }
            }

            if (json['success']) {
                \$('#form-shipping-address').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                var address = \$('#input-shipping-firstname').val() + ' ' + \$('#input-shipping-lastname').val() + \"<br/>\";

                var company = \$('#input-shipping-company').val();

                if (company) {
                    address += \$('#input-shipping-company').val() + \"<br/>\";
                }

                address += \$('#input-shipping-address-1').val() + \"<br/>\";

                var phone = \$('#input-shipping-address-2').val();

                if (phone) {
                    address += \$('#input-shipping-address-2').val() + \"<br/>\";
                }

                address += \$('#input-shipping-city').val() + \"<br/>\";

                var postcode = \$('#input-shipping-postcode').val();

                if (postcode) {
                    address += postcode + \"<br/>\";
                }

                address += \$('#input-shipping-zone option:selected').text() + \"<br/>\";
                address += \$('#input-shipping-country option:selected').text();

                \$('#shipping-address-value').html(address);

                // Refresh products and totals
                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

var shipping_zone_id = '{{ shipping_zone_id }}';

\$('#input-shipping-country').on('change', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=localisation/country.country&user_token={{ user_token }}&country_id=' + this.value,
        dataType: 'json',
        beforeSend: function() {
            \$(element).prop('disabled', true);
        },
        complete: function() {
            \$(element).prop('disabled', false);
        },
        success: function(json) {
            if (json['postcode_required'] == '1') {
                \$('#input-shipping-postcode').parent().addClass('required');
            } else {
                \$('#input-shipping-postcode').parent().removeClass('required');
            }

            html = '<option value=\"\">{{ text_select|escape('js') }}</option>';

            if (json['zone'] && json['zone'] != '') {
                for (i = 0; i < json['zone'].length; i++) {
                    html += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';

                    if (json['zone'][i]['zone_id'] == shipping_zone_id) {
                        html += ' selected';
                    }

                    html += '>' + json['zone'][i]['name'] + '</option>';
                }
            } else {
                html += '<option value=\"0\" selected>{{ text_none|escape('js') }}</option>';
            }

            \$('#input-shipping-zone').html(html);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#input-shipping-country').trigger('change');

// Shipping Method
\$('#button-shipping-methods').on('click', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&action=sale/shipping_method&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['shipping_methods']) {
                html = '';

                for (i in json['shipping_methods']) {
                    html += '<p><strong>' + json['shipping_methods'][i]['name'] + '</strong></p>';

                    if (!json['shipping_methods'][i]['error']) {
                        for (j in json['shipping_methods'][i]['quote']) {
                            html += '<div class=\"form-check\">';

                            var code = i + '-' + j.replaceAll('_', '-');

                            html += '<input type=\"radio\" name=\"shipping_method\" value=\"' + json['shipping_methods'][i]['quote'][j]['code'] + '\" id=\"input-shipping-method-' + code + '\"';

                            if (json['shipping_methods'][i]['quote'][j]['code'] == \$('#input-shipping-code').val()) {
                                html += ' checked';
                            }

                            html += '/>';
                            html += '  <label for=\"input-shipping-method-' + code + '\">' + json['shipping_methods'][i]['quote'][j]['name'] + ' - ' + json['shipping_methods'][i]['quote'][j]['text'] + '</label>';
                            html += '</div>';
                        }
                    } else {
                        html += '<div class=\"alert alert-danger\">' + json['shipping_methods'][i]['error'] + '</div>';
                    }
                }

                \$('#shipping-methods').html(html);

                \$('#modal-shipping').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#form-shipping-method').on('submit', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&action=sale/shipping_method.save&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        type: 'post',
        data: \$('#form-shipping-method').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-shipping-method').button('loading');
        },
        complete: function() {
            \$('#button-shipping-method').button('reset');
        },
        success: function(json) {
            console.log(json);

            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#form-shipping-method').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#form-shipping-method').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#shipping-method-value').html(\$('input[name=\\'shipping_method\\']:checked').parent().find('label').text());
                \$('#input-shipping-code').val(\$('input[name=\\'shipping_method\\']:checked').val());

                //\$('#payment-method-value').html('');

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Payment Method
\$('#button-payment-methods').on('click', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&action=sale/payment_method&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val()  + \"&order_id={{order_id}}\",
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['payment_methods']) {
                var html = '';

                for (i in json['payment_methods']) {
                    html += '<p><strong>' + json['payment_methods'][i]['name'] + '</strong></p>';

                    if (!json['payment_methods'][i]['error']) {
                        for (j in json['payment_methods'][i]['option']) {
                            html += '<div class=\"form-check\">';

                            var code = i + '-' + j.replaceAll('_', '-');

                            html += '<input type=\"radio\" name=\"payment_method\" value=\"' + json['payment_methods'][i]['option'][j]['code'] + '\" id=\"input-payment-method-' + code + '\"';

                            if (json['payment_methods'][i]['option'][j]['code'] == \$('#input-payment-code').val()) {
                                html += ' checked';
                            }

                            html += '/>';
                            html += '  <label for=\"input-payment-method-' + code + '\">' + json['payment_methods'][i]['option'][j]['name'] + '</label>';
                            html += '</div>';
                        }
                    } else {
                        html += '<div class=\"alert alert-danger\">' + json['payment_methods'][i]['error'] + '</div>';
                    }
                }

                \$('#payment-methods').html(html);

                \$('#modal-payment').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#form-payment-method').on('submit', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&action=sale/payment_method.save&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        type: 'post',
        data: \$('#form-payment-method').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-payment-method').button('loading');
        },
        complete: function() {
            \$('#button-payment-method').button('reset');
        },
        success: function(json) {
            console.log(json);

            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#form-payment-method').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#form-payment-method').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#payment-method-value').html(\$('input[name=\\'payment_method\\']:checked').parent().find('label').text());
                \$('#input-payment-code').val(\$('input[name=\\'payment_method\\']:checked').val());

                \$('#button-refresh').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#form-comment').on('submit', function(e) {
    e.preventDefault();

    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&action=sale/order.comment&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val(),
        type: 'post',
        data: \$('#form-comment').serialize(),
        dataType: 'json',
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-comment').button('loading');
        },
        complete: function() {
            \$('#button-comment').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            // Check for errors
            if (json['error']) {
                \$('#form-comment').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#form-comment').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#comment-value').html(\$('#input-comment').val().replace(/([^>\\r\\n]?)(\\r\\n|\\n\\r|\\r|\\n)/g, '\$1<br/>\$2'));
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

// Refresh all products and totals
\$('#button-refresh').on('click', function() {
  \$.ajax({
    url: 'index.php?route=sale/order.call&user_token={{ user_token }}&action=sale/cart&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val()  + \"&order_id={{order_id}}\",
    dataType: 'json',
    beforeSend: function() {
        \$('#button-refresh').button('loading');
        \$('#button-confirm').prop('disabled', true);
    },
    complete: function() {
        \$('#button-refresh').button('reset');
        \$('#button-confirm').prop('disabled', false);
    },
    success: function(json) {
        let html = '';

        if (Object.keys(json['products']).length > 0) {
         
            for (const productId in json['products']) {
                const product = json['products'][productId];

                html += '<tr>';
                html += '  <td class=\"text-start\"><a href=\"index.php?route=catalog/product.form&user_token={{ user_token }}&product_id=' + product['product_id'] + '\" target=\"_blank\">' + product['name'] + '</a>' + (!product['stock'] ? ' <span class=\"text-danger\">***</span>' : '');

                if (product['option']) {
                    for (const option of product['option']) {
                        html += '<br/>';
                        html += '  - <small>' + option['name'] + ': ' + option['value'] + '</small>';
                    }
                }

                if (product['reward']) {
                    html += '<br/>';
                    html += '  - <small>{{ text_points|escape('js') }}: ' + product['reward'] + '</small>';
                }
               
                if (product['subscription'].length > 0) {
                    html += '<br/>';
                    html += '  - <small>{{ text_subscription|escape('js') }}: <a href=\"index.php?route=sale/subscription.info&user_token={{ user_token }}&subscription_id={{ order_product.subscription_id }}\" target=\"_blank\">' + product['subscription'] + '</small>';
                }

                html += '  </td>';
                html += '  <td class=\"text-start\">' + product['sku'] + '</td>';
                html += '  <td class=\"text-end\">' + product['quantity'] + '</td>';
                html += '  <td class=\"text-end\">' + product['price'] + '</td>';
                html += '  <td class=\"text-end\">' + product['total'] + '</td>';
                html += '  <td class=\"text-end\">';
                html += '    <form>';
                html += '      <button type=\"submit\" data-bs-toggle=\"tooltip\" title=\"{{ button_remove|escape('js') }}\" class=\"btn btn-danger\"><i class=\"fa-solid fa-minus-circle\"></i></button>';
                html += '      <input type=\"hidden\" name=\"card_id\" value=\"' + product['cart_id'] + '\"/>';
                html += '    </form>';
                html += '  </td>';
                html += '</tr>';
            }
        }

        \$('#order-products').html(html);

        html = '';

    
        if (json['products'].length === 0) {
            console.log(json['products']);
            html += '<tr>';
            html += '  <td colspan=\"6\" class=\"text-center\">{{text_no_results|escape('js') }}</td>';
            html += '</tr>';
        }
 
        // Totals
        html = '';

        if (json['totals']?.length) {
            for (const total of json['totals']) {
                html += '<tr>';
                html += '  <td class=\"text-end\"><strong>' + total['title'] + '</strong></td>';
                html += '  <td class=\"text-end\" style=\"width: 1px;\">' + total['text'] + '</td>';
                html += '</tr>';
            }
        }

        \$('#order-totals').html(html);

        if (json['shipping_required']) {
            \$('#shipping-address').removeClass('d-none');
            \$('#shipping-method').removeClass('d-none');
            \$('#button-shipping').prop('disabled', false);
        } else {
       
            \$('#button-shipping').prop('disabled', true);
        }
    }
});

});
 
// Checkout
\$('#button-confirm').on('click', function() {
    var element = this;

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&action=sale/order.confirm&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + \"&order_id={{order_id}}\" ,
        dataType: 'json',
        beforeSend: function() {
            \$(element).button('loading');
        },
        complete: function() {
            \$(element).button('reset');
        },
        success: function(json) {
            console.log(json);

            \$('.alert-dismissible').remove();

            if (json['error']) {
                for (i in json['error']) {
                    \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'][i] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
                }
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                if (json['order_id']) {
                    \$('#input-order-id').val(json['order_id']);
                }

                if (json['points']) {
                    \$('#reward-value').html(json['points']);
                    \$('#button-reward-add').prop('disabled', false);
                    \$('#button-reward-remove').prop('disabled', false);
                } else {
                    \$('#reward-value').html(0);
                    \$('#button-reward-add').prop('disabled', true);
                    \$('#button-reward-remove').prop('disabled', true);
                }

                if (json['commission']) {
                    \$('#commission-value').html(json['commission']);
                    \$('#button-commission-add').prop('disabled', false);
                    \$('#button-commission-remove').prop('disabled', false);
                } else {
                    \$('#commission-value').html('&nbsp;');
                    \$('#button-commission-add').prop('disabled', true);
                    \$('#button-commission-remove').prop('disabled', true);
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});

\$('#history').on('click', '.pagination a', function(e) {
    e.preventDefault();

    \$('#history').load(this.href);
});

\$('#form-history').on('submit', function(e) {
    e.preventDefault();

    \$.ajax({
        url: 'index.php?route=sale/order.call&user_token={{ user_token }}&action=sale/order.addHistory&store_id=' + \$('#input-store').val() + '&language=' + \$('#input-language').val() + '&order_id=' + \$('#input-order-id').val(),
        type: 'post',
        dataType: 'json',
        data: \$('#form-history').serialize(),
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function() {
            \$('#button-history').button('loading');
        },
        complete: function() {
            \$('#button-history').button('reset');
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');

                \$('#history').load('index.php?route=sale/order.history&user_token={{ user_token }}&order_id=' + \$('#input-order-id').val());

                \$('#input-history').val('');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
    });
});
//--></script>
{{ footer }}
", "cp-akis/view//plates/sale/order_info.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/plates/sale/order_info.twig");
    }
}
