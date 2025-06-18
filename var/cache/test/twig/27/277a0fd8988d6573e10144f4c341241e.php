<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* base.html.twig */
class __TwigTemplate_ce3dd9cf587a03120294e4cdb9f1f50c extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'header_title' => [$this, 'block_header_title'],
            'header_img' => [$this, 'block_header_img'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
\t<head>
\t\t<meta charset=\"utf-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t<meta name=\"description\" content=\"\">
\t\t<meta name=\"author\" content=\"\">
\t\t<title>To Do List app</title>
\t\t<!-- Bootstrap Core CSS -->
\t\t<link
\t\thref=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("styles/bootstrap.min.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
\t\t<!-- Custom CSS -->
\t\t<link href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("styles/shop-homepage.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
\t</head>
\t<body>
\t\t<nav class=\"navbar navbar-light navbar-fixed-top\" style=\"background-color: #e3f2fd;\" role=\"navigation\">
\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"navbar-header\">
\t\t\t\t\t<a class=\"navbar-brand\" href=\"/\">To Do List app</a>

\t\t\t\t\t<img src=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/Logo_OpenClassrooms.png"), "html", null, true);
        yield "\" alt=\"OpenClassrooms\"/>
\t\t\t\t</div>
\t\t\t</div>
\t\t</nav>
\t\t<!-- Page Content -->
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<a href=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"btn btn-primary\">Créer un utilisateur</a>

\t\t\t\t";
        // line 31
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 31, $this->source); })()), "user", [], "any", false, false, false, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 32
            yield "\t\t\t\t\t<a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
            yield "\" class=\"pull-right btn btn-success\">Mon compte</a>
\t\t\t\t\t<a href=\"";
            // line 33
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\" class=\"pull-right btn btn-danger\">Se déconnecter</a>
\t\t\t\t";
        }
        // line 35
        yield "
\t\t\t\t";
        // line 36
        if (( !CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 36, $this->source); })()), "user", [], "any", false, false, false, 36) && ("login" != CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 36, $this->source); })()), "request", [], "any", false, false, false, 36), "attributes", [], "any", false, false, false, 36), "get", ["_route"], "method", false, false, false, 36)))) {
            // line 37
            yield "\t\t\t\t\t<a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"btn btn-success\">Se connecter</a>
\t\t\t\t";
        }
        // line 39
        yield "\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 42, $this->source); })()), "session", [], "any", false, false, false, 42), "flashBag", [], "any", false, false, false, 42), "get", ["success"], "method", false, false, false, 42));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 43
            yield "\t\t\t\t\t\t<div class=\"alert alert-success\" role=\"alert\">
\t\t\t\t\t\t\t<strong>Superbe !</strong>
\t\t\t\t\t\t\t";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_message"], "html", null, true);
            yield "
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        yield "
\t\t\t\t\t";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 49, $this->source); })()), "session", [], "any", false, false, false, 49), "flashBag", [], "any", false, false, false, 49), "get", ["error"], "method", false, false, false, 49));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 50
            yield "\t\t\t\t\t\t<div class=\"alert alert-danger\" role=\"alert\">
\t\t\t\t\t\t\t<strong>Oops !</strong>
\t\t\t\t\t\t\t";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_message"], "html", null, true);
            yield "
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        yield "
\t\t\t\t\t";
        // line 56
        yield from $this->unwrap()->yieldBlock('header_title', $context, $blocks);
        // line 57
        yield "\t\t\t\t\t";
        yield from $this->unwrap()->yieldBlock('header_img', $context, $blocks);
        // line 59
        yield "\t\t\t\t</div>
\t\t\t</div>
\t\t\t<br/>
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-12\"> ";
        // line 63
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 64
        yield "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<!-- /.container -->
\t\t\t<div class=\"container\">
\t\t\t\t<hr>
\t\t\t\t<footer>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-lg-12\">
\t\t\t\t\t\t\t<p class=\"pull-right\">Copyright &copy; OpenClassrooms</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</footer>
\t\t\t</div>
\t\t</body>
\t</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 56
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header_title"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 57
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header_img(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header_img"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header_img"));

        yield "<img class=\"slide-image\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/todolist_homepage.jpg"), "html", null, true);
        yield "\" alt=\"todo list\">
