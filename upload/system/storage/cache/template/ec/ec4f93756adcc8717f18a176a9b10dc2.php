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

/* cp-akis/view/default/plates/catalog/category_list.twig */
class __TwigTemplate_f7c296d0bea28fce948fa995759ae95f extends Template
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
        echo "<style>
\t.my-handle {
\t\tcursor: grab;
\t\tfont-size: 21px;
\t\tcursor: -webkit-grabbing;
\t\tcolor: #595959;
\t}
</style>
<form id=\"form-category\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
        // line 9
        echo ($context["action"] ?? null);
        echo "\" data-oc-target=\"#category\">
\t<!-- Template seceleton for accordion -->
\t<div id=\"category-id-standby\" class=\"accordion accordion-flush d-none\">
\t\t<div class=\"accordion-item\">
\t\t\t<h2 class=\"accordion-header\" id=\"flush-headingx}\">
\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t<button class=\"flex-grow-1 border  rounded accordion-button collapsed\" type=\"button\"
\t\t\t\t\t\tdata-bs-toggle=\"collapse\" data-bs-target=\"#flush-collapsex\" aria-expanded=\"false\"
\t\t\t\t\t\taria-controls=\"flush-collapsex\">
\t\t\t\t\t\t<span class=\"my-handle\" aria-hidden=\"true\">
\t\t\t\t\t\t\t<i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
\t\t\t\t\t\t</span>

\t\t\t\t\t</button>
\t\t\t\t</div>
\t\t\t</h2>
\t\t\t<div id=\"flush-collapsex\" class=\"accordion-collapse collapse\" aria-labelledby=\"flush-headingx\"
\t\t\t\tdata-bs-parent=\"#accordionFlushExample\">
\t\t\t\t<div class=\"accordion-body\"></div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<!-- END //Template seceleton for accordion -->

\t";
        // line 33
        if (($context["categories"] ?? null)) {
            // line 34
            echo "\t<ul class=\"listWithHandle\" id=\"accordionContainer\" style=\"padding: 0; margin: 0\">
\t</ul>
\t";
        }
        // line 37
        echo "\t</div>

</form>
<style>

</style>

<script  src=\"view/javascript/Sortable.min.js\"></script>
<script>
\tvar categories = ";
        // line 46
        echo json_encode(($context["categories"] ?? null));
        echo ";
\tvar sortedCategories = Object.values(categories).sort((a, b) => a.sort_order - b.sort_order);
\tvar superI = sortedCategories.length;

