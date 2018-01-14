<?php

/* registerForm.html.twig */
class __TwigTemplate_e6976c9967f07430992dec60b79aa881e06b441348d933f6a469d70ea8e90646 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'register' => array($this, 'block_register'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('register', $context, $blocks);
    }

    public function block_register($context, array $blocks = array())
    {
        // line 2
        echo "    <!--    REGISTER  -->
    <section class=\"register\">
        <!--    LOGIN  -->
        <form action=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["action2"] ?? null), "html", null, true);
        echo "\" method=\"";
        echo twig_escape_filter($this->env, ($context["method2"] ?? null), "html", null, true);
        echo "\">
            <fieldset>
                <h4>Register</h4>
                <label>Full Name</label>
                <input type=\"text\" placeholder=\"e.g. Joe Smith\" name=\"reguser\" required>

                <label>Email</label>
                <input type=\"text\" placeholder=\"e.g. smith@email.com\" name=\"regemail\" required>

                <label>Password</label>
                <input type=\"password\" placeholder=\"Enter Password\" name=\"regpass\" required>

                <label>Phone Number (no spaces)</label>
                <input type=\"text\" placeholder=\"e.g 447123456789\" name=\"regnumber\" required>

                <button type=\"submit\" id=\"register\">Register</button>
            </fieldset>
        </form>
    </section>
";
    }

    public function getTemplateName()
    {
        return "registerForm.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  31 => 5,  26 => 2,  20 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "registerForm.html.twig", "/Applications/MAMP/htdocs/SecureWebApp/M2M_Connect/app/templates/registerForm.html.twig");
    }
}
