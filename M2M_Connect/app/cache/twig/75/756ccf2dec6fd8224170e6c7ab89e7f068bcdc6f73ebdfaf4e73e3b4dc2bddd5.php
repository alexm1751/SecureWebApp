<?php

/* loginForm.html.twig */
class __TwigTemplate_383cb467965070d3b37f95eee3bf8337463cd510c1e7b214df056b4f53f1f735 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'login' => array($this, 'block_login'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('login', $context, $blocks);
    }

    public function block_login($context, array $blocks = array())
    {
        // line 2
        echo "    <main class=\"main\">
    <!--    INTRO -->
    <h3>Welcome</h3>
    <h4>Please login or register below.</h4>

    <!--    LOGIN  -->
    <div class=\"forms\">
    <section class=\"login\">
        <form action=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
        echo "\" method=\"";
        echo twig_escape_filter($this->env, ($context["method"] ?? null), "html", null, true);
        echo "\">
            <fieldset>
                <h4>Login</h4>

                <label>Phone Number</label>
                <input type=\"text\" placeholder=\"e.g. smith@email.com\" name=\"loguser\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, ($context["initial_input_box_value"] ?? null), "html", null, true);
        echo "\" required>


                <label>Password</label>
                <input type=\"password\" placeholder=\"Enter Password\" name=\"logpass\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, ($context["initial_input_box_value"] ?? null), "html", null, true);
        echo "\" required>

                <button type=\"submit\" id=\"login\">Login</button>
            </fieldset>
        </form>
    </section>
";
    }

    public function getTemplateName()
    {
        return "loginForm.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  53 => 19,  46 => 15,  36 => 10,  26 => 2,  20 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "loginForm.html.twig", "/Applications/MAMP/htdocs/SecureWebApp/M2M_Connect/app/templates/loginForm.html.twig");
    }
}