\t\$(document).ready(function () {

\tfunction processCategory(category) {
\t\t
\t\tlet newAccordion = \$(\"#category-id-standby\").clone();
\t\tnewAccordion.attr(\"id\", \"category-id-\" + category.category_id);
\t\tlet listItem = \$('<li class=\"list-group-item\"></li>');
\t\tnewAccordion.find(\".accordion-button\").append(category.name);

\t\tlet editButton = \$('<a>', {
\t\t\thref: category.edit,
\t\t\t'data-bs-toggle': 'tooltip',
\t\t\tclass: 'btn btnedit btn-primary',
\t\t\t'aria-label': '";
        // line 63
        echo ($context["button_edit"] ?? null);
        echo "\"',
\t\t\t'data-bs-original-title': '";
        // line 64
        echo ($context["button_edit"] ?? null);
        echo "\"',
\t\t\thtml: '<i class=\"fa-solid fa-pencil\"></i>'
\t\t});
\t\tcheckbox = \$('<input style=\"border-color: #828282; margin-top: 8px;\" class=\"mx-3 form-check-input\" type=\"checkbox\" name=\"selected[]\" value=\"'+  category.category_id  +'\"  />');
\t\tcontrolContainer = \$('<span style=\"position: absolute; right: 50px;\"></span>');
\t\tcontrolContainer.append(checkbox);
\t\tcontrolContainer.append(editButton);
\t 

\t\tnewAccordion.find(\".accordion-button\").append(controlContainer);
\t 
\t\tnewAccordion.removeClass(\"d-none\");
\t\tlet ariaLabelledById = \"accordion-heading-\" + category.category_id;
\t\tlet ariaControls = \"accordion-collapse-\" + category.category_id;
\t\tlet accbody = \"accordion-body-\" + category.category_id;
\t\tlet accbutton = \"accordion-button-\" + category.category_id;
\t\tnewAccordion.find(\".accordion-body\").attr(\"id\", accbody);
\t\tnewAccordion.find(\".accordion-button\").attr(\"id\", accbutton);
\t\tnewAccordion.find(\".accordion-header\").attr(\"id\", ariaLabelledById);
\t\tnewAccordion.find(\".accordion-button\").attr(\"data-bs-target\", \"#\" + ariaControls);
\t\tnewAccordion.find(\".accordion-button\").attr(\"data-catid\", category.category_id);
\t\tnewAccordion.find(\".accordion-collapse\").attr(\"id\", ariaControls);
\t\tnewAccordion.find(\".accordion-collapse\").attr(\"aria-labelledby\", ariaLabelledById);
\t\tnewAccordion.find(\".accordion-collapse\").attr(\"data-bs-parent\", \"#\" + ariaLabelledById);
\t\tif (category.parent_id == 0 && \$(\"#accordion-body-\" + category.category_id).length == 0) {
\t\t\tnewAccordion.appendTo(listItem);
\t\t\t\$(\"#accordionContainer\").append(listItem);
\t\t\treturn true;
\t\t} else {
\t\t\tif (\$(\"#accordion-body-\" + category.parent_id).length > 0 && \$(\"#accordion-body-\" + category.category_id).length == 0) {

\t\t\t\tif (\$(\"#accordion-body-\" + category.parent_id).length < 2) {
\t\t\t\t\t\$(\"#accordion-body-\" + category.parent_id).append('<ul class=\"listWithHandle\" id=\"real-body-ul-' + category.parent_id + '\" style=\"padding: 0; margin: 0\"></ul>');
\t\t\t\t\tnewAccordion.appendTo(listItem);
\t\t\t\t\t\$('#real-body-ul-' + category.parent_id).append(listItem);
\t\t\t\t}
\t\t\t\treturn true;
\t\t\t} else {
\t\t\t\treturn false;
\t\t\t}
\t\t}
\t}

\tfunction getCategoryById(categoryId) {
\t\treturn sortedCategories.find(category => category.category_id === categoryId);
\t}

 
\t\twhile (superI > 0) {
\t\t\tObject.keys(sortedCategories).forEach((categoryId, index) => {
\t\t\t\tconst category = sortedCategories[categoryId];
\t\t\t\tif (category && category.category_id && processCategory(category)) {
\t\t\t\t\tsuperI--;
\t\t\t\t}
\t\t\t});
\t\t\tif (superI == 0) {
\t\t\t\tinitializeSortables();
\t\t\t}
\t\t}
\t 
\t\$(\"#accordionContainer .accordion\").each(function () {
\t\tvar accordionBody = \$(this).find(\".accordion-body\");
\t\tif (accordionBody.text().length < 2) {
\t\t\taccordionBody.addClass(\"d-none\");
\t\t} else {
\t\t\t\$(\"#\" + accordionBody.attr('id').replace(\"accordion-body\", \"accordion-button\")).append(' <span class=\"mx-4\"> <i class=\"fas fa-chevron-down\"></i></span>');
\t\t}
\t});
\t\$(\".accordion-button\").click(function () {
\t\tvar accordionBody = \$(this).closest(\".accordion-item\").find(\".accordion-body\");

\t\tif (accordionBody.text().trim().length < 2) {
\t\t\t\$(this).addClass(\"collapsed\");
\t\t}
\t});

\t\$(document).on(\"click\", \".btnedit\", function (event) {
\t\tevent.preventDefault(); // Prevent the default behavior of the link
\t\twindow.location.href = \$(this).attr('href').replace(/&amp;/g, '&');
\t});

\tfunction initializeSortables() {
\t\t\$('.listWithHandle').each(function () {
\t\t\t// Check if Sortable instance already exists
\t\t\tif (!\$(this).data('sortable')) {
\t\t\t\t// Create Sortable instance
\t\t\t\tSortable.create(this, {
\t\t\t\t\thandle: '.my-handle',
\t\t\t\t\tanimation: 150,
\t\t\t\t\tonEnd: function (event) {
\t\t\t\t\t\t// Update the values after sorting is complete
\t\t\t\t\t\thandleSortEnd(event);
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
\t\t});
\t}

\tfunction handleSortEnd(evt) {
\t\tvar categoryPositions = {};
\t\t\$('#accordionContainer .accordion-button').each(function (index) {
\t\t\tvar catId = \$(this).data('catid');
\t\t\tcategoryPositions[catId] = index;
\t\t});
\t\tupdateSortOrder(reverseObjectKeys(categoryPositions));
\t}
\tfunction reverseObjectKeys(obj) {
\t\treturn Object.keys(obj).reverse().reduce(function (result, key) {
\t\t\tresult[key] = obj[key];
\t\t\treturn result;
\t\t}, {});
\t}

\tfunction updateSortOrder(sortObject) {
\t\tif (\$.isEmptyObject(sortObject)) {
\t\t\tconsole.log('Sort object is empty. Nothing to update.');
\t\t\treturn;
\t\t}
\t\t\$.ajax({
\t\t\ttype: 'POST',
\t\t\tdataType: 'json',
\t\t\turl: 'index.php?route=catalog/category.updateSortOrder&user_token=' + getUrlParameter('user_token'),
\t\t\tdata: { newSort: sortObject },
\t\t\tsuccess: function (response) {
\t\t\t\tif (response.status == \"ok\") {
\t\t\t\t\t\$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> '+ response.text   +' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
\t\t\t\t\tsetTimeout(() => {
\t\t\t\t\t\t\$(\".alert\").alert('close');
\t\t\t\t\t}, 5500);
\t\t\t\t}
\t\t\t},
\t\t\terror: function (error) {
\t\t\t\tconsole.error('Error updating sort order:', error);
\t\t\t}
\t\t});
\t}
\tfunction getUrlParameter(name) {
\t\tconst params = new URLSearchParams(window.location.search);
\t\treturn params.get(name) || '';
\t}
});
</script>";
    }

    public function getTemplateName()
    {
        return "cp-akis/view/default/plates/catalog/category_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 64,  112 => 63,  92 => 46,  81 => 37,  76 => 34,  74 => 33,  47 => 9,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<style>
\t.my-handle {
\t\tcursor: grab;
\t\tfont-size: 21px;
\t\tcursor: -webkit-grabbing;
\t\tcolor: #595959;
\t}
</style>
<form id=\"form-category\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ action }}\" data-oc-target=\"#category\">
\t<!-- Template seceleton for accordion -->
\t<div id=\"category-id-standby\" class=\"accordion accordion-flush d-none\">
\t\t<div class=\"accordion-item\">
\t\t\t<h2 class=\"accordion-header\" id=\"flush-headingx}\">
\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t<button class=\"flex-grow-1 border  rounded accordion-button collapsed\" type=\"button\"
\t\t\t\t\t\tdata-bs-toggle=\"collapse\" data-bs-target=\"#flush-collapsex\" aria-expanded=\"false\"
\t\t\t\t\t\taria-controls=\"flush-collapsex\">
\t\t\t\t\t\t<span class=\"my-handle\" aria-hidden=\"true\">
\t\t\t\t\t\t\t<i class=\"fa-solid mx-2 fa-grip-vertical\"></i>
\t\t\t\t\t\t</span>

\t\t\t\t\t</button>
\t\t\t\t</div>
\t\t\t</h2>
\t\t\t<div id=\"flush-collapsex\" class=\"accordion-collapse collapse\" aria-labelledby=\"flush-headingx\"
\t\t\t\tdata-bs-parent=\"#accordionFlushExample\">
\t\t\t\t<div class=\"accordion-body\"></div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<!-- END //Template seceleton for accordion -->

\t{% if categories %}
\t<ul class=\"listWithHandle\" id=\"accordionContainer\" style=\"padding: 0; margin: 0\">
\t</ul>
\t{% endif %}
\t</div>

</form>
<style>

</style>

<script  src=\"view/javascript/Sortable.min.js\"></script>
<script>
\tvar categories = {{ categories| json_encode | raw }};
\tvar sortedCategories = Object.values(categories).sort((a, b) => a.sort_order - b.sort_order);
\tvar superI = sortedCategories.length;

\t\$(document).ready(function () {

\tfunction processCategory(category) {
\t\t
\t\tlet newAccordion = \$(\"#category-id-standby\").clone();
\t\tnewAccordion.attr(\"id\", \"category-id-\" + category.category_id);
\t\tlet listItem = \$('<li class=\"list-group-item\"></li>');
\t\tnewAccordion.find(\".accordion-button\").append(category.name);

\t\tlet editButton = \$('<a>', {
\t\t\thref: category.edit,
\t\t\t'data-bs-toggle': 'tooltip',
\t\t\tclass: 'btn btnedit btn-primary',
\t\t\t'aria-label': '{{ button_edit }}\"',
\t\t\t'data-bs-original-title': '{{ button_edit }}\"',
\t\t\thtml: '<i class=\"fa-solid fa-pencil\"></i>'
\t\t});
\t\tcheckbox = \$('<input style=\"border-color: #828282; margin-top: 8px;\" class=\"mx-3 form-check-input\" type=\"checkbox\" name=\"selected[]\" value=\"'+  category.category_id  +'\"  />');
\t\tcontrolContainer = \$('<span style=\"position: absolute; right: 50px;\"></span>');
\t\tcontrolContainer.append(checkbox);
\t\tcontrolContainer.append(editButton);
\t 

\t\tnewAccordion.find(\".accordion-button\").append(controlContainer);
\t 
\t\tnewAccordion.removeClass(\"d-none\");
\t\tlet ariaLabelledById = \"accordion-heading-\" + category.category_id;
\t\tlet ariaControls = \"accordion-collapse-\" + category.category_id;
\t\tlet accbody = \"accordion-body-\" + category.category_id;
\t\tlet accbutton = \"accordion-button-\" + category.category_id;
\t\tnewAccordion.find(\".accordion-body\").attr(\"id\", accbody);
\t\tnewAccordion.find(\".accordion-button\").attr(\"id\", accbutton);
\t\tnewAccordion.find(\".accordion-header\").attr(\"id\", ariaLabelledById);
\t\tnewAccordion.find(\".accordion-button\").attr(\"data-bs-target\", \"#\" + ariaControls);
\t\tnewAccordion.find(\".accordion-button\").attr(\"data-catid\", category.category_id);
\t\tnewAccordion.find(\".accordion-collapse\").attr(\"id\", ariaControls);
\t\tnewAccordion.find(\".accordion-collapse\").attr(\"aria-labelledby\", ariaLabelledById);
\t\tnewAccordion.find(\".accordion-collapse\").attr(\"data-bs-parent\", \"#\" + ariaLabelledById);
\t\tif (category.parent_id == 0 && \$(\"#accordion-body-\" + category.category_id).length == 0) {
\t\t\tnewAccordion.appendTo(listItem);
\t\t\t\$(\"#accordionContainer\").append(listItem);
\t\t\treturn true;
\t\t} else {
\t\t\tif (\$(\"#accordion-body-\" + category.parent_id).length > 0 && \$(\"#accordion-body-\" + category.category_id).length == 0) {

\t\t\t\tif (\$(\"#accordion-body-\" + category.parent_id).length < 2) {
\t\t\t\t\t\$(\"#accordion-body-\" + category.parent_id).append('<ul class=\"listWithHandle\" id=\"real-body-ul-' + category.parent_id + '\" style=\"padding: 0; margin: 0\"></ul>');
\t\t\t\t\tnewAccordion.appendTo(listItem);
\t\t\t\t\t\$('#real-body-ul-' + category.parent_id).append(listItem);
\t\t\t\t}
\t\t\t\treturn true;
\t\t\t} else {
\t\t\t\treturn false;
\t\t\t}
\t\t}
\t}

\tfunction getCategoryById(categoryId) {
\t\treturn sortedCategories.find(category => category.category_id === categoryId);
\t}

 
\t\twhile (superI > 0) {
\t\t\tObject.keys(sortedCategories).forEach((categoryId, index) => {
\t\t\t\tconst category = sortedCategories[categoryId];
\t\t\t\tif (category && category.category_id && processCategory(category)) {
\t\t\t\t\tsuperI--;
\t\t\t\t}
\t\t\t});
\t\t\tif (superI == 0) {
\t\t\t\tinitializeSortables();
\t\t\t}
\t\t}
\t 
\t\$(\"#accordionContainer .accordion\").each(function () {
\t\tvar accordionBody = \$(this).find(\".accordion-body\");
\t\tif (accordionBody.text().length < 2) {
\t\t\taccordionBody.addClass(\"d-none\");
\t\t} else {
\t\t\t\$(\"#\" + accordionBody.attr('id').replace(\"accordion-body\", \"accordion-button\")).append(' <span class=\"mx-4\"> <i class=\"fas fa-chevron-down\"></i></span>');
\t\t}
\t});
\t\$(\".accordion-button\").click(function () {
\t\tvar accordionBody = \$(this).closest(\".accordion-item\").find(\".accordion-body\");

\t\tif (accordionBody.text().trim().length < 2) {
\t\t\t\$(this).addClass(\"collapsed\");
\t\t}
\t});

\t\$(document).on(\"click\", \".btnedit\", function (event) {
\t\tevent.preventDefault(); // Prevent the default behavior of the link
\t\twindow.location.href = \$(this).attr('href').replace(/&amp;/g, '&');
\t});

\tfunction initializeSortables() {
\t\t\$('.listWithHandle').each(function () {
\t\t\t// Check if Sortable instance already exists
\t\t\tif (!\$(this).data('sortable')) {
\t\t\t\t// Create Sortable instance
\t\t\t\tSortable.create(this, {
\t\t\t\t\thandle: '.my-handle',
\t\t\t\t\tanimation: 150,
\t\t\t\t\tonEnd: function (event) {
\t\t\t\t\t\t// Update the values after sorting is complete
\t\t\t\t\t\thandleSortEnd(event);
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
\t\t});
\t}

\tfunction handleSortEnd(evt) {
\t\tvar categoryPositions = {};
\t\t\$('#accordionContainer .accordion-button').each(function (index) {
\t\t\tvar catId = \$(this).data('catid');
\t\t\tcategoryPositions[catId] = index;
\t\t});
\t\tupdateSortOrder(reverseObjectKeys(categoryPositions));
\t}
\tfunction reverseObjectKeys(obj) {
\t\treturn Object.keys(obj).reverse().reduce(function (result, key) {
\t\t\tresult[key] = obj[key];
\t\t\treturn result;
\t\t}, {});
\t}

\tfunction updateSortOrder(sortObject) {
\t\tif (\$.isEmptyObject(sortObject)) {
\t\t\tconsole.log('Sort object is empty. Nothing to update.');
\t\t\treturn;
\t\t}
\t\t\$.ajax({
\t\t\ttype: 'POST',
\t\t\tdataType: 'json',
\t\t\turl: 'index.php?route=catalog/category.updateSortOrder&user_token=' + getUrlParameter('user_token'),
\t\t\tdata: { newSort: sortObject },
\t\t\tsuccess: function (response) {
\t\t\t\tif (response.status == \"ok\") {
\t\t\t\t\t\$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-circle-check\"></i> '+ response.text   +' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
\t\t\t\t\tsetTimeout(() => {
\t\t\t\t\t\t\$(\".alert\").alert('close');
\t\t\t\t\t}, 5500);
\t\t\t\t}
\t\t\t},
\t\t\terror: function (error) {
\t\t\t\tconsole.error('Error updating sort order:', error);
\t\t\t}
\t\t});
\t}
\tfunction getUrlParameter(name) {
\t\tconst params = new URLSearchParams(window.location.search);
\t\treturn params.get(name) || '';
\t}
});
</script>", "cp-akis/view/default/plates/catalog/category_list.twig", "/home/natsos/web/ventocart.lan/public_html/cp-akis/view/default/plates/catalog/category_list.twig");
    }
}
