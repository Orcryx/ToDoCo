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

/* admin/index.html.twig */
class __TwigTemplate_bb5740b3cbd7303cea744461f8f9b4d2 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Page administrateur
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "\t<h1>Page d’administration</h1>

\t<details open>
\t\t<summary>
\t\t\t<h2>Utilisateurs</h2>
\t\t</summary>
\t\t<div>
\t\t\t<table class=\"table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Email</th>
\t\t\t\t\t\t<th>Username</th>
\t\t\t\t\t\t<th>Created At</th>
\t\t\t\t\t\t<th>Updated At</th>
\t\t\t\t\t\t<th>Roles</th>
\t\t\t\t\t\t<th>Actions</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 26, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 27
            yield "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 28), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "username", [], "any", false, false, false, 29), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 30
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "createdAt", [], "any", false, false, false, 30)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "createdAt", [], "any", false, false, false, 30), "Y-m-d H:i:s"), "html", null, true)) : (""));
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 31
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "updatedAt", [], "any", false, false, false, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "updatedAt", [], "any", false, false, false, 31), "Y-m-d H:i:s"), "html", null, true)) : (""));
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "roles", [], "any", false, false, false, 32), ", "), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 34)]), "html", null, true);
            yield "\">Modifier rôles</a>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            $context['_iterated'] = true;
        }
        // line 37
        if (!$context['_iterated']) {
            // line 38
            yield "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td colspan=\"6\">Aucun utilisateur trouvé</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        yield "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</details>

\t<details>
\t\t<summary>
\t\t\t<h2>Liste des tâches</h2>
\t\t</summary>
\t\t<div>
\t\t\t<table class=\"table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Title</th>
\t\t\t\t\t\t<th>Content</th>
\t\t\t\t\t\t<th>Is Done</th>
\t\t\t\t\t\t<th>Created At</th>
\t\t\t\t\t\t<th>Updated At</th>
\t\t\t\t\t\t<th>Utilisateur</th>
\t\t\t\t\t\t<th>Actions</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["tasks"]) || array_key_exists("tasks", $context) ? $context["tasks"] : (function () { throw new RuntimeError('Variable "tasks" does not exist.', 65, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 66
            yield "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
            // line 67
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["task"], "title", [], "any", false, false, false, 67), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 68
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["task"], "content", [], "any", false, false, false, 68), "html", null, true);
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 69
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["task"], "isDone", [], "any", false, false, false, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Oui") : ("Non"));
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 70
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["task"], "createdAt", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["task"], "createdAt", [], "any", false, false, false, 70), "Y-m-d H:i:s"), "html", null, true)) : (""));
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 71
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["task"], "updatedAt", [], "any", false, false, false, 71)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["task"], "updatedAt", [], "any", false, false, false, 71), "Y-m-d H:i:s"), "html", null, true)) : (""));
            yield "</td>
\t\t\t\t\t\t\t<td>";
            // line 72
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["task"], "userId", [], "any", false, false, false, 72)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["task"], "userId", [], "any", false, false, false, 72), "email", [], "any", false, false, false, 72), "html", null, true)) : ("—"));
            yield "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_task_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 74)]), "html", null, true);
            yield "\">Voir</a>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_task_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 75)]), "html", null, true);
            yield "\">Modifier</a>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            $context['_iterated'] = true;
        }
        // line 78
        if (!$context['_iterated']) {
            // line 79
            yield "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td colspan=\"7\">Aucune tâche trouvée</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['task'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        yield "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</details>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/index.html.twig";
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
        return array (  251 => 83,  242 => 79,  240 => 78,  232 => 75,  228 => 74,  223 => 72,  219 => 71,  215 => 70,  211 => 69,  207 => 68,  203 => 67,  200 => 66,  195 => 65,  170 => 42,  161 => 38,  159 => 37,  151 => 34,  146 => 32,  142 => 31,  138 => 30,  134 => 29,  130 => 28,  127 => 27,  122 => 26,  101 => 7,  88 => 6,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Page administrateur
{% endblock %}

{% block body %}
\t<h1>Page d’administration</h1>

\t<details open>
\t\t<summary>
\t\t\t<h2>Utilisateurs</h2>
\t\t</summary>
\t\t<div>
\t\t\t<table class=\"table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Email</th>
\t\t\t\t\t\t<th>Username</th>
\t\t\t\t\t\t<th>Created At</th>
\t\t\t\t\t\t<th>Updated At</th>
\t\t\t\t\t\t<th>Roles</th>
\t\t\t\t\t\t<th>Actions</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t{% for user in users %}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>{{ user.email }}</td>
\t\t\t\t\t\t\t<td>{{ user.username }}</td>
\t\t\t\t\t\t\t<td>{{ user.createdAt ? user.createdAt|date('Y-m-d H:i:s') : '' }}</td>
\t\t\t\t\t\t\t<td>{{ user.updatedAt ? user.updatedAt|date('Y-m-d H:i:s') : '' }}</td>
\t\t\t\t\t\t\t<td>{{ user.roles|join(', ') }}</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"{{ path('app_user_edit', { id: user.id }) }}\">Modifier rôles</a>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{% else %}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td colspan=\"6\">Aucun utilisateur trouvé</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{% endfor %}
\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</details>

\t<details>
\t\t<summary>
\t\t\t<h2>Liste des tâches</h2>
\t\t</summary>
\t\t<div>
\t\t\t<table class=\"table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Title</th>
\t\t\t\t\t\t<th>Content</th>
\t\t\t\t\t\t<th>Is Done</th>
\t\t\t\t\t\t<th>Created At</th>
\t\t\t\t\t\t<th>Updated At</th>
\t\t\t\t\t\t<th>Utilisateur</th>
\t\t\t\t\t\t<th>Actions</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t{% for task in tasks %}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>{{ task.title }}</td>
\t\t\t\t\t\t\t<td>{{ task.content }}</td>
\t\t\t\t\t\t\t<td>{{ task.isDone ? 'Oui' : 'Non' }}</td>
\t\t\t\t\t\t\t<td>{{ task.createdAt ? task.createdAt|date('Y-m-d H:i:s') : '' }}</td>
\t\t\t\t\t\t\t<td>{{ task.updatedAt ? task.updatedAt|date('Y-m-d H:i:s') : '' }}</td>
\t\t\t\t\t\t\t<td>{{ task.userId ? task.userId.email : '—' }}</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"{{ path('app_task_show', {'id': task.id}) }}\">Voir</a>
\t\t\t\t\t\t\t\t<a href=\"{{ path('app_task_edit', {'id': task.id}) }}\">Modifier</a>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{% else %}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td colspan=\"7\">Aucune tâche trouvée</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{% endfor %}
\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</details>
{% endblock %}
", "admin/index.html.twig", "/home/orcryx/Bureau/OpenClassRooms/ToDoCo/templates/admin/index.html.twig");
    }
}