\t\t\t\t\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 63
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  251 => 63,  225 => 57,  203 => 56,  176 => 64,  174 => 63,  168 => 59,  165 => 57,  163 => 56,  160 => 55,  151 => 52,  147 => 50,  143 => 49,  140 => 48,  131 => 45,  127 => 43,  123 => 42,  118 => 39,  112 => 37,  110 => 36,  107 => 35,  102 => 33,  97 => 32,  95 => 31,  90 => 29,  80 => 22,  69 => 14,  64 => 12,  51 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
\t<head>
\t\t<meta charset=\"utf-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t<meta name=\"description\" content=\"\">
\t\t<meta name=\"author\" content=\"\">
\t\t<title>To Do List app</title>
\t\t<!-- Bootstrap Core CSS -->
\t\t<link
\t\thref=\"{{ asset('styles/bootstrap.min.css') }}\" rel=\"stylesheet\">
\t\t<!-- Custom CSS -->
\t\t<link href=\"{{ asset('styles/shop-homepage.css') }}\" rel=\"stylesheet\">
\t</head>
\t<body>
\t\t<nav class=\"navbar navbar-light navbar-fixed-top\" style=\"background-color: #e3f2fd;\" role=\"navigation\">
\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"navbar-header\">
\t\t\t\t\t<a class=\"navbar-brand\" href=\"/\">To Do List app</a>

\t\t\t\t\t<img src=\"{{ asset('images/Logo_OpenClassrooms.png') }}\" alt=\"OpenClassrooms\"/>
\t\t\t\t</div>
\t\t\t</div>
\t\t</nav>
\t\t<!-- Page Content -->
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<a href=\"{{ path('app_register') }}\" class=\"btn btn-primary\">Créer un utilisateur</a>

\t\t\t\t{% if app.user %}
\t\t\t\t\t<a href=\"{{ path('app_profile') }}\" class=\"pull-right btn btn-success\">Mon compte</a>
\t\t\t\t\t<a href=\"{{ path('app_logout') }}\" class=\"pull-right btn btn-danger\">Se déconnecter</a>
\t\t\t\t{% endif %}

\t\t\t\t{% if not app.user and 'login' != app.request.attributes.get('_route') %}
\t\t\t\t\t<a href=\"{{ path('app_login') }}\" class=\"btn btn-success\">Se connecter</a>
\t\t\t\t{% endif %}
\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t{% for flash_message in app.session.flashBag.get('success') %}
\t\t\t\t\t\t<div class=\"alert alert-success\" role=\"alert\">
\t\t\t\t\t\t\t<strong>Superbe !</strong>
\t\t\t\t\t\t\t{{ flash_message }}
\t\t\t\t\t\t</div>
\t\t\t\t\t{% endfor %}

\t\t\t\t\t{% for flash_message in app.session.flashBag.get('error') %}
\t\t\t\t\t\t<div class=\"alert alert-danger\" role=\"alert\">
\t\t\t\t\t\t\t<strong>Oops !</strong>
\t\t\t\t\t\t\t{{ flash_message }}
\t\t\t\t\t\t</div>
\t\t\t\t\t{% endfor %}

\t\t\t\t\t{% block header_title %}{% endblock %}
\t\t\t\t\t{% block header_img %}<img class=\"slide-image\" src=\"{{ asset('images/todolist_homepage.jpg') }}\" alt=\"todo list\">
\t\t\t\t\t{% endblock %}
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<br/>
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-12\"> {% block body %}{% endblock %}
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<!-- /.container -->
\t\t\t<div class=\"container\">
\t\t\t\t<hr>
\t\t\t\t<footer>
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-lg-12\">
\t\t\t\t\t\t\t<p class=\"pull-right\">Copyright &copy; OpenClassrooms</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</footer>
\t\t\t</div>
\t\t</body>
\t</html>
", "base.html.twig", "/home/orcryx/Bureau/OpenClassRooms/ToDoCo/templates/base.html.twig");
    }
}
