<ul>
    <li>
        <a href="/" class="{{ request()->is('/') ? 'active' : null }}">Главная</a>
    </li>
    <li><a href="/about" class="{{ request()->is('about') ? 'active' : null }}">О нас</a></li>
    <li>
        <a href="/recipes" class="{{ request()->is('recipes') || request()->is('recipe/*') ? 'active' : null }}">Рецепты</a>
    </li>
    <li>
        <a href="/blog" class="{{ request()->is('blog') || request()->is('article/*') ? 'active' : null }}">Блог</a>
    </li>
    <li>
        <a href="/authors" class="{{ request()->is('authors') || request()->is('author/*') ? 'active' : null }}">Авторы</a>
    </li>
    <li><a href="/contact" class="{{ request()->is('contact') ? 'active' : null }}">Контакты</a></li>
</ul>
