<?php

/* banner.html.twig */
class __TwigTemplate_f9b99648b4d0f03c28d93560c4b1d9b4e3b19fcf74f8ec197c5479cc112f6ff1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "banner.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'banner' => array($this, 'block_banner'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, ($context["page_title"] ?? null), "html", null, true);
    }

    // line 3
    public function block_banner($context, array $blocks = array())
    {
        // line 4
        echo "<div id=\"banner-div\">
    <h1>";
        // line 5
        echo twig_escape_filter($this->env, ($context["page_heading_1"] ?? null), "html", null, true);
        echo "</h1>
    <p class=\"cent\">
        Page last updated on <script type=\"text/javascript\">document.write(document.lastModified)</script>
        <br />
        Maintained by <a href=\"mailto:cfi@dmu.ac.uk\">cfi@dmu.ac.uk</a>
    </p>
    <hr class=\"deepline\"/>
</div>
<div id=\"clear-div\"></div>
";
    }

    public function getTemplateName()
    {
        return "banner.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 5,  38 => 4,  35 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "banner.html.twig", "/Applications/MAMP/htdocs/SecureWebApp/M2M_Connect/app/templates/banner.html.twig");
    }
}
