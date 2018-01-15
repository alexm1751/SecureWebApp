<?php

/* homepageform.html.twig */
class __TwigTemplate_7ae8e95272da8b4e6d3f89107eed17e2d8c6d43d1cfe6d1286240824e3861241 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("banner.html.twig", "homepageform.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "banner.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "    <!--  NAVIGATION -->
    <nav>
        <ul class=\"menu\">
            <li><a href=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["landing_page"] ?? null), "html", null, true);
        echo "\" class=\"active\">Home</a></li>
        </ul>
    </nav>


    ";
        // line 11
        $this->loadTemplate("loginForm.html.twig", "homepageform.html.twig", 11)->display($context);
        // line 12
        echo "
    ";
        // line 13
        $this->loadTemplate("registerForm.html.twig", "homepageform.html.twig", 13)->display($context);
        // line 14
        echo "

    <!--  FOOTER   -->
    <footer class=\"footer\">
        <h5><a href=\"";
        // line 18
        echo twig_escape_filter($this->env, ($context["landing_page"] ?? null), "html", null, true);
        echo "\" class=\"heading\">EE M2M SOAP Server Application</a></h5>
        <h6><a href=\"";
        // line 19
        echo twig_escape_filter($this->env, ($context["landing_page"] ?? null), "html", null, true);
        echo "\" class=\"heading\">CTEC3110 Secure Web Application Development</a></h6>

        <p id=\"footer\"><a href=\"https://github.com/alexm1751/SecureWebApp\">Created by Alex Mason, Dominic Bryan and Alistair Laughland</a></p>

        <a href=\"https://validator.w3.org/\"><img src=\"https://www.w3.org/Icons/valid-html401\" alt=\"w3 HTML 4.01 / HTML DTD Validation\" id=\"validation\"></a>
    </footer>
";
    }

    public function getTemplateName()
    {
        return "homepageform.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 19,  57 => 18,  51 => 14,  49 => 13,  46 => 12,  44 => 11,  36 => 6,  31 => 3,  28 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "homepageform.html.twig", "/Applications/MAMP/htdocs/SecureWebApp/M2M_Connect/app/templates/homepageform.html.twig");
    }
}
